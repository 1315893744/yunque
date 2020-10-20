<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/16 16:24
 * @Last Modified by: ofearn@qq.com
 */

namespace app\controller;

use app\Db;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Setting extends Base
{
    /**
     * 获取系统配置
     * @return false|string
     */
    public function getbygroup()
    {
        if (empty(param('group'))) {
            return json([
                'code' => 0,
                'msg' => '5Y+C5pWw5LiN6IO95Li656m6'
            ]);
        }
        return json([
            'code' => 1,
            'msg' => '5Yqg6L296YWN572u5oiQ5Yqf',
            'data' => $this->set->get(param('group'))
        ]);
    }

    /**
     * 更新系统配置
     * @return array
     */
    public function updatebygorup()
    {
        $group = $_GET['group'];
        $setting = $_POST;
        if (count($setting) == 0) {
            return json([
                'code' => 0,
                'msg' => '5Y+C5pWw5LiN6IO95Li656m6'
            ]);
        }
        $this->set->up($group, $setting);
        return json([
            'code' => 1,
            'msg' => '5pu05paw5oiQ5Yqf'
        ]);
    }

    public function get_money_type()
    {
        $data = Db::table('common_setting')->where('skey', 'extcredits')->value('svalue');
        $data = unserialize($data);
        $arr = [];
        foreach ($data as $key => $v) {
            if ($v['available'] == 1) {
                $arr[] = [
                    'key' => $key,
                    'value' => $v['title']
                ];
            }
        }
        return $this->success('6I635Y+W56ev5YiG57G75Z6L5oiQ5Yqf', $arr);
    }
}