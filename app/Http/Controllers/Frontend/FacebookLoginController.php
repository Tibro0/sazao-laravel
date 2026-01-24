<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;

class FacebookLoginController extends Controller
{
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $existingUser = User::where('email', $facebookUser->email)->first();

        if ($existingUser) {
            $existingUser->update([
                'google_id' => $facebookUser->id,
                'google_token' => $facebookUser->token,
                'google_refresh_token' => $facebookUser->refreshToken,
            ]);

            $user = $existingUser;
        } else {
            $user = User::create([
                'email' => $facebookUser->email,
                'image' => $facebookUser->avatar,
                'name' => $facebookUser->name,
                'username' => Str::snake($facebookUser->user['family_name']),
                'google_id' => $facebookUser->id,
                'google_token' => $facebookUser->token,
                'google_refresh_token' => $facebookUser->refreshToken,
            ]);
        }

        Auth::login($user, true);
        return redirect()->route('user.dashboard');
    }
}
