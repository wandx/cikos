<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function contact_type(){
        return $this->hasOne(ContactType::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }
}
