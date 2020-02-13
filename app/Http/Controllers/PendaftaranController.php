<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mpasien;
use App\Masuransi;
use App\Mkelurahan;
use Alert;

class PendaftaranController extends Controller
{
    public function __construct()
    {

    }

    public function pasien()
    {
        $data = Mpasien::all();
        return view('puskes.pasien.pasien',compact('data'));
    }

    public function addPasien()
    {
        $asuransi = Masuransi::all();
        $kelurahan = Mkelurahan::all()->sortBy('nama');
        return view('puskes.pasien.addpasien',compact('asuransi','kelurahan'));
    }

    public function storePasien(Request $req)
    {
        $this->validate($req,[
            'asuransi_id' => 'required',
            'nama'        => 'required',
            'no_asuransi' => 'numeric',
            'nik'         => 'numeric',
        ],$this->messages());

        return back();
    }

    public function messages()
    {
        return [
            'required' => 'Kolom wajib di isi!',
            'numeric'  => 'Isi Kolom Harus Angka!',
        ];
    }
}
