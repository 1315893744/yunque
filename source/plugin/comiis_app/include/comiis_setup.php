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
$_var_9 = 0;
if (!submitcheck("comiis_submit")) {
	$comiis_value = DB::fetch_all("SELECT * FROM %t", array("comiis_app_switch"), "name");
	$plugin_id = "comiis_app";
	loadcache("comiis_app_switch");
	showformheader($plugin_url);
	showtableheader($comiis_app_lang["191"]);
	showsetting($comiis_app_lang["192"], "comiis_app[comiis_sitename]", $comiis_value["comiis_sitename"]["value"], "text", '', '', $comiis_app_lang["193"]);
	showsetting($comiis_app_lang["194"], "comiis_app[comiis_appname]", $comiis_value["comiis_appname"]["value"], "text", '', '', $comiis_app_lang["195"]);
	showsetting($comiis_app_lang["332"], "comiis_app[comiis_logourl]", $comiis_value["comiis_logourl"]["value"], "text", '', '', $comiis_app_lang["333"]);
	showsetting($comiis_app_lang["307"], "comiis_app[comiis_closeheader]", $comiis_value["comiis_closeheader"]["value"], "text", '', '', $comiis_app_lang["308"]);
	showsetting($comiis_app_lang["390"], "comiis_app[comiis_closefooter]", intval($comiis_value["comiis_closefooter"]["value"]), "radio", '', '', $comiis_app_lang["391"]);
	showsetting($comiis_app_lang["196"], array("comiis_app[comiis_header_style]", array(array("0", $comiis_app_lang["197"]), array("1", $comiis_app_lang["198"])), true), intval($comiis_value["comiis_header_style"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["196"]);
	showsetting($comiis_app_lang["232"], array("comiis_app[comiis_header_show]", array(array("0", $comiis_app_lang["233"]), array("2", $comiis_app_lang["261"]), array("1", $comiis_app_lang["234"]), array("3", $comiis_app_lang["262"])), 0), intval($comiis_value["comiis_header_show"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["232"]);
	showsetting($comiis_app_lang["385"], "comiis_app[comiis_subnv_top]", intval($comiis_value["comiis_subnv_top"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["385"]);
	showtagfooter("tbody");
	showsetting($comiis_app_lang["293"], "comiis_app[comiis_loadimg]", intval($comiis_value["comiis_loadimg"]["value"]), "radio", '', '', $comiis_app_lang["305"]);
	showsetting($comiis_app_lang["396"], "comiis_app[comiis_loadbox]", intval($comiis_value["comiis_loadbox"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["396"]);
	showsetting($comiis_app_lang["482"], "comiis_app[comiis_all_abg]", intval($comiis_value["comiis_all_abg"]["value"]), "radio", '', '', $comiis_app_lang["483"]);
	showsetting($comiis_app_lang["426"], array("comiis_app[comiis_post_btnwz]", array(array("0", $comiis_app_lang["427"]), array("1", $comiis_app_lang["428"])), true), intval($comiis_value["comiis_post_btnwz"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["426"]);
	showsetting($comiis_app_lang["269"], array("comiis_app[comiis_showpm]", array(array("0", $comiis_app_lang["204"]), array("1", $comiis_app_lang["267"]), array("2", $comiis_app_lang["268"])), true), intval($comiis_value["comiis_showpm"]["value"]), "mradio", '', '', $comiis_app_lang["269"]);
	showsetting($comiis_app_lang["207"], array("comiis_app[comiis_share_style]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["208"]), array("2", $comiis_app_lang["209"])), true), intval($comiis_value["comiis_share_style"]["value"]), "mradio", '', '', $comiis_app_lang["207"] . $comiis_app_lang["02"]);
	showsetting($comiis_app_lang["539"], array("comiis_app[comiis_iphone_font]", array(array("0", $comiis_app_lang["541"]), array("1", $comiis_app_lang["542"])), true), intval($comiis_value["comiis_iphone_font"]["value"]), "mradio", '', '', $comiis_app_lang["540"]);
	showsetting($comiis_app_lang["210"], "comiis_app[comiis_ucqqfull]", intval($comiis_value["comiis_ucqqfull"]["value"]), "radio", '', '', $comiis_app_lang["211"]);
	showsetting($comiis_app_lang["230"], "comiis_app[comiis_seohead]", $comiis_value["comiis_seohead"]["value"], "textarea", '', '', $comiis_app_lang["231"]);
	showsetting($comiis_app_lang["212"], "comiis_app[comiis_statcode]", $comiis_value["comiis_statcode"]["value"], "textarea", '', '', $comiis_app_lang["213"]);
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