<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//导读列表，帖子搜索列表

//统计主题图片
function byg_threadlist_img_num($tid, $uid, $biaoid) {
	$img_number = DB::result(DB::query("SELECT count(*) FROM ".DB::table('forum_attachment_'.$biaoid.'')." WHERE tid = '$tid' AND uid = '$uid' AND isimage = '1'"));
	return $img_number;
}

//获取主题图片
function byg_threadlist_img($tid, $uid, $num, $biaoid) {
	$list_img = DB::fetch_all("SELECT * FROM ".DB::table('forum_attachment_'.$biaoid.'')." WHERE tid = '$tid' AND uid = '$uid' AND isimage = '1' ORDER BY dateline ASC LIMIT $num");
	return $list_img;
}

?>