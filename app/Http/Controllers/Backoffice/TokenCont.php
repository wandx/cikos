<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\AccessToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenCont extends Controller
{
    public function index(){
        $data = [
            'tokens' => AccessToken::paginate(10)
        ];

        return view('back.token.index',$data);
    }

    public function generate(){
        $data = [
            'token' => str_random(60),
            'request_count' => 0,
            'request_limit' => 0
        ];
        AccessToken::create($data);
        return redirect()->back();
    }

    public function refresh($id){
        $data = [
            'token' => str_random(60)
        ];

        AccessToken::where('id',$id)->update($data);
        return redirect()->back();
    }

    public function delete($id){
        AccessToken::where('id',$id)->delete();
    }

    public function suspend($id){
        AccessToken::where('id',$id)->update(['status'=>'suspend']);
    }

    public function restore($id){
        AccessToken::where('id',$id)->update(['status'=>'active']);
    }

    public function update_limit($id,$limit){
        AccessToken::where('id',$id)->update(['request_limit'=>$limit]);
        return 'ok';
    }
}
