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
}
