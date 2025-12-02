<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'inspiration_id',
        'content',
        'status',
    ];

    /**
     * Scope for approved comments
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inspiration()
    {
        return $this->belongsTo(Inspiration::class);
    }
}
