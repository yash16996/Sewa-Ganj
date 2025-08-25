<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\IsCustomerMiddleware;
use App\Http\Middleware\IsVendorMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\VendorVerificationMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/admin.php'
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'guest' => RedirectIfAuthenticated::class,
            'auth' => Authenticate::class,
            'vendor.verification' => VendorVerificationMiddleware::class,
            'isVendor' => IsVendorMiddleware::class,
            'isCustomer' => IsCustomerMiddleware::class,

            // spatie middlewares
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
