<?php
/**
 * Created by PhpStorm.
 * User: LuGeGe
 * Date: 2018/8/12
 * Time: 13:55
 */
return [
    'socket'=>'0.0.0.0:55555', //0.0.0.0 匹配所有
    'register'=>'0.0.0.0:1236',//注册地址
    'registerAddress'=>'127.0.0.1:1236',//本地访问同上端口
    'except'=>[
        '*'
    ],
    'ssl'=>[
        // 'local_cert'                 => '磁盘路径/server.pem', // 也可以是crt文件
        //'local_pk'                   => '磁盘路径/server.key',
        //'verify_peer'                => false,
        //'allow_self_signed' => true, //如果是自签名证书需要开启此选项
    ]
];