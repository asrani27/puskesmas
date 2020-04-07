<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mlaboratorium extends Model
{
    protected $table = 'm_laboratorium';
    
    public $incrementing = false;
    
    public function t_lab_detail()
    {
        return $this->hasMany(Tlaboratoriumdetail::class, 'laboratorium_id');
    }
}
