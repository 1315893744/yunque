<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/18 14:22
 * @Last Modified by: ofearn@qq.com
 */

namespace app\controller;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\lib\Verify;
use app\service\Good;
use app\service\Order;
use app\service\login\Wechat;

class Pay extends Base
{
    protected $config;
    protected $orderInfo;
    protected $driver;
    protected $gateway;

    public function __construct($controller = '')
    {
        $order = param('order_id');
        if ($order) {
            $this->orderInfo = Order::getInfoByOrderId($order);
        }
        parent::__construct($controller);
    }

    public function alipay_web()
    {
        if (!$this->verify('alipay_web')) {
            return $this->jump(false, [
                'msg' => '6K6i5Y2V5L+h5oGv6ZSZ6K+v'
            ]);
        }
        $this->config['alipay'] = [
            'app_id' => $this->set->get('pay_alipay.pc_appid'),
            'notify_url' => $this->siteUrl . 'source/plugin/yimen_app/notify.php',
            'return_url' => $this->siteUrl . 'plugin.php?id=yimen_app&s=pay/ali_return&ptype=pc',
            'ali_public_key' => $this->set->get('pay_alipay.pc_public_key'),
            'private_key' => $this->set->get('pay_alipay.pc_private_key')
        ];
        $order = [
            'out_trade_no' => $this->orderInfo['order_id'],
            'total_amount' => $this->orderInfo['amount'],
            'subject' => base64_decode($this->orderInfo['order_name']),
        ];
        return $this->toPay($order);
    }

    public function alipay_wap()
    {
        if (!$this->verify('alipay_wap')) {
            return $this->jump(false, [
                'msg' => '6K6i5Y2V5L+h5oGv6ZSZ6K+v'
            ]);
        }
        $this->config['alipay'] = [
            'app_id' => $this->set->get('pay_alipay.h5_appid'),
            'notify_url' => $this->siteUrl . 'source/plugin/yimen_app/notify.php',
            'return_url' => $this->siteUrl . 'plugin.php?id=yimen_app&s=pay/ali_return&ptype=h5',
            'ali_public_key' => $this->set->get('pay_alipay.h5_public_key'),
            'private_key' => $this->set->get('pay_alipay.h5_private_key')
        ];
        $order = [
            'out_trade_no' => $this->orderInfo['order_id'],
            'total_amount' => $this->orderInfo['amount'],
            'subject' => base64_decode($this->orderInfo['order_name']),
        ];
        return $this->toPay($order);
    }


    public function wechat_scan()
    {
        if (!$this->verify('wechat_scan')) {
            return $this->jump(false, [
                'msg' => '6K6i5Y2V5L+h5oGv6ZSZ6K+v'
            ]);
        }
        $this->config['wechat'] = [
            'app_id' => $this->set->get('pay_wechat.pc_appid'),
            'mch_id' => $this->set->get('pay_wechat.pc_mchid'),
            'key' => $this->set->get('pay_wechat.pc_key'),
            'notify_url' => $this->siteUrl . 'source/plugin/yimen_app/notify.php',
        ];
        $order = [
            'out_trade_no' => $this->orderInfo['order_id'],
            'total_fee' => $this->orderInfo['amount'] * 100, // **单位：分**
            'body' => base64_decode($this->orderInfo['order_name']),
            'spbill_create_ip' => get_ip()
        ];
        $url = $this->toPay($order);
        if ($url) {
            return json([
                'code' => 1,
                'msg' => '5Yib5bu65pSv5LuY5oiQ5Yqf',
                'qrcode' => $url
            ]);
        }
        return json([
            'code' => 0,
            'msg' => '5Yib5bu66K6i5Y2V5aSx6LSl',
        ]);
    }

    public function wechat_wap()
    {
        if (!$this->verify('wechat_wap')) {
            return $this->jump(false, [
                'msg' => '6K6i5Y2V5L+h5oGv6ZSZ6K+v',
            ]);
        }
        $this->config['wechat'] = [
            'app_id' => $this->set->get('pay_wechat.h5_appid'),
            'mch_id' => $this->set->get('pay_wechat.h5_mchid'),
            'key' => $this->set->get('pay_wechat.h5_key'),
            'notify_url' => $this->siteUrl . 'source/plugin/yimen_app/notify.php',
        ];
        $order = [
            'out_trade_no' => $this->orderInfo['order_id'],
            'total_fee' => $this->orderInfo['amount'] * 100, // **单位：分**
            'body' => base64_decode($this->orderInfo['order_name']),
            'spbill_create_ip' => get_ip()
        ];
        $url = $this->toPay($order);
        if ($url) {
            return $this->jump(false, [
                'msg' => '5Yib5bu65pSv5LuY5oiQ5Yqf',
                'url' => $url
            ]);
        } else {
            return $this->jump(false, [
                'msg' => '5Yib5bu66K6i5Y2V5aSx6LSl',
            ]);
        }
    }

    public function wechat_mp()
    {
        if (!$this->verify('wechat_mp') || empty(param('code'))) {
            return $this->jump(false, [
                'msg' => '6K6i5Y2V5L+h5oGv6ZSZ6K+v',
            ]);
        }
        //根据code获取验证码
        $wechat = new Wechat($this->set->get('login_wechat.wx_appid'), $this->set->get('login_wechat.wx_secret'));
        $openid = $wechat->setCode(param('code'))->getOpenid();
        if (!$openid) {
            return $this->jump(false, [
                'msg' => '55So5oi35o6I5p2D5L+h5oGv6ZSZ6K+v',
            ]);
        }
        $this->config['wechat'] = [
            'app_id' => $this->set->get('pay_wechat.gzh_appid'),
            'mch_id' => $this->set->get('pay_wechat.gzh_mchid'),
            'key' => $this->set->get('pay_wechat.gzh_key'),
            'notify_url' => $this->siteUrl . 'source/plugin/yimen_app/notify.php',
        ];
        $order = [
            'out_trade_no' => $this->orderInfo['order_id'],
            'total_fee' => $this->orderInfo['amount'] * 100, // **单位：分**
            'body' => base64_decode($this->orderInfo['order_name']),
            'spbill_create_ip' => get_ip(),
            'openid' => $openid,
        ];
        $ret = $this->toPay($order);
        $json = json_encode($ret);
        return '
            <script type="text/javascript">
                var i=0;
                var div0=document.createElement("div");
                div0.style="height: 100px;width: 400px;background: #00a5e0;color: floralwhite;margin: 300px auto;margin-bottom:100;border-radius: 10px;line-height: 100px;font-size: 40px;text-align: center";
                div0.innerText="\u7acb\u5373\u652f\u4ed8";
                div0.onclick=function(){
                    topay();
                }
                document.body.appendChild(div0);
                setTimeout(()=>{
                    topay();
                },500);
                function ok() {
                    if(i++==1){
                        var div1=document.createElement("div");
                        div1.style="height: 100px;width: 400px;background: #ff0000;color: floralwhite;margin: 0px auto;border-radius: 10px;line-height: 100px;font-size: 40px;text-align: center";
                        div1.innerText="\u6211\u5df2\u652f\u4ed8";
                        div1.onclick=function(){
                            //window.location.href = "/";
                            history.back(-1);
                        }
                        document.body.appendChild(div1);
                    }
                }
                function topay() {
                  ok();
                  WeixinJSBridge.invoke("getBrandWCPayRequest",' . $json . ',
                       function(res){
                           if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                                alert("' . tpl_msg('pay_ok') . '");
                           }else{
                               alert("' . tpl_msg('pay_err') . '");
                           }
                           window.location.href = "/"
                       }
                   );
                }
            </script>
        ';
    }

    public function toPay($orderInfo)
    {
        $pay = new \Yansongda\Pay\Pay($this->config);
        return $pay->driver($this->driver)->gateway($this->gateway)->pay($orderInfo);
    }

    public function ali_return()
    {
        $order = param('out_trade_no');
        $orderInfo = Order::getInfoByOrderId($order);
        if ($orderInfo['state'] > 0) {
            return $this->jump(false, [
                'msg' => '6K6i5Y2V5bey5a6M5oiQ'
            ]);
        }
        return $this->jump(false, [
            'msg' => '562J5b6F6K6i5Y2V5a6M5oiQ'
        ]);
    }

    public function wx_find()
    {
        $order_id = param('order_id');
        $orderInfo = Order::getInfoByOrderId($order_id);
        if ($orderInfo['state'] > 0) {
            return json([
                'code' => 1,
                'msg' => '6K6i5Y2V5bey5a6M5oiQ'
            ]);
        }
        return json([
            'code' => 0,
            'msg' => '562J5b6F6K6i5Y2V5a6M5oiQ'
        ]);
    }

    public function notify()
    {
        $param = json_decode(base64_decode(param('res')), true);
        $order_id = $param['out_trade_no'];
        $orderInfo = Order::getInfoByOrderId($order_id);
        if (!$orderInfo) {
            return 'order_err';
        }
        $type = $orderInfo['type'];
        $names = explode('_', $type);
        $this->driver = $names[0];
        $this->gateway = $names[1];
        $arr = [
            'alipay_web' => 'pc',
            'alipay_wap' => 'h5',
            'wechat_scan' => 'pc',
            'wechat_wap' => 'h5',
            'wechat_mp' => 'gzh'
        ];
        if ($this->driver == 'wechat') {
            $this->config['wechat'] = [
                'app_id' => $this->set->get('pay_wechat.' . $arr[$type] . '_appid'),
                'mch_id' => $this->set->get('pay_wechat.' . $arr[$type] . '_mchid'),
                'key' => $this->set->get('pay_wechat.' . $arr[$type] . '_key'),
            ];
        } else {
            $this->config['alipay'] = [
                'app_id' => $this->set->get('pay_alipay.' . $arr[$type] . '_appid'),
                'ali_public_key' => $this->set->get('pay_alipay.' . $arr[$type] . '_public_key'),
                'private_key' => $this->set->get('pay_alipay.' . $arr[$type] . '_private_key')
            ];
        }
        $pay = new \Yansongda\Pay\Pay($this->config);
        $verify = $pay->driver($this->driver)->gateway($this->gateway)->verify($param);
        if ($verify) {
            $ret = $orderInfo;
            if (!$ret || $ret['state'] == 2) {
                return 'isok';
            }

            $money = Good::getCountById($ret['goods_id']);
            if ($this->driver == 'wechat') {
                //微信
                if ($ret['amount'] * 100 != $verify['cash_fee']) {
                    return 'amount err';
                }
                $order_ids = $verify['transaction_id'];
            } else {
                //支付宝
                if ($ret['amount'] != $verify['total_amount']) {
                    return 'amount err';
                }
                $order_ids = $verify['trade_no'];
            }
            if ($money > 0) {
                $sendErr = \app\service\User::sendMoney($ret['uid'], $money);
                if ($sendErr) {
                    Order::upById($ret['id'], array('trade_id' => $order_ids, 'state' => 2, 'update_time' => time()));
                    return 'success';
                }
            }
            Order::upById($ret['id'], array('trade_id' => $order_ids, 'state' => 1, 'update_time' => time()));
            return 'success';
        } else {
            echo 'verify_err';
        }
    }

    public function app_notify()
    {
        //支付回调地址
        $kv = $_POST;
        $verify_result = Verify::param($this->set->get('pay_global.pay_appkey'), $kv);
        if ($verify_result) {
            //获取有效的参数值
            $tradeid = $kv["tradeid"];  //支付平台上的交易号
            $orderid = $kv["orderid"];  //订单号
            $amount = $kv["amount"];  //支付金额
            $channel = $kv["channel"];  //支付渠道, 0 微信，1 支付宝, 2 银联
            //先查询相关订单
            $ret = Order::getInfoByOrderId($orderid);
            if (!$ret) {
                return 'order not find';
            }
            if ($ret['amount'] != $amount) {
                return 'amount err';
            }
            $arr = [
                'alipay_app' => 1,
                'wechat_app' => 0
            ];
            if ($arr[$ret['type']] != $channel) {
                return 'type err';
            }
            if ($ret['state'] == 2) {
                return 'state err';
            }
            $money = Good::getCountById($ret['goods_id']);
            $order_ids = $tradeid;
            if ($money > 0) {
                $sendErr = \app\service\User::sendMoney($ret['uid'], $money, $this->set->get('pay_global.money_type'));
                if ($sendErr) {
                    Order::upById($ret['id'], array('trade_id' => $order_ids, 'state' => 2, 'update_time' => time()));
                    return 'ok';
                }
            }
            Order::upById($ret['id'], array('trade_id' => $order_ids, 'state' => 1, 'update_time' => time()));
            return 'ok';
        } else {
            //签名验证失败
            return 'sign err';
        }
    }

    protected function verify($name)
    {
        $names = explode('_', $name);
        $this->driver = $names[0];
        $this->gateway = $names[1];
        return true;
    }
}