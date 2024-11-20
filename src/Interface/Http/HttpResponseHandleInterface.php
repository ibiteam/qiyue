<?php

namespace Qiyue\Interface\Http;

use Psr\Http\Message\ResponseInterface;

interface HttpResponseHandleInterface
{
    public function handleResponse(ResponseInterface $response);
}
