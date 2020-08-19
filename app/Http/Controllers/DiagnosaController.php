<?php

namespace App\Http\Controllers;

use Alert;
use App\Mdiagnosa;
use App\Tdiagnosa;
use Carbon\Carbon;
use App\Mdiagnosainduk;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{

    public function index()
    {
        return view('master.diagnosa.index', [
            'data' => Mdiagnosa::paginate(10)
        ]);
    }

    public function add()
    {
        return view('master.diagnosa.create', [
            'diagnosaInduk' => Mdiagnosainduk::get()
        ]);
    }

    public function store(Request $req)
    {
        $attr = $req->all();

        Mdiagnosa::create($attr);

        toast('Data Berhasil Di Tambahkan', 'success');
        return back();
    }

    public function edit(Mdiagnosa $diagnosa)
    {
        return view('master.diagnosa.edit', [
            'data' => $diagnosa,
            'diagnosaInduk' => Mdiagnosainduk::get()
        ]);
    }

    public function update(Request $req, Mdiagnosa $diagnosa)
    {
        $diagnosa->update($req->all());
        toast('Data Berhasil Di Update', 'success');
        return redirect('/pengaturan/dm/diagnosa');
    }

    public function delete(Mdiagnosa $diagnosa)
    {
        $diagnosa->delete();
        toast('Data Berhasil Di Hapus', 'success');
        return back();
    }

    public function storeDiagnosa(Request $req, $id)
    {
        $tanggal = Carbon::now();
        $diagnosa = new Tdiagnosa;
        $diagnosa->tanggal      = $tanggal;
        $diagnosa->pelayanan_id = $id;
        $diagnosa->dokter_id    = $req->dokter_id;
        $diagnosa->perawat_id   = $req->perawat_id;
        $diagnosa->diagnosa_id  = $req->diagnosa_id;
        $diagnosa->diagnosa_kasus  = $req->diagnosa_kasus;
        $diagnosa->diagnosa_jenis  = $req->diagnosa_jenis;
        $diagnosa->save();
        toast('Diagnosa Berhasil Di Simpan', 'success');
        return back();
    }
    
    public function deleteDiagnosa($id, $id_diagnosa)
    {
        $del = Tdiagnosa::find($id_diagnosa)->delete();
        return back();
    }
}
