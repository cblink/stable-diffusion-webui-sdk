<?php

namespace Cblink\StableDiffusionWebuiSdk\Option;


class Client extends \Cblink\Service\Foundation\BaseApi
{
    /**
     * 选项列表
     *
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list()
    {
        return $this->httpGet('/sdapi/v1/options');
    }

    /**
     * 更新选项
     * sd_model_checkpoint 模型 value=title(列表中的title)
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function save(array $data = [])
    {
        return $this->httpPost('/sdapi/v1/options', $data);
    }

    /**
     * 采样器列表
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSamplers(array $data= [])
    {
        return $this->httpGet('/sdapi/v1/samplers', $data);
    }

}