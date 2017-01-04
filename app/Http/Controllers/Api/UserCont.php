<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCont extends Controller
{
    public function fetch_user($data=10){
        $x = User::paginate($data);
        return response()->json($x);
    }
}
