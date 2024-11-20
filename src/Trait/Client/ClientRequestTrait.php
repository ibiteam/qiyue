<?php

namespace Qiyue\Trait\Client;

use Qiyue\Request\Request;

trait ClientRequestTrait
{
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
