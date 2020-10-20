<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/comiis_app_homestyle/language/language.' . currentlang() . '.php';
if (!$_G['uid']) {
    showmessage($comiis_app_homestyle_lang['66'], 'member.php?mod=logging&action=login');
}
$plugin_id = 'comiis_app_homestyle';
$comiis_upload = 0;
$comiis_info = array();
$comiis_system_config = array();
$comiis_md5file = array();
$siteuniqueid = $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid');
if (file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php')) {
    include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php';
    
} else {
    $comiis_upload = 1;
}
if ($_GET['comiis_up_sn'] === 'yes') {
    $comiis_upload = 1;
}
if ($comiis_upload == 1) {
    loadcache($plugin_id . '_up');
    if ($_G['cache'][$plugin_id . '_up']['up'] != 1) {
        save_syscache($plugin_id . '_up', array('up' => 1));
        if (!function_exists('comiis_app_load_app_homestyle_data')) {
            if (!file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis.php')) {
                return false;
            }
            include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis.php';
        }
        if (!function_exists('comiis_app_load_app_homestyle_data')) {
            return false;
        }
        comiis_app_load_app_homestyle_data($plugin_id);
        save_syscache($plugin_id . '_up', array('up' => 0));
    }
}
if (!file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php')) {
    return false;
}
include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php';

loadcache('plugin');
if (!$_G['uid']) {
    showmessage($comiis_app_homestyle_lang['201'], 'member.php?mod=logging&action=login');
}
if (!submitcheck('homesubmit')) {
    $comiis_app_home = DB::fetch_all('SELECT * FROM %t ORDER BY displayorder', array('comiis_app_home'));
    $comiis_home_url = 'plugin.php?id=comiis_app_homestyle';
    $comiis_home_dir = '';
    $smod = intval($_GET['smod']);
    $_G['comiis_close_header'] = 1;
    $navtitle = '&#20010;&#20154;&#31354;&#38388;&#39118;&#26684;';
    $space['uid'] = $_G['uid'];
    $space['username'] = $_G['username'];
    include_once template('comiis_app_homestyle:comiis_home_html');
} else {
    $styleid = intval($_GET['styleid']);
    $img = DB::fetch_first('SELECT id,dir,img FROM %t WHERE id=\'%d\'', array('comiis_app_home', $styleid));
    if ($img['id'] == $styleid) {
        $data = DB::fetch_first('SELECT * FROM %t WHERE uid=\'%d\'', array('comiis_app_homestyle', $_G['uid']));
        $postdata = array('img' => $img['dir'] . '/' . $img['img'], 'img_id' => $img['id'], 'uid' => $_G['uid']);
        if ($data['uid'] == $_G['uid']) {
            DB::update('comiis_app_homestyle', $postdata, DB::field('uid', $_G['uid']));
        } else {
            DB::insert('comiis_app_homestyle', $postdata);
        }
        dsetcookie('comiis_homestyleid_u' . $_G['uid'], $img['id'] . '*' . $postdata['img'], 86400 * 360);
        showmessage($comiis_app_homestyle_lang['64']);
    } else {
        showmessage($comiis_app_homestyle_lang['65'], 'home.php?mod=space&uid=' . $_G['uid'] . '&do=profile');
    }
}