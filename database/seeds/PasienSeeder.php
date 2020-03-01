<?php

use Illuminate\Database\Seeder;
use App\Mpasien;
use App\Mpuskesmas;
use DB;
use App\Tpendaftaran;
use App\Tpelayanan;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::connection('mysql2')->table('m_pasien')->get();
        $puskes = Mpuskesmas::first();
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
    }
}
