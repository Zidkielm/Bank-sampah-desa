<?php

namespace App\Http\Controllers;

use App\Models\MonthlyFee;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonthlyFeeController extends Controller
{
    public function index()
    {
        $monthlyFees = MonthlyFee::with(['user', 'receiver'])
            ->orderBy('payment_date', 'desc')
            ->paginate(10);

        $nasabahUsers = User::where('role', 'nasabah')
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('pages.admin.iuran', compact('monthlyFees', 'nasabahUsers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:1000',
            'payment_method' => 'required|in:cash,transfer',
            'proof_image' => $request->payment_method == 'transfer' ? 'required|image|max:2048' : 'nullable|image|max:2048',
            'notes' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $imagePath = null;
            if ($request->hasFile('proof_image')) {
                $imagePath = $request->file('proof_image')->store('monthly-fees', 'public');
            }

            $monthlyFee = MonthlyFee::create([
                'user_id' => $request->user_id,
                'receiver_id' => Auth::id(),
                'payment_date' => $request->payment_date,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'status' => 'paid',
                'proof_image' => $imagePath,
                'notes' => $request->notes,
            ]);

            // Update balance if payment is deducted from balance
            if ($request->payment_method === 'balance') {
                $balance = Balance::where('user_id', $request->user_id)->first();

                if ($balance && $balance->amount >= $request->amount) {
                    $oldBalance = $balance->amount;
                    $newBalance = $oldBalance - $request->amount;
                    $balance->amount = $newBalance;
                    $balance->save();

                    // Create transaction record
                    Transaction::create([
                        'user_id' => $request->user_id,
                        'transactionable_id' => $monthlyFee->id,
                        'transactionable_type' => MonthlyFee::class,
                        'amount' => $request->amount,
                        'type' => 'debit',
                        'balance_after' => $newBalance,
                        'description' => 'Pembayaran iuran bulanan pada ' . date('d-m-Y', strtotime($request->payment_date)),
                    ]);
                } else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Saldo tidak mencukupi untuk pembayaran iuran');
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran iuran berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan pembayaran iuran: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $monthlyFee = MonthlyFee::with(['user', 'receiver', 'transaction'])
            ->findOrFail($id);

        if (request()->ajax()) {
            return response()->json($monthlyFee->toArray());
        }

        return view('pages.admin.detail-iuran.detail-modal', compact('monthlyFee'));
    }

    public function checkUnpaidUsers()
    {
        $users = User::where('role', 'nasabah')
                    ->where('status', 'active')
                    ->get();

        $now = Carbon::now();
        $unpaidUsers = [];
        $deactivated = [];

        foreach ($users as $user) {
            // Check if user has paid for the current month
            $hasPaid = MonthlyFee::where('user_id', $user->id)
                        ->whereYear('payment_date', $now->year)
                        ->whereMonth('payment_date', $now->month)
                        ->where('status', 'paid')
                        ->exists();

            if (!$hasPaid) {
                $unpaidMonths = $this->countUnpaidMonths($user->id);
                $user->unpaid_months = $unpaidMonths;
                $unpaidUsers[] = $user;

                // If unpaid for more than 2 months, deactivate the account
                if ($unpaidMonths > 2) {
                    $user->status = 'inactive';
                    $user->save();
                    $deactivated[] = $user;
                }
            }
        }

        return view('pages.admin.unpaid-users', compact('unpaidUsers', 'deactivated', 'now'));
    }

    private function countUnpaidMonths($userId)
    {
        $now = Carbon::now();
        $count = 0;

        // Check the last 6 months to be safe
        for ($i = 0; $i <= 6; $i++) {
            $checkDate = clone $now;
            $checkDate->subMonths($i);

            $hasPaid = MonthlyFee::where('user_id', $userId)
                        ->whereYear('payment_date', $checkDate->year)
                        ->whereMonth('payment_date', $checkDate->month)
                        ->where('status', 'paid')
                        ->exists();

            if (!$hasPaid) {
                $count++;
            } else {
                break;
            }
        }

        return $count;
    }
}
