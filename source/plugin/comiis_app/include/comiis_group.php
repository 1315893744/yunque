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
	showtableheader($comiis_app_lang["324"]);
	showsetting($comiis_app_lang["317"], array("comiis_app[comiis_group_style]", array(array("0", $comiis_app_lang["318"]), array("1", $comiis_app_lang["319"])), true), intval($comiis_value["comiis_group_style"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["317"]);
	showsetting($comiis_app_lang["321"], "comiis_app[comiis_group_thtml]", $comiis_value["comiis_group_thtml"]["value"], "textarea", '', '', $comiis_app_lang["02"] . $comiis_app_lang["321"] . $comiis_app_lang["322"]);
	showsetting($comiis_app_lang["315"], "comiis_app[comiis_group_jxtj]", intval($comiis_value["comiis_group_jxtj"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["315"]);
	showsetting($comiis_app_lang["316"], "comiis_app[comiis_group_jxtj_name]", $comiis_value["comiis_group_jxtj_name"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["316"]);
	showsetting($comiis_app_lang["320"], "comiis_app[comiis_group_bhtml]", $comiis_value["comiis_group_bhtml"]["value"], "textarea", '', '', $comiis_app_lang["02"] . $comiis_app_lang["320"] . $comiis_app_lang["322"]);
	showsetting($comiis_app_lang["323"], "comiis_app[comiis_group_ilist]", intval($comiis_value["comiis_group_ilist"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["323"]);
	showtablefooter();
	showtableheader($comiis_app_lang["537"]);
	showsetting($comiis_app_lang["538"], array("comiis_app[comiis_group_listhead]", array(array("0", $comiis_app_lang["43"]), array("1", $comiis_app_lang["44"]), array("2", $comiis_app_lang["45"])), true), intval($comiis_value["comiis_group_listhead"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["538"]);
	showsetting($comiis_app_lang["378"], "comiis_app[comiis_group_notit]", intval($comiis_value["comiis_group_notit"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["378"]);
	showsetting($comiis_app_lang["377"], "comiis_app[comiis_grouplist_zntits]", intval($comiis_value["comiis_grouplist_zntits"]["value"]), "radio", '', '', $comiis_app_lang["353"] . $comiis_app_lang["354"]);
	showtablefooter();
	showtableheader($comiis_app_lang["325"]);
	showsetting($comiis_app_lang["276"], "comiis_app[comiis_bbsvtname_group]", $comiis_value["comiis_bbsvtname_group"]["value"], "text", '', '', $comiis_app_lang["277"]);
	showsetting($comiis_app_lang["42"], array("comiis_app[comiis_groupview_header]", array(array("0", $comiis_app_lang["43"]), array("1", $comiis_app_lang["44"]), array("2", $comiis_app_lang["45"]), array("3", $comiis_app_lang["309"])), true), intval($comiis_value["comiis_groupview_header"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["42"]);
	showsetting($comiis_app_lang["352"], "comiis_app[comiis_groupview_zntit]", intval($comiis_value["comiis_groupview_zntit"]["value"]), "radio", '', '', $comiis_app_lang["353"]);
	showsetting($comiis_app_lang["257"], array("comiis_app[comiis_groupview_header_noxx]", array(array("1", $comiis_app_lang["339"], array("comiis_view_header_nos" => '')), array("0", $comiis_app_lang["340"], array("comiis_view_header_nos" => "none"))), true), intval($comiis_value["comiis_groupview_header_noxx"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["257"]);
	showtagheader("tbody", "comiis_view_header_nos", intval($comiis_value["comiis_groupview_header_noxx"]["value"]) ? true : false, "sub");
	showsetting($comiis_app_lang["343"], array("comiis_app[comiis_groupview_bkxx]", array(array("0", $comiis_app_lang["341"]), array("1", $comiis_app_lang["342"])), true), intval($comiis_value["comiis_groupview_bkxx"]["value"]), "mradio", '', '', $comiis_app_lang["343"] . $comiis_app_lang["02"]);
	showtagfooter("tbody");
	showsetting($comiis_app_lang["46"], array("comiis_app[comiis_view_reply_group]", array(array("0", $comiis_app_lang["43"]), array("1", $comiis_app_lang["44"]), array("2", $comiis_app_lang["45"])), true), intval($comiis_value["comiis_view_reply_group"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["46"]);
	showsetting($comiis_app_lang["47"], array("comiis_app[comiis_view_rate_group]", array(array("0", $comiis_app_lang["48"]), array("1", $comiis_app_lang["49"]), array("2", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_view_rate_group"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["47"]);
	showsetting($comiis_app_lang["51"], array("comiis_app[comiis_aimg_show_group]", array(array("0", $comiis_app_lang["52"]), array("1", $comiis_app_lang["53"])), true), intval($comiis_value["comiis_aimg_show_group"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["51"]);
	showsetting($comiis_app_lang["54"], array("comiis_app[comiis_view_quote_group]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_view_quote_group"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["54"]);
	showsetting($comiis_app_lang["259"], "comiis_app[comiis_recommend_open_group]", intval($comiis_value["comiis_recommend_open_group"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["259"]);
	showsetting($comiis_app_lang["55"], array("comiis_app[comiis_recommend_group]", array(array("0", $comiis_app_lang["56"]), array("1", $comiis_app_lang["57"])), true), intval($comiis_value["comiis_recommend_group"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["55"]);
	showsetting($comiis_app_lang["160"], "comiis_app[comiis_view_tag_group]", intval($comiis_value["comiis_view_tag_group"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["160"]);
	showsetting($comiis_app_lang["59"], "comiis_app[comiis_view_cnxh_group]", intval($comiis_value["comiis_view_cnxh_group"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["59"]);
	showsetting($comiis_app_lang["280"], array("comiis_app[comiis_view_cnxh_style_group]", array(array("0", $comiis_app_lang["281"]), array("1", $comiis_app_lang["282"])), true), intval($comiis_value["comiis_view_cnxh_style_group"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["280"]);
	showsetting($comiis_app_lang["278"], "comiis_app[comiis_view_cnxh_name_group]", $comiis_value["comiis_view_cnxh_name_group"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["278"]);
	showsetting($comiis_app_lang["279"], "comiis_app[comiis_view_cnxh_num_group]", $comiis_value["comiis_view_cnxh_num_group"]["value"], "number", '', '', $comiis_app_lang["02"] . $comiis_app_lang["279"]);
	showsetting($comiis_app_lang["62"], "comiis_app[comiis_view_lev_group]", intval($comiis_value["comiis_view_lev_group"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["62"]);
	showsetting($comiis_app_lang["258"], "comiis_app[comiis_view_lev_tit_group]", intval($comiis_value["comiis_view_lev_tit_group"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["258"]);
	showsetting($comiis_app_lang["63"], "comiis_app[comiis_view_gender_group]", intval($comiis_value["comiis_view_gender_group"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["63"]);
	showtablefooter();
	showtableheader($comiis_app_lang["326"]);
	showsetting($comiis_app_lang["327"], "comiis_app[comiis_group_language]", $comiis_value["comiis_group_language"]["value"], "textarea", '', '', $comiis_app_lang["02"] . $comiis_app_lang["327"]);
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