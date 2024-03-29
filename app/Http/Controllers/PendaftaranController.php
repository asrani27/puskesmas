<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Alert;
use DateTime;
use DataTables;
use App\Mpasien;
use App\Mruangan;
use App\Masuransi;
use App\Mdiagnosa;
use Carbon\Carbon;
use App\Mkelurahan;
use App\Mpuskesmas;
use App\Tpelayanan;
use App\Tpendaftaran;

class PendaftaranController extends Controller
{

    public function __construct()
    {
       //dd(Auth()->user());
    }

    public function selectKelurahan(Request $req)
    {
        if($req->searchTerm == null){
            $data = null;
        }else{
            $data = Mkelurahan::where('nama', 'LIKE', $req->searchTerm.'%')->get()->take(10)->toArray();
            return json_encode($data);
        }
    }

    public function selectDiagnosa(Request $req)
    {
        if($req->searchTerm == null){
            $data = null;
        }else{
            $data = Mdiagnosa::where('id', 'LIKE', $req->searchTerm.'%')->orWhere('value', 'LIKE', $req->searchTerm.'%')->get()->take(10)->toArray();
            return json_encode($data);
        }
    }

    public function pasien()
    {
        $data = Mpasien::orderBy('created_at', 'desc')->paginate(10);
        return view('puskes.pasien.pasien',compact('data'));
    }

    public function editPasien($id)
    {
        $data = Mpasien::find($id);
        
        $kota            = DB::table('m_kota')->where('nama','KOTA BANJARMASIN')->first()->id;
        $kecamatan       = DB::table('m_kecamatan')->select('id')->whereIn('kota_id', [$kota])->pluck('id');
        $kelurahan       = DB::table('m_kelurahan')->whereIn('kecamatan_id', [$kecamatan])->get();
        $asuransi        = DB::table("m_asuransi")->get();
        $pekerjaan       = DB::table('m_pekerjaan')->get();
        $goldarah        = DB::table('m_lookup')->where('for','gol_darah')->get();
        $agama           = DB::table('m_lookup')->where('for','agama')->get();
        $pendidikan      = DB::table('m_lookup')->where('for','pendidikan')->get();
        $statuskawin     = DB::table('m_lookup')->where('for','status_perkawinan')->get();
        $statuskeluarga  = DB::table('m_lookup')->where('for','status_keluarga')->get();
        return view('puskes.pasien.editpasien',compact('data',
        'asuransi',
        'kelurahan',
        'pekerjaan',
        'goldarah',
        'agama',
        'pendidikan',
        'statuskawin',
        'statuskeluarga'));
    }

    public function viewPasien($id)
    {
        $data = Mpasien::find($id);
        $puskesmas = Mpuskesmas::first();
        return view('puskes.pasien.viewpasien',compact('data','puskesmas'));
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

    public function searchMedis(Request $req)
    {   
        $data = Mpasien::where('nama', 'LIKE', '%'.$req->search.'%')
                ->orWhere('no_rm_lama','LIKE', '%'.$req->search.'%')
                ->orWhere('nik','LIKE', '%'.$req->search.'%')
                ->orWhere('no_kk','LIKE', '%'.$req->search.'%') 
                ->orWhere('no_asuransi','LIKE', '%'.$req->search.'%')
                ->orWhere('tempat_lahir','LIKE', '%'.$req->search.'%')
                ->paginate(10);
        $data->appends($req->only('search'));
        
        return view('puskes.rm.rekam_medis',compact('data'));
    }

    public function detailrekammedis($id)
    {
        $pasien = Mpasien::find($id);
        $data = $pasien->pendaftaran->map(function($item){
            $item->anamnesa = $item->pelayanan->anamnesa;
            return $item->pelayanan;
        })->where('anamnesa' , '!=', null);
        return view('puskes.rm.detail',compact('pasien','data'));
    }

    public function addPasien()
    {
        $kota            = DB::table('m_kota')->where('nama','KOTA BANJARMASIN')->first()->id;
        $kecamatan       = DB::table('m_kecamatan')->select('id')->whereIn('kota_id', [$kota])->pluck('id');
        $kelurahan       = DB::table('m_kelurahan')->whereIn('kecamatan_id', [$kecamatan])->get();
        $asuransi        = DB::table("m_asuransi")->get();
        $pekerjaan       = DB::table('m_pekerjaan')->get();
        $goldarah        = DB::table('m_lookup')->where('for','gol_darah')->get();
        $agama           = DB::table('m_lookup')->where('for','agama')->get();
        $pendidikan      = DB::table('m_lookup')->where('for','pendidikan')->get();
        $statuskawin     = DB::table('m_lookup')->where('for','status_perkawinan')->get();
        $statuskeluarga  = DB::table('m_lookup')->where('for','status_keluarga')->get();

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
        $tanggal_lahir = $req->tanggal_lahir == null ? null : Carbon::parse($req->tanggal_lahir)->format('Y-m-d');
        $id_pasien = (int) Mpasien::orderBy('id', 'DESC')->first()->id + 1;
        $kelurahan = Mkelurahan::find($req->kelurahan_id);
        
        $s = new Mpasien;
        $s->id                 = convertid($id_pasien);
        $s->no_rm_lama         = strtoupper($req->no_rm_lama);
        $s->no_dok_rm          = strtoupper($req->no_dok_rm);
        $s->asuransi_id        = $req->asuransi_id;
        $s->no_asuransi        = strtoupper($req->no_asuransi);
        $s->no_kk              = $req->no_kk;
        $s->nama               = strtoupper($req->nama);
        $s->nik                = $req->nik;
        $s->jenis_kelamin      = $req->jenis_kelamin;
        $s->tempat_lahir       = strtoupper($req->tempat_lahir);
        $s->tanggal_lahir      = $tanggal_lahir;
        $s->gol_darah          = $req->goldarah_id;
        $s->email              = strtoupper($req->email);
        $s->no_hp              = $req->no_hp;
        $s->kelurahan_id       = $kelurahan == null ? null : $kelurahan->id;
        $s->kecamatan_id       = $kelurahan == null ? null : $kelurahan->kecamatan->id;
        $s->kota_id            = $kelurahan == null ? null : $kelurahan->kecamatan->kota->id;
        $s->propinsi_id        = $kelurahan == null ? null : $kelurahan->kecamatan->kota->propinsi->id;
        $s->alamat             = strtoupper($req->alamat);
        $s->rt                 = $req->rt;
        $s->rw                 = $req->rw;
        $s->pekerjaan_id       = $req->pekerjaan_id;
        $s->agama              = $req->agama_id;
        $s->pendidikan         = $req->pendidikan_id;
        $s->status_perkawinan  = $req->status_kawin_id;
        $s->status_keluarga    = $req->status_keluarga_id;
        $s->warganegara        = $req->warganegara;
        $s->nama_ayah          = strtoupper($req->nama_ayah);
        $s->nama_ibu           = strtoupper($req->nama_ibu);
        $s->puskesmas_id       = Auth::user()->puskesmas_id;
        $s->save();

        toast('Data Pasien Berhasil Disimpan','success');
        return redirect('/pendaftaran/pasien');
    }

    public function updatePasien(Request $req, $id)
    {
        $tanggal_lahir = $req->tanggal_lahir == null ? null : Carbon::parse($req->tanggal_lahir)->format('Y-m-d');
        $kelurahan = Mkelurahan::find($req->kelurahan_id);
        
        $s = Mpasien::find($id);
        $s->no_rm_lama         = strtoupper($req->no_rm_lama);
        $s->no_dok_rm          = strtoupper($req->no_dok_rm);
        $s->asuransi_id        = $req->asuransi_id;
        $s->no_asuransi        = strtoupper($req->no_asuransi);
        $s->no_kk              = $req->no_kk;
        $s->nama               = strtoupper($req->nama);
        $s->nik                = $req->nik;
        $s->jenis_kelamin      = $req->jenis_kelamin;
        $s->tempat_lahir       = strtoupper($req->tempat_lahir);
        $s->tanggal_lahir      = $tanggal_lahir;
        $s->gol_darah          = $req->goldarah_id;
        $s->email              = strtoupper($req->email);
        $s->no_hp              = $req->no_hp;
        $s->kelurahan_id       = $kelurahan == null ? null : $kelurahan->id;
        $s->kecamatan_id       = $kelurahan == null ? null : $kelurahan->kecamatan->id;
        $s->kota_id            = $kelurahan == null ? null : $kelurahan->kecamatan->kota->id;
        $s->propinsi_id        = $kelurahan == null ? null : $kelurahan->kecamatan->kota->propinsi->id;
        $s->alamat             = strtoupper($req->alamat);
        $s->rt                 = $req->rt;
        $s->rw                 = $req->rw;
        $s->pekerjaan_id       = $req->pekerjaan_id;
        $s->agama              = $req->agama_id;
        $s->pendidikan         = $req->pendidikan_id;
        $s->status_perkawinan  = $req->status_kawin_id;
        $s->status_keluarga    = $req->status_keluarga_id;
        $s->warganegara        = $req->warganegara;
        $s->nama_ayah          = strtoupper($req->nama_ayah);
        $s->nama_ibu           = strtoupper($req->nama_ibu);
        $s->puskesmas_id       = Auth::user()->puskesmas_id;
        $s->save();

        toast('Data Pasien Berhasil Diupdate','success');
        return redirect('/pendaftaran/pasien/view/'. $id);
    }

    public function create($id)
    { 
        $data = Mpasien::find($id);
        $ruanganSakit = Mruangan::where('is_aktif', 'Y')->where('poli_sakit', 1)->orderBy('nama','asc')->get();
        $ruanganSehat = Mruangan::where('is_aktif', 'Y')->where('poli_sakit', 0)->orderBy('nama','asc')->get();
        $ugd = Mruangan::where('nama', 'Gawat Darurat')->first()->kamar->take(2);
        
        return view('puskes.pasien.pendaftaran',compact('data','ruanganSakit', 'ruanganSehat','ugd'));
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
        $check = Mpasien::find($id)->pendaftaran;
        if($check != null){
            toast('Data Pasien Tidak Bisa Dihapus Karena Terdapat Riwayat Inputan','info');
        }else{
            $del = Mpasien::find($id)->delete();
            toast('Data Pasien Berhasil Dihapus','success');
        }
        return back();
    }

    public function pendaftaran()
    {
        $today = Carbon::today()->format('Y-m-d').'%';
        $data = Tpendaftaran::where('tanggal', 'LIKE', $today)->orderBy('tanggal', 'desc')->paginate(10);
        return view('puskes.daftar.pendaftaran',compact('data'));
    }

    public function addPendaftaran()
    {
        $data = Mpasien::select('nik', 'nama', 'id')->get();
        return view('puskes.daftar.create',compact('data'));
    }

    public function showPendaftaran(Request $req)
    {
        return redirect('/pendaftaran/pasien/create/'.$req->id);
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
        $req->flash();
        return view('puskes.daftar.pendaftaran',compact('data'));
    }

    public function searchTglLahir(Request $req)
    {
        $tanggal = Carbon::createFromFormat('dmY', $req->tanggal)->format('Y-m-d');
        
        $data = Mpasien::where('tanggal_lahir', $tanggal)->paginate(10);
        
        $data->appends($req->only('tanggal'));
        $req->flash();
        return view('puskes.pasien.pasien',compact('data'));
    }

    public function daftarPelayanan(Request $req,$id)
    {
        if($req->status == 'SAKIT')
        {
            $ruangan_id = $req->ruangan_id[0];
            
        }else{
            $ruangan_id = $req->ruangan_id[1];
        }
        $pasien = Mpasien::find($id);
        $tahun = Tahun($pasien->tanggal_lahir);
        $bulan = Bulan($pasien->tanggal_lahir);
        $hari  = Hari($pasien->tanggal_lahir);

        $t = new Tpendaftaran;
        $t->tanggal          = $req->tanggal;
        $t->pasien_id        = $req->pasien_id;
        $t->umur_tahun       = $tahun; 
        $t->umur_bulan       = $bulan;
        $t->umur_hari        = $hari;
        $t->penanggung_jawab_pasien = $req->penanggung_jawab;
        $t->hubungan_dengan_pasien  = $req->hubungan;
        $t->no_hp_penanggung = $req->no_hp_penanggung;
        $t->kunjungan        = $req->kunjungan;
        $t->status           = $req->status;
        $t->asuransi_id      = $pasien->asuransi_id;
        $t->no_asuransi      = $req->no_asuransi;
        $t->tarif            = $req->tarif;
        $t->rujukan_dari     = $req->rujukan_dari;
        $t->nama_perujuk     = $req->nama_perujuk;
        $t->puskesmas_id     = Auth::user()->puskesmas_id;
        $t->save();

        $p = new Tpelayanan;
        $p->tanggal        = $req->tanggal;
        $p->pendaftaran_id = $t->id;
        $p->is_promotifpreventif = 0;
        $p->instalasi_id   = Mruangan::find($ruangan_id)->first()->instalasi->id;
        $p->ruangan_id     = $ruangan_id;
        $p->save();
        //dd('sukses');

        toast('berhasil Di Daftarkan', 'success');
        return redirect('/pendaftaran');
    }

    public function getKelurahan($id)
    {
        $data      = Mkelurahan::find($id);
        $kecamatan = $data->kecamatan;
        $kota      = $kecamatan->kota;
        $provinsi  = $kota->propinsi;
        return response()->json([$kecamatan, $kota, $provinsi]);
        
    }
}
