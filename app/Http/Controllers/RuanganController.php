<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mruangan;

class RuanganController extends Controller
{

    public function index()
    {
        $data = Mruangan::orderBy('is_aktif', 'desc')->get();
        return view('master.ruangan.index', compact('data'));
    }

    public function updateIsAktif(Request $req, Mruangan $isaktif)
    {
        $attr['is_aktif'] = $isaktif['is_aktif'] == 'Y' ? 'T' : 'Y';
        $isaktif->update($attr);
        if ($attr['is_aktif'] == 'T') {
            toast('Poli Di Nonaktifkan', 'success');
        } else {
            toast('Poli Di Aktifkan', 'success');
        }
        return back();
    }
}
