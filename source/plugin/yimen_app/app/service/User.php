<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/18 9:38
 * @Last Modified by: ofearn@qq.com
 */

namespace app\service;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\Db;
use app\lib\File;
use app\lib\Http;

class User
{
    public static function savaUserAvatar($uid, $imgUrl)
    {
        $path = File::getPathByUid($uid);
        Http::getSecond($imgUrl, $uid . '.jpg');
        File::mkdirs(dirname('uc_server/data/avatar/' . $path));
        @copy($uid . '.jpg', 'uc_server/data/avatar/' . $path . '_avatar_small.jpg');
        @copy($uid . '.jpg', 'uc_server/data/avatar/' . $path . '_avatar_middle.jpg');
        @copy($uid . '.jpg', 'uc_server/data/avatar/' . $path . '_avatar_big.jpg');
        unlink($uid . '.jpg');
        return true;
    }

    public static function sendMoney($uid, $money, $type = '2', $lang = 'pay')
    {
        updatemembercount($uid, [$type => $money], true, '', $uid, tpl_msg($lang), tpl_msg($lang), tpl_msg($lang));
        return true;
//        //发放充值货币
//        //获取现有获取现有货币
//        $userInfo = D('fetch_first', "select * from %t  WHERE uid=%d",
//            array('common_member_count', $uid));
//        $nowGold = intval($userInfo[$type]) + $money;
//        $res = D('update', 'common_member_count', array($type => $nowGold), 'uid=' . $uid);
//        if ($res) {
//            notification_add($uid, 'credit', '您好,您充值的积分(金币)已到账,充值数量:' . $money . ',积分(金币)总额:' . $nowGold . '!如果有疑问请联系站内客服.');
//        }
//        return $res;
    }

    public static function addUser($username, $password, $email)
    {
        $uid = uc_user_register($username, $password, $email);
        if ($uid > 0) {
            T('common_member')->insert($uid, $username, md5(random(10)), $email, get_ip(), 0, ['profile' => ['gender' => rand(1, 2)]]);
        }
        require_once libfile('cache/userstats', 'function');
        build_cache_userstats();
        return $uid;
    }

    public static function checkUsername($username)
    {
        $username = sChar(trim($username));
        $usernamelen = get_char_len($username);
        if ($usernamelen < 3) {
            return -1;
        } elseif ($usernamelen > 15) {
            return -2;
        }
        loaducenter();
        $ucresult = uc_user_checkname($username);
        if ($ucresult == -1) {
            return -3;
        } elseif ($ucresult == -2) {
            return -4;
        } elseif ($ucresult == -3) {
            if (T('common_member')->fetch_by_username($username) || T('common_member_archive')->fetch_by_username($username)) {
                return -5;
            } else {
                return -6;
            }
        }
        global $_G;
        $censorexp = '/^(' . str_replace(array('\\*', "\r\n", ' '), array('.*', '|', ''), preg_quote(($_G['setting']['censoruser'] = trim($_G['setting']['censoruser'])), '/')) . ')$/i';
        if ($_G['setting']['censoruser'] && @preg_match($censorexp, $username)) {
            return -7;
        }
        return 1;
    }

    public static function getCountByType($type)
    {
        switch ($type) {
            case 'now':
                $date = strtotime(date('Y-m-d', time()));
                break;
            case 'week':
                $w = date('w') ? date('w') : 7;
                $date = mktime(0, 0, 0, date('m'), date('d') - $w + 1, date('Y'));
                break;
            case 'month':
                $date = mktime(0, 0, 0, 1, 1, date('Y'));
                break;
            case 'all':
                $date = 0;
                break;
        }
        return Db::table('yimen_users')->where('create_time', '>=', $date)->count();
    }

    public static function getByUnionid($unionid, $type)
    {
        return Db::table('yimen_users')->where('unionid', $unionid)->where('platform', $type)->first();
    }

    public static function getByOpenid($openid)
    {
        return Db::table('yimen_users')->where('openid', $openid)->first();
    }

    public static function getByUsername($username)
    {
        return Db::table('yimen_users')->where('username', $username)->first();
    }

    public static function upById($id, $data)
    {
        return Db::table('yimen_users')->where('id', $id)->update($data);
    }

    public static function upByOpenid($token, $data)
    {
        return Db::table('yimen_users')->where('openid', $token)->update($data);
    }

    public static function add($data)
    {
        return Db::table('yimen_users')->insert($data);
    }

    public static function getCount()
    {
        return Db::table('yimen_users')->count();
    }

    public static function getList($page, $size)
    {
        $start = ($page - 1) * $size;
        return Db::table('yimen_users')->orderByDesc('create_time')->skip($start)->take($size)->get()->toArray();
    }
}