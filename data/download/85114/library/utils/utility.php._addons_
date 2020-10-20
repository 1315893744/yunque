<?php

/**
 * formTimestamp
 * @description :   格式化日期
 *
 * 示例: 05-23
 *
 * @param $timestamp
 * @return bool|string
 * @author zhaoxichao
 * @date 30/05/2019
 */

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

/**
 * formTimestamp
 * @description :   格式化时间
 *
 * @param $timestamp
 * @return bool|string
 * @author zhaoxichao
 * @date 04/09/2019
 */
function formTimestamp($timestamp) {
    return date('m-d', $timestamp);
}

/**
 * formTimestampNature
 * @description : 格式化时间
 *
 * @param $targetTime
 * @return string
 * @author zhaoxichao
 * @date 30/05/2019
 */
function formTimestampNature($targetTime)
{
    // 今天最大时间
    $todayLast   = strtotime(date('Y-m-d 23:59:59'));
    $agoTimeTrue = time() - $targetTime;
    $agoTime     = $todayLast - $targetTime;
    $agoDay      = floor($agoTime / 86400);

    if ($agoTimeTrue < 60) {
        $result = '刚刚';
    } elseif ($agoTimeTrue < 3600) {
        $result = (ceil($agoTimeTrue / 60)) . '分钟前';
    } elseif ($agoTimeTrue < 3600 * 12) {
        $result = (ceil($agoTimeTrue / 3600)) . '小时前';
    } elseif ($agoDay == 0) {
        $result = '今天 '  ;
    } elseif ($agoDay == 1) {
        $result = '昨天 '  ;
    } elseif ($agoDay == 2) {
        $result = '前天 '  ;
    } elseif ($agoDay > 2 && $agoDay < 16) {
        $result = $agoDay . '天前 '  ;
    } else {
        $format = date('Y') != date('Y', $targetTime) ? "Y-m-d" : "m-d H:i";
        $result = date($format, $targetTime);
    }

    $result = (CHARSET == 'gbk') ? mb_convert_encoding($result, 'GBK', 'UTF-8') : $result;     // 统一gbk编码

    return $result;
}

/**
 * paging
 * @description :   分页
 *
 * @param     $pageInfo
 * @param int $page
 * @param int $pagenum
 * @return array
 * @author zhaoxichao
 * @date 21/06/2019
 */
function   paging($pageInfo, $page = 1, $pagenum = PAGENUM) {
    $intOffset = ($page - 1) * $pagenum;

    $hasMore = (($intOffset + $pagenum) < count($pageInfo)) ? true : false;
    $pageInfo = array_slice($pageInfo, $intOffset, $pagenum);

    return  array($pageInfo, $hasMore);
}

/**
 * insertAdvert
 * @description :   插入广告数据
 *
 * 插入位置和扯落示例:
 * 1. feed  	- 首页信息流			策略: 3+12n
 * 2. forum 	- 版块落地页信息流   	策略: 3+12n
 * 3. thdend 	- 帖子落地页			策略: 正文底部
 * 4. thdreply  - 帖子落地页			策略: 回复区5+10n
 *
 *
 * @param     $arr      待插入数据
 * @param     $type     广告插入标识
 * @param int $postion  插入的广告排序
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 04/06/2019
 */
function insertAdvert($arr, $type, $postion = 1, $page = 1) {
    if (empty($arr)) {
        return $arr;
    }

    $sql = 'select ad_config from '.DB::table('swan_app_config').' where is_effect = 1 order by update_time desc limit 1';
    $arrAd = DB::fetch_all($sql);
    if (empty($arrAd)) {
        // 判断是否为一维数组
        if (isset($arr[0])) {
            return $arr;
        } else {
            return array($arr);
        }
    }

    switch ($type) {
        case 'feed':
            $arrRet = insertAdvertFeed($arr, $arrAd, $postion);
            break;
        case 'forum':
            $arrRet = insertAdvertFeed($arr, $arrAd, $postion);
            break;
        case 'thdend':
            $arrRet = insertAdvertThdend($arr, $arrAd, $postion);
            break;
        case 'thdreply':
            $arrRet = insertAdvertThdreply($arr, $arrAd, $postion);
            break;
        case 'new_feed':
            $arrRet = insertAdvertFeedV2($arr, $arrAd, $page);
            break;
        default:
            throw new discuz_exception(error_plugin::ERROR_ADVERT_TYPE);
    }


    return $arrRet;
}

/**
 * insertAdvertFeed
 * @description :   插入广告数据
 *
 * @param $arr
 * @param $arrAd
 * @param $postion
 * @return array
 * @author zhaoxichao
 * @date 05/06/2019
 */
function insertAdvertFeed($arr, $arrAd, $postion) {
    $arrRet = array();

    $adJson = base64_decode($arrAd[0]['ad_config']);
    $asArr  = json_decode($adJson, true);
    foreach ($asArr as $key => $ad) {
        //过滤非法数据
        if (empty($ad['code'])) {
            continue;
        }
        $ad['isAd'] = true;
        $adValid[] = $ad;   //合法的广告数据
    }

    $count  = count($adValid);
    if ($count >= $postion) {
        $pos = $postion - 1;
    } else {
        $remain = $postion % $count;
        $pos    = $remain -1;
    }

    foreach ($arr as $k => $value) {
        //插入广告数据
        if (2 == $k) {
            $arrRet[] = $adValid[$pos];
        }

        if ($k > 2 && ($k - 2)%12 == 0) {
            $pos = $pos + 1;
            if ($count >= $pos) {
                $pos = $pos - 1;
            } else {
                $remain = $pos % $count;
                $pos    = $remain -1;
            }
            $arrRet[] = $adValid[$pos];
        }

        //插入正常数据
        $arrRet[] = $value;
    }

    return  $arrRet;
}

/**
 * insertAdvertFeedV2
 * @description :   每页最多插入两条广告数据
 *
 * @param $arr
 * @param $arrAd
 * @param $page
 * @return array
 * @author songshouming
 * @date 04/11/2019
 */
function insertAdvertFeedV2($arr, $arrAd, $page) {
    $arrRet = array();

    $adJson = base64_decode($arrAd[0]['ad_config']);
    $asArr  = json_decode($adJson, true);
    foreach ($asArr as $key => $ad) {
        //过滤非法数据
        if (empty($ad['code'])) {
            continue;
        }
        $ad['isAd'] = true;
        $adValid[] = $ad;   //合法的广告数据
    }

    $count  = count($adValid);
    if ($count > 0) {
        // 每页（20条数据中）最多展示两条广告
        $start = ($page - 1) * 2;
        $adValid = array_slice($adValid, $start, 2);
    }

    foreach ($arr as $k => $value) {
        //插入广告数据
        if (2 == $k && !empty($adValid[0])) {
            $arrRet[] = $adValid[0];
        }

        if ($k > 2 && (($k - 2)%12 == 0) && !empty($adValid[1])) {
            $arrRet[] = $adValid[1];
        }

        //插入正常数据
        $arrRet[] = $value;
    }

    return  $arrRet;
}

/**
 * insertAdvertThdend
 * @description :   插入广告
 *
 * @param $arr
 * @param $arrAd
 * @param $postion
 * @return array
 * @author zhaoxichao
 * @date 05/06/2019
 */
function  insertAdvertThdend($arr, $arrAd, $postion) {
    $arrRet = array();
    $arrRet[] = $arr;

    $adJson = base64_decode($arrAd[0]['ad_config']);
    $asArr  = json_decode($adJson, true);
    foreach ($asArr as $key => $ad) {
        //过滤非法数据
        if (empty($ad['code'])) {
            continue;
        }
        $ad['isAd'] = true;
        $adValid[] = $ad;   //合法的广告数据
    }
    $count  = count($adValid);
    if ($count >= $postion) {
        $pos = $postion - 1;
    } else {
        $remain = $postion % $count;
        $pos    = $remain -1;
    }

    $arrRet[] = $adValid[$pos];

    return  $arrRet;
}

/**
 * insertAdvertThdreply
 * @description :
 *
 * @param $arr
 * @param $arrAd
 * @param $postion
 * @return array
 * @author zhaoxichao
 * @date 11/06/2019
 */
function    insertAdvertThdreply($arr, $arrAd, $postion) {
    $arrRet = array();

    $adJson = base64_decode($arrAd[0]['ad_config']);
    $asArr  = json_decode($adJson, true);
    foreach ($asArr as $key => $ad) {
        //过滤非法数据
        if (empty($ad['code'])) {
            continue;
        }
        $ad['isAd'] = true;
        $adValid[] = $ad;   //合法的广告数据
    }

    $count  = count($adValid);
    if ($count >= $postion) {
        $pos = $postion - 1;
    } else {
        $remain = $postion % $count;
        $pos    = $remain -1;
    }

    foreach ($arr as $k => $value) {
        //插入广告数据
        if (5 == $k) {
            $arrRet[] = $adValid[$pos];
        }

        if ($k > 5 && ($k - 5)%10 == 0) {
            $pos = $pos + 1;
            if ($count >= $pos) {
                $pos = $pos - 1;
            } else {
                $remain = $pos % $count;
                $pos    = $remain -1;
            }
            $arrRet[] = $adValid[$pos];
        }

        //插入正常数据
        $arrRet[] = $value;
    }

    return  $arrRet;
}


/**
 * getForumIcon
 * @description :   获取板块头像
 *
 * @param $fid
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 03/06/2019
 */
function getForumIcon($fid) {
    $arrRet = array();

    $sql = 'select icon from '.DB::table('forum_forumfield').' where fid = '.$fid;
    $arrRet = DB::fetch_all($sql);

    return  $arrRet;
}


/**
 * getIconsByTids
 * @description :   获取帖子图片
 *
 *
 * @param $arrTids
 * @return array
 * @author zhaoxichao
 * @date 29/05/2019
 */
function getIconsByTids($arrTids) {
    $res = array();
    $strTid = count($arrTids) > 1 ? implode(',', $arrTids) : $arrTids[0];
    if (empty($strTid)) {
        return $res;
    }
    $sqlIcons  =   'select tid, attachment,remote from '.DB::table('forum_threadimage').' where tid in ('. $strTid .')';
    $res = DB::fetch_all($sqlIcons);

    return $res;
}

/**
 * isCollected
 * @description :   判断是否收藏
 *
 * @param $type
 * @param $id
 * @param $uid
 * @return bool
 * @author zhaoxichao
 * @date 12/06/2019
 */
function isCollected($type, $id, $uid) {
    if (empty($uid) || empty($id) || empty($type)) {
        return  false;
    }

    $sql =  "select favid from ".DB::table('home_favorite')." where idtype = '" .$type. "' and uid = " .$uid. " and  id = " . $id;

    $res = DB::fetch_all($sql);
    if(empty($res)) {
        return  false;
    }
    return true;
}

/**
 * UserInfo
 * @description :   获取用户信息
 *
 * @param $params
 * @param $uid
 * @return mixed
 * @author zhaoxichao
 * @date 09/06/2019
 */
function UserInfo($params, $uid) {
    //获取用户信息
    $space = getuserbyuid($uid);

    //获取用户头像
    $avatar = getUserAvatar($uid, $params);

    $space['avatar'] =  $avatar['avatar'];

    return  $space;
}

/**
 * getUserAvatar
 * @description :   根据uid获取用户头像
 *
 * @param $uid
 * @param $params
 * @return array|void
 * @author zhaoxichao
 * @date 09/06/2019
 */
function getUserAvatar($uid, $params = array()) {
    $arrRet = array(
        'avatar'  => '',
    );

    if (empty($uid)) {
        return  $arrRet;
    }

    $size   = isset($params['size']) ? $params['size'] : '';
    $random = isset($params['random']) ? $params['random'] : '';
    $type   = isset($params['type']) ? $params['type'] : '';
    $check  = isset($params['check_file_exists']) ? $params['check_file_exists'] : '';
    $avatar = './data/avatar/'.get_avatar($uid, $size, $type);
    if(file_exists(dirname(__FILE__).'/'.$avatar)) {
        //检查是否存在
        if($check) {
            echo 1;
            return;
        }
        $random = !empty($random) ? rand(1000, 9999) : '';
        $avatar_url = empty($random) ? $avatar : $avatar.'?random='.$random;
    } else {
        if($check) {
            echo 0;
            return;
        }
        $size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
        $avatar_url = 'images/noavatar_'.$size.'.gif';
    }

    include DISCUZ_ROOT . './config/config_ucenter.php';
    $arrRet['avatar'] = UC_API . '/' . $avatar_url;

    return  $arrRet;
}


/**
 * get_avatar
 * @description :   获取头像目录
 *
 * @param        $uid
 * @param string $size
 * @param string $type
 * @return string
 * @author zhaoxichao
 * @date 09/06/2019
 */
function get_avatar($uid, $size = 'middle', $type = '') {
    $size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
    $uid = abs(intval($uid));
    $uid = sprintf("%09d", $uid);
    $dir1 = substr($uid, 0, 3);
    $dir2 = substr($uid, 3, 2);
    $dir3 = substr($uid, 5, 2);
    $typeadd = $type == 'real' ? '_real' : '';
    return $dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2).$typeadd."_avatar_$size.jpg";
}

/**
 * _get_script_url
 * @description :   获取头像PHP_SELF
 *
 * @return bool|mixed|string
 * @author zhaoxichao
 * @date 09/06/2019
 */
function _get_script_url() {
    $scriptName = basename($_SERVER['SCRIPT_FILENAME']);

    if(basename($_SERVER['SCRIPT_NAME']) === $scriptName) {
        $_SERVER['PHP_SELF'] = $_SERVER['SCRIPT_NAME'];
    } else if(basename($_SERVER['PHP_SELF']) === $scriptName) {
        $_SERVER['PHP_SELF'] = $_SERVER['PHP_SELF'];
    } else if(isset($_SERVER['ORIG_SCRIPT_NAME']) && basename($_SERVER['ORIG_SCRIPT_NAME']) === $scriptName) {
        $_SERVER['PHP_SELF'] = $_SERVER['ORIG_SCRIPT_NAME'];
    } else if(($pos = strpos($_SERVER['PHP_SELF'],'/'.$scriptName)) !== false) {
        $_SERVER['PHP_SELF'] = substr($_SERVER['SCRIPT_NAME'],0,$pos).'/'.$scriptName;
    } else if(isset($_SERVER['DOCUMENT_ROOT']) && strpos($_SERVER['SCRIPT_FILENAME'],$_SERVER['DOCUMENT_ROOT']) === 0) {
        $_SERVER['PHP_SELF'] = str_replace('\\','/',str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']));
        $_SERVER['PHP_SELF'][0] != '/' && $_SERVER['PHP_SELF'] = '/'.$_SERVER['PHP_SELF'];
    } else {
        return false;
    }

    return $_SERVER['PHP_SELF'];
}

/**
 * getLastPid
 * @description :   获取当前最大pid
 *
 * @return int
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 11/06/2019
 */
function getLastPid() {
    $sql = 'select pid from '.DB::table('forum_post').' order by pid desc limit 1';
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_SELECT_DATA_EMPTY, 'getMaxPid');
    }
    $lastPid = intval($res[0]['pid']);

    return  $lastPid;
}

/**
 * getDetailByPid
 * @description :   根据pid获取帖子详情
 *
 * @param $tid 主题id
 * @param $pid 帖子id
 * @return array
 * @author zhaoxichao
 * @date 12/06/2019
 */
function getDetailByPid($tid, $pids) {
    $arrRet = array();

    $res = C::t("forum_post")->fetch_all_by_pid("tid:".$tid, $pids);
    if (empty($res)) {
        return $arrRet;
    }

    return $res;
}

/**
 * getDetailByPosition
 * @description :   根据Position获取帖子详情
 *
 * @param $pos
 * @return mixed
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 11/06/2019
 */
function getDetailByPosition($pos) {
    $sql  = 'select author, dateline, message, position, pid  from '.DB::table('forum_post').' where position = ' . $pos;
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        throw new discuz_exception(error_plugin::ERROR_SELECT_DATA_EMPTY, 'getDetailByPosition');
    }

    return $res[0];
}

/**
 * repliesPlusOrDescrease
 * @description :   帖子回复数加1或减1
 *
 * @param $tid
 * @param $isPlus true-加1 false-减1
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 12/06/2019
 */


function repliesPlusOrDescrease($tid, $isPlus) {
    $sql = "select replies from ".DB::table('forum_thread')." where tid = " . $tid;
    $res = DB::fetch_all($sql);

    $replies = intval($res[0]['replies']);
    if ($isPlus) {
        $replies = $replies + 1;
    } else {
        $replies = $replies > 0 ? $replies - 1 : 0;
    }

    $update = array(
        'replies'   =>  $replies,
    );
    //更新条件
    $condition = array('tid'=> $tid);
    //更新数据
    $resUpdate = DB::update('forum_thread', $update, $condition);

    if (empty($resUpdate)) {
        throw new discuz_exception(error_plugin::ERROR_UPDATE_DATA_ERROR);
    }
}

/**
 * getForumPerm
 * @description :   获取板块权限(old)
 *
 * @param $_G
 * @param $fid
 * @return array
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 13/06/2019
 */
function getForumPerm($_G, $fid) {
    if (empty($_G['uid']) || empty($fid)) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID);
    }

    $sql = 'select allowview, allowpost from '.DB::table('forum_access').' where uid = '.$_G['uid'].' and fid = ' . $fid;
    $res = DB::fetch_all($sql);

    return $res;
}

/**
 * groupAccess
 * @description :   用户组权限
 *
 * 0: 无权限;
 * 1: 读权限;
 * 2: 发帖权限;
 * 3: 回复权限;
 * @param $_G
 * @return int
 * @author zhaoxichao
 * @date 13/06/2019
 */
function groupAccess($_G) {
    $arrRet = 1;    //默认读权限

    if (empty($_G['groupid'])) {
        return $arrRet;
    }

    $sql = "select readaccess, allowpost, allowreply from ".DB::table('common_usergroup_field')." where groupid = " . $_G['groupid'];
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        $arrRet = 1;
        return  $arrRet;
    }

    $ret = $res[0];
    if (!empty($ret['allowreply'])) {
        $arrRet = 3;        //回复权限
    } elseif (!empty($ret['allowpost'])) {
        $arrRet = 2;        //发帖权限
    } elseif (!empty($ret['readaccess'])) {
        $arrRet = 1;        //读权限
    } else {
        $arrRet = 0;        //无权限
    }

    return  $arrRet;
}

/**
 * forumAccess
 * @description :   板块权限（旧权限逻逻辑-before20190828）
 *
 * @param $fid
 * @param $G
 * @return int
 * @author zhaoxichao
 *
 * @date 13/06/2019
 */
function forumAccess($fid, $G = array()) {
    $arrRet = 3;    //默认读权限

    if (empty($fid)) {
        return $arrRet;
    }
    $sql = "select allowview, allowpost, allowreply from ".DB::table('forum_access')." where fid = " . $fid;
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        $arrRet = 3;
        return  $arrRet;
    }

    $ret = $res[0];
    if (!empty($ret['allowreply'])) {
        $arrRet = 3;        //回复权限
    } elseif (!empty($ret['allowpost'])) {
        $arrRet = 2;        //发帖权限
    } elseif (!empty($ret['allowview'])) {
        $arrRet = 1;        //读权限
    } else {
        $arrRet = 0;        //无权限
    }

    return  $arrRet;
}

/**
 * checkLogin
 * @description :   登录判断
 *
 * @param $_G
 * @return bool
 * @author zhaoxichao
 * @date 13/06/2019
 */
function checkLogin($_G) {
    if (empty($_G['uid'])) {
        return false;
    }

    return  true;
}

/**
 * checkLoginForce
 * @description :   强登录校验
 *
 * @param $_G
 * @return bool
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 16/09/2019
 */
function checkLoginForce($_G) {
    if (empty($_G['uid'])) {
        throw new discuz_exception(error_plugin::ERROR_LOGIN_MUST, __FUNCTION__);
    }

    return true;
}

/**
 * parseImg
 * @description :   解析图片
 *
 * @param $message
 * @return string
 * @author zhaoxichao
 * @date 20/06/2019
 */
function parseImg($message) {
    $img = '';
    if (false !== strpos($message, 'jpg')
        || false !== strpos($message, 'png')
        || false !== strpos($message, 'gif')
        || false !== strpos($message, 'jpeg')) {

        $http   = strstr($message, 'http');
        $endJpg = strpos($http, 'jpg');
        $endPng = strpos($http, 'png');
        $endGif = strpos($http, 'gif');
        $endJpeg= strpos($http, 'jpeg');
        $end    = max($endJpg, $endPng, $endGif, $endJpeg);
        $end    += !empty($endJpeg) ? 4 : 3;
        $img    = substr($http, 0, $end);
    }

    $img    = empty($img) ? '' : $img;

    return   $img;
}

/**
 * initSysConst
 * @description :   初始化系统常量
 *
 * @param $smartConfig
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 21/06/2019
 */
function initSysConst($smartConfig) {
    if (!defined('SECRETKEY')) {
        $secretkey = trim($smartConfig['secretkey']);
        if (empty($secretkey)) {
            throw new discuz_exception(error_plugin::ERROR_SECRETKEY_EMPTY);
        }
        define('SECRETKEY', $secretkey);        //定义SECRETKEY常量
        helper_log::runlog('swan', 'set SECRETKEY = ' . SECRETKEY);
    }

    if (!defined('DOMAIN')) {
        $domain = trim($smartConfig['domain']);
        if (empty($domain)) {
            throw new discuz_exception(error_plugin::ERROR_DOMAIN_EMPTY);
        }
        define('DOMAIN', $domain);              //定义论坛域名常量
        helper_log::runlog('swan', 'set DOMAIN = ' . DOMAIN);
    }
}

/**
 * getImgByTids
 * @description :   批量获取帖子图片byTid
 *
 * @param $arrTids  帖子ID数组
 * @param $arrTmp   待处理数据
 * @return mixed
 * @author zhaoxichao
 * @date 28/06/2019
 */
function getImgByTids($arrTids, $arrTmp) {
    $icons = getIconsByTids($arrTids);
    if (!empty($icons)) {
        foreach ($icons as $km => $vm) {
            $img = '';
            if (false !== strpos($vm['attachment'], 'http')
                || false !== strpos($vm['attachment'], 'https')) {
                $img = parseImg($vm['attachment']);
            } else if ($vm['attachment'] != "[]") {
                $img =  getAttachPrexUrl(ATTACHMENTFORM, $vm['remote']). $vm['attachment'];
            }

            $arrTmp[$vm['tid']]['imgUrl']  = empty($img) ? array() : array($img);
        }
    }

    return  $arrTmp;
}

/**
 * encodToUtf8
 * @description : json化输出utf-8编码（PHP函数mb_detect_encoding有缺陷,弃用该函数,保留此函数以兼容旧插件）
 *
 * @param $data
 * @return string
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 07/08/2019
 */
function  encodToUtf8($data) {
    if (!defined('CHARSET')) {
        throw new discuz_exception(error_plugin::ERROR_CHARSET_EMPTY);
    }

    $encode = mb_detect_encoding($data, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
    if($encode == 'UTF-8'){
        return $data;
    }else{
        return mb_convert_encoding($data, 'UTF-8', $encode);
    }
}

/**
 * tb_json_convert_encoding
 * @description : 转码gbk编码
 *
 * @param $m
 * @param $from
 * @param $to
 * @return mixed
 * @author zhaoxichao
 * @date 04/09/2019
 */
function tb_json_convert_encoding($m, $from, $to)
{
    switch(gettype($m)) {
        case 'integer':
        case 'boolean':
        case 'float':
        case 'double':
        case 'NULL':
            return $m;
        case 'string':
            return mb_convert_encoding($m, $to, $from);
        case 'object':
            $vars = array_keys(get_object_vars($m));
            foreach($vars as $key) {
                $m->$key = tb_json_convert_encoding($m->$key, $from ,$to);
            }
            return $m;
        case 'array':
            foreach($m as $k => $v) {
                $m[tb_json_convert_encoding($k, $from, $to)] = tb_json_convert_encoding($v, $from, $to);
            }
            return $m;
        default:

    }

    return $m;
}

/**
 * getRealUserAvatar
 * @description :   获取用户真实头像
 *
 * @param        $uid
 * @param string $mode
 * @return string
 * @author zhaoxichao
 * @date 08/09/2019
 */
function getRealUserAvatar($uid, $mode = 'small') {
    include DISCUZ_ROOT . './config/config_ucenter.php';
    $reqUrl = UC_API. '/avatar.php?uid='.$uid .'&size='.$mode;
    return $reqUrl;
}

/**
 * https_request
 * @description : 发送curl请求
 *
 * @param        $curl
 * @param null   $data
 * @param bool   $https
 * @param string $method
 * @return mixed
 * @author zhaoxichao
 * @date 02/09/2019
 */
function https_request($curl, $data=null, $https=true, $method='post'){
    $ch = curl_init();                              //初始化
    curl_setopt($ch, CURLOPT_URL, $curl);           //设置访问的URL
    curl_setopt($ch, CURLOPT_HEADER, false);        //设置不需要头信息
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //只获取页面内容，但不输出
    if($https){
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不做服务器认证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不做客户端认证
    }
    if($method == 'post'){
        curl_setopt($ch, CURLOPT_POST, true);       //设置请求是POST方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//设置POST请求的数据
    }
    $str = curl_exec($ch);                          //执行访问，返回结果
    curl_close($ch);                                //关闭curl，释放资源
    return $str;
}
/**
 * isBindedBd2DzByUsername
 * @description : 根据论坛名称判断是否绑定
 *
 * @param $params
 * @param $_G
 * @return bool
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 03/09/2019
 */
function isBindedBd2DzByUsername($params, $_G = array()) {
    if (empty($params['username'])) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, '');
    }
    $sql = "select id from " .DB::table('bind_bd2dz'). " where is_bind = 1 and is_delete = 0 and username = '" . $params['username'] . "'";
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        return false;
    }
    return true;
}

/**
 * isBindedBd2DzByDdaccount
 * @description :   根据百度昵称判断是否绑定
 *
 * @param $params
 * @param $_G
 * @return bool
 * @throws discuz_exception
 * @author zhaoxichao
 * @date 23/09/2019
 */
function isBindedBd2DzByDdaccount($params, $_G) {
    if (empty($params['bd_account'])) {
        throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, '');
    }
    $sql = "select id from " .DB::table('bind_bd2dz'). " where is_bind = 1 and is_delete = 0 and bd_account = '" . $params['bd_account'] . "'";
    $res = DB::fetch_all($sql);
    if (empty($res)) {
        return false;
    }
    return true;
}


/**
 * addAttachment
 * @description :   新增评论图片
 *
 * @param $post
 * @return mixed
 * @author zhaoxichao
 * @date 14/10/2019
 */
function addAttachment(&$post) {
    $tableidSql =  "select aid, tableid, downloads from  ".DB::table('forum_attachment')." where tid = ".$post['tid']." and pid = ".$post['pid'];
    $tableid = DB::fetch_all($tableidSql, array(), 'aid');
    if (empty($tableid)) {
        return  $post;
    }

    $tableidArr = array();
    foreach ($tableid as $value) {
        if (in_array($value['tableid'], $tableidArr)) {
            continue;
        }
        $tableidArr[] = $value['tableid'];

        $tableName = "forum_attachment_" . $value['tableid'];
        $attachmentSql = "select aid, attachment, uid, isimage,filesize, filename,remote from ".DB::table($tableName)." where tid = ".$post['tid']." and pid = ".$post['pid'];
        $attachment = DB::fetch_all($attachmentSql);
        if (empty($attachment)) {
            return  $post;
        }

        foreach ($attachment as $val) {
            $downloadUrl = getAttachDownloadUrl($val['aid'], $val['uid'], $value['tableid']); // 下载地址
            $viewUrl = '';
            if (intval($val['isimage'])) {
                $viewUrl = getAttachPrexUrl(ATTACHMENTFORM, $val['remote']) . $val['attachment'];
                $attach = "[attach]".$val['aid']."[/attach]";
                $img = "[img]".$viewUrl."[/img]";

                if (strpos($post['message'], $attach) !== false) {
                    $post['message'] = str_replace($attach,$img,$post['message']);
                } else {
                    // 没有引用的图片附件直接追加到后面
                    $post['message'] .= $img;
                }
            }

            $post['attachmentList'][] = array(
                'downloadTimes'     => intval($tableid[$val['aid']]['downloads']),
                'filesize'          => sizecount(intval($val['filesize'])),
                'filename'          => $val['filename'],
                'viewUrl'           => $viewUrl,
                'downloadUrl'       => $downloadUrl,
                'isimage'           => intval($val['isimage']) == 0 ? 0 : 1,
                'aid'               => $val['aid'],
            );
        }
    }
}

/**
 * 判断附件或者图片前缀url
 * @param $url
 * @param 是否为远程附件 1-是 0-否
 * @return string 图片前缀
 */
function getAttachPrexUrl($url, $remote) {
    if (false !== strpos($url, 'http') || false !== strpos($url, 'https')) {
        return $url;
    }

    if (intval($remote)) {
        global $_G;
        return $_G['setting']['ftp']['attachurl'].'forum/';
    }

    return DOMAIN.$url;
}

/**
 * 获取下载链接的字符串
 * 有附件表的aid,time(),uid,tableid生成的字符串
 *
 * @param $aid
 * @param $uid
 * @param $tableid
 * @return string
 */
function getAttachDownloadUrl($aid, $uid, $tableid) {
    $data = sprintf('%s|%s|%s|%s', $aid, time(), $uid, $tableid);
    return DOMAIN . "/plugin.php?id=".BAIDUSM_PLUGIN. "&mod=attachment&action=download&aid=" .base64_encode($data);
}

/**
 * escapeString
 * @description :   转义在 SQL 语句中使用的字符串中的特殊字符
 *
 * @param $str
 * @param $_G
 * @author zhaoxichao
 * @date 15/10/2019
 */
function escapeString(&$str, $_G) {
    $config = isset($_G['config']['db'][1]) ? $_G['config']['db'][1] : array();
    if (!empty($config)) {
        $conn   =  mysqli_connect($config['dbhost'],$config['dbuser'],$config['dbpw'],$config['dbname']);
        if (mysqli_connect_errno($conn)) {
            $log = "连接 MySQL 失败: " . mysqli_connect_error();
            helper_log::runlog('swan_notice', $log);    //打印日志
        }
        $str  =  mysqli_real_escape_string($conn,$str);
    }
}

/**
 * 板块图片处理
 * @param $imgname
 * @param $forumStatus 板块显示状态 (0:隐藏 1:正常 3:群组)
 * @return string
 */

function get_forumimg_parse($imgname, $_G, $forumStatus = 1) {
    if($imgname) {
        $parse = parse_url($imgname);
        if(isset($parse['host'])) {
            $imgpath = $imgname;
        } else {
            if($forumStatus != 3) {
                if (false !== strpos($_G['setting']['attachurl'], 'http') || false !== strpos($_G['setting']['attachurl'], 'https')) {
                    $imgpath = $_G['setting']['attachurl'] . 'common/'.$imgname;
                } else {
                    $imgpath = $_G['siteurl']."/".$_G['setting']['attachurl'].'common/'.$imgname;
                }
            } else {
                if (false !== strpos($_G['setting']['attachurl'], 'http') || false !== strpos($_G['setting']['attachurl'], 'https')) {
                    $imgpath = $_G['setting']['attachurl'] . 'group/'.$imgname;
                } else {
                    $imgpath = $_G['siteurl']."/".$_G['setting']['attachurl'].'group/'.$imgname;
                }
            }
        }
        return $imgpath;
    }
}

/**
 * 版本比较
 * @param $_G
 * @param $miniVersion
 * @return true 代表目前插件大于或等于最低版本|false
 */
function checkPluginVersion($_G, $miniVersion) {
    if (!empty($_G['setting']['plugins']) && !empty($_G['setting']['plugins']['version']) && ($_G['setting']['plugins']['version']['baidusm_smartprogram'] >= $miniVersion)) {
        return true;
    }

    return false;
}

/**
 * get_my_threads
 * 获取我的主题数据
 *
 * @param $viewtype
 * @param int $fid
 * @param string $filter
 * @param string $searchkey
 * @param int $start
 * @param int $perpage
 * @param string $theurl
 * @return array
 */
function get_my_threads($viewtype, $fid = 0, $filter = '', $searchkey = '', $start = 0, $perpage = 20, $theurl = '') {
    global $_G;
    $fid = $fid ? intval($fid) : null;
    loadcache('forums');
    $dglue = '=';
    if($viewtype == 'thread') {
        $authorid = $_G['uid'];
        $dglue = '=';
        if($filter == 'recyclebin') {
            $displayorder = -1;
        } elseif($filter == 'aduit') {
            $displayorder = -2;
        } elseif($filter == 'ignored') {
            $displayorder = -3;
        } elseif($filter == 'save') {
            $displayorder = -4;
        } elseif($filter == 'close') {
            $closed = 1;
        } elseif($filter == 'common') {
            $closed = 0;
            $displayorder = 0;
            $dglue = '>=';
        }

        $gids = $fids = $forums = array();
        foreach(C::t('forum_thread')->fetch_all_by_authorid_displayorder($authorid, $displayorder, $dglue, $closed, $searchkey, $start, $perpage, null, $fid) as $tid => $value) {
            if(!isset($_G['cache']['forums'][$value['fid']])) {
                $gids[$value['fid']] = $value['fid'];
            } else {
                $forumnames[$value['fid']] = array('fid'=> $value['fid'], 'name' => $_G['cache']['forums'][$value['fid']]['name']);
            }
            $list[$value['tid']] = $value;
        }

        if(!empty($gids)) {
            $gforumnames = C::t('forum_forum')->fetch_all_name_by_fid($gids);
            foreach($gforumnames as $fid => $val) {
                $forumnames[$fid] = $val;
            }
        }
        $listcount = count($list);
    } else {
        $invisible = null;

        if($filter == 'recyclebin') {
            $invisible = -5;
        } elseif($filter == 'aduit') {
            $invisible = -2;
        } elseif($filter == 'save' || $filter == 'ignored') {
            $invisible = -3;
            $displayorder = -4;
        } elseif($filter == 'close') {
            $closed = 1;
        } elseif($filter == 'common') {
            $invisible = 0;
            $displayorder = 0;
            $dglue = '>=';
            $closed = 0;
        }
        $posts = C::t('forum_post')->fetch_all_by_authorid(0, $_G['uid'], true, 'DESC', $start, $perpage, null, $invisible, $fid);
        $listcount = count($posts);
        foreach($posts as $pid => $post) {
            $tids[$post['tid']][] = $pid;
            $posts[$pid] = $post;
        }
        if(!empty($tids)) {
            $threads = C::t('forum_thread')->fetch_all_by_tid_displayorder(array_keys($tids), $displayorder, $dglue, array(), $closed);
            foreach($threads as $tid => $thread) {
                if(!isset($_G['cache']['forums'][$thread['fid']])) {
                    $gids[$thread['fid']] = $thread['fid'];
                } else {
                    $forumnames[$thread['fid']] = array('fid' => $thread['fid'], 'name' => $_G['cache']['forums'][$thread['fid']]['name']);
                }
                $threads[$tid] = $thread;
            }
            if(!empty($gids)) {
                $groupforums = C::t('forum_forum')->fetch_all_name_by_fid($gids);
                foreach($groupforums as $fid => $val) {
                    $forumnames[$fid] = $val;
                }
            }
            $list = array();
            foreach($tids as $key => $val) {
                $list[$key] = $threads[$key];
            }
            unset($threads);
        }

    }
    return array('forumnames' => $forumnames, 'threadcount' => $listcount, 'threadlist' => $list, 'tids' => $tids, 'posts' => $posts);
}

/**
 * @param $threads
 * @param $forums
 * @return array
 */
function dealThreadInfo($threads, $forums) {
    $arrTmp = array();

    foreach ($threads as $key => $value) {
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
            "dateLine"  =>   formTimestampNature($value['dateline']),
            "lastPost"  =>   formTimestampNature($value['lastpost']),
            "lastPoster"=>   $value['lastposter'],
            "views"     =>   $value['views'],
            'forumName' =>   !empty($forums[$value['fid']]) ? $forums[$value['fid']]['name'] : '',
        );
    }

    $arrTmp = getImgByTids($arrTids, $arrTmp);  //批量获取帖子图片

    $arrRet = array_values($arrTmp);

    return  $arrRet;
}


function dealPostInfo($posts, $threads, $forums, $params, $_G) {
    $arrRet = array();

    //获取当前用户信息
    $space  = UserInfo($params, $_G['uid']);

    require_once libfile('function/post');
    foreach ($posts as $key => $value) {
        $row = array(
            "pid"       =>  $value['pid'],
            "tid"       =>  $value['tid'],
            "author"    =>  empty($value['anonymous']) ? $value['author'] : '匿名',
            "authorId"  =>  $value['authorid'],
            "imageUrl"  =>  array(),
            "dateLine"  =>  formTimestampNature($value['dateline']),
            "message"   =>  messagecutstr($value['message'], 100),
            "anonymous" =>  $value['anonymous'],//是否匿名
            "position"  =>  $value['position'], //位置包含帖子
            "userName"  =>  empty($value['anonymous']) ? $value['author'] : '匿名',
            "avatar"    =>  $space['avatar'],
            "groupId"   =>  $space['groupid'],  //用户组id
            "source"    => !empty($threads[$value['tid']]) ? $threads[$value['tid']]['subject'] : "",  // 帖子名
            "forumName" => !empty($forums[$value['fid']]) ? $forums[$value['fid']]['name'] : "",   // 板块名
        );

        $replyPost = getMyReplyMessage($value['message']);
        if (!empty($replyPost)) {
            $replyPost['message'] = messagecutstr($replyPost['message'], 100);
            $row['replayPost'] = $replyPost;
        }

        $arrRet[] = $row;
    }

    return $arrRet;
}

/**
 * 根据正则匹配消息回复上条评论的内容
 *
 * @param $message
 * @return string 上条评论内容
 */
function getMyReplyMessage($message) {
    $replyPost = array();

    preg_match("/\[quote](.*?)\n(.*?)\[\/quote]/si", $message, $matches);

    // 正则匹配的回复消息
    if (!empty($matches[2])) {
        $replyPost['message'] = $matches[2];
    } else {
        return $replyPost;
    }

    $str = CHARSET == 'gbk' ? mb_convert_encoding("发表于", "GBK", "UTF-8") : "发表于";
    preg_match("/\[color=?.*?\](.+?){$str}(.+?)\[\/color\]/si", $message, $userMatches);

    if (!empty($userMatches[2])) {
        $replyPost['userName'] = trim($userMatches[1]);
        $replyPost['dateLine'] = trim($userMatches[2]);
    }

    return $replyPost;
}

/**
 * 初始化config_ucenter中的数据库配置
 */
function init_db($sql, $insertId = false) {

    require_once DISCUZ_ROOT.'/config/config_ucenter.php';
    if(function_exists("mysql_connect")) {
        require_once DISCUZ_ROOT.'/uc_server/lib/db.class.php';
    } else {
        require_once DISCUZ_ROOT.'/uc_server/lib/dbi.class.php';
    }
    $db = new ucserver_db();
    $db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET, UC_DBCONNECT, UC_DBTABLEPRE);

    if ($insertId) {
        $db->query($sql);
        $insertId = $db->insert_id();
        return $insertId;
    }

    $result = $db->fetch_all($sql);
    return $result;
}

/**
 * 校验是否开启远程附件模式
 *
 * @param $filename
 * @param $filesize
 * @return bool
 */
function checkIsRemote($filename) {
    global $_G;

    $ext = getFileExt($filename);

    if (getglobal('setting/ftp/on') && (
            (!$_G['setting']['ftp']['allowedexts'] && !$_G['setting']['ftp']['disallowedexts'])
            || ($_G['setting']['ftp']['allowedexts'] && in_array($ext, $_G['setting']['ftp']['allowedexts']))
            || ($_G['setting']['ftp']['disallowedexts']
                && !in_array($ext, $_G['setting']['ftp']['disallowedexts'])))) {
        return true;
    }

    return false;
}

/**
 * 获取文件后缀
 *
 * @param $filename
 * @return string
 */
function getFileExt($filename) {
    return addslashes(strtolower(substr(strrchr($filename, '.'), 1, 10)));
}