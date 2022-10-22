<?php

namespace App\Http\Controllers\ThirdPartyAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GoogleAuthenticationController extends Controller
{
    public function redirect($driver)
    {
        if ($driver == 'facebook' || $driver == 'google')
            return Socialite::driver($driver)->redirect();
        else
            throw new NotFoundHttpException();
    }

    public function handle($driver)
    {
        if ($driver === 'facebook' || $driver === 'google') {

            $account = Socialite::driver($driver)->user();

            $user = User::firstOrCreate(
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
        throw new NotFoundHttpException();
    }
}
