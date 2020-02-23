<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magama extends Model
{
    protected $table = 'm_agama';

    public function pasien()
    {
        return $this->hasMany(Mpasien::class, 'agama_id');
    }
}
