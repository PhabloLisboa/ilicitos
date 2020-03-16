<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'content', 'author_id', 'image_id', 'text'];

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function create($request){
        $news = new News();

        $news->title = $request->title;
        $news->text = $request->text;
        $news->author_id = Auth::user()->id;

        $news->save();

        return $news;

    }
}
