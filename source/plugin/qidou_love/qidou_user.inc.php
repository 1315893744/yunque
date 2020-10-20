<?php
    if(!defined('IN_DISCUZ')) {
            exit('Access Denied');
    }
    require_once dirname(__FILE__) . '/qidou_love.class.php';
    $is_appbyme = strpos($_SERVER['HTTP_USER_AGENT'], 'Appbyme') !== false;
    $act = addslashes($_GET['act']);
    $uid = $_G['uid'];
    $username = $_G['username'];
    $siteurl = $_G['siteurl'];
    $lang = lang('plugin/qidou_love');
    $qidou_love = $_G['cache']['plugin']['qidou_love'];
    
    if( !$act ){
        $love_id = addslashes($_GET['love_id']);
        if( !$love_id ){
            header('location:'.$siteurl.'/plugin.php?id=qidou_love');exit;
        }
        if( $uid ){
            $account_price = C::t('#qidou_love#love_user')->get_user_account($uid,$qidou_love['reward_price']);
        }else{
            $account_price = 0;
        }
        
        $love_first = C::t('#qidou_love#love_list')->get_is_love($uid,$love_id);
        if( $love_first['last_time'] != date('Y-m-d',$_G['timestamp']) ){
            $last_num = 0;
        }else{
            $last_num = $love_first['last_num'];
        }
        $trends_list = C::t('#qidou_love#love_trends')->get_trends_list(0,10,array('uid'=>$love_id));
        $tids = QidouLove::initial_data($trends_list,'tid');
        $give_count = C::t('#qidou_love#love_trends')->get_trends_give( $tids );
        $album_list = C::t('#qidou_love#love_trends')->get_album_list( $tids );
        $album_count = $album_list['count'];
        $album_list = $album_list['album'];
        $love_user = C::t('#qidou_love#love_user')->get_user_first($love_id);
        $reward_count = C::t('#qidou_love#love_reward')->get_ruser_count(array('rid'=>$love_id));
        $reward_user = C::t('#qidou_love#love_reward')->get_ruser_list(0,5,array('rid'=>$love_id));
        $reward_list_count = C::t('#qidou_love#love_reward')->get_reward_count(array('rid'=>$love_id));
        $reward_list = C::t('#qidou_love#love_reward')->get_reward_list(0,5,array('rid'=>$love_id));
        $is_look = count(array_filter(C::t('#qidou_love#love_user')->get_user_extend($uid)));
        $love_follow = C::t('#qidou_love#love_user')->get_is_follow($uid,$love_id);
        $follow_count = (int)C::t('#qidou_love#love_user')->get_follow_count($love_id);
        $love_list = C::t('#qidou_love#love_list')->get_love_list(0,5,array('love_id'=>$love_id));
        if( !count($love_user) ){
            $love_user = C::t('#qidou_love#love_user')->get_user_extend($love_id);
        }
        $qidou_love['jy_title'] = $love_user['user_name'];
        include template('qidou_love:user');
    }else if( $act == 'compile' ){
        if( !$uid ){
            include template('qidou_love:login');
        }else{
            $user = QidouLove::initial_user($uid);
            $album_list = explode(',',$user['album_list']);
            $album_list = $album_list[0]?$album_list:array();
            include template('qidou_love:compile');
        }
    }else if( $act == 'save' ){
        if( !$uid || FORMHASH != $_GET['formhash']){
                QidouLove::output(0);
        }
        $condition = array('uid'=>$uid);
        $data = QidouLove::check_array($_POST,3);
        
        $album_list = QidouLove::check_array($_POST['album'],3);
        $birth = explode('-',$data['birth']);
        
        if( $data['lat'] && $data['lng'] ){
            $love_user['lat'] = $data['lat'];
            $love_user['lng'] = $data['lng'];
        }
        $love_user['user_album'] = $album_list[$data['fengmian']?$data['fengmian']:0];
        $love_user['sigtext'] = $data['sigtext'];
        $love_user['gender'] = $data['gender'];
        $love_user['age'] = $birth[0]?date('Y')-$birth[0]:0;
        $love_user['birthyear'] = $birth[0];
        $love_user['birthmonth'] = $birth[1];
        $love_user['birthday'] = $birth[2];
        $love_user['height'] = $data['height'];
        $love_user['weight'] = $data['weight'];
        $love_user['constellation'] = $data['constellation'];
        $love_user['education'] = $data['education'];
        $love_user['occupation'] = $data['occupation'];
        $love_user['income'] = $data['income'];
        $love_user['house'] = $data['house'];
        $love_user['vehicle'] = $data['vehicle'];
        $love_user['affectivestatus'] = $data['affectivestatus'];
        $love_user['is_album'] = $data['fengmian'];
        $love_user['album_list'] = implode(',',$album_list);
        $love_user['user_tag'] = implode(',',QidouLove::check_array($_POST['user_tag'],3));
        
        $other_user['age'] = $love_user['age'];
        $other_user['height'] = $love_user['height'];
        C::t('#qidou_love#love_list')->update($other_user,$condition);
        C::t('#qidou_love#love_reward')->update($other_user,$condition);
        C::t('#qidou_love#love_user')->update($love_user,$condition);
        
        $dz_user['gender'] = $data['gender'];
        $dz_user['birthyear'] = $birth[0];
        $dz_user['birthmonth'] = $birth[1];
        $dz_user['birthday'] = $birth[2];
        $dz_user['height'] = $data['height'];
        $dz_user['weight'] = $data['weight'];
        $dz_user['constellation'] = $data['constellation'];
        $dz_user['education'] = $data['education'];
        $dz_user['occupation'] = $data['occupation'];
        $dz_user['affectivestatus'] = $data['affectivestatus'];
        DB::update('common_member_profile', $dz_user, $condition);
        
        QidouLove::output(1);
    }
    /*图片上传*/
    else if( $act == 'upload' ){
        if( !$uid || FORMHASH != $_GET['formhash']){
                QidouLove::output(0);
        }
        require_once dirname(__FILE__) . '/love_upload.class.php';
        if (empty($_FILES)) {
            QidouLove::output(false,'not_file');
        }
        
        foreach ($_FILES as $file) {
            $data['success'] = true;
            $data['pic'] = QidouLove::upload($siteurl,$file);
            echo json_encode($data);
        }
    }
    else if( $act == 'meet' ){
        $type = 3;
        $uid&&$extend_user = C::t('#qidou_love#love_user')->get_user_extend($uid);
        $limit = $qidou_love['meet_num'];
        $timestamp = $_G['timestamp'];
        
        $is_get = 0;
        $gender = QidouLove::return_gender($qidou_love['meet_gender'],$extend_user['gender']);
        
        if( $uid ){
            $user = QidouLove::initial_user($uid);
            if( $timestamp < $user['meet_time'] ){
                $meet_uids = $user['meet_uids'];
            }else{
                $is_get = 1;
            }
        }else{
            $limit = 1;
            if( $timestamp < $_COOKIE['meet_time'] ){
                $meet_uids = $_COOKIE['meet_uids'];
            }else{
                $is_get = 1;
            }
        }
        if( $is_get ){
            $meet_user = C::t('#qidou_love#love_user')->get_rand_meet( $limit,array('gender'=>$gender) );
            $meet_uids = implode(',',QidouLove::initial_data($meet_user,'uid'));
            $next_meet_time = $timestamp + $qidou_love['meet_time'] * 3600;
            if( $uid ){
                C::t('#qidou_love#love_user')->update(array('meet_time'=>$next_meet_time,'meet_uids'=>$meet_uids),array('uid'=>$uid));
            }else{
                setcookie('meet_time',$next_meet_time,strtotime('+7day'));
                setcookie('meet_uids',$meet_uids,strtotime('+7day'));
            }
        }else{
            $next_meet_time = $user['meet_time']?$user['meet_time']:$_COOKIE['meet_time'];
            $next_meet_time = $next_meet_time?$next_meet_time:$timestamp + $qidou_love['meet_time'] * 3600;
            $meet_user = C::t('#qidou_love#love_user')->get_user_gather( $meet_uids );
        }
        include template('qidou_love:meet');
    }
    