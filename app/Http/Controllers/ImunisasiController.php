<?php

namespace App\Http\Controllers;

use Alert;
use App\Mkms;
use Carbon\Carbon;
use App\Timunisasi;
use App\Tpelayanan;
use App\T_imunisasi_detail;
use Illuminate\Http\Request;

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

    public function updateKMS(Request $req, $id, $kms_id)
    {
        $s = Mkms::find($kms_id);
        $s->pasien_id         = Tpelayanan::find($id)->pendaftaran->pasien_id;
        $s->pekerjaan_ayah    = $req->pekerjaan_ayah;
        $s->pekerjaan_ibu     = $req->pekerjaan_ibu;
        $s->macam_persalinan  = $req->macam_persalinan;
        $s->persalinan_oleh   = $req->persalinan_oleh;
        $s->anak_ke           = $req->anak_ke;
        $s->tempat_persalinan = $req->tempat_persalinan;
        $s->neonatal_1 = $req->neonatal_1;
        $s->neonatal_2 = $req->neonatal_2;
        $s->neonatal_3 = $req->neonatal_3;
        $s->neonatal_4 = $req->neonatal_4;
        $s->asi  = $req->asi;
        $s->vita = $req->vita;
        $s->save();
        toast('Data KMS Diupdate','success');
        return back();
    }

    public function storeImunisasiAnak(Request $req, $id)
    {
        $imun = new Timunisasi;
        $imun->tanggal     = Carbon::now()->format('Y-m-d h:i:s');
        $imun->pelayanan_id= $id;
        $imun->dokter_id   = $req->dokter_id;
        $imun->perawat_id  = $req->perawat_id;
        $imun->umur_bulan  = $req->umur_bulan;
        $imun->bb          = $req->bb;
        $imun->pb          = $req->pb;
        $imun->kepandaian  = $req->kepandaian;
        $imun->makanan     = $req->makanan;
        $imun->gejala      = $req->gejala;
        $imun->diagnosa    = $req->diagnosa;
        $imun->pengobatan  = $req->pengobatan;
        $imun->keterangan  = $req->keterangan;
        $imun->kategori    = 'anak';
        $imun->save();
        $imunisasi_id = $imun->id;
        foreach($req->data_imun as $val)
        {
            $s = new T_imunisasi_detail;
            $s->imunisasi_id = $imunisasi_id;
            $s->imunisasi_kode = $val;
            $s->save();
        }
        toast('Data Imunisasi Disimpan','success');
        return back();
    }

    public function UpdateImunisasiAnak(Request $req, $id, $imunisasi_id)
    {
        $imun = Timunisasi::find($imunisasi_id);
        $imun->pelayanan_id= $id;
        $imun->dokter_id   = $req->dokter_id;
        $imun->perawat_id  = $req->perawat_id;
        $imun->umur_bulan  = $req->umur_bulan;
        $imun->bb          = $req->bb;
        $imun->pb          = $req->pb;
        $imun->kepandaian  = $req->kepandaian;
        $imun->makanan     = $req->makanan;
        $imun->gejala      = $req->gejala;
        $imun->diagnosa    = $req->diagnosa;
        $imun->pengobatan  = $req->pengobatan;
        $imun->keterangan  = $req->keterangan;
        $imun->save();
        $imunisasi_id = $imun->id;
        $del = T_imunisasi_detail::where('imunisasi_id', $imunisasi_id)->delete();
        foreach($req->data_imun as $val)
        {
            $s = new T_imunisasi_detail;
            $s->imunisasi_id = $imunisasi_id;
            $s->imunisasi_kode = $val;
            $s->save();
        }
        toast('Data Imunisasi Diupdate','success');
        return back();
    }

    public function storeImunisasiDewasa(Request $req, $id)
    {
        if($req->data_imun == null){
            toast('Harap Checklist Imunisasi');
            return back();
        }else{

            $checkImun = Timunisasi::where('pelayanan_id', $id)->where('kategori', 'dewasa')->first();
            if($checkImun == null){
                $imun = new Timunisasi;
                $imun->tanggal     = Carbon::now()->format('Y-m-d h:i:s');
                $imun->pelayanan_id= $id;
                $imun->dokter_id   = $req->dokter_id;
                $imun->perawat_id  = $req->perawat_id;
                $imun->umur_bulan  = $req->umur_bulan;
                $imun->kategori    = 'dewasa';
                $imun->save();
                $imunisasi_id = $imun->id;
                foreach($req->data_imun as $val)
                {
                    $s = new T_imunisasi_detail;
                    $s->imunisasi_id = $imunisasi_id;
                    $s->imunisasi_kode = $val;
                    $s->save();
                }
                toast('Data Imunisasi Disimpan','success');
                return back();
            }else{
                foreach($req->data_imun as $val)
                {
                    $s = new T_imunisasi_detail;
                    $s->imunisasi_id = $checkImun->id;
                    $s->imunisasi_kode = $val;
                    $s->save();
                }
                toast('Data Imunisasi Diupdate','success');
                return back();
            }
        }
    }

    public function UpdateImunisasiDewasa(Request $req, $id, $imunisasi_id)
    {
        $imun = Timunisasi::find($imunisasi_id);
        $imun->dokter_id   = $req->dokter_id;
        $imun->perawat_id  = $req->perawat_id;
        $imun->save();
        $imunisasi_id = $imun->id;
        $del = T_imunisasi_detail::where('imunisasi_id', $imunisasi_id)->delete();
        foreach($req->data_imun as $val)
        {
            $s = new T_imunisasi_detail;
            $s->imunisasi_id = $imunisasi_id;
            $s->imunisasi_kode = $val;
            $s->save();
        }
        toast('Data Imunisasi Diupdate','success');
        return back();
    }
}
