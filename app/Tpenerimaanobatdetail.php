<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpenerimaanobatdetail extends Model
{
    protected $table = 't_penerimaan_obat_detail';

    public function m_obat()
    {
        return $this->belongsTo(Mobat::class, 'obat_id');
    }
}
