<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptions = ['Administrador', 'Ator', 'Músico', 'Equipe de Palco'];

        foreach($descriptions as $d){
            $faker = new Role();
            $faker->description = $d;
            $faker->save();
        }

    }
}
