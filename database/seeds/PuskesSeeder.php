<?php

use Illuminate\Database\Seeder;
use App\Mpuskesmas;

class PuskesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = new Mpuskesmas;
        $n->nama      = "PEKAUMAN";
        $n->alamat    = "Jl. KS Tubun No. 151, Kec. Banjarmasin Selatan";
        $n->telp      = "0511-435455";
        $n->kecamatan = "Banjarmasin Selatan";
        $n->kelurahan = "pekauman";
        $n->save();

        $x = new Mpuskesmas;
        $x->nama      = "BERUNTUNG RAYA";
        $x->alamat    = "Jalan AMD, Tj. Pagar, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70247";
        $x->telp      = "0511-435455";
        $x->kecamatan = "Banjarmasin Selatan";
        $x->kelurahan = "AMD Pagar";
        $x->save();
    }
}
