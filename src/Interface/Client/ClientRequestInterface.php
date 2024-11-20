<?php

namespace Qiyue\Interface\Client;

interface ClientRequestInterface
{
    protected function setRequestUrl(?string $url = '');

    protected function getRequestUrl();

    protected function createRequest();

    protected function getRequest();

    protected function setRequestOption(?array $request_options);

    protected function getRequestOption();
}
