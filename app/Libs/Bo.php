<?php
    namespace App\Libs;

    use App\Models\City;
    use App\Models\District;
    use App\Models\Menu;
    use App\Models\Province;
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

        public static function getProvince($selected_province=null){
            $province = Province::all();

            $li = '<option value="">Select Province</option>';
            foreach($province as $p){
                if($selected_province != null){
                    if($p->id == $selected_province){
                        $li .= '<option selected value="'.$p->id.'">'.$p->name.'</option>';
                    }else{
                        $li .= '<option value="'.$p->id.'">'.$p->name.'</option>';
                    }
                }else{
                    $li .= '<option value="'.$p->id.'">'.$p->name.'</option>';
                }
            }
            return $li;
        }

        public static function getCity($province_id,$selected_city=null){
            $city = City::where('province_id',$province_id)->get();

            $li = '<option value="">Select City</option>';
            foreach ($city as $c){
                if($selected_city != null){
                    if($c->id == $selected_city){
                        $li .= '<option selected value="'.$c->id.'">'.$c->name.'</option>';
                    }else{
                        $li .= '<option value="'.$c->id.'">'.$c->name.'</option>';
                    }
                }else{
                    $li .= '<option value="'.$c->id.'">'.$c->name.'</option>';
                }
            }
            return $li;
        }

        public static function getDistrict($city_id,$selected_district=null){
            $district = District::where('city_id',$city_id)->get();
            $li = '<option value="">Select District</option>';

            foreach ($district as $d){
                if($selected_district != null){
                    if($d->id == $selected_district){
                        $li .= '<option selected value="'.$d->id.'">'.$d->name.'</option>';
                    }else{
                        $li .= '<option value="'.$d->id.'">'.$d->name.'</option>';
                    }
                }else{
                    $li .= '<option value="'.$d->id.'">'.$d->name.'</option>';
                }
            }
            return $li;

        }
    }