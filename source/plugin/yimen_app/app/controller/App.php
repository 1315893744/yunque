<?php
/*
 * @Author: ofearn
 * @Date: 2019/12/9 18:16
 * @Last Modified by: ofearn@qq.com
 */

namespace app\controller;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\service\App as AppService;

class App extends Base
{
    //get yimen app list
    public function get_list()
    {
        return $this->success('6I635Y+WQVBQ5YiX6KGo5oiQ5Yqf', AppService::getList());
    }

    public function check_list()
    {
        $ret = AppService::upList();
        if ($ret === true) {
            return $this->success('5qOA5p+l5YiX6KGo5oiQ5Yqf');
        }
        return $this->error($ret);
    }

    public function user_info()
    {
        return $this->success('6I635Y+W55So5oi35L+h5oGv5oiQ5Yqf', [
            'user_id' => $this->set->get('global.yimen_appid'),
            'user_secret' => $this->set->get('global.yimen_secret')
        ]);
    }

    public function update_user()
    {
        $user_id = param('user_id');
        $user_secret = param('user_secret');
        if (empty($user_id) || empty($user_secret)) {
            return $this->error("5Y+C5pWw5LiN5q2j56Gu");
        }
        $this->set->up('global', [
            'yimen_appid' => $user_id,
            'yimen_secret' => $user_secret
        ]);
        return $this->success('5pu05paw55So5oi35L+h5oGv5oiQ5Yqf');
    }

    public function add_user()
    {
        $user = new \app\yimen\User();
        $ret = $user->DiscuzCreate();
        if ($ret['code'] != 0) {
            return $this->error($ret['message']);
        }
        $info = $ret['data'];
        $this->set->up('global', [
            'yimen_appid' => $info['user_id'],
            'yimen_secret' => $info['user_secret']
        ]);
        return $this->success('5aKe5YqgQVBQ5oiQ5Yqf', [
            'user_id' => $info['user_id'],
            'user_secret' => $info['user_secret']
        ]);
    }

    public function to()
    {
        $app_id = param('app_id');
        $type = param('type');
        if (empty($app_id) || empty($type)) {
            return $this->error('5Y+C5pWw5LiN6IO95Li656m6');
        }
        $ret = AppService::to($app_id, $type);
        $pattern = "#(http|https)://(.*\.)?.*\..*#i";
        if (!preg_match($pattern, $ret)) {
            return $this->error($ret);
        }
        return $this->success('6I635Y+W5oiQ5Yqf', [
            'url' => $ret
        ]);
    }

    public function create_app()
    {
        $url = param('url');
        $name = setChar(param('name'));
        $url_pc = param('url_pc');
        if (empty($url) || empty($name)) {
            return $this->error('5Y+C5pWw5LiN6IO95Li656m6');
        }
        $ret = AppService::addApp($url, $name, $url_pc);
        if ($ret === true) {
            return $this->success('5aKe5YqgQVBQ5oiQ5Yqf');
        }
        return $this->error($ret);
    }


    public function update_app()
    {
        $app_id = param('app_id');
        $app_secret = param('app_secret');
        if (empty($app_id) || empty($app_secret)) {
            return $this->error('5Y+C5pWw5LiN6IO95Li656m6');
        }
        $ret = AppService::upAppInfo($app_id, [
            'secret' => $app_secret
        ]);
        if ($ret) {
            return $this->success('5pu05paw5oiQ5Yqf');
        }
        return $this->error('5pu05paw5aSx6LSl');
    }
}