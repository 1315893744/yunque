<?php

/**
 * perm.php
 *
 * @description : 权限需求2.0实现
 *
 * @author : zhaoxichao
 * @since : 28/08/2019
 */

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class perm {

    /**
     * @var array
     */
    public static $arrPermFields = array(
        'view'      => 'viewperm, formulaperm, password',
        'post'      => 'postperm',
        'reply'     => 'replyperm',
    );

    /**
     * getViewPerm
     * @description : 用户点击某板块时才进行权限判断(含登录判断)
     *
     * @param array $G
     * @param int   $fid
     * @return bool
     * @throws discuz_exception
     * @author zhaoxichao
     * @date 28/08/2019
     */
    public static function getViewPerm($G = array(), $fid = 0) {
        if (empty($fid)) {
            throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, __FUNCTION__);
        }

        $rsp = self::ForumGroupPerm('view', $fid);
        $G['groupid'] = empty($G['uid']) ? '7' : $G['groupid'];   // 默认赋值游客用户组
        // 当前板块已设置会员组权限
        if (!empty($rsp['viewperm'])) {
            // 用户所在会员组无浏览板块的权限
            if (strpos($rsp['viewperm'], $G['groupid']) === false) {
                if (empty($G['uid'])) {
                    // 用户为游客,提示用户登录
                    throw new discuz_exception(error_plugin::ERROR_LOGIN_MUST, __FUNCTION__);
                } else {
                    // 当前暂无浏览该板块权限
                    throw new discuz_exception(error_plugin::ERROR_FORUM_VIEW_PERM, __FUNCTION__);
                }
            }
        }

        // 当前板块已设置用户访问权限
        $str = unserialize($rsp['formulaperm']);
        if (!empty($str['users'])) {
            if (empty($G['uid'])) {
                // 用户为游客,当前板块只有特定用户才能查看，是否前往登录
                throw new discuz_exception(error_plugin::ERROR_LOGIN_MUST_SPECIAL, __FUNCTION__);
            } else {
                // 当前用户没有包含在访问用户内
                if (isset($str['users']) && strpos($str['users'], $G['username']) === false) {
                    // 本板块只有特定用户可以访问
                    throw new discuz_exception(error_plugin::ERROR_LOGIN_MUST_SPECIAL_USER, __FUNCTION__);
                }
            }
        }

        // 当前板块已设置密码访问权限
        if (!empty($rsp['password'])) {

            // 先判断无密码情况时
            if (empty($G['forum_pwd'])) {
                if ($G['cookie']['fidpw'.$fid] != $rsp['password']) {
                    throw new discuz_exception(error_plugin::ERROR_FORUM_VIEW_PERM_PWD, __FUNCTION__);
                }

                return true;
            }

            if ($rsp['password'] != $G['forum_pwd']) {
                throw new discuz_exception(error_plugin::ERROR_FORUM_VIEW_PERM_PWD_INVALID, __FUNCTION__);
            }

            dsetcookie('fidpw'.$fid, $rsp['password']);

        }
    }

    /**
     * getPostPerm
     * @description : 获取发帖权限
     *
     * @param array $G
     * @param int   $fid
     * @return bool
     * @throws discuz_exception
     * @author zhaoxichao
     * @date 28/08/2019
     */
    public static function getPostPerm($G = array(), $fid = 0) {
        if (empty($fid)) {
            throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, __FUNCTION__);
        }

        $rsp = self::ForumGroupPerm('post', $fid);
        if (empty($rsp['postperm']) || (strpos($rsp['postperm'], $G['groupid']) !== false)) {
            return true;
        }

        return false;
    }

    /**
     * getReplyPerm
     * @description : 获取回帖权限
     *
     * @param array $G
     * @param int   $fid
     * @return bool
     * @throws discuz_exception
     * @author zhaoxichao
     * @date 28/08/2019
     */
    public static function getReplyPerm($G, $fid) {
        if (empty($fid)) {
            throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, __FUNCTION__);
        }

        $rsp = self::ForumGroupPerm('reply', $fid);
        if (empty($rsp['replyperm']) || (strpos($rsp['replyperm'], $G['groupid']) !== false)) {
            return true;
        }

        return false;
    }

    /**
     * ForumGroupPerm
     * @description : 获取板块相关设置权限
     *
     * @param string $type
     *  $type: pwd          访问密码
     *  $type: white        访问用户白名单
     *  $type: view         读权限
     *  $type: post         发帖权限
     *  $type: reply        回帖权限
     * @param int    $fid
     * @return array
     * @throws discuz_exception
     * @author zhaoxichao
     * @date 28/08/2019
     */
    private function ForumGroupPerm($type = '', $fid = 0) {
        $arrRet = array();

        if (!isset(self::$arrPermFields[$type]) || empty($fid)) {
            throw new discuz_exception(error_plugin::ERROR_PARAMS_INVALID, __FUNCTION__);
        }

        $sql = 'select '.self::$arrPermFields[$type].' from  ' .DB::table('forum_forumfield'). ' where fid = '.$fid;
        $res = DB::fetch_all($sql);
        if (empty($res) || empty($res[0])) {
            return  $arrRet;
        }

        return $res[0];
    }

    /**
     * getFeedViewPerm
     * @description :   获取首页帖子流查看帖子权限
     *
     * @param $G        全局变量（存储登录用户相关信息）
     * @param $fid      帖子ID
     * @return bool
     * @author zhaoxichao
     * @date 11/10/2019
     */
    public static function getFeedViewPerm($G, $fid) {
        if (empty($fid)) {
            return false;
        }

        $rsp = self::ForumGroupPerm('view', $fid);
        $G['groupid'] = empty($G['uid']) ? '7' : $G['groupid'];   // 默认赋值游客用户组
        // 当前板块已设置会员组权限
        if (!empty($rsp['viewperm'])) {
            // 用户所在会员组无浏览板块的权限
            if (strpos($rsp['viewperm'], $G['groupid']) === false) {
                return false;
            }
        }

        // 当前板块已设置用户访问权限
        $str = unserialize($rsp['formulaperm']);
        if (!empty($str['users'])) {
            if (empty($G['uid'])) {
                // 用户为游客,当前板块只有特定用户才能查看，是否前往登录
                return false;
            } else {
                // 当前用户没有包含在访问用户内
                if (isset($str['users']) && strpos($str['users'], $G['username']) === false) {
                    // 本板块只有特定用户可以访问
                    return false;
                }
            }
        }

        // 当前板块已设置密码访问权限
        if (!empty($rsp['password'])) {
            if (empty($G['forum_pwd'])) {
                return false;
            }

            if ($rsp['password'] != $G['forum_pwd']) {
                return false;
            }
        }

        return true;
    }

}