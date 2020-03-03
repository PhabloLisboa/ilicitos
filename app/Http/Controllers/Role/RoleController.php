<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public static function getAllUsesByRole(){
        $roles =  Role::all();
        $allByrole = [];

        foreach($roles as $role){
            $allByrole[$role->description] = Person::where('role_id', $role->id)->get();
        }

        return $allByrole;
    }
}
