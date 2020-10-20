<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
//start to put your own code 
$sql = <<<EOF
DROP TABLE IF  EXISTS `pre_aljol_news`;
DROP TABLE IF  EXISTS `pre_aljol_picture`;
DROP TABLE IF  EXISTS `pre_aljol_talk`;
EOF;

runquery($sql);
//finish to put your own code
$finish = TRUE;
?>