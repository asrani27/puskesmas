<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::where('name','superadmin')->first();

        $d = new User;
        $d->name = 'superadmin';
        $d->username = 'superadmin';
        $d->email = 'superadmin@gmail.com';
        $d->password = bcrypt('admin');
        $d->save();
        $d->roles()->attach($roleSuperAdmin);
    }
}
