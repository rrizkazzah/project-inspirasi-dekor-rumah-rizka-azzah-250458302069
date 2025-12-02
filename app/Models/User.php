<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * User's inspirations
     */
    public function inspirations()
    {
        return $this->hasMany(Inspiration::class);
    }

    /**
     * User's favorites
     */
    public function favorites()
    {
        return $this->belongsToMany(Inspiration::class, 'user_favorites');
    }

    /**
     * User's likes
     */
    public function likes()
    {
        return $this->belongsToMany(Inspiration::class, 'likes');
    }

    /**
     * User's comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * User's reports
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
