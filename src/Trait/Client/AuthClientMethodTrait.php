<?php

namespace Qiyue\Trait\Client;

use Qiyue\Assert\AuthAssert;

trait AuthClientMethodTrait
{
    /**
     * 企悦应用授权获取用户信息
     *
     * @param  mixed  $code
     * @return mixed
     */
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

        return $this->doRequest($params, AuthAssert::class);
    }
}
