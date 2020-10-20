<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$sql = <<<EOF
DROP TABLE pre_comiis_app_home;
DROP TABLE pre_comiis_app_homestyle;
EOF;
runquery($sql);