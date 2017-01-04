<?php

namespace App\Http\Controllers\Backoffice;

use App\Libs\Bo;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class DashboardCont extends Controller
{
    public function index(){
        //return dd(session());
        return view('back.dashboard.index');
    }

    public function role_select(){
        if(session('role_selected')){
            return redirect()->route('bo.dashboard');
        }
        $data = [
            'roles' => Role::whereHas('admin',function($q){
                $q->where('id',auth('admin')->user()->id);
            })->pluck('display_name','id')->toArray()
        ];
        //return dd(session());

        return view('back.role_select',$data);
    }

    public function role_select_post(Request $req){
        session(['role_selected' => true,'role_id' => $req->role_select]);
        return redirect()->route('bo.dashboard');
    }

    public function jal(){
        $x = Admin::where('id',1)->with('role.menu.sub_menu.sub_sub_menu')->first()->toArray();
        return dd($x);
    }

    public function edit(){
        $admin_id = auth('admin')->user()->id;
        $x = Admin::where('id',$admin_id)->with('role.access')->first();
        $data = [
            'admin' => $x,
            'all_roles'=> Role::pluck('display_name','id')->toArray(),
        ];
//        return dd(Bo::hasUserAccess());
        return view('back.dashboard.edit',$data);
    }

    public function update(Request $req){
        $id = auth('admin')->user()->id;
        //return dd(($req->avatar == null) ? 'kosong':'isi');
        $admin = [
            'name' => $req->name,
        ];

        if($req->avatar !== null){
            if(file_exists($req->old_img) && !is_dir($req->old_img)){
                unlink($req->old_img);
            }
            $name = rand(0,99999).'.jpg';
            Image::make($req->avatar)->fit(200,200)->save('uploads/avatar/'.$name);
            $admin['avatar'] = 'uploads/avatar/'.$name;
        }

        Admin::where('id',$id)->update($admin);
        if(Bo::hasUserAccess()){
            // remove all admins role
            DB::table('admin_role')->where('admin_id',$id)->delete();

            if($req->roles != null){
                foreach($req->roles as $r){
                    DB::table('admin_role')->insert([
                        'admin_id' => $id,
                        'role_id' => $r
                    ]);
                }
            }
        }


        return redirect()->back();
    }
}
