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
            'address' => ['required', 'max:300'],
            'copyright' => ['required', 'max:300'],
        ]);

        $footerInfo = FooterInfo::find($id);
        /** Handle file upload */
        $imagePath = $this->updateImage($request, 'logo', 'uploads/footer_logo_image', $footerInfo?->logo);

        FooterInfo::updateOrCreate(
            ['id' => $id],
            [
                'logo' => empty(!$imagePath) ? $imagePath : $footerInfo->logo,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'copyright' => $request->copyright,
            ]
        );

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }
}
