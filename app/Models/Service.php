<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'avatar',
        'name',
        'description',
        'category_id',
        'service_charge',
        'status',
        'vendor_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class)->where('user_type', 'vendor');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
