<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Alert;
use App\User;
use App\Mpasien;
use App\Mpegawai;
use App\Mruangan;
use App\Tanamnesa;
use App\Xtransfer;
use App\Tpelayanan;
use App\Tpendaftaran;
use App\Mjenispegawai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $data = Xtransfer::all();
        return view('puskes.transfer.index',compact('data'));
    }

    public function lihat($id)
    {
        if($id == 1){
            $data = Mpasien::paginate(10);
            return view('puskes.transfer.pasien',compact('data'));
        }elseif($id == 2){
            $data = Mruangan::paginate(10);
            return view('puskes.transfer.ruangan',compact('data'));
        }elseif($id == 4){
            
        }
    }

    public function sinkron($id)
    {
        if($id == 1){
            $this->pasien_pendaftaran($id);
            Alert::success('Syncrone Data Pasien Berhasil')->autoClose(50000);
            return back();
        }elseif($id == 2){
            $this->ruangan($id);
            Alert::success('Syncrone Data Ruangan Berhasil')->autoClose(50000);
            return back();
        }elseif($id == 4){
            $this->jenisPegawai($id);
            Alert::success('Syncrone Data Jenis Pegawai Berhasil')->autoClose(50000);
            return back();
        }elseif($id == 5){
            $this->pegawai($id);
            Alert::success('Syncrone Data Pegawai Berhasil')->autoClose(50000);
            return back();
        }
    }

    public function truncate($id)
    {
        if($id == 1){
            DB::statement("SET foreign_key_checks=0");
            Mpasien::truncate();
            Tpendaftaran::truncate();
            Tpelayanan::truncate();
            Tanamnesa::truncate();
            DB::statement("SET foreign_key_checks=1");
            $u = Xtransfer::find($id);
            $u->status = 0;
            $u->save();
            Alert::info("Data Berhasil Di Kosongkan");
            return back();
        }elseif($id == 2){
            DB::statement("SET foreign_key_checks=0");
            Mruangan::truncate();
            DB::statement("SET foreign_key_checks=1");
            $u = Xtransfer::find($id);
            $u->status = 0;
            $u->save();
            Alert::info("Data Berhasil Di Kosongkan");
            return back();
        }elseif($id == 4){
            DB::statement("SET foreign_key_checks=0");
            Mjenispegawai::truncate();
            DB::statement("SET foreign_key_checks=1");
            $u = Xtransfer::find($id);
            $u->status = 0;
            $u->save();
            Alert::info("Data Berhasil Di Kosongkan");
            return back();
        }elseif($id == 5){
            DB::statement("SET foreign_key_checks=0");
            Mpegawai::truncate();
            DB::statement("SET foreign_key_checks=1");
            $u = Xtransfer::find($id);
            $u->status = 0;
            $u->save();
            Alert::info("Data Berhasil Di Kosongkan");
            return back();
        }
    }
    public function pasien_pendaftaran($id)
    {
        $data = DB::connection('mysql2')->table('m_pasien')->get();
        $puskes = Auth::user()->puskes->first();
        $getData = $data->map(function($item, $key){
            $item->pendaftaran = DB::connection('mysql2')->table('t_pendaftaran')->where('pasien_id', $item->id)->get()->map(function($item, $key){
                $item->pelayanan = DB::connection('mysql2')->table('t_pelayanan')->where('pendaftaran_id', $item->id)->get()->map(function($item, $key){
                    $item->anamnesa = DB::connection('mysql2')->table('t_anamnesa')->where('pelayanan_id', $item->id)->get();
                    return $item;
                });
                return $item;
            });
            return $item;
        });
        //dd($getData->take(4));
        $store = $getData->map(function($item, $key)use($puskes){
            if($item->asuransi_id == '0000'){
                $asuransi_id = 1;
            }elseif($item->asuransi_id == '0001'){
                $asuransi_id = 2;
            }elseif($item->asuransi_id == '0002'){
                $asuransi_id = 3;
            }
                $s = new Mpasien;
                $s->no_rm_lama   = $item->no_rm_lama;
                $s->no_dok_rm    = $item->no_dok_rm;
                $s->no_asuransi  = $item->no_asuransi;
                $s->asuransi_id  = $asuransi_id;
                $s->nama         = $item->nama;
                $s->nik          = $item->nik;
                $s->jkel         = $item->jenis_kelamin;
                $s->tempat_lahir = $item->tempat_lahir;
                $s->tgl_lahir    = $item->tanggal_lahir;
                $s->kelurahan_id = $item->kelurahan_id;
                $s->alamat       = $item->alamat;
                $s->save();
                $s->puskes()->attach($puskes);

                foreach($item->pendaftaran as $key => $value)
                {
                    $p = new Tpendaftaran;
                    $p->tanggal          = $value->tanggal;
                    $p->pasien_id         = $s->id;
                    $p->umur_tahun        = $value->umur_tahun;
                    $p->umur_bulan        = $value->umur_bulan;
                    $p->umur_hari         = $value->umur_hari;
                    $p->penanggung_jawab  = $value->penanggung_jawab_pasien;
                    $p->hubungan          = $value->hubungan_dengan_pasien;
                    $p->no_hp_penanggung  = $value->no_hp_penanggung;
                    $p->kunjungan         = $value->kunjungan;
                    $p->status            = $value->status;
                    $p->asuransi_id       = $asuransi_id;
                    $p->no_asuransi       = $value->no_asuransi;
                    $p->status_prolanis   = $value->status_pstprol;
                    $p->status_prb        = $value->status_pstprb;
                    $p->rujukan_dari      = $value->rujukan_dari;
                    $p->nama_perujuk      = $value->nama_perujuk;
                    $p->puskesmas_id      = $puskes->id;
                    $p->status_periksa    = 2;
                    $p->save();
                    
                    foreach($value->pelayanan as $key => $item)
                    {
                        $l = new Tpelayanan;
                        $l->pendaftaran_id = $p->id;
                        $l->ruangan_id     = (int)$item->ruangan_id;
                        $l->instalasi_id   = (int)$item->instalasi_id;
                        $l->statuspulang_id= $item->statuspulang_id == null ? null : (int)$item->statuspulang_id;
                        $l->tgl_mulai      = $item->tanggal_mulai;
                        $l->tgl_selesai    = $item->tanggal_selesai;
                        $l->tanggal        = $item->tanggal;
                        $l->kamar_id       = $item->kamar_id;
                        $l->save();

                        foreach($item->anamnesa as $key => $value)
                        {
                            $a = new Tanamnesa;
                            $a->tanggal          = utf8_encode($value->tanggal);
                            $a->pelayanan_id     = $l->id;
                            $a->dokter_id        = $value->dokter_id;
                            $a->perawat_id       = $value->perawat_id;
                            $a->keluhan_utama    = utf8_encode($value->keluhan_utama);
                            $a->keluhan_tambahan = utf8_encode($value->keluhan_tambahan);
                            $a->lama_sakit_tahun = utf8_encode($value->lama_sakit_tahun);
                            $a->lama_sakit_bulan = utf8_encode($value->lama_sakit_bulan);
                            $a->lama_sakit_hari  = utf8_encode($value->lama_sakit_hari);
                            $a->merokok          = utf8_encode($value->merokok);
                            $a->alkohol          = utf8_encode($value->konsumsi_alkohol);
                            $a->sayur            = utf8_encode($value->kurang_sayur_buah);
                            $a->terapi           = utf8_encode($value->terapi);
                            $a->keterangan       = utf8_encode($value->keterangan);
                            $a->edukasi          = utf8_encode($value->edukasi);
                            $a->tindakan         = utf8_encode($value->rencana_tindakan);
                            $a->askep            = utf8_encode($value->askep);
                            $a->observasi        = utf8_encode($value->observasi);
                            $a->biopsikososial   = utf8_encode($value->biopsikososial);
                            $a->save();
                        }
                    }
                }
            return $item;
        });
        $u = Xtransfer::find($id);
        $u->status = 1;
        $u->save();
        return $u;
    }

    public function ruangan($id)
    {   
        $data = DB::connection('mysql2')->table('m_ruangan')->get();
        $map = $data->map(function($item, $key){
            $item->id = (int) $item->id;
            $item->instalasi_id = (int) $item->instalasi_id;
            return $item;
        });
        foreach($map as $key => $value){
            $s = new Mruangan;
            $s->id = $value->id;
            $s->instalasi_id = $value->instalasi_id;
            $s->nama = $value->nama;
            $s->save();
        }
        $u = Xtransfer::find($id);
        $u->status = 1;
        $u->save();
        return $s;
    }

    public function jenisPegawai($id)
    {
        $data = DB::connection('mysql2')->table('m_jenispegawai')->get();
        foreach($data as $key => $value){
            $s = new Mjenispegawai;
            $s->id = $value->id;
            $s->kelompok_pegawai = $value->kelompok_pegawai;
            $s->nama = $value->nama;
            $s->save();
        }
        $u = Xtransfer::find($id);
        $u->status = 1;
        $u->save();
        return $s;
    }

    public function pegawai($id)
    {
        $data = DB::connection('mysql2')->table('m_pegawai')->get()->toArray();
        $puskesmas_id = Auth::user()->puskes->first()->id;
        foreach($data as $key => $value){
            $s = new Mpegawai;
            $s->id                  = $value->id;
            $s->jenispegawai_id     = $value->jenispegawai_id;
            $s->puskesmas_id        = $puskesmas_id;
            $s->nip                 = $value->nip;
            $s->nama                = utf8_encode($value->nama);
            $s->jkel                = $value->jenis_kelamin;
            $s->tgl_lahir           = $value->tanggal_lahir;
            $s->tempat_lahir        = $value->tempat_lahir;
            $s->pendidikan_terakhir = $value->pendidikan_terakhir;
            $s->tahun_lulus         = $value->tahun_lulus;
            $s->status_kepegawaian  = $value->status_kepegawaian;
            $s->tmt_jabatan         = $value->tmt_jabatan;
            $s->tempat_kerja        = $value->tempat_kerja;
            $s->ket_tempat_kerja    = $value->ket_tempat_kerja;
            $s->mulai_kerja         = $value->mulai_kerja;
            $s->save();
        }
        $u = Xtransfer::find($id);
        $u->status = 1;
        $u->save();
        return $u;
    }
}
