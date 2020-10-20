<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/comiis_sms/language/language.' . currentlang() . '.php';
$_G['comiis_sms'] = $_G['cache']['plugin']['comiis_sms'];
if (!in_array($_GET['action'], array('login'))) {
	showmessage($comiis_sms['79']);
}
$plugin_id = 'comiis_sms';
$comiis_upload = 0;
if ($_G['uid']) {
	showmessage($comiis_sms['79']);
}
DB::query('DELETE FROM ' . DB::table('comiis_sms_temp') . ' WHERE dateline<\'' . (TIMESTAMP - 86400) . '\'');
if ($_GET['action'] == 'login' && $_G['comiis_sms']['tel_reglogin']) {
	loadcache('plugin');
	$_G['comiis_sms'] = $_G['cache']['plugin']['comiis_sms'];
	if ($_G['comiis_sms']['login_seccodeverify']) {
		list($seccodecheck) = seccheck('login');
		if ($seccodecheck) {
			$sectpl = '<table><tr><th><span class="rq">*</span><sec>: </th><td><sec><br /><sec></td></tr></table>';
			$sechash = !isset($sechash) ? 'S' . ($_G['inajax'] ? 'A' : '') . $_G['sid'] : $sechash . random(3);
		}
	}
	if (defined('IN_MOBILE')) {
		include_once template('comiis_sms:comiis_mobreg_js');
	}
	include_once template('comiis_sms:comiis_login');
}