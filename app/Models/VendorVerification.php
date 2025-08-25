<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorVerification extends Model
{
    protected $fillable = [
        'user_id',
        'id_verification',
        'pan_verification',
        'irc_verification',
        'status',
        'service_category_id',
        'rejection_reason',
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
