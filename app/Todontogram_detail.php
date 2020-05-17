<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todontogram_detail extends Model
{
    protected $table = 't_odontogram_detail';
    
    public function odontogram()
    {
        return $this->belongsTo(Todontogram::class, 'odontogram_id');
    }
}
