<?php

use App\Models\SysRole;
use Illuminate\Database\Seeder;

class SysRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptions = ['Administrador', 'Redator', 'Usuário'];

        foreach($descriptions as $d){
            $faker = new SysRole();
            $faker->description = $d;
            $faker->save();
        }
    }
}
