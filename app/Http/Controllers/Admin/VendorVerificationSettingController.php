<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VendorVerificationSetting\VendorVerificationSettingUpdateRequest;
use App\Models\VendorVerificationSetting;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VendorVerificationSettingController extends Controller
{
    public function index(): View
    {
        $vendorVerificationSetting = VendorVerificationSetting::first();
        return view('admin.vendor-verification.vendor-verification-setting.index', compact('vendorVerificationSetting'));
    }

    public function update(VendorVerificationSettingUpdateRequest $request): RedirectResponse
    {
        // dd($request->all());
        VendorVerificationSetting::updateOrCreate(
            ['id' => 1],
            $request->validated()
        );
        NotificationService::UPDATED();
        return redirect()->back();
    }
}
