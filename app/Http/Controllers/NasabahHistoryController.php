<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasabahHistoryController extends Controller
{
    public function riwayatPengambilan()
    {
        $user = Auth::user();
        $deposits = Deposit::with(['wasteType', 'receiver'])
                      ->where('user_id', $user->id)
                      ->orderBy('deposit_date', 'desc')
                      ->paginate(10);

        return view('pages.nasabah.riwayat-pengambilan', compact('deposits'));
    }

    public function riwayatPembelian()
    {
        $user = Auth::user();
        $withdrawals = Withdrawal::with(['processor', 'items'])
                        ->where('user_id', $user->id)
                        ->orderBy('withdrawal_date', 'desc')
                        ->paginate(10);

        return view('pages.nasabah.riwayat-pembelian', compact('withdrawals'));
    }

    public function showDepositDetail($id)
    {
        $user = Auth::user();
        $deposit = Deposit::with(['wasteType', 'receiver', 'transaction'])
                    ->where('user_id', $user->id)
                    ->findOrFail($id);

        if (request()->ajax()) {
            return response()->json($deposit);
        }

        return abort(404);
    }

    public function showWithdrawalDetail($id)
    {
        $user = Auth::user();
        $withdrawal = Withdrawal::with(['processor', 'items', 'transaction'])
                      ->where('user_id', $user->id)
                      ->findOrFail($id);

        if (request()->ajax()) {
            return response()->json($withdrawal);
        }

        return abort(404);
    }
}
