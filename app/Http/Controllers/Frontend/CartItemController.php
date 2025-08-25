<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Service;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('hello');
        $cartItems = auth()->user()->cartItems;
        // dd($cartItems);
        if ($cartItems->isEmpty()) {
            NotificationService::ERROR('No items found in your cart.');
        }

        return view('frontend.dashboard.cart-items.index', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function payment(CartItem $cartItem)
    {
        // Show payment form for the cart item
        return view('frontend.dashboard.cart-items.payment', compact('cartItem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Service $service, User $user)
    {
        // Check if the service is already in the user's cart
        if (CartItem::where('user_id', $user->id)->where('service_id', $service->id)->first()) {
            NotificationService::ERROR('This service is already in the carts.');
            return redirect()->back();
        }

        $cartItem = new CartItem();
        $cartItem->user_id = $user->id;
        $cartItem->service_id = $service->id;
        $cartItem->save();
        NotificationService::CREATED('A new cart item has been added to your cart successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        NotificationService::DELETED('Cart item has been removed successfully.');
        return redirect()->back();
    }
}
