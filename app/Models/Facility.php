<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function kosts(){
        return $this->belongsToMany(Kost::class);
    }
}
