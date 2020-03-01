<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tpelayanan;

class PelayananController extends Controller
{
    public function medis()
    {
        $data = Tpelayanan::orderBy('created_at','desc')->paginate(10);
        return view('puskes.pelayanan.medis.medis',compact('data'));
    }
}
