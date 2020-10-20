<?php
if(!defined('IN_ADMINCP')) exit('Access Denied');
$sql = <<<EOF
DROP TABLE IF EXISTS pre_plugin_k_misign;
CREATE TABLE IF NOT EXISTS pre_plugin_k_misign (
  uid int(10) unsigned NOT NULL,
  `time` int(10) NOT NULL,
  days int(5) NOT NULL DEFAULT '0',
  lasted int(5) NOT NULL DEFAULT '0',
  mdays int(5) NOT NULL DEFAULT '0',
  reward int(12) NOT NULL DEFAULT '0',
  lastreward int(12) NOT NULL DEFAULT '0',
  `row` int(11) NOT NULL,
  PRIMARY KEY (uid),
  KEY `time` (`time`),
  KEY `row` (`row`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS pre_plugin_k_misignset;
CREATE TABLE IF NOT EXISTS pre_plugin_k_misignset (
  id int(10) unsigned NOT NULL,
  todayq int(10) NOT NULL DEFAULT '0',
  yesterdayq int(10) NOT NULL DEFAULT '0',
  highestq int(10) NOT NULL DEFAULT '0',
  qdtidnumber int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS pre_plugin_k_misign_prize;
CREATE TABLE IF NOT EXISTS pre_plugin_k_misign_prize (
  prizeid int(11) NOT NULL AUTO_INCREMENT,
  prizename varchar(255) NOT NULL,
  prizetype tinyint(1) NOT NULL,
  prizecredittype tinyint(1) NOT NULL,
  prizecreditnum int(11) NOT NULL,
  todaylast int(11) NOT NULL,
  everyday int(11) NOT NULL,
  updatetime int(11) NOT NULL,
  `status` int(11) NOT NULL,
  percent smallint(4) NOT NULL,
  auto tinyint(1) NOT NULL,
  PRIMARY KEY (prizeid),
  KEY percent (percent),
  KEY auto (auto),
  KEY prizecreditnum (prizecreditnum)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS pre_plugin_k_misign_prize_kami;
CREATE TABLE IF NOT EXISTS pre_plugin_k_misign_prize_kami (
  kid int(11) NOT NULL AUTO_INCREMENT,
  prizeid int(11) NOT NULL,
  message text NOT NULL,
  uid int(11) NOT NULL,
  username varchar(255) NOT NULL,
  usetime int(11) NOT NULL,
  PRIMARY KEY (kid),
  KEY prizeid (prizeid,uid)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS pre_plugin_k_misign_prize_log;
CREATE TABLE IF NOT EXISTS pre_plugin_k_misign_prize_log (
  logid int(11) NOT NULL AUTO_INCREMENT,
  uid int(11) NOT NULL,
  username varchar(255) NOT NULL,
  prizeid int(11) NOT NULL,
  prizename varchar(255) NOT NULL,
  dateline int(11) NOT NULL,
  PRIMARY KEY (logid),
  KEY uid (uid,prizeid)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS pre_plugin_k_misign_push;
CREATE TABLE IF NOT EXISTS pre_plugin_k_misign_push (
  pushid int(11) NOT NULL AUTO_INCREMENT,
  pic varchar(255) NOT NULL,
  title varchar(255) NOT NULL,
  message text NOT NULL,
  url varchar(255) NOT NULL,
  dateline int(11) NOT NULL,
  PRIMARY KEY (pushid)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS pre_plugin_k_misign_bq;
CREATE TABLE IF NOT EXISTS pre_plugin_k_misign_bq (
  bid int(11) NOT NULL AUTO_INCREMENT,
  uid int(11) NOT NULL,
  lasttime int(11) NOT NULL,
  thistime int(11) NOT NULL,
  bqdays int(11) NOT NULL,
  PRIMARY KEY (bid),
  KEY uid (uid,lasttime,bqdays)
) ENGINE=MyISAM;

INSERT INTO pre_plugin_k_misignset (id, todayq, yesterdayq, highestq, qdtidnumber) VALUES ('1', '0', '0', '0', '0');
EOF;
runquery($sql);
updatecache('setting');
$finish = TRUE;
?>