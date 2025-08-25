<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorVerificationSetting extends Model
{
    protected $fillable = [
        'id',
        'id_verification',
        'pan_verification',
        'irc_verification',
        'auto_approve',
        'status',
        'instructions',
    ];
}
