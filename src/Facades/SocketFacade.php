<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/4
 * Time: 22:22
 */

namespace Jinyi\JinyiSocket\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @author lubaba
 * @method static sendToAll(string $message,array $client_id_array = null);向所有客户端或者client_id_array指定的客户端发送$send_data数据
 * @method static sendToClient(string $client_id, string $send_data); 向客户端client_id发送数据。如果client_id对应的客户端不存在或者不在线则自动丢弃发送数据
 * @method static closeClient(string $client_id); 断开与client_id对应的客户端的连接
 * @method static isOnline(string $client_id); 判断$client_id是否还在线
 * @method static bindUid(string $client_id, mixed $uid); 将client_id与uid绑定
 * @method static unbindUid(string $client_id, mixed $uid); 将client_id与uid解绑。
 * @method static isUidOnline(mixed $uid);判断$uid是否在线
 * @method static getClientIdByUid(mixed $uid); 返回一个数组，数组元素为与uid绑定的所有在线的client_id。如果没有在线的client_id则返回一个空数组。
 * @method static getUidByClientId(string $client_id); 返回client_id绑定的uid，如果client_id没有绑定uid，则返回null。
 * @method static sendToUid(mixed $uid, string $message);向uid绑定的所有在线client_id发送数据。
 * @method static joinGroup(string $client_id, mixed $group); 将client_id加入某个组
 * @method static leaveGroup(string $client_id, mixed $group);将client_id从某个组中删除，
 * @method static ungroup(mixed $group);解散分组
 * @method static sendToGroup(mixed $group, string $message);向某个分组的所有在线client_id发送数据。
 * @method static getClientIdCountByGroup(mixed $group);获取某分组当前在线成连接数（多少client_id在线）
 * @method static getClientSessionsByGroup(mixed $group);获取某个分组所有在线client_id信息。
 * @method static getAllClientIdCount();获取当前在线连接总数 多少client_id在线
 * @method static getAllClientSessions();获取当前所有在线client_id信息。
 * @method static setSession(string $client_id, array $session);设置某个client_id对应的session。如果对应client_id已经下线或者不存在，则会被忽略。
 * @method static updateSession(string $client_id, array $session);更新某个client_id对应的session。如果对应client_id已经下线或者不存在，则会被忽略
 * @method static getSession(string $client_id);获取某个client_id对应的session。
 * @method static getClientIdListByGroup(mixed $group);获取某个分组所有在线client_id列表。
 * @method static getAllClientIdList();获取全局所有在线client_id列表。
 * @method static getUidListByGroup(mixed $group); 获取某个分组所有在线uid列表。
 * @method static getUidCountByGroup(mixed $group);获取某个分组下的在线uid数量。
 * @method static getAllUidList();获取全局所有在线uid列表。
 * @method static getAllUidCount();获取全局所有在线uid数量。
 * @method static getAllGroupIdList();获取全局所有在线group id列表。
 */

class SocketFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'socket';
    }
}