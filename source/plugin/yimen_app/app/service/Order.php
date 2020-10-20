<?php
/*
 * @Author: ofearn
 * @Date: 2019/12/9 9:36
 * @Last Modified by: ofearn@qq.com
 */

namespace app\service;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\Db;

class Order
{
    public static function getAmountCountByType($type)
    {
        $db = Db::table('yimen_orders');
        switch ($type) {
            case 'now':
                $date = strtotime(date('Y-m-d', time()));
                break;
            case 'week':
                $w = date('w') ? date('w') : 7;
                $date = mktime(0, 0, 0, date('m'), date('d') - $w + 1, date('Y'));
                break;
            case 'month':
                $date = mktime(0, 0, 0, 1, 1, date('Y'));
                break;
            case 'all':
                $date = 0;
                break;
            case 'err':
                $date = 0;
                $db = $db->where('state', 0);
                break;
        }
        return $db->where('create_time', '>', $date)->count();
    }

    public static function create($data)
    {
        return Db::table('yimen_orders')->insert($data);
    }

    public static function getCount()
    {
        return Db::table('yimen_orders')->count();
    }

    public static function getList($page, $size)
    {
        $start = ($page - 1) * $size;
        return Db::table('yimen_orders')->orderByDesc('create_time')->skip($start)->take($size)->get()->toArray();
    }

    public static function getInfoByOrderId($orderId)
    {
        return Db::table('yimen_orders')->where('order_id', $orderId)->first();
    }

    public static function upById($id, $data)
    {
        return Db::table('yimen_orders')->where('id', $id)->update($data);
    }
}