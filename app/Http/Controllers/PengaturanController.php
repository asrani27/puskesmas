<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use Alert;
use Cache;
use Session;
use App\Role;
use App\User;
use App\Mobat;
use App\Mpegawai;
use App\Mruangan;
use App\Mdiagnosa;
use App\Mobatunit;
use App\Mstokobat;
use Carbon\Carbon;
use App\Minstalasi;
use App\Mobattitle;
use App\Mpuskesmas;
use App\Tkeranjang;
use App\Mjenispegawai;
use App\Tpenerimaanobat;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Tpenerimaanobatdetail;

class PengaturanController extends Controller
{

    public function __construct()
    {
    }
    public function dataMaster()
    {
        $ruang        = count(Mruangan::all());
        $pegawai      = count(Mpegawai::all());
        $jenispegawai = count(Mjenispegawai::all());
        $user         = count(User::all());
        $obat         = count(Mobat::all());
        $stokobat     = count(Mstokobat::all());
        $diagnosa     = Mdiagnosa::count();
        return view('master.index', compact('ruang', 'pegawai', 'jenispegawai', 'user', 'obat', 'stokobat', 'diagnosa'));
    }

    public function addPoli()
    {
        $int = Minstalasi::all();
        return view('master.ruangan.create', compact('int'));
    }

    public function editPoli($id)
    {
        $data = Mruangan::find($id);
        $menuAkses = collect(json_decode($data->menu_akses));
        $int = Minstalasi::all();
        return view('master.ruangan.edit', compact('data', 'int', 'menuAkses'));
    }

    public function updatePoli(Request $req, $id)
    {
        $s               = Mruangan::find($id);
        $s->instalasi_id = $req->instalasi_id;
        $s->nama         = $req->nama;
        $s->is_aktif     = $req->is_aktif;
        $s->menu_akses   = json_encode($req->menu);
        $s->save();
        toast('Poli berhasil Di Update', 'success');
        return redirect('/pengaturan/data_master/poli');
    }

    public function deletePoli($id)
    {
        $check = Mruangan::find($id)->pelayanan->first();
        if ($check == null) {
            $del = Mruangan::find($id)->delete();
            toast('Poli Berhasil Di Hapus', 'success');
        } else {
            toast('Poli Tidak Dapat Di Hapus Karena Ada Riwayat Pendaftaran', 'info');
        }
        return back();
    }

    public function storePoli(Request $req)
    {
        $id_ruangan      = convertruangan((int) Mruangan::orderBy('id', 'DESC')->first()->id + 1);
        
        $s               = new Mruangan;
        $s->id           = $id_ruangan;
        $s->instalasi_id = $req->instalasi_id;
        $s->urutan       = (int) $id_ruangan;
        $s->nama         = $req->nama;
        $s->is_aktif     = $req->is_aktif;
        $s->menu_akses   = json_encode($req->menu);
        $s->save();
        
        toast('Poli berhasil Di Simpan', 'success');
        return redirect('/pengaturan/data_master/poli');
    }

    //--------------------- PEGAWAI------------------------------------
    public function pegawai()
    {
        $data = Mpegawai::all();
        return view('master.pegawai.index', compact('data'));
    }

    public function addPegawai()
    {
        $jenis = Mjenispegawai::all();
        return view('master.pegawai.create', compact('jenis'));
    }

    public function storePegawai(Request $req)
    {
        if (Mpegawai::first() == null) {
            $id = convertid(1);
        } else {
            $id  = convertid((int) Mpegawai::orderBy('id', 'DESC')->first()->id + 1);
        }

        $s                  = new Mpegawai;
        $s->id              = $id;
        $s->nip             = $req->nip;
        $s->nama            = $req->nama;
        $s->jenispegawai_id = convertruangan($req->jenispegawai_id);
        $s->jenis_kelamin   = $req->jenis_kelamin;
        $s->save();
        toast('Pegawai berhasil Di Simpan', 'success');
        return redirect('/pengaturan/data_master/pegawai');
    }

    public function updatePegawai(Request $req, $id)
    {
        $s                  = Mpegawai::find($id);
        $s->nip             = $req->nip;
        $s->nama            = $req->nama;
        $s->jenispegawai_id = convertruangan($req->jenispegawai_id);
        $s->jenis_kelamin   = $req->jenis_kelamin;
        $s->save();
        toast('Pegawai berhasil Di Update', 'success');
        return redirect('/pengaturan/data_master/pegawai');
    }

    public function deletePegawai($id)
    {
        $check = Mpegawai::find($id)->periksabydokter->first();
        if ($check == null) {
            $del = Mpegawai::find($id)->delete();
            toast('Pegawai Berhasil Di Hapus', 'success');
        } else {
            toast('Pegawai Tidak Dapat Di Hapus Karena Ada Riwayat memeriksa Pasien', 'info');
        }
        return back();
    }

    public function editPegawai($id)
    {
        $data = Mpegawai::find($id);
        $jenis = Mjenispegawai::all();
        return view('master.pegawai.edit', compact('data', 'jenis'));
    }

    //--------------------- JENIS PEGAWAI------------------------------------
    public function jenispegawai()
    {
        $data = Mjenispegawai::all();
        return view('master.jenispegawai.index', compact('data'));
    }

    public function addJenisPegawai()
    {
        $jenis = Mjenispegawai::all();
        return view('master.jenispegawai.create', compact('jenis'));
    }

    public function storeJenisPegawai(Request $req)
    {
        $id  = convertruangan((int) Mjenispegawai::orderBy('id', 'DESC')->first()->id + 1);

        $s                  = new Mjenispegawai;
        $s->id              = $id;
        $s->nama            = $req->nama;
        $s->urutan          = (int) $id;
        $s->kelompok_pegawai = $req->kelompok_pegawai;
        $s->save();
        toast('jenis Pegawai berhasil Di Simpan', 'success');
        return redirect('/pengaturan/data_master/jenispegawai');
    }

    public function updateJenisPegawai(Request $req, $id)
    {
        $s                  = Mjenispegawai::find($id);
        $s->id              = $id;
        $s->nama            = $req->nama;
        $s->urutan          = (int) $id;
        $s->kelompok_pegawai = $req->kelompok_pegawai;
        $s->save();
        toast('Pegawai berhasil Di Update', 'success');
        return redirect('/pengaturan/data_master/jenispegawai');
    }

    public function deleteJenisPegawai($id)
    {
        $check = Mjenispegawai::find($id)->pegawai->first();
        if ($check == null) {
            $del = Mjenispegawai::find($id)->delete();
            toast('Pegawai Berhasil Di Hapus', 'success');
        } else {
            toast('Pegawai Tidak Dapat Di Hapus Karena Ada Riwayat memeriksa Pasien', 'info');
        }
        return back();
    }

    public function editjenisPegawai($id)
    {
        $data = Mjenispegawai::find($id);
        return view('master.jenispegawai.edit', compact('data'));
    }

    //--------------------- USER------------------------------------
    public function user()
    {
        if (Auth::user()->username != 'admin') {
            $data = Auth::user();
            return view('master.user.edit', compact('data'));
        } else {
            $data = User::all();
            return view('master.user.index', compact('data'));
        }
    }

    public function addUser()
    {
        return view('master.user.create');
    }

    public function storeUser(Request $req)
    {
        $faker = Faker::create();

        $checkUsername = User::where('username', $req->username)->first();
        if ($checkUsername == null) {
            $s                  = new User;
            $s->id              = $req->username;
            $s->name            = $req->nama;
            $s->email           = $faker->email;
            $s->password        = bcrypt($req->password);
            $s->username        = $req->username;
            $s->puskesmas_id    = \App\Mpuskesmas::first()->id;
            $s->save();

            $role = Role::where('name', '=', 'admin')->first();

            $s->attachRole($role);

            toast('User Berhasil Disimpan', 'success');
        } else {
            toast('Username Sudah ada, silahkan gunakan yang lain', 'info');
        }

        return redirect('/pengaturan/data_master/user');
    }

    public function updateUser(Request $req, $id)
    {
        $s                  = User::where('id', $id)->first();
        $s->name            = $req->nama;
        if ($req->password != null) {
            $s->password    = bcrypt($req->password);
        }
        $s->save();
        toast('User Berhasil DiUpdate', 'success');
        return redirect('/pengaturan/data_master/user');
    }

    public function deleteUser($id)
    {
        if ($id == 'admin') {
            toast('Superadmin Tidak Dapat Di Hapus', 'info');
        } else {
            $d = User::where('id', $id)->first();
            $d->delete();
            toast('Berhasil Di hapus', 'info');
        }
        return back();
    }

    public function editUser($id)
    {
        $data = User::find($id);
        return view('master.jenispegawai.edit', compact('data'));
    }

    public function gantipass()
    {
        return view('master.user.gantipass');
    }

    public function updatepass(Request $req)
    {
        $u = User::first();
        $u->password = bcrypt($req->password);
        $u->save();
        toast('Berhasil Di Update', 'info');
        return redirect('/pengaturan/data_master/user');
    }

    public function editProfile()
    {
        $data = Mpuskesmas::first();
        return view('master.profile', compact('data'));
    }

    public function updateProfilePuskesmas(Request $req)
    {
        $data = Mpuskesmas::first();
        $data->nama = $req->nama;
        $data->alamat = $req->alamat;
        $data->save();
        toast('Berhasil Di Update', 'info');
        return back();
    }

    public function stokobat()
    {
        $data = Mstokobat::all();
        return view('master.stokobat.index', compact('data'));
    }

    public function addStokobat()
    {
        $obat = Mobat::all();
        return view('master.stokobat.create', compact('obat'));
    }

    public function storeStokobat(Request $req)
    {
        $check_ruangan = Mruangan::where('nama', $req->ruangan_id)->first();
        if ($check_ruangan == null) {
            toast('Ruangan Tidak Ditemukan', 'info');
        } else {
            $ruangan_id = $check_ruangan->id;
            $check = Mstokobat::where('obat_id', $req->obat_id)->where('ruangan_id', $ruangan_id)->first();
            if ($check == null) {
                $s = new Mstokobat;
                $s->puskesmas_id = Auth::user()->puskesmas_id;
                $s->ruangan_id   = $ruangan_id;
                $s->obat_id      = $req->obat_id;
                $s->harga_jual   = $req->harga_jual;
                $s->jumlah_stok  = $req->jumlah_stok;
                $s->save();
                toast('Data Obat Berhasil Di Simpan', 'success');
            } else {
                toast('Obat Pada Ruangan ini Sudah Ada', 'info');
            }
        }
        return back();
    }

    public function deleteStokobat($id)
    {
        $del = Mstokobat::find($id)->delete();
        toast('Data Obat Berhasil Di Hapus', 'success');
        return back();
    }

    public function editStokobat($id)
    {
        $data = Mstokobat::find($id);
        $obat = Mobat::all();
        return view('master.stokobat.edit', compact('obat', 'data'));
    }

    public function updateStokobat(Request $req, $id)
    {
        $s = Mstokobat::find($id);
        $s->obat_id     = $req->obat_id;
        $s->harga_jual  = $req->harga_jual;
        $s->jumlah_stok = $req->jumlah_stok;
        $s->save();
        toast('Data Obat Berhasil Di Update', 'success');
        return redirect('/pengaturan/data_master/stokobat');
    }

    public function obatmasuk()
    {
        $data = Tpenerimaanobat::orderBy('id', 'desc')->get();
        return view('master.obatmasuk.index', compact('data'));
    }

    public function addObatmasuk(Request $req)
    {
        $petugas = Mpegawai::all();
        $obat = Mobat::all();
        $data = Tkeranjang::all();

        return view('master.obatmasuk.create', compact('petugas', 'obat', 'data'));
    }

    public function deleteObatmasuk($id)
    {
        $del = Tpenerimaanobat::find($id)->delete();
        toast('Data Berhasil Di Hapus', 'success');
        return back();
    }

    public function keranjangObat(Request $req)
    {
        $check = Tkeranjang::where('obat_id', $req->obat_id)->first();
        if ($check == null) {
            $s = new Tkeranjang;
            $s->obat_id = $req->obat_id;
            $s->jumlah = $req->jumlah_obat;
            $s->save();
        } else {
            $s = $check;
            $s->jumlah = $s->jumlah + $req->jumlah_obat;
            $s->save();
        }

        return redirect()->back();
    }

    public function resetObatmasuk()
    {
        Tkeranjang::truncate();
        return back();
    }

    public function deleteKeranjangObat($key)
    {
        $del = Tkeranjang::find($key)->delete();
        return back();
    }

    public function storeObatmasuk(Request $req)
    {
        $tanggal    = Carbon::createFromFormat('d/m/Y', $req->tanggal)->format('Y-m-d');
        $keranjang  = Tkeranjang::all();
        $ruangan_id = Mruangan::where('nama', $req->ruangan_id)->first()->id;
        $petugas_id = Mpegawai::where('id', $req->pegawai_id)->first();

        //Save To Penerimaan Obat
        $t_penerimaan = new Tpenerimaanobat;
        $t_penerimaan->ruangan_id = $ruangan_id;
        $t_penerimaan->tanggal    = $tanggal;
        $t_penerimaan->petugas_id = $req->pegawai_id;
        $t_penerimaan->save();

        foreach ($keranjang as $value) {
            $t_p_detail = new Tpenerimaanobatdetail;
            $t_p_detail->penerimaan_id = $t_penerimaan->id;
            $t_p_detail->obat_id = $value->obat_id;
            $t_p_detail->obat_jumlah = $value->jumlah;
            $t_p_detail->save();
        }

        //Save To M Stok Obat
        foreach ($keranjang as $item) {
            $check = Mstokobat::where('obat_id', $item->obat_id)->first();
            if ($check == null) {
                $s = new Mstokobat;
                $s->puskesmas_id = Auth::user()->puskesmas_id;
                $s->ruangan_id = $ruangan_id;
                $s->obat_id = $item->obat_id;
                $s->harga_jual = 0;
                $s->jumlah_stok = $item->jumlah;
                $s->save();
            } else {
                $s = $check;
                $s->jumlah_stok = $item->jumlah + $s->jumlah_stok;
                $s->save();
            }
        }
        Tkeranjang::truncate();
        return redirect('/pengaturan/data_master/obatmasuk');
    }
}
