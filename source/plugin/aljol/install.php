<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//start to put your own code 
$sql = <<<EOF
CREATE TABLE `pre_aljol_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `friendid` int(10) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `lastnews` text NOT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE `pre_aljol_picture` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `friendid` int(10) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
   PRIMARY KEY (`pid`)
);
CREATE TABLE `pre_aljol_talk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `friendid` int(10) NOT NULL,
  `talk` text NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `talkstate` int(10) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `type` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
);
EOF;
runquery($sql);
//finish to put your own code
$finish = TRUE;
?>