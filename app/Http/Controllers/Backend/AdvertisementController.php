<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdvertisementController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $homepage_section_banner_one = Advertisement::where('key', 'homepage_section_banner_one')->first();
        $homepage_section_banner_one = json_decode($homepage_section_banner_one?->value);

        $homepage_section_banner_two = Advertisement::where('key', 'homepage_section_banner_two')->first();
        $homepage_section_banner_two = json_decode($homepage_section_banner_two?->value);
        return view('admin.advertisement.index', compact('homepage_section_banner_one', 'homepage_section_banner_two'));
    }

    public function homepageBannerSectionOne(Request $request)
    {
        $request->validate([
            'banner_image' => ['nullable', 'image', 'max:2048', 'dimensions:width=1900,height=500'],
            'banner_url' => ['required', 'url'],
        ]);

        /** Banner image handel */
        $imagePath = $this->updateImage($request, 'banner_image', 'uploads/advertisement/homepage_banner_section_one_image');

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_url,
                'status' => $request->status == 'on' ? 1 : 0,
            ]
        ];

        if (!empty($imagePath)) {
            if (isset($request->banner_old_image)) {
                unlink($request->banner_old_image);
            }
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate(
            ['key' => 'homepage_section_banner_one'],
            ['value' => $value]
        );

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    public function homepageBannerSectionTwo(Request $request)
    {
        $request->validate([
            'banner_one_image' => ['nullable', 'image', 'max:2048', 'dimensions:width=780,height=273'],
            'banner_one_url' => ['required', 'url'],

            'banner_two_image' => ['nullable', 'image', 'max:2048', 'dimensions:width=630,height=270'],
            'banner_two_url' => ['required', 'url'],
        ]);

        /** Banner one image handel */
        $imagePath = $this->updateImage($request, 'banner_one_image', 'uploads/advertisement/homepage_banner_section_two_image/part_one');

        /** Banner two image handel */
        $imagePathTwo = $this->updateImage($request, 'banner_two_image', 'uploads/advertisement/homepage_banner_section_two_image/part_two');

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_one_url,
                'status' => $request->banner_one_status == 'on' ? 1 : 0,
            ],
            'banner_two' => [
                'banner_url' => $request->banner_two_url,
                'status' => $request->banner_two_status == 'on' ? 1 : 0,
            ]
        ];

        /** Banner one image handel */
        if (!empty($imagePath)) {
            if (isset($request->banner_one_old_image)) {
                unlink($request->banner_one_old_image);
            }
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_one_old_image;
        }

        /** Banner two image handel */
        if (!empty($imagePathTwo)) {
            if (isset($request->banner_two_old_image)) {
                unlink($request->banner_two_old_image);
            }
            $value['banner_two']['banner_image'] = $imagePathTwo;
        } else {
            $value['banner_two']['banner_image'] = $request->banner_two_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate(
            ['key' => 'homepage_section_banner_two'],
            ['value' => $value]
        );

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    public function adminAdvertisementListStyle(Request $request)
    {
        Session::put('admin_advertisement_list_style', $request->style);
    }
}
