<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'content',
        'rating',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    
}
