<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function sub_sub_menu(){
        return $this->hasMany(SubSubMenu::class);
    }
}
