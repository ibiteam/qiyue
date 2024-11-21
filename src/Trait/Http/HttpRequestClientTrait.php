<?php

namespace Qiyue\Trait\Http;

use GuzzleHttp\Client as GuzzleHttpClient;

trait HttpRequestClientTrait
{
    public ?array $options = [];

    public ?GuzzleHttpClient $client = null;

    public function setOptions(?array $options = [])
    {
        if ($options) {
            $this->options = array_merge($this->options, $options);
        }
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getClient()
    {
        return $this->client ?: $this->createClient();
    }

    public function createClient()
    {
        if (! $this->client) {
            $options = $this->getOptions();
            $this->client = new GuzzleHttpClient($options);
        }

        return $this->client;
    }
}
