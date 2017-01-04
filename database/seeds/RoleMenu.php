<?php

use Illuminate\Database\Seeder;

class RoleMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_role')->truncate();
        DB::table('menu_role')->insert([
            [
                'menu_id' => 1,
                'role_id' => 1
            ],
            [
                'menu_id' => 2,
                'role_id' => 1
            ],
            [
                'menu_id' => 1,
                'role_id' => 2
            ],
        ]);
    }
}
