<?php



if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$sql = <<<EOF

DROP TABLE pre_comiis_app_portal_diy;
DROP TABLE pre_comiis_app_portal_page;

EOF;
loadcache('comiis_app_portal_del', 1);
if($_G['cache']['comiis_app_portal_del']){
	runquery($sql);
}

$finish = TRUE;