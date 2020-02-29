<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpuskesmas extends Model
{
    protected $table = 'm_puskesmas';

    public function user()
    {
        return $this->belongsToMany(User::class, 'puskes_user', 'puskes_id', 'users_id');
    }
    
    public function pasien()
    {
        return $this->belongsToMany(Mpasien::class, 'pasien_puskes', 'puskes_id', 'pasien_id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Tpendaftaran::class, 'puskesmas_id');
    }
}
