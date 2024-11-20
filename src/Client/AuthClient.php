<?php

namespace Qiyue\Client;

use Qiyue\Assert\AuthAssert;
use Qiyue\Rsa\AuthRsa;

class AuthClient extends BaseClient
{
    protected int|string $app_id;

    protected string $auth_url;

    protected string $public_key;

    protected string $private_key;

    public ?AuthRsa $rsa = null;

    public function __construct(?array $config = [], ?array $request_options = [])
    {
        parent::__construct($config, $request_options);
    }

    //初始化
    public function init()
    {
        $this->app_id = $this->config['app_id'] ?? 0;
        if (! empty($this->app_id)) {
            if (empty($this->config['public_key'])) {
                $this->exception('初始化授权类失败,缺少配置public_key');
            }
            $this->public_key = $this->config['public_key'];
            if (empty($this->config['private_key'])) {
                $this->exception('初始化授权类失败,缺少配置private_key');
            }
            $this->private_key = $this->config['private_key'];
            if (! $this->rsa) {
                $this->rsa = new AuthRsa($this->public_key, $this->private_key);
            }
        } else {
            $this->public_key = '';
            $this->private_key = '';
        }
    }

    public function auth(?string $code = null)
    {
        if (! isset($code)) {
            $this->exception('参数code缺失');
        }
        $params = [];
        if ($this->app_id) {
            $params['app_id'] = $this->app_id;
            $encode = $this->rsa->encode(json_encode($code, JSON_UNESCAPED_UNICODE));
            $params['code'] = $encode;
        } else {
            $params['code'] = $code;
        }

        return $this->doRequest($params, AuthAssert::class, 'code', 200, 'msg', 'data');
    }
}
