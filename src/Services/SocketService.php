<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/4
 * Time: 22:19
 */

namespace Jinyi\JinyiSocket\Services;


use GatewayClient\Gateway;

/**
 * @method  sendToAll(string $message,array $client_id_array = null);向所有客户端或者client_id_array指定的客户端发送$send_data数据
 * @method  sendToClient(string $client_id, string $send_data); 向客户端client_id发送数据。如果client_id对应的客户端不存在或者不在线则自动丢弃发送数据
 * @method  closeClient(string $client_id); 断开与client_id对应的客户端的连接
 * @method  isOnline(string $client_id); 判断$client_id是否还在线
 * @method  bindUid(string $client_id, mixed $uid); 将client_id与uid绑定
 * @method  unbindUid(string $client_id, mixed $uid); 将client_id与uid解绑。
 * @method  isUidOnline(mixed $uid);判断$uid是否在线
 * @method  getClientIdByUid(mixed $uid); 返回一个数组，数组元素为与uid绑定的所有在线的client_id。如果没有在线的client_id则返回一个空数组。
 * @method  getUidByClientId(string $client_id); 返回client_id绑定的uid，如果client_id没有绑定uid，则返回null。
 * @method  sendToUid(mixed $uid, string $message);向uid绑定的所有在线client_id发送数据。
 * @method  joinGroup(string $client_id, mixed $group); 将client_id加入某个组
 * @method  leaveGroup(string $client_id, mixed $group);将client_id从某个组中删除，
 * @method  ungroup(mixed $group);解散分组
 * @method  sendToGroup(mixed $group, string $message);向某个分组的所有在线client_id发送数据。
 * @method  getClientIdCountByGroup(mixed $group);获取某分组当前在线成连接数（多少client_id在线）
 * @method  getClientSessionsByGroup(mixed $group);获取某个分组所有在线client_id信息。
 * @method  getAllClientIdCount();获取当前在线连接总数 多少client_id在线
 * @method  getAllClientSessions();获取当前所有在线client_id信息。
 * @method  setSession(string $client_id, array $session);设置某个client_id对应的session。如果对应client_id已经下线或者不存在，则会被忽略。
 * @method  updateSession(string $client_id, array $session);更新某个client_id对应的session。如果对应client_id已经下线或者不存在，则会被忽略
 * @method  getSession(string $client_id);获取某个client_id对应的session。
 * @method  getClientIdListByGroup(mixed $group);获取某个分组所有在线client_id列表。
 * @method  getAllClientIdList();获取全局所有在线client_id列表。
 * @method  getUidListByGroup(mixed $group); 获取某个分组所有在线uid列表。
 * @method  getUidCountByGroup(mixed $group);获取某个分组下的在线uid数量。
 * @method  getAllUidList();获取全局所有在线uid列表。
 * @method  getAllUidCount();获取全局所有在线uid数量。
 * @method  getAllGroupIdList();获取全局所有在线group id列表。
 * */

class SocketService
{
    protected $so;

    /**
     * SocketService constructor.
     * @param $so
     */
    public function __construct()
    {
       Gateway::$registerAddress = '127.0.0.1:1236';
       $this->so = app(Gateway::class);
    }

    public function __call($methodName,$argument){
        call_user_func_array([$this->so,$methodName], $argument);
    }

}