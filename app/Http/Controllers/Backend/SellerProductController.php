<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['vendor'])->orderBy('id', 'DESC')->where('vendor_id', '!=', Auth::user()->vendor->id)->where('is_approved', 1)->get();
        return view('admin.product.seller-product.index', compact('products'));
    }

    public function pendingProducts()
    {
        $products = Product::with(['vendor'])->orderBy('id', 'DESC')->where('is_approved', 0)->get();
        return view('admin.product.seller-pending-product.index', compact('products'));
    }

    public function changeApproveStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->is_approved = $request->value;
        $product->save();
        return response(['status' => 'success', 'message' => 'Product Approved Status Has Been Changed!']);
    }
}
