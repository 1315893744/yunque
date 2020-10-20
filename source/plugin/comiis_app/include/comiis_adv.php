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
$plugin_id = 'comiis_app';
$_var_8 = 0;
if (!submitcheck("comiis_submit")) {
	$plugin_id = "comiis_app";
	loadcache("comiis_app_switch");
	require DISCUZ_ROOT . "./source/plugin/comiis_app/language/language." . currentlang() . ".php";
	$comiis_value = DB::fetch_all("SELECT * FROM %t", array("comiis_app_switch"), "name");
	showformheader($plugin_url);
	showtableheader($comiis_app_lang["360"]);
	showsetting($comiis_app_lang["363"], "comiis_app[comiis_fullscreen]", intval($comiis_value["comiis_fullscreen"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["363"]);
	showsetting($comiis_app_lang["364"], "comiis_app[comiis_fullscreen_title]", $comiis_value["comiis_fullscreen_title"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["364"]);
	showsetting($comiis_app_lang["365"], "comiis_app[comiis_fullscreen_time]", $comiis_value["comiis_fullscreen_time"]["value"], "number", '', '', $comiis_app_lang["02"] . $comiis_app_lang["365"] . $comiis_app_lang["368"]);
	showsetting($comiis_app_lang["366"], "comiis_app[comiis_fullscreen_showtime]", $comiis_value["comiis_fullscreen_showtime"]["value"], "number", '', '', $comiis_app_lang["367"]);
	showsetting($comiis_app_lang["369"], "comiis_app[comiis_fullscreen_url]", $comiis_value["comiis_fullscreen_url"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["369"] . $comiis_app_lang["381"]);
	showsetting($comiis_app_lang["370"], "comiis_app[comiis_fullscreen_img]", $comiis_value["comiis_fullscreen_img"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["370"]);
	showsetting($comiis_app_lang["374"], "comiis_app[comiis_fullscreen_djs]", $comiis_value["comiis_fullscreen_djs"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["374"]);
	showsetting($comiis_app_lang["543"], "comiis_app[comiis_fullscreen_nologo]", intval($comiis_value["comiis_fullscreen_nologo"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["543"]);
	showsetting($comiis_app_lang["371"], "comiis_app[comiis_fullscreen_logourl]", $comiis_value["comiis_fullscreen_logourl"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["371"] . $comiis_app_lang["381"]);
	showsetting($comiis_app_lang["372"], "comiis_app[comiis_fullscreen_logoimg]", $comiis_value["comiis_fullscreen_logoimg"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["372"]);
	showsetting($comiis_app_lang["373"], "comiis_app[comiis_fullscreen_copy]", $comiis_value["comiis_fullscreen_copy"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["373"]);
	showsetting($comiis_app_lang["375"], "comiis_app[comiis_fullscreen_css]", $comiis_value["comiis_fullscreen_css"]["value"], "textarea", '', '', $comiis_app_lang["376"]);
	showtablefooter();
	showtableheader($comiis_app_lang["235"]);
	showsetting($comiis_app_lang["379"], "comiis_app[comiis_fnavimgs]", $comiis_value["comiis_fnavimgs"]["value"], "textarea", '', '', $comiis_app_lang["380"]);
	showsetting($comiis_app_lang["236"], "comiis_app[comiis_bbstimgs]", $comiis_value["comiis_bbstimgs"]["value"], "textarea", '', '', $comiis_app_lang["237"]);
	showsetting($comiis_app_lang["240"], "comiis_app[comiis_tagtimgs]", $comiis_value["comiis_tagtimgs"]["value"], "textarea", '', '', $comiis_app_lang["241"]);
	showsetting($comiis_app_lang["242"], "comiis_app[comiis_doingtimgs]", $comiis_value["comiis_doingtimgs"]["value"], "textarea", '', '', $comiis_app_lang["243"]);
	showsetting($comiis_app_lang["531"], "comiis_app[comiis_phbtimgs]", $comiis_value["comiis_phbtimgs"]["value"], "textarea", '', '', $comiis_app_lang["532"]);
	showsetting($comiis_app_lang["533"], "comiis_app[comiis_guidetimgs]", $comiis_value["comiis_guidetimgs"]["value"], "textarea", '', '', $comiis_app_lang["534"]);
	showsetting($comiis_app_lang["535"], "comiis_app[comiis_forumtimgs]", $comiis_value["comiis_forumtimgs"]["value"], "textarea", '', '', $comiis_app_lang["536"]);
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