<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

     protected $fillable = [
        'seat_id',
        'screening_id',
        'seat_number',
        'IsBook',
        'user_id',
        'updated_at',
        'created_at',
    ];

}
