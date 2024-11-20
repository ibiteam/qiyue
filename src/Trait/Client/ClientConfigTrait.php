<?php

namespace Qiyue\Trait\Client;

trait ClientConfigTrait
{
    public ?array $config = [];
    public function setConfig(?array $config = [])
    {
        if ($config) {
            $this->config = array_merge($this->config, $config); //加载配置
        }
    }

    public function getConfig()
    {
        return $this->config;
    }
}
