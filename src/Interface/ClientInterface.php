<?php

namespace Qiyue\Interface;

use Qiyue\Assert\BaseAssert;

interface ClientInterface
{
    public function init();

    public function getClassName();

    public function exception(string $message);

    public function doRequest(mixed $params = [], string $class_name = BaseAssert::class, string $check_code = 'code', int|string $success_value = 200, string $msg_code = 'message', string $data_key = 'data'); //发起网络请求
}
