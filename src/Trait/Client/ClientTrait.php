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

    public function autoloadAssert()
    {
        $assert_name = BaseAssert::class;
        $arrayClientName = explode('\\', $this->getClassName());
        $clientName = str_replace('Client', '', end($arrayClientName));

        if (class_exists('Qiyue\\Assert\\'.$clientName.'Assert')) {
            $assert_name = 'Qiyue\\Assert\\'.$clientName.'Assert';
        }

        return $assert_name;
    }

    public function doRequest(mixed $params = [])
    {
        return (new ($this->autoloadAssert()))->assertSuccessfully($this->request->doFormPost($this->getRequestUrl(), $params));
    }
}
