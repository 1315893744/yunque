<?php



if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE pre_comiis_weixin;
DROP TABLE pre_comiis_weixin_key;

EOF;

loadcache('plugin');
$_G['comiis_weixin'] = $_G['cache']['plugin']['comiis_weixin'];
if($_G['comiis_weixin']['comiis_app_weixin_del']){
	runquery($sql);
}

$finish = TRUE;