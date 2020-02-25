<?php

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['E-mail', 'Telefone', 'Outro', ];

        foreach($types as $t){
            $faker = new ContactType();
            $faker->description = $t;
            $faker->save();
        }
    }
}
