<?php

namespace App\Http\Controllers;

use App\Malergi;
use App\Mlookup;
use App\Mpegawai;
use App\Mriwayat;
use App\Mruangan;
use App\Tanamnesa;
use Carbon\Carbon;
use App\Tpelayanan;
use App\Tperiksafisik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PelayananController extends Controller
{
    public function medis()
    {
        $today = Carbon::today()->format('Y-m-d');
        $data = Tpelayanan::where('tanggal','LIKE', $today.'%')->orderBy('created_at','desc')->paginate(10);
        $ruangan = Mruangan::orderBy('nama','desc')->get();
        return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
    }

    public function proses($id)
    {
        $data = Tpelayanan::find($id);
        return view('puskes.pelayanan.medis.detail',compact('data'));
    }

    public function search(Request $req)
    {
        $search = $req->search;
        $data = Tpelayanan::whereHas('pendaftaran', function ($item) use ($search){
                $item->whereHas('pasien', function ($item) use ($search){
                    $item->where('nama', 'like', '%'.$search.'%');
                    $item->orWhere('id', 'like', '%'.$search.'%');
                    $item->orWhere('nik', 'like', '%'.$search.'%');
                });
        })->paginate(10);
        $data->appends($req->only('search'));
        $req->flash();
        $ruangan = Mruangan::orderBy('nama','desc')->get();
        return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
    }

    public function searchTanggal(Request $req)
    {
        $tanggal = Carbon::parse($req->tanggal)->format('Y-m-d');
        $data = Tpelayanan::where('tanggal','LIKE', $tanggal.'%')->orderBy('created_at','desc')->paginate(10);
        $req->flash();
        $ruangan = Mruangan::orderBy('nama','desc')->get();
        return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
    }

    public function umumAnamnesa($id)
    {
        $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
        if($checkAnamnesa == null)
        {
            $data = Tpelayanan::find($id);
            $keluhan = Mlookup::where('for','keluhan')->get();
            $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
            $tenagamedis = Mpegawai::all()->map(function($item, $key){
                $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                $item->nama_tenaga_medis = $item->jenispegawai->nama;
                return $item;
            });
            $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
            $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
            return view('puskes.pelayanan.medis.anamnesa.umum.create',compact('data','keluhan','dokter', 'perawat','kesadaran'));
        }else{
            $anamnesa = $checkAnamnesa;
            $data = Tpelayanan::find($id);    
            $keluhan = Mlookup::where('for','keluhan')->get();
            $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
            $tenagamedis = Mpegawai::all()->map(function($item, $key){
                $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                $item->nama_tenaga_medis = $item->jenispegawai->nama;
                return $item;
            });
            $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
            $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
            
            return view('puskes.pelayanan.medis.anamnesa.umum.edit',compact('data','keluhan','dokter', 'perawat','kesadaran','id','anamnesa'));
        }
     
    }
    public function storeAnamnesa(Request $req, $id)
    {
        $dokter_id = convertid($req->dokter_id);
        $perawat_id = convertid($req->perawat_id);
        
        //ubah status periksa
        $pel = Tpelayanan::find($id)->pendaftaran;
        $pel->status_periksa = 1;
        $pel->save();
        
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
        $anamnesa->alkohol          = $req->alkohol;
        $anamnesa->sayur            = $req->sayur;
        $anamnesa->terapi           = $req->terapi;
        $anamnesa->keterangan       = $req->keterangan;
        $anamnesa->edukasi          = $req->edukasi;
        $anamnesa->tindakan         = $req->tindakan;
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
            $rp->anamnesa_id = $anamnesa->id;
            $rp->jenis_riwayat = 'Riwayat Penyakit Sekarang';
            $rp->value = $req->riwayat_penyakit_sekarang;
            $rp->save();
        }

        if(!is_null($req->riwayat_penyakit_dulu)){
            $rp = new Mriwayat;
            $rp->anamnesa_id = $anamnesa->id;
            $rp->jenis_riwayat = 'Riwayat Penyakit Dulu';
            $rp->value = $req->riwayat_penyakit_dulu;
            $rp->save();
        }
        
        if(!is_null($req->riwayat_penyakit_keluarga)){
            $rp = new Mriwayat;
            $rp->anamnesa_id = $anamnesa->id;
            $rp->jenis_riwayat = 'Riwayat Penyakit Keluarga';
            $rp->value = $req->riwayat_penyakit_keluarga;
            $rp->save();
        }

        //Simpan Alergi Pasien
        if(!is_null($req->obat)){
            $ap = new Malergi;
            $ap->anamnesa_id = $anamnesa->id;
            $ap->jenis_alergi = 'Obat';
            $ap->value = $req->obat;
            $ap->save();
        }
        
        if(!is_null($req->makanan)){
            $ap = new Malergi;
            $ap->anamnesa_id = $anamnesa->id;
            $ap->jenis_alergi = 'Makanan';
            $ap->value = $req->makanan;
            $ap->save();
        }
        
        if(!is_null($req->umum)){
            $ap = new Malergi;
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
        $dokter_id = convertid($req->dokter_id);
        $perawat_id = convertid($req->perawat_id);
        
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
        $anamnesa->alkohol          = $req->alkohol;
        $anamnesa->sayur            = $req->sayur;
        $anamnesa->terapi           = $req->terapi;
        $anamnesa->keterangan       = $req->keterangan;
        $anamnesa->edukasi          = $req->edukasi;
        $anamnesa->tindakan         = $req->tindakan;
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
        if($checkRPS == null){
            if(!is_null($req->riwayat_penyakit_sekarang)){
                $rp = new Mriwayat;
                $rp->anamnesa_id = $anamnesa->id;
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
        return redirect('/pelayanan/medis/proses/'.$id.'/umum/anamnesa');
    }

    public function umumDiagnosa($id)
    {
        $data = Tpelayanan::find($id);
        $tenagamedis = Mpegawai::all()->map(function($item, $key){
            $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
            $item->nama_tenaga_medis = $item->jenispegawai->nama;
            return $item;
        });
        $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
        $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
        $diagnosa = DB::table('m_diagnosa')->select('id')->paginate(10);
        
        return view('puskes.pelayanan.medis.diagnosa.umum.create',compact('data','dokter','perawat','diagnosa'));
    }

    public function umumResep($id)
    {
        $data = Tpelayanan::find($id);
        return view('puskes.pelayanan.medis.resep.umum.create',compact('data'));
    }

    public function medisPoli(Request $req)
    {
        $data = Tpelayanan::where('ruangan_id', $req->ruangan_id)->orderBy('tanggal','desc')->paginate(10);
        $ruangan = Mruangan::orderBy('nama','desc')->get();
        $req->flash();
        return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
    }
}
