<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

        protected $fillable = [
        'movie_id',
        'title',
        'poster',
        'about',
        'slug',
        'rating',
        'genres',
        'trailer',
        'status',
        'updated_at',
        'created_at',
    ];

}
