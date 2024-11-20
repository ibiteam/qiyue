<?php

namespace Qiyue\Trait\Client;

use Qiyue\Request\Request;
use Qiyue\Request\BaseRequest;

trait ClientRequestTrait
{
    public ?BaseRequest $request = null;
    public string $url = ''; //主请求url 各继承子类如有多个url请在子类内自定义
    public ?array $request_options = [];

    public function setRequestUrl(?string $url = '')
    {
        if ($url) {
            $this->url = $url;
        }
    }

    public function getRequestUrl()
    {
        return $this->url;
    }

    public function createRequest()
    {
        if (! $this->request) {
            $this->request = new Request($this->getRequestOption()); //加载网络请求类
        }
    }

    public function getRequest()
    {
        if (! $this->request) {
            $this->createRequest();
        }

        return $this->request;
    }

    public function setRequestOption(?array $request_options)
    {
        if ($request_options) {
            $this->request_options = array_merge($this->request_options, $request_options);
        }
    }

    public function getRequestOption()
    {
        return $this->request_options;
    }
}
