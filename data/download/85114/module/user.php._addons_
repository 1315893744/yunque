<?php

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

include DISCUZ_ROOT . './config/config_ucenter.php';

//统一处理模块参数
$filter =   array(
    'username'  => 's',
    'password'  => 's',
    'type'      => 's',
    'uid'       => 's',
    'email'     => 's',
    'code'      => 's',         // Authorization Code
    'client_id' => 's',         // App Key
    'sk'        => 's',         // App Secret
    'bd_account'=> 's',         // 百度账号或昵称
);
$param = request_params::filterInput($filter, $_GET);
$params = array_merge($params, $param);

try {
    switch ($params['action']) {
        case 'session':
            $arrResonse['data'] = getSessionKeyByCode($params, $_G);
            break;
        case 'isbind':
            $arrResonse['data'] = isBindAcountBd2Dz($params, $_G);
            break;
        case 'bind':
            $arrResonse['data'] = bindAcountBd2Dz($params, $_G);
            break;
        case 'login':           //登录
            $arrResonse['data'] = login($params, $_G);
            break;
        case 'register':        //注册
            $arrResonse['data'] = register($params, $_G);
            break;
        case 'userinfo':        //用户信息
            $arrResonse['data'] = getUserInfo($params, $_G);
            break;
        case 'mythread':        //我的帖子
            $arrResonse['data'] = getMyThread($params, $_G);
            break;
        case 'verify':          //二维码(验证信息放在header)
            imgVerify($_G);
            break;
        case 'rgagreement':     //获取用户服务条款
            $arrResonse['data'] = registerAgreement($params, $_G);
            break;
        case 'version':
            // 获取插件版本
            $plugin = C::t('common_plugin')->fetch_by_identifier(BAIDUSM_PLUGIN);
            if (!empty($plugin)) {
                $arrResonse['data'] = $plugin['version'];
            }
            break;
        default:
            throw new discuz_exception(error_plugin::ERROR_ACTION_INVALID, $params['action']);
    }
} catch (discuz_exception $e) {
    //统一报错处理
    $arrResonse = array(
        "errNo"     =>  $e->getCode(),
        "errMsg"    =>  $e->getMessage(),
        "data"      =>  array(),
    );
}

//统一数据输出
smart_core::outputJson($arrResonse);

/**
 * login
 * @description :   登录
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 11/06/2019
 */
function login($params, $_G) {
    $arrRet = array(
        "token"         =>  '',
        "expiretime"    => EXPIRETIME,
        "userInfo"      =>  array(),
    );

    $account = addslashes($params['username']);
    $pw      = addslashes($params['password']);


    // 判断是否绑定百度账号
    $isBind = isBindedBd2DzByUsername($params, $_G);
    if (!$isBind) {
        throw new discuz_exception(error_plugin::ERROR_MUST_BINDED);
    }

    if(empty($account)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_USERNAME_EMPTY);
    }
    if (empty($pw)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_PASSWORD_EMPTY);
    }

    $sql = "select uid, username, password, email, salt from ".UC_DBTABLEPRE."members where username = '" . $account . "'";
    if (UC_DBHOST != $_G['config']['db'][1]['dbhost']) {
        $res = init_db($sql);
    } else {
        $res = DB::fetch_all($sql);
    }

    if (empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_USERNAME_INVAILD);
    }
    $ret = $res[0];

    $password = md5(md5($pw).$ret['salt']);         //check密码
    if ($ret['password'] != $password) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_PASSWORD_INVAILD);
    }

    $userInfo = UserInfo($params, $ret['uid']);     //获取用户信息

    setGlobalVar($userInfo, $_G);

    $arrRet = formatUserInfo($userInfo, $_G);

    return $arrRet;
}

/**
 * isBindAcountBd2Dz
 * @description :  判断百度账号与论坛账号是否绑定,如果绑定则直接登录
 *
 * @param $params
 * @param $_G
 * @return mixed
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 23/09/2019
 */
function isBindAcountBd2Dz($params, $_G) {
    // 判断账号是否绑定
    $isBind = isBindedBd2DzByDdaccount($params, $_G);
    if (!$isBind) {
        throw new discuz_exception(error_plugin::ERROR_MUST_BINDED);
    }

    // 通过百度账号or昵称进行一键登录
    $sql = "select uid from " .DB::table('bind_bd2dz'). " where is_bind = 1 and is_delete = 0 and bd_account = '" . $params['bd_account'] . "'";
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_AUTO_LOGIN);
    }

    $ret = $res[0];
    $userInfo = UserInfo($params, $ret['uid']);     //获取用户信息

    setGlobalVar($userInfo, $_G);

    $arrRet = formatUserInfo($userInfo, $_G);

    return $arrRet;

}

/**
 * logout
 * @description :   退出登录
 *
 * @param $params
 * @param $_G
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 03/09/2019
 */
function logout($params, $_G) {
    if (empty($_G['username'])) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, '');
    }
    //更新数据
    $sqlUpdate = "UPDATE ".DB::table('login_token')." SET `is_effect`= 0  WHERE `username`='".$_G['username']."'";
    $res = DB::query($sqlUpdate);
    if (empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_UPDATE_DATA_ERROR);
    }
    // 置空全局数组
    $_G['uid']      = 0;
    $_G['username'] = '';
    $_G['adminid']  = 0;
    $_G['groupid']  = 0;
    $_G['avatar']   = '';
}

/**
 * register
 * @description :   注册
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 11/06/2019
 */
function register($params, $_G) {
    $arrRet = array(
        "token"     =>  '',
        "expiretime"    => EXPIRETIME,
        "userInfo"  =>  array(),
    );

    $isBind = isBindedBd2DzByDdaccount($params, $_G);
    if ($isBind) {
        unBindAcountBd2Dz($params, $_G);    // 解绑
    }

    $account = addslashes($params['username']);
    $pw      = addslashes($params['password']);
    $email   = addslashes($params['email']);

    if(empty($account)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_USERNAME_EMPTY);
    }
    if (empty($pw)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_PASSWORD_EMPTY);
    }
    if (empty($email)) {
        throw new discuz_exception(error_plugin::ERROR_REGISTER_EMAIL_EMPTY);
    }

    //用户名重复检查
    $sql = "select uid, username, password, email, salt from ".UC_DBTABLEPRE."members where username = '" . $account . "'";
    if (UC_DBHOST != $_G['config']['db'][1]['dbhost']) {
        $res = init_db($sql);
    } else {
        $res = DB::fetch_all($sql);
    }

    if (!empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_REGISTER_USERNAME_EXITED);
    }

    $salt       = random(6);                    //生成随机6位salt
    $password   = md5(md5($pw).$salt);          //生成新密码
    $regdate    = time();
    //创建新用户
    $data = array(
        'username'  =>  $account,
        'password'  =>  $password,
        'email'     =>  $email,
        'salt'      =>  $salt,
        'regdate'   =>  $regdate,
    );

    $sql = "INSERT INTO ".UC_DBTABLEPRE."members SET username='$account', password='$password', email='$email', regdate='{$regdate}', salt='$salt'";
    if (UC_DBHOST != $_G['config']['db'][1]['dbhost']) {
        $uid = init_db($sql, true);

    } else {
        $register = DB::query($sql);
        if (empty($register)) {
            throw new discuz_exception(error_plugin::ERROR_REGISTER_FAILED);
        }
        $uid = DB::insert_id();
    }

    $groupid = 10;
    $param = array(
        'uid'       =>  $uid,
        'email'     =>  $email,
        'username'  =>  $account,
        'password'  =>  md5($salt),
        'groupid'   =>  $groupid,
        'regdate'   =>  $regdate,
    );
    $register = DB::insert('common_member', $param);
    if (empty($register)) {
        throw new discuz_exception(error_plugin::ERROR_REGISTER_FAILED);
    }

    //获取用户信息
    $userInfo = UserInfo($params, $uid);

    setGlobalVar($userInfo, $_G);

    $arrRet = formatUserInfo($userInfo, $_G);

    $insertId = bindAcountBd2DzDB($userInfo, $params);

    $arrRet['id'] = $insertId;

    return $arrRet;
}

/**
 * getMyThread
 * @description :   我的帖子
 *
 * @param $params
 * @param $_G
 * @return array
 * @author zhaoxichao
 * @date 04/06/2019
 */
function  getMyThread($params, $_G) {
    $arrRet = array(
        'hasMore'   =>  false,
        'threadInfo'=>  array(),
        'postInfo'  =>  array(),
    );

    $page = max(1, intval($params['page']));
    $start = ($page - 1) * PAGENUM;

    // 帖子主题
    if ('all' == $params['type'] || 'threadInfo' == $params['type']) {
        $threadsData = get_my_threads('thread', 0, '', '', $start, PAGENUM + 1, '');
        if (!empty($threadsData['threadlist'])) {
            $arrRet['threadInfo'] = dealThreadInfo($threadsData['threadlist'], $threadsData['forumnames']);
            list($arrRet['threadInfo'], $threadMore) = paging($arrRet['threadInfo'], 1);
            $arrRet['hasMore'] = $threadMore;
        }
    }



    // 回复
    if ('all' == $params['type'] || 'postInfo' == $params['type']) {
        $postsData = get_my_threads('reply', 0, '', '', $start, PAGENUM + 1, '');
        if (!empty($postsData['posts'])) {
            $arrRet['postInfo'] = dealPostInfo($postsData['posts'], $postsData['threadlist'], $postsData['forumnames'], $params, $_G);
            list($arrRet['postInfo'], $postMore) = paging($arrRet['postInfo'], 1);
            $arrRet['hasMore'] = ('postInfo' == $params['type']) ? $postMore : $arrRet['hasMore'];
        }
    }

    return  $arrRet;
}

/**
 * getUserInfo
 * @description :   用户信息
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 11/06/2019
 */
function getUserInfo($params, $_G) {
    $arrRet = array();

    $info = UserInfo($params, $_G['uid']);
    if (empty($info)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_MUST);
    }

    $arrRet = array(
        "avatar"	=>	$info['avatar'],    //用户头像
        "uid"		=>	$info['uid'],       //用户id
        "userName"	=>	$info['username'],  //用户名称
        "group"		=>	$info['groupid'],   //用户组
    );

    return  $arrRet;
}

/**
 * getThreadInfo
 * @description :   我的帖子信息
 *
 * @param $params
 * @param $_G
 * @return array
 * @author zhaoxichao
 * @date 12/06/2019
 */
function getThreadInfo($params, $_G) {
    $arrRet = array();

    $uid = $_G['uid'];
    $sql = "select thread.*, forum.name from ".DB::table('forum_thread')." thread left join ".DB::table('forum_forum')." forum on thread.fid = forum.fid where thread.authorid = " .$uid. " and thread.closed = 0";
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        return  $arrRet;
    }
    $arrTids = array();
    foreach ($res as $key => $value) {
        $arrTids[] = $value['tid'];
        $arrTmp[$value['tid']] = array(
            "tid"       =>   $value['tid'],
            "title"     =>   $value['subject'],
            "imgUrl"    =>   array(),
            "author"    =>   isset($value['author']) ? $value['author'] : '匿名',
            "replyNum"  =>   $value['replies'],
            "typeid"    =>   $value['typeid'],       //主题分类id
            "perm"      =>   $value['readperm'],
            "price"     =>   $value['readperm'],
            "authorId"  =>   $value['authorid'],
            "dateLine"  =>   date("Y-m-d", $value['dateline']),
            "lastPost"  =>   formTimestampNature($value['lastpost']),
            "lastPoster"=>   $value['lastposter'],
            "views"     =>   $value['views'],
            'forumName' =>   $value['name'],
        );
    }

    $arrTmp = getImgByTids($arrTids, $arrTmp);  //批量获取帖子图片

    $arrRet = array_values($arrTmp);

    return  $arrRet;
}

/**
 * getPostInfo
 * @description :
 *
 * @param $params
 * @param $_G
 * @return array
 * @author zhaoxichao
 * @date 05/06/2019
 */
function getPostInfo($params, $_G) {
    $arrRet = array();

    $uid = $_G['uid'];
    $sql = "select * from ".DB::table('forum_post')." where first = 0 and authorid = " . $uid;
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        return  $arrRet;
    }

    //获取当前用户信息
    $space  = UserInfo($params, $_G['uid']);
    foreach ($res as $key => $value) {
        $arrRet[] = array(
            "pid"       =>  $value['pid'],
            "tid"       =>  $value['tid'],
            "author"    =>  $value['author'],
            "authorId"  =>  $value['authorid'],
            "imageUrl"  =>  array(),
            "dateLine"  =>  formTimestamp($value['dateline']),
            "message"   =>  $value['message'],
            "anonymous" =>  $value['anonymous'],//是否匿名
            "position"  =>  $value['position'], //位置包含帖子
            "userName"  =>  isset($space['username']) ? $space['username'] : '匿名',
            "avatar"    =>  $space['avatar'],
            "groupId"   =>  $space['groupid'],  //用户组id
            "replayPost"    =>  array(
                "userName"  =>  isset($space['username']) ? $space['username'] : '匿名',//回复帖子用户
                "dateLine"  =>  formTimestampNature($value['dateline']),
                "message"   =>  $value['message'],
                "position"  =>  $value['position'], //位置包含帖子
            ),
        );
    }

    return  $arrRet;
}

/**
 * imgVerify
 * @description :   二位验证码
 *
 * @param $_G
 * @author zhaoxichao
 * @date 05/06/2019
 */
function imgVerify(&$_G) {
    $image = imagecreatetruecolor(100, 30); //创建一个100×30的画布
    $white = imagecolorallocate($image,255,255,255);//白色
    imagefill($image,0,0,$white);//覆盖黑色画布

    $session = ""; //空变量 ，存放验证码
    for($i=0;$i<4;$i++){
        $size = 6;
        $x = $i*25+mt_rand(5,10);
        $y = mt_rand(5,10);
        $sizi_color = imagecolorallocate($image,mt_rand(80,220),mt_rand(80,220),mt_rand(80,220));
        $char = join("",array_merge(range('a','z'),range('A','Z'),range(0,9)));
        $char = str_shuffle($char);
        $char = substr($char,0,1);
        imagestring($image,$size,$x,$y,$char,$sizi_color);
        $session .= $char ; //把验证码的每一个值赋值给变量
    }

    $_G['verify']   = $session;

    for($k=0;$k<200;$k++){
        $rand_color = imagecolorallocate($image,mt_rand(50,200),mt_rand(50,200),mt_rand(50,200));
        imagesetpixel($image,mt_rand(1,99),mt_rand(1,29),$rand_color);
    }

    for($n=0;$n<5;$n++){
        $line_color = imagecolorallocate($image,mt_rand(80,220),mt_rand(80,220),mt_rand(80,220));
        imageline($image,mt_rand(1,99),mt_rand(1,29),mt_rand(1,99),mt_rand(1,29),$line_color);
    }

    header('content-type:image/png');//设置文件输出格式
    imagepng( $image ); //以png格式输出$image图像

    $_G['verifyimg'] = $image;

    //设置header变量
    setcookie("verify", $session, time()+60);

    imagedestroy( $image ); //销毁图像
}

/**
 * getSessionKeyByCode
 * @description : 获取SessionKey
 *
 * Wiki:http://smartprogram.baidu.com/docs/develop/api/open_log/#Session-Key/
 * @param $params
 * @param $_G
 * @return mixed
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 03/09/2019
 */
function getSessionKeyByCode($params, $_G) {
    if (empty($params['code']) || empty($params['client_id']) || empty($params['sk'])) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, '');
    }
    $res = https_request(oauthUrl,$params);
    $arrRes = json_decode($res, true);
    if (false === $arrRes) {
        throw new discuz_exception(error_plugin::ERROR_JSON_DECODE, '');
    }
    if (isset($arrRes['error'])) {
        throw new discuz_exception(error_plugin::ERROR_GET_OAUTH, $arrRes['error'].$arrRes['error_description']);
    }
    return $arrRes;
}

/**
 * bindAcountBd2Dz
 * @description : 绑定百度账号与Discuz账号(先登录discuz账号再绑定百度账号)
 *
 * @param $params
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 03/09/2019
 */
function bindAcountBd2Dz($params, $_G) {
    $arrRet = array(
        "token"         =>  '',
        "expiretime"    => EXPIRETIME,
        "userInfo"      =>  array(),
    );

    if (isBindedBd2DzByUsername($params, $_G)) {
        throw new discuz_exception(error_plugin::ERROR_DZ_ACCOUNT_BINDED);
    }

    $isBind = isBindedBd2DzByDdaccount($params, $_G);
    if ($isBind) {
        unBindAcountBd2Dz($params, $_G);    //解绑
    }

    // 验证论坛账号密码
    $account = addslashes($params['username']);
    $pw      = addslashes($params['password']);
    if(empty($account)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_USERNAME_EMPTY);
    }
    if (empty($pw)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_PASSWORD_EMPTY);
    }

    $sql = "select uid, username, password, email, salt from ".UC_DBTABLEPRE."members where username = '" . $account . "'";
    if (UC_DBHOST != $_G['config']['db'][1]['dbhost']) {
        $res = init_db($sql);
    } else {
        $res = DB::fetch_all($sql);
    }

    if (empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_USERNAME_INVAILD);
    }
    $ret = $res[0];

    $password = md5(md5($pw).$ret['salt']);         //check密码
    if ($ret['password'] != $password) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_PASSWORD_INVAILD);
    }

    $userInfo = UserInfo($params, $ret['uid']);     //获取用户信息

    setGlobalVar($userInfo, $_G);

    $arrRet = formatUserInfo($userInfo, $_G);

    $insertId = bindAcountBd2DzDB($userInfo, $params);

    $arrRet['id'] = $insertId;

    return $arrRet;
}
/**
 * unBindAcountBd2Dz
 * @description : 解绑百度账号与Discuz账号
 *
 * @param $params
 * @param $_G
 * @return bool
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 03/09/2019
 */
function unBindAcountBd2Dz($params, $_G) {
    if (empty($params['bd_account'])) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, '');
    }
    $sqlUpdate = "UPDATE ".DB::table('bind_bd2dz')." SET `is_delete`=1 , `unbind_time`='".time()."' WHERE `bd_account`='".$params['bd_account']."'";
    $res = DB::query($sqlUpdate);
    if (empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_UPDATE_DATA_ERROR);
    }

    return true;
}

/**
 * formatUserInfo
 * @description :   格式化用户输出信息
 *
 * @param $userInfo
 * @param $_G
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 25/09/2019
 */
function formatUserInfo($userInfo, $_G) {
    if (empty($userInfo) || empty($_G['uid']) || empty($_G['username'])) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, '');
    }

    $arrRet = array();
    $arrRet['userInfo'] = array(
        "uid"        =>  $userInfo['uid'],
        "userName"   =>  $userInfo['username'],
        "groupid"    =>  $userInfo['groupid'],
        "avatar"     =>  $userInfo['avatar'],
    );

    $arrRet['token'] = makeToken($_G);              //生成token

    return  $arrRet;
}

/**
 * setGlobalVar
 * @description :   设置全局变量
 *
 * @param $userInfo
 * @param $_G
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 25/09/2019
 */
function setGlobalVar($userInfo, &$_G) {
    if (empty($userInfo)) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, '$_G');
    }

    $_G['uid']      = $userInfo['uid'];
    $_G['username'] = $userInfo['username'];
    $_G['adminid']  = $userInfo['adminid'];
    $_G['groupid']  = $userInfo['groupid'];
    $_G['avatar']   = $userInfo['avatar'];
}

/**
 * bindAcountBd2DzDB
 * @description :   绑定百度账号和论坛账号
 *
 * @param $userInfo
 * @param $params
 * @return mixed
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 25/09/2019
 */
function  bindAcountBd2DzDB($userInfo, $params) {
    if (empty($userInfo) || empty($params['bd_account'])) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, '$_G');
    }

    $dataInsert = array(
        "username"  =>  $userInfo['username'],
        "uid"       =>  $userInfo['uid'],
        "groupid"   =>  $userInfo['groupid'],
        "bd_account"=>  $params['bd_account'],
        "is_bind"   =>  1,
        "bind_time" =>  time(),
    );
    $res = DB::insert('bind_bd2dz', $dataInsert);
    if (!$res) {
        throw new discuz_exception(error_plugin::ERROR_INSERT_DATA_ERROR);
    }

    $insertId = DB::insert_id();

    return  $insertId;
}

/**
 * registerAgreement
 * @description :    获取用户服务条款
 *
 * @param $params
 * @param $_G       全局变量
 * @return array
 * @author zhaoxichao
 * @date 17/10/2019
 */
function registerAgreement($params, $_G) {
    $sql = "select svalue from ".DB::table('common_setting')." where skey = 'bbrulestxt'";
    $res = DB::fetch_all($sql);
    if(empty($res) && !isset($res[0]['svalue'])) {
        return  array();
    }

    return $res[0]['svalue'];
}