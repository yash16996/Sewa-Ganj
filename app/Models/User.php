<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'avatar',
        'user_type',
        'name',
        'email',
        'password',
        'country',
        'city',
        'address',
        'service_category_id',
        'vendor_verification',
        'vendor_rating',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    function vendorVerifications(): HasMany
    {
        return $this->hasMany(VendorVerification::class)->orderBy('created_at', 'desc');
    }

    function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    function serviceCategory()
    {
        return $this->belongsTo(Category::class, 'service_category_id');
    }

    function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    function requestServices(): HasMany
    {
        return $this->hasMany(RequestService::class);
    }
}
