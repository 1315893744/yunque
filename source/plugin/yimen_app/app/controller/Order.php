<?php

namespace app\controller;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\Db;
use app\lib\Random;
use app\service\Order as OrderService;

class Order extends Base
{
    public function create()
    {
        global $_G;
        $request = $_REQUEST;
        if (!in_array($request['type'], ['wechat_app', 'alipay_app', 'wechat_scan', 'alipay_web', 'wechat_wap', 'alipay_wap', 'wechat_mp'])) {
            return json([
                'code' => 0,
                'msg' => '6K6i5Y2V5pSv5LuY57G75Z6L6ZSZ6K+v'
            ]);
        }
        $arr = [
            'wechat_app' => 'pay_wechat.app_pay',
            'alipay_app' => 'pay_alipay.app_pay',
            'wechat_scan' => 'pay_wechat.pc_pay',
            'alipay_web' => 'pay_alipay.app_pay',
            'wechat_wap' => 'pay_wechat.h5_pay',
            'alipay_wap' => 'pay_alipay.h5_pay',
            'wechat_mp' => 'pay_wechat.gzh_pay'
        ];
        if ($this->set->get($arr[$request['type']]) != 1) {
            return json([
                'code' => 0,
                'msg' => '5b2T5YmN5pSv5LuY5pa55byP5pyq5byA5ZCv'
            ]);
        }
        if (empty($request['name']) || empty($request['amount']) || empty($request['goods_id']) || empty($request['type'])) {
            return json([
                'code' => 0,
                'msg' => '6K6i5Y2V5L+h5oGv5LiN5a6M5pW0'
            ]);
        }
        $pre = $this->set->get('pay_global.pay_order_pre') ?: '';
        $order_id = $pre . strval(time()) . Random::numeric(4);//生成订单ID
        $ins = OrderService::create(array(
            'uid' => $_G['uid'],
            'order_id' => $order_id,
            'order_name' => $request['name'],
            'trade_id' => '',
            'amount' => $request['amount'],
            'goods_id' => $request['goods_id'],
            'type' => $request['type'],
            'state' => 0,
            'create_time' => time()
        ));
        if ($ins) {
            return json([
                'code' => 1,
                'msg' => '5Yib5bu66K6i5Y2V5oiQ5Yqf',
                'order_id' => $order_id
            ]);
        } else {
            return json([
                'code' => 1,
                'msg' => '5Yib5bu66K6i5Y2V5aSx6LSl'
            ]);
        }
    }

    public function lists()
    {
        $count = OrderService::getCount();
        $pages = $count / $_POST['size'];
        if (empty($_POST['page']) && empty($_POST['size'])) {
            return json([
                'code' => 0,
                'msg' => '57y65bCR5b+F6KaB5Y+C5pWw'
            ]);
        }
        if ($_POST['page'] > $pages + 1) {
            return json([
                'code' => 0,
                'msg' => '5pqC5peg5pWw5o2u'
            ]);
        }
        return json([
            'code' => 1,
            'msg' => '5Yqg6L296K6i5Y2V5YiX6KGo5oiQ5Yqf',
            'data' => array(
                'count' => intval($count),
                'list' => OrderService::getList($_POST['page'], $_POST['size'])
            )
        ]);
    }

    public function info()
    {
        //get now user  money
        $userInfo = D('fetch_first', "select * from %t  WHERE uid=%d", array('common_member_count', get_uid()));
        $money = $userInfo['extcredits' . $this->set->get('pay_global.money_type')];
        //get pay  setting
        $color = $this->set->get('pay_global.button_color');
        $inApp = strpos($_SERVER['HTTP_USER_AGENT'], 'LT-APP');
        $inWx = $inApp ? false : strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger');

        if ($inApp) {
            $payType = [$this->set->get('pay_wechat.app_pay') == '' ? 0 : 1, $this->set->get('pay_alipay.app_pay') == '' ? 0 : 1];
        } elseif ($inWx) {
            $payType = [$this->set->get('pay_wechat.gzh_pay') == '' ? 0 : 1, 0];
        } else if (is_mobile()) {
            $payType = [$this->set->get('pay_wechat.h5_pay') == '' ? 0 : 1, $this->set->get('pay_alipay.h5_pay') == '' ? 0 : 1];
        } else {
            $payType = [$this->set->get('pay_wechat.pc_pay') == '' ? 0 : 1, $this->set->get('pay_alipay.pc_pay') == '' ? 0 : 1];
        }
        $data = Db::table('common_setting')->where('skey', 'extcredits')->value('svalue');
        $data = unserialize($data);
        $moneyName = '';
        foreach ($data as $key => $v) {
            if ($key == $this->set->get('pay_global.money_type')) {
                $moneyName = $v['title'];
                continue;
            }
        }
        return $this->success('5Yqg6L295pSv5LuY6aG16Z2i6YWN572u5oiQ5Yqf', [
            'money' => $money,
            'color' => $color,
            'payType' => $payType,
            'moneyName' => $moneyName
        ]);
    }
}