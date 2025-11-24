<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        return view('admin.setting.index', compact('generalSettings'));
    }

    public function adminGeneralSettingListStyle(Request $request)
    {
        Session::put('admin_general_setting_list_style', $request->style);
    }

    public function generalSettingUpdate(Request $request)
    {
        $request->validate([
            'site_name' => ['required', 'max:200'],
            'layout' => ['required'],
            'contact_email' => ['required', 'email', 'max:200'],
            'currency_name' => ['required'],
            'currency_icon' => ['required', 'max:200'],
            'time_zone' => ['required', 'string'],
        ]);

        GeneralSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => $request->site_name,
                'layout' => $request->layout,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
                'contact_address' => $request->contact_address,
                'map' => $request->map,
                'currency_name' => $request->currency_name,
                'currency_icon' => $request->currency_icon,
                'time_zone' => $request->time_zone,
            ]
        );

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }
}
