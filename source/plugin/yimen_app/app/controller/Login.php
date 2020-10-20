<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/16 16:24
 * @Last Modified by: ofearn@qq.com
 */

namespace app\controller;
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

use app\lib\Random;
use app\service\User;
use app\service\login\QQ;
use app\service\login\Sina;
use app\service\login\Wechat;

class Login extends Base
{
    protected $type;

    public function __construct($controller = '')
    {
        parent::__construct($controller);
    }

    public function get_oauth_url()
    {
        //Need oauth jump pages
        $backUrl = [
            'qq' => $this->siteUrl . 'plugin.php?id=yimen_app&s=login/qq',
            'pc_wechat' => $this->siteUrl . 'plugin.php?id=yimen_app&s=login/pc_wechat',
            'wechat' => $this->siteUrl . 'plugin.php?id=yimen_app&s=login/wechat',
            'sina' => $this->siteUrl . 'plugin.php?id=yimen_app&s=login/sina',
            'wechat_pay' => $this->siteUrl . 'plugin.php?id=yimen_app&s=pay/wechat_mp&order_id=' . param('order_id')
        ];
        $urlArr = [
            'qq' => 'https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=' . $this->set->get('login_qq.pc_appid')
                . '&redirect_uri=' . urlencode($backUrl['qq']) . '&state=yimen_app&scope=get_user_info,list_album,upload_pic,do_like',
            'pc_wechat' => 'https://open.weixin.qq.com/connect/qrconnect?appid=' . $this->set->get('login_wechat.pc_appid')
                . '&redirect_uri=' . urlencode($backUrl['pc_wechat']) . '&response_type=code&scope=snsapi_login&state=yimen#wechat_redirect',
            'wechat' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this->set->get('login_wechat.wx_appid')
                . '&redirect_uri=' . urlencode($backUrl['wechat']) . '&response_type=code&scope=snsapi_base,snsapi_userinfo&state=yimemapp#wechat_redirect',
            'sina' => 'https://api.weibo.com/oauth2/authorize?client_id=' . $this->set->get('login_sina.pc_appkey')
                . '&response_type=code&redirect_uri=' . urlencode($backUrl['sina']),
            'wechat_pay' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this->set->get('login_wechat.wx_appid')
                . '&redirect_uri=' . urlencode($backUrl['wechat_pay']) . '&response_type=code&scope=snsapi_userinfo&state=yimemapp#wechat_redirect',
        ];
        $type = param('type');
        if (empty($urlArr[$type])) {
            return json([
                'code' => 0,
                'msg' => '5b2T5YmN55m75b2V5pa55byP5LiN5a2Y5Zyo'
            ]);
        }
        return json([
            'code' => 1,
            'msg' => '6I635Y+W5oiQ5Yqf',
            'url' => $urlArr[$type]
        ]);
    }

    public function app_qq()
    {
        if ($this->set->get('login_qq.app_login') != 1) {
            return json([
                'code' => 0,
                'msg' => '55m75b2V5pa55byP5pyq5byA5ZCv'
            ]);
        }
        $request = $_REQUEST;
        $openid = $request['openid'];
        if (empty($openid)) {
            return json([
                'code' => 0,
                'msg' => 'UVHmjojmnYPkv6Hmga/plJnor68='
            ]);
        }
        $qq = new QQ('', '');
        $checkOpenid = $qq->setAccessToken($request['at'])->getOpenid();
        if ($checkOpenid != $openid) {
            return json([
                'code' => 0,
                'msg' => 'UVHmjojmnYPkv6Hmga/plJnor68='
            ]);
        }
        $this->userInfo = [
            'openid' => $openid,
            'unionid' => $qq->getUnionid() ?: '',
            'nick' => $request['nickname'],
            'avatar' => urldecode($request['figureurl'])
        ];
        $this->type = 'qq';
        return $this->toLogin();
    }

    public function app_wechat()
    {
        if ($this->set->get('login_wechat.app_login') != 1) {
            return json([
                'code' => 0,
                'msg' => '55m75b2V5pa55byP5pyq5byA5ZCv'
            ]);
        }
        $request = $_REQUEST;
        $code = $request['code'];
        if (empty($request['openid']) || empty($request['unionid'])) {
            $wechat = new Wechat($this->set->get('login_wechat.app_appid'), $this->set->get('login_wechat.app_secret'));
            $userInfo = $wechat->setCode($code)->getUserInfo();
            if (!$userInfo) {
                return json([
                    'code' => 0,
                    'msg' => '5b6u5L+h5o6I5p2D5L+h5oGv6ZSZ6K+v'
                ]);
            }
            $this->userInfo = $userInfo;
        } else {
            $this->userInfo = [
                'openid' => $request['openid'],
                'unionid' => $request['unionid'],
                'nick' => $request['nickname'],
                'avatar' => urldecode($request['headimgurl'])
            ];
        }
        $this->type = 'wechat';
        return $this->toLogin();
    }

    public function app_sina()
    {
        if ($this->set->get('login_sina.app_login') != 1) {
            return json([
                'code' => 0,
                'msg' => '55m75b2V5pa55byP5pyq5byA5ZCv'
            ]);
        }
        $request = $_REQUEST;
        $accessToken = $request['token'];
        $openid = $request['uid'];
        if (empty($accessToken) || empty($openid)) {
            return json([
                'code' => 0,
                'msg' => '5paw5rWq5o6I5p2D5L+h5oGv6ZSZ6K+v'
            ]);
        }
        $sina = new Sina($this->set->get('login_sina.app_appkey'), $this->set->get('login_sina.app_secret'));
        $userInfo = $sina->init($openid, $accessToken)->getUserInfo();
        $this->userInfo = $userInfo;
        $this->type = 'sina';
        return $this->toLogin();
    }

    private static function checkmobile()
    {
        global $_G;//全局变量，在discuz中使用，其他地方可忽略
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
            $_G['mobile'] = $v;
            return true;//手机端访问，返回true
        }
        $brower = array('mozilla', 'chrome', 'safari', 'opera', 'm3gate', 'winwap', 'openwave', 'myop');
        if (dstrpos($useragent, $brower)) return false;//PC浏览器访问，返回false

        $_G['mobile'] = 'unknown';//未能识别，根据访问的URL强制默认是否手机端
        if ($_GET['mobile'] === 'yes') {
            return true;
        } else {
            return false;
        }
    }

    public function qq()
    {
        if (self::checkmobile() && $this->set->get('login_qq.h5_login') != 1) {
            return $this->jump(false, ['msg' => '55m75b2V5pa55byP5pyq5byA5ZCv']);
        }
        if (!self::checkmobile() && $this->set->get('login_qq.pc_login') != 1) {
            return $this->jump(false, ['msg' => '55m75b2V5pa55byP5pyq5byA5ZCv']);
        }
        $request = $_REQUEST;
        $code = $request['code'];
        if (empty($code)) {
            return $this->jump(false, ['msg' => 'UVHmjojmnYPlpLHotKXvvIzor7fph43or5U=']);
        }
        $url = $this->siteUrl . 'plugin.php?id=yimen_app&s=login/qq';
        $qq = new QQ($this->set->get('login_qq.pc_appid'), $this->set->get('login_qq.pc_secret'));
        $userInfo = $qq->setCode($code)->setCallback($url)->getUserInfo();
        if (!$userInfo) {
            return $this->jump(false, ['msg' => 'UVHmjojmnYPkv6Hmga/plJnor68=']);
        }
        $this->userInfo = $userInfo;
        $this->type = 'qq';
        return $this->toLogin(false);
    }


    public function pc_wechat()
    {
        if ($this->set->get('login_wechat.pc_login') != 1) {
            return $this->jump(false, ['msg' => '55m75b2V5pa55byP5pyq5byA5ZCv']);
        }
        $request = $_REQUEST;
        $code = $request['code'];
        if (empty($code)) {
            return $this->jump(false, ['msg' => '5b6u5L+h5o6I5p2D5aSx6LSl77yM6K+36YeN6K+V']);
        }
        $wechat = new Wechat($this->set->get('login_wechat.pc_appid'), $this->set->get('login_wechat.pc_secret'));
        $userInfo = $wechat->setCode($code)->getUserInfo();
        if (!$userInfo) {
            return $this->jump(false, ['msg' => '5b6u5L+h5o6I5p2D5L+h5oGv6ZSZ6K+v']);
        }
        $this->userInfo = $userInfo;
        $this->type = 'wechat';
        return $this->toLogin(false);
    }

    public function sina()
    {
        if (self::checkmobile() && $this->set->get('login_sina.h5_login') != 1) {
            return $this->jump(false, ['msg' => '55m75b2V5pa55byP5pyq5byA5ZCv']);
        }
        if (!self::checkmobile() && $this->set->get('login_sina.pc_login') != 1) {
            return $this->jump(false, ['msg' => '55m75b2V5pa55byP5pyq5byA5ZCv']);
        }
        $request = $_REQUEST;
        $code = $request['code'];
        if (empty($code)) {
            return $this->jump(false, ['msg' => '5paw5rWq5o6I5p2D5aSx6LSl77yM6K+36YeN6K+V']);
        }
        $sina = new Sina($this->set->get('login_sina.pc_appkey'), $this->set->get('login_sina.pc_secret'));
        $url = $this->siteUrl . 'plugin.php?id=yimen_app&s=login/sina';
        $userInfo = $sina->setCode($code)->setCallback($url)->getUserInfo();
        if (!$userInfo) {
            return $this->jump(false, ['msg' => '5paw5rWq5o6I5p2D5L+h5oGv6ZSZ6K+v']);
        }
        $this->userInfo = $userInfo;
        $this->type = 'sina';
        return $this->toLogin(false);
    }

    public function wechat()
    {
        if ($this->set->get('login_wechat.wx_login') != 1) {
            return $this->jump(false, ['msg' => '55m75b2V5pa55byP5pyq5byA5ZCv']);
        }
        $request = $_REQUEST;
        $code = $request['code'];
        if (empty($code)) {
            return $this->jump(false, ['msg' => '5b6u5L+h5o6I5p2D5aSx6LSl77yM6K+36YeN6K+V']);
        }
        $wechat = new Wechat($this->set->get('login_wechat.wx_appid'), $this->set->get('login_wechat.wx_secret'));
        $userInfo = $wechat->setCode($code)->getUserInfo();
        if (!$userInfo) {
            return $this->jump(false, ['msg' => '5b6u5L+h5o6I5p2D5L+h5oGv6ZSZ6K+v']);
        }
        $this->userInfo = $userInfo;
        $this->type = 'wechat';
        return $this->toLogin(false);
    }


    protected function toLogin($isJson = true)
    {
        $info = $this->userInfo;
        $nick = sChar($info['nick']);
        $info['nick'] = base64_encode($info['nick']);
        if ($info['unionid'] != '') {
            $user = User::getByUnionid($info['unionid'], $this->type);
        } else {
            $user = User::getByOpenid($info['openid'], $this->type);
        }
        $isSave = $this->set->get('login_global.save_img') == 1 ? true : false;
        if ($user) {
            if ($user['uid'] == '') {
                User::upById($user['id'], array('update_time' => time()));
                return $this->jump($isJson, [
                    'code' => 2,
                    'msg' => '562J5b6F57uR5a6a',
                    'data' => array('token' => $info['openid']),
                    'url' => './source/plugin/yimen_app/static/h5/#/bind/' . $info['openid']
                ]);
            }
            if ($user['state'] == 0) {
                return $this->jump($isJson, [
                    'code' => 0,
                    'msg' => '55So5oi35bey6KKr5bCB56aB'
                ]);
            }
            if ($user['unionid'] == '' && $info['unionid'] != '') {
                User::upById($user['id'], array('unionid' => $info['unionid']));
            }
            if ($info['avatar'] != '' && $user['avatar'] != $info['avatar'] && $isSave) {
                User::upById($user['id'], array('avatar' => $info['avatar']));
                User::savaUserAvatar($user['id'], $info['avatar']);
            }
            uc_user_synlogin($user['uid']);
            $member = getuserbyuid($user['uid'], 1);
            setloginstatus($member, 1296000);
            User::upById($user['id'], array('update_time' => time()));
            return $this->jump($isJson, [
                'code' => 1,
                'msg' => '55m75b2V5oiQ5Yqf'
            ]);
        } else {
            if ($this->set->get('login_global.is_bind') == 1 && is_mobile()) {
                $ins = User::add(array(
                    'username' => '',
                    'password' => '',
                    'openid' => $info['openid'] ?: '',
                    'unionid' => $info['unionid'] ?: '',
                    'nick' => $info['nick'],
                    'avatar' => $info['avatar'],
                    'email' => '',
                    'platform' => $this->type,
                    'state' => 2,
                    'create_time' => time(),
                    'update_time' => time()
                ));
                if ($ins) {
                    return $this->jump($isJson, [
                        'code' => 2,
                        'msg' => '562J5b6F57uR5a6a',
                        'data' => array('token' => $info['openid']),
                        'url' => './source/plugin/yimen_app/static/h5/#/bind/' . $info['openid']
                    ]);
                } else {
                    return $this->jump($isJson, [
                        'code' => 0,
                        'msg' => '6YKu566x5qC85byP6ZSZ6K+v'
                    ]);
                }
            } else {
                $username = strtolower(Random::alpha(6));
                $password = Random::alnum(8);
                $usernames = $nick == "" ? $username : $nick;
                $r = User::checkUsername($usernames);
                if ($r != 1) {
                    $usernames = Random::alpha(6);
                }
                $uid = User::addUser($usernames, $password, $username . '@qq.com');
                if ($uid > 0) {
                    $ins = User::add(array(
                        'uid' => $uid,
                        'username' => $username,
                        'password' => $password,
                        'openid' => $info['openid'] ?: '',
                        'unionid' => $info['unionid'] ?: '',
                        'nick' => $info['nick'],
                        'avatar' => $info['avatar'],
                        'email' => $username . '@qq.com',
                        'platform' => $this->type,
                        'state' => 1,
                        'create_time' => time(),
                        'update_time' => time()
                    ));
                    $money = $this->set->get('login_global.send_money');
                    if ($money > 0) {
                        User::sendMoney($uid, $money, $this->set->get('pay_global.money_type'), 'login');
                    }
                    if (!$ins) {
                        return $this->jump($isJson, [
                            'code' => 0,
                            'msg' => '55m75b2V57mB5b+Z77yM56iN5ZCO5YaN6K+V'
                        ]);
                    } else {
                        if ($info['avatar'] != '' && $isSave) {
                            //Save Avatar
                            User::savaUserAvatar($uid, $info['avatar']);
                        }
                        uc_user_synlogin($uid);
                        $member = getuserbyuid($uid, 1);
                        setloginstatus($member, 1296000);
                        return $this->jump($isJson, [
                            'code' => 1,
                            'msg' => '55m75b2V5oiQ5Yqf'
                        ]);
                    }
                } else {
                    return $this->jump($isJson, [
                        'code' => 0,
                        'msg' => '6YKu566x5qC85byP6ZSZ6K+v'
                    ]);
                }
            }
        }
        return $this->jump($isJson, [
            'code' => 0,
            'msg' => 'err'
        ]);
    }
}