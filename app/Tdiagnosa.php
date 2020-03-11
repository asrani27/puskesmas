<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tdiagnosa extends Model
{
    protected $table = 't_diagnosa';

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

    public function mdiagnosa()
    {
        return $this->belongsTo(Mdiagnosa::class, 'diagnosa_id');
    }
}
