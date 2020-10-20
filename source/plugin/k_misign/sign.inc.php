<?php
!defined('IN_DISCUZ') && exit('Access Denied');
define('IN_k_misign', '1');

$setting = $misign = $_G['cache']['plugin']['k_misign'];
$setting['pluginurl'] = $misign['pluginurl'] = $misign['pluginurl'] ? $misign['pluginurl'] : 'plugin.php?id=k_misign:';
require_once libfile('function/core', 'plugin/k_misign');
$operation = $_GET['operation'];
$inwsq = intval($_GET['wsq']);

$tdtime = gmmktime(0,0,0,dgmdate($_G['timestamp'], 'n',$misign['tos']),dgmdate($_G['timestamp'], 'j',$misign['tos']),dgmdate($_G['timestamp'], 'Y',$misign['tos'])) - $misign['tos']*3600;
$htime = dgmdate($_G['timestamp'], 'H',$misign['tos']);

$nlvtext = str_replace(array("\r\n", "\n", "\r"), '/hhf/', $misign['lvtext']);
$njlmain =str_replace(array("\r\n", "\n", "\r"), '/hhf/', $misign['jlmain']);
list($lv1name, $lv2name, $lv3name, $lv4name, $lv5name, $lv6name, $lv7name, $lv8name, $lv9name, $lv10name, $lvmastername) = explode("/hhf/", $nlvtext);
$extreward = explode("/hhf/", $njlmain);
$extreward_num = count($extreward);
$setting['groups'] = $misign['groups'] = unserialize($misign['groups']);
$setting['ban'] = $misign['ban'] = explode(",",$misign['ban']);

$qiandaodb = C::t("#k_misign#plugin_k_misign")->fetch_by_uid($_G['uid']);
$num = C::t("#k_misign#plugin_k_misign")->count_by_time($tdtime);
$stats = C::t("#k_misign#plugin_k_misignset")->fetch(1);

$lastmonth = dgmdate(C::t("#k_misign#plugin_k_misign")->getlasttime(), 'm', $misign['tos']);
$nowmonth = dgmdate($_G['timestamp'], 'm', $misign['tos']);
if($nowmonth != $lastmonth)C::t("#k_misign#plugin_k_misign")->clearmdays();

if(defined('IN_MOBILE') && !$_G['uid'] && !$inwsq){
	 showmessage('to_login', 'member.php?mod=logging&action=login', array(), array('showmsg' => true, 'login' => 1));
}

if($operation == 'list') {
	require_once DISCUZ_ROOT.'./source/plugin/k_misign/module/module_list.php';
} elseif($operation == 'qiandao') {
	require_once DISCUZ_ROOT.'./source/plugin/k_misign/module/module_qiandao.php';
}else{
	require_once DISCUZ_ROOT.'./source/plugin/k_misign/module/module_index.php';
}
?>