<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/18 10:36
 * @Last Modified by: ofearn@qq.com
 */

namespace app\service;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Jump
{
    public static function to($type, $url, $msg)
    {
        if ($type == 0) {
            showmessage($msg, $url);
        } else {
            header('Location:' . $url);
        }
    }
}