<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function districts(){
        return $this->hasMany(District::class);
    }
}
