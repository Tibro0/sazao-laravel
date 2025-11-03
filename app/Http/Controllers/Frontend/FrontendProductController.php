<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    /** Show Product detail Page */
    public function showProduct(string $slug)
    {
        $flashSaleDate = FlashSale::first();
        $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where(['slug' => $slug, 'status' => 1])->first();
        return view('frontend.pages.product-detail', compact('product', 'flashSaleDate'));
    }
}
