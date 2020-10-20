<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$op = in_array($_GET['op'], array('install', 'uninstall')) ? $_GET['op'] : '';

if(!$op){
	$pertask = isset($_GET['pertask']) ? intval($_GET['pertask']) : 200;
	$current = isset($_GET['current']) && $_GET['current'] > 0 ? intval($_GET['current']) : 0;
	$next = $current + $pertask;
	$nextlink = "action=plugins&operation=config&do=".$pluginid."&identifier=k_misign&pmod=cp_extend&act=tool_fixbq&current=".$next."&pertask=".$pertask;
	$processed = 0;
	
	$query = DB::query("SELECT * FROM ".DB::table("plugin_k_misign_bq")." ORDER BY bid DESC LIMIT ".$current." ,".$pertask);
	while($v = DB::fetch($query)) {
		$processed = 1;
		if($v['thistime'] - $v['lasttime'] <= 86400){
			C::t("#k_misign#plugin_k_misign_bq")->delete($v['bid']);
		}
	}
	if($processed) {
		cpmsg(lang('plugin/k_fh', 'loading').cplang('counter_processing', array('current' => $current, 'next' => $next)), $nextlink, 'loading');
	} else {
		cpmsg(lang('plugin/k_fh', 'success'), "action=plugins&operation=config&do=".$pluginid."&identifier=k_misign&pmod=cp_extend", 'succeed');
	}
}elseif($op == 'install'){
	cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend", 'succeed');
}elseif($op == 'uninstall'){
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_tool_fixbq.php');
	cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend", 'succeed');
}
?>