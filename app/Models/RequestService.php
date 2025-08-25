<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{
    protected $fillable = [
        'cartItem_id',
        'status',
    ];

    public function cartItem()
    {
        return $this->belongsTo(CartItem::class, 'cartItem_id');
    }
}
