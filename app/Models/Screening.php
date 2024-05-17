<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

      protected $fillable = [
        'screening_id',
        'movie_id',
        'start_time',
        'end_time',
        'date',
        'updated_at',
        'created_at',
    ];
}
