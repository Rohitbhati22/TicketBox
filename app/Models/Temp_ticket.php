<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp_ticket extends Model
{
    use HasFactory;
      protected $fillable = [
        'user_id',
        'seat_id',
        'screening_id',
        'updated_at',
        'created_at',
    ];
}
