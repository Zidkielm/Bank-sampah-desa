<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dataNasabah()
    {
        return view('pages.admin.data-nasabah');
    }

    public function dataPetugas()
    {
        return view('pages.admin.data-petugas');
    }

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
        return view('pages.admin.tarik-saldo');
    }
    public function iuran()
    {
        return view('pages.admin.iuran');
    }
}
