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
        //增加默认头部填充
        if (! $this->header) {
            $this->setHeader(['Content-type' => 'application/x-www-form-urlencoded']);
        }

        return $this->header;
    }
}
