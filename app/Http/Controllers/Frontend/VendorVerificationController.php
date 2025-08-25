<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\VendorVerification\VendorVerificationStoreRequest;
use App\Models\Category;
use App\Models\VendorVerification;
use App\Services\NotificationService;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VendorVerificationController extends Controller
{
    use FileUpload;

    public function index(): View
    {
        $categories = Category::all();
        return view('frontend.pages.vendor-verification', compact('categories'));
    }

    public function store(VendorVerificationStoreRequest $request): RedirectResponse
    {
        // dd($request->all());

        $vendorVerification = new VendorVerification();
        $vendorVerification->user_id = Auth::guard('web')->user()->id;

        $vendorVerification->service_category_id = $request->service_category_id;

        if ($request->hasFile('id_verification')) {
            // Delete old ID verification if exists
            if ($vendorVerification->id_verification) {
                $this->handleDeleteFile($vendorVerification->id_verification);
            }
            $idVerificationPath = $this->handleUploadFile($request->id_verification, disk: 'local');
            $vendorVerification->id_verification = $idVerificationPath;
        }

        if ($request->hasFile('pan_verification')) {
            // Delete old PAN verification if exists
            if ($vendorVerification->pan_verification) {
                $this->handleDeleteFile($vendorVerification->pan_verification);
            }
            $panVerificationPath = $this->handleUploadFile($request->pan_verification, disk: 'local');
            $vendorVerification->pan_verification = $panVerificationPath;
        }

        if ($request->hasFile('irc_verification')) {
            // Delete old IRC verification if exists
            if ($vendorVerification->irc_verification) {
                $this->handleDeleteFile($vendorVerification->irc_verification);
            }
            $ircVerificationPath = $this->handleUploadFile($request->irc_verification, disk: 'local');
            $vendorVerification->irc_verification = $ircVerificationPath;
        }

        $vendorVerification->save();
        NotificationService::CREATED('Vendor verification documents uploaded successfully.');

        return to_route('dashboard');
    }
}
