<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmtbs extends Model
{
    protected $table = 't_mtbs';

    public function pelayanan()
    {
        return $this->belongsTo(Tpelayanan::class, 'pelayanan_id');
    }
    
    public function mtbs()
    {
        return $this->hasMany(T_mtbs_detail::class, 'mtbs_id');
    }
}
