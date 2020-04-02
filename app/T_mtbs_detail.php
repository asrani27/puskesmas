<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_mtbs_detail extends Model
{
    protected $table = "t_mtbs_detail";

    public function mtbs()
    {
        return $this->belongsTo(Tmtbs::class, 'mtbs_id');
    }
}
