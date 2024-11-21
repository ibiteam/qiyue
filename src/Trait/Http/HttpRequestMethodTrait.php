<?php

namespace Qiyue\Trait\Http;

trait HttpRequestMethodTrait
{
    public function doGet($url, $query = [])
    {
        return $this->handleResponse($this->getClient()->request('get', $url, [
            'headers' => $this->getHeader(),
            'query' => $query,
        ]));
    }

    public function doFormPost($url, $params = [])
    {
        return $this->handleResponse($this->getClient()->request('post', $url, [
            'headers' => $this->getHeader(),
            'form_params' => $params,
        ]));
    }

    public function doMutipartPost($url, $params = [])
    {
        return $this->handleResponse($this->getClient()->request('post', $url, [
            'headers' => $this->getHeader(),
            'multipart' => $params,
        ]));
    }

    public function doJsonPost($url, $params = [])
    {
        return $this->handleResponse($this->getClient()->request('post', $url, [
            'headers' => $this->getHeader(),
            'json' => $params,
        ]));
    }
}
