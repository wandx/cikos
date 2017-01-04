<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function cities(){
        return $this->hasMany(City::class);
    }
}
