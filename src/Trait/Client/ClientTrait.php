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

    public function doRequest(mixed $params = [], string $assert_name = BaseAssert::class)
    {
        $this->request->setHeader([
            'Content-type' => 'application/x-www-form-urlencoded',
        ]);

        return (new $assert_name)->assertSuccessfully($this->request->doFormPost($this->getRequestUrl(), $params));
    }
}
