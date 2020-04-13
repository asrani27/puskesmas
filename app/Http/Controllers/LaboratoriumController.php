<?php

namespace App\Http\Controllers;

use Alert;
use Carbon\Carbon;
use App\Mlaboratorium;
use App\Tlaboratorium;
use App\Tlaboratoriumdetail;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    
    public function storeLab(Request $req, $id)
    {
        if($req->lab == null){
            toast('Test Lab Belum Di Pilih', 'info');
        }else{
            $dataLab = Mlaboratorium::whereIn('id', $req->lab)->get();
            $checkLab = Tlaboratorium::where('pelayanan_id', $id)->first();

            if($checkLab == null){
                //Jika Lab Kosong Simpan Baru
                $lab = new Tlaboratorium;
                $lab->tanggal = Carbon::now();
                $lab->pelayanan_id = $id;
                $lab->save();
                
                foreach($dataLab as $value)
                {
                    $labdetail = new Tlaboratoriumdetail;
                    $labdetail->pemeriksaan_id = $lab->id;
                    $labdetail->laboratorium_id = $value->id;
                    $labdetail->tarif = $value->tarif;
                    $labdetail->nilai_normal = $value->nilai_normal;
                    $labdetail->satuan = $value->satuan;
                    $labdetail->save();
                }
                toast('Lab Berhasil Di Simpan', 'success');
            }else{
                //Jika Lab Ada update Data
                foreach($dataLab as $value)
                {
                    $checkLabDetail = Tlaboratoriumdetail::where('pemeriksaan_id', $checkLab->id)->where('laboratorium_id', $value->id)->first();
                    if($checkLabDetail == null){
                        $labdetail = new Tlaboratoriumdetail;
                        $labdetail->pemeriksaan_id = $checkLab->id;
                        $labdetail->laboratorium_id = $value->id;
                        $labdetail->tarif = $value->tarif;
                        $labdetail->nilai_normal = $value->nilai_normal;
                        $labdetail->satuan = $value->satuan;
                        $labdetail->save();
                    }else{

                    }
                }
                toast('Lab Berhasil Di Simpan', 'success');
            }
        }
        return back();
    }
    
    public function deleteLab($id)
    {
        $del = Tlaboratoriumdetail::find($id)->delete();
        toast('Data Berhasil Di Hapus', 'success');
        return back();
    }
}
