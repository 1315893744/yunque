<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$comiis_bg = 1;
$comiis_head = array('left' => '', 'center' => $_G['cache']['plugin']['comiis_app_find']['comiis_app_find_name'], 'right' => '');
$plugin_id = 'comiis_app_find';
$comiis_upload = 0;
$comiis_md5file = $comiis_system_config = $comiis_info = array();
loadcache(array('comiis_app_find', 'plugin'));
$comiis_app_find = $_G['cache']['comiis_app_find'];
if (count($comiis_app_find['data']) < 1) {
	$comiis_app_find['data'] = DB::fetch_all('SELECT * FROM %t ORDER BY displayor', array('comiis_app_find'));
	save_syscache('comiis_app_find', $comiis_app_find['data']);
}
$navtitle = $metakeywords = $metadescription = $_G['cache']['plugin']['comiis_app_find']['comiis_app_find_name'];
include_once template('comiis_app_find:comiis_html');