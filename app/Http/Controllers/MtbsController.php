<?php

namespace App\Http\Controllers;

use App\Tmtbs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Alert;

class MtbsController extends Controller
{
    public function storeMtbs(Request $req, $id)
    {
        $s = new Tmtbs;
        $s->tanggal      = Carbon::now()->format('Y-m-d h:i:s');
        $s->pelayanan_id = $id;
        $s->dokter_id    = $req->dokter_id;
        $s->perawat_id   = $req->perawat_id;
        $s->anak_sakit   = $req->anak_sakit;
        $s->jenis_kunjungan = $req->jenis_kunjungan;
        $s->save();
        toast('Data Disimpan', 'success');
        return back();
    }

    public function updateMtbs(Request $req, $id, $mtbs_id)
    {
        $s = Tmtbs::find($mtbs_id);
        $s->tanggal      = Carbon::now()->format('Y-m-d h:i:s');
        $s->pelayanan_id = $id;
        $s->dokter_id    = $req->dokter_id;
        $s->perawat_id   = $req->perawat_id;
        $s->anak_sakit   = $req->anak_sakit;
        $s->jenis_kunjungan = $req->jenis_kunjungan;
        $s->save();
        toast('Data Diupudate', 'success');
        return back();
    }
}
