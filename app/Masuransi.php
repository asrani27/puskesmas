<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuransi extends Model
{
    protected $table = "m_asuransi";

    public function pasien()
    {
        return $this->hasMany(Mpasien::class, 'asuransi_id');
    }
    
    public function pendaftaran()
    {
        return $this->hasMany(Mpendaftaran::class, 'asuransi_id');
    }
}
