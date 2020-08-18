<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mruangan extends Model
{
    protected $table = 'm_ruangan';

    protected $fillable = ['is_aktif'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $incrementing = false;

    public function instalasi()
    {
        return $this->belongsTo(Minstalasi::class, 'instalasi_id');
    }

    public function pelayanan()
    {
        return $this->hasMany(Tpelayanan::class, 'ruangan_id');
    }

    public function kamar()
    {
        return $this->hasMany(Mkamar::class, 'ruangan_id');
    }
}
