<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Mruangan;
use Carbon\Carbon;
use App\Mpuskesmas;
use App\Tpelayanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $data  = [0, 4, 7, 10];
        // $angka = 5;
        // $max = max($data);
        // $min = min($data);
    

    //    return collect($data)->map(function($item, $key)use($angka, $data){
      
    //         if ($angka == $item) {
    //             $a = $angka;
    //         }else{
    //             if ($angka > $item) {
    //                 $a =  $angka - 1;
    //             }else{
    //                 $a =  $data;
    //             }
    //         }

    //         return $a;

    //     })->first();



        // if (in_array($angka, $data)) {
        //     echo $angka;
        // }else{

        //   return collect($data)->map(function($item, $key)use($angka){

        //     $cur = range($item, $angka);
        //     return [
        //         $cur
        //     ];

        //   });
          
        // }

        // $index = array_search($angka, $data);
        // $range = range($min, $max);
        // $a = array_diff($range, $data);

    
        // if($index !== false && $index > 0 ) {

        //     $prev = $data[$index-1];
        // }
        // if($index !== false && $index < count($data)-1){

        //     $next = $data[$index+1];
        // } 

        // echo $prev;
        

        // die;
        

        // foreach ($data as $key => $value) {
            
        //     if (strpos($value, $angka) !== false) {
        //         echo "ada";
        //     }else{
        //         echo "kdd";
        //     }

        // }
        // die;


        if(Auth::user() == null){
            return redirect('/');
        }else{
            if(Auth::user()->hasRole('superadmin')){
                return view('home');   
            }else{
                $ruangan = Mruangan::where('is_aktif', 'Y')->get()->map(function($item){
                    return $item->nama;
                });
                
                $jml = Mruangan::where('is_aktif', 'Y')->get()->map(function($item){
                    $month = Carbon::today()->format('m');
                    $year = Carbon::today()->format('Y');
                    
                    $item->jml = count(Tpelayanan::where('ruangan_id', $item->id)->whereMonth('tanggal', $month)->whereYear('tanggal', $year)->get());
                    return $item->jml;
                });
                
                return view('home_puskes',compact('ruangan','jml'));
            }    
        }
    }
}
