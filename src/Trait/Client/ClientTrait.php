<?php

namespace Qiyue\Trait\Client;

use Qiyue\Assert\BaseAssert;
use Qiyue\Request\BaseRequest;

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

    public function doRequest(mixed $params = [], string $method_type = 'post', string $assert_name = '')
    {
        $method_name = '';
        $request_is_set_header = true;
        if (! $this->request->getHeader()) {
            $request_is_set_header = false; //请求类未设置头部
        }
        switch ($method_type) {
            case BaseRequest::METHOD_GET:
                $method_name = 'doGet';
                break;
            case BaseRequest::METHOD_MUTI:
                //由于Client问题 此种请求类型设置头部会导致请求不通
                $method_name = 'doMutipartPost';
                break;
            case BaseRequest::METHOD_JSON:
                if (! $request_is_set_header) {
                    $this->setHeader(['Content-type' => 'application/json']);
                }

                $method_name = 'doJsonPost';
                break;
            default:
                if (! $request_is_set_header) {
                    $this->setHeader(['Content-type' => 'application/x-www-form-urlencoded']);
                }
                $method_name = 'doFormPost';
        }
        //如果请求未设置头部

        if (! $assert_name) {
            return (new ($this->autoloadAssert()))->assertSuccessfully($this->request->$method_name($this->getRequestUrl(), $params));
        }

        return (new $assert_name)->assertSuccessfully($this->request->$method_name($this->getRequestUrl(), $params));
    }
}
