<?php

namespace App\Http\Controllers;

use Session;
use App\Mruangan;
use Carbon\Carbon;
use App\Tpelayanan;
use App\Tpendaftaran;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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

                $pasien       = $this->pasienToday();
                $sevenDay     = $this->pasien7day();
                $pasienMonth  = $this->pasienMonth();
                return view('home_puskes',compact('ruangan','jml','pasien','sevenDay','pasienMonth'));
            }
        }
    }

    public function pasienToday()
    {
        $today = Carbon::now()->format('Y-m-d')." 00:00:00";
        $data  = Tpendaftaran::where('tanggal', '>=', $today)->get();
        $count = $data->count();
        return $count;
    }

    public function pasien7day()
    {
        $today = Carbon::today()->format('Y-m-d');
        $sevenDay = CarbonImmutable::now()->add(-7, 'day')->format('Y-m-d');
        $data  = Tpendaftaran::whereBetween('tanggal', [$sevenDay." 00:00:00",$today." 23:59:59"])->get();
        $count = $data->count();
        return $count;
    }
    
    public function pasienMonth()
    {
        $year = Carbon::today()->format('Y');
        $month = Carbon::today()->format('m');
        $data  = Tpendaftaran::whereYear('tanggal', '=', $year)->whereMonth('tanggal', '=', $month)->get()->count();
        return $data;
    }
}
