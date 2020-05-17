<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Modontogram;
use App\Todontogram;
use App\Todontogram_detail;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Alert;

class OdontogramController extends Controller
{
    public function store(Request $req, $id)
    {
        $data = collect($req->OdontogramDetail)->map(function($item, $value){
            $item['odontogram_no'] = $value;
            return $item;
        })->filter(function($item){
            return $item['value'] != 'wwwww';
        });
        $checkCount = count($data);
        //dd($data, $req->all(), $req->dokter_id);
        //Simpan Odontogram
        $todon = new Todontogram;
        $todon->tanggal            = Carbon::now()->format('Y-m-d h:i:s');
        $todon->pelayanan_id       = $id;
        $todon->dokter_id          = $req->dokter_id;
        $todon->perawat_id         = $req->perawat_id;
        // $todon->occlusi            = $req->Odontogram['occlusi'];
        // $todon->torus_palatinus    = $req->Odontogram['torus_palatinus'];
        // $todon->torus_mandibularis = $req->Odontogram['torus_mandibularis'];
        // $todon->palatum            = $req->Odontogram['palatum'];
        // $todon->diastema           = $req->Odontogram['diastema'];
        $todon->diastema_keterangan     = $req->Odontogram['diastema_keterangan'];
        //$todon->gigi_anomali            = $req->Odontogram['gigi_anomali'];
        $todon->gigi_anomali_keterangan = $req->Odontogram['gigi_anomali_keterangan'];
        $todon->lain_lain               = $req->Odontogram['lain_lain'];
        $todon->d                       = $req->Odontogram['d'];
        $todon->m                       = $req->Odontogram['m'];
        $todon->f                       = $req->Odontogram['f'];
        $todon->jumlah_photo            = $req->Odontogram['jumlah_photo'];
        //$todon->keterangan_photo            = $req->Odontogram['keterangan_photo'];
        $todon->jumlah_rontgen_photo        = $req->Odontogram['jumlah_rontgen_photo'];
        //$todon->keterangan_rontgen_photo    = $req->Odontogram['keterangan_rontgen_photo'];
        $todon->keterangan                  = $req->Odontogram['keterangan'];
        $todon->save();
        $odontogram_id = $todon->id;

        if($checkCount != 0){
            foreach($data as $key => $item)
            {
                $tdetail = new Todontogram_detail;
                $tdetail->odontogram_id = $odontogram_id;
                $tdetail->odontogram_no = $item['odontogram_no'];
                $tdetail->value         = $item['value'];
                $tdetail->save();
            }
        }
        toast('Berhasil Disimpan', ' success');
        return back();
    }

    public function update(Request $req, $id)
    {
        dd($req->all());
    }
    public function image($code, $tipe)
    {
        $gambar = Storage::url('gigi/'.$code.'_'.$tipe.'.png');
        return Image::make(url($gambar))->response('png');
    }

    public function generatekode()
    {
        do{     
            do {
                $length = 5;
                $str = "";
                $characters = ['w','q'];
                $max = count($characters) - 1;
                for ($i = 0; $i < $length; $i++) {
                    $rand = mt_rand(0, $max);
                        $str .= $characters[$rand];
                    }
                    
                $kode  = $str;
                $cari  = Modontogram::where('kode', $kode)->get();
                $count = count($cari);
                
                $total = Modontogram::all();
            } while ($count > 0);
            $s = new Modontogram;
            $s->kode = $kode;
            $s->save();
            
            $cari2  = Modontogram::where('kode', $kode)->get();
            $count2 = count($cari2);
            
        } while($count2 == 1);
    }
    
    public function tarikgambar()
    {
        $data = Modontogram::all();

        return view('tarikgambar',compact('data'));
        // foreach($data as $item)
        // {
        //     $url = 'view-source:https://kotabanjarmasin.epuskesmas.id/odontogram/edit/2726?code='.$item->kode.'&tipe=empat';  
        //     //'https://media.geeksforgeeks.org/wp-content/uploads/geeksforgeeks-6-1.png';
        
        //     $img = 'logo.png';  
    
        //     //$contents = file_get_contents($url);
        //     dd($url);
        //     Storage::put('/public/gigi2/'.$item->kode.'.png', $contents);
        // }
        // dd('selesai');
    }
}