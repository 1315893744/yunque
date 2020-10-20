<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/18 15:22
 * @Last Modified by: ofearn@qq.com
 */

namespace app\lib;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Verify
{
    public static function param($keys, $data)
    {
        $timestamp = intval($data["timestamp"]);
        //假定15分钟内有效
        if (($timestamp + 15 * 60) < date_timestamp_get(date_create())) {
            //通知已过期
            return false;
        }
        $kv = array();
        //遍历 form 表单
        foreach ($data as $key => $val) {
            $kv[$key] = $val;
        }
        ksort($kv);
        reset($kv);
        $param = '';
        foreach ($kv as $key => $val) {
            if ($key != 'sign') {
                $param .= "$key=$val&";
            }
        }
        $param = substr($param, 0, -1) . $keys;
        return md5($param) == strtolower($kv["sign"]);
    }

    public static function getSign($keys, $data)
    {
        $timestamp = intval($data["timestamp"]);
        //假定15分钟内有效
        if (($timestamp + 15 * 60) < date_timestamp_get(date_create())) {
            //通知已过期
            return false;
        }
        $kv = array();
        //遍历 form 表单
        foreach ($data as $key => $val) {
            $kv[$key] = $val;
        }
        ksort($kv);
        reset($kv);
        $param = '';
        foreach ($kv as $key => $val) {
            if ($key != 'sign') {
                $param .= "$key=$val&";
            }
        }
        $param = substr($param, 0, -1) . $keys;
        return md5($param);
    }
}