<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected $fillable = ['name', 'description', 'born', 'role_id'];

    static function create($request) {
        $person = new Person();
        $person->name = $request->name;
        $person->name = $request->name;
        $person->name = $request->name;
        $person->name = $request->name;
    }
}
