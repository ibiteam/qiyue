<?php

namespace Qiyue\Interface\Client;

interface ClientRequestInterface
{
    public function setRequestUrl(?string $url = '');

    public function getRequestUrl();

    public function createRequest();

    public function getRequest();

    public function setRequestOption(?array $request_options);

    public function getRequestOption();
}
