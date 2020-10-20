<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$plugin_id = 'comiis_app_color';
$comiis_upload = 0;
$comiis_md5file = $comiis_system_config = $comiis_info = array();
require_once DISCUZ_ROOT . './source/plugin/comiis_app_color/language/language.' . currentlang() . '.php';
if (!$_G['uid']) {
	showmessage($comiis_app_color_lang['201'], 'member.php?mod=logging&action=login');
}
$plugin_url = 'plugins&operation=config&do=' . $pluginid . '&identifier=' . $plugin['identifier'];
if (!submitcheck('colorsubmit')) {
	$comiis_app_style = $_G['cache']['comiis_app_style'];
	if (count($comiis_app_style) < 1) {
		$comiis_value = DB::fetch_all('SELECT * FROM %t WHERE `show`=\'1\' ORDER BY displayorder', array('comiis_app_style'));
		$comiis_cache = array();
		foreach ($comiis_value as $style) {
			$comiis_cache[] = array('id' => $style['id'], 'name' => $style['name'], 'color' => $style['color1']);
		}
		$comiis_app_style = $comiis_cache;
		save_syscache('comiis_app_style', $comiis_cache);
	}
	$navtitle = $_G['cache']['plugin']['comiis_app_color']['name'];
	$comiis_head = array('left' => '', 'center' => $_G['cache']['plugin']['comiis_app_color']['name'], 'right' => '');
	include_once template('comiis_app_color:comiis_home_html');
} else {
	$id = intval($_GET['colorid']);
	$colorid = DB::fetch_first('SELECT id FROM %t WHERE id=\'%d\'', array('comiis_app_style', $id));
	if ($colorid['id'] == $id) {
		$data = DB::fetch_first('SELECT * FROM %t WHERE uid=\'%d\'', array('comiis_app_userstyle', $_G['uid']));
		if ($data['uid'] == $_G['uid']) {
			DB::update('comiis_app_userstyle', array('css' => $id), DB::field('uid', $_G['uid']));
		} else {
			DB::insert('comiis_app_userstyle', array('css' => $id, 'uid' => $_G['uid']));
		}
		dsetcookie('comiis_colorid_u' . $_G['uid'], $id . 's', 86400 * 360);
		showmessage($comiis_app_color_lang['202']);
	} else {
		showmessage($comiis_app_color_lang['203'], 'home.php?mod=space&uid=' . $_G['uid'] . '&do=profile');
	}
}