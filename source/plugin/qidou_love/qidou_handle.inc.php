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
    
    if( !$uid || FORMHASH != $_GET['formhash']){
        QidouLove::output(0);
    }
    
    if( $act == 'follow' ){
        $data = QidouLove::check_array($_POST,3);
        $followuid = $data['followuid'];
        $followname = $data['followname'];
        $followtype = $data['type'];
        if( $followtype == 'cancel' ){
            C::t('#qidou_love#love_user')->del_follow(array('followuid'=>$followuid,'uid'=>$uid));
            QidouLove::output(1);
        }else if( $followtype == 'follow' ){
            C::t('#qidou_love#love_user')->add_follow(
                array('uid'=>$uid,'username'=>$username,'followuid'=>$followuid,'fusername'=>$followname)
            );
            QidouLove::output(2);
        }
    }else if( $act == 'love' ){
        $data = QidouLove::check_array($_POST,3);
        $love_id = $data['love_id'];
        $love_first = C::t('#qidou_love#love_list')->get_is_love($uid,$love_id);
        if( $love_id == $uid ){
            QidouLove::output(1);
        }
        if( !$love_first ){
            $love_user = C::t('#qidou_love#love_user')->get_user_first($love_id);
            $extend_user = C::t('#qidou_love#love_user')->get_user_extend($uid);
            if( !count($love_user) ){
                $love_extend_user = C::t('#qidou_love#love_user')->get_user_extend($love_id);
                $love_extend_user['uid'] = $love_id;
                $love_extend_user['add_time'] = $_G['timestamp'];
                C::t('#qidou_love#love_user')->insert($love_extend_user);
            }
            C::t('#qidou_love#love_user')->update_num($love_id,'charm_num');
            C::t('#qidou_love#love_user')->update_num($love_id,'people_num');
            C::t('#qidou_love#love_list')->add_love(array(
                'uid'=>$uid,
                'groupid'=>$extend_user['groupid'],
                'love_id'=>$love_id,
                'love_num'=>1,
                'user_name'=>$username,
                'age'=>$extend_user['birthyear']?date('Y') - $extend_user['birthyear']:0,
                'height'=>$extend_user['height'],
                'last_num'=>1,
                'last_time'=>date('Y-m-d',$_G['timestamp']),
                'add_time'=>$_G['timestamp']
            ));
        }else{
            $love_num = $love_first['love_num'];
            $last_num = $love_first['last_num'];
            if( $love_first['last_time'] != date('Y-m-d',$_G['timestamp']) ){
                $last_num = 1;
            }else{
                $last_num ++;
            }
            $love_num++;
            if( $last_num <= $qidou_love['love_num'] ){
                C::t('#qidou_love#love_user')->update_num($love_id,'charm_num');
                C::t('#qidou_love#love_list')->update(array(
                    'love_num'=>$love_num,
                    'last_num'=>$last_num,
                    'last_time'=>date('Y-m-d',$_G['timestamp'])
                ),array('uid'=>$uid,'love_id'=>$love_id));
            }
        }
        QidouLove::output(1);
    }else if( $act == 'send_message' ){
        $data = QidouLove::check_array($_POST,3);
        require_once libfile('api/qidou_message', 'plugin/qidou_love');
        $post_message = new qidou_message();
        $result = $post_message->send_message( $uid,$data['get_uid'], $lang['h_greeting_info'], $data['message'] );
        QidouLove::output($result);
    }else if( $act == 'reward' ){
        $data = QidouLove::check_array($_POST,3);
        $reward = explode("\r\n",$qidou_love['reward_list']);
        $reward = explode(',',$reward[$data['reward_id']]);
        $account_price = C::t('#qidou_love#love_user')->get_user_account($uid,$qidou_love['reward_price']);
        
        if( $account_price < $reward[2] ){
            QidouLove::output(1);
        }
        if( $uid == $data['rid'] ){
            QidouLove::output(2);
        }
        $extend_user = C::t('#qidou_love#love_user')->get_user_extend($uid);
        $reward_data['uid'] = $uid;
        $reward_data['rid'] = $data['rid'];
        $reward_data['groupid'] = $extend_user['groupid'];
        $reward_data['r_image'] = $reward[0];
        $reward_data['r_name'] = $reward[1];
        $reward_data['r_price'] = $reward[2];
        $reward_data['user_name'] = $username;
        $reward_data['age'] = $extend_user['birthyear']?date('Y') - $extend_user['birthyear']:0;
        $reward_data['height'] = $extend_user['height'];
        $reward_data['add_time'] = $_G['timestamp'];
        
        $result = C::t('#qidou_love#love_reward')->insert( $reward_data );
        if( $result ){
            require_once libfile('api/qidou_message', 'plugin/qidou_love');
            $post_message = new qidou_message();
            $post_message->send_message( $uid,$data['rid'],$lang['h_wgndsl'].$reward[1],$lang['h_wgndsl'].$reward[1]);
            updatemembercount($uid,array('extcredits'.$qidou_love['reward_price']=>-$reward[2]),true,'JDS',1,1,1,1);
            updatemembercount($data['rid'],array('extcredits'.$qidou_love['reward_price']=>$reward[2]),true,'JDS',1,1,1,1);
        }
        QidouLove::output(2);
    }