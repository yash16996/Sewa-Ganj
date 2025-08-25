<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Profile\PasswordUpdateRequest;
use App\Http\Requests\Frontend\Profile\ProfileUpdateRequest;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Traits\FileUpload;

class ProfileController extends Controller
{

    use FileUpload;

    public function index(): View
    {
        $user = Auth::user();
        return view('frontend.dashboard.profile.index', compact('user'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        // dd($request->all());
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                $this->handleDeleteFile($user->avatar);
            }
            $avatarPath = $this->handleUploadFile($request->avatar);
            $user->avatar = $avatarPath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->save();

        NotificationService::UPDATED("Profile Updated Successfully.");


        // alternative
        // $user->update($request->only(['name', 'email', 'country', 'city', 'address']));
        return redirect()->back();
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        NotificationService::UPDATED("Password Updated Successfully.");

        return redirect()->back();
    }
}
