<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaypalSettingController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'status' => 'required|boolean',
                'mode' => 'required|boolean',
                'country_name' => 'required|max:200',
                'currency_name' => 'required|max:200',
                'currency_rate' => 'required',
                'client_id' => 'required',
                'secret_key' => 'required',
            ],
            [
                'client_id.required' => 'The PayPal Client Id Field is Required',
                'secret_key.required' => 'The PayPal Secret Key Field is Required',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }


        PaypalSetting::updateOrCreate(
            ['id' => 1],
            [
                'status' => $request->status,
                'mode' => $request->mode,
                'country_name' => $request->country_name,
                'currency_name' => $request->currency_name,
                'currency_rate' => $request->currency_rate,
                'client_id' => $request->client_id,
                'secret_key' => $request->secret_key,
            ]
        );

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully',
        ], 200);
    }
}
