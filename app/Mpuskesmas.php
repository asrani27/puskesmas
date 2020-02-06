<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpuskesmas extends Model
{
    protected $table = 'm_puskesmas';

    public function user()
    {
        return $this->belongsToMany(User::class, 'puskes_user', 'puskes_id', 'users_id');
    }
}
