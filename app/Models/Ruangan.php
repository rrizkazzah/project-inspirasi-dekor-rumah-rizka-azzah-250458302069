<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($ruangan) {
            if (empty($ruangan->slug)) {
                $ruangan->slug = Str::slug($ruangan->name);
            }
        });
    }

    /**
     * Inspirations in this room
     */
    public function inspirations()
    {
        return $this->hasMany(Inspiration::class);
    }
}
