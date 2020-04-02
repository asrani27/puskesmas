<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ttindakan extends Model
{
    protected $table = 't_tindakan';

    public function pelayanan()
    {
        return $this->belongsTo(Tpelayanan::class, 'pelayanan_id');
    }
    
    public function mtindakan()
    {
        return $this->belongsTo(Mtindakan::class, 'tindakan_id');
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
