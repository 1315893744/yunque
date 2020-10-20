<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
function comiis_messagea($str) {
	global $_G;
	$str = messagesafeclear($str);
	$sppos = strpos($str, chr(0).chr(0).chr(0));
	if($sppos !== false) {
		$str = substr($str, 0, $sppos);
	}
	$language = lang('forum/misc');
	loadcache(array('bbcodes_display', 'bbcodes', 'smileycodes', 'smilies', 'smileytypes', 'domainwhitelist'));
	$bbcodes = 'b|i|u|p|color|size|font|align|list|indent|float';
	$bbcodesclear = 'email|code|free|table|tr|td|img|swf|flash|attach|media|audio|groupid|payto'.($_G['cache']['bbcodes_display'][$_G['groupid']] ? '|'.implode('|', array_keys($_G['cache']['bbcodes_display'][$_G['groupid']])) : '');
	$str = preg_replace(array(
			"/\[hide=?\d*\](.*?)\[\/hide\]/is",
			"/\[quote](.*?)\[\/quote]/si",
			$language['post_edit_regexp'],
			"/\[url=?.*?\](.+?)\[\/url\]/si",
			"/\[($bbcodesclear)=?.*?\].+?\[\/\\1\]/si",
			"/\[($bbcodes)=?.*?\]/i",
			"/\[\/($bbcodes)\]/i",
		), array(
			"[b]$language[post_hidden][/b]",
			'',
			'',
			'\\1',
			'',
			'',
			'',
		), $str);
	$str = preg_replace($_G['cache']['smilies']['searcharray'], '', $str);
	return trim(preg_replace('/<br\\s*?\/??>/i', '', $str));
}