<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VendorProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->where(['vendor_id' => Auth::user()->vendor->id])->get();
        return view('vendor.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('vendor.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'image' => ['required', 'image', 'max:2048', 'dimensions:width=380,height=317'],
            'name' => ['required', 'max:255'],
            'category' => ['required', 'integer'],
            'brand' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'qty' => ['required', 'integer'],
            'short_description' => ['required', 'max:600'],
            'long_description' => ['required'],
            'seo_title' => ['max:255', 'nullable'],
            'seo_description' => ['max:255', 'nullable'],

            'sub_category' => ['nullable', 'integer'],
            'child_category' => ['nullable', 'integer'],
            'video_link' => ['nullable', 'url', 'max:255'],
            'sku' => ['nullable',  'max:255'],
            'offer_price' => ['nullable', 'integer'],
            'offer_start_date' => ['nullable', 'date'],
            'offer_end_date' => ['nullable', 'date'],
            'product_type' => ['nullable', 'in:new_arrival,featured_product,top_product,best_product'],
            'status' => ['required', 'boolean'],
        ]);

        /** Handle the image Upload */
        $imagePath = $this->uploadImage($request, 'image', 'uploads/product_thumb_image');

        $product = new Product();
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->is_approved = 0;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        return redirect()->route('vendor.products.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Created Successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        /** Check if it's the owner of the Product */
        if ($product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }

        $categories = Category::all();
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        $childCategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();
        $brands = Brand::all();
        return view('vendor.product.edit', compact('product', 'categories', 'subCategories', 'childCategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:2048', 'dimensions:width=380,height=317'],
            'name' => ['required', 'max:255'],
            'category' => ['required', 'integer'],
            'brand' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'qty' => ['required', 'integer'],
            'short_description' => ['required', 'max:600'],
            'long_description' => ['required'],
            'seo_title' => ['max:255', 'nullable'],
            'seo_description' => ['max:255', 'nullable'],

            'sub_category' => ['nullable', 'integer'],
            'child_category' => ['nullable', 'integer'],
            'video_link' => ['nullable', 'url', 'max:255'],
            'sku' => ['nullable',  'max:255'],
            'offer_price' => ['nullable', 'integer'],
            'offer_start_date' => ['nullable', 'date'],
            'offer_end_date' => ['nullable', 'date'],
            'product_type' => ['nullable', 'in:new_arrival,featured_product,top_product,best_product'],
            'status' => ['required', 'boolean'],
        ]);

        $product = Product::findOrFail($id);

        /** Check if it's the owner of the Product */
        if ($product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }

        /** Handle the image Upload */
        $imagePath = $this->updateImage($request, 'image', 'uploads/product_thumb_image', $product->thumb_image);

        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        // $product->is_approved = 1;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        return redirect()->route('vendor.products.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }

        /** Delete Main Product Image */
        $this->deleteImage($product->thumb_image);

        /** Delete Product Gallery Image */
        $galleryImages = ProductImageGallery::where(['product_id' => $product->id])->get();
        foreach ($galleryImages as $image) {
            $this->deleteImage($image->image);
            $image->delete();
        }

        /** Delete Product variant if exist */
        $variants = ProductVariant::with(['productVariantItems'])->where(['product_id' => $product->id])->get();

        foreach ($variants as $variant) {
            $variant->productVariantItems()->delete();
            $variant->delete();
        }

        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request){
        $product = Product::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }

    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();
        return $subCategories;
    }


    public function getChildCategories(Request $request)
    {
        $childCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return $childCategories;
    }
}
