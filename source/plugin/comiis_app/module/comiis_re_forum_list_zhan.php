<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if (!file_exists(DISCUZ_ROOT . './source/plugin/comiis_app/comiis_info/comiis_info.php')) {
    return false;
}
include_once DISCUZ_ROOT . './source/plugin/comiis_app/comiis_info/comiis_info.php';
if (!file_exists(DISCUZ_ROOT . './source/plugin/comiis_app/comiis_info.php')) {
    return false;
}
include_once DISCUZ_ROOT . './source/plugin/comiis_app/comiis_info.php';
$v = 1;
if ($_GET['comiis'] == 'yes') {
    showmessage('error: ' . $v . 'x' . $comiis_site['auths']);
}
if ($v == 0) {
    return null;
}
$plugin_id = 'comiis_app';
if (!function_exists('comiis_app_load_data')) {
    if (!file_exists(DISCUZ_ROOT . $_G['plugind'] . $plugin_id . '/comiis_info/comiis.php')) {
        return false;
    }
    include_once DISCUZ_ROOT . $_G['plugind'] . $plugin_id . '/comiis_info/comiis.php';
}
if (!function_exists('comiis_app_load_data')) {
    return false;
}
comiis_app_load_data($plugin_id);
if (!file_exists(DISCUZ_ROOT . $_G['plugind'] . $plugin_id . '/comiis_info/comiis_md5file.php')) {
    return false;
}
include DISCUZ_ROOT . $_G['plugind'] . $plugin_id . '/comiis_info/comiis_md5file.php';
$siteuniqueid = $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid');
$tid = intval($_GET['tid']);
require_once libfile('function/discuzcode');
require_once libfile('function/post');
require_once libfile('function/comiis_app_user', 'plugin/comiis_app');
$thread = DB::fetch_all('SELECT * FROM %t WHERE tid=%d', array('forum_thread', $tid));
$thread = $thread[0];
$comiis_memberrecommend_array = array();
$query = DB::query('SELECT f.tid, m.uid, m.username FROM `' . DB::table('forum_memberrecommend') . '` f INNER JOIN `' . DB::table('common_member') . '` m ON f.recommenduid=m.uid WHERE f.tid=\'' . $tid . '\' ORDER BY dateline DESC');
while ($temp = DB::fetch($query)) {
	$comiis_memberrecommend_array[$temp['tid']][$temp['uid']] = $temp;
}
$comiis_reply_list_array = array();
$commis_readlist_num = intval($comiis_app_switch['comiis_pyqlist_hfnum']);
if ($commis_readlist_num) {
	$query = DB::query('SELECT tid, pid, message, author, authorid, dateline FROM `' . DB::table('forum_post') . '` WHERE tid=\'' . $tid . '\' AND first=0 ORDER BY dateline DESC LIMIT ' . $commis_readlist_num . ';');
	while ($temps = DB::fetch($query)) {
		$temps['re_name'] = '';
		$temps['encode_name'] = '';
		if (substr($temps['message'], 0, 7) == '[quote]') {
			preg_match_all('/^\\[quote\\].*?\\[color=#\\d+?\\](.*?)\\s/i', $temps['message'], $re_name);
			$temps['re_name'] = strlen($re_name[1][0]) ? $re_name[1][0] : '';
			$temps['encode_name'] = rawurlencode($temps['re_name']);
		}
		$temps['message'] = comiis_messagea(discuzcode($temps['message'], 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0));
		$comiis_reply_list_array[$temps['tid']][] = $temps;
	}
	include template('common/header_ajax');
	include template('touch/forum/comiis_forumdisplay_list1_zhan');
	include template('common/footer_ajax');
}