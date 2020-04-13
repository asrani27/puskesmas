<?php

namespace App\Http\Controllers;

use App\Tdiagnosa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Alert;

class DiagnosaController extends Controller
{
    public function storeDiagnosa(Request $req, $id)
    {
        $tanggal = Carbon::now();
        $diagnosa = new Tdiagnosa;
        $diagnosa->tanggal      = $tanggal;
        $diagnosa->pelayanan_id = $id;
        $diagnosa->dokter_id    = $req->dokter_id;
        $diagnosa->perawat_id   = $req->perawat_id;
        $diagnosa->diagnosa_id  = $req->diagnosa_id;
        $diagnosa->diagnosa_kasus  = $req->diagnosa_kasus;
        $diagnosa->diagnosa_jenis  = $req->diagnosa_jenis;
        $diagnosa->save();
        toast('Diagnosa Berhasil Di Simpan', 'success');
        return back();
    }
    
    public function deleteDiagnosa($id, $id_diagnosa)
    {
        $del = Tdiagnosa::find($id_diagnosa)->delete();
        return back();
    }
}
