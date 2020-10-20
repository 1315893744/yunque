<?php
    if(!defined('IN_DISCUZ')) {
            exit('Access Denied');
    }
    require_once dirname(__FILE__) . '/qidou_love.class.php';
    $act = addslashes($_GET['act']);
    $uid = $_G['uid'];
    $username = $_G['username'];
    $siteurl = $_G['siteurl'];
    $lang = lang('plugin/qidou_love');
    $qidou_love = $_G['cache']['plugin']['qidou_love'];
    
    
    if( $act == 'love_list' ){
        $user_type = intval($_GET['user_type']);
        $user_group = C::t('#qidou_love#love_user')->get_user_group();
        $love_id = addslashes($_GET['love_id']);
        $love_user = C::t('#qidou_love#love_user')->get_user_first($love_id);
        $qidou_love['jy_title'] = $love_user['user_name'];
        if( $user_type == 1 ){
            $love_list = C::t('#qidou_love#love_list')->get_love_list(0,10,array('love_id'=>$love_id));
        }else if( $user_type == 2 ){
            $love_list = C::t('#qidou_love#love_reward')->get_ruser_list(0,10,array('rid'=>$love_id));
        }else if( $user_type == 3 ){
            $love_list = C::t('#qidou_love#love_reward')->get_reward_list(0,10,array('rid'=>$love_id));
        }
        include template('qidou_love:love');
    }else if( $act == 'ajax_love_list' ){
        $user_type = intval($_REQUEST['user_type']);
        $user_group = C::t('#qidou_love#love_user')->get_user_group();
        $love_id = addslashes($_GET['love_id']);
        $love_page = intval($_REQUEST['start']); 
        $love_start = $love_page*10;
        if( $user_type == 1 ){
            $love_list = C::t('#qidou_love#love_list')->get_love_list($love_start,10,array('love_id'=>$love_id));
        }else if( $user_type == 2 ){
            $love_list = C::t('#qidou_love#love_reward')->get_ruser_list($love_start,10,array('rid'=>$love_id));
        }else if( $user_type == 3 ){
            $love_list = C::t('#qidou_love#love_reward')->get_reward_list($love_start,10,array('rid'=>$love_id));
        }
        include template('qidou_love:ajax_love_list');
    }else if( $act == 'ajax_index_list' ){
        $index_page = intval($_REQUEST['start']); 
        $gender = intval($_REQUEST['gender']); 
        $type = intval($_REQUEST['type']); 
        $index_start = $index_page*10;
        $condition['gender'] = $gender;
        $condition['orderby'] = 1;
        $condition['recom'] = $type;
        $love_user = C::t('#qidou_love#love_user')->get_user_list($index_start,10,$condition);
        include template('qidou_love:ajax_index_list');
    }else if( $act == 'ajax_trends_list' ){
        $love_id = addslashes($_REQUEST['love_id']);
        $index_page = intval($_REQUEST['start']);
        $type = intval($_REQUEST['type']); 
        $index_start = $index_page*10;
        $trends_list = C::t('#qidou_love#love_trends')->get_trends_list($index_start,10,array('uid'=>$love_id));
        if( count($trends_list) ){
            $tids = QidouLove::initial_data($trends_list,'tid');
            if( $type == 1 ){
                $give_count = C::t('#qidou_love#love_trends')->get_trends_give( $tids );
            }
            $album_list = C::t('#qidou_love#love_trends')->get_album_list($tids);
            $album_count = $album_list['count'];
            $album_list = $album_list['album'];
        }
        include template('qidou_love:ajax_trends_list');
    }