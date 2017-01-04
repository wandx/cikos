<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubSubMenu extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function sub_menu(){
        return $this->belongsTo(SubMenu::class);
    }
}
