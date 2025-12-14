<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];


    public function inspirations()
    {
        return $this->hasMany(Inspiration::class, 'tags_id');
    }
}
