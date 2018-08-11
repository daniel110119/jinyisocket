<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/4
 * Time: 22:20
 */

namespace Jinyi\JinyiSocket;

use Illuminate\Support\ServiceProvider;
use Jinyi\JinyiSocket\Services\SocketService;

class SocketServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/socketserve' => base_path('socketserve'),
        ], 'serve');

        $this->publishes([
            __DIR__ . '/start.php' => base_path('start.php'),
        ], 'start-serve');
    }

    public function register()
    {
        $this->app->singleton('socket', function ($app) {
            return new SocketService();
        });
    }
}