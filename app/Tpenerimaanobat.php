<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpenerimaanobat extends Model
{
    protected $table = 't_penerimaan_obat';

    public function m_ruangan()
    {
        return $this->belongsTo(Mruangan::class, 'ruangan_id');
    }
    
    public function petugas()
    {
        return $this->belongsTo(Mpegawai::class, 'petugas_id');
    }

    public function t_penerimaan_obat_detail()
    {
        return $this->hasMany(Tpenerimaanobatdetail::Class, 'penerimaan_id');
    }
}
