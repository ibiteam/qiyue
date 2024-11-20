<?php

namespace Qiyue\Client;

use Qiyue\Assert\BaseAssert;
use Qiyue\Interface\QiyueClientInterface;
use Qiyue\Request\Request;

abstract class BaseClient implements QiyueClientInterface
{
    public ?Request $request = null;

    public ?array $config = [];

    public string $url = ''; //主请求url 各继承子类如有多个url请在子类内自定义

    public ?array $request_options = [];

    public function __construct(?array $config = [], ?array $request_options = [])
    {
        if ($config ?? false) {
            $this->config = $config; //加载配置
        }
        if (! $this->request) {
            if ($request_options ?? false) {
                $this->request_options = $request_options;
            }
            $this->request = new Request($this->request_options); //加载网络请求类
        }
        $this->url = $this->config['url'] ?? '';
        $this->init(); //初始化
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
        return (new $assert_name)->assertSuccessfully($this->request->doFormPost($this->url, $params, []), $check_code, $success_value, $msg_code, $data_key);
    }
}
