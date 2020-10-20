<?php

if (!defined("IN_DISCUZ") || !defined("IN_ADMINCP")) {
	echo "Access Denied";
	return 0;
}
global $_G;
global $comiis_app_time;
global $comiis_app_info;
global $comiis_app_lang;
global $plugin_url;
global $plugin_id;
$plugin_id = "comiis_app";
$_var_8 = 0;
loadcache("comiis_app_switch");
if (!submitcheck("comiis_submit")) {
	$comiis_value = DB::fetch_all("SELECT * FROM %t", array("comiis_app_switch"), "name");
	showformheader($plugin_url);
	showtableheader($comiis_app_lang["344"]);
	showsetting("AppID", "comiis_app[comiis_wxappid]", $comiis_value["comiis_wxappid"]["value"], "text", '', '', $comiis_app_lang["345"]);
	showsetting("AppSecret", "comiis_app[comiis_wxappsecret]", $comiis_value["comiis_wxappsecret"]["value"], "text", '', '', $comiis_app_lang["346"]);
	showsetting($comiis_app_lang["347"], "comiis_app[comiis_wximg]", $comiis_value["comiis_wximg"]["value"], "text", '', '', $comiis_app_lang["348"]);
	showtablefooter();
	showtableheader($comiis_app_lang["326"]);
	showsetting($comiis_app_lang["349"], "comiis_app[comiis_vfoot_gohome]", intval($comiis_value["comiis_vfoot_gohome"]["value"]), "radio", '', '', $comiis_app_lang["350"]);
	showsetting($comiis_app_lang["351"], "comiis_app[comiis_vfoot_gohomedm]", $comiis_value["comiis_vfoot_gohomedm"]["value"], "textarea", '', '', $comiis_app_lang["02"] . $comiis_app_lang["351"]);
	showsubmit("comiis_submit", "submit");
	showtablefooter();
	showformfooter();
} else {
	if (is_array($_GET["comiis_app"])) {
		comiis_app_updates($_GET["comiis_app"]);
		cpmsg($comiis_app_lang["64"], "action=" . $plugin_url, "succeed", array(), '', 0);
	} else {
		cpmsg($comiis_app_lang["65"], '', "error", array(), '', 0);
	}
}