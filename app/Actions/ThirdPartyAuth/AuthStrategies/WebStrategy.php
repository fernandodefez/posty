<?php

namespace App\Actions\ThirdPartyAuth\AuthStrategies;

use App\Actions\ThirdPartyAuth\Strategy;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class WebStrategy implements Strategy
{
    public function execute(String $driver)
    {
        $account = Socialite::driver($driver)->user();

        $user = User::updateOrCreate(
            [
                'email' => $account->getEmail()
            ],
            [
                'name' => $account->getName(),
                'avatar' => $account->getAvatar(),
                'username' => Str::lower(Str::replace(' ', '', $account->getName())),
                'password' => '',
                'email_verified_at' => now(),
                'provider' => $driver,
                'provider_id' => $account->getId()
            ]
        );

        auth()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
