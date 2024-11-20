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

abstract class BaseRequest implements HttpRequestClientInterface, HttpRequestHeaderInterface, HttpRequestMethodInterface, HttpResponseHandleInterface
{
    use HttpRequestClientTrait;
    use HttpRequestHeaderTrait;
    use HttpRequestMethodTrait;

    protected ?array $header = [];

    public ?GuzzleHttpClient $client = null;

    public ?array $options = [];

    public function __construct($options = [])
    {
        if ($options) {
            $this->setOptions($options);
        }
    }
}
