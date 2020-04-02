<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mjenislab extends Model
{
    protected $table = "m_jenis_laboratorium";

    public function lab()
    {
        return $this->hasMany(Mlab::class, 'jenis_laboratorium_id');
    }
}
