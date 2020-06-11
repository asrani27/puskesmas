<?php

namespace App\Http\Controllers;

use App\Mpegawai;
use App\Mruangan;
use App\Minstalasi;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function dataMaster()
    {
        $ruang = count(Mruangan::all());
        return view('master.index',compact('ruang'));
    }

    public function poli()
    {
        $data = Mruangan::all();
        return view('master.ruangan.index',compact('data'));
    }

    public function addPoli()
    {
        $int = Minstalasi::all();
        return view('master.ruangan.create',compact('int'));
    }

    public function editPoli($id)
    {
        $data = Mruangan::find($id);
        $int = Minstalasi::all();
        return view('master.ruangan.edit',compact('data','int'));
    }
    
    public function updatePoli(Request $req, $id)
    {
        $s               = Mruangan::find($id);
        $s->instalasi_id = $req->instalasi_id;
        $s->nama         = $req->nama;
        $s->is_aktif     = $req->is_aktif;
        $s->save();
        toast('Poli berhasil Di Update','success');
        return redirect('/pengaturan/data_master/poli');
    }

    public function deletePoli($id)
    {
        $check = Mruangan::find($id)->pelayanan->first();
        if($check == null){
            $del = Mruangan::find($id)->delete();
            toast('Poli Berhasil Di Hapus', 'success');
        }else{
            toast('Poli Tidak Dapat Di Hapus Karena Ada Riwayat Pendaftaran', 'info');
        }
        return back();
    }

    public function storePoli(Request $req)
    {
        $id_ruangan      = convertruangan((int) Mruangan::orderBy('id','DESC')->first()->id + 1);
        $s               = new Mruangan;
        $s->id           = $id_ruangan;
        $s->instalasi_id = $req->instalasi_id;
        $s->urutan       = (int) $id_ruangan;
        $s->nama         = $req->nama;
        $s->is_aktif     = $req->is_aktif;
        $s->save();
        toast('Poli berhasil Di Simpan','success');
        return redirect('/pengaturan/data_master/poli');
    }

    public function pegawai()
    {
        $data = Mpegawai::all();
        return view('master.pegawai.index',compact('data'));
    }
}
