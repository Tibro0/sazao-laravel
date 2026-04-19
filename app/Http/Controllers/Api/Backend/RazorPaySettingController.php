<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\RazorPaySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RazorPaySettingController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean',
            'country_name' => 'required|max:200',
            'currency_name' => 'required|max:200',
            'currency_rate' => 'required',
            'razorpay_key' => 'required',
            'razorpay_secret_key' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        RazorPaySetting::updateOrCreate(
            ['id' => 1],
            [
                'status' => $request->status,
                'country_name' => $request->country_name,
                'currency_name' => $request->currency_name,
                'currency_rate' => $request->currency_rate,
                'razorpay_key' => $request->razorpay_key,
                'razorpay_secret_key' => $request->razorpay_secret_key,
            ]
        );

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }
}
