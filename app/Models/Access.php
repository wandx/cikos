<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function role(){
        return $this->belongsToMany(Role::class);
    }
}
