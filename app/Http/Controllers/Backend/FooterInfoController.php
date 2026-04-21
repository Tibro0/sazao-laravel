<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $footerInfo = FooterInfo::first();
        return view('admin.footer.footer-info.index', compact('footerInfo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:2048', 'dimensions:width=249,height=87'],
            'phone' => ['required', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'address' => ['required', 'max:255'],
            'copyright' => ['required', 'max:255'],
        ]);

        $footerInfo = FooterInfo::find($id);

        $defaultImages = [
            'frontend/images/main-image/footer_logo_image/logo.png',
        ];


        if ($request->hasFile('logo')) {
            $isDefaultImage = in_array($footerInfo->logo, $defaultImages);

            if (!$isDefaultImage) {
                $imagePath = $this->updateImage($request, 'logo', 'uploads/footer_logo_image', $footerInfo->logo);
            } else {
                $imagePath = $this->uploadImage($request, 'logo', 'uploads/footer_logo_image');
            }

            $footerInfo->logo = $imagePath;
        }

        $footerInfo->phone = $request->phone;
        $footerInfo->email = $request->email;
        $footerInfo->address = $request->address;
        $footerInfo->copyright = $request->copyright;
        $footerInfo->save();

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }
}
