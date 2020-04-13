<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MtbsController extends Controller
{
    public function storeMtbs(Request $req, $id)
    {
        dd($req->all(), $id);
    }
}
