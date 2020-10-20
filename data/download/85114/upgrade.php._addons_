<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

// 数据库表前缀
global $_G;
$tablePrefix = empty($_G['config']['db'][1]['tablepre']) ? 'pre_' : $_G['config']['db'][1]['tablepre'];
$sql = '';

$sql .= <<<EOF

CREATE TABLE IF NOT EXISTS `{$tablePrefix}bind_bd2dz` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增字段',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT 'discuz论坛昵称',
  `uid` bigint(20) NOT NULL DEFAULT '0' COMMENT 'discuz账号ID',
  `groupid` bigint(20) NOT NULL DEFAULT '0' COMMENT 'discuz用户组ID',
  `bd_account` varchar(2048) NOT NULL DEFAULT '' COMMENT '百度账号',
  `is_bind` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否绑定，0-未绑定，1-已绑定',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除，0-未删除，1-已删除',
  `bind_time` bigint(20) NOT NULL DEFAULT '0' COMMENT '绑定时刻Unix时间戳',
  `unbind_time` bigint(20) NOT NULL DEFAULT '0' COMMENT '解绑时刻Unix时间戳',
  PRIMARY KEY (`id`),
  KEY `uid_index` (`uid`)
);

CREATE TABLE IF NOT EXISTS `{$tablePrefix}forum_user_map` (
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `source_id` mediumint(8) NOT NULL DEFAULT '0' COMMENT 'uid或groupid',
  `source_type` tinyint(4) NOT NULL DEFAULT '0'COMMENT '1-用户uid，2-groupid',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`source_id`,`source_type`, `fid`)
);

CREATE TABLE IF NOT EXISTS `{$tablePrefix}forum_thread_score` (
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `score` float(5,3) NOT NULL DEFAULT '0' COMMENT '分数权重',
  `hot_score` float(5,3) NOT NULL DEFAULT '0' COMMENT '热度分数',
  `time_score` float(5,3) NOT NULL DEFAULT '0' COMMENT '时间分数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`),
  KEY `idx_fid` (`fid`)
);

EOF;

runquery($sql);


$finish = true;