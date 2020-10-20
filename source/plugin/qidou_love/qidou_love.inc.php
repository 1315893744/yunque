<?php
    if(!defined('IN_DISCUZ')) {
            exit('Access Denied');
    }
    require_once dirname(__FILE__) . '/qidou_love.class.php';
    $is_appbyme = strpos($_SERVER['HTTP_USER_AGENT'], 'Appbyme') !== false;
    $act = addslashes($_GET['act']);
    $uid = $_G['uid'];
    $siteurl = $_G['siteurl'];
    $lang = lang('plugin/qidou_love');
    $qidou_love = $_G['cache']['plugin']['qidou_love'];
    
    if( !$act ){
        $type = $_GET['type']?intval($_GET['type']):1;
        $uid&&$extend_user = C::t('#qidou_love#love_user')->get_user_extend($uid);
        $uid&&$this_user = C::t('#qidou_love#love_user')->get_user_first($uid);
        if( $type == 1 ){
            $condition['gender']=0;
        }elseif($type == 2 ){
            $condition['gender'] = 2;
        }elseif($type == 4){
            $condition['gender'] = 1;
        }else{
            $condition['gender'] = QidouLove::return_gender($qidou_love['meet_gender'],$extend_user['gender']);
        }
        $condition['orderby'] = 1;
        $condition['recom'] = $type;
        $love_user = C::t('#qidou_love#love_user')->get_user_list(0,10,$condition);
        include template('qidou_love:index');
    }
    