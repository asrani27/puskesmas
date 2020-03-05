<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpegawai extends Model
{
    protected $table = 'm_pegawai';

    public function jenispegawai()
    {
        return $this->belongsTo(Mjenispegawai::class, 'jenispegawai_id');
    }

    public function puskesmas()
    {
        return $this->belongsTo(Mpuskesmas::class, 'puskesmas_id');
    }
}
