<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstatuskawin extends Model
{
    protected $table = 'm_status_kawin';

    public function pasien()
    {
        return $this->belongsTo(Mpasien::class, 'status_kawin_id');
    }
}
