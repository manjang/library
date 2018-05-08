<?php

namespace App\Models;
use Laravel\Scout\Searchable;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Searchable;
    
    protected $fillable = [
        'name',
        'thumbnail',
    ];

    public function book() {

        return $this->hasMany(Book::class);
    }
}
