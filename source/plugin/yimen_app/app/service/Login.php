<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/16 17:01
 * @Last Modified by: ofearn@qq.com
 */

namespace app\service;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\lib\Http;

class Login
{
    public static function getQQUserInfo($accountToken)
    {
        $ret = Http::get('https://graph.qq.com/oauth2.0/me?access_token=' . $accountToken . '&unionid=1');
        $l = strpos($ret, "(");
        $r = strrpos($ret, ")");
        $ret = substr($ret, $l + 1, $r - $l - 1);
        return json_decode($ret, true);
    }

    /**
     * 获取QQ Web登陆 用户数据
     *
     * @param string $appid
     * @param string $appsecret
     * @param string $code
     * @param string $callback
     * @return array
     */
    public static function getWebQQUserInfo($appid, $appsecret, $code, $callback)
    {
        $tokenInfo1 = Http::get(
            'https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=' . $appid . '&client_secret=' . $appsecret . '&code=' . $code . '&redirect_uri=' . urlencode($callback)
        );
        parse_str($tokenInfo1, $tokenInfo);
        if (empty($tokenInfo['access_token'])) {
            return false;
        }
        $accessToken = $tokenInfo['access_token'];
        $url = '';
        $openInfo = Http::get('https://graph.qq.com/oauth2.0/me?access_token=' . $accessToken);
        $l = strpos($openInfo, "(");
        $r = strrpos($openInfo, ")");
        $openInfo = substr($openInfo, $l + 1, $r - $l - 1);
        $openInfo = json_decode($openInfo, true);
        if (empty($openInfo['openid'])) {
            return false;
        }
        //获取unionid
        $uInfo = Http::get('https://graph.qq.com/oauth2.0/me?access_token=' . $accessToken . '&unionid=1');
        $l = strpos($uInfo, "(");
        $r = strrpos($uInfo, ")");
        $uInfo = substr($uInfo, $l + 1, $r - $l - 1);
        $uInfo = json_decode($uInfo, true);
        $openid = $openInfo['openid'];
        $unionid = '';
        if (!empty($uInfo['unionid'])) {
            $unionid = $uInfo['unionid'];
        }
        //获取用户信息
        $userInfo = Http::get(
            'https://graph.qq.com/user/get_user_info',
            array('access_token' => $accessToken, 'openid' => $openid, 'oauth_consumer_key' => $appid)
        );
        $userInfo = json_decode($userInfo, true);
        if (empty($userInfo['nickname'])) {
            return false;
        }
        $nick = $userInfo['nickname'];
        $avatar = $userInfo['figureurl_qq_2'];
        return array(
            'openid' => $openid,
            'unionid' => $unionid,
            'nick' => $nick,
            'avatar' => $avatar
        );
    }

    public static function getWechatUserInfo($appid, $appsecret, $code)
    {
        $tokenInfo = Http::get(
            'https://api.weixin.qq.com/sns/oauth2/access_token',
            array('appid' => $appid, 'secret' => $appsecret, 'code' => $code, 'grant_type' => 'authorization_code')
        );
        $tokenInfo = json_decode($tokenInfo, true);
        if (empty($tokenInfo['access_token'])) {
            return false;
        }
        $accessToken = $tokenInfo['access_token'];
        $openid = $tokenInfo['openid'];
        $userInfo = Http::get(
            'https://api.weixin.qq.com/sns/userinfo',
            array('access_token' => $accessToken, 'openid' => $openid)
        );
        $userInfo = json_decode($userInfo, true);
        if (empty($userInfo['openid'])) {
            return false;
        }
        $unionid = '';
        if (!empty($userInfo['unionid'])) {
            $unionid = $userInfo['unionid'];
        }
        return array(
            'openid' => $openid,
            'unionid' => $unionid,
            'nick' => $userInfo['nickname'],
            'avatar' => $userInfo['headimgurl']
        );
    }
}