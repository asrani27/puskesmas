<?php

use Illuminate\Database\Seeder;
use App\Masuransi;

class AsuransiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Masuransi;
        $s->jenis = "UMUM";
        $s->nama = "Umum";
        $s->save();
        
        $s = new Masuransi;
        $s->jenis = "BPJS";
        $s->nama = "BPJS Kesehatan";
        $s->save();
        
        $s = new Masuransi;
        $s->jenis = "PEMERINTAH";
        $s->nama = "Pemerintah Daerah Kota";
        $s->save();
    }
}
