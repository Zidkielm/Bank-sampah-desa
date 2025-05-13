<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Balance;
use App\Models\MonthlyFee;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $totalNasabah = User::where('role', 'nasabah')->count();
            $totalPetugas = User::where('role', 'petugas')->count();
            $totalSampah = Deposit::sum('weight_kg');
            $totalSetoran = Deposit::count();
            $totalSaldo = Balance::sum('amount');
            $totalIuran = MonthlyFee::where('status', 'paid')->sum('amount');

            if ($user->role === 'admin') {
                return view('pages.admin.dashboard', compact(
                    'totalNasabah',
                    'totalPetugas',
                    'totalSampah',
                    'totalSetoran',
                    'totalSaldo',
                    'totalIuran'
                ));
            } elseif ($user->role === 'petugas') {
                return view('pages.petugas.dashboard', compact(
                    'totalSampah',
                    'totalSetoran',
                    'totalIuran',
                ));
            } elseif ($user->role === 'nasabah') {
                return view('pages.nasabah.dashboard');
            }
        }
    }
}
