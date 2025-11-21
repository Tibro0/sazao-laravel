<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\FlashSale;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendProductController extends Controller
{
    public function productsIndex(Request $request)
    {
        if ($request->has('category')) {
            $category = Category::where(['slug' => $request->category])->firstOrFail();
            $products = Product::with(['category', 'productImageGalleries'])->where(['category_id' => $category->id, 'status' => 1, 'is_approved' => 1])->paginate(12);
        }elseif ($request->has('subcategory')) {
            $category = SubCategory::where(['slug' => $request->subcategory])->firstOrFail();
            $products = Product::with(['category', 'productImageGalleries'])->where(['sub_category_id' => $category->id, 'status' => 1, 'is_approved' => 1])->paginate(12);
        }elseif ($request->has('childcategory')) {
            $category = ChildCategory::where(['slug' => $request->childcategory])->firstOrFail();
            $products = Product::with(['category', 'productImageGalleries'])->where(['child_category_id' => $category->id, 'status' => 1, 'is_approved' => 1])->paginate(12);
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

    public function changeListView(Request $request)
    {
        Session::put('product_list_style', $request->style);
    }
}
