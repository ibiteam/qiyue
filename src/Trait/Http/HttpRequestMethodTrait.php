<?php

namespace Qiyue\Trait\Http;

use Psr\Http\Message\ResponseInterface;

trait HttpRequestMethodTrait
{
    public function doGet($url, $query = [], $header = [])
    {
        return $this->handleResponse($this->getClient()->request('get', $url, [
            'headers' => $header,
            'query' => $query,
        ]));
    }

    public function doFormPost($url, $params = [], $header = [])
    {
        return $this->handleResponse($this->getClient()->request('post', $url, [
            'headers' => $header,
            'form_params' => $params,
        ]));
    }

    public function doMutipartPost($url, $params = [], $header = [])
    {
        return $this->handleResponse($this->getClient()->request('post', $url, [
            'headers' => $header,
            'multipart' => $params,
        ]));
    }

    public function doJsonPost($url, $params = [], $header = [])
    {
        return $this->handleResponse($this->getClient()->request('post', $url, [
            'headers' => $header,
            'json' => $params,
        ]));
    }

    public function handleResponse(ResponseInterface $response)
    {
        if ((int) $response->getStatusCode() == 200) {
            $res = $response->getBody();

            if ($res) {
                $data = json_decode(html_entity_decode($res), true);

                return $data ?? [];
            }
        }

        return [];
    }
}
