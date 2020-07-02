<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tkeranjang extends Model
{
    protected $table = 't_keranjang_obat';

    public function m_obat()
    {
        return $this->belongsTo(Mobat::class, 'obat_id');
    }
}
