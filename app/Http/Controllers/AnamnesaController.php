<?php

namespace App\Http\Controllers;

use App\Malergi;
use App\Mriwayat;
use App\Tanamnesa;
use App\Tpelayanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnamnesaController extends Controller
{
    
    public function storeAnamnesa(Request $req, $id)
    {
        $dokter_id = $req->dokter_id;
        $perawat_id = $req->perawat_id;
        
        //ubah status periksa
        $pel = Tpelayanan::find($id)->pendaftaran;
        $pel->status_periksa = 1;
        $pel->save();
        $pasien_id = $pel->pasien_id;

        //Simpan Anamnesa
        $anamnesa = new Tanamnesa;
        $anamnesa->tanggal          = $pel->tanggal;
        $anamnesa->pelayanan_id     = $id;
        $anamnesa->dokter_id        = $dokter_id;
        $anamnesa->perawat_id       = $perawat_id;
        $anamnesa->keluhan_utama    = $req->keluhan_utama;
        $anamnesa->keluhan_tambahan = $req->keluhan_tambahan;
        $anamnesa->lama_sakit_tahun = $req->lama_sakit_tahun;
        $anamnesa->lama_sakit_bulan = $req->lama_sakit_bulan;
        $anamnesa->lama_sakit_hari  = $req->lama_sakit_hari;
        $anamnesa->merokok          = $req->merokok;
        $anamnesa->konsumsi_alkohol = $req->alkohol;
        $anamnesa->kurang_sayur_buah= $req->sayur;
        $anamnesa->terapi           = $req->terapi;
        $anamnesa->keterangan       = $req->keterangan;
        $anamnesa->edukasi          = $req->edukasi;
        $anamnesa->rencana_tindakan = $req->tindakan;
        $anamnesa->askep            = $req->askep;
        $anamnesa->observasi        = $req->observasi;
        $anamnesa->biopsikososial   = $req->biopsikososial;
        $anamnesa->save();

        //Simpan Periksa Fisik
        $fisik = new Tperiksafisik;
        $fisik->tanggal          = $pel->tanggal;
        $fisik->pelayanan_id     = $id;
        $fisik->dokter_id        = $dokter_id;
        $fisik->perawat_id       = $perawat_id;
        $fisik->sistole          = $req->sistole;
        $fisik->diastole         = $req->diastole;
        $fisik->detak_nadi       = $req->detak_nadi;
        $fisik->nafas            = $req->nafas;
        $fisik->detak_jantung    = $req->detak_jantung;
        $fisik->suhu             = $req->suhu;
        $fisik->kesadaran        = $req->kesadaran;
        $fisik->triage           = $req->triage;
        $fisik->berat            = $req->berat;
        $fisik->tinggi           = $req->tinggi;
        $fisik->lingkar_perut    = $req->lingkar_perut;
        $fisik->imt              = $req->imt;
        $fisik->hasil_imt        = $req->hasil_imt;
        $fisik->aktifitas_fisik  = $req->aktifitas_fisik;
        $fisik->skala_nyeri      = $req->nyeri;
        $fisik->save();

        //Simpan Riwayat Penyakit
        if(!is_null($req->riwayat_penyakit_sekarang)){
            $rp = new Mriwayat;
            $rp->pasien_id = $pasien_id;
            $rp->anamnesa_id = $anamnesa->id;
            $rp->jenis_riwayat = 'Riwayat Penyakit Sekarang';
            $rp->value = $req->riwayat_penyakit_sekarang;
            $rp->save();
        }

        if(!is_null($req->riwayat_penyakit_dulu)){
            $rp = new Mriwayat;
            $rp->pasien_id = $pasien_id;
            $rp->anamnesa_id = $anamnesa->id;
            $rp->jenis_riwayat = 'Riwayat Penyakit Dulu';
            $rp->value = $req->riwayat_penyakit_dulu;
            $rp->save();
        }
        
        if(!is_null($req->riwayat_penyakit_keluarga)){
            $rp = new Mriwayat;
            $rp->pasien_id = $pasien_id;
            $rp->anamnesa_id = $anamnesa->id;
            $rp->jenis_riwayat = 'Riwayat Penyakit Keluarga';
            $rp->value = $req->riwayat_penyakit_keluarga;
            $rp->save();
        }

        //Simpan Alergi Pasien
        if(!is_null($req->obat)){
            $ap = new Malergi;
            $ap->pasien_id = $pasien_id;
            $ap->anamnesa_id = $anamnesa->id;
            $ap->jenis_alergi = 'Obat';
            $ap->value = $req->obat;
            $ap->save();
        }
        
        if(!is_null($req->makanan)){
            $ap = new Malergi;
            $ap->pasien_id = $pasien_id;
            $ap->anamnesa_id = $anamnesa->id;
            $ap->jenis_alergi = 'Makanan';
            $ap->value = $req->makanan;
            $ap->save();
        }
        
        if(!is_null($req->umum)){
            $ap = new Malergi;
            $ap->pasien_id = $pasien_id;
            $ap->anamnesa_id = $anamnesa->id;
            $ap->jenis_alergi = 'Umum';
            $ap->value = $req->umum;
            $ap->save();
        }
        Alert::success('Anamnesa Berhasil Di Simpan');
        return back();
    }
    
    public function updateAnamnesa(Request $req, $id, $anamnesa_id)
    {
        $dokter_id = $req->dokter_id;
        $perawat_id = $req->perawat_id;
        
        //Simpan Anamnesa
        $anamnesa = Tanamnesa::find($anamnesa_id);
        $anamnesa->pelayanan_id     = $id;
        $anamnesa->dokter_id        = $dokter_id;
        $anamnesa->perawat_id       = $perawat_id;
        $anamnesa->keluhan_utama    = $req->keluhan_utama;
        $anamnesa->keluhan_tambahan = $req->keluhan_tambahan;
        $anamnesa->lama_sakit_tahun = $req->lama_sakit_tahun;
        $anamnesa->lama_sakit_bulan = $req->lama_sakit_bulan;
        $anamnesa->lama_sakit_hari  = $req->lama_sakit_hari;
        $anamnesa->merokok          = $req->merokok;
        $anamnesa->konsumsi_alkohol = $req->alkohol;
        $anamnesa->kurang_sayur_buah= $req->sayur;
        $anamnesa->terapi           = $req->terapi;
        $anamnesa->keterangan       = $req->keterangan;
        $anamnesa->edukasi          = $req->edukasi;
        $anamnesa->rencana_tindakan = $req->tindakan;
        $anamnesa->askep            = $req->askep;
        $anamnesa->observasi        = $req->observasi;
        $anamnesa->biopsikososial   = $req->biopsikososial;
        $anamnesa->save();

        //Simpan Periksa Fisik
        $fisik = Tpelayanan::find($id)->periksafisik;
        $fisik->pelayanan_id     = $id;
        $fisik->dokter_id        = $dokter_id;
        $fisik->perawat_id       = $perawat_id;
        $fisik->sistole          = $req->sistole;
        $fisik->diastole         = $req->diastole;
        $fisik->detak_nadi       = $req->detak_nadi;
        $fisik->nafas            = $req->nafas;
        $fisik->detak_jantung    = $req->detak_jantung;
        $fisik->suhu             = $req->suhu;
        $fisik->kesadaran        = $req->kesadaran;
        $fisik->triage           = $req->triage;
        $fisik->berat            = $req->berat;
        $fisik->tinggi           = $req->tinggi;
        $fisik->lingkar_perut    = $req->lingkar_perut;
        $fisik->imt              = $req->imt;
        $fisik->hasil_imt        = $req->hasil_imt;
        $fisik->aktifitas_fisik  = $req->aktifitas_fisik;
        $fisik->skala_nyeri      = $req->nyeri;
        $fisik->save();
        
        //Simpan Riwayat Penyakit
        $checkRPS = $anamnesa->rps->where('jenis_riwayat','Riwayat Penyakit Sekarang')->first();
        $pasien_id = Tpelayanan::find($id)->pendaftaran->pasien_id;
        if($checkRPS == null){
            if(!is_null($req->riwayat_penyakit_sekarang)){
                $rp = new Mriwayat;
                $rp->anamnesa_id = $anamnesa->id;
                $rp->pasien_id = $pasien_id;
                $rp->jenis_riwayat = 'Riwayat Penyakit Sekarang';
                $rp->value = $req->riwayat_penyakit_sekarang;
                $rp->save();
            }
        }else{
            $rps = $checkRPS;
            $rps->anamnesa_id = $anamnesa->id;
            $rps->jenis_riwayat = 'Riwayat Penyakit Sekarang';
            $rps->value = $req->riwayat_penyakit_sekarang;
            $rps->save();
        }

        $checkRPD = $anamnesa->rpd->where('jenis_riwayat','Riwayat Penyakit Dulu')->first();
        if($checkRPD == null){
            if(!is_null($req->riwayat_penyakit_dulu)){
                $rp = new Mriwayat;
                $rp->anamnesa_id = $anamnesa->id;
                $rp->pasien_id = $pasien_id;
                $rp->jenis_riwayat = 'Riwayat Penyakit Dulu';
                $rp->value = $req->riwayat_penyakit_dulu;
                $rp->save();
            }
        }else{
            $rpd = $checkRPD;
            $rpd->anamnesa_id = $anamnesa->id;
            $rpd->jenis_riwayat = 'Riwayat Penyakit Dulu';
            $rpd->value = $req->riwayat_penyakit_dulu;
            $rpd->save();
        }
        
        $checkRPK = $anamnesa->rpk->where('jenis_riwayat','Riwayat Penyakit Keluarga')->first();
        if($checkRPK == null){
            if(!is_null($req->riwayat_penyakit_keluarga)){
                $rp = new Mriwayat;
                $rp->anamnesa_id = $anamnesa->id;
                $rp->pasien_id = $pasien_id;
                $rp->jenis_riwayat = 'Riwayat Penyakit Keluarga';
                $rp->value = $req->riwayat_penyakit_keluarga;
                $rp->save();
            }
        }else{
            $rpk = $checkRPK;
            $rpk->anamnesa_id = $anamnesa->id;
            $rpk->jenis_riwayat = 'Riwayat Penyakit Keluarga';
            $rpk->value = $req->riwayat_penyakit_keluarga;
            $rpk->save();
        }
        
        //Update Alergi Pasien
        $checkObat = $anamnesa->obat->where('jenis_alergi','Obat')->first();
        if($checkObat == null){
            if(!is_null($req->obat)){
                $rp = new Malergi;
                $rp->anamnesa_id = $anamnesa->id;
                $rp->pasien_id = $pasien_id;
                $rp->jenis_alergi = 'Obat';
                $rp->value = $req->obat;
                $rp->save();
            }
        }else{
            $obat = $checkObat;
            $obat->anamnesa_id = $anamnesa->id;
            $obat->jenis_alergi = 'Obat';
            $obat->value = $req->obat;
            $obat->save();
        }

        $checkMakanan = $anamnesa->makanan->where('jenis_alergi','Makanan')->first();
        if($checkMakanan == null){
            if(!is_null($req->riwayat_penyakit_dulu)){
                $rp = new Malergi;
                $rp->anamnesa_id = $anamnesa->id;
                $rp->pasien_id = $pasien_id;
                $rp->jenis_alergi = 'Makanan';
                $rp->value = $req->makanan;
                $rp->save();
            }
        }else{
            $makanan = $checkMakanan;
            $makanan->anamnesa_id = $anamnesa->id;
            $makanan->jenis_alergi = 'Makanan';
            $makanan->value = $req->makanan;
            $makanan->save();
        }
        
        $checkUmum = $anamnesa->umum->where('jenis_alergi','Umum')->first();
        if($checkUmum == null){
            if(!is_null($req->umum)){
                $rp = new Malergi;
                $rp->anamnesa_id = $anamnesa->id;
                $rp->pasien_id = $pasien_id;
                $rp->jenis_alergi = 'Umum';
                $rp->value = $req->umum;
                $rp->save();
            }
        }else{
            $umum = $checkUmum;
            $umum->anamnesa_id = $anamnesa->id;
            $umum->jenis_alergi = 'Umum';
            $umum->value = $req->umum;
            $umum->save();
        }
        Alert::success('Anamnesa Berhasil Di Update');
        return back();
        //return redirect('/pelayanan/medis/proses/'.$id.'/umum/anamnesa');
    }
}
