<?php

namespace Qiyue\Trait\Http;

trait HttpRequestHeaderTrait
{
    public function setHeader(?array $header)
    {
        if ($header && is_array($header)) {
            $this->headers = array_merge($this->header, $header);
        }
    }

    public function getHeader()
    {
        return $this->header;
    }
}
