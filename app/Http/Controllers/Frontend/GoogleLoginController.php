<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GoogleSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;

class GoogleLoginController extends Controller
{
    public static function googleApiConfig()
    {
        $googleSettings = GoogleSetting::first();

        Config::set('services.google.client_id', $googleSettings->google_client_id);
        Config::set('services.google.client_secret', $googleSettings->google_client_secret);
        Config::set('services.google.redirect', $googleSettings->google_redirect_url);
    }

    public function googleLogin()
    {
        $this->googleApiConfig();

        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $this->googleApiConfig();

        $googleUser = Socialite::driver('google')->user();

        $existingUser = User::where('email', $googleUser->email)->first();

        if ($existingUser) {
            $existingUser->update([
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);

            $user = $existingUser;
        } else {
            $user = User::create([
                'email' => $googleUser->email,
                'image' => $googleUser->avatar,
                'name' => $googleUser->name,
                'username' => Str::snake($googleUser->user['family_name']),
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);
        }

        Auth::login($user, true);
        return redirect()->route('user.dashboard');
    }
}
