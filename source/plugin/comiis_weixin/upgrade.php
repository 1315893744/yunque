<?php

 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$sql = '';
$sql_num = $sql_lastdate = $sql_start = false;
$query = DB::query("SHOW COLUMNS FROM ".DB::table('comiis_weixin'));
while($temp = DB::fetch($query)) {
	if($temp['Field'] == 'num') {
		$sql_num = true;
		continue;
	}
	if($temp['Field'] == 'lastdate') {
		$sql_lastdate = true;
		continue;
	}
	if($temp['Field'] == 'start') {
		$sql_start = true;
		continue;
	}
}
$sql .= !$sql_num ? "ALTER TABLE ".DB::table('comiis_weixin')." ADD COLUMN `num` mediumint(8) NOT NULL default '1';\n" : '';
$sql .= !$sql_lastdate ? "ALTER TABLE ".DB::table('comiis_weixin')." ADD COLUMN `lastdate` int(10) NOT NULL default '0';\n" : '';
$sql .= !$sql_start ? "ALTER TABLE ".DB::table('comiis_weixin')." ADD COLUMN `start` mediumint(1) NOT NULL default '1';\n" : '';
runquery($sql);
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin.xml');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin_SC_GBK.xml');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin_SC_UTF8.xml');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin_TC_BIG5.xml');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin_TC_UTF8.xml');
$finish = TRUE;
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/install.php');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/upgrade.php');