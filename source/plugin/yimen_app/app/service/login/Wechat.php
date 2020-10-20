<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/17 18:25
 * @Last Modified by: ofearn@qq.com
 */

namespace app\service\login;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\lib\Http;

class Wechat
{
    protected $urlArr = [
        'access_token' => 'https://api.weixin.qq.com/sns/oauth2/access_token',
        'user_info' => 'https://api.weixin.qq.com/sns/userinfo'
    ];
    protected $appid;
    protected $secret;
    protected $code;
    protected $accessToken;
    protected $userInfo;


    public function __construct($appid, $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getToken()
    {
        if (empty($this->code)) return false;
        if ($this->accessToken) return $this->accessToken;
        $tokenInfo = Http::get($this->urlArr['access_token'],
            array('appid' => $this->appid, 'secret' => $this->secret, 'code' => $this->code, 'grant_type' => 'authorization_code')
        );
        $tokenInfo = json_decode($tokenInfo, true);
        if (empty($tokenInfo['access_token'])) {
            return false;
        }
        $this->accessToken = $tokenInfo['access_token'];
        $this->userInfo['openid'] = $tokenInfo['openid'];
        return $this->accessToken;
    }

    public function getOpenid()
    {
        $this->getToken();
        return $this->userInfo['openid'];
    }

    public function getUserInfo()
    {
        $userInfo = Http::get($this->urlArr['user_info'],
            array('access_token' => $this->getToken(), 'openid' => $this->userInfo['openid'])
        );
        $userInfo = json_decode($userInfo, true);
        if (empty($userInfo['openid'])) {
            return false;
        }
        $this->userInfo['unionid'] = empty($userInfo['unionid']) ? '' : $userInfo['unionid'];
        $this->userInfo['nick'] = $userInfo['nickname'];
        $this->userInfo['avatar'] = $userInfo['headimgurl'];
        return $this->userInfo;
    }
}