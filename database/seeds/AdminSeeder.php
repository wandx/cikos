<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            [
                'id' => 1,
                'name'=>'wandy purnomo',
                'email' => 'wandypurnomo92@gmail.com',
                'password' => bcrypt('wandx54'),
                'avatar' => ''
            ],
            [
                'id' => 2,
                'name'=>'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'avatar' => ''
            ]
        ]);
    }
}
