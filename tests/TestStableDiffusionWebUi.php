<?php

use PHPUnit\Framework\TestCase;

class TestStableDiffusionWebUi extends TestCase
{
    protected $app;

    protected function setUp(): void
    {
        parent::setUp();

        $app = $this->app = new \Cblink\StableDiffusionWebuiSdk\StableDiffusionWebuiApp([
            'base_url' => 'http://127.0.0.1',
            'username' => 'username',
            'password' => 'password'
        ]);
    }

    /**
     * 模型列表
     *
     * @return void
     */
    public function testApiModelList()
    {
        $response = $this->app->api->modelList();

        var_dump($response);
    }

    /**
     * 配置选项
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testApiSetOption()
    {
        // sd_model_checkpoint 标识模型 修改使用 title 返回 null

        $response = $this->app->option->save(['sd_model_checkpoint' => 'v1-5-pruned-emaonly.safetensors [6ce0161689]']);

        var_dump($response);
    }

    // 文生图
    public function testApiTxtToImage()
    {
        $response = $this->app->api->txtToImage([
            'prompt'=> '1girl',
            'negative_prompt' => 'unhealthy',
            'steps'=> 30,   // 迭代部署一般设置 30 以上
            'seed' => -1,// 随机种子默认就是-1
            'sampler_name' => 'Euler a',    //采样器名称
            'cfg_scale' => '7', //  提示词相关性
            'width' => '512',   // 宽
            'height' => '512',  // 高
            'restore_faces' => false,     // 面部修复 false:关 true:开
            'tiling' => false,    // 平铺,
            'script_name' => null, // 脚本名称
            'batch_size' => 2,  // 生成批次
            'n_iter' => 1, //   批次数量
        ]);

        var_dump($response);

    }

    /**
     * 图生图
     *
     * @return void
     */
    public function testApiImageToImage()
    {
        $file = __DIR__ . '/test.png';

        $imgfo = fopen($file, 'rb', 0);
        $filesize = filesize($file);
        $content = fread($imgfo, $filesize);
        $file_content = chunk_split(base64_encode($content)); // base64编码
        $base64Img = sprintf('data:image/png;base64,%s', $file_content);

        $response = $this->app->api->txtToImage([
            'prompt'=> '1girl',
            'steps'=> 20,
            'init_images' => [$base64Img],
            'denoising_strength' => '0.7',  // 重绘
            'seed' => -1,// 随机种子默认就是-1
            'sampler_name' => 'Euler a',    //采样器名称
            'cfg_scale' => '7', //  提示词相关性
            'width' => '512',   // 宽
            'height' => '512',  // 高
            'restore_faces' => 'false',     // 面部修复 false:关 true:开
            'tiling' => 'false',    // 平铺,
            'script_name' => null, // 脚本名称
            'batch_size' => 3,  // 生成批次
            'n_iter' => 1, //   批次数量
        ]);
        var_dump($response);
    }


}