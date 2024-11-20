<?php

namespace Qiyue\Trait\Http;

use Psr\Http\Message\ResponseInterface;

trait HttpResponseHandleTrait
{
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
