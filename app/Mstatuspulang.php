<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstatuspulang extends Model
{
    protected $table = 'm_statuspulang';
    public $incrementing = false;

    public function pelayanan()
    {
        return $this->hasMany(Tpelayanan::class, 'statuspulang_id');
    }
}
