<?php

namespace Qiyue\Interface\Client;

interface ClientConfigInterface
{
    protected function setConfig(?array $config = []);

    protected function getConfig();
}
