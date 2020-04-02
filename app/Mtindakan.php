<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtindakan extends Model
{
    protected $table = 'm_tindakan';

    public function ttindakan()
    {
        return $this->hasMany(Ttindakan::class, 'tindakan_id');
    }
}
