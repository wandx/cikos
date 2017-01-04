<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicFacility extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function kost(){
        return $this->belongsTo(Kost::class);
    }
}
