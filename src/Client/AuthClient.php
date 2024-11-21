<?php

namespace Qiyue\Client;

use Qiyue\Trait\Client\AuthClientConfigTrait;
use Qiyue\Trait\Client\AuthClientMethodTrait;

class AuthClient extends BaseClient
{
    use AuthClientConfigTrait;
    use AuthClientMethodTrait;

    public function __construct(?array $config = [], ?array $request_options = [])
    {
        parent::__construct($config, $request_options);
    }
}
