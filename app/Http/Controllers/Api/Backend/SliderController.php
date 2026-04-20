<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $sliders
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner' => 'required|image|max:2048|dimensions:width=1300,height=500',
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'starting_price' => 'nullable|max:200',
            'btn_url' => 'nullable|url',
            'serial' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $slider = new Slider();

        /** Handle file upload */
        $imagePath = $this->uploadImage($request, 'banner', 'uploads/banner_images');

        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        return response()->json([
            'status' => 200,
            'message' => 'Created Successfully!',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slider = Slider::find($id);

        if ($slider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Slider Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $slider,
        ], 200);
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
        $slider = Slider::find($id);

        if ($slider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Slider Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'banner' => 'nullable|image|max:2048|dimensions:width=1300,height=500',
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'starting_price' => 'nullable|max:200',
            'btn_url' => 'nullable|url',
            'serial' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        /** Handle file upload */
        $defaultImages = [
            'frontend/images/main-image/slider/slider_1.jpg',
            'frontend/images/main-image/slider/slider_2.jpg',
            'frontend/images/main-image/slider/slider_3.jpg',
        ];

        if ($request->hasFile('banner')) {
            $isDefaultImage = in_array($slider->banner, $defaultImages);

            if (!$isDefaultImage) {
                $imagePath = $this->updateImage($request, 'banner', 'uploads/banner_images', $slider->banner);
            } else {
                $imagePath = $this->uploadImage($request, 'banner', 'uploads/banner_images');
            }

            $slider->banner = $imagePath;
        }

        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);

        if ($slider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Slider Not Found!',
            ], 404);
        }

        $defaultImages = [
            'frontend/images/main-image/slider/slider_1.jpg',
            'frontend/images/main-image/slider/slider_2.jpg',
            'frontend/images/main-image/slider/slider_3.jpg',
        ];

        if ($slider->banner && !in_array($slider->banner, $defaultImages)) {
            $this->deleteImage($slider->banner);
        }

        $slider->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
