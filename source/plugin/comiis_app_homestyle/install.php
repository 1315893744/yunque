<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT.'./source/plugin/comiis_app_homestyle/language/language.'.currentlang().'.php';
$sql = <<<EOF
DROP TABLE IF EXISTS `pre_comiis_app_home`;
CREATE TABLE `pre_comiis_app_home` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `displayorder` tinyint(6) NOT NULL default '0',
  `name` char(80) NOT NULL,
  `dir` char(30) NOT NULL default '',
  `img` char(30) NOT NULL default '',
  `recommend` mediumint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
DROP TABLE IF EXISTS `pre_comiis_app_homestyle`;
CREATE TABLE `pre_comiis_app_homestyle` (
  `id` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) NOT NULL default '0',
  `img` varchar(80) NOT NULL default '',
  `img_id` mediumint(8) NOT NULL default '0'
) ENGINE=MyISAM;
EOF;
$sql .= $comiis_app_homestyle_install_lang;
runquery($sql);
$finish = TRUE;