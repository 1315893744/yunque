<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if (submitcheck('comiis_submit') && $_G['uid'] && $_GET['formhash'] == FORMHASH) {
	$plugin_id = 'comiis_app_avatar';
	$comiis_upload = 0;
	$comiis_md5file = $comiis_system_config = $comiis_info = array();
	header('Cache-Control: no-cache, must-revalidate');
	$avatarpath = $_G['setting']['attachdir'];
	$base64 = htmlspecialchars($_GET['str']);
	if (preg_match('/^(data:\\s*image\\/(\\w+);base64,)/', $base64, $result)) {
		$type = $result[2];
		$tmpavatar = $avatarpath . './temp/twt' . time() . '.jpg';
		include DISCUZ_ROOT . './source/plugin/comiis_app_avatar/comiis_app_avatar.fun.php';
	}
}