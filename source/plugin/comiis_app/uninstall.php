<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache('comiis_app_switch');
$sql = <<<EOF

DROP TABLE pre_comiis_app_nav;
DROP TABLE pre_comiis_app_switch;
DELETE FROM pre_common_syscache WHERE cname IN('comiis_app_switch','comiis_app_nav', 'comiis_app_list_style');
EOF;
if($_G['cache']['comiis_app_switch']['comiis_app_del']){
	runquery($sql);
}


$finish = TRUE;