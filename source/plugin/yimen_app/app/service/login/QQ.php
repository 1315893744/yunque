<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/17 17:41
 * @Last Modified by: ofearn@qq.com
 */

namespace app\service\login;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\lib\Http;

class QQ
{
    protected $Urls = [
        'me' => 'https://graph.qq.com/oauth2.0/me',
        'token' => 'https://graph.qq.com/oauth2.0/token',
        'get_user_info' => 'https://graph.qq.com/user/get_user_info'
    ];
    protected $appid;
    protected $secret;
    protected $callback;
    protected $code;
    protected $accessToken;
    protected $userInfo;

    public function __construct($id, $secret)
    {
        $this->appid = $id;
        $this->secret = $secret;
    }

    public function setCallback($back)
    {
        $this->callback = $back;
        return $this;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function getAccessToken()
    {
        if (isset($this->accessToken)) {
            return $this->accessToken;
        }
        $tokenInfo = Http::get($this->Urls['token'] . '?grant_type=authorization_code&client_id='
            . $this->appid . '&client_secret=' . $this->secret . '&code=' . $this->code .
            '&redirect_uri=' . urlencode($this->callback));
        parse_str($tokenInfo, $info);
        if (empty($info['access_token'])) return false;
        $this->accessToken = $info['access_token'];
        return $info['access_token'];
    }

    public function getUserInfo()
    {
        $userInfo = Http::get(
            $this->Urls['get_user_info'], [
            'access_token' => $this->getAccessToken(),
            'openid' => $this->getOpenid(),
            'oauth_consumer_key' => $this->appid
        ]);
        $userInfo = json_decode($userInfo, true);
        if (empty($userInfo['nickname'])) {
            return false;
        }
        $this->userInfo['nick'] = $userInfo['nickname'];
        $this->userInfo['avatar'] = $userInfo['figureurl_qq_2'];
        return $this->userInfo;
    }

    public function getOpenid()
    {
        if (isset($this->userInfo['openid'])) {
            return $this->userInfo['openid'];
        }
        $data = Http::get($this->Urls['me'], ['access_token' => $this->getAccessToken()]);
        $data = $this->pack($data);
        if (isset($data['error'])) return false;
        $this->userInfo['openid'] = $data['openid'];
        $this->getUnionid();
        return $data['openid'];
    }

    public function getUnionid()
    {
        if (isset($this->userInfo['unionid'])) {
            return $this->userInfo['unionid'];
        }
        $data = Http::get($this->Urls['me'],
            ['access_token' => $this->getAccessToken(), 'unionid' => 1]);
        $data = $this->pack($data);
        if (isset($data['error'])) return false;
        $this->userInfo['unionid'] = $data['unionid'];
        return $data['unionid'];
    }

    protected function pack($data)
    {
        $l = strpos($data, "(");
        $r = strrpos($data, ")");
        $data = substr($data, $l + 1, $r - $l - 1);
        return json_decode($data, true);
    }
}