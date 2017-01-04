<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert([
            [
                'id'=>1,
                'name' => 'access_dashboard',
                'display_name' => 'Dashboard'
            ],
            [
                'id'=>2,
                'name' => 'access_user',
                'display_name' => 'User'
            ]
        ]);
    }
}
