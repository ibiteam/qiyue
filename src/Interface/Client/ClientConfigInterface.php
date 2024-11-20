<?php

namespace Qiyue\Interface\Client;

interface ClientConfigInterface
{
    public function setConfig(?array $config = []);

    public function getConfig();
}
