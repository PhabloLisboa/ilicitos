<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sys_role_id', 'avatar_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar(){
        return $this->belongsTo(Image::class, 'avatar_id');
    }

    public function person(){
        return $this->belongsTo(Person::class, 'person_id');
    }

    public static function verifyEmail($email){
        $user = User::where('email', $email)->get();
        return count($user) ? true : false;
    }

    public static function create($request){
        $user = new User();
        $user->person_id = $request->person->id;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->sys_role_id = 3;
        $user->avatar_id = Image::create($request, 'avatar')->id;
        $user->status_id = 1;

        $user->save();

        return $user;
    }

    public static function updateForTeam ($request){
        $user = User::find($request->userId);
        $person = $user->person;

        $person->update([
            "name" => $request->name,
            "role_id" => $request->role_id,
            "description" => $request->description,
        ]);

        $user->email = $request->email;

        if($request->isRedator)
            $user->sys_role_id = 2;


        $user->save();

        return $user;
    }
}
