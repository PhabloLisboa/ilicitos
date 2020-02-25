<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $table = 'pieces';
    protected $fillable = ['name', 'author', 'year', 'synopsis', 'cover_id'];
}
