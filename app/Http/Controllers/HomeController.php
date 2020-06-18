<?php

namespace App\Http\Controllers;

use App\Mruangan;
use Carbon\Carbon;
use App\Tpelayanan;
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

                return view('home_puskes',compact('ruangan','jml'));
            }
        }
    }
}
