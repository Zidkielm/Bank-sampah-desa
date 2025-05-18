<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasabahHistoryController extends Controller
{
    public function riwayatPengambilan(Request $request)
    {
        $user = Auth::user();
        $query = Deposit::with(['wasteType', 'receiver'])
                      ->where('user_id', $user->id);

        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('wasteType', function($wq) use ($search) {
                    $wq->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('receiver', function($rq) use ($search) {
                    $rq->where('name', 'like', '%' . $search . '%');
                })
                ->orWhere('notes', 'like', '%' . $search . '%')
                ->orWhere('total_amount', 'like', '%' . $search . '%')
                ->orWhere('weight_kg', 'like', '%' . $search . '%');
            });
        }

        $deposits = $query->orderBy('deposit_date', 'desc')
                      ->paginate(10)
                      ->withQueryString();

        return view('pages.nasabah.riwayat-pengambilan', compact('deposits'));
    }

    public function riwayatPembelian(Request $request)
    {
        $user = Auth::user();
        $query = Withdrawal::with(['processor', 'items'])
                        ->where('user_id', $user->id);

        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('processor', function($pq) use ($search) {
                    $pq->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('items', function($iq) use ($search) {
                    $iq->where('item_name', 'like', '%' . $search . '%');
                })
                ->orWhere('notes', 'like', '%' . $search . '%')
                ->orWhere('total_amount', 'like', '%' . $search . '%')
                ->orWhere('amount', 'like', '%' . $search . '%')
                ->orWhere('cash_amount', 'like', '%' . $search . '%');
            });
        }

        $withdrawals = $query->orderBy('withdrawal_date', 'desc')
                        ->paginate(10)
                        ->withQueryString();

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
