<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspiration extends Model
{
    protected $fillable = [
        'user_id',
        'ruangan_id',
        'tags_id',
        'title',
        'description',
        'design_by',
        'area',
        'year',
        'country',
        'jenis_material',
        'image_url',
        'status',
    ];

    protected $casts = [
        'year' => 'integer',
    ];

    /**
     * Scope for approved inspirations
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }


    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }


    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tags_id');
    }


    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_favorites');
    }


    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'likes');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function reports()
    {
        return $this->hasMany(Report::class);
    }


    public function likesCount()
    {
        return $this->likedBy()->count();
    }


    public function isLikedBy($user)
    {
        if (!$user) return false;
        return $this->likedBy()->where('user_id', $user->id)->exists();
    }


    public function isFavoritedBy($user)
    {
        if (!$user) return false;
        return $this->favoritedBy()->where('user_id', $user->id)->exists();
    }
}
