<?php

namespace App\Http\Controllers\ThirdPartyAuth;

use App\Actions\ThirdPartyAuth\AuthStrategies\FacebookStrategy;
use App\Actions\ThirdPartyAuth\AuthStrategies\WebStrategy;
use App\Actions\ThirdPartyAuth\ThirdPartyAuthContext;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ThirdPartyAuthenticationController extends Controller
{
    private $drivers = [
        'facebook',
        'google'
    ];

    public function redirect($driver)
    {
        if (in_array($driver, $this->drivers))
            return Socialite::driver($driver)->redirect();
        else
            throw new NotFoundHttpException();
    }

    public function handle($driver)
    {
        $context = new ThirdPartyAuthContext(new WebStrategy());

        if (in_array($driver, $this->drivers))
            return $context->executeStrategy($driver);
        else
            throw new NotFoundHttpException();
    }
}
