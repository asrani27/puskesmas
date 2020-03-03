<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mruangan extends Model
{
    protected $table = 'm_ruangan';

    public function instalasi()
    {
        return $this->belongsTo(Minstalasi::class, 'instalasi_id');
    }

    public function pelayanan()
    {
        return $this->hasMany(Tpelayanan::class, 'ruangan_id');
    }
}
