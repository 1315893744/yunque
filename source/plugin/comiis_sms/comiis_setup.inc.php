<?php


if (!defined('IN_DISCUZ') && !$_G['uid']) {
	exit('Access Denied');
}
$_GET['mods'] = !in_array($_GET['mods'], array('setup', 'rename')) ? 'setup' : $_GET['mods'];
require_once DISCUZ_ROOT . './source/plugin/comiis_sms/language/language.' . currentlang() . '.php';
$plugin_id = 'comiis_sms';
$comiis_upload = 0;
$comiis_mobile_user = DB::fetch_first('SELECT * FROM %t WHERE uid=%d ' . DB::limit(0, 1), array('comiis_sms_user', $_G['uid']));
if ($comiis_mobile_user['uid'] == $_G['uid']) {
	$comiis_alluser = DB::fetch_all('SELECT m.username, m.uid FROM %t cm  LEFT JOIN %t m ON m.uid=cm.uid WHERE tel=%s ', array('comiis_sms_user', 'common_member', $comiis_mobile_user['tel']));
	$comiis_is_mobile_user = 1;
	$comiis_mod = 'Unbundling';
} else {
	$comiis_is_mobile_user = 0;
	$comiis_mod = 'binding';
}
if ($comiis_mobile_user['type'] == 1) {
	$comiis_is_mobile_reg_user = 1;
} else {
	$comiis_is_mobile_reg_user = 0;
}
$_G['comiis_sms'] = $_G['cache']['plugin']['comiis_sms'];
if ($_G['comiis_sms']['setup_seccodeverify']) {
	list($seccodecheck) = seccheck('login');
	if ($seccodecheck) {
		$sectpl = '<th><label class="y"><sec>:</label><span class="y xi1">*</span></th><td><sec><br /><sec></td>';
		$sechash = !isset($sechash) ? 'S' . ($_G['inajax'] ? 'A' : '') . $_G['sid'] : $sechash . random(3);
	}
}
include_once template('comiis_sms:comiis_mobreg_js');
if (defined('IN_MOBILE')) {
	include template('common/header');
	include_once template('comiis_sms:touch/comiis_setup');
	include template('common/footer');
	exit(0);
}