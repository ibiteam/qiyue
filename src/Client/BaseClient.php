<?php

namespace Qiyue\Client;

use Qiyue\Interface\Client\ClientConfigInterface;
use Qiyue\Interface\Client\ClientInterface;
use Qiyue\Interface\Client\ClientRequestInterface;
use Qiyue\Trait\Client\ClientConfigTrait;
use Qiyue\Trait\Client\ClientRequestTrait;
use Qiyue\Trait\Client\ClientTrait;

abstract class BaseClient implements ClientConfigInterface, ClientInterface, ClientRequestInterface
{
    use ClientConfigTrait;
    use ClientRequestTrait;
    use ClientTrait;
    
    public function __construct(?array $config = [], ?array $request_options = [])
    {
        $this->setConfig($config);
        $this->setRequestOption($request_options);
        $this->request = $this->getRequest();
        $this->setRequestUrl($this->config['url']);
        $this->init(); //初始化
    }
}
