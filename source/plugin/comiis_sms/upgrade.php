<?php

 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$comiis_sql = DB::fetch_all("SHOW COLUMNS FROM %t", array('comiis_sms_user'), 'Field');
if(!is_array($comiis_sql['province'])){
	$sql = 'ALTER TABLE `pre_comiis_sms_log` ADD (`province` char(80) NOT NULL, `ua` text NOT NULL);
	ALTER TABLE `pre_comiis_sms_user` ADD (`province` char(80) NOT NULL, `ua` text NOT NULL);';
	runquery($sql);
}
$finish = TRUE;