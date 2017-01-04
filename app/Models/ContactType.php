<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function contact(){
        return $this->belongsTo(Contact::class);
    }
}
