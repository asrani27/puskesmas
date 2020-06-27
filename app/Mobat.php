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

    public function obattitle()
    {
        $data = \App\Mobattitle::where('id', $this->obat_title)->first()->value;
        return $data;
    }
}
