<?php

namespace App\Http\Controllers;

use App\Exports\ObatExport;
use App\Imports\ObatImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\{Mobat, Mobatunit, Mobattitle, Mruangan, Mstokobat};

class ObatController extends Controller
{

    public function index()
    {
        return view('master.obat.index', [
            'data' => Mobat::get()
        ]);
    }

    public function add()
    {
        return view('master.obat.create', [
            'title' => Mobattitle::all(),
            'unit' => Mobatunit::all(),
        ]);
    }

    public function store(Request $req)
    {
        $attr = $req->all();
        $attr['id'] = $this->autoNumber();

        Mobat::create($attr);

        toast('Data Berhasil Di Tambahkan', 'success');
        return back();
    }

    public function edit(Mobat $obat)
    {
        return view('master.obat.edit', [
            'data' => $obat,
            'title' => Mobattitle::all(),
            'unit' => Mobatunit::all(),
        ]);
    }

    public function update(Request $req, Mobat $obat)
    {
        $obat->update($req->all());
        toast('Data Berhasil Di Update', 'success');
        return back();
    }

    public function delete(Mobat $obat)
    {
        if ($obat->m_stok_obat->first() == null) {
            $obat->delete();
            toast('Data Berhasil Di Hapus', 'success');
        } else {
            toast('Tidak Dapat Di Hapus Karena Terdapat Stok Pada Obat Ini', 'info');
        }
        return back();
    }

    public function downloadFormatExcel()
    {
        return Excel::download(new ObatExport, 'ObatFormat.xlsx');
    }

    public function importExcel(Request $req)
    {
        
        $this->validate($req, [
            'file'  => 'required|mimes:xls,xlsx'
        ]);
        $data = Excel::toCollection(new ObatImport, $req->file('file'))->first();
        $format = $this->formatImport($data);
        
        DB::transaction(function() use ($format) {
            foreach ($format as $item) {
                $checkObat = Mobat::where('value', $item['value'])->first();
                if(!$checkObat)
                {
                    $obat = Mobat::create([
                        'id' => $this->autoNumber(),
                        'value' => $item['value'],
                        'obat_title' => $item['obat_title'],
                        'obat_unit' => $item['obat_unit'],
                    ]);
    
                    if($item['stok']['gudang'] != 0) {
                        Mstokobat::create([
                            'puskesmas_id' => Auth()->user()->puskesmas_id,
                            'ruangan_id'   => $this->gudang_id(),
                            'obat_id'      => $obat['id'],
                            'jumlah_stok'  => $item['stok']['gudang'],
                            'harga_jual'   => 0
                        ]);
                    }
                    
                    if($item['stok']['apotik'] != 0) {
                        Mstokobat::create([
                            'puskesmas_id' => Auth()->user()->puskesmas_id,
                            'ruangan_id'   => $this->apotek_id(),
                            'obat_id'      => $obat['id'],
                            'jumlah_stok'  => $item['stok']['apotik'],
                            'harga_jual'   => 0
                        ]);
                    }
                }
            }
        });
        
        
        Alert::success('Import Data Obat Berhasil', 'success');
        return back();
    }

    public function formatImport($collection)
    {
        return $collection->map(function($item){
            $data['no'] = $item[0];
            $data['value'] = $item[1];
            $data['obat_unit'] = $this->obat_unit($item[2]);
            $data['obat_title'] = $this->obat_title($item[3]);
            $data['stok'] = [
                'gudang' => $item[4],
                'apotik' => $item[5],
            ];
            return $data;
        })->where('value', '!=', null)->where('no', '!=', 'No')->values()->toArray();
    }
    
    public function autoNumber()
    {
        $number = Mobat::get()->pluck('id')->sort()->toArray();
        return end($number) + 1;
    }

    public function obat_unit($param)
    {
        return Mobatunit::where('value', $param)->first() == null ? null : Mobatunit::where('value', $param)->first()->id;
    }

    public function obat_title($param)
    {
        return Mobattitle::where('value', $param)->first() == null ? null : Mobattitle::where('value', $param)->first()->id;
    }

    public function apotek_id()
    {
        return Mruangan::where('nama', 'like', '%apotek%')->first() == null ? null : Mruangan::where('nama', 'like', '%apotek%')->first()->id;
    }
    
    public function gudang_id()
    {
        return Mruangan::where('nama', 'like', '%gudang%')->first() == null ? null : Mruangan::where('nama', 'like', '%gudang%')->first()->id;
    }
}
