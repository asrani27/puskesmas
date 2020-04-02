<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mgoldarah extends Model
{
    protected $table = 'm_lookup';

    public function goldarah()
    {
        return $this->where('for','gol_darah')->get();
    }
}
