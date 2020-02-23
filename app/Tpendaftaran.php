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
}
