<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Person extends Model
{
    protected $table = 'persons';
    protected $fillable = ['name', 'description', 'born', 'role_id'];

    public function user(){
        return $this->hasOne(User::class, 'person_id');
    }

    static function create($request) {
        $person = new Person();
        $person->name = $request->name;
        $person->description = $request->description;
        $person->born = $request->born;
        $person->role_id = $request->role_id;
        $person->hash = Str::random(32);

        $person->save();

        return $person;
    }

    static function getPersonByHash($hash){
        return Person::where('hash', $hash)->first();
    }
}
