<?php

use Illuminate\Database\Seeder;

class MenuSubmenuSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();
        DB::table('menus')->insert([
            [
                'id' => 1,
                'name' => 'dashboard',
                'display_name' => 'Dashboard',
                'icon' => 'fa fa-dashboard'
            ],
            [
                'id' => 2,
                'name' => 'usermanager',
                'display_name' => 'User manager',
                'icon' => 'fa fa-users'
            ],
            [
                'id' =>3,
                'name' => 'clientmanager',
                'display_name' => 'Client manager',
                'icon' => 'fa fa-user'
            ],
            [
                'id' => 4,
                'name' => 'tokenmanager',
                'display_name' => 'Tokens',
                'icon' => 'fa fa-lock'
            ],
            [
                'id' => 5,
                'name' => 'kosts',
                'display_name' => 'Kosts',
                'icon' => 'fa fa-building'
            ]
        ]);
        DB::table('sub_menus')->truncate();
        DB::table('sub_menus')->insert([
            // UserManager
            [
                'id' => 1,
                'name' => 'add',
                'display_name' => 'Add',
                'icon' => 'fa fa-plus',
                'menu_id' => 2
            ],
            [
                'id' =>2,
                'name' => 'lists',
                'display_name' => 'User lists',
                'icon' => 'fa fa-user',
                'menu_id' => 2
            ],
            [
                'id' => 3,
                'name' => 'roles',
                'display_name' => 'Roles',
                'icon' => 'fa fa-lock',
                'menu_id' => 2
            ],
            [
                'id' => 4,
                'name' => 'menu',
                'display_name' => 'Menus',
                'icon' => 'fa fa-bars',
                'menu_id' => 2
            ],

            // ClientManager
            [
                'id'=>5,
                'name' => 'add',
                'display_name' => 'Add',
                'icon' => 'fa fa-plus',
                'menu_id' => 3
            ],
            [
                'id'=>6,
                'name' => 'lists',
                'display_name' => 'Lists',
                'icon' => 'fa fa-user',
                'menu_id' => 3
            ],
            [
                'id'=>7,
                'name' => 'suspended',
                'display_name' => 'Suspended',
                'icon' => 'fa fa-warning',
                'menu_id' => 3
            ],
            [
                'id' => 8,
                'name' => 'add',
                'display_name' => 'Add',
                'icon' => 'fa fa-plus',
                'menu_id' => 5
            ],
            [
                'id' =>9,
                'name' => 'lists',
                'display_name' => 'User lists',
                'icon' => 'fa fa-user',
                'menu_id' => 5
            ]


        ]);
    }
}
