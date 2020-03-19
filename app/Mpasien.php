<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpasien extends Model
{
    protected $table = "m_pasien";

    public $incrementing = false;
    // public function puskes()
    // {
    //     return $this->belongsToMany(Mpuskesmas::class, 'pasien_puskes', 'pasien_id', 'puskes_id');
    // }

    public function kelurahan()
    {
        return $this->belongsTo(Mkelurahan::class, 'kelurahan_id');
    }

    public function asuransi()
    {
        return $this->belongsTo(Masuransi::class, 'asuransi_id');
    }
    
    public function goldarah()
    {
        return $this->belongsTo(Mgoldarah::class, 'goldarah_id');
    }

    public function statuskawin()
    {
        return $this->belongsTo(Mstatuskawin::class, 'status_kawin_id');
    }

    public function statuskeluarga()
    {
        return $this->belongsTo(Mstatuskeluarga::class, 'status_keluarga_id');
    }

    public function agama()
    {
        return $this->belongsTo(Magama::class, 'agama_id');
    }
    
    public function pekerjaan()
    {
        return $this->belongsTo(Mpekerjaan::class, 'pekerjaan_id');
    }

    public function pendidikan()
    {
        return $this->belongsTo(Mpendidikan::class, 'pendidikan_id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Tpendaftaran::class, 'pasien_id');
    }
    
}
