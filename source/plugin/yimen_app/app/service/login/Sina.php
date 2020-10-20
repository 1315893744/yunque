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

use app\lib\sina\SaeTClientV2;
use app\lib\sina\SaeTOAuthV2;

class Sina
{
    protected $client;
    protected $oauth;
    protected $appkey;
    protected $secret;
    protected $callback;
    protected $code;
    protected $accessToken;
    protected $userInfo;

    public function __construct($appkey, $secret)
    {
        $this->appkey = $appkey;
        $this->secret = $secret;
        $this->oauth = new SaeTOAuthV2($appkey, $secret);
    }

    public function init($openid, $accessToken)
    {
        $this->userInfo['openid'] = $openid;
        $this->accessToken = $accessToken;
        return $this;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function setCallback($callback)
    {
        $this->callback = $callback;
        return $this;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getAccessToken()
    {
        if (isset($this->accessToken)) return $this->accessToken;
        $accessToken = $this->oauth->getAccessToken('code', [
            'code' => $this->code,
            'redirect_uri' => $this->callback
        ]);
        if (!$accessToken) return false;
        $this->accessToken = $accessToken;
        return $this->accessToken;
    }

    public function getOpenid()
    {
        $client = $this->getClient();
        if (!$client) return false;
        $this->userInfo['openid'] = $client->get_uid()['uid'];
        return $this->userInfo['openid'];
    }

    public function getUserInfo()
    {
        $sinaClient = $this->getClient();
        $userInfo = $sinaClient->show_user_by_id($this->getOpenid());
        $this->userInfo['unionid'] = $this->userInfo['openid'];
        $this->userInfo['nick'] = $userInfo['screen_name'];
        $this->userInfo['avatar'] = $userInfo['profile_image_url'];
        return $this->userInfo;
    }

    public function getClient()
    {
        if (isset($this->client)) return $this->client;
        $this->client = new SaeTClientV2($this->appkey, $this->secret, $this->getAccessToken());
        return $this->client;
    }
}