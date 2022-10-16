<?php

namespace App\Http\Controllers\ThirdPartyAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthenticationController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handle()
    {
        $loggedUserData = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            [
                'email' => $loggedUserData->getEmail(),
            ],
            [
                'name' => $loggedUserData->getName(),
                'avatar' => $loggedUserData->getAvatar(),
                'username' => Str::lower(Str::replace(' ', '', $loggedUserData->getName())),
                'password' => '',
                'provider' => 'google',
                'provider_id' => $loggedUserData->getId()
            ]
        );

        auth()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
