<?php

namespace Qiyue\Interface\Http;

interface HttpRequestMethodInterface
{
    public function doFormPost($url, $params = [], $header = []);

    public function doMutipartPost($url, $params = [], $header = []);

    public function doJsonPost($url, $params = [], $header = []);

    public function doGet($url, $query = [], $header = []);
}
