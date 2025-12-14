<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

    protected $fillable = [
        'name',
        'slug',
    ];


    public function inspirations()
    {
        return $this->hasMany(Inspiration::class);
    }
}
