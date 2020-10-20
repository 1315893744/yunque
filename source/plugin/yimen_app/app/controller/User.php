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

use app\Db;
use app\lib\Random;
use app\service\User as UserService;

class User extends Base
{
    public function lists()
    {
        $count = UserService::getCount();
        $pages = $count / $_POST['size'];
        if (empty($_POST['page']) && empty($_POST['size'])) {
            return json([
                'code' => 0,
                'msg' => '5Y+C5pWw5LiN6IO95Li656m6'
            ]);
        }
        if ($_POST['page'] > $pages + 1) {
            return json([
                'code' => 0,
                'msg' => '5pqC5peg5pWw5o2u'
            ]);
        }
        return json([
            'code' => 1,
            'msg' => '6I635Y+W55So5oi35YiX6KGo5oiQ5Yqf',
            'data' => array(
                'count' => intval($count),
                'list' => UserService::getList($_POST['page'], $_POST['size'])
            )
        ]);
    }

    public function get_login_config()
    {
        return $this->success('6I635Y+W55m75b2V6YWN572u5oiQ5Yqf', [
            'head_img' => $this->set->get('login_global.head_img'),
            'button_left_color' => $this->set->get('login_global.button_left_color'),
            'button_right_color' => $this->set->get('login_global.button_right_color'),
            'app_qq' => $this->set->get('login_qq.app_login'),
            'h5_qq' => $this->set->get('login_qq.h5_login'),
            'app_wx' => $this->set->get('login_wechat.app_login'),
            'h5_wx' => $this->set->get('login_wechat.h5_login'),
            'gzh_wx' => $this->set->get('login_wechat.wx_login'),
            'app_wb' => $this->set->get('login_sina.app_login'),
            'h5_wb' => $this->set->get('login_sina.h5_login'),
            'pc_qq' => $this->set->get('login_qq.pc_login'),
            'pc_wx' => $this->set->get('login_wechat.pc_login'),
            'pc_wb' => $this->set->get('login_sina.pc_login'),
            'agreement_url' => $this->set->get('login_global.agreement_url')
        ]);
    }

    public function check_username()
    {
        $username = param('username');
        if (empty($username)) {
            return $this->error('55So5oi35ZCN5LiN6IO95Li656m6');
        }
        $checkUserCode = UserService::checkUsername($username);
        switch ($checkUserCode) {
            case 1:
                return $this->success('55So5oi35ZCN5Y+v55So');
                break;
            case -1:
                return $this->error('55So5oi35ZCN5LiN6IO95bCP5LqO5LiJ5L2N');
                break;
            case -2:
                return $this->error('55So5oi35ZCN5LiN6IO95aSn5LqO5Y2B5LqU5L2N');
                break;
            default:
                return $this->error('55So5oi35ZCN6ZSZ6K+v');
                break;
        }
    }

    public function check_email()
    {
        $email = param('email');
        if (empty($email)) {
            return $this->error('6YKu566x5LiN6IO95Li656m6');
        }
        $checkEmailCode = uc_user_checkemail($email);
        if ($checkEmailCode == -4) {
            return $this->error('6YKu566x5qC85byP5LiN5q2j56Gu');
        }
        if ($checkEmailCode == -6) {
            return $this->error('6YKu566x5bey6KKr5rOo5YaM');
        }
        if ($checkEmailCode != 1) {
            return $this->error('6YKu566x5qC85byP6ZSZ6K+v');
        }
        return $this->success('6YKu566x5Y+v55So');
    }

    public function login()
    {
        $username = param('username');
        $password = param('password');
        if (empty($username) || empty($password)) {
            return $this->error('55So5oi35ZCN5oiW5a+G56CB5LiN6IO95Li656m6');
        }
        $res = uc_user_login($username, $password, 0, 0);
        if ($res[0] < 1) {
            return $this->error('55So5oi35ZCN5oiW5a+G56CB6ZSZ6K+v');
        }
        //do login success
        $uid = $res[0];
        uc_user_synlogin($uid);
        $member = getuserbyuid($uid, 1);
        setloginstatus($member, 1296000);
        return $this->success('55m75b2V5oiQ5Yqf');
    }

    public function bind_check()
    {
        $openid = param('openid');
        $userInfo = UserService::getByOpenid($openid);
        if (!$userInfo || $userInfo['uid'] != '') {
            return $this->error('57uR5a6a6LSm5Y+35LiN5a2Y5Zyo');
        }
        if ($userInfo['update_time'] + 180 < time()) {
            return $this->error('57uR5a6a5pe26Ze06L+H5pyf');
        }
        return $this->success('6I635Y+W5L+h5oGv5oiQ5Yqf', [
            'nick' => $userInfo['nick'],
            'avatar' => $userInfo['avatar']
        ]);
    }

    public function bind()
    {
        $type = param('type');
        $username = param('username');
        $password = param('password');
        $openid = param('openid');
        if (empty($username) || empty($password)) {
            return $this->error('55So5oi35ZCN5oiW5a+G56CB5LiN6IO95Li656m6');
        }
        $userInfo = UserService::getByOpenid($openid);
        if ($userInfo['uid'] != '' || $userInfo['username'] != '') {
            return $this->error('6K+l6LSm5Y+35bey6KKr57uR5a6a');
        }
        if ($userInfo['update_time'] + 180 < time()) {
            return $this->error('57uR5a6a5pe26Ze06L+H5pyf');
        }
        if (UserService::getByUsername($username)) {
            return $this->error('6K+l6LSm5Y+35bey6KKr57uR5a6a');
        }
        if ($type == 'bind') {
            $res = uc_user_login($username, $password, 0, 0);
            if ($res[0] < 1) {
                return $this->error('55So5oi35ZCN5oiW5a+G56CB6ZSZ6K+v');
            }
            //update user
            $uid = $res[0];
            //do login success
            $up = UserService::upByOpenid($openid, array(
                'uid' => $uid,
                'username' => $username,
                'password' => md5($password),
                'email' => $res[3],
                'state' => 1,
                'update_time' => time()
            ));
            if (!$up) {
                return $this->error('57uR5a6a5aSx6LSl');
            }
            uc_user_synlogin($uid);
            $member = getuserbyuid($uid, 1);
            setloginstatus($member, 1296000);
            return $this->success('55m75b2V5oiQ5Yqf');
        } else {
            $email = param('email');
            if (empty($email)) {
                return $this->error('5rOo5YaM5L+h5oGv5LiN6IO95Li656m6');
            }
            $checkUserCode = UserService::checkUsername($username);
            if ($checkUserCode != 1) {
                return $this->error('55So5oi35ZCN5qC85byP6ZSZ6K+v5oiW5bey6KKr5rOo5YaM');
            }
            $checkEmailCode = uc_user_checkemail($email);
            if ($checkEmailCode != 1) {
                return $this->error('6YKu566x5qC85byP6ZSZ6K+v5oiW5bey6KKr5rOo5YaM');
            }
            $uid = UserService::addUser($username, $password, $email);
            if ($uid < 1) {
                return $this->error('5rOo5YaM57mB5b+Z77yM6K+356iN5ZCO5YaN6K+V');
            }
            $up = UserService::upByOpenid($openid, array(
                'uid' => $uid,
                'username' => $username,
                'password' => md5($password),
                'email' => $email,
                'state' => 1,
                'update_time' => time()
            ));
            if (!$up) {
                return $this->error('57uR5a6a5aSx6LSl');
            }
            $money = $this->set->get('login_global.send_money');
            if ($money > 0) {
                UserService::sendMoney($uid, $money, $this->set->get('pay_global.money_type'), 'login');
            }
            uc_user_synlogin($uid);
            $member = getuserbyuid($uid, 1);
            setloginstatus($member, 1296000);
            return $this->success('5rOo5YaM5oiQ5Yqf', ['uid' => $uid, 'username' => $username]);
        }
    }

    public function reg()
    {
        $username = param('username');
        $password = param('password');
        $email = param('email');
        if (empty($username) || empty($password) || empty($email)) {
            return $this->error('5rOo5YaM5L+h5oGv5LiN6IO95Li656m6');
        }
        $checkUserCode = UserService::checkUsername($username);
        if ($checkUserCode != 1) {
            return $this->error('55So5oi35ZCN5qC85byP6ZSZ6K+v5oiW5bey6KKr5rOo5YaM');
        }
        $checkEmailCode = uc_user_checkemail($email);
        if ($checkEmailCode != 1) {
            return $this->error('6YKu566x5qC85byP6ZSZ6K+v5oiW5bey6KKr5rOo5YaM');
        }
        $uid = UserService::addUser($username, $password, $email);
        if ($uid < 1) {
            return $this->error('5rOo5YaM57mB5b+Z77yM6K+356iN5ZCO5YaN6K+V');
        }
        $money = $this->set->get('login_global.send_money');
        if ($money > 0) {
            UserService::sendMoney($uid, $money, $this->set->get('pay_global.money_type'), 'login');
        }
        //do reg success
        return $this->success('5rOo5YaM5oiQ5Yqf', ['uid' => $uid, 'username' => $username]);
    }

    //app scan login
    public function scan()
    {
        //::todo
        $scan = $this->set->get('login_global.scan') ?: 0;
        if (intval($scan) == 0) {
            return $this->error('5omr56CB55m75b2V5pqC5pyq5byA5ZCv');
        }
        $code = Random::alpha(16);
        $ins = Db::table('yimen_scan')->insert([
            'uid' => 0,
            'code' => $code,
            'state' => 0,
            'create_time' => time(),
            'update_time' => 0
        ]);
        if (!$ins) {
            return $this->error('55Sf5oiQ5aSx6LSl77yM6K+356iN5ZCO5YaN6K+V');
        }
        return $this->success('55Sf5oiQ5oiQ5Yqf', [
            'code' => $code
        ]);
    }

    //app sacn login notify
    public function scan_notify()
    {
        $uid = get_uid();
        if ($uid < 1) {
            return $this->error('6K+355m75b2V5ZCO5YaN6L+b6KGM5omr56CB');
        }
        $code = param('code');
        $res = Db::table('yimen_scan')->where('code', $code)->where('state', 0)->where('create_time', '>=', time() - 300)->first();
        if ($res) {
            $s = Db::table('yimen_scan')->where('id', $res['id'])->update([
                'uid' => $uid,
                'state' => 1,
                'update_time' => time()
            ]);
            if ($s) {
                return $this->success('55m75b2V5oiQ5Yqf');
            } else {
                return $this->error('55m75b2V5aSx6LSl77yM6K+356iN5ZCO5YaN6K+V');
            }
        }
        return $this->error('6K+36YeN5paw55Sf5oiQ5LqM57u056CB');
    }

    //app scan login check
    public function scan_check()
    {
        $code = param('code');
        $type = param('type') ?: 'pc';
        $res = Db::table('yimen_scan')->where('code', $code)->where('create_time', '>=', time() - 300)->first();
        if (!$res) {
            return $this->error('6K+36YeN5paw55Sf5oiQ5LqM57u056CB');
        }
        if ($res['state'] == 0) {
            if ($type == 'app') {
                return $this->success('562J5b6F55So5oi35omr56CB');
            }
            return $this->error('562J5b6F55So5oi35omr56CB');
        }
        if ($res['state'] == 2) {
            return $this->error('5b2T5YmN5LqM57u056CB5bey5aSx5pWI');
        }
        if ($type == 'app') {
            return $this->error('5bey57uP5omr56CB5LqG');
        }
        Db::table('yimen_scan')->where('id', $res['id'])->update([
            'state' => 2,
            'update_time' => time()
        ]);
        //do login
        uc_user_synlogin($res['uid']);
        $member = getuserbyuid($res['uid'], 1);
        setloginstatus($member, 1296000);
        return $this->success('55m75b2V5oiQ5Yqf');
    }

    public function down()
    {
        $url = $this->set->get('login_global.app_url') ?: '';
        if ($url == '') {
            die(base64_decode('5b2T5YmN5rKh5pyJYXBw5LiL6L295Zyw5Z2A'));
        }
        header('Location: ' . $url);
    }
}