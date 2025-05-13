<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawal;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\WithdrawalItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dataSampah()
    {
        return view('pages.admin.data-sampah');
    }

    public function setoran()
    {
        return view('pages.admin.setoran');
    }

    public function tarikSaldo()
    {
        $withdrawals = Withdrawal::with(['user', 'processor', 'items'])
            ->orderBy('withdrawal_date', 'desc')
            ->paginate(10);

        $nasabahUsers = User::where('role', 'nasabah')
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('pages.admin.tarik-saldo', compact('withdrawals', 'nasabahUsers'));
    }

    public function storeWithdrawal(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'withdrawal_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.item_name' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.price' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $user = User::findOrFail($request->user_id);
            $balance = Balance::where('user_id', $request->user_id)->first();

            if (!$balance) {
                return redirect()->back()->with('error', 'Nasabah tidak memiliki saldo');
            }

            $totalAmount = 0;
            foreach ($request->items as $item) {
                $quantity = floatval($item['quantity']);
                $price = floatval($item['price']);
                $itemTotal = $quantity * $price;
                $totalAmount += $itemTotal;
            }

            // Check if balance is sufficient
            $availableBalance = $balance->amount;
            $cashPayment = 0;

            if ($availableBalance < $totalAmount) {
                $cashPayment = $totalAmount - $availableBalance;
                $withdrawalAmount = $availableBalance;
            } else {
                $withdrawalAmount = $totalAmount;
            }

            // Create withdrawal record
            $withdrawal = Withdrawal::create([
                'user_id' => $request->user_id,
                'processed_by' => Auth::id(),
                'withdrawal_date' => $request->withdrawal_date,
                'amount' => $withdrawalAmount,
                'cash_amount' => $cashPayment,
                'total_amount' => $totalAmount,
                'notes' => $request->notes,
            ]);

            // Create withdrawal items
            foreach ($request->items as $item) {
                $quantity = floatval($item['quantity']);
                $price = floatval($item['price']);
                $itemTotal = $quantity * $price;

                WithdrawalItem::create([
                    'withdrawal_id' => $withdrawal->id,
                    'item_name' => $item['item_name'],
                    'quantity' => $quantity,
                    'price' => $price,
                    'total_amount' => $itemTotal,
                ]);
            }

            // Update balance
            if ($withdrawalAmount > 0) {
                $oldBalance = $balance->amount;
                $newBalance = $oldBalance - $withdrawalAmount;
                $balance->amount = $newBalance;
                $balance->save();

                // Create transaction record
                Transaction::create([
                    'user_id' => $request->user_id,
                    'transactionable_id' => $withdrawal->id,
                    'transactionable_type' => Withdrawal::class,
                    'amount' => $withdrawalAmount,
                    'type' => 'debit',
                    'balance_after' => $newBalance,
                    'description' => 'Penarikan saldo pada ' . date('d-m-Y', strtotime($request->withdrawal_date)),
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Penarikan saldo berhasil');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal melakukan penarikan saldo: ' . $e->getMessage());
        }
    }

    public function showWithdrawal($id)
    {
        $withdrawal = Withdrawal::with(['user', 'processor', 'items', 'transaction'])
            ->findOrFail($id);

        if (request()->ajax()) {
            return response()->json($withdrawal);
        }

        return view('pages.admin.detail-withdrawal.detail-modal', compact('withdrawal'));
    }

    public function getUserBalance($id)
    {
        $balance = Balance::where('user_id', $id)->first();
        $amount = $balance ? $balance->amount : 0;

        return response()->json(['balance' => $amount]);
    }

    public function withdrawalReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $withdrawals = Withdrawal::with(['user', 'processor', 'items'])
            ->whereBetween('withdrawal_date', [$startDate, $endDate])
            ->orderBy('withdrawal_date')
            ->get();

        $totalAmount = $withdrawals->sum('amount');
        $totalCashAmount = $withdrawals->sum('cash_amount');

        return view('pages.admin.reports.withdrawal-report', compact(
            'withdrawals', 'startDate', 'endDate', 'totalAmount', 'totalCashAmount'
        ));
    }
}
