<?php

namespace App\Http\Controllers;

use App\Mlookup;
use App\Mruangan;
use App\Tanamnesa;
use Carbon\Carbon;
use App\Tpelayanan;
use Illuminate\Http\Request;

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
        if($checkAnamnesa == null){
            
            $data = Tpelayanan::find($id);
            $keluhan = Mlookup::where('for','keluhan')->get();
            return view('puskes.pelayanan.medis.anamnesa.umum.create',compact('data','keluhan'));
        }
        else{
            return view('ubah');
        }
    }

    public function umumDiagnosa($id)
    {
        $data = Tpelayanan::find($id);
        return view('puskes.pelayanan.medis.diagnosa.umum.create',compact('data'));
    }

    public function umumResep($id)
    {
        $data = Tpelayanan::find($id);
        return view('puskes.pelayanan.medis.resep.umum.create',compact('data'));
    }

    public function medisPoli(Request $req)
    {
        
        $data = Tpelayanan::where('ruangan_id', $req->ruangan_id)->orderBy('created_at','desc')->paginate(10);
        $ruangan = Mruangan::orderBy('nama','desc')->get();
        $req->flash();
        return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
    }
}
