<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");
        \Illuminate\Database\Eloquent\Model::unguard();
        $this->call(AdminSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(MenuSubmenuSeed::class);
        $this->call(AdminRole::class);
        $this->call(RoleMenu::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DistictsTableSeeder::class);
        $this->call(UserSeeder::class);
        \Illuminate\Database\Eloquent\Model::reguard();
        DB::statement("SET FOREIGN_KEY_CHECKS = 1");
    }
}
