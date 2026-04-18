<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $coupons
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
            'name' => 'required|max:200',
            'code' => 'required|max:200',
            'quantity' => 'required|integer',
            'max_use' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'discount_type' => 'required|max:200|in:percent,amount',
            'discount' => 'required|integer',
            'status' => 'required|boolean'
        ], [
            'status.required' => 'Please select the status.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->total_used = 0;
        $coupon->status = $request->status;
        $coupon->save();

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
        $coupon = Coupon::find($id);

        if ($coupon == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Coupon Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $coupon
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
        $coupon = Coupon::find($id);

        if ($coupon == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Coupon Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'code' => 'required|max:200',
            'quantity' => 'required|integer',
            'max_use' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'discount_type' => 'required|max:200|in:percent,amount',
            'discount' => 'required|integer',
            'status' => 'required|boolean'
        ], [
            'status.required' => 'Please select the status.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->total_used = 0;
        $coupon->status = $request->status;
        $coupon->save();

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
        $coupon = Coupon::find($id);

        if ($coupon == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Coupon Not Found!',
            ], 404);
        }

        $coupon->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
