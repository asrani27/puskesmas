<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mpasien;
use App\Masuransi;
use App\Mkelurahan;
use App\Mpuskesmas;
use App\Tpendaftaran;
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

        return view('puskes.pasien.pendaftaran',compact('data'));
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

    public function syncrone()
    {
        $data = DB::connection('mysql2')->table('m_pasien')->get();
        $puskes = Auth::user()->puskes->first();
        $getData = $data->map(function($item, $key){
            
            $item->pendaftaran = DB::connection('mysql2')->table('t_pendaftaran')->where('pasien_id', $item->id)->get();
            return $item;

        });
        //dd($getData);
        $store = $getData->map(function($item, $key)use($puskes){
            if($item->asuransi_id == '0000'){
                $asuransi_id = 1;
            }elseif($item->asuransi_id == '0001'){
                $asuransi_id = 2;
            }elseif($item->asuransi_id == '0002'){
                $asuransi_id = 3;
            }
                $s = new Mpasien;
                $s->no_rm_lama   = $item->no_rm_lama;
                $s->no_dok_rm    = $item->no_dok_rm;
                $s->no_asuransi  = $item->no_asuransi;
                $s->asuransi_id  = $asuransi_id;
                $s->nama         = $item->nama;
                $s->nik          = $item->nik;
                $s->jkel         = $item->jenis_kelamin;
                $s->tempat_lahir = $item->tempat_lahir;
                $s->tgl_lahir    = $item->tanggal_lahir;
                $s->kelurahan_id = $item->kelurahan_id;
                $s->alamat       = $item->alamat;
                $s->save();
                $s->puskes()->attach($puskes);

                foreach($item->pendaftaran as $key => $value)
                {
                    $p = new Tpendaftaran;
                    $p->tanggal          = $value->tanggal;
                    $p->pasien_id         = $s->id;
                    $p->umur_tahun        = $value->umur_tahun;
                    $p->umur_bulan        = $value->umur_bulan;
                    $p->umur_hari         = $value->umur_hari;
                    $p->penanggung_jawab  = $value->penanggung_jawab_pasien;
                    $p->hubungan          = $value->hubungan_dengan_pasien;
                    $p->no_hp_penanggung  = $value->no_hp_penanggung;
                    $p->kunjungan         = $value->kunjungan;
                    $p->status            = $value->status;
                    $p->asuransi_id       = $asuransi_id;
                    $p->no_asuransi       = $value->no_asuransi;
                    $p->status_prolanis   = $value->status_pstprol;
                    $p->status_prb        = $value->status_pstprb;
                    $p->rujukan_dari      = $value->rujukan_dari;
                    $p->nama_perujuk      = $value->nama_perujuk;
                    $p->status_periksa    = 2;
                    $p->save();
                }

            return $item;
        });
        Alert::success('Syncrone Dari Database Lama Berhasil'.'pesan')->autoClose(50000);
        return back();
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
}
