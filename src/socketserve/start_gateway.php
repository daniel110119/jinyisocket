<?php 
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
use \Workerman\Worker;
use \GatewayWorker\Gateway;
use \Workerman\Autoloader;

require_once  __DIR__ . '/../vendor/autoload.php';
$config = require (__DIR__.'/../config/socket.php');
if(count($config['ssl'])){
    $context = [];
    $context['ssl']= $config['ssl'];
}
$gateway = new Gateway("Websocket://".$config['socket'],$context);//第二个参数 传入$context 开启wss
// gateway 进程
// 设置名称，方便status时查看
$gateway->name = 'ChatGateway';
// 设置进程数，gateway进程数建议与cpu核数相同
$gateway->count = 4;
// 分布式部署时请设置成内网ip（非127.0.0.1）
$gateway->lanIp = '127.0.0.1';
// 内部通讯起始端口。假如$gateway->count=4，起始端口为2300
// 则一般会使用2300 2301 2302 2303 4个端口作为内部通讯端口 
$gateway->startPort = 2300;
// 心跳间隔
$gateway->pingInterval = 30;
// 心跳数据
$gateway->pingData = '{"type":"ping"}';
// 服务注册地址
$gateway->registerAddress = $config['registerAddress'];
// 设置transport开启ssl，websocket+ssl即wss
if(count($config['ssl'])){
  $worker->transport = 'ssl';
}

$gateway->onConnect = function($connection) use($config)
{
    $connection->onWebSocketConnect = function($connection , $http_header) use($config)
    {
        if(in_array($_SERVER['HTTP_ORIGIN'],$config['except']) || in_array('*',$config['except'])){

        }else{
            $connection->close();
            $myfile = fopen(__DIR__.'/../storage/logs/socket_log_'.date('Y_m_d').'.log', "a");
            fwrite($myfile,'非法链接：'.$_SERVER['HTTP_ORIGIN']."\n");
            fclose($myfile);
        }
    };
}; 


// 如果不是在根目录启动，则运行runAll方法
if(!defined('GLOBAL_START'))
{
    Worker::runAll();
}

