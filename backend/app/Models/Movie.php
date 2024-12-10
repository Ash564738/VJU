<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'genre', 'duration', 'release_date', 'rating', 'poster_url'];

    public function shows()
    {
        return $this->hasMany(Show::class);
    }
}
