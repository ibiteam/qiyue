<?php

namespace Qiyue\Interface\Client;

interface ClientInterface
{
    public function init();

    public function getClassName();

    public function exception(string $message);

    public function autoloadAssert();

    public function doRequest(mixed $params = []); //发起网络请求
}
