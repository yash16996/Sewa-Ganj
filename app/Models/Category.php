<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'avatar',
        'name',
        'slug',
        'description',
        // 'is_active'
    ];

    function services()
    {
        return $this->hasMany(Service::class);
    }
}
