<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Faculty extends Model
{
    use Searchable;
    
    protected $fillable = [
        'name',
        'thumbnail',
        'description',
    ];

    public function book() {

        return $this->hasMany(Book::class);
    }

    public function user() {

        return $this->hasMany(User::class);
    }

    public function getImage() {

        if (!$this->thumbnail) {
            return config('library.buckets.images') . '/images/default.jpg';
        }

        return config('library.buckets.images') . '/images/' . $this->thumbnail;
    }
}
