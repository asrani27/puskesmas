<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mlab extends Model
{
    protected $table = "m_laboratorium";
    
    public $incrementing = false;
    
    public function jenislab()
    {
        return $this->belongsTo(Mjenislab::class, 'jenis_laboratorium_id');
    }
}
