<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendorVerification;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VendorVerificationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vendorVerificationRequests = VendorVerification::with('user')->get();
        return view("admin.vendor-verification.vendor-verification-request.index", compact('vendorVerificationRequests'));
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $vendorVerificationRequest = VendorVerification::with('user')->findOrFail($id);
        return view("admin.vendor-verification.vendor-verification-request.show", compact('vendorVerificationRequest'));
    }


    /**
     * Update the status of the vendor verification request.
     */
    public function updateStatus(Request $request, VendorVerification $vendorVerification)
    {
        $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
            'service_category_id' => ['required', 'exists:categories,id'],
        ]);
        // dd($request->all());

        $vendorVerification->status = $request->input('status');
        $vendorVerification->save();

        if ($vendorVerification->status === 'approved') {
            $vendorVerification->user->vendor_verification = true;
            $vendorVerification->user->user_type = 'vendor';
            $vendorVerification->user->service_category_id = $request->input('service_category_id');
            $vendorVerification->user->save();
        } else {
            $vendorVerification->user->vendor_verification = false;
            $vendorVerification->user->user_type = 'customer';
            $vendorVerification->user->save();
        }

        NotificationService::UPDATED();

        return to_route('admin.vendor-verification-requests.index');
    }


    /**
     * Download Attachment files.
     */
    public function downloadFile(string $file)
    {
        // Normalize the file path and block directory traversal attacks.
        if (strpos($file, '..') !== false) {
            abort(400, 'Invalid file path');
        }

        $filePath = storage_path("app/private/{$file}");

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->download($filePath);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendorVerificationRequest = VendorVerification::findOrFail($id);
        $vendorVerificationRequest->delete();

        NotificationService::DELETED();

        return to_route('admin.vendor-verification-requests.index');
    }
}
