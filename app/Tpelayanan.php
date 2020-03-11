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

    public function ruangan()
    {
        return $this->belongsTo(Mruangan::class, 'ruangan_id');
    }

    public function anamnesa()
    {
        return $this->hasOne(Tanamnesa::class, 'pelayanan_id');
    }

    public function periksafisik()
    {
        return $this->hasMany(Tperiksafisik::class, 'pelayanan_id');
    }
}
