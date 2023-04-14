<?php

namespace Cblink\StableDiffusionWebuiSdk\Api;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['api'] = function($pimple){
            return new Client($pimple);
        };
    }
}