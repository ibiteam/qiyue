<?php

namespace Qiyue\Interface\Http;

interface HttpRequestClientInterface
{
    public function setOptions(?array $options = []);

    public function getOptions();

    public function createClient();

    public function getClient();
}
