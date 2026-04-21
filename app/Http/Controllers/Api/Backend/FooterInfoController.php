<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterInfoController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $footerInfo = FooterInfo::first();
        return response()->json([
            'status' => 200,
            'data' => $footerInfo
        ], 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|max:2048|dimensions:width=249,height=87',
            'phone' => 'required|max:100',
            'email' => 'required|email|max:100',
            'address' => 'required|max:255',
            'copyright' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $footerInfo = FooterInfo::find(1);

        if ($footerInfo == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Footer Information Not Found!',
            ], 404);
        }

        $defaultImages = [
            'frontend/images/main-image/footer_logo_image/logo.png',
        ];


        if ($request->hasFile('logo')) {
            $isDefaultImage = in_array($footerInfo->logo, $defaultImages);

            if (!$isDefaultImage) {
                $imagePath = $this->updateImage($request, 'logo', 'uploads/vendor_profile_images', $footerInfo->logo);
            } else {
                $imagePath = $this->uploadImage($request, 'logo', 'uploads/vendor_profile_images');
            }

            $footerInfo->logo = $imagePath;
        }

        $footerInfo->phone = $request->phone;
        $footerInfo->email = $request->email;
        $footerInfo->address = $request->address;
        $footerInfo->copyright = $request->copyright;
        $footerInfo->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }
}
