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
	showtableheader($comiis_app_lang["326"]);
	showsetting($comiis_app_lang["438"], "comiis_app[comiis_lev_txt]", $comiis_value["comiis_lev_txt"]["value"], "text", '', '', $comiis_app_lang["439"]);
	showsetting($comiis_app_lang["449"], array("comiis_app[comiis_svg]", array(array("0", $comiis_app_lang["451"]), array("1", $comiis_app_lang["48"])), true), intval($comiis_value["comiis_svg"]["value"]), "mradio", '', '', $comiis_app_lang["450"]);
	showsetting($comiis_app_lang["201"], array("comiis_app[comiis_atd_style]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_atd_style"]["value"]), "mradio", '', '', $comiis_app_lang["202"]);
	showsetting($comiis_app_lang["58"], array("comiis_app[comiis_view_tagstyle]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_view_tagstyle"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["58"]);
	showsetting($comiis_app_lang["283"], array("comiis_app[comiis_foot_backico]", array(array("0", $comiis_app_lang["286"]), array("1", $comiis_app_lang["285"]), array("2", $comiis_app_lang["287"])), true), intval($comiis_value["comiis_foot_backico"]["value"]), "mradio", '', '', $comiis_app_lang["284"]);
	showsetting($comiis_app_lang["527"], array("comiis_app[comiis_phb_style]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_phb_style"]["value"]), "mradio", '', '', $comiis_app_lang["527"]);
	showsetting($comiis_app_lang["546"], array("comiis_app[comiis_qqico_txt]", array(array("0", $comiis_app_lang["547"]), array("1", $comiis_app_lang["548"])), true), intval($comiis_value["comiis_qqico_txt"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["546"]);
	showsetting($comiis_app_lang["498"], "comiis_app[comiis_jifenurl]", $comiis_value["comiis_jifenurl"]["value"], "text", '', '', $comiis_app_lang["499"]);
	showtablefooter();
	showtableheader($comiis_app_lang["468"]);
	showsetting($comiis_app_lang["469"], "comiis_app[comiis_open_wblink]", intval($comiis_value["comiis_open_wblink"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["469"]);
	showsetting($comiis_app_lang["474"], "comiis_app[comiis_open_wblink_title]", $comiis_value["comiis_open_wblink_title"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["474"]);
	showsetting($comiis_app_lang["471"], "comiis_app[comiis_open_nwblink]", $comiis_value["comiis_open_nwblink"]["value"], "textarea", '', '', $comiis_app_lang["02"] . $comiis_app_lang["471"]);
	showsetting($comiis_app_lang["470"], "comiis_app[comiis_open_wblink_tip]", intval($comiis_value["comiis_open_wblink_tip"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["470"]);
	showsetting($comiis_app_lang["472"], "comiis_app[comiis_open_wblink_txt]", $comiis_value["comiis_open_wblink_txt"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["472"]);
	showsetting($comiis_app_lang["473"], "comiis_app[comiis_open_wblink_check]", intval($comiis_value["comiis_open_wblink_check"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["473"]);
	showtablefooter();
	showtableheader($comiis_app_lang["458"]);
	showsetting($comiis_app_lang["487"], array("comiis_app[comiis_reg_bg]", array(array("0", $comiis_app_lang["488"], array("comiis_reg_bg0" => '', "comiis_reg_bg1" => "none")), array("1", $comiis_app_lang["489"], array("comiis_reg_bg0" => "none", "comiis_reg_bg1" => ''))), true), intval($comiis_value["comiis_reg_bg"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["487"]);
	showtagheader("tbody", "comiis_reg_bg0", intval($comiis_value["comiis_reg_bg"]["value"]) ? false : true, "sub");
	showsetting($comiis_app_lang["459"], "comiis_app[comiis_reg_dltxt]", $comiis_value["comiis_reg_dltxt"]["value"], "text", '', '', $comiis_app_lang["459"] . $comiis_app_lang["461"]);
	showsetting($comiis_app_lang["460"], "comiis_app[comiis_reg_regtxt]", $comiis_value["comiis_reg_regtxt"]["value"], "text", '', '', $comiis_app_lang["460"] . $comiis_app_lang["461"]);
	showsetting($comiis_app_lang["464"], "comiis_app[comiis_reg_zmtxt]", $comiis_value["comiis_reg_zmtxt"]["value"], "text", '', '', $comiis_app_lang["464"] . $comiis_app_lang["461"]);
	showtagfooter("tbody");
	showtagheader("tbody", "comiis_reg_bg1", intval($comiis_value["comiis_reg_bg"]["value"]) ? true : false, "sub");
	showsetting($comiis_app_lang["490"], array("comiis_app[comiis_reg_bg_head]", array(array("0", $comiis_app_lang["491"]), array("1", $comiis_app_lang["492"]), array("2", $comiis_app_lang["493"])), true), intval($comiis_value["comiis_reg_bg_head"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["490"]);
	showsetting($comiis_app_lang["494"], "comiis_app[comiis_reg_bg_img]", $comiis_value["comiis_reg_bg_img"]["value"], "text", '', '', $comiis_app_lang["495"]);
	showsetting($comiis_app_lang["496"], "comiis_app[comiis_reg_bg_logo]", $comiis_value["comiis_reg_bg_logo"]["value"], "text", '', '', $comiis_app_lang["497"]);
	showtagfooter("tbody");
	showsetting($comiis_app_lang["462"], "comiis_app[comiis_reg_ico]", intval($comiis_value["comiis_reg_ico"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["462"]);
	showsetting($comiis_app_lang["463"], "comiis_app[comiis_reg_tit]", intval($comiis_value["comiis_reg_tit"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["463"]);
	showtablefooter();
	showtableheader($comiis_app_lang["452"]);
	showsetting($comiis_app_lang["199"], array("comiis_app[comiis_post_nav]", array(array("0", $comiis_app_lang["475"]), array("1", $comiis_app_lang["49"]), array("2", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_post_nav"]["value"]), "mradio", '', '', $comiis_app_lang["200"]);
	showsetting($comiis_app_lang["429"], array("comiis_app[comiis_post_apkimg]", array(array("0", $comiis_app_lang["339"]), array("1", $comiis_app_lang["340"])), true), intval($comiis_value["comiis_post_apkimg"]["value"]), "mradio", '', '', $comiis_app_lang["430"]);
	showsetting($comiis_app_lang["412"], array("comiis_app[comiis_post_icotxt]", array(array("0", $comiis_app_lang["414"]), array("1", $comiis_app_lang["415"])), true), intval($comiis_value["comiis_post_icotxt"]["value"]), "mradio", '', '', $comiis_app_lang["413"]);
	showsetting($comiis_app_lang["453"], array("comiis_app[comiis_post_qianglou]", array(array("0", $comiis_app_lang["339"]), array("1", $comiis_app_lang["340"])), true), intval($comiis_value["comiis_post_qianglou"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["453"] . $comiis_app_lang["465"]);
	showsetting($comiis_app_lang["454"], array("comiis_app[comiis_post_tag]", array(array("0", $comiis_app_lang["339"]), array("1", $comiis_app_lang["340"])), true), intval($comiis_value["comiis_post_tag"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["454"] . $comiis_app_lang["465"]);
	showsetting($comiis_app_lang["455"], array("comiis_app[comiis_post_atpy]", array(array("0", $comiis_app_lang["339"]), array("1", $comiis_app_lang["340"])), true), intval($comiis_value["comiis_post_atpy"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["455"] . $comiis_app_lang["465"]);
	showsetting($comiis_app_lang["467"], array("comiis_app[comiis_post_url]", array(array("0", $comiis_app_lang["339"]), array("1", $comiis_app_lang["340"])), true), intval($comiis_value["comiis_post_url"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["467"] . $comiis_app_lang["465"]);
	showsetting($comiis_app_lang["456"], array("comiis_app[comiis_post_att]", array(array("0", $comiis_app_lang["339"]), array("1", $comiis_app_lang["340"])), true), intval($comiis_value["comiis_post_att"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["456"] . $comiis_app_lang["465"]);
	showsetting($comiis_app_lang["215"], array("comiis_app[comiis_post_gaoji]", array(array("0", $comiis_app_lang["339"]), array("1", $comiis_app_lang["340"])), true), intval($comiis_value["comiis_post_gaoji"]["value"]), "mradio", '', '', $comiis_app_lang["216"]);
	showtablefooter();
	showtableheader($comiis_app_lang["355"]);
	showsetting($comiis_app_lang["356"], "comiis_app[comiis_share_html]", $comiis_value["comiis_share_html"]["value"], "textarea", '', '', $comiis_app_lang["357"]);
	showsetting($comiis_app_lang["358"], "comiis_app[comiis_share_js]", $comiis_value["comiis_share_js"]["value"], "textarea", '', '', $comiis_app_lang["359"]);
	showtablefooter();
	showtableheader($comiis_app_lang["153"]);
	showsetting($comiis_app_lang["154"], array("comiis_app[comiis_blogv_fg]", array(array("0", $comiis_app_lang["156"]), array("1", $comiis_app_lang["157"]), array("2", $comiis_app_lang["158"]))), intval($comiis_value["comiis_blogv_fg"]["value"]), "mradio", '', '', $comiis_app_lang["155"]);
	showsetting($comiis_app_lang["159"], "comiis_app[comiis_wzview_atd]", intval($comiis_value["comiis_wzview_atd"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["159"]);
	showsetting($comiis_app_lang["160"], "comiis_app[comiis_blogv_tag]", intval($comiis_value["comiis_blogv_tag"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["160"]);
	showsetting($comiis_app_lang["161"], "comiis_app[comiis_wzview_related]", intval($comiis_value["comiis_wzview_related"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["161"]);
	showsetting($comiis_app_lang["162"], "comiis_app[comiis_wzview_hotnews]", intval($comiis_value["comiis_wzview_hotnews"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["162"]);
	showsetting($comiis_app_lang["163"], array("comiis_app[comiis_home_view_quote]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_home_view_quote"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["163"]);
	showtablefooter();
	showtableheader($comiis_app_lang["164"]);
	showsetting($comiis_app_lang["431"], array("comiis_app[comiis_mystyle]", array(array("0", $comiis_app_lang["433"]), array("1", $comiis_app_lang["432"])), true), intval($comiis_value["comiis_mystyle"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["431"]);
	showsetting($comiis_app_lang["165"], array("comiis_app[comiis_space_header]", array(array("0", $comiis_app_lang["143"]), array("1", $comiis_app_lang["142"])), true), intval($comiis_value["comiis_space_header"]["value"]), "mradio", '', '', $comiis_app_lang["166"]);
	showsetting($comiis_app_lang["167"], array("comiis_app[comiis_space_nv]", array(array("0", $comiis_app_lang["50"]), array("1", $comiis_app_lang["168"])), true), intval($comiis_value["comiis_space_nv"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["167"]);
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