<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT.'./source/plugin/comiis_app_find/language/language.'.currentlang().'.php';
$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_comiis_app_find` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `cid` mediumint(8) unsigned NOT NULL default '0',
  `displayor` smallint(6) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL default '#',
  `icon` varchar(255) NOT NULL,
  `show` tinyint(1) unsigned NOT NULL default '0',
  `data` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
EOF;
runquery($sql);
$comiis_app_style_num = DB::result_first("SELECT COUNT(*) FROM %t", array('comiis_app_find'));
if(!$comiis_app_style_num){
	$sql = $comiis_app_find_install_lang;
	runquery($sql);
}
$finish = TRUE;