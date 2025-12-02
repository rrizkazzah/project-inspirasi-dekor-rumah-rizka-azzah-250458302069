<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'user_favorites';
    
    protected $fillable = [
        'user_id',
        'inspiration_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inspiration()
    {
        return $this->belongsTo(Inspiration::class);
    }
}
