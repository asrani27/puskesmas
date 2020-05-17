<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todontogram extends Model
{
    protected $table = 't_odontogram';

    public function pelayanan()
    {
        return $this->belongsTo(Tpelayanan::class, 'pelayanan_id');
    }

    public function odontogramdetail()
    {
        return $this->hasMany(Todontogram_detail::class, 'odontogram_id');
    }
}
