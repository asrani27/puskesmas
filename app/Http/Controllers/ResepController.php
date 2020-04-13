<?php

namespace App\Http\Controllers;

use Alert;
use App\Tresep;
use Carbon\Carbon;
use App\Tpelayanan;
use App\Tresepdetail;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    
    public function storeResep(Request $req, $id)
    {
        $checkResep = Tpelayanan::find($id)->resep;
        if($checkResep == null){
            $t               = new Tresep;
            $t->no_resep     = $req->no_resep;
            $t->tanggal      = Carbon::now();
            $t->dokter_id    = $req->dokter_id;
            $t->perawat_id   = $req->perawat_id;
            $t->pelayanan_id = $id;
            $t->save();

            $r = new Tresepdetail;
            $r->resep_id               = $t->id;
            $r->obat_id                = $req->obat_id;
            $r->obat_jumlah            = $req->obat_jumlah;
            $r->obat_signa             = $req->obat_signa;
            $r->aturan_pakai           = $req->aturan_pakai;
            $r->obat_racikan           = $req->racikan;
            $r->obat_jumlah_permintaan = $req->obat_jumlah_permintaan;
            $r->obat_keterangan        = $req->keterangan;
            $r->save();
        }else{
            $r = new Tresepdetail;
            $r->resep_id               = $checkResep->id;
            $r->obat_id                = $req->obat_id;
            $r->obat_jumlah            = $req->obat_jumlah;
            $r->obat_signa             = $req->obat_signa;
            $r->aturan_pakai           = $req->aturan_pakai;
            $r->obat_racikan           = $req->racikan;
            $r->obat_jumlah_permintaan = $req->obat_jumlah_permintaan;
            $r->obat_keterangan        = $req->keterangan;
            $r->save();
        }
        toast('Resep Berhasil Di Simpan', 'success');
        return back();
    }

    public function deleteResep($id, $id_resep)
    {
        $del = Tresepdetail::find($id_resep)->delete();
        return back();
    }
}
