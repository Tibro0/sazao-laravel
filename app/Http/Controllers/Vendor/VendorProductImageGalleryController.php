<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    public function index(Request $request)
    {
        $productImageGalleries = ProductImageGallery::orderBy('id', 'DESC')->where(['product_id' => request()->product])->get();
        $product = Product::findOrFail($request->product);

        /** Check Product Vendor */
        if ($product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }

        return view('vendor.product.image-gallery.index', compact('productImageGalleries', 'product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'image', 'max:2048', 'dimensions:width=520,height=520']
        ]);

        /** Handle image upload */
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads/product_thumb_image/product_gallery_images');

        foreach ($imagePaths as $path) {
            $productGalleryImage = new ProductImageGallery();
            $productGalleryImage->image = $path;
            $productGalleryImage->product_id = $request->product;
            $productGalleryImage->save();
        }

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    public function destroy(string $id)
    {
        $productImage = ProductImageGallery::with(['product'])->findOrFail($id);

        /** Check Product Vendor */
        if ($productImage->product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }

        $this->deleteImage($productImage->image);
        $productImage->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
