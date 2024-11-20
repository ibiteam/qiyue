<?php

return [
    'default_client' => 'auth',
    'clients' => [
        'auth' => [ //授权配置
            'url' => 'http://example.com/auth_url', //必填 主请求地址
            'app_id' => 0, //企悦应用id 非必填 如果不填或者为0 则使用明文请求 否则使用加密请求
            'public_key' => 'xxxxxxxxxx', //企悦应用(app_id)的public_key 非必填 如果app_id非0 则此字段必填
            'private_key' => 'xxxxxxxxxx', //企悦应用(app_id)的private_key 非必填 如果app_id非0 则此字段必填
        ],
    ],
];
