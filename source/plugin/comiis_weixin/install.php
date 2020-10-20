<?php

 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_comiis_weixin` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` varchar(32) NOT NULL,
  `key` varchar(32) NOT NULL,
  `uid` mediumint(8) NOT NULL default '0',
  `openid` varchar(200) NOT NULL,
  `nickname` varchar(80) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `city` varchar(80) NOT NULL,
  `province` varchar(80) NOT NULL,
  `country` varchar(80) NOT NULL,
  `headimgurl` varchar(255) NOT NULL,
  `privilege` text NOT NULL,
  `unionid` varchar(255) NOT NULL,
  `dateline` int(10) NOT NULL,
  `edit` tinyint(1) NOT NULL default '0',
  `num` mediumint(8) NOT NULL default '1',
  `lastdate` int(10) NOT NULL default '0',
  `start` mediumint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `pre_comiis_weixin_key` (
  `key` varchar(8) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`key`,`uid`)
) ENGINE=MyISAM;
EOF;
runquery($sql);
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin.xml');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin_SC_GBK.xml');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin_SC_UTF8.xml');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin_TC_BIG5.xml');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/discuz_plugin_comiis_weixin_TC_UTF8.xml');
include_once DISCUZ_ROOT.'./source/plugin/comiis_weixin/upgrade.php';
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/upgrade.php');
@unlink(DISCUZ_ROOT . './source/plugin/comiis_weixin/install.php');