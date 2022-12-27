<?php

namespace  App\Actions\ThirdPartyAuth;

interface Strategy
{
    public function execute(String $driver);
}
