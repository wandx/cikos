<?php
    namespace App\Libs;

    use App\Models\Menu;
    use App\Models\Role;
    use App\Models\SubMenu;
    use App\Models\Permission;

    class Bo{
        public static function role_name($id){
            $x = Role::where('id',$id)->first()->display_name;
            return $x;
        }

        public static function menu(){
            // Role
            $x = Role::where('id',session('role_id'))->with('menu.sub_menu.sub_sub_menu')->get();
            $data = [
                'roles' => $x
            ];
            return view('back.partial.menu',$data);
        }

        public static function hasSubMenu($menu_id){
            $x = SubMenu::where('menu_id',$menu_id)->count();
            if($x > 0){
                return true;
            }

            return false;
        }

        public static function hasUserAccess(){
            $role_id = session('role_id');
            $x = Menu::whereHas('role',function($q) use($role_id){
                $q->where('id',$role_id);
            })->where('name','usermanager')->count();

            if($x > 0){
                return true;
            }
            return false;
        }

        public static function alphanumeric_filter($str,$replace=""){
            $str = strtolower($str);
            $newstr = preg_replace('/[^a-zA-Z0-9\']/', $replace, $str);
            $newstr = str_replace("'", '', $newstr);
            return $newstr;
        }

        public static function can($perms){

            $number = preg_match('/[0-9\']/', $perms);
            $role_id = session('role_id');
            $count = 0;

            if($number){
                $count = Permission::whereHas('role',function($q) use($role_id){
                    return $q->where('id',$role_id);
                })->where('id',$perms)->count();
            }else{
                $count = Permission::whereHas('role',function($q) use($role_id){
                    return $q->where('id',$role_id);
                })->where('name',$perms)->count();
            }

            return ($count > 0) ? 1:0;
        }
    }