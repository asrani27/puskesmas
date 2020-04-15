<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timunisasi extends Model
{
    protected $table = 't_imunisasi';
    
    public function pelayanan()
    {
        return $this->belongsTo(Tpelayanan::class, 'pelayanan_id');
    }

    public function imunisasidetail()
    {
        return $this->hasMany(T_imunisasi_detail::class, 'imunisasi_id');
    }
}
