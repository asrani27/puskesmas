<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mgoldarah extends Model
{
    protected $table = 'm_goldarah';

    public function pasien()
    {
        return $this->hasMany(Mpasien::class, 'goldarah_id');
    }
}
