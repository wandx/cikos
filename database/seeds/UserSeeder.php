<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = \Faker\Factory::create();
        DB::table('users')->truncate();

        // Admin
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('wandx54'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'api_token' => 'wandx545'
        ]);

        for($i=0;$i<100;$i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name' => $x->name,
                'email' => $x->email,
                'password' => bcrypt('wandx54'),
                'created_at' => $x->dateTime,
                'updated_at' => $x->dateTime,
                'api_token' => str_random(60)
            ]);
        }
    }
}
