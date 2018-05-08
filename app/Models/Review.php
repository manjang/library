<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    protected $fillable = [
        'rating',
        'content',
        'user_id',
    ];


    public function user() {

        return $this->belongsTo(User::class);
    }
}
