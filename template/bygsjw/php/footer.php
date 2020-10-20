<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//获取静态DIY模块的参数
function byg_diy_block_param($name) {
	$name_off = '0'.$name;
	$block_bid_on = DB::result(DB::query("SELECT bid FROM ".DB::table('common_block')." WHERE name = '$name' ORDER BY bid DESC"));
	$block_bid_off = DB::result(DB::query("SELECT bid FROM ".DB::table('common_block')." WHERE name = '$name_off' ORDER BY bid DESC"));
	if (empty($block_bid_on)) {
		$block_bid_on = '0';
	}
	if (empty($block_bid_off)) {
		$block_bid_off = '0';
	}
	if ($block_bid_on > $block_bid_off) {
		$diy_block_param = DB::result(DB::query("SELECT param FROM ".DB::table('common_block')." WHERE name = '$name' ORDER BY bid DESC"));
		return $diy_block_param;
	}
}

?>