<?php

namespace Qiyue\Trait\Rsa;

trait RsaCombineMethodTrait
{
    public function initKey(?string $public_key, ?string $private_key)
    {
        if (! $this->public_key || ! $this->private_key) {
            $this->public_key = $this->getCombinePublicKey($public_key);
            $this->private_key = $this->getCombinePrivateKey($private_key);
        }
    }

    public function getCombinePublicKey(?string $public_key)
    {
        return $public_key ? "-----BEGIN PUBLIC KEY-----\n".wordwrap($public_key, 64, "\n", true)."\n-----END PUBLIC KEY-----" : '';
    }

    public function getCombinePrivateKey(?string $private_key)
    {

        return $private_key ? "-----BEGIN RSA PRIVATE KEY-----\n".wordwrap($private_key, 64, "\n", true)."\n-----END RSA PRIVATE KEY-----" : '';
    }
}
