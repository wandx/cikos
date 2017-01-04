<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function role(){
        return $this->belongsToMany(Role::class);
    }

    public function sub_menu(){
        return $this->hasMany(SubMenu::class);
    }
}
