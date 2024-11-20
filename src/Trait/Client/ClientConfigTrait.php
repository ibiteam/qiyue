<?php

namespace Qiyue\Trait\Client;

trait ClientConfigTrait
{
    protected function setConfig(?array $config = [])
    {
        if ($config) {
            $this->config = array_merge($this->config, $config); //加载配置
        }
    }

    protected function getConfig()
    {
        return $this->config;
    }
}
