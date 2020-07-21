<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use App\Mpegawai;
use App\Mruangan;
use App\Masuransi;
use App\Tdiagnosa;
use Carbon\Carbon;
use App\Tpelayanan;
use Illuminate\Http\Request;
use App\Exports\KunjunganPasien;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Repositories\LaporanRepo;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->LaporanRepo = new LaporanRepo;
    }

    public function exportkunjunganpasientanggal($parameter)
    {   
        $this->LaporanRepo->kunjunganpasien($parameter);
    }

    public function kunjunganpasien()
    {
        $today = Carbon::today()->format('Y-m-d');
        $data = Tpelayanan::whereDate('tanggal', '=', $today)->get();
        return view('puskes.laporan.kunjunganpasien',compact('data'));
    }

    public function pelayananpasien()
    {
        $today = Carbon::today()->format('Y-m-d');
        $data = Tpelayanan::whereDate('tanggal', '=', $today)->get()->map(function($item){
            $item->anamnesa = $item->anamnesa;
            return $item;
        })->where('anamnesa', '!=', null);
        $poli = Mruangan::where('is_aktif', 'Y')->get();
        $asuransi = Masuransi::all();
        
        return view('puskes.laporan.pelayananpasien',compact('data','poli','asuransi'));
    }
    
    public function searchpelayananpasien(Request $req)
    {
        if($req->export == null){
            
            $start = Carbon::parse($req->dari)->format('Y-m-d')." 00:00:00"; 
            $end   = Carbon::parse($req->sampai)->format('Y-m-d')." 23:59:59"; 
            $data  = Tpelayanan::whereBetween('tanggal', [$start, $end])->get()->map(function($item){
                $item->anamnesa = $item->anamnesa;
                return $item;
            })->where('anamnesa', '!=', null);
            $poli     = Mruangan::where('is_aktif', 'Y')->get();
            $asuransi = Masuransi::all();
            $req->flash();
            return view('puskes.laporan.pelayananpasien',compact('data','poli','asuransi'));

        }else{
            
            $this->LaporanRepo->pelayananpasien($req->all());
            
        }
        
    }

    public function laporanpemeriksaanmedis()
    {
        $today = Carbon::today()->format('Y-m-d');
        $data = Mpegawai::orderBy('nama', 'ASC')->get();
        $poli = Mruangan::where('is_aktif', 'Y')->get();
        $asuransi = Masuransi::all();
        
        return view('puskes.laporan.pemeriksaanmedis',compact('data','poli','asuransi'));
    }

    public function laporanpelayananresep()
    {
        
        $today = Carbon::today()->format('Y-m-d');
        $data = Mpegawai::orderBy('nama', 'ASC')->get();
        $poli = Mruangan::where('is_aktif', 'Y')->get();
        $asuransi = Masuransi::all();
        
        return view('puskes.laporan.pelayananresep',compact('data','poli','asuransi'));
    }

    public function laporanpengeluaranobat()
    {
        $today = Carbon::today()->format('Y-m-d');
        $data = Mpegawai::orderBy('nama', 'ASC')->get();
        $poli = Mruangan::where('is_aktif', 'Y')->get();
        $asuransi = Masuransi::all();
        
        return view('puskes.laporan.pengeluaranobat',compact('data','poli','asuransi'));
    }

    public function tampilkankunjunganpasien(Request $req)
    {
        if($req->tanggalex != null){
            $this->exportkunjunganpasientanggal($req->all());
        }else{
            $start = Carbon::parse($req->dari)->format('Y-m-d')." 00:00:00"; 
            $end   = Carbon::parse($req->sampai)->format('Y-m-d')." 23:59:59"; 
            $jenis_laporan   = $req->jenis_laporan;
            $kunjungan       = $req->kunjungan == 'semua' ? null : $req->kunjungan;
            $jenis_kunjungan = $req->jenis_kunjungan == 'semua' ? null :$req->jenis_kunjungan;
            $jenis_kelamin   = $req->jenis_kelamin == 'semua' ? null :$req->jenis_kelamin;
            $asuransi        = $req->asuransi == 'semua' ? null :$req->asuransi;
            $wilayah         = $req->wilayah;
            $data = Tpelayanan::whereBetween('tanggal', [$start, $end])
            ->whereHas('pendaftaran', function ($item) use ($kunjungan, $jenis_kunjungan, $jenis_kelamin, $asuransi) {
                $item->whereHas('pasien', function ($item2) use ($jenis_kelamin, $asuransi){    
                    if($jenis_kelamin == null){
    
                    }else{
                        $item2->where('jenis_kelamin', $jenis_kelamin);
                    }
                    if($asuransi == null){
    
                    }else{
                        $item2->where('asuransi_id', $asuransi);
                    }
                });
                if($kunjungan == null){
    
                }else{
                    $item->where('status', $kunjungan);
                }
                if($jenis_kunjungan == null){
    
                }else{
                    $item->where('kunjungan', $jenis_kunjungan);
                }
            })
            ->get();
            return view('puskes.laporan.kunjunganpasiensearch',
            compact('data',
                    'start',
                    'end',
                    'jenis_laporan',
                    'kunjungan',
                    'jenis_kunjungan',
                    'jenis_kelamin',
                    'asuransi',
                    'wilayah'
            ));
        }
    }

    public function laporansp3lb1()
    {
        $ruangan = Mruangan::where('is_aktif', 'Y')->get();
        $mapData = null;
        return view('puskes.laporan.laporansp3lb1',
        compact('ruangan', 'mapData'));
    }

    public function laporansp3lb1tampilkan(Request $req)
    {
        if($req->ruangan_id == null){
            toast('Tidak Ada Data', 'info');
            return back();
        }else{
            $Start = Carbon::createFromFormat('d-m-Y','01-'.$req->bulandari.'-'.$req->tahundari);
            $End   = Carbon::createFromFormat('d-m-Y','01-'.$req->bulansampai.'-'.$req->tahunsampai);
            $parseStart = Carbon::parse($Start)->format('Y-m-d').' 00:00:00';
            $parseEnd = Carbon::parse($End)->endofMonth()->format('Y-m-d').' 23:59:59';
            $poli = $req->ruangan_id;
            $data = Tdiagnosa::whereBetween('tanggal', array($parseStart, $parseEnd))
                                ->whereHas('pelayanan', function ($item) use ($poli){
                                    $item->whereIn('ruangan_id', $poli);
                                })->get();
        
            $mapData = $data->map(function($item, $key){
                $item->kode_icd = $item->diagnosa_id;
                $item->jenis_penyakit = $item->mdiagnosa->value;
                $item->poli = $item->pelayanan->ruangan->nama;
                $item->jenis_kelamin = $item->pelayanan->pendaftaran->pasien->jenis_kelamin;
                $item->umur = hitungUmur($item->pelayanan->pendaftaran->pasien->tanggal_lahir);
                return $item;
            })->sortBy('diagnosa_id');
            
            $ruangan = Mruangan::where('is_aktif', 'Y')->get();
            return view('puskes.laporan.laporansp3lb1',
            compact('ruangan','mapData'));

            // ->map(function($item, $value){
            //     $item->diagnosa->kode_icd = $item->diagnosa_id;
            //     $item->diagnosa['jenis_penyakit'] = $item->mdiagnosa;
            //     return $item->diagnosa;
            // });
            //dd($req->all(), $req->ruangan_id,$parseStart, $parseEnd, $mapData);
        }
    }

    public function laporansp3lb2()
    {
        return view('puskes.laporan.laporansp3lb2');
    }
    
    public function laporansp3lb3()
    {
        return view('puskes.laporan.laporansp3lb3');
    }
    
    public function laporansp3lb4()
    {
        return view('puskes.laporan.laporansp3lb4');
    }

}
