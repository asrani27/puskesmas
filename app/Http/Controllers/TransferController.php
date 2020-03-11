<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Alert;
use App\User;
use App\Tresep;
use App\Malergi;
use App\Mpasien;
use App\Mpegawai;
use App\Mriwayat;
use App\Mruangan;
use App\Tanamnesa;
use App\Tdiagnosa;
use App\Xtransfer;
use App\Tpelayanan;
use App\PasienPuskes;
use App\Tpendaftaran;
use App\Tresepdetail;
use App\Mjenispegawai;
use App\Tperiksafisik;
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
            PasienPuskes::truncate();
            Tpelayanan::truncate();
            Tanamnesa::truncate();
            Tperiksafisik::truncate();
            Malergi::truncate();
            Mriwayat::truncate();
            Tresep::truncate();
            Tdiagnosa::truncate();
            Tresepdetail::truncate();
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
        //0000000000019087
        
        $data = DB::connection('mysql2')->table('m_pasien')->get();
        $puskes = Auth::user()->puskes->first();
        $getData = $data->map(function($item, $key){
            $item->pendaftaran = DB::connection('mysql2')->table('t_pendaftaran')->where('pasien_id', $item->id)->get()->map(function($item, $key){
                $item->pelayanan = DB::connection('mysql2')->table('t_pelayanan')->where('pendaftaran_id', $item->id)->get()->map(function($item, $key){
                    $item->anamnesa = DB::connection('mysql2')->table('t_anamnesa')->where('pelayanan_id', $item->id)->get()->map(function($item, $key){
                        $item->alergipasien = DB::connection('mysql2')->table('m_alergipasien')->where('anamnesa_id', $item->id)->get();
                        $item->riwayatpasien = DB::connection('mysql2')->table('m_riwayatpasien')->where('anamnesa_id', $item->id)->get();
                        return $item;
                    });
                    $item->periksafisik = DB::connection('mysql2')->table('t_periksafisik')->where('pelayanan_id', $item->id)->get();
                    $item->diagnosa = DB::connection('mysql2')->table('t_diagnosa')->where('pelayanan_id', $item->id)->get();
                    $item->resep = DB::connection('mysql2')->table('t_resep')->where('pelayanan_id', $item->id)->get()->map(function($item){
                        $item->resep_detail = DB::connection('mysql2')->table('t_resep_detail')->where('resep_id', $item->id)->get();
                        return $item;
                    });
                    return $item;
                });
                return $item;
            });
            return $item;
        });
        //dd($getData->take(15));
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

                        foreach($item->anamnesa as $key => $anamnesa)
                        {
                            $a = new Tanamnesa;
                            $a->tanggal          = utf8_encode($anamnesa->tanggal);
                            $a->pelayanan_id     = $l->id;
                            $a->dokter_id        = $anamnesa->dokter_id;
                            $a->perawat_id       = $anamnesa->perawat_id;
                            $a->keluhan_utama    = utf8_encode($anamnesa->keluhan_utama);
                            $a->keluhan_tambahan = utf8_encode($anamnesa->keluhan_tambahan);
                            $a->lama_sakit_tahun = utf8_encode($anamnesa->lama_sakit_tahun);
                            $a->lama_sakit_bulan = utf8_encode($anamnesa->lama_sakit_bulan);
                            $a->lama_sakit_hari  = utf8_encode($anamnesa->lama_sakit_hari);
                            $a->merokok          = utf8_encode($anamnesa->merokok);
                            $a->alkohol          = utf8_encode($anamnesa->konsumsi_alkohol);
                            $a->sayur            = utf8_encode($anamnesa->kurang_sayur_buah);
                            $a->terapi           = utf8_encode($anamnesa->terapi);
                            $a->keterangan       = utf8_encode($anamnesa->keterangan);
                            $a->edukasi          = utf8_encode($anamnesa->edukasi);
                            $a->tindakan         = utf8_encode($anamnesa->rencana_tindakan);
                            $a->askep            = utf8_encode($anamnesa->askep);
                            $a->observasi        = utf8_encode($anamnesa->observasi);
                            $a->biopsikososial   = utf8_encode($anamnesa->biopsikososial);
                            $a->save();

                            foreach($anamnesa->alergipasien as $alergi)
                            {
                                $al = new Malergi;
                                $al->anamnesa_id = $a->id;
                                $al->jenis_alergi = $alergi->jenis_alergi;
                                $al->value = $alergi->value;
                                $al->save();
                            }
                            
                            foreach($anamnesa->riwayatpasien as $riwayat)
                            {
                                $ri = new Mriwayat;
                                $ri->anamnesa_id = $a->id;
                                $ri->jenis_riwayat = $riwayat->jenis_riwayat;
                                $ri->value = $riwayat->value;
                                $ri->save();
                            }
                        }

                        foreach($item->periksafisik as $key => $fisik)
                        {
                            $pp = new Tperiksafisik;
                            $pp->tanggal      = $fisik->tanggal;
                            $pp->pelayanan_id = $l->id;
                            $pp->dokter_id    = $fisik->dokter_id;
                            $pp->perawat_id   = $fisik->perawat_id;
                            $pp->sistole      = $fisik->sistole;
                            $pp->diastole     = $fisik->diastole;
                            $pp->detak_nadi   = $fisik->detak_nadi;
                            $pp->nafas         = $fisik->nafas;
                            $pp->detak_jantung = $fisik->detak_jantung;
                            $pp->suhu          = $fisik->suhu;
                            $pp->kesadaran     = $fisik->kesadaran;
                            $pp->triage        = $fisik->triage;
                            $pp->berat         = $fisik->berat;
                            $pp->tinggi        = $fisik->tinggi;
                            $pp->lingkar_perut = $fisik->lingkar_perut;
                            $pp->imt           = $fisik->imt;
                            $pp->hasil_imt     = $fisik->hasil_imt;
                            $pp->aktifitas_fisik = $fisik->aktifitas_fisik;
                            $pp->kulit             = $fisik->kulit;
                            $pp->kuku              = $fisik->kuku;
                            $pp->kepala            = $fisik->kepala;
                            $pp->wajah             = $fisik->wajah;
                            $pp->mata              = $fisik->mata;
                            $pp->telinga           = $fisik->telinga;
                            $pp->hidung_sinus      = $fisik->hidung_sinus;
                            $pp->mulut_bibir       = $fisik->mulut_bibir;
                            $pp->leher             = $fisik->leher;
                            $pp->dada_punggung     = $fisik->dada_punggung;
                            $pp->kardiovaskuler    = $fisik->kardiovaskuler;
                            $pp->dada_aksila       = $fisik->dada_aksila;
                            $pp->abdomen_perut     = $fisik->abdomen_perut;
                            $pp->ekstermitas_atas  = $fisik->ekstermitas_atas;
                            $pp->ekstermitas_bawah = $fisik->ekstermitas_bawah;
                            $pp->genitalia_wanita  = $fisik->genitalia_wanita;
                            $pp->genitalia_pria    = $fisik->genitalia_pria;
                            $pp->status_hamil      = $fisik->status_hamil;
                            $pp->skala_nyeri       = $fisik->skala_nyeri;
                            $pp->save();
                        }
                        
                        foreach($item->resep as $key => $rs)
                        {
                            $rr = new Tresep;
                            $rr->tanggal      = $rs->tanggal;
                            $rr->antrian      = $rs->antrean;
                            $rr->pelayanan_id = $l->id;
                            $rr->dokter_id    = $rs->dokter_id;
                            $rr->perawat_id   = $rs->perawat_id;
                            $rr->status_ambil = $rs->status_ambil;
                            $rr->save();

                            foreach($rs->resep_detail as $rd)
                            {
                                $rz = new Tresepdetail;
                                $rz->resep_id = $rr->id;
                                $rz->obat_id = $rd->obat_id;
                                $rz->obat_jumlah = $rd->obat_jumlah;
                                $rz->obat_signa = utf8_encode($rd->obat_signa);
                                $rz->aturan_pakai = $rd->aturan_pakai;
                                $rz->obat_racikan = $rd->obat_racikan;
                                $rz->obat_jumlah_permintaan = $rd->obat_jumlah_permintaan;
                                $rz->obat_keterangan = $rd->obat_keterangan;
                                $rz->save();
                            }   
                        }
                        foreach($item->diagnosa as $key => $diagnosa)
                        {
                            $rr = new Tdiagnosa;
                            $rr->tanggal        = $diagnosa->tanggal;
                            $rr->pelayanan_id   = $l->id;
                            $rr->dokter_id      = utf8_encode($diagnosa->dokter_id);
                            $rr->perawat_id     = utf8_encode($diagnosa->perawat_id);
                            $rr->diagnosa_id    = utf8_encode($diagnosa->diagnosa_id);
                            $rr->diagnosa_jenis = utf8_encode($diagnosa->diagnosa_jenis);
                            $rr->diagnosa_kasus = utf8_encode($diagnosa->diagnosa_kasus);
                            $rr->save();
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
