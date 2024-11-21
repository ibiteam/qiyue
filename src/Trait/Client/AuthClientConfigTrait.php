<?php

namespace Qiyue\Trait\Client;

use Qiyue\Rsa\AuthRsa;
use Qiyue\Rsa\BaseRsa;

trait AuthClientConfigTrait
{
    protected int|string $app_id;

    protected string $auth_url;

    protected string $public_key;

    protected string $private_key;

    public ?BaseRsa $rsa = null;

    //初始化
    public function init()
    {
        $this->app_id = $this->getConfig()['app_id'] ?? 0;
        if (! empty($this->app_id)) {
            if (empty($this->getConfig()['public_key'])) {
                $this->exception('初始化授权类失败,缺少配置public_key');
            }
            $this->public_key = $this->getConfig()['public_key'] ?? '';
            if (empty($this->getConfig()['private_key'])) {
                $this->exception('初始化授权类失败,缺少配置private_key');
            }
            $this->private_key = $this->getConfig()['private_key'] ?? '';
            if (! $this->rsa) {
                $this->rsa = new AuthRsa($this->public_key, $this->private_key);
            }
        } else {
            $this->public_key = '';
            $this->private_key = '';
        }
    }
}
