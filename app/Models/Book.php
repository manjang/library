<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use Searchable;
    
    protected $fillable = [
        'title',
        'file',
        'thumbnail',
        'description',
        'author',
        'user_id',
        'faculty_id',
        'category_id',
    ];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function review() {

        return $this->hasMany(Review::class);
    }

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function faculty() {

        return $this->belongsTo(Faculty::class);
    }

    public function getImage() {

        if (!$this->thumbnail) {
            return config('library.buckets.images') . '/images/default.jpg';
        }

        return config('library.buckets.images') . '/images/' . $this->thumbnail;
    }
}
