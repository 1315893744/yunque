<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$op = addslashes($_GET['op']);

$page = max(1, intval($_GET['page']));
$setting['listppparr'] = $misign['listppparr'] = explode('|', $misign['listppp']);
if(defined('IN_MOBILE')){
	$perpage = $misign['listppparr'][1] ? intval($misign['listppparr'][1]) : intval($misign['listppparr'][0]);
}else{
	$perpage = $misign['listppparr'][0] ? intval($misign['listppparr'][0]) : 10;
}
$start_limit = ($page - 1) * $perpage;
if($op == 'month'){
	$num = C::t("#k_misign#plugin_k_misign")->getcount('mdays', '0', 'notin');
	$multipage = multi($num, $perpage, $page, "plugin.php?id=k_misign:sign&operation=list&op=".$op);
} elseif($op == ''){
	$num = C::t("#k_misign#plugin_k_misign")->getcount('time', $tdtime, '>=');
	$multipage = multi($num, $perpage, $page, "plugin.php?id=k_misign:sign&operation=list&op=".$op);
} else {
	$num = C::t("#k_misign#plugin_k_misign")->getcount();
	$multipage = multi($num, $perpage, $page, "plugin.php?id=k_misign:sign&operation=list&op=".$op);
}
	$list_turn = 'DESC';
if($op == 'zong'){
	$list_type = 'q.days';
} elseif ($op == 'month') {
	$list_type = 'q.mdays';
} elseif ($op == 'rewardlist') {
	$list_type = 'q.reward';
} elseif ($op == '') {
	$list_type = 'q.time';
	$list_tdtime = $tdtime;
	if($misign['qddesc']) {
		$list_turn = 'DESC';
	} else {
		$list_turn = 'ASC';
	}
	if(defined('IN_MOBILE')){
		$list_turn = 'DESC';
	}
}
$mrcs = array();
foreach(C::t("#k_misign#plugin_k_misign")->getsignlist($list_type, $list_turn, $start_limit, $perpage, $list_tdtime) as $mrc) {
	if(defined('IN_MOBILE')){
		$mrc['time'] = dgmdate($mrc['time'], 'u');
	}else{
		$mrc['time'] = dgmdate($mrc['time'], 'Y-m-d H:i');
	}
	$mrc['levelarray'] = get_level($mrc['days']);
	$mrc['level'] = $mrc['levelarray']['level'];
	$mrcs[] = $mrc;
}
if(defined('IN_MOBILE')){
	include template('diy:k_misign_list', '', 'source/plugin/k_misign/template/'.($misign['styles']['mobile'] ? $misign['styles']['mobile'] : 'mobile_default'));
}else{
	include template('diy:k_misign_list', '', 'source/plugin/k_misign/template/'.($misign['styles']['pc'] ? $misign['styles']['pc'] : 'default'));
}
?>