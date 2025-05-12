<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function setoran()
    {
        return view('pages.petugas.setoran');
    }

    public function iuran()
    {
        return view('pages.petugas.iuran');
    }
}
