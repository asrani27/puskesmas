<?php

namespace App\Http\Controllers;

use App\Mruangan;
use Carbon\Carbon;
use App\Tpelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function medis()
    {
        $data = Tpelayanan::orderBy('created_at','desc')->paginate(10);
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

    public function searchTglLahir(Request $req)
    {
        $search = Carbon::parse($req->tanggal)->format('Y-m-d');
        $data = Tpelayanan::whereHas('pendaftaran', function ($item) use ($search){
                $item->whereHas('pasien', function ($item) use ($search){
                    $item->where('tgl_lahir', 'like', '%'.$search.'%');
                });
        })->paginate(10);
        $data->appends($req->only('search'));
        $req->flash();
        $ruangan = Mruangan::orderBy('nama','desc')->get();
        return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
    }

    public function anamnesa($id)
    {
        $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
        if($checkAnamnesa == null){
            return view('create');
        }
        else{
            return view('ubah');
        }
    }
}
