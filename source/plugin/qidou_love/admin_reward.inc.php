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
        $condition['uid'] = isset($_REQUEST['uid'])?intval($_REQUEST['uid']):'';
        $condition['rid'] = isset($_REQUEST['rid'])?intval($_REQUEST['rid']):'';
        $condition['r_name'] = addslashes($_REQUEST['r_name']);
        $count = C::t('#qidou_love#love_reward')->get_reward_count($condition);
        $mpurl = ADMINSCRIPT."?action=plugins&operation=config&do=".$pluginid."&identifier=qidou_love&pmod=admin_reward&".QidouLove::param_join($condition);
	$multipage = multi($count, $perpage, $page, $mpurl, 0, 3);
        $user_list = C::t('#qidou_love#love_reward')->get_reward_list($start_limit,$perpage,$condition);
        
        echo <<<SEARCH
            <form method="post" autocomplete="off" id="tb_search" action="$mpurl">
            <table style="padding:10px 0;">
                <tbody>
                    <tr>
                        <th></th><td>$a_lang[a_r_uid] : <input type="text" name="uid" value="$condition[uid]"></td>
                        <th></th><td>$a_lang[a_r_rid] : <input type="text" name="rid" value="$condition[rid]"></td>
                        <th></th><td>$a_lang[a_r_name] : <input type="text" name="r_name" value="$condition[r_name]"></td>
                        <th></th><td><input type="submit" class="btn" value="$a_lang[a_submit]"></td>
                    </tr>
                </tbody>
            </table>
            </form>
SEARCH;
        
        
        
	showformheader($mpurl, 'enctype');
	showtableheader();
	echo    '<tr class="header"><th>'.
                $a_lang['a_r_uid'].'</th><th>'.
		$a_lang['a_r_rid'].'</th><th>'.
		$a_lang['a_r_image'].'</th><th>'.
                $a_lang['a_r_name'].'</th><th>'.
                $a_lang['a_r_price'].'</th><th>'.
                $a_lang['a_r_time'].'</th><th>'.
                '</th></tr>';
	foreach($user_list as $list) {
            $year = date('Y');
            echo'<tr class="hover">'.
                '<th>'.$list['uid'].'</th>'.
                '<th>'.$list['rid'].'</th>'.
                '<th><img src="'.$list['r_image'].'" width="50"/></th>'.
                '<th>'.$list['r_name'].'</th>'.
                '<th>'.$list['r_price'].'</th>'.
                '<th>'.date('Y-m-d H:i',$list['add_time']).'</th>'.
                '</tr>';
	}
        echo '<tr><td colspan="15"><div class="cuspages right">'.$multipage.'</div></td></tr>';
	showtablefooter();
	showformfooter();
    }
?>