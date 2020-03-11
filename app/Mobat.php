<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobat extends Model
{
    protected $table = 'm_obat';

    public function resepdetail()
    {
        return $this->hasMany(Tresepdetail::class, 'obat_id');
    }
}
