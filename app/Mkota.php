<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mkota extends Model
{
    protected $table = 'm_kota';

    public function kecamatan()
    {
        return $this->hasMany(Mkecamatan::class, 'kota_id');
    }

    public function propinsi()
    {
        return $this->belongsTo(Mprovinsi::class, 'propinsi_id');
    }
}
