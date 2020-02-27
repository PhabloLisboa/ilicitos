<?php

use App\Models\User;
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

        $faker = new User();
        $faker->email = "admin@email.com";
        $faker->password = bcrypt("123456");
        $faker->person_id = 1;
        $faker->sys_role_id = 1;
        $faker->save();
    }
}
