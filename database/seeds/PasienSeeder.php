<?php

use Illuminate\Database\Seeder;
use App\Mpasien;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Mpasien;
        $s->no_kk             = '1234567890123456';
        $s->nik               = '1234567890123456';
        $s->nama              = 'Andy Lau';
        $s->jkel              = 'L';
        $s->tempat_lahir      = 'Banjarmasin';
        $s->tgl_lahir         = '1990-04-09';
        $s->gol_darah         = 'O';
        $s->pendidikan        = 'D3 manajemen Informatika';
        $s->status_perkawinan = 'KAWIN';
        $s->status_keluarga   = 'KEPALA KELUARGA';
        $s->warga_negara      = 'INDONESIA';
        $s->nama_ayah         = 'Udin';
        $s->nama_ibu          = 'Syahrini';
        $s->alamat            = 'Jl Pramuka Km 6';
        $s->no_hp             = '087814414887';
        $s->rt                = '007';
        $s->rw                = '003';
        $s->asuransi_id       = '2';
        $s->no_asuransi        = '8888231234';
        $s->save();
    }
}
