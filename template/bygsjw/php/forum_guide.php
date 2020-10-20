<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if (byg_diy_block_bool('简约通用导读页右边栏热门推荐')) {
	$b5_bid = DB::result(DB::query("SELECT bid FROM ".DB::table('common_block')." WHERE name = '简约通用导读页右边栏热门推荐' ORDER BY bid DESC"));
	$b5 = DB::fetch_all("SELECT * FROM ".DB::table('common_block_item')." WHERE bid = '$b5_bid' ORDER BY displayorder ASC");
	$b5_title = DB::result(DB::query("SELECT title FROM ".DB::table('common_block')." WHERE bid = '$b5_bid'"));
	
	$block_update_all = DB::fetch_all("SELECT * FROM ".DB::table('common_block')." WHERE bid = '$b5_bid'");
	foreach($block_update_all as $block_update) {
		if (($block_update['dateline'] < $_G['timestamp'] - $block_update['cachetime']) && ($block_update['cachetime'] > 0)) {
			$block_update_bid = $block_update['bid'];
			break;
		}
	}
}

?>