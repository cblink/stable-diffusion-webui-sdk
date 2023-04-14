<?php

namespace Cblink\StableDiffusionWebuiSdk;

use Cblink\Service\Foundation\Container;
use Hyperf\Utils\Collection;

/**
 * @property-read Collection $config
 * @property-read \GuzzleHttp\Client $client
 *
 * @property-read Api\Client $api     api
 * @property-read Option\Client $option     选项修改会是永久的
 */
class StableDiffusionWebuiApp extends Container
{
    protected array $providers = [
        Kernel\ServiceProvider::class,
        Api\ServiceProvider::class,
        Option\ServiceProvider::class,
    ];
}