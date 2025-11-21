<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use App\Models\RazorPaySetting;
use App\Models\StripeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $paypalSetting = PaypalSetting::first();
        $stripeSetting = StripeSetting::first();
        $razorpaySetting = RazorPaySetting::first();
        return view('admin.payment-settings.index', compact('paypalSetting', 'stripeSetting', 'razorpaySetting'));
    }

    public function adminPaymentSettingListStyle(Request $request)
    {
        Session::put('admin_payment_setting_list_style', $request->style);
    }
}
