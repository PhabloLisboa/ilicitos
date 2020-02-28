<?php

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptions = ['ativo', 'inativo'];

        foreach($descriptions as $d){
            $faker = new UserStatus();
            $faker->description = $d;
            $faker->save();
        }
    }
}
