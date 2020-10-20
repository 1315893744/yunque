<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
loadcache('plugin');
$sql = <<<EOF
DROP TABLE pre_comiis_sms_log;
DROP TABLE pre_comiis_sms_temp;
DROP TABLE pre_comiis_sms_user;
EOF;
if($_G['cache']['comiis_sms']['del_user']){
	runquery($sql);
}