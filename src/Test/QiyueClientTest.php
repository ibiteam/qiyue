<?php

namespace Qiyue\Test;

use Illuminate\Contracts\Console\Kernel;
use Qiyue\QiyueClient;

beforeEach(function () {
    //加载框架配置
    $app = require dirname(dirname(__DIR__)).'/bootstrap/app.php';
    $app->make(Kernel::class)->bootstrap();
});

it('test application auth', function () {
    // example 1 Laravel依赖注入调用
    //$client = new QiyueClient;

    // example 2 配置设定 - 明文调用
    // $config = [
    //     'url' => 'http://example.com/auth_url', //请求地址 必填 
    //     'type' => 'auth', //调用类型 auth授权 必填 目前实现了 企悦应用授权类[关键字 auth]
    // ];
    // $client = new QiyueClient($config);

    //example 3 配置设定 - 加密调用
    $config = [
        'url' => 'http://example.com/auth_url', //请求地址 必填 
        'app_id' => 79, //企悦应用id 非必填 如果应用id为0 则为明文调用
        'public_key' => '', //企悦应用(app_id)的public_key 非必填 如果app_id非0 此配置必填
        'private_key' => '', //企悦应用(app_id)的private_key 非必填 如果app_id非0 此配置必填
        'type' => 'auth', //调用类型 auth授权 必填 目前实现了 企悦应用授权类[关键字 auth]
    ];
    $client = new QiyueClient($config);

    $code = 'cccccc13205f2d9af928a61e715026ed';
    $data = $client->doRequest('auth', $code); //授权调用
    $response = $client->doRequest('auth', $code);
    expect($response['code'])->toBe(0);
});
