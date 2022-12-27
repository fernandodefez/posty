<?php

namespace App\Actions\ThirdPartyAuth\AuthStrategies;

use App\Actions\ThirdPartyAuth\Strategy;

class APISrategy implements Strategy
{
    public function execute(String $driver): void
    {
        echo 'Hola con api';
    }
}
