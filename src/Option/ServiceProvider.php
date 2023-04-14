<?php

namespace Cblink\StableDiffusionWebuiSdk\Option;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['option'] = function($pimple){
            return new Client($pimple);
        };
    }
}