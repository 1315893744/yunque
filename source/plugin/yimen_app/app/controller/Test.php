<?php
/*
 * @Author: ofearn
 * @Date: 2019/12/20 9:40
 * @Last Modified by: ofearn@qq.com
 */

namespace app\controller;


use app\Db;

class Test extends Base
{
    public function index()
    {
        $res = Db::table('tom_tongcheng_user')->get();//导出的表
        echo 'database count ' . count($res);
        //处理数据
        $i = 0;
        $e = 0;
        foreach ($res as $v) {
            if ($v['openid'] == '') {
                $e++;
                continue;
            }
            $data = [
                'uid' => $v['member_id'],
                'username' => $v['username'],
                'password' => $v['password'],
                'openid' => $v['openid'],
                'unionid' => $v['unionid'],
                'nick' => $v['nickname'],
                'avatar' => $v['picurl'],
                'email' => '',
                'platform' => 'wechat',
                'state' => 1,
                'create_time' => time(),
                'update_time' => time()
            ];
            $res = Db::table('yimen_users')->insert($data);
            if ($res) {
                $i++;
            } else {
                $e++;
            }
        }
        echo 'success count ' . $i . ' ,error count ' . $e;
    }
}