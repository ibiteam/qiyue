<?php

namespace Qiyue\Rsa;

use Qiyue\Interface\Rsa\RsaInterface;
use Qiyue\Trait\Rsa\RsaCombineMethodTrait;
use Qiyue\Trait\Rsa\RsaEncryptMethodTrait;

abstract class BaseRsa implements RsaInterface
{
    use RsaCombineMethodTrait;
    use RsaEncryptMethodTrait;

    public function __construct(?string $public_key, ?string $private_key)
    {
        $this->initKey($public_key, $private_key);
    }
}
