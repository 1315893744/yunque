<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql ="ALTER TABLE ".DB::table('aljol_talk')." ADD `type` tinyint(3) NOT NULL" ;
DB::query($sql,'SILENT');

$finish = TRUE;
?>
