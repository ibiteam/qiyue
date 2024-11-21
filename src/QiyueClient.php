<?php

namespace Qiyue;

use Qiyue\Client\BaseClient;

class QiyueClient
{
    public ?BaseClient $client = null;

    public function __construct(string|array $client_key = '', ?array $request_options = [])
    {
        if (is_string($client_key)) {
            $config = config('qiyue');
            if ($client_key) {
                $client_key = strtolower($client_key);
            } else {
                $default_client = strtolower($config['default_client']);
                $client_key = $default_client;
            }
            if (($client_key && ! isset($config['clients'][$client_key])) || ! $client_key) {
                throw new \Exception('初始化企悦客户端失败，参数client_key缺失');
            }
            $config = $config['clients'][$client_key];
            $client_key = ucfirst($client_key);
        } else {
            $string_client_key = $client_key['type'] ?? '';
            if (! $string_client_key) {
                throw new \Exception('初始化企悦客户端失败，调用类型缺失');
            }
            unset($client_key['type']);
            $config = $client_key;
            $client_key = ucfirst(strtolower($string_client_key));
        }

        $clientName = __NAMESPACE__."\\Client\\{$client_key}Client";
        $this->client = new $clientName($config, $request_options);
    }

    public function doRequest()
    {
        $arguments = func_get_args(); //获取所有参数
        $function_name = $arguments[0] ?? '';
        if(!$function_name){
            return [
                'code' => 1,
                'message' => 'The Request Api Name Is Required.',
                'data' => [],
            ];
        }
        unset($arguments[0]);
        $arguments = array_values($arguments);
        if (method_exists($this->client->getClassName(), $function_name)) {
            if ($arguments) {
                return $this->client->$function_name(...$arguments);
            }

            return $this->client->$function_name();
        }

        return [
            'code' => 1,
            'message' => $function_name.' is not exists,please concat the api:'.$function_name.'\'s developers.',
            'data' => [],
        ];
    }
}
