<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginCont extends Controller
{
    public function index(){
        return view('back.login');
    }

    public function login(Request $req){
        if(!auth('admin')->attempt(['email'=>$req->email,'password'=>$req->password])){
            return redirect()->back()->withErrors(['failed'=>'Email/password tidak benar']);
        }
        return redirect()->route('bo.dashboard');
    }

    public function logout(){
        auth('admin')->logout();
        session()->flush();
        return redirect()->route('bo.login')->withErrors(['failed'=>'Logout berhasil']);
    }
}
