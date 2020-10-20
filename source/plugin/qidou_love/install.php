<?php



if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

CREATE TABLE IF NOT EXISTS `cdb_qidou_love_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `groupid` int(2) DEFAULT NULL,
  `love_id` int(11) DEFAULT NULL,
  `love_num` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `age` int(10) DEFAULT '0',
  `height` varchar(20) DEFAULT NULL,
  `last_num` int(11) DEFAULT '0',
  `last_time` varchar(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `cdb_qidou_love_reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `groupid` int(2) DEFAULT NULL,
  `r_image` varchar(255) DEFAULT NULL,
  `r_name` varchar(50) DEFAULT NULL,
  `r_price` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `cdb_qidou_love_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `user_album` varchar(255) DEFAULT NULL,
  `album_list` text,
  `gender` int(1) DEFAULT NULL,
  `age` int(11) DEFAULT '0',
  `birthyear` int(6) DEFAULT NULL COMMENT '生日年',
  `birthmonth` int(3) DEFAULT NULL COMMENT '生日月',
  `birthday` int(3) DEFAULT NULL COMMENT '生日天',
  `constellation` varchar(20) DEFAULT NULL COMMENT '星座',
  `education` varchar(20) DEFAULT '' COMMENT '学历',
  `occupation` varchar(20) DEFAULT NULL COMMENT '职业',
  `affectivestatus` varchar(20) DEFAULT NULL COMMENT '感情状态',
  `height` varchar(20) DEFAULT NULL COMMENT '身高',
  `weight` varchar(20) DEFAULT NULL COMMENT '体重',
  `income` varchar(20) DEFAULT NULL COMMENT '月收入',
  `house` varchar(20) DEFAULT NULL COMMENT '房子',
  `vehicle` varchar(20) DEFAULT NULL COMMENT '车子',
  `sightml` varchar(255) DEFAULT NULL COMMENT '签名',
  `sigtext` varchar(255) DEFAULT NULL COMMENT '交友宣言',
  `user_tag` varchar(255) DEFAULT NULL COMMENT '标签',
  `is_album` int(1) DEFAULT '0',
  `is_recom` int(1) DEFAULT '0',
  `people_num` int(11) DEFAULT '0' COMMENT '喜欢他的人',
  `charm_num` int(11) DEFAULT '0' COMMENT '魅力',
  `lat` varchar(20) DEFAULT NULL,
  `lng` varchar(20) DEFAULT NULL,
  `meet_uids` text,
  `meet_time` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM;
        

EOF;

runquery($sql);

@unlink(DISCUZ_ROOT . './source/plugin/qidou_love/discuz_plugin_qidou_love.xml');
@unlink(DISCUZ_ROOT . './source/plugin/qidou_love/discuz_plugin_qidou_love_SC_GBK.xml');
@unlink(DISCUZ_ROOT . './source/plugin/qidou_love/discuz_plugin_qidou_love_SC_UTF8.xml');
@unlink(DISCUZ_ROOT . './source/plugin/qidou_love/discuz_plugin_qidou_love_TC_BIG5.xml');
@unlink(DISCUZ_ROOT . './source/plugin/qidou_love/discuz_plugin_qidou_love_TC_UTF8.xml');

$finish = TRUE;

@unlink(DISCUZ_ROOT . './source/plugin/qidou_love/install.php');

?>