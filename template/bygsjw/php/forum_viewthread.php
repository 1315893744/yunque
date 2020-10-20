<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$right_side_param = DB::result(DB::query("SELECT param FROM ".DB::table('common_block')." WHERE name = '简约通用电脑版帖子页右边栏' ORDER BY bid DESC"));
$right_side = unserialize($right_side_param);
$right_side_a = explode(" ", $right_side['text']);

?>