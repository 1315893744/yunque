<?php

'3f5f99469538dc32bad39a564e900e65';
'1506419387';
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
$pid = intval($_GET['pid']);
$hotreply_member = C::t('forum_hotreply_member')->fetch($pid, $_G['uid']);
if ($hotreply_member['uid'] == $_G['uid']) {
	DB::query('DELETE FROM ' . DB::table('forum_hotreply_member') . ' WHERE ' . DB::field('tid', $tid) . ' AND ' . DB::field('pid', $pid) . ' AND ' . DB::field('uid', $_G['uid']));
	DB::query('UPDATE ' . DB::table('forum_hotreply_number') . ' SET support=support-' . intval($hotreply_member['attitude']) . ', total=total-' . intval($hotreply_member['attitude']) . ' WHERE ' . DB::field('tid', $tid) . ' AND ' . DB::field('pid', $pid));
	showmessage('ok');
}