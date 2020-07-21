<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpegawai extends Model
{
    protected $table = 'm_pegawai';

    public $incrementing = false;
    
    public function jenispegawai()
    {
        return $this->belongsTo(Mjenispegawai::class, 'jenispegawai_id');
    }

    public function puskesmas()
    {
        return $this->belongsTo(Mpuskesmas::class, 'puskesmas_id');
    }
    
    public function periksabydokter()
    {
        return $this->hasMany(Tperiksafisik::class, 'dokter_id');
    }
    
    public function periksabyperawat()
    {
        return $this->hasMany(Tperiksafisik::class, 'perawat_id');
    }

    public function periksatm1()
    {
        return $this->hasMany(Tperiksafisik::class, 'dokter_id');
    }
    
    public function periksatm2()
    {
        return $this->hasMany(Tperiksafisik::class, 'perawat_id');
    }

}
