<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    protected $guarded = ['id'];

    public function facilities(){
        return $this->belongsToMany(Facility::class);
    }

    public function public_facilities(){
        return $this->hasMany(PublicFacility::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function rents(){
        return $this->hasMany(Rent::class);
    }

    public function pictures(){
        return $this->morphMany(Media::class,'mediable');
    }
}
