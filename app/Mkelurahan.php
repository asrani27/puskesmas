<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mkelurahan extends Model
{
    protected $table = 'm_kelurahan';
    
    public function kecamatan()
    {
        return $this->belongsTo(Mkecamatan::class, 'kecamatan_id');
    }

    public function pasien()
    {
        return $this->hasMany(Mpasien::class, 'kelurahan_id');
    }
}
