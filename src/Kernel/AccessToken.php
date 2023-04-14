<?php

namespace Cblink\StableDiffusionWebuiSdk\Kernel;

class AccessToken extends \Cblink\Service\Foundation\AccessToken
{
    protected string $authType = 'Basic';

    public function getToken()
    {
        return base64_encode(sprintf('%s:%s',$this->app->config['username'], $this->app->config['password']));
    }

    public function getBaseUrl()
    {
        return $this->app->config['idaas_url'];
    }
}