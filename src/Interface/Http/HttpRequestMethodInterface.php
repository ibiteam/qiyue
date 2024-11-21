<?php

namespace Qiyue\Interface\Http;

interface HttpRequestMethodInterface
{
    public function doFormPost($url, $params = []);

    public function doMutipartPost($url, $params = []);

    public function doJsonPost($url, $params = []);

    public function doGet($url, $query = []);
}
