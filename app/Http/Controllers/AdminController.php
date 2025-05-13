<?php

namespace App\Http\Controllers;

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
        return view('pages.admin.tarik-saldo');
    }

    public function iuran()
    {
        return view('pages.admin.iuran');
    }
}
