<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/19 16:21
 * @Last Modified by: ofearn@qq.com
 */

namespace app\controller;

use app\service\Good;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Goods extends Base
{
    public function lists()
    {
        $list = Good::getList();
        return json([
            'code' => 1,
            'msg' => '6I635Y+W5ZWG5ZOB5YiX6KGo5oiQ5Yqf',
            'data' => $list
        ]);
    }

    public function update()
    {
        $id = param('ids');
        $name = param('name');
        $amount = param('amount');
        $count = param('count');
        if (empty($id) || empty($name) || empty($amount) || empty($count)) {
            return json([
                'code' => 0,
                'msg' => '5Y+C5pWw5LiN6IO95Li656m6'
            ]);
        }
        $ret = Good::upById($id, ['name' => $name, 'amount' => $amount, 'count' => $count]);
        if ($ret) {
            return json([
                'code' => 1,
                'msg' => '5pu05paw5ZWG5ZOB5oiQ5Yqf'
            ]);
        }
        return json([
            'code' => 0,
            'msg' => '5pu05paw5ZWG5ZOB5aSx6LSl'
        ]);
    }
}