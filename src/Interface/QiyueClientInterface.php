<?php

namespace Qiyue\Interface;

use Qiyue\Assert\BaseAssert;

interface QiyueClientInterface
{
    public function init();

    public function getClassName();

    public function exception(string $message);

    public function doRequest(mixed $params = [], string $class_name = BaseAssert::class); //发起网络请求
}
