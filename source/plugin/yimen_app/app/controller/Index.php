<?php

namespace app\controller;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\lib\Verify;
use app\service\User;
use app\service\Order;

class Index extends Base
{
    public function index()
    {
        global $_G;
        return 'yimen_app,UID:' . $_G['uid'];
    }

    public function info()
    {
        //Get statistics
        $allUser = User::getCountByType('all');//Total number of members obtained
        $nowUser = User::getCountByType('now');//Get the total number of members today
        $allOrderCount = Order::getAmountCountByType('all');//Total number of orders obtained
        $nowOrderCount = Order::getAmountCountByType('now');//Get the total number of orders today
        $errOrderCount = Order::getAmountCountByType('err');//Get the total number of error orders
        return json([
            'code' => 1,
            'msg' => '6I635Y+W57uf6K6h5L+h5oGv5oiQ5Yqf',
            'data' => [
                'census' => array($allUser ?: '0', $nowUser ?: '0', $allOrderCount ?: '0', $nowOrderCount ?: '0', ($allOrderCount - $errOrderCount) ?: '0', $errOrderCount ?: '0'),
            ]
        ]);
    }

    public function login()
    {
        if ($this->set->get('global.yimen_appid') == '' || $this->set->get('global.yimen_secret') == '') {
            return tpl_msg('login_err_tip');
        }
        $arr = [
            'appid' => $this->set->get('global.yimen_appid'),
            'nonce' => md5(time()),
            'timestamp' => strval(time())
        ];
        $arr['sign'] = Verify::getSign($this->set->get('global.yimen_secret'), $arr);
        header('Location: ' . 'https://gate.open.yimenyun.com/tool/login?' . http_build_query($arr));
    }
}