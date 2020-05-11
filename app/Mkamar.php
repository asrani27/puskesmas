<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mkamar extends Model
{
    protected $table = 'm_kamar';

    public function ruangan()
    {
        return $this->belongsTo(Mruangan::class, 'ruangan_id');
    }
}
