<?php

namespace Qiyue\Trait\Client;

use Qiyue\Assert\BaseAssert;

trait ClientTrait
{
    public function init()
    {
        /**
         * 基类初始化方法空实现
         * 子类如有特殊逻辑 请在子类中重载
         */
    }

    public function getClassName()
    {
        return get_called_class();
    }

    public function exception(string $message)
    {
        throw new \Exception($message);
    }

    public function doRequest(mixed $params = [], string $assert_name = BaseAssert::class, string $check_code = 'code', int|string $success_value = 200, string $msg_code = 'message', string $data_key = 'data')
    {
        return (new $assert_name)->assertSuccessfully($this->request->doFormPost($this->getRequestUrl(), $params, []), $check_code, $success_value, $msg_code, $data_key);
    }
}
