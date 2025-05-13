<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return view('pages.admin.dashboard');
            } elseif ($user->role === 'petugas') {
                return view('pages.petugas.dashboard');
            } elseif ($user->role === 'nasabah') {
                return view('pages.nasabah.dashboard');
            }
        }
    }
}
