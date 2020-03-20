<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['place', 'date', 'piece_id', 'price'];

    public static function create($request){
        $schedule =  new Schedule();
        $schedule->place = $request->endereco;
        $schedule->date = $request->date;
        $schedule->piece_id = $request->piece;
        $schedule->price = $request->price;
        $schedule->save();

        return $schedule;

    }
}
