<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use App\Models\GoogleSetting;
use App\Models\LogoSetting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $emailSettings = EmailConfiguration::first();
        $logoSettings = LogoSetting::first();
        $googleSettings = GoogleSetting::first();
        return response()->json([
            'status' => 200,
            'data' => [
                'generalSettings' => $generalSettings,
                'emailSettings' => $emailSettings,
                'logoSettings' => $logoSettings,
                'googleSettings' => $googleSettings,
            ]
        ], 200);
    }

    public function generalSettingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_name' => 'required|max:200',
            'layout' => 'required|in:LTR,RTL',
            'contact_email' => 'required|email|max:200',
            'contact_phone' => 'nullable|max:20',
            'contact_address' => 'nullable|max:500',
            'map' => 'nullable|max:1000',
            'currency_name' => 'required',
            'currency_icon' => 'required|max:200',
            'time_zone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

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

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }

    public function emailConfigSettingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'host' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'port' => 'required|max:255',
            'encryption' => 'required|max:255|in:tls,ssl',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

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

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }

    public function logoSettingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|max:2048|dimensions:width=249,height=87',
            'favicon' => 'nullable|image|max:2048|dimensions:width=112,height=112',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $logoSetting = LogoSetting::first();
        if (!$logoSetting) {
            $logoSetting = new LogoSetting();
        }

        $defaultLogo = 'frontend/images/main-image/logo/logo.png';
        $defaultFavicon = 'frontend/images/main-image/logo/favicon.png';

        if ($request->hasFile('logo')) {
            $oldLogoPath = null;
            if ($logoSetting->logo && $logoSetting->logo != $defaultLogo) {
                $oldLogoPath = $logoSetting->logo;
            }

            $logoSetting->logo = $this->updateImage($request, 'logo', 'uploads/header_logo_image', $oldLogoPath);
        }

        if ($request->hasFile('favicon')) {
            $oldFaviconPath = null;
            if ($logoSetting->favicon && $logoSetting->favicon != $defaultFavicon) {
                $oldFaviconPath = $logoSetting->favicon;
            }

            $logoSetting->favicon = $this->updateImage($request, 'favicon', 'uploads/header_favicon_image', $oldFaviconPath);
        }

        $logoSetting->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }

    public function googleSettingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'google_client_id' => 'required',
            'google_client_secret' => 'required',
            'google_redirect_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        GoogleSetting::updateOrCreate(
            ['id' => 1],
            [
                'google_client_id' => $request->google_client_id,
                'google_client_secret' => $request->google_client_secret,
                'google_redirect_url' => $request->google_redirect_url,
            ]
        );

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }
}
