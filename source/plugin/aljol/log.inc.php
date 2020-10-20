<?php



if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$act = htmlspecialchars($_GET['act']);
if($act == 'delete'){
	if(is_array($_POST['delete'])) {
		foreach($_POST['delete'] as $id) {
			DB::query('delete from %t where id=%d',array('aljol_talk', $id));
		}
	}
	$currpage = $_GET['page'] ? intval($_GET['page']) : 1;
	cpmsg('&#25805;&#20316;&#25104;&#21151;&#65281;','action=plugins&operation=config&do=' . $_GET['do'] . '&identifier=aljol&pmod=log&page='.$currpage);
}else{
	$currpage = $_GET['page'] ? intval($_GET['page']) : 1;
	$perpage = 11;
	$num = DB::result_first('select count(*) from %t',array('aljol_talk'));
	$start = ($currpage - 1) * $perpage;
	$loglist = DB::fetch_all('select * from %t order by id desc limit %d,%d',array('aljol_talk',$start,$perpage));
	foreach($loglist as $k => $log){
		if($log['friendid']){
			$frienduser = getuserbyuid($log['friendid']);
			$log['friendusername'] = $frienduser['username'];
			$loglist[$k] = $log;
		}
	}
	$paging = helper_page :: multi($num, $perpage, $currpage, 'admin.php?action=plugins&operation=config&do=' . $_GET['do'] . '&identifier=aljol&pmod=log', 0, 11, false, false);
	include template('aljol:log');
}
?>
