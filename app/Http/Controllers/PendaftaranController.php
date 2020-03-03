<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mpasien;
use App\Masuransi;
use App\Mkelurahan;
use App\Mpuskesmas;
use App\Mruangan;
use App\Tpendaftaran;
use App\Tpelayanan;
use Alert;
use Auth;
use DataTables;
use Carbon\Carbon;
use DateTime;
use DB;

class PendaftaranController extends Controller
{
    public function __construct()
    {

    }

    public function pasien()
    {
        $data = Mpasien::orderBy('created_at', 'desc')->paginate(10);
        return view('puskes.pasien.pasien',compact('data'));
    }

    public function editPasien($id)
    {
        $data = Mpasien::find($id);
        return view('puskes.pasien.editpasien',compact('data'));
    }

    public function viewPasien($id)
    {
        $data = Mpasien::find($id);
        return view('puskes.pasien.viewpasien',compact('data'));
    }

    public function search(Request $req)
    {   
        $data = Mpasien::where('nama', 'LIKE', '%'.$req->search.'%')
                ->orWhere('no_rm_lama','LIKE', '%'.$req->search.'%')
                ->orWhere('nik','LIKE', '%'.$req->search.'%')
                ->orWhere('no_kk','LIKE', '%'.$req->search.'%')
                ->orWhere('no_asuransi','LIKE', '%'.$req->search.'%')
                ->orWhere('tempat_lahir','LIKE', '%'.$req->search.'%')
                ->paginate(10);
        $data->appends($req->only('search'));
        return view('puskes.pasien.pasien',compact('data'));

    }

    public function addPasien()
    {
        $kota            = DB::table('m_kota')->where('nama','KOTA BANJARMASIN')->first()->id;
        $kecamatan       = DB::table('m_kecamatan')->select('id')->whereIn('kota_id', [$kota])->pluck('id');
        $kelurahan       = DB::table('m_kelurahan')->whereIn('kecamatan_id', [$kecamatan])->get();
        $asuransi        = DB::table("m_asuransi")->get();
        $pekerjaan       = DB::table('m_pekerjaan')->get();
        $goldarah        = DB::table('m_goldarah')->get();
        $agama           = DB::table('m_agama')->get();
        $pendidikan      = DB::table('m_pendidikan')->get();
        $statuskawin     = DB::table('m_status_kawin')->get();
        $statuskeluarga  = DB::table('m_status_keluarga')->get();

        return view('puskes.pasien.addpasien',compact(
        'asuransi',
        'kelurahan',
        'pekerjaan',
        'goldarah',
        'agama',
        'pendidikan',
        'statuskawin',
        'statuskeluarga'
        ));
    }

    public function storePasien(Request $req)
    {
        $tgl_lahir = $req->tgl_lahir == null ? null : Carbon::parse($req->tgl_lahir)->format('Y-m-d');
        $puskes = Auth::user()->puskes->first();
        $s = new Mpasien;
        $s->no_rm_lama         = strtoupper($req->no_rm_lama);
        $s->no_dok_rm          = strtoupper($req->no_dok_rm);
        $s->asuransi_id        = $req->asuransi_id;
        $s->no_asuransi        = strtoupper($req->no_asuransi);
        $s->no_kk              = $req->no_kk;
        $s->nik                = $req->nik;
        $s->nama               = strtoupper($req->nama);
        $s->jkel               = $req->jkel;
        $s->tgl_lahir          = $tgl_lahir;
        $s->tempat_lahir       = strtoupper($req->tempat_lahir);
        $s->goldarah_id        = $req->goldarah_id;
        $s->email              = strtoupper($req->email);
        $s->no_hp              = $req->no_hp;
        $s->kelurahan_id       = $req->kelurahan_id;
        $s->alamat             = strtoupper($req->alamat);
        $s->rt                 = $req->rt;
        $s->rw                 = $req->rw;
        $s->pekerjaan_id       = $req->pekerjaan_id;
        $s->agama_id           = $req->agama_id;
        $s->pendidikan_id      = $req->pendidikan_id;
        $s->status_kawin_id    = $req->status_kawin_id;
        $s->status_keluarga_id = $req->status_keluarga_id;
        $s->warganegara        = $req->warganegara;
        $s->nama_ayah          = strtoupper($req->nama_ayah);
        $s->nama_ibu           = strtoupper($req->nama_ibu);
        $s->save();
        
        $s->puskes()->attach($puskes);

        toast('Data Pasien Berhasil Disimpan','success');
        return redirect('/pendaftaran/pasien');
    }

    public function create($id)
    { 
        $data = Mpasien::find($id);
        $ruangan = Mruangan::orderBy('nama','asc')->get();
        return view('puskes.pasien.pendaftaran',compact('data','ruangan'));
    }

    public function messages()
    {
        return [
            'min'      => 'Harap Isi 16 Digit',
            'max'      => 'Harap Isi 16 Digit',
            'required' => 'Kolom wajib di isi!',
            'numeric'  => 'Isi Kolom Harus Angka!',
        ];
    }

    public function delete($id)
    {
        $del = Mpasien::find($id)->delete();
        toast('Data Pasien Berhasil Dihapus','success');
        return back();
    }

    public function pendaftaran()
    {
        $data = Tpendaftaran::orderBy('tanggal', 'desc')->paginate(10);
        return view('puskes.daftar.pendaftaran',compact('data'));
    }

    public function rekamMedis()
    {   
        $data = Mpasien::orderBy('created_at', 'desc')->paginate(10);
        return view('puskes.rm.rekam_medis',compact('data'));
    }

    public function pendaftaranSearch(Request $req)
    {
        $search = $req->search;
        $data = Tpendaftaran::where('pasien_id', 'LIKE', '%' . $search . '%')
        ->orWhere('no_asuransi','LIKE', '%'.$search.'%')
        ->orwhereHas('pasien', function ($item) use ($search){
            $item->where('nama', 'like', '%'.$search.'%');
            $item->orWhere('nik', 'like', '%'.$search.'%');
        })->paginate(10);
        $data->appends($req->only('search'));
        return view('puskes.daftar.pendaftaran',compact('data'));
    }

    public function searchTglLahir(Request $req)
    {
        $tanggal = Carbon::parse($req->tanggal)->format('Y-m-d');
        $data = Mpasien::where('tgl_lahir', $tanggal)->paginate(10);
        
        return view('puskes.pasien.pasien',compact('data'));
    }

    public function daftarPelayanan(Request $req,$id)
    {
        $pasien = Mpasien::find($id);
        $tahun = Tahun($pasien->tgl_lahir);
        $bulan = Bulan($pasien->tgl_lahir);
        $hari  = Hari($pasien->tgl_lahir);
        
        $t = new Tpendaftaran;
        $t->tanggal          = $req->tanggal;
        $t->pasien_id        = $req->pasien_id;
        $t->umur_tahun       = $tahun; 
        $t->umur_bulan       = $bulan;
        $t->umur_hari        = $hari;
        $t->penanggung_jawab = $req->penanggung_jawab;
        $t->hubungan         = $req->hubungan;
        $t->no_hp_penanggung = $req->no_hp_penanggung;
        $t->kunjungan        = $req->kunjungan;
        $t->status           = $req->status;
        $t->asuransi_id      = $pasien->asuransi_id;
        $t->no_asuransi      = $req->no_asuransi;
        $t->tarif            = $req->tarif;
        $t->rujukan_dari     = $req->rujukan_dari;
        $t->nama_perujuk     = $req->nama_perujuk;
        $t->puskesmas_id     = Auth::user()->puskes->first()->id;
        $t->status_periksa   = 0;
        $t->save();

        $p = new Tpelayanan;
        $p->tanggal        = $req->tanggal;
        $p->ruangan_id     = $req->ruangan_id;
        $p->pendaftaran_id = $t->id;
        $p->instalasi_id   = Mruangan::find($req->ruangan_id)->first()->instalasi->id;
        $p->save();

        toast('berhasil Di Daftarkan', 'success');
        return redirect('/pendaftaran');
    }

    public function getKelurahan($id)
    {
        $data      = Mkelurahan::find($id);
        $kecamatan = $data->kecamatan;
        $kota      = $kecamatan->kota;
        $provinsi  = $kota->provinsi;
        return response()->json([$kecamatan, $kota, $provinsi]);
        
    }
}
