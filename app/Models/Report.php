<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'inspiration_id',
        'reason',
        'description',
        'status',
        'admin_notes',
    ];

    /**
     * Scope for pending reports
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
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
