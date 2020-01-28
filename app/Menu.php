<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{ 
    protected $table = 'menu';

    public function topmenu()
    {
        return $this->belongSto(Menu::class, 'menu_id');
    }
    
    public function submenu()
    {
        return $this->hasMany(Menu::class, 'menu_id');
    }
}
