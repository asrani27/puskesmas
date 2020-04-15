<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_imunisasi_detail extends Model
{
    protected $table = 't_imunisasi_detail';
    
    public function imunisasi()
    {
        return $this->belongsTo(Timunisasi::class, 'imunisasi_id');
    }
}
