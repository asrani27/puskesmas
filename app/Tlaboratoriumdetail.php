<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tlaboratoriumdetail extends Model
{
    protected $table = 't_laboratorium_detail';

    public function t_lab()
    {
        return $this->belongsTo(Tlaboratorium::class, 'pemeriksaan_id');
    }
    
    public function m_lab()
    {
        return $this->belongsTo(Mlaboratorium::class, 'laboratorium_id');
    }
}
