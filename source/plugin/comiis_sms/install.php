<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_comiis_sms_log` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `tel` char(20) NOT NULL,
  `ip` char(15) NOT NULL,
  `type` smallint(1) NOT NULL default '0',
  `smscode` char(20) NOT NULL,
  `error` char(60) NOT NULL,
  `dateline` int(10) NOT NULL default '0',
  `province` char(80) NOT NULL,
  `ua` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
CREATE TABLE IF NOT EXISTS `pre_comiis_sms_temp` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `tel` char(20) NOT NULL,
  `ip` char(15) NOT NULL,
  `sid` char(10) NOT NULL,
  `code` char(20) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `type` smallint(1) NOT NULL default '0',
  `dateline` int(10) NOT NULL default '0',
  `state` smallint(1) NOT NULL default '0',
  `count` tinyint(2) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
CREATE TABLE IF NOT EXISTS `pre_comiis_sms_user` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `tel` char(20) NOT NULL,
  `regip` char(15) NOT NULL,
  `type` smallint(1) NOT NULL default '0',
  `state` smallint(1) NOT NULL default '0',
  `dateline` int(10) NOT NULL default '0',
  `province` char(80) NOT NULL,
  `ua` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
EOF;
runquery($sql);
$finish = TRUE;