<?php
    if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
        exit('Access Denied');
    }
    require_once dirname(__FILE__) . '/qidou_love.class.php';
    $act = addslashes($_GET['act']);
    $siteurl = $_G['siteurl'];
    $a_lang = lang('plugin/qidou_love');
    
    /*红包用户列表*/
    if( !$act ){
        $perpage = max(20, empty($_GET['perpage']) ? 20 : intval($_GET['perpage']));
	$start_limit = ($page - 1) * $perpage;
        $condition['all'] = 1;
        $condition['user_name'] = addslashes($_REQUEST['user_name']);
        $condition['gender'] = intval($_REQUEST['gender']);
        $condition['is_recom'] = intval($_REQUEST['is_recom']);
        $count = C::t('#qidou_love#love_user')->get_user_count($condition);
        $mpurl = ADMINSCRIPT."?action=plugins&operation=config&do=".$pluginid."&identifier=qidou_love&pmod=admin_user&".QidouLove::param_join($condition);
	$multipage = multi($count, $perpage, $page, $mpurl, 0, 3);
        $user_list = C::t('#qidou_love#love_user')->get_user_list($start_limit,$perpage,$condition);
        
        
        $gender_stlect = QidouLove::create_select('gender',array(array(1,$a_lang['h_d_1_1']),array(2,$a_lang['h_d_1_2'])),$condition['gender'],array(0,$a_lang['a_all']));
        $recom_stlect = QidouLove::create_select('is_recom',array(array(1,$a_lang['a_no']),array(2,$a_lang['a_yes'])),$condition['is_recom'],array(0,$a_lang['a_all']));
        
        echo <<<SEARCH
            <form method="post" autocomplete="off" id="tb_search" action="$mpurl">
            <table style="padding:10px 0;">
                <tbody>
                    <tr>
                        <th></th><td>$a_lang[a_user_name] : <input type="text" name="user_name" value="$condition[user_name]"></td>
                        <th></th><td>$a_lang[a_is_recom] : $recom_stlect</td>
                        <th></th><td>$a_lang[a_gender] : $gender_stlect</td>
                        <th></th><td><input type="submit" class="btn" value="$a_lang[a_submit]"></td>
                    </tr>
                </tbody>
            </table>
            </form>
SEARCH;
        
        
        
	showformheader("plugins&operation=config&do=".$pluginid."&identifier=qidou_love&pmod=admin_user&act=del", 'enctype');
	showtableheader();
	echo    '<tr class="header"><th></th><th>'.
                $a_lang['a_uid'].'</th><th>'.
		$a_lang['a_user_name'].'</th><th>'.
		$a_lang['a_gender'].'</th><th>'.
                $a_lang['a_age'].'</th><th>'.
                $a_lang['a_birth'].'</th><th>'.
                $a_lang['a_constellation'].'</th><th>'.
                $a_lang['a_education'].'</th><th>'.
                $a_lang['a_occupation'].'</th><th>'.
                $a_lang['a_handle'].'</th><th>'.
                '</th></tr>';
	foreach($user_list as $list) {
            $year = date('Y');
            echo'<tr class="hover">'.
                '<th class="td25"><input class="checkbox" type="checkbox" name="delete['.$list['uid'].']" value="'.$list['uid'].'"></th>'.
                '<th width="60">'.$list['uid'].'</th>'.
                '<th>'.$list['user_name'].'</th>'.
                '<th>'.$a_lang['h_d_1_'.$list['gender']].'</th>'.
                '<th>'.($year-$list['birthyear']).'</th>'.
                '<th>'.$list['birthyear'].'-'.$list['birthmonth'].'-'.$list['birthday'].'</th>'.
                '<th>'.$list['constellation'].'</th>'.
                '<th>'.$list['education'].'</th>'.
                '<th>'.$list['occupation'].'</th>'.
                '<th width="180">'
                    .'<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=qidou_love&pmod=admin_user&act=save&uid='.$list['uid'].'">'.$a_lang['a_look'].'</a></th>'.
                '</tr>';
                '</tr>';
	}
        showsubmit('submit',$a_lang['a_del'],'', '', $multipage);
	showtablefooter();
	showformfooter();
    }
    /*修改红包*/
    else if( $act=='save'){
        if(!submitcheck('submit')) {
            $uid = intval($_GET['uid']);
            $love_user = C::t('#qidou_love#love_user')->get_user_first($uid);
            include template('qidou_love:admin_user_save');
        }else{
            $data = QidouLove::check_array($_POST,3);
            $condition = array('uid'=>$data['uid']);
            
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
            $love_user['is_recom'] = $data['is_recom'];
            $love_user['album_list'] = implode(',',$album_list);
            $love_user['user_tag'] = $data['user_tag'];

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
            
            cpmsg($a_lang['h_keep_success'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=qidou_love&pmod=admin_user', 'succeed');
        }
    }
    /*删除分类*/
    elseif($act == 'del') {
	if(submitcheck('submit')) {
            foreach($_POST['delete'] as $delete) {
                $delete_type = C::t('#qidou_love#love_user')->get_user_first($delete);
                if( $delete_type['album_list'] ){
                    $old_logo = str_replace($_G['siteurl'],'',$delete_type['album_list']);
                    $old_logo =  explode(',',$old_logo);
                    foreach( $old_logo as $img ){
                        $img =  DISCUZ_ROOT.$img;
                        unlink($img);
                    }
                }
                C::t('#qidou_love#love_user')->delete(array('uid'=>$delete));
            }
            cpmsg($a_lang['h_keep_success'], 'action=plugins&operation=config&do='.$pluginid.'&identifier=qidou_love&pmod=admin_user', 'succeed');
        }

    }
?>