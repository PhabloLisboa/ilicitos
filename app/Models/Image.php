<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Exception;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'path', 'gallery_id'];

    static function create($request, $fieldName){
        $file = $request->file($fieldName);
        $extension = $file->getClientOriginalExtension();

        $gallery = $request->gallery_id ? $request->gallery_id : null;


        if (!preg_match('/(jpeg)|(jpg)|(png)/mi', $extension)) {
            throw new Exception('Tipo de Arquivo inválido! Tipo Permitidos: jpeg, jpg, png.');
        }

        $fileName = Str::random(32).".".$extension;

        $file->move(storage_path('app/public/images'), $fileName);

        $image = new Image();
        $image->name = $file->getClientOriginalName();
        $image->path = $fileName;
        $image->gallery_id = $gallery;
        $image->save();

        return $image;

    }
}
