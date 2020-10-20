<?php

 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$sql = <<<EOF



CREATE TABLE IF NOT EXISTS `pre_comiis_app_portal_block` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(80) NOT NULL,
  `dir` char(255) NOT NULL,
  `show` smallint(1) NOT NULL default '0',
  `copyright` varchar(255) NOT NULL,
  `version` smallint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;



CREATE TABLE IF NOT EXISTS `pre_comiis_app_portal_diy` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `pid` mediumint(8) NOT NULL default '0',
  `bid` mediumint(8) NOT NULL default '0',
  `diyid` mediumint(8) NOT NULL default '0',
  `displayorder` mediumint(6) NOT NULL default '0',
  `name` char(30) NOT NULL,
  `type` char(80) NOT NULL,
  `dir` char(255) NOT NULL,
  `show` smallint(1) NOT NULL default '0',
  `margintop` smallint(1) NOT NULL default '1',
  `marginbottom` smallint(1) NOT NULL default '0',
  `bordertop` smallint(1) NOT NULL default '1',
  `borderbottom` smallint(1) NOT NULL default '1',
  `blocknone` mediumint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;



CREATE TABLE IF NOT EXISTS `pre_comiis_app_portal_page` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(80) NOT NULL,
  `user` varchar(12) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `dateline` int(10) NOT NULL default '0',
  `title` char(255) NOT NULL,
  `description` char(255) NOT NULL,
  `keywords` char(255) NOT NULL,
  `default` tinyint(1) NOT NULL default '0',
  `show` tinyint(1) NOT NULL default '0',
  `loadforum` tinyint(1) NOT NULL default '0',
  `header` tinyint(1) NOT NULL default '1',
  `color` varchar(20) NOT NULL default '#f3f3f3',
  `bgcolor` varchar(20) NOT NULL default '#53bcf5',
  `fontcolor` varchar(20) NOT NULL default '#ffffff',
  `css` text NOT NULL,
  `openre` tinyint(1) NOT NULL default '1',
  `rekey` tinyint(1) NOT NULL default '1',
  `rekeyurl` char(255) NOT NULL,
  `comiisheader` tinyint(1) NOT NULL default '0',
  `comiisfooter` tinyint(1) NOT NULL default '1',
  `comiisstyle` char(80) NOT NULL default '0',
  `fids` text NOT NULL,
  `tids` text NOT NULL,
  `pl` char(10) NOT NULL default 'dateline',
  `times` int(10) NOT NULL default '0',
  `num` int(6) NOT NULL default '20',
  `pages` int(6) NOT NULL default '10',
  `comiispages` tinyint(1) NOT NULL default '0',
  `isimage` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;


EOF;

runquery($sql);

include_once DISCUZ_ROOT.'./source/plugin/comiis_app_portal/upgrade.php';

$finish = TRUE;

