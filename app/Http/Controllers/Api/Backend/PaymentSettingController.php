<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use App\Models\PaypalSetting;
use App\Models\RazorPaySetting;
use App\Models\StripeSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $paypalSetting = PaypalSetting::first();
        $stripeSetting = StripeSetting::first();
        $razorpaySetting = RazorPaySetting::first();
        $codSetting = CodSetting::first();
        return response()->json([
            'status' => 200,
            'data' => [
                'paypalSetting' => $paypalSetting,
                'stripeSetting' => $stripeSetting,
                'razorpaySetting' => $razorpaySetting,
                'codSetting' => $codSetting,
            ]
        ], 200);
    }
}
