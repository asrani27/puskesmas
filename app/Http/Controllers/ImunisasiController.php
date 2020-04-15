<?php

namespace App\Http\Controllers;

use App\Mkms;
use App\Tpelayanan;
use Illuminate\Http\Request;
use Alert;

class ImunisasiController extends Controller
{
    public function storeKMS(Request $req, $id)
    {
        $s = new Mkms;
        $s->pasien_id = Tpelayanan::find($id)->pendaftaran->pasien_id;
        $s->pekerjaan_ayah = $req->pekerjaan_ayah;
        $s->pekerjaan_ibu = $req->pekerjaan_ibu;
        $s->macam_persalinan = $req->macam_persalinan;
        $s->persalinan_oleh = $req->persalinan_oleh;
        $s->anak_ke = $req->anak_ke;
        $s->tempat_persalinan = $req->tempat_persalinan;
        $s->neonatal_1 = $req->neonatal_1;
        $s->neonatal_2 = $req->neonatal_2;
        $s->neonatal_3 = $req->neonatal_3;
        $s->neonatal_4 = $req->neonatal_4;
        $s->asi = $req->asi;
        $s->vita = $req->vita;
        $s->save();
        toast('Data KMS Disimpan','success');
        return back();
    }
}
