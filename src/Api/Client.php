<?php

namespace Cblink\StableDiffusionWebuiSdk\Api;


class Client extends \Cblink\Service\Foundation\BaseApi
{
    /**
     * 模型列表
     *
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modelList()
    {
        return $this->httpGet('/sdapi/v1/sd-models');
    }

    /**
     * 文生图
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function txtToImage(array $data = [])
    {
        return $this->httpPost('/sdapi/v1/txt2img', $data, ['timeout' => 1000.0]);
    }

    /**
     * 图生图
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function imageToImage(array $data = [])
    {
        return $this->httpPost('/sdapi/v1/img2img', $data);
    }

}