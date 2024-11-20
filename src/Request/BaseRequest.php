<?php

namespace Qiyue\Request;

use GuzzleHttp\Client as GuzzleHttpClient;
use Qiyue\Interface\Http\HttpRequestClientInterface;
use Qiyue\Interface\Http\HttpRequestHeaderInterface;
use Qiyue\Interface\Http\HttpRequestMethodInterface;
use Qiyue\Interface\Http\HttpResponseHandleInterface;
use Qiyue\Trait\Http\HttpRequestClientTrait;
use Qiyue\Trait\Http\HttpRequestHeaderTrait;
use Qiyue\Trait\Http\HttpRequestMethodTrait;
use Qiyue\Trait\Http\HttpResponseHandleTrait;

abstract class BaseRequest implements HttpRequestClientInterface, HttpRequestHeaderInterface, HttpRequestMethodInterface, HttpResponseHandleInterface
{
    use HttpRequestClientTrait;
    use HttpRequestHeaderTrait;
    use HttpRequestMethodTrait;
    use HttpResponseHandleTrait;
    
    public function __construct($options = [])
    {
        if ($options) {
            $this->setOptions($options);
        }
    }
}
