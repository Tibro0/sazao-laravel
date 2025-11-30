<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Models\ProductReviewGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $reviews = ProductReview::with(['product'])->orderby('id', 'DESC')->get();
        return view('frontend.dashboard.review.index', compact('reviews'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'rating' => ['required', 'in:1,2,3,4,5'],
            'review' => ['required', 'max:255'],
            'images.*' => ['image', 'max:2048', 'dimensions:width=380,height=356'],
            'product_id' => ['integer'],
            'vendor_id' => ['integer'],
        ]);

        $checkReviewExist = ProductReview::where(['product_id' => $request->product_id, 'user_id' => Auth::user()->id])->first();

        if ($checkReviewExist) {
            return redirect()->back()->with('toast', [
                'type' => 'error',
                'title' => 'Error',
                'message' => 'You Already Added a Review for This Product.'
            ]);
        }

        $imagePath = $this->uploadMultiImage($request, 'images', 'uploads/review_images');

        $productReview = new ProductReview();
        $productReview->product_id = $request->product_id;
        $productReview->user_id = Auth::user()->id;
        $productReview->vendor_id = $request->vendor_id;
        $productReview->review = $request->review;
        $productReview->rating = $request->rating;
        $productReview->status = 0;
        $productReview->save();

        if (!empty($imagePath)) {
            foreach ($imagePath as $path) {
                $reviewGallery = new ProductReviewGallery();
                $reviewGallery->product_review_id = $productReview->id;
                $reviewGallery->image = $path;
                $reviewGallery->save();
            }
        }

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Review Added Successfully!'
        ]);
    }
}
