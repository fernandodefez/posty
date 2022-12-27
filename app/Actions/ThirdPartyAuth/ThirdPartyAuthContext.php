<?php

namespace  App\Actions\ThirdPartyAuth;

class ThirdPartyAuthContext
{
    private Strategy $strategy;

    /**
     * Usually, the Context accepts a strategy through the constructor, but also
     * provides a setter to change it at runtime.
     */
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Usually, the Context allows replacing a Strategy object at runtime.
     * @param Strategy $strategy
    */
    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * The Context delegates some work to the Strategy object instead of
     * implementing multiple versions of the algorithm on its own.
     */
    public function executeStrategy(String $driver)
    {
        return $this->strategy->execute($driver);
    }
}
