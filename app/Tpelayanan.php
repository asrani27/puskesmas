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
        return $this->hasOne(Tperiksafisik::class, 'pelayanan_id');
    }

    public function diagnosa()
    {
        return $this->hasMany(Tdiagnosa::class, 'pelayanan_id');
    }

    public function resep()
    {
        return $this->hasOne(Tresep::class, 'pelayanan_id');
    }

    public function tindakan()
    {
        return $this->hasMany(Ttindakan::class, 'pelayanan_id');
    }

    public function mtbs()
    {
        return $this->hasOne(Tmtbs::class, 'pelayanan_id');
    }

    public function lab()
    {
        return $this->hasOne(Tlaboratorium::class, 'pelayanan_id');
    }
}
