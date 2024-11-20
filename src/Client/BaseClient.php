<?php

namespace Qiyue\Client;

use Qiyue\Interface\Client\ClientConfigInterface;
use Qiyue\Interface\Client\ClientInterface;
use Qiyue\Interface\Client\ClientRequestInterface;
use Qiyue\Request\BaseRequest;
use Qiyue\Trait\Client\ClientConfigTrait;
use Qiyue\Trait\Client\ClientRequestTrait;
use Qiyue\Trait\Client\ClientTrait;

abstract class BaseClient implements ClientConfigInterface, ClientInterface, ClientRequestInterface
{
    use ClientConfigTrait;
    use ClientRequestTrait;
    use ClientTrait;

    public ?BaseRequest $request = null;

    public ?array $config = [];

    public string $url = ''; //主请求url 各继承子类如有多个url请在子类内自定义

    public ?array $request_options = [];

    public function __construct(?array $config = [], ?array $request_options = [])
    {
        $this->setConfig($config);
        $this->setRequestOption($request_options);
        $this->request = $this->getRequest();
        $this->setRequestUrl($this->config['url']);
        $this->init(); //初始化
    }
}
