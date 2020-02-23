<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpendidikan extends Model
{
    protected $table = 'm_pendidikan';

    public function pasien()
    {
        return $this->hasMany(Mpasien::class, 'pendidikan_id');
    }
}
