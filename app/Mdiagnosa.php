<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mdiagnosa extends Model
{
    protected $table = 'm_diagnosa';
    
    public $incrementing = false;

    protected $fillable = [
        'id', 'value', 'induk_id'
    ];
}
