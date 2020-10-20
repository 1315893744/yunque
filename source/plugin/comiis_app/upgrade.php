<?php

 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$sql = '';
include_once DISCUZ_ROOT.'./source/plugin/comiis_app/language/language.'.currentlang().'.php';
include_once DISCUZ_ROOT.'./source/plugin/comiis_app/function/function_comiis_app.php';
$comiis_nav_num = DB::result_first("SELECT COUNT(*) FROM %t", array('comiis_app_nav'));
$comiis_app_switch_data = DB::fetch_all("SELECT name FROM %t", array('comiis_app_switch'), 'name');
foreach($comiis_app_switch_insert as $k => $v){
	if(!isset($comiis_app_switch_data[$k])){
		DB::insert("comiis_app_switch", array(
			'name' => $k,
			'value' => $v,
		));
	}
}
if(!$comiis_nav_num){
	$sql = $comiis_app_nav_insert;
}
loadcache('comiis_app_list_style');
if(!is_array($_G['cache']['comiis_app_list_style'])){
	$new_comiis_app_list_style = array(
		'fid_picnum' => array(
			'1' => '9',
			'2' => '9',
			'3' => '3',
			'4' => '9',
			'5' => '3',
			'6' => '3',
		),
		'fidlist' => array(),
		'stylelist' => array(),
		'default_s_style' => '4',
		'default_t_style' => '4',
		'default_h_style' => '4',
		'default_b_style' => '4',
		'default_g_style' => '4',
	);
	save_syscache('comiis_app_list_style', $new_comiis_app_list_style);
}
loadcache('comiis_app_list_style', 1);
if(!$_G['cache']['comiis_app_list_style']['default_g_style']){
	$_G['cache']['comiis_app_list_style']['default_g_style'] = 4;
	save_syscache('comiis_app_list_style', $_G['cache']['comiis_app_list_style']);
}
runquery("ALTER TABLE  `pre_comiis_app_nav`  MODIFY COLUMN `navtype` ENUM('lnav','mnav','tnav','fnav','ynav');". $sql);
comiis_app_up_switch();
comiis_app_up_nav();
$tpl = dir(DISCUZ_ROOT.'./data/template');
while($entry = $tpl->read()) {
	if(preg_match("/\.tpls\.php$/", $entry)) {
		@unlink(DISCUZ_ROOT.'./data/template/'.$entry);
	}
}
$tpl->close();
$finish = TRUE;