<?php

 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$comiis_uptable = '';
$comiis_table = DB::table('comiis_app_portal_page');
$comiis_new_array = array(
	'isimage' => "ALTER TABLE `{$comiis_table}` ADD `isimage` tinyint(1) NOT NULL default '0';\n",
	'hcolor' => "ALTER TABLE `{$comiis_table}` ADD `hcolor` varchar(20) NOT NULL default '#53bcf5';\n",
	'image' => "ALTER TABLE `{$comiis_table}` ADD `image` char(255) NOT NULL;\n",
	'icon2' => "ALTER TABLE `{$comiis_table}` ADD `icon2` char(255) NOT NULL;\n",
	'icon' => "ALTER TABLE `{$comiis_table}` ADD `icon` char(255) NOT NULL;\n",
	'icon_url' => "ALTER TABLE `{$comiis_table}` ADD `icon_url` char(255) NOT NULL;\n",
	'uptime' => "ALTER TABLE `{$comiis_table}` ADD `uptime` int(10) NOT NULL default '5';\n",
	'moresetup' => "ALTER TABLE `{$comiis_table}` ADD `moresetup` text NOT NULL;\n",
);
$upload_array = array();
$query = DB::query("SHOW COLUMNS FROM `{$comiis_table}` WHERE Field IN ('isimage', 'hcolor', 'image', 'icon2', 'icon', 'icon_url', 'uptime', 'moresetup')");
while($temp = DB::fetch($query)) {
	$upload_array[] = $temp['Field'];
}
foreach($comiis_new_array as $key => $value){
	if(!in_array($key, $upload_array)){
		$comiis_uptable .= $value;
	}
}
$comiis_table = DB::table('comiis_app_portal_diy');
$comiis_new_array = array(
	'indenttop' => "ALTER TABLE `{$comiis_table}` ADD `indenttop` smallint(1) NOT NULL default '0';\n",
	'indentbottom' => "ALTER TABLE `{$comiis_table}` ADD `indentbottom` smallint(1) NOT NULL default '0';\n",
);
$upload_array = array();
$query = DB::query("SHOW COLUMNS FROM `{$comiis_table}` WHERE Field IN ('indenttop', 'indentbottom')");
while($temp = DB::fetch($query)) {
	$upload_array[] = $temp['Field'];
}
foreach($comiis_new_array as $key => $value){
	if(!in_array($key, $upload_array)){
		$comiis_uptable .= $value;
	}
}
runquery($comiis_uptable);
$finish = TRUE;