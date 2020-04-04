<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['contact', 'type_id'];

    public function type(){
        return $this->belongsTo(ContactType::class, 'type_id');
    }
}
