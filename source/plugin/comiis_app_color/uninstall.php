<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
loadcache('plugin');
if($_G['cache']['plugin']['comiis_app_color']['del'] == 1){
$sql = <<<EOF
DROP TABLE pre_comiis_app_style;
DROP TABLE pre_comiis_app_userstyle;
EOF;
runquery($sql);
}
