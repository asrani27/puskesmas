<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstatuskeluarga extends Model
{
    protected $table = 'm_status_keluarga';

    public function pasien()
    {
        return $this->belongsTo(Mpasien::class, 'status_keluarga_id');
    }
}
