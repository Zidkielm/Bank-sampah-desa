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
    public function index(Request $request)
    {
        $query = MonthlyFee::with(['user', 'receiver']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('month') && $request->month != '') {
            $monthYear = explode('-', $request->month);
            if (count($monthYear) === 2) {
                $year = $monthYear[0];
                $month = $monthYear[1];
                $query->whereYear('payment_date', $year)
                      ->whereMonth('payment_date', $month);
            }
        }

        $monthlyFees = $query->orderBy('payment_date', 'desc')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(10)
                            ->withQueryString();

        $nasabahUsers = User::where('role', 'nasabah')
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('pages.admin.iuran', compact('monthlyFees', 'nasabahUsers'));
    }

    public function petugasIndex(Request $request)
    {
        $query = MonthlyFee::with(['user', 'receiver']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        // Apply month filter - simple implementation
        if ($request->has('month') && $request->month != '') {
            $monthYear = explode('-', $request->month);
            if (count($monthYear) === 2) {
                $year = $monthYear[0];
                $month = $monthYear[1];
                $query->whereYear('payment_date', $year)
                      ->whereMonth('payment_date', $month);
            }
        }

        $monthlyFees = $query->orderBy('payment_date', 'desc')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(10)
                            ->withQueryString();

        $nasabahUsers = User::where('role', 'nasabah')
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('pages.petugas.iuran', compact('monthlyFees', 'nasabahUsers'));
    }

    public function nasabahIndex(Request $request)
    {
        $query = MonthlyFee::with(['user', 'receiver'])
            ->where('user_id', Auth::id());

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        // Apply month filter - simple implementation
        if ($request->has('month') && $request->month != '') {
            $monthYear = explode('-', $request->month);
            if (count($monthYear) === 2) {
                $year = $monthYear[0];
                $month = $monthYear[1];
                $query->whereYear('payment_date', $year)
                      ->whereMonth('payment_date', $month);
            }
        }

        $monthlyFees = $query->orderBy('payment_date', 'desc')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10)
                    ->withQueryString();

        return view('pages.nasabah.iuran', compact('monthlyFees'));
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

        $paymentDate = Carbon::parse($request->payment_date);
        $monthYear = $paymentDate->format('Y-m');

        $existingPayment = MonthlyFee::where('user_id', $request->user_id)
            ->whereYear('payment_date', $paymentDate->year)
            ->whereMonth('payment_date', $paymentDate->month)
            ->where('status', 'paid')
            ->exists();

        if ($existingPayment) {
            $monthName = $paymentDate->locale('id')->monthName;
            return redirect()->back()->with('error', "Tidak dapat membayar iuran karena nasabah sudah membayar untuk bulan {$monthName} {$paymentDate->year}.");
        }

        DB::beginTransaction();

        try {
            $imagePath = null;
            if ($request->hasFile('proof_image')) {
                $imagePath = $request->file('proof_image')->store('monthly-fees', 'public');
            }

            $status = Auth::user()->role === 'nasabah' ? 'unpaid' : 'paid';

            $monthlyFee = MonthlyFee::create([
                'user_id' => $request->user_id,
                'receiver_id' => Auth::id(),
                'payment_date' => $request->payment_date,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'status' => $status,
                'proof_image' => $imagePath,
                'notes' => $request->notes,
            ]);

            if ($request->payment_method === 'balance' && $status === 'paid') {
                $balance = Balance::where('user_id', $request->user_id)->first();

                if ($balance && $balance->amount >= $request->amount) {
                    $oldBalance = $balance->amount;
                    $newBalance = $oldBalance - $request->amount;
                    $balance->amount = $newBalance;
                    $balance->save();

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

            if ($status === 'paid') {
                $user = User::find($request->user_id);
                if ($user && $user->status === 'inactive') {
                    $user->status = 'active';
                    $user->save();
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran iuran berhasil disimpan' . ($status === 'unpaid' ? ' dan menunggu persetujuan admin' : ''));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan pembayaran iuran: ' . $e->getMessage());
        }
    }

    public function nasabahStore(Request $request)
    {
        $request->validate([
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:1000',
            'payment_method' => 'required|in:cash,transfer',
            'proof_image' => $request->payment_method == 'transfer' ? 'required|image|max:2048' : 'nullable|image|max:2048',
            'notes' => 'nullable|string',
        ]);

        $paymentDate = Carbon::parse($request->payment_date);
        $monthYear = $paymentDate->format('Y-m');

        $existingPayment = MonthlyFee::where('user_id', Auth::id())
            ->whereYear('payment_date', $paymentDate->year)
            ->whereMonth('payment_date', $paymentDate->month)
            ->whereIn('status', ['paid', 'unpaid'])
            ->exists();

        if ($existingPayment) {
            $monthName = $paymentDate->locale('id')->monthName;
            return redirect()->back()->with('error', "Tidak dapat membayar iuran karena Anda sudah membayar atau memiliki pembayaran tertunda untuk bulan {$monthName} {$paymentDate->year}.");
        }

        DB::beginTransaction();

        try {
            $imagePath = null;
            if ($request->hasFile('proof_image')) {
                $imagePath = $request->file('proof_image')->store('monthly-fees', 'public');
            }

            $monthlyFee = MonthlyFee::create([
                'user_id' => Auth::id(),
                'receiver_id' => Auth::id(),
                'payment_date' => $request->payment_date,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'status' => 'unpaid',
                'proof_image' => $imagePath,
                'notes' => $request->notes,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran iuran berhasil disimpan dan menunggu persetujuan admin');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan pembayaran iuran: ' . $e->getMessage());
        }
    }

    public function approve($id)
    {
        DB::beginTransaction();
        try {
            $monthlyFee = MonthlyFee::findOrFail($id);

            if ($monthlyFee->status === 'paid') {
                return redirect()->back()->with('error', 'Pembayaran ini sudah disetujui sebelumnya');
            }

            $monthlyFee->status = 'paid';
            $monthlyFee->receiver_id = Auth::id();
            $monthlyFee->save();

            $user = User::find($monthlyFee->user_id);
            if ($user && $user->status === 'inactive') {
                $user->status = 'active';
                $user->save();
            }

            if ($monthlyFee->payment_method === 'balance') {
                $balance = Balance::where('user_id', $monthlyFee->user_id)->first();

                if ($balance && $balance->amount >= $monthlyFee->amount) {
                    $oldBalance = $balance->amount;
                    $newBalance = $oldBalance - $monthlyFee->amount;
                    $balance->amount = $newBalance;
                    $balance->save();

                    Transaction::create([
                        'user_id' => $monthlyFee->user_id,
                        'transactionable_id' => $monthlyFee->id,
                        'transactionable_type' => MonthlyFee::class,
                        'amount' => $monthlyFee->amount,
                        'type' => 'debit',
                        'balance_after' => $newBalance,
                        'description' => 'Pembayaran iuran bulanan pada ' . $monthlyFee->payment_date->format('d-m-Y'),
                    ]);


                } else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Saldo nasabah tidak mencukupi untuk pembayaran iuran');
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran iuran berhasil disetujui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyetujui pembayaran: ' . $e->getMessage());
        }
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $monthlyFee = MonthlyFee::findOrFail($id);

            if ($monthlyFee->status === 'paid') {
                return redirect()->back()->with('error', 'Pembayaran ini sudah disetujui sebelumnya');
            }

            if ($monthlyFee->status === 'partial') {
                return redirect()->back()->with('error', 'Pembayaran ini sudah ditolak sebelumnya');
            }

            $monthlyFee->status = 'partial';
            $monthlyFee->rejection_reason = $request->rejection_reason;
            $monthlyFee->save();

            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran iuran berhasil ditolak');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menolak pembayaran: ' . $e->getMessage());
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

    public function nasabahShow($id)
    {
        $monthlyFee = MonthlyFee::with(['user', 'receiver', 'transaction'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        if (request()->ajax()) {
            return response()->json($monthlyFee->toArray());
        }

        return view('pages.nasabah.detail-iuran.detail-modal', compact('monthlyFee'));
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
            $hasPaid = MonthlyFee::where('user_id', $user->id)
                        ->whereYear('payment_date', $now->year)
                        ->whereMonth('payment_date', $now->month)
                        ->where('status', 'paid')
                        ->exists();

            if (!$hasPaid) {
                $unpaidMonths = $this->countUnpaidMonths($user->id);

                $unpaidUser = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'no_hp' => $user->no_hp,
                    'status' => $user->status,
                    'unpaid_months' => $unpaidMonths
                ];

                $unpaidUsers[] = $unpaidUser;

                // If unpaid for more than 2 months, deactivate the account
                if ($unpaidMonths > 2) {
                    $user->status = 'inactive';
                    $user->save();
                    $deactivated[] = $unpaidUser;
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
