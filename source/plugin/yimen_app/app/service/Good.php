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

class Good
{
    public static function getList()
    {
        return Db::table('yimen_goods')->get()->toArray();
    }

    public static function upById($id, $data)
    {
        return Db::table('yimen_goods')->where('id', $id)->update($data);
    }

    public static function getCountById($id)
    {
        return Db::table('yimen_goods')->where('id', $id)->value('count');
    }
}