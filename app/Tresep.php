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
}
