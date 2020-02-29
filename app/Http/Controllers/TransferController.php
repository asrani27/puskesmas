<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;
use App\User;
use App\Xtransfer;
use App\Mpasien;
use App\Tpendaftaran;
use App\Mruangan;
use App\Tpelayanan;
use DB;

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
        }
    }

    public function truncate($id)
    {
        if($id == 1){
            DB::statement("SET foreign_key_checks=0");
            Mpasien::truncate();
            Tpendaftaran::truncate();
            Tpelayanan::truncate();
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
        }
    }
    public function pasien_pendaftaran($id)
    {
        $data = DB::connection('mysql2')->table('m_pasien')->get();
        $puskes = Auth::user()->puskes->first();
        $getData = $data->map(function($item, $key){
            $item->pendaftaran = DB::connection('mysql2')->table('t_pendaftaran')->where('pasien_id', $item->id)->get()->map(function($item, $key){
                $item->pelayanan = DB::connection('mysql2')->table('t_pelayanan')->where('pendaftaran_id', $item->id)->get();
                return $item;
            });
            return $item;
        });
        
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
                        $l->kamar_id       = $item->kamar_id;
                        $l->save();
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
}
