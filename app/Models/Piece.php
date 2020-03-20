<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $table = 'pieces';
    protected $fillable = ['name', 'author', 'year', 'synopsis', 'cover_id'];

    public static function create($request){
        $piece =  new Piece();
        $piece->name = $request->name;
        $piece->author = $request->author;
        $piece->year = $request->year;
        $piece->synopsis = $request->synopsis;
        $piece->cover = $request->cover;

        $piece->save();

        return $piece;
    }
}
