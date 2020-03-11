<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanamnesa extends Model
{
    protected $table = 't_anamnesa';

    public function pelayanan()
    {
        return $this->belongsTo(Tpelayanan::class, 'pelayanan_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Mpegawai::class, 'dokter_id');
    }

    public function perawat()
    {
        return $this->belongsTo(Mpegawai::class, 'perawat_id');
    }

    public function rps()
    {
        return $this->hasMany(Mriwayat::class, 'anamnesa_id');
    }
    
    public function rpd()
    {
        return $this->hasMany(Mriwayat::class, 'anamnesa_id');
    }
    
    public function rpk()
    {
        return $this->hasMany(Mriwayat::class, 'anamnesa_id');
    }

    public function obat()
    {
        return $this->hasMany(Malergi::class, 'anamnesa_id');
    }
    
    public function makanan()
    {
        return $this->hasMany(Malergi::class, 'anamnesa_id');
    }
    
    public function umum()
    {
        return $this->hasMany(Malergi::class, 'anamnesa_id');
    }
}
