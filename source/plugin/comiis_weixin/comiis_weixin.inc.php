<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$key = '';
$comiis_isweixin = $user_id = 0;
require_once DISCUZ_ROOT.'./source/plugin/comiis_weixin/comiis_weixin_fun.php';
if($_GET['mod'] == 'wxlogin'){
	if(!(defined('IN_MOBILE') && $comiis_isweixin)) {
		include template('common/header_ajax');
		include_once template('comiis_weixin:comiis_html');
		echo comiis_weixin_logging_code($key);
		include template('common/footer_ajax');
	}
}elseif($_GET['mod'] == 'weixin_wait'){
	include template('common/header_ajax');
	echo $comiis_wxre;
	include template('common/footer_ajax');
}elseif($_GET['mod'] == 'login_tip' || $_GET['mod'] == 'login_perfect'){
	include_once template('comiis_weixin:comiis_htm');
	include_once template('common/header');
	echo ($_GET['mod'] == 'login_tip' ? comiis_weixin_perfect_tip($user_id) : comiis_weixin_perfect_user($user_id));
	include_once template('common/footer');
}