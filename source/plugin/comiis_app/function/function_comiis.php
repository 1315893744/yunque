<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

loadcache(array('comiis_app_switch', 'comiis_app_nav')); 
$comiis_app_switch = $_G['cache']['comiis_app_switch'];
$comiis_app_nav = $_G['cache']['comiis_app_nav'];
define('GHARSET', 'utf-8');
if(stripos($_SERVER['HTTP_REFERER'], $_G['siteurl']) === false){
	$comiis_is_new_url = 1;
}else{
	$comiis_is_new_url = 0;
}
$_G['comiis_isAndroid'] = 0;
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false && $comiis_app_switch['comiis_post_apkimg'] == 1) {
	$_G['comiis_isAndroid'] = 1;
}
if(!$_G['comiis_close_header']){
	$_G['comiis_close_header'] = 0;
}
$comiis_closefooter = $comiis_isweixin = 0;
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false || strpos($_SERVER['HTTP_USER_AGENT'], ' QQ/') !== false) {
	$comiis_isweixin = 1;
}else{
	if($comiis_app_switch['comiis_closeheader']){
		foreach(explode(',', $comiis_app_switch['comiis_closeheader']) as $temp){
			if(strpos($_SERVER['HTTP_USER_AGENT'], $temp) !== false){
				$comiis_isweixin = 1;
				if(!(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread')){
					$_G['comiis_close_header'] = 1;
				}
				if($comiis_app_switch['comiis_closefooter'] == 1){
					$comiis_closefooter = 1;
				}
			}
		}
	}
}
$params = '';
if($_SERVER["QUERY_STRING"]){
	$url_data = $parameter = array();
	$parameter = explode('&', current(explode('#', end(explode('?', $_SERVER["QUERY_STRING"])))));
	foreach($parameter as $temp){
		$tmp = explode('=', $temp);
		if($tmp[0] != 'mobile'){
			$url_data[$tmp[0]] = $tmp[1];
		}
	}
	ksort($url_data);
	foreach($url_data as $ks => $vs) {
		if($ks != 'gid'){
			$params .= '&'.$ks.'='.rawurlencode($vs);
		}
	}
}
if(!empty($_SERVER['HTTP_X_REWRITE_URL'])){
	$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_REWRITE_URL'];
}
$comiis_nav_ids = substr(md5(end(explode('/', $_SERVER['PHP_SELF'])).$params), 0, 5);
$comiis_nav_ids2 = substr(md5(end(explode('/', str_replace('?mobile=2', '', $_SERVER['REQUEST_URI'])))), 0, 5);
if(is_array($comiis_app_nav['mnav'])){
	$comiis_open_footer = $nn = 0;
	foreach($comiis_app_nav['mnav'] as $temp){
		$nn++;
		if($nn < 7 && ($temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2)){
			$comiis_open_footer = 1;
		}
	}
}
if($comiis_open_footer == 0){
	if($_G['basescript'] == 'group' || $_G['forum']['status'] == 3){
		$comiis_nav_ids = substr(md5('group.php&mod=index'), 0, 5);
	}elseif($_G['basescript'] == 'forum' && (CURMODULE == 'viewthread' || CURMODULE == 'forumdisplay')){
		$comiis_nav_ids = substr(md5('forum.php&forumlist=1'), 0, 5);
	}
}
$comiis_group_lang = $lang_temp1 = array();
$lang_temp1 = explode("\n", str_replace("\r\n", "\n", $comiis_app_switch['comiis_group_language']));
if(is_array($lang_temp1)){
	foreach($lang_temp1 as $temp) {
		list($k, $v) = explode('=', $temp);
		$k = trim($k);
		$comiis_group_lang[$k] = trim($v);
	}
}
function comiis_output_ajaxs() {
	global $comiis_app_switch;
	$s = output_ajax();
	ob_end_clean();
	$s = diconv($s, CHARSET, 'utf-8');
	return $s;
}
function comiis_replace_image($matches) {
	return '<img '.$matches[1].'>';
}
function comiis_messages($str) {
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
function comiis_load($re_sn, $load_var, $is_list = 0){
	if(!function_exists('comiis_load_start')) {
		include_once DISCUZ_ROOT . './source/plugin/comiis_app/function/function_comiis_load.php';
	}
	comiis_load_start($re_sn, $load_var, $is_list);
}
