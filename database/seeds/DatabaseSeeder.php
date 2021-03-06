<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContactTypesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(SysRolesSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(AboutSeeder::class);
    }
}
