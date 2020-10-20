<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//判断DIY模块是否关闭
function byg_diy_block_bool($name) {
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
		return true;
	} else {
		return false;
	}
}

//获取静态DIY模块的内容
function byg_diy_block_sum($name) {
	if (byg_diy_block_bool($name)) {
		$diy_block_sum = DB::result(DB::query("SELECT summary FROM ".DB::table('common_block')." WHERE name = '$name' ORDER BY bid DESC"));
		return $diy_block_sum;
	}
}

?>