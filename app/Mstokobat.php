<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstokobat extends Model
{
    protected $table = 'm_stok_obat';

    protected $fillable = [
        'puskesmas_id', 'ruangan_id', 'obat_id', 'jumlah_stok', 'harga_jual'
    ];

    public function mobat()
    {
        return $this->belongsTo(Mobat::class, 'obat_id');
    }

    public function m_ruangan()
    {
        return $this->belongsTo(Mruangan::class, 'ruangan_id');
    }
}
