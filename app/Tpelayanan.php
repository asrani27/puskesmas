<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpelayanan extends Model
{
    protected $table = 't_pelayanan';
    
    public function pendaftaran()
    {
        return $this->belongsTo(Tpendaftaran::class, 'pendaftaran_id');
    }

    public function statuspulang()
    {
        return $this->belongsTo(Mstatuspulang::class, 'statuspulang_id');
    }
}
