<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstokobat extends Model
{
    protected $table = 'm_stok_obat';

    public function mobat()
    {
        return $this->belongsTo(Mobat::class, 'obat_id');
    }

    public function m_ruangan()
    {
        return $this->belongsTo(Mruangan::class, 'ruangan_id');
    }
}
