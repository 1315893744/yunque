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
if (C::t('forum_memberrecommend')->fetch_by_recommenduid_tid($_G['uid'], $tid)) {
	DB::query('DELETE FROM ' . DB::table('forum_threadpartake') . ' WHERE ' . DB::field('tid', $tid) . ' AND ' . DB::field('uid', $_G['uid']));
	DB::query('DELETE FROM ' . DB::table('forum_memberrecommend') . ' WHERE ' . DB::field('tid', $tid) . ' AND ' . DB::field('recommenduid', $_G['uid']));
	DB::query('UPDATE ' . DB::table('forum_thread') . ' SET lastpost=\'' . $_G['timestamp'] . '\', recommend_add=(recommend_add-' . intval($_G['group']['allowrecommend']) . '), recommends=(recommends-' . intval($_G['group']['allowrecommend']) . ') WHERE ' . DB::field('tid', $tid));
	require_once libfile('function/forum');
	update_threadpartake($tid);
	if ($_G['config']['memory']['file']['server']) {
		$prefix = empty($_G['config']['memory']['prefix']) ? substr(md5($_SERVER['HTTP_HOST']), 0, 6) . '_' : $_G['config']['memory']['prefix'];
		$memory_file = DISCUZ_ROOT . './' . $_G['config']['memory']['file']['server'] . '/' . substr($prefix, 0, strlen($prefix) - 1) . '/forum/thread/' . $tid . '/' . $prefix . 'forum_thread_' . $tid . '.php';
		if (file_exists($memory_file)) {
			unlink($memory_file);
		}
	}
	showmessage('ok');
}