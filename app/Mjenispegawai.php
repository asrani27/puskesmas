<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mjenispegawai extends Model
{
    protected $table = 'm_jenispegawai';

    public $incrementing = false;
    
    public function pegawai()
    {
        return$this->hasMany(Mpegawai::class, 'jenispegawai_id');
    }
}
