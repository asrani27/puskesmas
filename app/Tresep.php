<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tresep extends Model
{
    protected $table = 't_resep';

    public function resepdetail()
    {
        return $this->hasMany(Tresepdetail::class, 'resep_id');
    }

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
}
