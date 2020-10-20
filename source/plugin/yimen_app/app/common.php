<?php
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
function allow_cross()
{
    header('Content-Type: text/html;charset=utf-8');
    header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
    header('Access-Control-Allow-Methods:*'); // 允许请求的类型
    header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
    header('Access-Control-Allow-Headers:*'); // 设置允许自定义请求头的字段
}

function tpl_msg($name)
{
    return lang('plugin/' . APP_NAME, $name);
}

function __($name)
{
    if (base64_encode(base64_decode($name)) == $name) {
        return sChar(base64_decode($name));
    }
    return sChar($name);
}

function getIndex()
{
    return 'http://' . $_SERVER['SERVER_NAME'];
}

function requset_methed()
{
    return $_SERVER['REQUEST_METHOD'];
}

function is_post()
{
    return requset_methed() == 'GET' ? true : false;
}

function is_get()
{
    return requset_methed() == 'POST' ? true : false;
}

function get_ip()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_REAL_FORWARDED_FOR']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_REAL_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    return $ip;
}


function param($name = '')
{
    $r = $name == '' ? $_REQUEST : $_REQUEST[$name];
    return sChar($r);
}


function json($arr = array())
{
    header('Content-Type:application/json');
    if (array_key_exists('msg', $arr)) {
        $arr['msg'] = __($arr['msg']);
    }
    return json_encode(set_array_char($arr));
}

function set_array_char($arr)
{
    $s = [];
    foreach ($arr as $k => $v) {
        if (is_array($v)) {
            $s[$k] = set_array_char($v);
        } else {
            if (preg_match("/[\x7f-\xff]/", $v)) {
                $v = setChar($v);
            }
            $s[$k] = $v;
        }
    }
    return $s;
}


function setting($name = '')
{
    if ($name == '') {
        return array();
    }
    $names = explode('.', $name);
    $settingArr = M('setting')->getSettingByGroup($names[0]);
    if (count($names) == 2 && $names[1] != '') {
        return $settingArr[$names[1]];
    }
    return $settingArr;
}

function M($name)
{
    return C::t('#' . APP_NAME . '#' . $name);
}

function T($name)
{
    return C::t($name);
}

function D($do, $sql, $data)
{
    return DB::$do($sql, $data);
}

function is_mobile()
{
    $mobile = array();
    static $mobilebrowser_list = array('iphone', 'android', 'phone', 'mobile', 'wap', 'netfront', 'java', 'opera mobi', 'opera mini',
        'ucweb', 'windows ce', 'symbian', 'series', 'webos', 'sony', 'blackberry', 'dopod', 'nokia', 'samsung',
        'palmsource', 'xda', 'pieplus', 'meizu', 'midp', 'cldc', 'motorola', 'foma', 'docomo', 'up.browser',
        'up.link', 'blazer', 'helio', 'hosin', 'huawei', 'novarra', 'coolpad', 'webos', 'techfaith', 'palmsource',
        'alcatel', 'amoi', 'ktouch', 'nexian', 'ericsson', 'philips', 'sagem', 'wellcom', 'bunjalloo', 'maui', 'smartphone',
        'iemobile', 'spice', 'bird', 'zte-', 'longcos', 'pantech', 'gionee', 'portalmmm', 'jig browser', 'hiptop',
        'benq', 'haier', '^lct', '320x320', '240x320', '176x220');
    $pad_list = array('pad', 'gt-p1000');

    $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);

    if (dstrpos($useragent, $pad_list)) {
        return false;//当前为使用PAD用户，返回false
    }
    if (($v = dstrpos($useragent, $mobilebrowser_list, true))) {
        return true;//手机端访问，返回true
    }
    $brower = array('mozilla', 'chrome', 'safari', 'opera', 'm3gate', 'winwap', 'openwave', 'myop');
    if (dstrpos($useragent, $brower)) return false;//PC浏览器访问，返回false
}

/**
 * 获取程序编码
 *
 * @return string
 */
function getChar()
{
    global $_G;
    $arr = array('utf-8' => 'utf8', 'gbk' => 'gbk');
    return $arr[$_G['charset']];
}

function setChar($char)
{
    global $_G;
    if ($_G['charset'] == 'utf-8') {
        return $char;
    } else {
        return diconv($char, 'gbk', 'utf-8');
    }
}

function sChar($char)
{
    global $_G;
    if ($_G['charset'] == 'utf-8') {
        return $char;
    } else {
        return diconv($char, 'utf-8', 'gbk');
    }
}

function get_char_len($str)
{
    $arr = mb_str_split($str);
    $s = 0;
    foreach ($arr as $v) {
        if (preg_match("/[\x7f-\xff]/", $v)) {
            $s += 2;
        } else {
            $s += 1;
        }
    }
    return $s;
}

function get_uid()
{
    global $_G;
    return $_G['uid'];
}

function dump($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}