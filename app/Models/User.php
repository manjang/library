<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mat_number', 'faculty_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function book() {

        return $this->hasMany(Book::class);
    }

    public function review() {
        
        return $this->hasMany(Review::class);
    }

    public function faculty() {

        return $this->belongsTo(Faculty::class);
    }
}
