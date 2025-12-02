<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'content',
        'rating',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'rating' => 'integer',
    ];

    /**
     * Scope for published testimonials
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
