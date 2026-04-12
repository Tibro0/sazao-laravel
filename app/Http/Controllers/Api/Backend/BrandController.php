<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $brands
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
            'logo' => 'required|image|max:2048|dimensions:width=1280,height=640',
            'name' => 'required|max:255',
            'is_featured' => 'required|boolean',
            'status' => 'required|boolean',
        ], [
            'is_featured.required' => 'Please Select a is Featured',
            'status.required' => 'Please Select a Status'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $logoPath = $this->uploadImage($request, 'logo', 'uploads/brand_images');
        $brand = new Brand();
        $brand->logo = $logoPath;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

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
        $brand = Brand::find($id);

        if ($brand == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Brand Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $brand,
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
        $brand = Brand::find($id);

        if ($brand == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Brand Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|max:2048|dimensions:width=1280,height=640',
            'name' => 'required|max:255',
            'is_featured' => 'required|boolean',
            'status' => 'required|boolean',
        ], [
            'is_featured.required' => 'Please Select a is Featured',
            'status.required' => 'Please Select a Status'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $defaultImages = [
            'frontend/images/main-image/brand/apple.png',
            'frontend/images/main-image/brand/google.png',
            'frontend/images/main-image/brand/JBL.png',
            'frontend/images/main-image/brand/onePlus.png',
            'frontend/images/main-image/brand/oppo.png',
            'frontend/images/main-image/brand/realme.jpg',
            'frontend/images/main-image/brand/samsung.png',
        ];

        if ($request->hasFile('logo')) {
            $isDefaultImage = in_array($brand->logo, $defaultImages);

            if (!$isDefaultImage) {
                $imagePath = $this->updateImage($request, 'logo', 'uploads/brand_images', $brand->logo);
            } else {
                $imagePath = $this->uploadImage($request, 'logo', 'uploads/brand_images');
            }

            $brand->logo = $imagePath;
        }

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

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
        $brand = Brand::find($id);

        if ($brand == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Brand Not Found!',
            ], 404);
        }

        if (Product::where(['brand_id' => $brand->id])->count() > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'This Brand Have Products you cant Delete It.',
            ], 403);
        }

        $defaultImages = [
            'frontend/images/main-image/brand/apple.png',
            'frontend/images/main-image/brand/google.png',
            'frontend/images/main-image/brand/JBL.png',
            'frontend/images/main-image/brand/onePlus.png',
            'frontend/images/main-image/brand/oppo.png',
            'frontend/images/main-image/brand/realme.jpg',
            'frontend/images/main-image/brand/samsung.png',
        ];

        if ($brand->logo && !in_array($brand->logo, $defaultImages)) {
            $this->deleteImage($brand->logo);
        }

        $brand->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
