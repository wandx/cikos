<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Admin;
use App\Models\Menu;
use App\Models\Role;
use App\Models\SubMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class UserCont extends Controller
{
    public function lists(){
        $data = [
            'admins' => Admin::with('role')->where('id','!=',auth('admin')->user()->id)->get(),
            'role_list' => '',
        ];
        //return dd($data);
        return view('back.user.lists',$data);
    }

    public function roles(){
        $data = [
            'roles' => Role::with('menu')->get(),
            'menu_list' => '',
            'all_menus' => Menu::pluck('display_name','id')
        ];

        return view('back.user.roles',$data);
    }

    public function getRoleByUser($admin_id){
        $x = Role::whereHas('admin',function($q) use ($admin_id){
            $q->where('id',$admin_id);
        })->pluck('id')->toArray();
        $data = [
            'all_roles'=> Role::pluck('display_name','id')->toArray(),
            'selected' => $x
        ];
        //return dd($data);
        return view('back.user.role_option',$data);
    }

    public function edit($admin_id){
        $x = Admin::where('id',$admin_id)->with('role.access')->first();
        $data = [
            'admin' => $x,
            'all_roles'=> Role::pluck('display_name','id')->toArray(),
        ];
        return view('back.user.edit',$data);
    }

    public function edit_role($id){
        $x = Role::where('id',$id)->with('menu')->first();
        $data = [
            'role' => $x,
            'all_menus'=> Menu::pluck('display_name','id')->toArray()
        ];

        return view('back.user.edit_role',$data);
    }

    public function update(Request $req,$id){
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

        return redirect()->back();
    }

    public function update_role(Request $req,$id){
        $role = [
            'name' => $req->name,
            'display_name' => $req->display_name,
        ];

        $in = Role::where('id',$id)->update($role);
        // Remove all admin menu
        DB::table('menu_role')->where('role_id',$id)->delete();
        foreach ($req->menus as $menu_id){
            $data = [
                'role_id' => $id,
                'menu_id' => $menu_id
            ];
            DB::table('menu_role')->insert($data);
        }

        return redirect()->back();
    }

    public function add(){
        $data = [
            'all_roles'=> Role::pluck('display_name','id')->toArray(),
        ];
        return view('back.user.add',$data);
    }

    public function do_add(Request $req){
        $admin = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'avatar' =>''
        ];

        if($req->avatar !== null){
            $name = rand(0,99999).'.jpg';
            Image::make($req->avatar)->fit(200,200)->save('uploads/avatar/'.$name);
            $admin['avatar'] = 'uploads/avatar/'.$name;
        }

        $in = Admin::create($admin);

        if($req->roles != null){
            foreach($req->roles as $r){
                DB::table('admin_role')->insert([
                    'admin_id' => $in->id,
                    'role_id' => $r
                ]);
            }
        }
        return redirect()->route('bo.user.lists');
    }

    public function delete($id){
        $admin_im = Admin::where('id',$id)->first()->avatar;
        if(file_exists($admin_im) && !is_dir($admin_im)){
            unlink($admin_im);
        }
        $x = Admin::where('id',$id)->delete();
    }

    public function add_role(Request $req){
        $role = [
            'name' => $req->name,
            'display_name' => $req->display_name,
        ];

        $in = Role::create($role);
//        $in->menu()->attach(1);

        foreach ($req->menus as $menu_id){
            $data = [
                'role_id' => $in->id,
                'menu_id' => $menu_id
            ];
            DB::table('menu_role')->insert($data);
        }

        return redirect()->route('bo.user.roles');
    }

    public function delete_role($role_id){
        Role::where('id',$role_id)->delete();
    }

    public function menumanager(){
        $data = [
            'menus' => Menu::all()
        ];

        return view('back.user.menu',$data);
    }

    public function getSubMenu($menu_id){
        $q = SubMenu::where('menu_id',$menu_id)->get();
        $row = "";
        foreach ($q as $sm){
            $row .= '<div class="well text-center sub-menu-row" data-id="'.$sm->id.'" style="cursor:pointer;"><i class="'.$sm->icon.'"></i> '.$sm->name.'</div>';
        }
        return $row;
    }

    public function addmenu(Request $req){
        return $req->all();
    }

    public function addsubmenu(Request $req,$menuid){
        return $req->all();
    }
}
