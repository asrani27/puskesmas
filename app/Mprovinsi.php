<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mprovinsi extends Model
{
    protected $table = 'm_propinsi';

    public function kota()
    {
        return $this->hasMany(Mkota::class, 'propinsi_id');
    }
}
