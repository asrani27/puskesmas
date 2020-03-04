<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpendaftaran extends Model
{
    protected $table = 't_pendaftaran';
    
    public function pasien()
    {
        return $this->belongsTo(Mpasien::class, 'pasien_id');
    }

    public function asuransi()
    {
        return $this->belongsTo(Masuransi::class, 'asuransi_id');
    }

    public function pelayanan()
    {
        return $this->hasOne(Tpelayanan::class, 'pendaftaran_id');
    }

    public function puskesmas()
    {
        return $this->belongsTo(Mpuskesmas::class, 'puskesmas_id');
    }
    
}
