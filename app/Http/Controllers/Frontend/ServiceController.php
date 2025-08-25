<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Services\StoreServiceRequest;
use App\Http\Requests\Frontend\Services\UpdateServiceRequest;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use App\Services\NotificationService;
use App\Traits\FileUpload;

class ServiceController extends Controller
{

    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(User $vendor)
    {
        $services = Service::where('vendor_id', $vendor->id)->get();

        if ($services->isEmpty()) {
            NotificationService::ERROR('No services found for this vendor.');

        }

        return view('frontend.dashboard.services.index', compact('vendor', 'services'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(User $vendor)
    {
        return view('frontend.dashboard.services.create', compact('vendor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $service = new Service();


        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($service->avatar) {
                $this->handleDeleteFile($service->avatar);
            }
            $avatarPath = $this->handleUploadFile($request->avatar);
            $service->avatar = $avatarPath;
        }

        $service->name = $request->name;
        $service->description = $request->description;
        $service->category_id = $request->category_id;
        $service->service_charge = $request->service_charge;
        $service->status = $request->status;
        $service->vendor_id = $request->vendor_id;
        $service->save();

        NotificationService::CREATED("Service created successfully.");
        return redirect()->route('vendor-services.index', $request->vendor_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // dd($category);
        $services = Service::where('category_id', $category->id)->get();
        $cartItems = CartItem::where('user_id', auth()->id())->get();

        if ($services->isEmpty()) {
            NotificationService::ERROR('No services found for this category.');
        }

        return view('frontend.pages.list-services', compact('category', 'services', 'cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // Check if the service belongs to the authenticated vendor
        if (auth()->user()->id !== $service->vendor_id) {
            NotificationService::ERROR("You do not have permission to edit this service.");
            return redirect()->back();
        }
        // dd($service);
        return view('frontend.dashboard.services.edit', compact('service'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        // Check if the service belongs to the authenticated vendor
        if (auth()->user()->id !== $service->vendor_id) {
            NotificationService::ERROR("You do not have permission to edit this service.");
            return redirect()->back();
        }

        $data = $request->validated();
        unset($data['avatar']); // Exclude avatar from mass update
        $service->update($data);

        // Handle avatar separately if uploaded
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($service->avatar) {
            $this->handleDeleteFile($service->avatar);
            }
            $avatarPath = $this->handleUploadFile($request->avatar);
            $service->avatar = $avatarPath;
            $service->save();
        }

        NotificationService::UPDATED("Service updated successfully.");
        return redirect()->route('vendor-services.index', $service->vendor_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Delete the service avatar if it exists
        if ($service->avatar) {
            $this->handleDeleteFile($service->avatar);
        }

        $service->delete();
        NotificationService::DELETED("Service deleted successfully.");
        return redirect()->route('vendor-services.index', $service->vendor_id);
    }
}
