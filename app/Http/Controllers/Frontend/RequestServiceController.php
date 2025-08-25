<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\RequestService;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;

class RequestServiceController extends Controller
{
    public function index () {


        // if ($requestServices->isEmpty()) {
        //     NotificationService::ERROR('No requests found.');
        // }

        // return view('frontend.dashboard.request-service.index', compact('requestServices'));
    }

    public function store(CartItem $cartItem)
    {
        // dd($cartItem);

        // Create a new RequestService instance
        // $requestService = new RequestService();
        // $requestService->cartItem_id = $cartItem->id;
        // $requestService->save();

        // NotificationService::CREATED('Your service request has been submitted successfully.');
        // return redirect()->back();
    }
}
