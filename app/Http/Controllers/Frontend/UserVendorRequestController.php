<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorCondition;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVendorRequestController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $content = VendorCondition::first();
        return view('frontend.dashboard.vendor-request.index', compact('content'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'shop_image' => ['required', 'image', 'max:2048', 'dimensions:width=1630,height=429'],
            'shop_name' => ['required', 'max:255'],
            'shop_email' => ['required', 'email', 'max:255'],
            'shop_phone' => ['required', 'max:255'],
            'shop_address' => ['required', 'max:255'],
            'about' => ['required'],
        ]);

        if (Auth::user()->role === 'vendor') {
            return redirect()->back();
        }

        $imagePath = $this->uploadImage($request, 'shop_image', 'uploads/became_a_vendor _all_images');

        $vendor = new Vendor();
        $vendor->user_id = Auth::user()->id;
        $vendor->shop_name = $request->shop_name;
        $vendor->banner = $imagePath;
        $vendor->phone = $request->shop_phone;
        $vendor->email = $request->shop_email;
        $vendor->address = $request->shop_address;
        $vendor->description = $request->about;
        $vendor->status = 0;
        $vendor->save();

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Submitted Successfully! Please Wait for Approve.'
        ]);
    }
}
