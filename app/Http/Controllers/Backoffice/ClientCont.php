<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientCont extends Controller
{
    public function add(){
        return view('back.client.add');
    }

    public function edit($id){

    }

    public function update(Request $req,$id){

    }

    public function lists(){
        $data = [
            'users' => User::where('suspended',0)->latest()->paginate(10)
        ];

        return view('back.client.lists',$data);
    }

    public function suspended(){
        $data = [
            'users' => User::where('suspended',1)->latest()->paginate(10)
        ];

        return view('back.client.suspend',$data);
    }

    public function doSuspend($id){
        User::where('id',$id)->update(['suspended'=>1]);
    }

    public function doRestore($id){
        User::where('id',$id)->update(['suspended'=>0]);
    }

    public function doDelete($id){
        User::where('id',$id)->delete();
    }

    public function doAdd(Request $req){
        $admin = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'api_token' => str_random(60)
        ];

//        if($req->avatar !== null){
//            $name = rand(0,99999).'.jpg';
//            Image::make($req->avatar)->fit(200,200)->save('uploads/avatar/'.$name);
//            $admin['avatar'] = 'uploads/avatar/'.$name;
//        }

        User::create($admin);
        return redirect()->route('bo.client.lists');
    }
}
