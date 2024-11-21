<?php

namespace Qiyue\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Qiyue\QiyueClient;

class QiyueClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(QiyueClient::class, function ($app) {
            $client_key = config('qiyue')['default_client'] ?? '';

            return new QiyueClient($client_key);
        });
    }

    public function boot()
    {
        // 发布配置文件
        $this->publishes([
            __DIR__.'/../Config/qiyue.php' => config_path('qiyue.php'),
        ], 'qiyue');
    }
}
