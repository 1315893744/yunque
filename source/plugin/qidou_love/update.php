<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
ALTER TABLE  `cdb_qidou_love_list`
    ADD  `last_num` INT( 10 ) NOT NULL DEFAULT  '0' AFTER  `height` ,
    ADD  `last_time` VARCHAR( 11 ) NOT NULL AFTER  `last_num`;
        

EOF;

runquery($sql);

$finish = TRUE;

?>