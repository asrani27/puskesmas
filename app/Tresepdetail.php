<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tresepdetail extends Model
{
    protected $table = 't_resep_detail';

    public function resep()
    {
        return $this->belongsTo(Tresepdetail::class, 'resep_id');
    }
}
