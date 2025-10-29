<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorShopProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Vendor::where('user_id', Auth::user()->id)->first();
        return view('vendor.shop-profile.index', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2048', 'dimensions:width=1630,height=429'],
            'shop_name' => ['required', 'max:255'],
            'phone' => ['required', 'max:250'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'max:255'],
            'description' => ['required'],
            'fb_link' => ['nullable', 'url'],
            'tw_link' => ['nullable', 'url'],
            'insta_link' => ['nullable', 'url'],
        ],
        [
            'fb_link.url' => 'The Facebook Link link field must be a valid URL.',
            'tw_link.url' => 'The Twitter Link link field must be a valid URL.',
            'insta_link.url' => 'The Instagram Link link field must be a valid URL.'
        ]
    );

        $vendor = Vendor::where(['user_id' => Auth::user()->id])->first();

        $bannerPath = $this->updateImage($request, 'banner', 'uploads/vendor_profile_images', $vendor->banner);

        $vendor->banner = empty(!$bannerPath) ? $bannerPath : $vendor->banner;
        $vendor->shop_name = $request->shop_name;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->description = $request->description;
        $vendor->fb_link = $request->fb_link;
        $vendor->tw_link = $request->tw_link;
        $vendor->insta_link = $request->insta_link;
        $vendor->save();

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }
}
