<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'frequency',
        'start_date',
        'days',
        'times',
        'notes',
    ];

    protected $casts = [
        'days' => 'array',  // Automatically cast to/from JSON
        'times' => 'array', // Automatically cast to/from JSON
    ];
}
