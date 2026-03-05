<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:2048', 'dimensions:width=256,height=256'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
        ]);

        $user = Auth::user();

        $defaultImages = [
            'frontend/images/main-image/admin_profile/admin.jpg',
        ];

        if ($request->hasFile('image')) {
            $isDefaultImage = in_array($user->image, $defaultImages);

            if (!$isDefaultImage) {
                $imagePath = $this->updateImage($request, 'image', 'uploads/admin_profile', $user->image);
            } else {
                $imagePath = $this->uploadImage($request, 'image', 'uploads/admin_profile');
            }

            $user->image = $imagePath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
        ], [
            'current_password.current_password' => 'Current Password is invalid!',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Password Updated Successfully!'
        ]);
    }
}
