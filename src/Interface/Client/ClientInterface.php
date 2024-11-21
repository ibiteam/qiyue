<?php

namespace Qiyue\Interface\Client;

use Qiyue\Assert\BaseAssert;

interface ClientInterface
{
    public function init();

    public function getClassName();

    public function exception(string $message);

    public function doRequest(mixed $params = [], string $class_name = BaseAssert::class); //发起网络请求
}
