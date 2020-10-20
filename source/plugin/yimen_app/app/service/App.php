<?php
/*
 * @Author: ofearn
 * @Date: 2019/12/10 9:34
 * @Last Modified by: ofearn@qq.com
 */

namespace app\service;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\Db;
use http\Url;

class App
{
    public static function getList()
    {
        return Db::table('yimen_apps')->where('state', 1)->get()->toArray();
    }

    public static function upUserInfo($user_id, $user_secret)
    {
        return (new Setting)->up('global', [
            'yimen_appid' => $user_id,
            'yimen_secret' => $user_secret
        ]);
    }

    public static function upAppInfo($id, $info)
    {
        return Db::table('yimen_apps')->where('appid', $id)->update($info);
    }

    public static function upList()
    {
        $setting = (new Setting())->get('global');
        if (empty($setting['yimen_appid']) || empty($setting['yimen_secret'])) {
            return '6K+35YWI5Yib5bu655So5oi35YaN5pu05paw5YiX6KGo';
        }
        $user = new \app\yimen\User($setting['yimen_appid'], $setting['yimen_secret']);
        $ret = $user->Apps();
        if ($ret['code'] != 0) {
            return $ret['message'];
        }
        $list = $ret['data'];
        $appList = Db::table('yimen_apps')->get()->toArray();
        $appLists = [];
        foreach ($appList as $app) {
            $appLists[$app['appid']] = $app;
        }
        //update app list
        foreach ($list as $app) {
            if (array_key_exists($app['app_id'], $appLists)) {
                $app1 = $appLists[$app['app_id']];
                if ($app['name'] != $app1['name'] || $app['url'] != $app1['url'] || $app['icon'] != $app1['icon']) {
                    Db::table('yimen_apps')->where('appid', $app['app_id'])->update([
                        'name' => base64_encode($app['name']),
                        'url' => $app['url'],
                        'icon' => $app['icon']
                    ]);
                }
            } else {
                Db::table('yimen_apps')->insert([
                    'appid' => $app['app_id'],
                    'secret' => '',
                    'name' => base64_encode($app['name']),
                    'url' => $app['url'],
                    'icon' => $app['icon'],
                ]);
            }
        }
        return true;
    }

    public static function addApp($url, $name, $url_pc)
    {
        $setting = (new Setting())->get('global');
        if (empty($setting['yimen_appid']) || empty($setting['yimen_secret'])) {
            return '6K+35YWI5Yib5bu655So5oi35YaN5Yib5bu6YXBw';
        }
        $user = new \app\yimen\User($setting['yimen_appid'], $setting['yimen_secret']);
        $ret = $user->Create($url, $name, $url_pc);
        if ($ret['code'] != 0) {
            return $ret['message'];
        }
        $app = $ret['data'];
        $res = Db::table('yimen_apps')->insert([
            'appid' => $app['app_id'],
            'secret' => $app['app_secret'],
            'name' => base64_encode($name),
            'url' => $url,
            'url_pc' => $url_pc
        ]);
        return $res ? true : '5Yqg5YWl5pWw5o2u5bqT5aSx6LSl77yM6K+35omL5Yqo5pu05pawYXBw5YiX6KGo';
    }

    public static function to($app_id, $type)
    {
        $app_secret = Db::table('yimen_apps')->where('appid', $app_id)->value('secret');
        $app = new \app\yimen\App($app_id, $app_secret);
        $ret = $app->Go($type);
        if ($ret['code'] != 0) {
            return $ret['message'];
        }
        return $ret['data']['url'];
    }
}