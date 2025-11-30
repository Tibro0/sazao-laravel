<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductReviewController extends Controller
{
    public function index(){
        $reviews = ProductReview::with(['product'])->where(['vendor_id' => Auth::user()->vendor->id])->orderby('id', 'DESC')->get();
        return view('vendor.review.index', compact('reviews'));
    }
}
