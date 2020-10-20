<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
require DISCUZ_ROOT . './source/plugin/comiis_app_portal/language/language.' . currentlang() . '.php';
$plugin_url = 'plugins&operation=config&do=' . $pluginid . '&identifier=' . $plugin['identifier'] . '&pmod=comiis_app_portal_key';
if (!submitcheck('comiis_submit')) {
	loadcache(array('comiis_app_portal_key', 'comiis_app_portal_del'), 1);
	if (strlen($_G['cache']['comiis_app_portal_key']) != 18 || $_GET['tipkey'] == 1) {
		showtips($comiis_app_portal_lang['136'], 'tips', true, '<font style="color:red">' . $comiis_app_portal_lang['135'] . '</font>');
	}
	showformheader($plugin_url);
	showtableheader($comiis_app_portal_lang['78']);
	showsetting($comiis_app_portal_lang['79'], 'comiis_key', $_G['cache']['comiis_app_portal_key'], 'text', '', '', $comiis_app_portal_lang['80']);
	showtablefooter();
	showtableheader($comiis_app_portal_lang['329']);
	showsetting($comiis_app_portal_lang['330'], 'comiis_app_portal_del', $_G['cache']['comiis_app_portal_del'], 'radio', '', '', $comiis_app_portal_lang['331']);
	showsubmit('comiis_submit', 'submit');
	showtablefooter();
	showformfooter();
} else {
	savecache('comiis_app_portal_del', $_GET['comiis_app_portal_del'] ? 1 : 0);
		savecache('comiis_app_portal_key', daddslashes($_GET['comiis_key']));
		cpmsg($comiis_app_portal_lang['81'], 'action=' . $plugin_url, 'succeed', array(), '', 0);
}