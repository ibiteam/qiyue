<?php

namespace Qiyue\Trait\Http;

trait HttpRequestHeaderTrait
{
    protected ?array $header = [];

    public function setHeader(?array $header)
    {
        if ($header && is_array($header)) {
            $this->header = array_merge($this->header, $header);
        }
    }

    public function getHeader()
    {
        return $this->header;
    }
}
