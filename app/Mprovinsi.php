<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mprovinsi extends Model
{
    protected $table = 'm_provinsi';

    public function kota()
    {
        return $this->hasMany(Mkota::class, 'provinsi_id');
    }
}
