<?php

namespace App\Http\Controllers;

use Closure;
use App\Mkms;
use App\User;
use App\Mobat;
use App\Tresep;
use App\Malergi;
use App\Mlookup;
use App\Mpegawai;
use App\Mriwayat;
use App\Mruangan;
use App\Mjenislab;
use App\Mtindakan;
use App\Tanamnesa;
use App\Tdiagnosa;
use App\Ttindakan;
use Carbon\Carbon;
use App\Mimunisasi;
use App\Tpelayanan;
use App\Modontogram;
use App\Tresepdetail;
use App\Mlaboratorium;
use App\Mstatuspulang;
use App\Tlaboratorium;
use App\Tperiksafisik;
use Illuminate\Support\Str;
use App\Tlaboratoriumdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PelayananController extends Controller
{

    public function __construct()
    {
        //$this->middleware('medis');
    }
    
    public function riwayat($id)
    {
        $data = Tpelayanan::find($id);
        $riwayat = $data->pendaftaran->pasien->pendaftaran->map(function($item){
            $item->anamnesa = $item->pelayanan == null ? '' : $item->pelayanan->anamnesa;
            $dokter = $item->pelayanan == null ? '' : $item->pelayanan->anamnesa;
            //dd($dokter->dokter->nama);
            if($dokter == null){
                $item->dokter = null;
            }else{
                if($dokter->dokter == null){

                    $item->dokter = null;
                }else{
                    $item->dokter = $dokter->dokter->nama;
                }
                //$item->dokter = $dokter->dokter->nama;
            }
            $perawat = $item->pelayanan == null ? '' : $item->pelayanan->anamnesa;
            if($perawat == null){
                $item->perawat = null;
            }else{
                if($item->perawat == null){
                    $item->perawat = null;
                }else{
                    $item->perawat = $perawat->perawat->nama;
                }
            }
            $item->instalasi = $item->pelayanan == null ? '' : $item->pelayanan->instalasi;
            $item->ruangan = $item->pelayanan == null ? '' : $item->pelayanan->ruangan;
            $item->pasien = $item->pasien;
            $item->periksafisik = $item->pelayanan == null ? '' : $item->pelayanan->periksafisik;
            $item->diagnosa = $item->pelayanan == null ? '' : $item->pelayanan->diagnosa->map(function($item2){
                $item2->dokter = $item2->dokter;
                $item2->perawat = $item2->perawat;
                $item2->diagnosis = $item2->mdiagnosa;
                return $item2;
            });
            
            $item->count_diagnosa = $item->pelayanan == null ? '' : $item->pelayanan->diagnosa->count();
            $item->asuransi = $item->pasien->asuransi;
            return $item;
        });
        return $riwayat;
    }
    public function Anamnesa($id)
    {
        $checkPoli = Tpelayanan::where('id', $id)->orWhere('ruangan_id', '0010')->orWhere('ruangan_id', '0029')->first();
        if($checkPoli == null){
            Alert::info('Tidak terdaftar di poli');
            return back();
        }else{
            $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
            if($checkAnamnesa == null)
            {
                $data = Tpelayanan::find($id);
                $keluhan = Mlookup::where('for','keluhan')->get();
                $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
                $tenagamedis = Mpegawai::all()->map(function($item, $key){
                    $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                    $item->nama_tenaga_medis = $item->jenispegawai->nama;
                    return $item;
                });
                $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
                $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                $sp = Mstatuspulang::all();
                $riwayat = $this->riwayat($id);
                return view('puskes.pelayanan.medis.anamnesa.create',compact('data','keluhan','dokter', 'perawat','kesadaran','sp','riwayat'));
            }else{
                $anamnesa = $checkAnamnesa;
                $data = Tpelayanan::find($id);    
                $keluhan = Mlookup::where('for','keluhan')->get();
                $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
                $tenagamedis = Mpegawai::all()->map(function($item, $key){
                    $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                    $item->nama_tenaga_medis = $item->jenispegawai->nama;
                    return $item;
                });
                $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
                $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                
                $sp = Mstatuspulang::all();
                
                $riwayat = $this->riwayat($id);
                return view('puskes.pelayanan.medis.anamnesa.edit',compact('data','keluhan','dokter', 'perawat','kesadaran','id','anamnesa','sp','riwayat'));
            }
        }
    }

    public function Diagnosa($id)
    {
        $data = Tpelayanan::find($id);
        $tenagamedis = Mpegawai::all()->map(function($item, $key){
            $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
            $item->nama_tenaga_medis = $item->jenispegawai->nama;
            return $item;
        });
        $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
        $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
        $diagnosa = DB::table('m_diagnosa')->select('id','value')->paginate(100);
        
        $sp = Mstatuspulang::all();
        
        $riwayat = $this->riwayat($id);
        
        return view('puskes.pelayanan.medis.diagnosa.create',compact('data','dokter','perawat','diagnosa','sp','riwayat'));
    }

    public function Resep($id)
    {
        $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
        $keluhan = Mlookup::where('for','keluhan')->get();
        $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
        if($checkAnamnesa == null)
        {
            $data = Tpelayanan::find($id);
            $tenagamedis = Mpegawai::all()->map(function($item, $key){
                $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                $item->nama_tenaga_medis = $item->jenispegawai->nama;
                return $item;
            });
            $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
            $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
            Alert::info('Harap Isi Anamnesa Terlebih Dahulu', 'Info');
            $sp = Mstatuspulang::all();
            
            $riwayat = $this->riwayat($id);

            return view('puskes.pelayanan.medis.anamnesa.create',compact('data','dokter','perawat','keluhan','kesadaran','sp','riwayat'));

        }
        else{
            $data = Tpelayanan::find($id);
            $tenagamedis = Mpegawai::all()->map(function($item, $key){
                $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                $item->nama_tenaga_medis = $item->jenispegawai->nama;
                return $item;
            });
            $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
            $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
            $obat = Mobat::all()->map(function($item){
                $item->stok = count($item->m_stok_obat) == 0 ? 0 : $item->m_stok_obat->first()->jumlah_stok;
                return $item;
            })->where('stok', '!=', 0);
            
            $signa = DB::table('m_signa')->select('value')->get();
            $sp = Mstatuspulang::all();
            
            $riwayat = $this->riwayat($id);

            return view('puskes.pelayanan.medis.resep.create',compact('data','dokter','perawat', 'obat','signa','sp','riwayat'));
        }
    }

    public function Laboratorium($id)
    {
        $data = Tpelayanan::find($id);
        $sp = Mstatuspulang::all();
        $lab = Mjenislab::all()->map(function($item, $key){
            $item->laboratorium = $item->lab->where('deleted_by', null);
            return $item;
        });
        
        $riwayat = $this->riwayat($id);

        return view('puskes.pelayanan.medis.lab.create',compact('data','sp','lab','riwayat'));
    }

    public function Tindakan($id)
    {
        $data = Tpelayanan::find($id);
        $sp   = Mstatuspulang::all();
        $tindakan = Mtindakan::all();
        $lab  = Mjenislab::all()->map(function($item, $key){
            $item->laboratorium = $item->lab->where('deleted_by', null);
            return $item;
        });
        
        $tenagamedis = Mpegawai::all()->map(function($item, $key){
            $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
            $item->nama_tenaga_medis = $item->jenispegawai->nama;
            return $item;
        });
        $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
        $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
        
        $riwayat = $this->riwayat($id);

        return view('puskes.pelayanan.medis.tindakan.create',compact('data','sp','lab','dokter','perawat','tindakan','riwayat'));
    }

    public function Mtbs($id)
    {
        $data = Tpelayanan::find($id);
        $checkAnamnesa = $data->anamnesa;
        if($checkAnamnesa == null){
            toast('Harap Isi Anamnesa Dulu', 'info');
            return redirect('/pelayanan/medis/proses/'.$id.'/anamnesa');
        }else{
            $checkMtbs = $data->mtbs;
            if($checkMtbs == null){
                $sp   = Mstatuspulang::all();
                $tenagamedis = Mpegawai::all()->map(function($item, $key){
                    $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                    $item->nama_tenaga_medis = $item->jenispegawai->nama;
                    return $item;
                });
                $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
                $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                $riwayat = $this->riwayat($id);
                return view('puskes.pelayanan.medis.mtbs.create',compact('data','sp','dokter','perawat','riwayat'));
            }else{
                $sp   = Mstatuspulang::all();
                $mtbs = $checkMtbs;
                $tenagamedis = Mpegawai::all()->map(function($item, $key){
                    $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                    $item->nama_tenaga_medis = $item->jenispegawai->nama;
                    return $item;
                });
                $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
                $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                $riwayat = $this->riwayat($id);
                return view('puskes.pelayanan.medis.mtbs.edit',compact('data','sp','dokter','perawat', 'mtbs','riwayat'));

            }
        }
    }

    public function Imunisasi($id)
    {
        $data = Tpelayanan::find($id);
        $sp   = Mstatuspulang::all();
        $tenagamedis = Mpegawai::all()->map(function($item, $key){
            $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
            $item->nama_tenaga_medis = $item->jenispegawai->nama;
            return $item;
        });
        $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
        $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
        $riwayat = $this->riwayat($id);
        return view('puskes.pelayanan.medis.imunisasi.check',compact('data','sp','dokter','perawat','riwayat'));   
    }

    public function imunisasiAnak($id)
    {
        $data = Tpelayanan::find($id);
        if($data->anamnesa == null){
            toast('harap isi anamnesaa terlebih dahulu');
            return back();
        }else{
            $checkKMS = Mkms::where('pasien_id', $data->pendaftaran->pasien_id)->first();
            if($checkKMS == null){
                $sp   = Mstatuspulang::all();
                $tenagamedis = Mpegawai::all()->map(function($item, $key){
                    $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                    $item->nama_tenaga_medis = $item->jenispegawai->nama;
                    return $item;
                });
                $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
                $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                $imun = Mimunisasi::all()->chunk(4);
                $riwayat = $this->riwayat($id);
                return view('puskes.pelayanan.medis.imunisasi.imun_anak',compact('data','sp','dokter','perawat','imun','riwayat'));   
            }else{
                $sp   = Mstatuspulang::all();
                $tenagamedis = Mpegawai::all()->map(function($item, $key){
                    $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
                    $item->nama_tenaga_medis = $item->jenispegawai->nama;
                    return $item;
                });
                $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
                $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                $imun = Mimunisasi::all()->chunk(4);
                $kms = $checkKMS;
    
                $checkImun = $data->imunisasi->where('kategori', 'anak')->first();
                
                $riwayat = $this->riwayat($id);
                return view('puskes.pelayanan.medis.imunisasi.edit_imun_anak',compact('data',
                'sp',
                'dokter',
                'perawat',
                'imun',
                'kms',
                'checkImun',
                'riwayat'
                ));   
            }
        }
       
    }
    
    public function imunisasiDewasa($id)
    {
        $data = Tpelayanan::find($id);
        $sp   = Mstatuspulang::all();
        $tenagamedis = Mpegawai::all()->map(function($item, $key){
            $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
            $item->nama_tenaga_medis = $item->jenispegawai->nama;
            return $item;
        });
        $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
        $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
        $imun = Mimunisasi::all()->chunk(4);
        $riwayat = $this->riwayat($id);
        if($data->imunisasi->where('kategori', 'dewasa')->first() == null){
            return view('puskes.pelayanan.medis.imunisasi.imun_dewasa',compact('data','sp','dokter','perawat','imun','riwayat'));  
        } else{

            $dataImun = $data->imunisasi->where('kategori', 'dewasa')->first();
            return view('puskes.pelayanan.medis.imunisasi.edit_imun_dewasa',compact('data','sp','dokter','riwayat','perawat','imun','dataImun'));  
        }
    }

    public function Odontogram($id)
    {
        
        $data = Tpelayanan::find($id);
        $sp   = Mstatuspulang::all();
        $lab  = Mjenislab::all()->map(function($item, $key){
            $item->laboratorium = $item->lab->where('deleted_by', null);
            return $item;
        });
        
        $tenagamedis = Mpegawai::all()->map(function($item, $key){
            $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
            $item->nama_tenaga_medis = $item->jenispegawai->nama;
            return $item;
        });
        $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
        $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
        $riwayat = $this->riwayat($id);
        $checkOdontogram = $data->odontogram;
        if($checkOdontogram == null){
            return view('puskes.pelayanan.medis.odontogram.create',compact('data','sp','lab','dokter','perawat','riwayat'));
    
        }else{
            return view('puskes.pelayanan.medis.odontogram.edit',compact('data','sp','lab','dokter','perawat','riwayat'));
        }
    }

    public function medis()
    {
        try {
            $today = Carbon::today()->format('Y-m-d');
            $data = Tpelayanan::where('tanggal','LIKE', $today.'%')->orderBy('created_at','desc')->paginate(10);
            $ruangan = Mruangan::where('is_aktif', 'Y')->orderBy('nama','desc')->get();
            return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
        } catch (\Exception $e) {
            
            report($e);
            return false;
        }
    }

    public function proses($id)
    {
        $data = Tpelayanan::find($id);
        $sp = Mstatuspulang::all();

        $riwayat = $this->riwayat($id);
        return view('puskes.pelayanan.medis.detail',compact('data','sp','riwayat'));
    }

    public function mulaiPeriksa($id)
    {
        $u = Tpelayanan::find($id);
        $data = $u->pendaftaran;
        $data->status_periksa = 1;
        $data->save();
        return back();
    }

    public function selesaiPeriksa(Request $req, $id)
    {
        //dd($req->all());
        $u = Tpelayanan::find($id);
        $u->tanggal_mulai = $req->tgl_mulai;
        $u->tanggal_selesai = $req->tgl_selesai;
        $u->statuspulang_id = $req->statuspulang_id;
        $u->save();

        $data = $u->pendaftaran;
        $data->status_periksa = 2;
        $data->save();
        toast('Pemeriksaan Selesai','success');
        return redirect('/pelayanan/medis');
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
        $tanggal = Carbon::createfromformat('d/m/Y',$req->tanggal)->format('Y-m-d');
        $data = Tpelayanan::where('tanggal','LIKE', $tanggal.'%')->orderBy('created_at','desc')->paginate(10);
        $req->flash();
        $ruangan = Mruangan::orderBy('nama','desc')->get();
        return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
    }

    // public function umumAnamnesa($id)
    // {
    //     $checkPoli = Tpelayanan::where('id', $id)->where('ruangan_id', '0001')->first();
    //     if($checkPoli == null){
    //         Alert::info('Tidak terdaftar di poli Umum');
    //         return back();
    //     }else{
    //         $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
    //         if($checkAnamnesa == null)
    //         {
    //             $data = Tpelayanan::find($id);
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //             return view('puskes.pelayanan.medis.anamnesa.umum.create',compact('data','keluhan','dokter', 'perawat','kesadaran'));
    //         }else{
    //             $anamnesa = $checkAnamnesa;
    //             $data = Tpelayanan::find($id);    
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                
    //             return view('puskes.pelayanan.medis.anamnesa.umum.edit',compact('data','keluhan','dokter', 'perawat','kesadaran','id','anamnesa'));
    //         }
    //     }
    // }
    
    // public function anakAnamnesa($id)
    // {
    //     $checkPoli = Tpelayanan::where('id', $id)->orWhere('ruangan_id', '0010')->orWhere('ruangan_id', '0029')->first();
    //     if($checkPoli == null){
    //         Alert::info('Tidak terdaftar di poli anak');
    //         return back();
    //     }else{
    //         $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
    //         if($checkAnamnesa == null)
    //         {
    //             $data = Tpelayanan::find($id);
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //             return view('puskes.pelayanan.medis.anamnesa.anak.create',compact('data','keluhan','dokter', 'perawat','kesadaran'));
    //         }else{
    //             $anamnesa = $checkAnamnesa;
    //             $data = Tpelayanan::find($id);    
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                
    //             return view('puskes.pelayanan.medis.anamnesa.anak.edit',compact('data','keluhan','dokter', 'perawat','kesadaran','id','anamnesa'));
    //         }
    //     }
    // }
    // public function mtbsAnamnesa($id)
    // {
    //     $checkPoli = Tpelayanan::where('id', $id)->orWhere('ruangan_id', '0010')->orWhere('ruangan_id', '0029')->first();
    //     if($checkPoli == null){
    //         Alert::info('Tidak terdaftar di poli anak');
    //         return back();
    //     }else{
    //         $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
    //         if($checkAnamnesa == null)
    //         {
    //             $data = Tpelayanan::find($id);
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //             return view('puskes.pelayanan.medis.anamnesa.create',compact('data','keluhan','dokter', 'perawat','kesadaran'));
    //         }else{
    //             $anamnesa = $checkAnamnesa;
    //             $data = Tpelayanan::find($id);    
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                
    //             return view('puskes.pelayanan.medis.anamnesa.edit',compact('data','keluhan','dokter', 'perawat','kesadaran','id','anamnesa'));
    //         }
    //     }
    // }

    // public function gigiAnamnesa($id)
    // {
    //     $checkPoli = Tpelayanan::where('id', $id)->where('ruangan_id', '0006')->first();
    //     if($checkPoli == null){
    //         Alert::info('Tidak terdaftar di poli Umum');
    //         return back();
    //     }else{
    //         $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
    //         if($checkAnamnesa == null)
    //         {
    //             $data = Tpelayanan::find($id);
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //             return view('puskes.pelayanan.medis.anamnesa.gigi.create',compact('data','keluhan','dokter', 'perawat','kesadaran'));
    //         }else{
    //             $anamnesa = $checkAnamnesa;
    //             $data = Tpelayanan::find($id);    
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                
    //             return view('puskes.pelayanan.medis.anamnesa.gigi.edit',compact('data','keluhan','dokter', 'perawat','kesadaran','id','anamnesa'));
    //         }
    //     }
    // }

    // public function kiaAnamnesa($id)
    // {  
    //     $checkPoli = Tpelayanan::where('id', $id)->where('ruangan_id', '0008')->first();
    //     if($checkPoli == null){
    //         Alert::info('Tidak terdaftar di poli Umum');
    //         return back();
    //     }else{
    //         $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
    //         if($checkAnamnesa == null)
    //         {
    //             $data = Tpelayanan::find($id);
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //             return view('puskes.pelayanan.medis.anamnesa.kia.create',compact('data','keluhan','dokter', 'perawat','kesadaran'));
    //         }else{
    //             $anamnesa = $checkAnamnesa;
    //             $data = Tpelayanan::find($id);    
    //             $keluhan = Mlookup::where('for','keluhan')->get();
    //             $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //             $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //                 $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //                 $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //                 return $item;
    //             });
    //             $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //             $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
                
    //             return view('puskes.pelayanan.medis.anamnesa.kia.edit',compact('data','keluhan','dokter', 'perawat','kesadaran','id','anamnesa'));
    //         }
    //     }
    // }

    // public function storeAnamnesa(Request $req, $id)
    // {
    //     $dokter_id = $req->dokter_id;
    //     $perawat_id = $req->perawat_id;
        
    //     //ubah status periksa
    //     $pel = Tpelayanan::find($id)->pendaftaran;
    //     $pel->status_periksa = 1;
    //     $pel->save();
    //     $pasien_id = $pel->pasien_id;

    //     //Simpan Anamnesa
    //     $anamnesa = new Tanamnesa;
    //     $anamnesa->tanggal          = $pel->tanggal;
    //     $anamnesa->pelayanan_id     = $id;
    //     $anamnesa->dokter_id        = $dokter_id;
    //     $anamnesa->perawat_id       = $perawat_id;
    //     $anamnesa->keluhan_utama    = $req->keluhan_utama;
    //     $anamnesa->keluhan_tambahan = $req->keluhan_tambahan;
    //     $anamnesa->lama_sakit_tahun = $req->lama_sakit_tahun;
    //     $anamnesa->lama_sakit_bulan = $req->lama_sakit_bulan;
    //     $anamnesa->lama_sakit_hari  = $req->lama_sakit_hari;
    //     $anamnesa->merokok          = $req->merokok;
    //     $anamnesa->konsumsi_alkohol = $req->alkohol;
    //     $anamnesa->kurang_sayur_buah= $req->sayur;
    //     $anamnesa->terapi           = $req->terapi;
    //     $anamnesa->keterangan       = $req->keterangan;
    //     $anamnesa->edukasi          = $req->edukasi;
    //     $anamnesa->rencana_tindakan = $req->tindakan;
    //     $anamnesa->askep            = $req->askep;
    //     $anamnesa->observasi        = $req->observasi;
    //     $anamnesa->biopsikososial   = $req->biopsikososial;
    //     $anamnesa->save();

    //     //Simpan Periksa Fisik
    //     $fisik = new Tperiksafisik;
    //     $fisik->tanggal          = $pel->tanggal;
    //     $fisik->pelayanan_id     = $id;
    //     $fisik->dokter_id        = $dokter_id;
    //     $fisik->perawat_id       = $perawat_id;
    //     $fisik->sistole          = $req->sistole;
    //     $fisik->diastole         = $req->diastole;
    //     $fisik->detak_nadi       = $req->detak_nadi;
    //     $fisik->nafas            = $req->nafas;
    //     $fisik->detak_jantung    = $req->detak_jantung;
    //     $fisik->suhu             = $req->suhu;
    //     $fisik->kesadaran        = $req->kesadaran;
    //     $fisik->triage           = $req->triage;
    //     $fisik->berat            = $req->berat;
    //     $fisik->tinggi           = $req->tinggi;
    //     $fisik->lingkar_perut    = $req->lingkar_perut;
    //     $fisik->imt              = $req->imt;
    //     $fisik->hasil_imt        = $req->hasil_imt;
    //     $fisik->aktifitas_fisik  = $req->aktifitas_fisik;
    //     $fisik->skala_nyeri      = $req->nyeri;
    //     $fisik->save();

    //     //Simpan Riwayat Penyakit
    //     if(!is_null($req->riwayat_penyakit_sekarang)){
    //         $rp = new Mriwayat;
    //         $rp->pasien_id = $pasien_id;
    //         $rp->anamnesa_id = $anamnesa->id;
    //         $rp->jenis_riwayat = 'Riwayat Penyakit Sekarang';
    //         $rp->value = $req->riwayat_penyakit_sekarang;
    //         $rp->save();
    //     }

    //     if(!is_null($req->riwayat_penyakit_dulu)){
    //         $rp = new Mriwayat;
    //         $rp->pasien_id = $pasien_id;
    //         $rp->anamnesa_id = $anamnesa->id;
    //         $rp->jenis_riwayat = 'Riwayat Penyakit Dulu';
    //         $rp->value = $req->riwayat_penyakit_dulu;
    //         $rp->save();
    //     }
        
    //     if(!is_null($req->riwayat_penyakit_keluarga)){
    //         $rp = new Mriwayat;
    //         $rp->pasien_id = $pasien_id;
    //         $rp->anamnesa_id = $anamnesa->id;
    //         $rp->jenis_riwayat = 'Riwayat Penyakit Keluarga';
    //         $rp->value = $req->riwayat_penyakit_keluarga;
    //         $rp->save();
    //     }

    //     //Simpan Alergi Pasien
    //     if(!is_null($req->obat)){
    //         $ap = new Malergi;
    //         $ap->pasien_id = $pasien_id;
    //         $ap->anamnesa_id = $anamnesa->id;
    //         $ap->jenis_alergi = 'Obat';
    //         $ap->value = $req->obat;
    //         $ap->save();
    //     }
        
    //     if(!is_null($req->makanan)){
    //         $ap = new Malergi;
    //         $ap->pasien_id = $pasien_id;
    //         $ap->anamnesa_id = $anamnesa->id;
    //         $ap->jenis_alergi = 'Makanan';
    //         $ap->value = $req->makanan;
    //         $ap->save();
    //     }
        
    //     if(!is_null($req->umum)){
    //         $ap = new Malergi;
    //         $ap->pasien_id = $pasien_id;
    //         $ap->anamnesa_id = $anamnesa->id;
    //         $ap->jenis_alergi = 'Umum';
    //         $ap->value = $req->umum;
    //         $ap->save();
    //     }
    //     Alert::success('Anamnesa Berhasil Di Simpan');
    //     return back();
    // }

    // public function updateAnamnesa(Request $req, $id, $anamnesa_id)
    // {
    //     $dokter_id = $req->dokter_id;
    //     $perawat_id = $req->perawat_id;
        
    //     //Simpan Anamnesa
    //     $anamnesa = Tanamnesa::find($anamnesa_id);
    //     $anamnesa->pelayanan_id     = $id;
    //     $anamnesa->dokter_id        = $dokter_id;
    //     $anamnesa->perawat_id       = $perawat_id;
    //     $anamnesa->keluhan_utama    = $req->keluhan_utama;
    //     $anamnesa->keluhan_tambahan = $req->keluhan_tambahan;
    //     $anamnesa->lama_sakit_tahun = $req->lama_sakit_tahun;
    //     $anamnesa->lama_sakit_bulan = $req->lama_sakit_bulan;
    //     $anamnesa->lama_sakit_hari  = $req->lama_sakit_hari;
    //     $anamnesa->merokok          = $req->merokok;
    //     $anamnesa->konsumsi_alkohol = $req->alkohol;
    //     $anamnesa->kurang_sayur_buah= $req->sayur;
    //     $anamnesa->terapi           = $req->terapi;
    //     $anamnesa->keterangan       = $req->keterangan;
    //     $anamnesa->edukasi          = $req->edukasi;
    //     $anamnesa->rencana_tindakan = $req->tindakan;
    //     $anamnesa->askep            = $req->askep;
    //     $anamnesa->observasi        = $req->observasi;
    //     $anamnesa->biopsikososial   = $req->biopsikososial;
    //     $anamnesa->save();

    //     //Simpan Periksa Fisik
    //     $fisik = Tpelayanan::find($id)->periksafisik;
    //     $fisik->pelayanan_id     = $id;
    //     $fisik->dokter_id        = $dokter_id;
    //     $fisik->perawat_id       = $perawat_id;
    //     $fisik->sistole          = $req->sistole;
    //     $fisik->diastole         = $req->diastole;
    //     $fisik->detak_nadi       = $req->detak_nadi;
    //     $fisik->nafas            = $req->nafas;
    //     $fisik->detak_jantung    = $req->detak_jantung;
    //     $fisik->suhu             = $req->suhu;
    //     $fisik->kesadaran        = $req->kesadaran;
    //     $fisik->triage           = $req->triage;
    //     $fisik->berat            = $req->berat;
    //     $fisik->tinggi           = $req->tinggi;
    //     $fisik->lingkar_perut    = $req->lingkar_perut;
    //     $fisik->imt              = $req->imt;
    //     $fisik->hasil_imt        = $req->hasil_imt;
    //     $fisik->aktifitas_fisik  = $req->aktifitas_fisik;
    //     $fisik->skala_nyeri      = $req->nyeri;
    //     $fisik->save();
        
    //     //Simpan Riwayat Penyakit
    //     $checkRPS = $anamnesa->rps->where('jenis_riwayat','Riwayat Penyakit Sekarang')->first();
    //     if($checkRPS == null){
    //         if(!is_null($req->riwayat_penyakit_sekarang)){
    //             $rp = new Mriwayat;
    //             $rp->anamnesa_id = $anamnesa->id;
    //             $rp->jenis_riwayat = 'Riwayat Penyakit Sekarang';
    //             $rp->value = $req->riwayat_penyakit_sekarang;
    //             $rp->save();
    //         }
    //     }else{
    //         $rps = $checkRPS;
    //         $rps->anamnesa_id = $anamnesa->id;
    //         $rps->jenis_riwayat = 'Riwayat Penyakit Sekarang';
    //         $rps->value = $req->riwayat_penyakit_sekarang;
    //         $rps->save();
    //     }

    //     $checkRPD = $anamnesa->rpd->where('jenis_riwayat','Riwayat Penyakit Dulu')->first();
    //     if($checkRPD == null){
    //         if(!is_null($req->riwayat_penyakit_dulu)){
    //             $rp = new Mriwayat;
    //             $rp->anamnesa_id = $anamnesa->id;
    //             $rp->jenis_riwayat = 'Riwayat Penyakit Dulu';
    //             $rp->value = $req->riwayat_penyakit_dulu;
    //             $rp->save();
    //         }
    //     }else{
    //         $rpd = $checkRPD;
    //         $rpd->anamnesa_id = $anamnesa->id;
    //         $rpd->jenis_riwayat = 'Riwayat Penyakit Dulu';
    //         $rpd->value = $req->riwayat_penyakit_dulu;
    //         $rpd->save();
    //     }
        
    //     $checkRPK = $anamnesa->rpk->where('jenis_riwayat','Riwayat Penyakit Keluarga')->first();
    //     if($checkRPK == null){
    //         if(!is_null($req->riwayat_penyakit_keluarga)){
    //             $rp = new Mriwayat;
    //             $rp->anamnesa_id = $anamnesa->id;
    //             $rp->jenis_riwayat = 'Riwayat Penyakit Keluarga';
    //             $rp->value = $req->riwayat_penyakit_keluarga;
    //             $rp->save();
    //         }
    //     }else{
    //         $rpk = $checkRPK;
    //         $rpk->anamnesa_id = $anamnesa->id;
    //         $rpk->jenis_riwayat = 'Riwayat Penyakit Keluarga';
    //         $rpk->value = $req->riwayat_penyakit_keluarga;
    //         $rpk->save();
    //     }
        
    //     //Update Alergi Pasien
    //     $checkObat = $anamnesa->obat->where('jenis_alergi','Obat')->first();
    //     if($checkObat == null){
    //         if(!is_null($req->obat)){
    //             $rp = new Malergi;
    //             $rp->anamnesa_id = $anamnesa->id;
    //             $rp->jenis_alergi = 'Obat';
    //             $rp->value = $req->obat;
    //             $rp->save();
    //         }
    //     }else{
    //         $obat = $checkObat;
    //         $obat->anamnesa_id = $anamnesa->id;
    //         $obat->jenis_alergi = 'Obat';
    //         $obat->value = $req->obat;
    //         $obat->save();
    //     }

    //     $checkMakanan = $anamnesa->makanan->where('jenis_alergi','Makanan')->first();
    //     if($checkMakanan == null){
    //         if(!is_null($req->riwayat_penyakit_dulu)){
    //             $rp = new Malergi;
    //             $rp->anamnesa_id = $anamnesa->id;
    //             $rp->jenis_alergi = 'Makanan';
    //             $rp->value = $req->makanan;
    //             $rp->save();
    //         }
    //     }else{
    //         $makanan = $checkMakanan;
    //         $makanan->anamnesa_id = $anamnesa->id;
    //         $makanan->jenis_alergi = 'Makanan';
    //         $makanan->value = $req->makanan;
    //         $makanan->save();
    //     }
        
    //     $checkUmum = $anamnesa->umum->where('jenis_alergi','Umum')->first();
    //     if($checkUmum == null){
    //         if(!is_null($req->umum)){
    //             $rp = new Malergi;
    //             $rp->anamnesa_id = $anamnesa->id;
    //             $rp->jenis_alergi = 'Umum';
    //             $rp->value = $req->umum;
    //             $rp->save();
    //         }
    //     }else{
    //         $umum = $checkUmum;
    //         $umum->anamnesa_id = $anamnesa->id;
    //         $umum->jenis_alergi = 'Umum';
    //         $umum->value = $req->umum;
    //         $umum->save();
    //     }
    //     Alert::success('Anamnesa Berhasil Di Update');
    //     return back();
    //     //return redirect('/pelayanan/medis/proses/'.$id.'/umum/anamnesa');
    // }

    // public function umumDiagnosa($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     $diagnosa = DB::table('m_diagnosa')->select('id','value')->paginate(100);
        
    //     return view('puskes.pelayanan.medis.diagnosa.umum.create',compact('data','dokter','perawat','diagnosa'));
    // }

    // public function anakDiagnosa($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     $diagnosa = DB::table('m_diagnosa')->select('id','value')->paginate(100);
        
    //     return view('puskes.pelayanan.medis.diagnosa.anak.create',compact('data','dokter','perawat','diagnosa'));
    // }

    // public function anakMtbs($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $sp   = Mstatuspulang::all();
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     return view('puskes.pelayanan.medis.mtbs.anak.create',compact('data','sp','dokter','perawat'));
    // }

    public function Periksagizi($id)
    {   
        $data = Tpelayanan::find($id);
        $sp   = Mstatuspulang::all();
        $tenagamedis = Mpegawai::all()->map(function($item, $key){
            $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
            $item->nama_tenaga_medis = $item->jenispegawai->nama;
            return $item;
        });
        $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
        $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
        return view('puskes.pelayanan.medis.periksa_gizi.create',compact('data','sp','dokter','perawat'));   
    }
    
    // public function anakImunisasi($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $sp   = Mstatuspulang::all();
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     return view('puskes.pelayanan.medis.imunisasi.anak.check',compact('data','sp','dokter','perawat'));   
    // }
    

    // public function gigiDiagnosa($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     $diagnosa = DB::table('m_diagnosa')->select('id','value')->paginate(100);
        
    //     return view('puskes.pelayanan.medis.diagnosa.gigi.create',compact('data','dokter','perawat','diagnosa'));
    // }

    // public function storeDiagnosa(Request $req, $id)
    // {
    //     $tanggal = Carbon::now();
    //     $diagnosa = new Tdiagnosa;
    //     $diagnosa->tanggal      = $tanggal;
    //     $diagnosa->pelayanan_id = $id;
    //     $diagnosa->dokter_id    = $req->dokter_id;
    //     $diagnosa->perawat_id   = $req->perawat_id;
    //     $diagnosa->diagnosa_id  = $req->diagnosa_id;
    //     $diagnosa->diagnosa_kasus  = $req->diagnosa_kasus;
    //     $diagnosa->diagnosa_jenis  = $req->diagnosa_jenis;
    //     $diagnosa->save();
    //     toast('Diagnosa Berhasil Di Simpan', 'success');
    //     return back();
    // }

    // public function deleteDiagnosa($id, $id_diagnosa)
    // {
    //     $del = Tdiagnosa::find($id_diagnosa)->delete();
    //     return back();
    // }

    // public function umumResep($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     $obat = DB::table('m_obat')->select('id','value')->get();
    //     $signa = DB::table('m_signa')->select('value')->get();
    //     return view('puskes.pelayanan.medis.resep.umum.create',compact('data','dokter','perawat', 'obat','signa'));
    // }

    // public function anakResep($id)
    // {
    //     $checkAnamnesa = Tanamnesa::where('pelayanan_id', $id)->first();
    //     $keluhan = Mlookup::where('for','keluhan')->get();
    //     $kesadaran = Mlookup::where('for','kesadaran')->get()->sortby('id');
    //     if($checkAnamnesa == null)
    //     {
    //         $data = Tpelayanan::find($id);
    //         $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //             $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //             $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //             return $item;
    //         });
    //         $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //         $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //         Alert::info('Harap Isi Anamnesa Terlebih Dahulu', 'Info');
    //         return view('puskes.pelayanan.medis.anamnesa.anak.create',compact('data','dokter','perawat','keluhan','kesadaran'));

    //     }
    //     else{
    //         $data = Tpelayanan::find($id);
    //         $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //             $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //             $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //             return $item;
    //         });
    //         $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //         $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //         $obat = DB::table('m_obat')->select('id','value')->get();
    //         $signa = DB::table('m_signa')->select('value')->get();
    //         return view('puskes.pelayanan.medis.resep.anak.create',compact('data','dokter','perawat', 'obat','signa'));
    //     }
    // }

    // public function gigiResep($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     $obat = DB::table('m_obat')->select('id','value')->get();
    //     $signa = DB::table('m_signa')->select('value')->get();
    //     return view('puskes.pelayanan.medis.resep.gigi.create',compact('data','dokter','perawat', 'obat','signa'));
    // }

    // public function storeResep(Request $req, $id)
    // {
    //     $checkResep = Tpelayanan::find($id)->resep;
    //     if($checkResep == null){
    //         $t               = new Tresep;
    //         $t->no_resep     = $req->no_resep;
    //         $t->tanggal      = Carbon::now();
    //         $t->dokter_id    = $req->dokter_id;
    //         $t->perawat_id   = $req->perawat_id;
    //         $t->pelayanan_id = $id;
    //         $t->save();

    //         $r = new Tresepdetail;
    //         $r->resep_id               = $t->id;
    //         $r->obat_id                = $req->obat_id;
    //         $r->obat_jumlah            = $req->obat_jumlah;
    //         $r->obat_signa             = $req->obat_signa;
    //         $r->aturan_pakai           = $req->aturan_pakai;
    //         $r->obat_racikan           = $req->racikan;
    //         $r->obat_jumlah_permintaan = $req->obat_jumlah_permintaan;
    //         $r->obat_keterangan        = $req->keterangan;
    //         $r->save();
    //     }else{
    //         $r = new Tresepdetail;
    //         $r->resep_id               = $checkResep->id;
    //         $r->obat_id                = $req->obat_id;
    //         $r->obat_jumlah            = $req->obat_jumlah;
    //         $r->obat_signa             = $req->obat_signa;
    //         $r->aturan_pakai           = $req->aturan_pakai;
    //         $r->obat_racikan           = $req->racikan;
    //         $r->obat_jumlah_permintaan = $req->obat_jumlah_permintaan;
    //         $r->obat_keterangan        = $req->keterangan;
    //         $r->save();
    //     }
    //     toast('Resep Berhasil Di Simpan', 'success');
    //     return back();
    // }

    // public function umumLaboratorium($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $sp = Mstatuspulang::all();
    //     $lab = Mjenislab::all()->map(function($item, $key){
    //         $item->laboratorium = $item->lab->where('deleted_by', null);
    //         return $item;
    //     });
    //     return view('puskes.pelayanan.medis.lab.umum.create',compact('data','sp','lab'));
    // }

    // public function umumTindakan($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $sp   = Mstatuspulang::all();
    //     $tindakan = Mtindakan::all();
    //     $lab  = Mjenislab::all()->map(function($item, $key){
    //         $item->laboratorium = $item->lab->where('deleted_by', null);
    //         return $item;
    //     });
        
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     return view('puskes.pelayanan.medis.tindakan.umum.create',compact('data','sp','lab','dokter','perawat','tindakan'));
    // }
    
    // public function anakTindakan($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $sp   = Mstatuspulang::all();
    //     $tindakan = Mtindakan::all();
    //     $lab  = Mjenislab::all()->map(function($item, $key){
    //         $item->laboratorium = $item->lab->where('deleted_by', null);
    //         return $item;
    //     });
        
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     return view('puskes.pelayanan.medis.tindakan.anak.create',compact('data','sp','lab','dokter','perawat','tindakan'));
    // }

    // public function gigiTindakan($id)
    // {
    //     $data = Tpelayanan::find($id);
    //     $sp   = Mstatuspulang::all();
    //     $tindakan = Mtindakan::all();
    //     $lab  = Mjenislab::all()->map(function($item, $key){
    //         $item->laboratorium = $item->lab->where('deleted_by', null);
    //         return $item;
    //     });
        
    //     $tenagamedis = Mpegawai::all()->map(function($item, $key){
    //         $item->kelompok_pegawai = $item->jenispegawai->kelompok_pegawai;
    //         $item->nama_tenaga_medis = $item->jenispegawai->nama;
    //         return $item;
    //     });
    //     $dokter = $tenagamedis->where('kelompok_pegawai', 'TENAGA MEDIS')->values();
    //     $perawat = $tenagamedis->where('kelompok_pegawai','!=','TENAGA MEDIS')->values();
    //     return view('puskes.pelayanan.medis.tindakan.gigi.create',compact('data','sp','lab','dokter','perawat','tindakan'));
    // }

    // public function storeTindakan(Request $req, $id)
    // {
    //     $t = new Ttindakan;
    //     $t->tanggal      = Carbon::now();
    //     $t->pelayanan_id = $id;
    //     $t->dokter_id    = $req->dokter_id;
    //     $t->perawat_id   = $req->perawat_id;
    //     $t->tindakan_id  = $req->tindakan_id;
    //     $t->tanggal_rencana = Carbon::parse($req->tanggal_rencana);
    //     $t->lama_tindakan   = $req->lama_tindakan;
    //     $t->hasil           = $req->hasil;
    //     $t->jumlah          = $req->jumlah;
    //     $t->keterangan      = $req->keterangan;
    //     $t->tarif           = Mtindakan::find($req->tindakan_id)->first()->tarif;
    //     $t->save();
    //     toast('Tindakan Berhasil Di Simpan', 'success');
    //     return back();
    // }

    // public function deleteResep($id, $id_resep)
    // {
    //     $del = Tresepdetail::find($id_resep)->delete();
    //     return back();
    // }

    public function medisPoli(Request $req)
    {
        if($req->ruangan_id == 'semua'){
            $date = Carbon::createFromFormat('d/m/Y', $req->tanggal)->format('Y-m-d').'%';
            $data = Tpelayanan::Where('tanggal', 'LIKE', $date)->orderBy('tanggal','desc')->paginate(10);
           
            $ruangan = Mruangan::where('is_aktif', 'Y')->orderBy('nama','desc')->get();
            $data->appends($req->only('ruangan_id'));
            $req->flash();
        }else{
            $date = Carbon::createFromFormat('d/m/Y', $req->tanggal)->format('Y-m-d').'%';
            $data = Tpelayanan::where('ruangan_id', $req->ruangan_id)->Where('tanggal', 'LIKE', $date)->orderBy('tanggal','desc')->paginate(10);
           
            $ruangan = Mruangan::where('is_aktif', 'Y')->orderBy('nama','desc')->get();
            $data->appends($req->only('ruangan_id'));
            $req->flash();
        }
        return view('puskes.pelayanan.medis.medis',compact('data','ruangan'));
    }

    // public function storeLab(Request $req, $id)
    // {
    //     if($req->lab == null){
    //         toast('Test Lab Belum Di Pilih', 'info');
    //     }else{
    //         $dataLab = Mlaboratorium::whereIn('id', $req->lab)->get();
    //         $checkLab = Tlaboratorium::where('pelayanan_id', $id)->first();

    //         if($checkLab == null){
    //             //Jika Lab Kosong Simpan Baru
    //             $lab = new Tlaboratorium;
    //             $lab->tanggal = Carbon::now();
    //             $lab->pelayanan_id = $id;
    //             $lab->save();
                
    //             foreach($dataLab as $value)
    //             {
    //                 $labdetail = new Tlaboratoriumdetail;
    //                 $labdetail->pemeriksaan_id = $lab->id;
    //                 $labdetail->laboratorium_id = $value->id;
    //                 $labdetail->tarif = $value->tarif;
    //                 $labdetail->nilai_normal = $value->nilai_normal;
    //                 $labdetail->satuan = $value->satuan;
    //                 $labdetail->save();
    //             }
    //             toast('Lab Berhasil Di Simpan', 'success');
    //         }else{
    //             //Jika Lab Ada update Data
    //             foreach($dataLab as $value)
    //             {
    //                 $checkLabDetail = Tlaboratoriumdetail::where('pemeriksaan_id', $checkLab->id)->where('laboratorium_id', $value->id)->first();
    //                 if($checkLabDetail == null){
    //                     $labdetail = new Tlaboratoriumdetail;
    //                     $labdetail->pemeriksaan_id = $checkLab->id;
    //                     $labdetail->laboratorium_id = $value->id;
    //                     $labdetail->tarif = $value->tarif;
    //                     $labdetail->nilai_normal = $value->nilai_normal;
    //                     $labdetail->satuan = $value->satuan;
    //                     $labdetail->save();
    //                 }else{

    //                 }
    //             }
    //             toast('Lab Berhasil Di Simpan', 'success');
    //         }
    //     }
    //     return back();
    // }

    // public function deleteLab($id)
    // {
    //     $del = Tlaboratoriumdetail::find($id)->delete();
    //     toast('Data Berhasil Di Hapus', 'success');
    //     return back();
    // }

    public function apotek()
    {
        $today = Carbon::today()->format('Y-m-d');
        $data = Tpelayanan::where('tanggal','LIKE', $today.'%')->orderBy('created_at','desc')->paginate(10);
        return view('puskes.pelayanan.apotek.index',compact('data'));
    }

    public function apotekSearch(Request $req)
    {
        $date = Carbon::createFromFormat('d/m/Y', $req->tanggal)->format('Y-m-d').'%';
        $data = Tpelayanan::Where('tanggal', 'LIKE', $date)->orderBy('tanggal','desc')->paginate(10);        
        $req->flash();
        return view('puskes.pelayanan.apotek.index',compact('data'));
    }

    public function detailResep($id)
    {
        $data = Tpelayanan::find($id);
        return view('puskes.pelayanan.apotek.resep',compact('data'));
        
    }

    public function ambilResep($id)
    {
        //Ubah status menjadi sudah ambil
        $resep = Tresep::where('pelayanan_id', $id)->first();
        $resep->status_ambil = '1';
        $resep->save();
        toast('resep sudah diambil', 'success');
        return redirect('/pelayanan/apotek');
    }
}
