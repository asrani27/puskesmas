<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = "superadmin";
        $adminRole->display_name = "SuperAdmin";
        $adminRole->description = "Merupakan Role yang memiliki hak akses penuh terhadap aplikasi, untuk Dinas Kesehatan";
        $adminRole->save();
        
        $puskesRole = new Role();
        $puskesRole->name = "adminpuskes";
        $puskesRole->display_name = "adminpuskes";
        $puskesRole->description = "Role untuk admin puskesmas, yang memiliki hak akses tertentu";
        $puskesRole->save();
    }
}
