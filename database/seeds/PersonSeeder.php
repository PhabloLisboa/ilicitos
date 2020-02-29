<?php

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Person();
        $faker->name = "Admin";
        $faker->description = 'aloaloaloal';
        $faker->born = '2000-02-26 21:16:29';
        $faker->role_id = 1;
        $faker->hash = bcrypt(time());
        $faker->save();
    }
}
