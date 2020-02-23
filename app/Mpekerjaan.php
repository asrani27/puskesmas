<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpekerjaan extends Model
{
    protected $table = 'm_pekerjaan';

    public function pasien()
    {
        return $this->hasMany(Mpasien::class, 'pekerjaan_id');
    }
}
