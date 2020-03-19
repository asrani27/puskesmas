<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minstalasi extends Model
{
    protected $table = 'm_instalasi';

    public $incrementing = false;
    
    public function ruangan()
    {
        return $this->hasMany(Mruangan::class,'instalasi_id');
    }
}
