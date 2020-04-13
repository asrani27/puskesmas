<?php

namespace App\Http\Controllers;

use App\Mtindakan;
use App\Ttindakan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Alert;

class TindakanController extends Controller
{
    
    public function storeTindakan(Request $req, $id)
    {
        $t = new Ttindakan;
        $t->tanggal      = Carbon::now();
        $t->pelayanan_id = $id;
        $t->dokter_id    = $req->dokter_id;
        $t->perawat_id   = $req->perawat_id;
        $t->tindakan_id  = $req->tindakan_id;
        $t->tanggal_rencana = Carbon::parse($req->tanggal_rencana);
        $t->lama_tindakan   = $req->lama_tindakan;
        $t->hasil           = $req->hasil;
        $t->jumlah          = $req->jumlah;
        $t->keterangan      = $req->keterangan;
        $t->tarif           = Mtindakan::find($req->tindakan_id)->first()->tarif;
        $t->save();
        toast('Tindakan Berhasil Di Simpan', 'success');
        return back();
    }
    
    public function deleteTindakan($id, $id_tindakan)
    {
        $del = Ttindakan::find($id_tindakan)->delete();
        toast('Data Berhasil Di Hapus', 'success');
        return back();
    }
}
