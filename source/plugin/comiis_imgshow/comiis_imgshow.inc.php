<?php

 
if(!defined('IN_DISCUZ')) {exit('Access Denied');}
$comiis = $_G['cache']['plugin']['comiis_imgshow'];
$comiis_tid = intval(getgpc('tid'));
$thread = C::t('#comiis_imgshow#comiis')->fetch_by_tid($comiis_tid);
if(!empty($thread['tid']) && $thread['displayorder'] != '-1'){
	if(minnumber($thread['tid'], $thread['authorid'])){
		C::t('#comiis_imgshow#comiis')->update_views_tid($thread['tid']);
		$thread['views']++;
		if(!isset($_G['cache']['forums'])) {
			loadcache('forums');
		}
		if(!isset($_G['cache']['plugin'])){
			loadcache('plugin');
		}
		unset($_G['cache']['plugin']['comiis_imgshow']);
		$attachment = C::t('#comiis_imgshow#comiis')->fetch_all_image_by_tid_uid($thread['tid'], $thread['authorid']);
		$aid_message = C::t('#comiis_imgshow#comiis')->fetch_aid_message_by_tid($thread['tid'], $thread['authorid'], $attachment);
		$renumber = $comiis['renumber'];
		if($renumber){
			$renumber = $renumber + 1;
		}else{
			$renumber = 1;
		}
		$post = C::t('#comiis_imgshow#comiis')->fetch_all_by_tid($thread['tid'], $aid_message['pid'], $renumber);
		if(!$comiis['remessage']){
			unset($post['post']);
		}
		$min_image_number = $comiis['minnumber'];
		$endcondition=$comiis['endcondition'];
		if(!in_array($endcondition, array('dateline', 'lastpost', 'views', 'replies'))) $endcondition = 'dateline';
		$more = C::t('#comiis_imgshow#comiis')->fetch_image_by_fid($thread['fid'], $thread['tid'], $min_image_number, $endcondition, 3);
		$navtitle = $thread["subject"]. " - ". $comiis['sohwname'];
		$metakeywords = $thread["subject"]. " - ". $_G[cache][forums][$thread[fid]][name]. " - " . $comiis['keywords'];
		$metadescription = $comiis['description'];
		if($comiis['img']){
			$imgcondition=$comiis['imgcondition'];
			if(!in_array($imgcondition, array('dateline', 'lastpost', 'views', 'replies'))) $imgcondition = 'dateline';
			$image_list = C::t('#comiis_imgshow#comiis')->fetch_image_by_fid($thread['fid'], $thread['tid'], $min_image_number, $imgcondition, $comiis['conditionnum']);
		}
		if(!$comiis['toolBar']){
			$http=str_replace('%26amp%3B', '%26', urlencode(diconv($_G["siteurl"]."forum.php?mod=viewthread&tid={$thread[tid]}", CHARSET, 'utf-8')));
			$subject=urlencode(diconv($thread["subject"], CHARSET, 'utf-8'));
			$message=urlencode(diconv(cutstr(ubb($post["thread"]["message"]), 180), CHARSET, 'utf-8'));
			$nn=0;
			foreach($attachment as $temp) {
				$temp_url=$temp['remote'] ? $_G['setting']['ftp']['attachurl'] : $_G['setting']['attachurl'];
				$pic[]=urlencode(diconv($_G["siteurl"].$temp_url."forum/{$temp[attachment]}", CHARSET, 'utf-8'));
			}
			$all_image = implode("|", $pic);
			$one_image = $pic[0];
		}
		include_once template("comiis_imgshow:comiis_views");
	}else{
		showmessage(lang('plugin/comiis_imgshow', 'imgnumber').$comiis['minnumber'].lang('plugin/comiis_imgshow', 'unit'));
	}
}else{
	showmessage('thread_nonexistence');
}
function minnumber($tid, $uid) {
	global $_G, $comiis;
	$min_image_number = $comiis['minnumber'];
	$return_image_number = C::t('#comiis_imgshow#comiis')->image_number_tid_uid($tid,$uid);
	if($return_image_number >= $min_image_number){
		return TRUE;
	}else{
		return FALSE;
	}
}
function ubb($message) {
	$bbcodes = 'b|i|u|p|color|size|font|align|list|indent|float';
	$bbcodesclear = 'email|code|free|table|tr|td|img|swf|flash|attach|media|audio|payto'.($_G['cache']['bbcodes_display'][$_G['groupid']] ? '|'.implode('|', array_keys($_G['cache']['bbcodes_display'][$_G['groupid']])) : '');
	$message = strip_tags(preg_replace(array(lang('plugin/comiis_imgshow', 'replace'), "/\[hide=?\d*\](.*?)\[\/hide\]/is", "/\[quote](.*?)\[\/quote]/si", "/\[url=?.*?\](.+?)\[\/url\]/si", "/\[($bbcodesclear)=?.*?\].+?\[\/\\1\]/si", "/\[($bbcodes)=?.*?\]/i", "/\[\/($bbcodes)\]/i"), array('', '', '', '\\1', '', '', ''), $message));
	return $message;
}
function new_ubb($message, $type) {
	global $comiis;
	if($type==1 && $comiis['messagebr']){
		$message = delbr($message);
	}
	if($comiis['smilies']){
		$message = parsesmiles($message);
	}
	if($comiis['messagelink']){
		$message = preg_replace("/\[url(=((https?|ftp|gopher|news|telnet|rtsp|mms|callto|bctp|thunder|qqdl|synacast){1}:\/\/|www\.|mailto:)?([^\r\n\[\"']+?))?\](.+?)\[\/url\]/ies", "parseurl('\\1', '\\5', '\\2')", $message);
	}
	if($comiis['messagepic']){
		$message = preg_replace(array("/\[img\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/is","/\[img=(\d{1,4})[x|\,](\d{1,4})\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/is"), array("<br /><img src='\\1' width='100' />","<br /><img src='\\3' width='\\1' height='\\2' />"), $message);
	}
	$bbcodes = 'b|i|u|p|color|size|font|align|list|indent|float';
	$bbcodesclear = 'url|email|code|free|table|tr|td|img|swf|flash|attach|media|audio|payto'.($_G['cache']['bbcodes_display'][$_G['groupid']] ? '|'.implode('|', array_keys($_G['cache']['bbcodes_display'][$_G['groupid']])) : '');
	$message = preg_replace(array(lang('plugin/comiis_imgshow', 'replace'), "/\[hide=?\d*\](.*?)\[\/hide\]/is", "/\[quote](.*?)\[\/quote]/si", "/\[url=?.*?\](.+?)\[\/url\]/si", "/\[($bbcodesclear)=?.*?\].+?\[\/\\1\]/si", "/\[($bbcodes)=?.*?\]/i", "/\[\/($bbcodes)\]/i"), array('', '', '', '\\1', '', '', ''), $message);
	return $message;
}
function delbr($str){
	$str = nl2br(str_replace(array("\t", '   ', '  '), array('&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;'), $str));
	$str = trim($str);
	$str = ereg_replace("\r","",$str);
	$str = ereg_replace("\n","",$str);
	$str = trim($str);
	$str = preg_replace(array('/\s*(<br\s*\/?\s*>\s*){2,}/im'),array('\\1'),$str);
	return $str;
}
function parseurl($url, $text, $scheme) {
	global $_G;
	if(!$url && preg_match("/((https?|ftp|gopher|news|telnet|rtsp|mms|callto|bctp|thunder|qqdl|synacast){1}:\/\/|www\.)[^\[\"']+/i", trim($text), $matches)) {
		$url = $matches[0];
		$length = 65;
		if(strlen($url) > $length) {
			$text = substr($url, 0, intval($length * 0.5)).' ... '.substr($url, - intval($length * 0.3));
		}
		return '<a href="'.(substr(strtolower($url), 0, 4) == 'www.' ? 'http://'.$url : $url).'" target="_blank">'.$text.'</a>';
	} else {
		$url = substr($url, 1);
		if(substr(strtolower($url), 0, 4) == 'www.') {
			$url = 'http://'.$url;
		}
		$url = !$scheme ? $_G['siteurl'].$url : $url;
		return '<a href="'.$url.'" target="_blank">'.$text.'</a>';
	}
}
function parsesmiles(&$message) {
	global $_G;
	loadcache(array('smilies', 'smileytypes'));
	static $enablesmiles;
	if($enablesmiles === null) {
		$enablesmiles = false;
		if(!empty($_G['cache']['smilies']) && is_array($_G['cache']['smilies'])) {
			foreach($_G['cache']['smilies']['replacearray'] AS $key => $smiley) {
				$_G['cache']['smilies']['replacearray'][$key] = '<img src="'.STATICURL.'image/smiley/'.$_G['cache']['smileytypes'][$_G['cache']['smilies']['typearray'][$key]]['directory'].'/'.$smiley.'" smilieid="'.$key.'" border="0" alt="" />';
			}
			$enablesmiles = true;
		}
	}
	$enablesmiles && $message = preg_replace($_G['cache']['smilies']['searcharray'], $_G['cache']['smilies']['replacearray'], $message, $_G['setting']['maxsmilies']);
	return $message;
}
function comiis_rewrite($Rewrite) {
	global $_G;
	if($Rewrite){
		$content = ob_get_contents();
		$content = preg_replace('/plugin\.php\?id\=comiis_imgshow\&tid\=([0-9]*)/','pic-$1.html',$content);
		$content = preg_replace('/plugin\.php\?id\=comiis_imgshow\&amp;tid\=([0-9]*)/','pic-$1.html',$content);
		$content = preg_replace('/plugin\.php\?id\=comiis_imgshow%26tid\=([0-9]*)/','pic-$1.html',$content);
		ob_end_clean();
		$_G['gzipcompress'] ? ob_start('ob_gzhandler') : ob_start();
		echo $content;
	}
}
?>