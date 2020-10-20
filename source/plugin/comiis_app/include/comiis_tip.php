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
	showtableheader($comiis_app_lang["244"]);
	showsetting($comiis_app_lang["245"], "comiis_app[comiis_tip_open]", intval($comiis_value["comiis_tip_open"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["245"]);
	showsetting($comiis_app_lang["246"], "comiis_app[comiis_tip1]", $comiis_value["comiis_tip1"]["value"], "textarea", '', '', $comiis_app_lang["02"] . $comiis_app_lang["246"]);
	showsetting($comiis_app_lang["247"], "comiis_app[comiis_tip2]", $comiis_value["comiis_tip2"]["value"], "textarea", '', '', $comiis_app_lang["02"] . $comiis_app_lang["247"]);
	showsetting($comiis_app_lang["248"], "comiis_app[comiis_tip_key]", $comiis_value["comiis_tip_key"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["248"]);
	showsetting($comiis_app_lang["249"], "comiis_app[comiis_tip_time]", $comiis_value["comiis_tip_time"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["249"]);
	showtablefooter();
	showtableheader($comiis_app_lang["250"]);
	showsetting($comiis_app_lang["251"], "comiis_app[comiis_tip_save]", intval($comiis_value["comiis_tip_save"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["251"]);
	showsetting($comiis_app_lang["252"], "comiis_app[comiis_tip_save1]", $comiis_value["comiis_tip_save1"]["value"], "textarea", '', '', $comiis_app_lang["02"] . $comiis_app_lang["252"]);
	showsetting($comiis_app_lang["253"], "comiis_app[comiis_tip_save_time]", $comiis_value["comiis_tip_save_time"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["253"]);
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