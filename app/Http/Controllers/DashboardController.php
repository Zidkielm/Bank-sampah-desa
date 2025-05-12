<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFeed;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                $dataFeed = new DataFeed();
                return view('pages.admin.dashboard', compact('dataFeed'));
            } elseif ($user->role === 'petugas') {
                $dataFeed = new DataFeed();
                return view('pages.petugas.dashboard', compact('dataFeed'));
            } elseif ($user->role === 'nasabah') {
                $dataFeed = new DataFeed();
                return view('pages.nasabah.dashboard', compact('dataFeed'));
            }
        }
    }

    public function analytics()
    {
        return view('pages/dashboard/analytics');
    }

    public function fintech()
    {
        return view('pages/dashboard/fintech');
    }
}
