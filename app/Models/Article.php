<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'thumbnail_image_url',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Scope for published articles
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
                    ->where('published_at', '<=', now())
                    ->orderBy('published_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
