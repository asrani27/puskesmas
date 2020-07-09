<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobat extends Model
{
    protected $table = 'm_obat';

    public $incrementing = false;
    
    protected $primaryKey = 'id';

    public function resepdetail()
    {
        return $this->hasMany(Tresepdetail::class, 'obat_id');
    }

    public function m_obat_title()
    {
        return $this->belongsTo(Mobattitle::class, 'obat_title');
    }

    public function m_obat_unit()
    {
        return $this->belongsTo(Mobatunit::class, 'obat_unit');
    }
    
    public function m_stok_obat()
    {
        return $this->hasMany(Mstokobat::class, 'obat_id');
    }
}
