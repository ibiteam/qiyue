<?php

namespace Qiyue\Interface\Rsa;

interface RsaInterface
{
    public function initKey(?string $public_key, ?string $private_key);

    public function getCombinePublicKey(?string $public_key);

    public function getCombinePrivateKey(?string $private_key);

    /**
     * 私钥加密
     */
    public function encode(string $content);

    /**
     * 公钥解密
     */
    public function decode(string $content);

    /**
     * 私钥解密
     *
     * @param  mixed  $encrypt_data
     */
    public function superLongPrivateKeyDecrypt($encrypt_data);
}
