<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            [
                'id'=>1,
                'name' => 'superuser',
                'display_name' => 'Super User'
            ],
            [
                'id'=>2,
                'name' => 'admin',
                'display_name' => 'Admin'
            ]
        ]);
    }
}
