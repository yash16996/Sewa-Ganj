<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Services\NotificationService;

class ServiceController extends Controller
{

    public function vendorList()
    {
        $vendors = User::where('user_type', 'vendor')->get();
        return view('admin.services.vendor_list', compact('vendors'));
    }


    public function vendorServicesList(User $vendor)
    {
        $services = Service::where('vendor_id', $vendor->id)->get();
        if ($services->isEmpty()) {
            NotificationService::ERROR('No services found for this vendor.');
            return redirect()->back();
        }
        return view('admin.services.vendor_services_list', compact('vendor', 'services'));
    }


}
