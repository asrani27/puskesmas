<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mkecamatan extends Model
{
    protected $table = 'm_kecamatan';

    public function kelurahan()
    {
        return $this->hasMany(Mkelurahan::class, 'kecamatan_id');
    }
}
