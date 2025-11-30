<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class AdminProductReviewController extends Controller
{
    public function index(){
        $reviews = ProductReview::with(['product', 'user'])->orderBy('id', 'DESC')->get();
        return view('admin.product.review.index', compact('reviews'));
    }

    public function changeStatus(Request $request){
        $review = ProductReview::findOrFail($request->id);
        $review->status = $request->status == 'true' ? 1 : 0;
        $review->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }
}
