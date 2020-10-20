<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/16 15:52
 * @Last Modified by: ofearn@qq.com
 */

namespace app;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Auth
{
    /**
     * @var array 管理员权限列表
     */
    protected static $admin = [
        'Index.info',
        'Index.login',
        'Goods.update',
        'Setting.getbygroup',
        'Setting.updatebygorup',
        'User.lists',
        'App.get_list',
        'App.check_list',
        'App.user_info',
        'App.update_user',
        'App.add_user',
        'App.to',
        'App.create_app',
        'App.update_app',
        'Log.sql'
    ];
    /**
     * @var array 用户权限列表
     */
    protected static $user = [
        'Order.create',
        'Order.lists',
        'Pay.alipay_web',
        'Pay.alipay_wap',
        'Pay.wechat_scan',
        'Pay.wechat_wap',
        'Pay.wechat_mp',
        'Goods.lists',
        'Pay.ali_return',
        'Pay.wx_find'
    ];

    /**
     * 权限验证
     *
     * @param $route
     * @return bool
     */
    public static function verify($route)
    {
        global $_G;
        if (in_array($route, self::$admin)) {
            //admin
            if ($_G['adminid'] > 0) {
                return true;
            }
            return false;
        }
        if (in_array($route, self::$user)) {
            if ($_G['uid'] > 0) {
                return true;
            }
            return false;
        }
        return true;
    }
}