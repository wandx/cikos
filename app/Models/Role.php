<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function admin(){
        return $this->belongsToMany(Admin::class);
    }

    public function permission(){
        return $this->belongsToMany(Permission::class);
    }

    public function menu(){
        return $this->belongsToMany(Menu::class);
    }

    public function access(){
        return $this->belongsToMany(Access::class);
    }
}
