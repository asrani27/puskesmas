<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Role;
use App\User;
use App\Menu;
use App\Mpuskesmas;
use App\Mkecamatan;
use App\Mkelurahan;
use Auth;

class SuperadminController extends Controller
{
    public function __construct()
    {

    }

    /*
    |--------------------------------------------------------------------------
    | Function Role [CRUD]
    |--------------------------------------------------------------------------
    */

    public function role()
    {
        $data = Role::all();
        return view('superadmin.role',compact('data'));
    }

    public function addRole()
    {
        return view('superadmin.add_role');
    }

    public function simpanRole(Request $req)
    {
        $n = new Role;
        $n->name = $req->nama;
        $n->display_name = $req->nama;
        $n->description = $req->deskripsi;
        $n->save();
        Alert::success('Role Berhasil Di Simpan','Pesan');
        return redirect('/sa/role');
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $hasUser = $role->users()->get()->first();
        if(is_null($hasUser)){
            $del = Role::find($id)->delete();
            Alert::success('Role Berhasil Di Hapus','Pesan');
        }else{

            Alert::error('Role Tidak Bisa Di Hapus Karena Ada user yang memakai role tersebut','Pesan');
        }
        return back();
    }

    public function editRole($id)
    {
        $data = Role::find($id);
        return view('superadmin.edit_role',compact('data'));
    }

    public function updateRole(Request $req, $id)
    {
        $u = Role::find($id);
        $u->name = $req->nama;
        $u->display_name = $req->nama;
        $u->description = $req->deskripsi;
        $u->save();
        Alert::success('Role Berhasil Di Update','Pesan');
        return redirect('/sa/role');
    }

    /*
    |--------------------------------------------------------------------------
    | Function User [CRUD]
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        $data = User::all();
        return view('superadmin.user.user',compact('data'));
    }

    public function addUser()
    {
        $role   = Role::all();
        $puskes = Mpuskesmas::all();
        return view('superadmin.user.add_user',compact('role','puskes'));
    }

    public function simpanUser(Request $req)
    {
        $checkUsername = User::where('username', $req->username)->first();
        $checkEmail    = User::where('email', $req->email)->first();
        if($checkUsername != null){
            Alert::info('Username sudah ada, silahkan gunakan username yang lain','Pesan');
            return back();
        }elseif($checkEmail != null){
            Alert::info('Email sudah ada, silahkan gunakan Email yang lain','Pesan');
            return back();
        }else{
            if($req->role_id == 1){
                $roleSuperAdmin = Role::where('name','superadmin')->first();
                $d = new User;
                $d->name     = $req->nama;
                $d->username = $req->username;
                $d->email    = $req->email;
                $d->password = bcrypt($req->password);
                $d->save();
                $d->roles()->attach($roleSuperAdmin);
            }else{
                $roleAdminPuskes = Role::where('id', $req->role_id)->first();
                $dc = new User;
                $dc->name     = $req->nama;
                $dc->username = $req->username;
                $dc->email    = $req->email;
                $dc->password = bcrypt($req->password);
                $dc->save();
                $puskes = Mpuskesmas::find($req->puskes_id)->first();
                $dc->roles()->attach($roleAdminPuskes);
                $dc->puskes()->attach($puskes);
            }
            Alert::success('User Berhasil Di Simpan','Pesan');
            return redirect('/sa/user');
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id)->delete();
        Alert::success('User Berhasil Di Hapus','Pesan');
        return back();
    }

    public function editUser($id)
    {
        $data = User::find($id);
        $role = Role::all();
        $puskes = Mpuskesmas::all();
        return view('superadmin.user.edit_user',compact('data','role','puskes'));
    } 

    public function updateUser(Request $req, $id)
    {
        $u = Role::find($id);
        $u->name = $req->nama;
        $u->display_name = $req->nama;
        $u->description = $req->deskripsi;
        $u->save();
        Alert::success('Berhasil Di Update','Pesan');
        return redirect('/sa/user');
    }
    
    /*
    |--------------------------------------------------------------------------
    | Function Puskes [CRUD]
    |--------------------------------------------------------------------------
    */

    public function puskes()
    {
        $data = Mpuskesmas::all();
        return view('superadmin.puskes.puskes',compact('data'));
    }

    public function addPuskes()
    {
        return view('superadmin.puskes.add_puskes');
    }

    public function simpanPuskes(Request $req)
    {
        $n = new Mpuskesmas;
        $n->nama      = $req->nama;
        $n->alamat    = $req->alamat;
        $n->telp      = $req->telp;
        $n->kecamatan = $req->kecamatan;
        $n->kelurahan = $req->kelurahan;
        $n->save();
        Alert::success('Puskesmas Berhasil Di Simpan','Pesan');
        return redirect('/sa/puskes');
    }

    public function deletePuskes($id)
    {
        $puskes = Mpuskesmas::find($id)->delete();
        Alert::success('Puskesmas Berhasil Di Hapus','Pesan');
        return back();
    }

    public function editPuskes($id)
    {
        $data = Mpuskesmas::find($id);
        return view('superadmin.puskes.edit_puskes',compact('data'));
    }

    public function updatePuskes(Request $req, $id)
    {
        $n = Mpuskesmas::find($id);
        $n->nama      = $req->nama;
        $n->alamat    = $req->alamat;
        $n->telp      = $req->telp;
        $n->kecamatan = $req->kecamatan;
        $n->kelurahan = $req->kelurahan;
        $n->save();
        Alert::success('Puskemas Berhasil Di Update','Pesan');
        return redirect('/sa/puskes');
    }

    /*
    |--------------------------------------------------------------------------
    | Function Menu [CRUD]
    |--------------------------------------------------------------------------
    */

    public function menu()
    {
        $data = Menu::where('menu_id',null)->get();
        return view('superadmin.menu.menu',compact('data'));
    }

    public function simpanMenu(Request $req)
    {
        $n = new Menu;
        $n->nama = $req->nama;
        $n->url = $req->url;
        $n->icon = $req->icon;
        $n->save();
        Alert::success('Menu Utama Berhasil Di Tambahkan','Pesan');
        return back();
    }
    
    public function simpanSubmenu(Request $req)
    {
        $n = new Menu;
        $n->nama = $req->nama;
        $n->url = $req->url;
        $n->menu_id = $req->menu_id;
        $n->save();
        Alert::success('Sub Menu Berhasil Di Tambahkan','Pesan');
        return back();
    }

    public function deleteMenu($id)
    {
        $checkMenu = Menu::find($id)->submenu;
        if(count($checkMenu) == 0){
            Menu::find($id)->delete();
            Alert::success('Menu Berhasil Di Hapus', 'Pesan');
        }else{
            Alert::info('Tidak Bisa Di Hapus, Karena Ada Sub Menu', 'Pesan');
        }
        return back();
    }
    
    /*
    |--------------------------------------------------------------------------
    | Function Profile [RU]
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        return view('superadmin.profile');
    }

    public function gantiPass(Request $req)
    {
        $u = User::find(Auth::user()->id);
        $u->password = bcrypt($req->password);
        $u->save();
        Alert::success('Password Berhasil Di Perbaharui','Pesan');
        return back();
    }
    
    public function gantiFoto(Request $req)
    {
        if($req->hasfile('file'))
            {
                $filename = $req->file->getClientOriginalName();
                $filename = rand(1,9999).$filename;
                $req->file->storeAs('/public/profile/',$filename);
                $u = User::find(Auth::user()->id);
                $u->foto = $filename;
                $u->save();
                Alert::success('Foto Berhasil Di Update', 'Pesan');
            }else{
                Alert::info('Tidak Ada Perubahan', 'Pesan');
            }
        return back();
    }

    /*
    |--------------------------------------------------------------------------
    | Function Kecamatan [CRUD]
    |--------------------------------------------------------------------------
    */

    public function kecamatan()
    {
        $data = Mkecamatan::all();
        return view('superadmin.kecamatan.kecamatan',compact('data'));
    }

    /*
    |--------------------------------------------------------------------------
    | Function Kelurahan [CRUD]
    |--------------------------------------------------------------------------
    */
    
    public function kelurahan()
    {
        $data = Mkelurahan::all();
        return view('superadmin.kelurahan.kelurahan',compact('data'));
    }
}
