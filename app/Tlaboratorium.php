<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tlaboratorium extends Model
{
    protected $table = 't_laboratorium';

    public function t_lab_detail()
    {
        return $this->hasMany(Tlaboratoriumdetail::class, 'pemeriksaan_id');
    }
}
