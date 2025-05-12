<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function iuran()
    {
        return view('pages.nasabah.iuran');
    }

    public function riwayat()
    {
        return view('pages.nasabah.riwayat');
    }
}
