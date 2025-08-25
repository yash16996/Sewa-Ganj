<?php

namespace App\Http\Middleware;

use App\Services\NotificationService;
use Closure;
use Flasher\Prime\Notification\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VendorVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user has no vendor verification records
        if (Auth::guard('web')->user()->vendorVerifications->isEmpty()) {
            return $next($request);
        }
        
        // Check if the user has a vendor verification record
        if (Auth::guard('web')->user()->vendorVerifications->first()->status == 'pending' || Auth::guard('web')->user()->vendorVerifications->first()->status == 'approved') {
            if (Auth::guard('web')->user()->vendorVerifications->first()->status == 'pending') {
                NotificationService::ERROR('Your vendor verification is pending. Please wait for approval.');
            } else {
                NotificationService::CREATED('Your vendor verification is approved.');
            }
            return to_route('dashboard');
        }

        return $next($request);
    }
}
