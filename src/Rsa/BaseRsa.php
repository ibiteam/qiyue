<?php

namespace Qiyue\Rsa;

use Qiyue\Interface\Rsa\RsaInterface;
use Qiyue\Trait\Rsa\RsaCombineMethodTrait;
use Qiyue\Trait\Rsa\RsaEncryptMethodTrait;

abstract class BaseRsa implements RsaInterface
{
    use RsaCombineMethodTrait;
    use RsaEncryptMethodTrait;

    public ?string $public_key = '';

    public ?string $private_key = '';

    public function __construct(?string $public_key, ?string $private_key)
    {
        $this->initKey($public_key, $private_key);
    }

    public function initKey(?string $public_key, ?string $private_key)
    {
        if (! $this->public_key || ! $this->private_key) {
            $this->public_key = $this->getCombinePublicKey($public_key);
            $this->private_key = $this->getCombinePrivateKey($private_key);
        }
    }
}
