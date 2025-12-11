<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $emailSettings = EmailConfiguration::first();
        $logoSettings = LogoSetting::first();
        return view('admin.setting.index', compact('generalSettings', 'emailSettings', 'logoSettings'));
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

    public function emailConfigSettingUpdate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'host' => ['required', 'max:255'],
            'username' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
            'port' => ['required', 'max:255'],
            'encryption' => ['required', 'max:255', 'in:tls,ssl'],
        ]);

        EmailConfiguration::updateOrCreate(
            ['id' => 1],

            [
                'email' => $request->email,
                'host' => $request->host,
                'username' => $request->username,
                'password' => $request->password,
                'port' => $request->port,
                'encryption' => $request->encryption,
            ]
        );

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    public function logoSettingUpdate(Request $request){
        $request->validate([
            'logo' => ['nullable', 'image', 'max:2048', 'dimensions:width=249,height=87'],
            'favicon' => ['nullable', 'image', 'max:2048', 'dimensions:width=112,height=112'],
        ]);

        $logoPath = $this->updateImage($request, 'logo', 'uploads/header_logo_image', $request->old_logo);
        $favicon = $this->updateImage($request, 'favicon', 'uploads/header_favicon_image', $request->old_favicon);

        LogoSetting::updateOrCreate(
            ['id' => 1],
            [
                'logo' => !empty($logoPath) ? $logoPath : $request->old_logo,
                'favicon' => !empty($favicon) ? $favicon : $request->old_favicon,
            ]
        );

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }
}
