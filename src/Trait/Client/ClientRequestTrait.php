<?php

namespace Qiyue\Trait\Client;

use Qiyue\Request\Request;

trait ClientRequestTrait
{
    protected function setRequestUrl(?string $url = '')
    {
        if ($url) {
            $this->url = $url;
        }
    }

    protected function getRequestUrl()
    {
        return $this->url;
    }

    protected function createRequest()
    {
        if (! $this->request) {
            $this->request = new Request($this->getRequestOption()); //加载网络请求类
        }
    }

    protected function getRequest()
    {
        if (! $this->request) {
            $this->createRequest();
        }

        return $this->request;
    }

    protected function setRequestOption(?array $request_options)
    {
        if ($request_options) {
            $this->request_options = array_merge($this->request_options, $request_options);
        }
    }

    protected function getRequestOption()
    {
        return $this->request_options;
    }
}
