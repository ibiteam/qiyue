<?php

namespace Qiyue\Trait\Rsa;

trait RsaEncryptMethodTrait
{
    public ?string $public_key = '';

    public ?string $private_key = '';

    public function encode(string $content)
    {
        if (! $content) {
            return '';
        }
        $result = '';
        $data = str_split($content, 117);
        foreach ($data as $block) {
            openssl_private_encrypt($block, $dataEncrypt, $this->private_key, OPENSSL_PKCS1_PADDING);
            $result .= $dataEncrypt;
        }

        return base64_encode($result);
    }

    public function decode(string $content)
    {
        if (! $content) {
            return '';
        }
        $result = '';
        $data = str_split(base64_decode($content), 128);
        foreach ($data as $block) {
            openssl_public_decrypt($block, $dataDecrypt, $this->public_key, OPENSSL_PKCS1_PADDING);
            $result .= $dataDecrypt;
        }

        return $result ?: false;
    }

    public function superLongPrivateKeyDecrypt($encrypt_data): string
    {
        $private_key = openssl_get_privatekey($this->private_key);
        $decrypt_data = '';
        foreach (str_split(base64_decode(urldecode($encrypt_data)), 128) as $chunk) {
            openssl_private_decrypt($chunk, $decrypt_item, $private_key);
            $decrypt_data .= $decrypt_item;
        }

        return $decrypt_data;
    }
}
