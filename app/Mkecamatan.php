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

    public function kota()
    {
        return $this->belongsTo(Mkota::class, 'kota_id');
    }
}
