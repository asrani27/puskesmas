<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function medis()
    {
        return view('puskes.pelayanan.medis.medis');
    }
}
