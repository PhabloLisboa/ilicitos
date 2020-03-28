<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['title', 'description'];

    public function images(){
        return $this->hasMany(Image::class, 'gallery_id');
    }

    public static function create($request){
        $gallery = new Gallery();

        $gallery->title = $request->name;
        $gallery->description = $request->description;
        $gallery->save();

        return $gallery;
    }
}
