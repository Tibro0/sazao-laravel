<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function productsIndex(Request $request)
    {
        if ($request->has('category')) {
            $category = Category::where(['slug' => $request->category])->first();
            $products = Product::with(['category', 'productImageGalleries'])->where(['category_id' => $category->id, 'status' => 1, 'is_approved' => 1])->paginate(12);
        }
        return view('frontend.pages.product', compact('products'));
    }

    /** Show Product detail Page */
    public function showProduct(string $slug)
    {
        $flashSaleDate = FlashSale::first();
        $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where(['slug' => $slug, 'status' => 1, 'is_approved' => 1])->first();
        return view('frontend.pages.product-detail', compact('product', 'flashSaleDate'));
    }
}
