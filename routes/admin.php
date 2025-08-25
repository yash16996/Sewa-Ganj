<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VendorVerificationRequestController;
use App\Http\Controllers\Admin\VendorVerificationSettingController;
use App\Models\VendorVerification;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');
    });

Route::middleware('auth:admin')
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        // admin profile routes
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

        // admin access management routes
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/update/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('roles/delete/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');


        // admin role-user management routes
        Route::resource('role-users', RoleUserController::class);

        // admin settings routes
        Route::resource('settings', SettingController::class);


        // vendor verification status update route
        Route::put(
            'vendor-verification-requests/update-status/{vendorVerification}',
            [VendorVerificationRequestController::class, 'updateStatus']
        )->name('vendor-verification-requests.update-status');


        // download file route
        Route::get('download-file/{file}', [VendorVerificationRequestController::class, 'downloadFile'])
            ->where('file', '.*')
            ->name('download-file');


        // vendor verification requests management routes
        Route::resource('vendor-verification-requests', VendorVerificationRequestController::class);


        // Vendor Verification Routes
        Route::get('vendor-verification-settings', [VendorVerificationSettingController::class, 'index'])->name('vendor-verification-settings.index');
        Route::put('vendor-verification-settings', [VendorVerificationSettingController::class, 'update'])->name('vendor-verification-settings.update');


        // Category management routes
        Route::resource('categories', CategoryController::class);

        // service management routes
        Route::get('services/vendor-list', [ServiceController::class, 'vendorList'])->name('services.vendor-list');
        Route::get('services/vendor-services/{vendor}', [ServiceController::class, 'vendorServicesList'])->name('vendor.services');
    });
