<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriksaGiziController extends Controller
{
    public function store(Request $req)
    {
        dd($req->all());
    }
}
