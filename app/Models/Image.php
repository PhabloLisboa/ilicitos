<?php

namespace App\Models;

use Cloudinary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'path', 'gallery_id'];

    static function create($request){


        $image = new Image();
        $image->name = Str::random(32);
        $image->path = new Image();
        $image->gallery_id = null;

        return $image;
    }
}
