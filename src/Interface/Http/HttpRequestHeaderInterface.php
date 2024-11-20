<?php

namespace Qiyue\Interface\Http;

interface HttpRequestHeaderInterface
{
    public function setHeader(?array $header);

    public function getHeader();
}
