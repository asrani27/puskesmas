<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Role;

class SuperadminController extends Controller
{
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
}
