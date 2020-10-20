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
	showtableheader($comiis_app_lang["01"]);
	showsetting($comiis_app_lang["274"], "comiis_app[comiis_bbsxname]", $comiis_value["comiis_bbsxname"]["value"], "text", '', '', $comiis_app_lang["275"]);
	showsetting($comiis_app_lang["500"], "comiis_app[comiis_bbstodayposts]", intval($comiis_value["comiis_bbstodayposts"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["500"]);
	showsetting($comiis_app_lang["03"], array("comiis_app[comiis_bbstype]", array(array("0", $comiis_app_lang["04"], array("comiis_bbstype0" => '', "comiis_bbstype1" => "none")), array("1", $comiis_app_lang["05"], array("comiis_bbstype0" => "none", "comiis_bbstype1" => ''))), true), intval($comiis_value["comiis_bbstype"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["03"]);
	showtagheader("tbody", "comiis_bbstype0", intval($comiis_value["comiis_bbstype"]["value"]) ? false : true, "sub");
	showsetting($comiis_app_lang["238"], "comiis_app[comiis_bbstimg]", $comiis_value["comiis_bbstimg"]["value"], "textarea", '', '', $comiis_app_lang["239"]);
	showsetting($comiis_app_lang["06"], "comiis_app[comiis_bbstj]", intval($comiis_value["comiis_bbstj"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["06"]);
	showsetting($comiis_app_lang["07"], "comiis_app[comiis_bbsan]", intval($comiis_value["comiis_bbsan"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["07"]);
	showtagfooter("tbody");
	showtagheader("tbody", "comiis_bbstype1", intval($comiis_value["comiis_bbstype"]["value"]) ? true : false, "sub");
	showsetting($comiis_app_lang["476"], array("comiis_app[comiis_forum_bkinfo]", array(array("0", $comiis_app_lang["477"]), array("1", $comiis_app_lang["478"])), true), intval($comiis_value["comiis_forum_bkinfo"]["value"]), "mradio", '', '', $comiis_app_lang["476"]);
	showsetting($comiis_app_lang["08"], "comiis_app[comiis_bbshot]", intval($comiis_value["comiis_bbshot"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["08"]);
	$comiis_forum = "<select name=\"comiis_app[comiis_bbshot_forum][]\" multiple=\"multiple\" size=\"10\"><option value=\"\">" . $comiis_app_lang["11"] . "</option>" . forumselect(false, 0, 0, true) . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_bbshot_forum"]["value"]) as $v) {
		$comiis_forum = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_forum);
	}
	showsetting($comiis_app_lang["214"], '', '', $comiis_forum, '', '', $comiis_app_lang["02"] . $comiis_app_lang["214"]);
	showtagfooter("tbody");
	showtitle($comiis_app_lang["09"]);
	showsetting($comiis_app_lang["10"], array("comiis_app[comiis_forum_showstyle]", array(array("0", $comiis_app_lang["11"]), array("1", $comiis_app_lang["43"]), array("2", $comiis_app_lang["44"]), array("3", $comiis_app_lang["45"])), true), intval($comiis_value["comiis_forum_showstyle"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["10"]);
	showsetting($comiis_app_lang["312"], array("comiis_app[comiis_list_subforum]", array(array("0", $comiis_app_lang["313"]), array("1", $comiis_app_lang["314"])), true), intval($comiis_value["comiis_list_subforum"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["312"]);
	showsetting($comiis_app_lang["446"], array("comiis_app[comiis_list_substyle]", array(array("0", $comiis_app_lang["447"]), array("1", $comiis_app_lang["448"])), true), intval($comiis_value["comiis_list_substyle"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["446"]);
	showsetting($comiis_app_lang["273"], "comiis_app[comiis_forum_dbdh]", intval($comiis_value["comiis_forum_dbdh"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["273"]);
	showsetting($comiis_app_lang["14"], array("comiis_app[comiis_list_fpost]", array(array("0", $comiis_app_lang["11"]), array("1", $comiis_app_lang["15"]), array("2", $comiis_app_lang["16"])), true), intval($comiis_value["comiis_list_fpost"]["value"]), "mradio", '', '', $comiis_app_lang["17"]);
	showsetting($comiis_app_lang["311"], "comiis_app[comiis_post_yindao]", intval($comiis_value["comiis_post_yindao"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["311"]);
	showsetting($comiis_app_lang["479"], array("comiis_app[comiis_post_yindao_ico]", array(array("0", $comiis_app_lang["480"]), array("1", $comiis_app_lang["481"])), true), intval($comiis_value["comiis_post_yindao_ico"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["479"]);
	showsetting($comiis_app_lang["22"], array("comiis_app[comiis_list_gosx]", array(array("0", $comiis_app_lang["23"]), array("1", $comiis_app_lang["24"])), true), intval($comiis_value["comiis_list_gosx"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["22"]);
	showsetting($comiis_app_lang["403"], "comiis_app[comiis_list_lev_color]", intval($comiis_value["comiis_list_lev_color"]["value"]), "radio", '', '', $comiis_app_lang["404"]);
	showsetting($comiis_app_lang["62"], "comiis_app[comiis_list_lev]", intval($comiis_value["comiis_list_lev"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["62"]);
	showsetting($comiis_app_lang["405"], "comiis_app[comiis_list_lev_tit]", intval($comiis_value["comiis_list_lev_tit"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["405"]);
	showsetting($comiis_app_lang["63"], "comiis_app[comiis_list_gender]", intval($comiis_value["comiis_list_gender"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["63"]);
	showsetting($comiis_app_lang["457"], "comiis_app[comiis_list_verify]", intval($comiis_value["comiis_list_verify"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["457"]);
	showsetting($comiis_app_lang["444"], "comiis_app[comiis_list_tj]", intval($comiis_value["comiis_list_tj"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["444"]);
	showsetting($comiis_app_lang["445"], "comiis_app[comiis_list_tjmun]", $comiis_value["comiis_list_tjmun"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["445"]);
	showsetting($comiis_app_lang["519"], "comiis_app[comiis_list_zdmun]", $comiis_value["comiis_list_zdmun"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["519"]);
	showsetting($comiis_app_lang["440"], array("comiis_app[comiis_ann_ico]", array(array("0", $comiis_app_lang["442"]), array("1", $comiis_app_lang["441"])), true), intval($comiis_value["comiis_ann_ico"]["value"]), "mradio", '', '', $comiis_app_lang["443"]);
	$comiis_forum = "<select name=\"comiis_app[comiis_open_displayorder][]\" multiple=\"multiple\" size=\"10\"><option value=\"\">" . $comiis_app_lang["25"] . "</option><option value=\"all\">" . $comiis_app_lang["26"] . "</option>" . forumselect(false, 0, 0, true) . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_open_displayorder"]["value"]) as $v) {
		$comiis_forum = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_forum);
	}
	showsetting($comiis_app_lang["27"], '', '', $comiis_forum, '', '', $comiis_app_lang["28"]);
	$comiis_forum = "<select name=\"comiis_app[comiis_open_announcement][]\" multiple=\"multiple\" size=\"10\"><option value=\"\">" . $comiis_app_lang["29"] . "</option><option value=\"all\">" . $comiis_app_lang["30"] . "</option>" . forumselect(false, 0, 0, true) . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_open_announcement"]["value"]) as $v) {
		$comiis_forum = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_forum);
	}
	showsetting($comiis_app_lang["31"], '', '', $comiis_forum, '', '', $comiis_app_lang["32"]);
	$comiis_forum = "<select name=\"comiis_app[comiis_list_ico][]\" multiple=\"multiple\" size=\"10\"><option value=\"\">" . $comiis_app_lang["29"] . "</option><option value=\"all\">" . $comiis_app_lang["30"] . "</option>" . forumselect(false, 0, 0, true) . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_list_ico"]["value"]) as $v) {
		$comiis_forum = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_forum);
	}
	showsetting($comiis_app_lang["33"], '', '', $comiis_forum, '', '', $comiis_app_lang["34"]);
	$comiis_forum = "<select name=\"comiis_app[comiis_forumlist_notit][]\" multiple=\"multiple\" size=\"10\"><option value=\"\">" . $comiis_app_lang["29"] . "</option><option value=\"all\">" . $comiis_app_lang["30"] . "</option>" . forumselect(false, 0, 0, true) . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_forumlist_notit"]["value"]) as $v) {
		$comiis_forum = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_forum);
	}
	showsetting($comiis_app_lang["35"], '', '', $comiis_forum, '', '', $comiis_app_lang["36"]);
	$comiis_forum = "<select name=\"comiis_app[comiis_postautotitle][]\" multiple=\"multiple\" size=\"10\"><option value=\"\">" . $comiis_app_lang["254"] . "</option>" . forumselect(false, 0, 0, true) . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_postautotitle"]["value"]) as $v) {
		$comiis_forum = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_forum);
	}
	showsetting($comiis_app_lang["255"], '', '', $comiis_forum, '', '', $comiis_app_lang["256"]);
	showsetting($comiis_app_lang["352"], "comiis_app[comiis_list_zntits]", intval($comiis_value["comiis_list_zntits"]["value"]), "radio", '', '', $comiis_app_lang["353"] . $comiis_app_lang["354"]);
	showsetting($comiis_app_lang["295"], "comiis_app[comiis_post_titnum]", $comiis_value["comiis_post_titnum"]["value"], "number", '', '', $comiis_app_lang["02"] . $comiis_app_lang["295"] . $comiis_app_lang["294"]);
	showsetting($comiis_app_lang["296"], "comiis_app[comiis_post_hfnum]", $comiis_value["comiis_post_hfnum"]["value"], "number", '', '', $comiis_app_lang["02"] . $comiis_app_lang["296"] . $comiis_app_lang["294"]);
	showtitle($comiis_app_lang["37"]);
	showsetting($comiis_app_lang["276"], "comiis_app[comiis_bbsvtname]", $comiis_value["comiis_bbsvtname"]["value"], "text", '', '', $comiis_app_lang["277"]);
	showsetting($comiis_app_lang["38"], array("comiis_app[comiis_bbspage_style]", array(array("0", $comiis_app_lang["39"]), array("1", $comiis_app_lang["40"]), array("2", $comiis_app_lang["41"]))), intval($comiis_value["comiis_bbspage_style"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["38"]);
	showsetting($comiis_app_lang["42"], array("comiis_app[comiis_view_header]", array(array("0", $comiis_app_lang["43"]), array("1", $comiis_app_lang["44"]), array("2", $comiis_app_lang["45"]), array("3", $comiis_app_lang["309"])), true), intval($comiis_value["comiis_view_header"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["42"]);
	showsetting($comiis_app_lang["511"], array("comiis_app[comiis_view_typeid]", array(array("0", $comiis_app_lang["11"]), array("1", $comiis_app_lang["512"]), array("2", $comiis_app_lang["513"]), array("3", $comiis_app_lang["514"]))), intval($comiis_value["comiis_view_typeid"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["511"]);
	showsetting($comiis_app_lang["524"], "comiis_app[comiis_view_titico]", intval($comiis_value["comiis_view_titico"]["value"]), "radio", '', '', $comiis_app_lang["524"]);
	showsetting($comiis_app_lang["352"], "comiis_app[comiis_view_zntit]", intval($comiis_value["comiis_view_zntit"]["value"]), "radio", '', '', $comiis_app_lang["353"]);
	showsetting($comiis_app_lang["257"], array("comiis_app[comiis_view_header_noxx]", array(array("1", $comiis_app_lang["339"], array("comiis_view_header_nos" => '')), array("0", $comiis_app_lang["340"], array("comiis_view_header_nos" => "none"))), true), intval($comiis_value["comiis_view_header_noxx"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["257"]);
	showtagheader("tbody", "comiis_view_header_nos", intval($comiis_value["comiis_view_header_noxx"]["value"]) ? true : false, "sub");
	showsetting($comiis_app_lang["343"], array("comiis_app[comiis_view_bkxx]", array(array("0", $comiis_app_lang["341"]), array("1", $comiis_app_lang["342"])), true), intval($comiis_value["comiis_view_bkxx"]["value"]), "mradio", '', '', $comiis_app_lang["343"] . $comiis_app_lang["02"]);
	showtagfooter("tbody");
	showsetting($comiis_app_lang["46"], array("comiis_app[comiis_view_reply]", array(array("0", $comiis_app_lang["43"]), array("1", $comiis_app_lang["44"]), array("2", $comiis_app_lang["45"])), true), intval($comiis_value["comiis_view_reply"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["46"]);
	showsetting($comiis_app_lang["47"], array("comiis_app[comiis_view_rate]", array(array("0", $comiis_app_lang["48"]), array("1", $comiis_app_lang["49"]), array("2", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_view_rate"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["47"]);
	showsetting($comiis_app_lang["387"], array("comiis_app[comiis_view_rate_style]", array(array("0", $comiis_app_lang["388"]), array("1", $comiis_app_lang["389"])), true), intval($comiis_value["comiis_view_rate_style"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["387"]);
	showsetting($comiis_app_lang["386"], "comiis_app[comiis_view_lcrate]", intval($comiis_value["comiis_view_lcrate"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["386"]);
	showsetting($comiis_app_lang["517"], "comiis_app[comiis_view_imgdata]", intval($comiis_value["comiis_view_imgdata"]["value"]), "radio", '', '', $comiis_app_lang["518"]);
	showsetting($comiis_app_lang["520"], "comiis_app[comiis_view_kuimgdata]", intval($comiis_value["comiis_view_kuimgdata"]["value"]), "radio", '', '', $comiis_app_lang["521"]);
	showsetting($comiis_app_lang["510"], array("comiis_app[comiis_aimg_oneshow]", array(array("0", $comiis_app_lang["52"]), array("1", $comiis_app_lang["53"])), true), intval($comiis_value["comiis_aimg_oneshow"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["510"]);
	showsetting($comiis_app_lang["51"], array("comiis_app[comiis_aimg_show]", array(array("0", $comiis_app_lang["52"]), array("1", $comiis_app_lang["53"])), true), intval($comiis_value["comiis_aimg_show"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["51"]);
	showsetting($comiis_app_lang["54"], array("comiis_app[comiis_view_quote]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_view_quote"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["54"]);
	showsetting($comiis_app_lang["259"], "comiis_app[comiis_recommend_open]", intval($comiis_value["comiis_recommend_open"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["259"]);
	showsetting($comiis_app_lang["55"], array("comiis_app[comiis_recommend]", array(array("0", $comiis_app_lang["56"]), array("1", $comiis_app_lang["57"])), true), intval($comiis_value["comiis_recommend"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["55"]);
	showsetting($comiis_app_lang["392"], "comiis_app[comiis_view_foottid]", intval($comiis_value["comiis_view_foottid"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["392"]);
	showsetting($comiis_app_lang["160"], "comiis_app[comiis_view_tag]", intval($comiis_value["comiis_view_tag"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["160"]);
	showsetting($comiis_app_lang["59"], "comiis_app[comiis_view_cnxh]", intval($comiis_value["comiis_view_cnxh"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["59"]);
	showsetting($comiis_app_lang["393"], array("comiis_app[comiis_view_cnxh_wz]", array(array("0", $comiis_app_lang["394"]), array("1", $comiis_app_lang["395"])), true), intval($comiis_value["comiis_view_cnxh_wz"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["393"]);
	showsetting($comiis_app_lang["280"], array("comiis_app[comiis_view_cnxh_style]", array(array("0", $comiis_app_lang["281"]), array("1", $comiis_app_lang["282"])), true), intval($comiis_value["comiis_view_cnxh_style"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["280"]);
	showsetting($comiis_app_lang["278"], "comiis_app[comiis_view_cnxh_name]", $comiis_value["comiis_view_cnxh_name"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["278"]);
	showsetting($comiis_app_lang["279"], "comiis_app[comiis_view_cnxh_num]", $comiis_value["comiis_view_cnxh_num"]["value"], "number", '', '', $comiis_app_lang["02"] . $comiis_app_lang["279"]);
	showsetting($comiis_app_lang["60"], "comiis_app[comiis_modact_log]", intval($comiis_value["comiis_modact_log"]["value"]), "radio", '', '', $comiis_app_lang["61"]);
	showsetting($comiis_app_lang["403"], "comiis_app[comiis_view_lev_color]", intval($comiis_value["comiis_view_lev_color"]["value"]), "radio", '', '', $comiis_app_lang["404"]);
	showsetting($comiis_app_lang["62"], "comiis_app[comiis_view_lev]", intval($comiis_value["comiis_view_lev"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["62"]);
	showsetting($comiis_app_lang["258"], "comiis_app[comiis_view_lev_tit]", intval($comiis_value["comiis_view_lev_tit"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["258"]);
	showsetting($comiis_app_lang["63"], "comiis_app[comiis_view_gender]", intval($comiis_value["comiis_view_gender"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["63"]);
	showsetting($comiis_app_lang["457"], "comiis_app[comiis_view_verify]", intval($comiis_value["comiis_view_verify"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["457"]);
	showsetting($comiis_app_lang["408"], "comiis_app[comiis_view_dianping]", intval($comiis_value["comiis_view_dianping"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["408"]);
	showsetting($comiis_app_lang["409"], "comiis_app[comiis_view_dianping_name]", $comiis_value["comiis_view_dianping_name"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["409"]);
	showsetting($comiis_app_lang["410"], "comiis_app[comiis_view_dianping_ico]", $comiis_value["comiis_view_dianping_ico"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["410"] . $comiis_app_lang["411"]);
	showsetting($comiis_app_lang["406"], "comiis_app[comiis_view_quotes]", intval($comiis_value["comiis_view_quotes"]["value"]), "radio", '', '', $comiis_app_lang["407"]);
	showsetting($comiis_app_lang["507"], array("comiis_app[comiis_view_hfurl]", array(array("0", $comiis_app_lang["508"]), array("1", $comiis_app_lang["509"])), true), intval($comiis_value["comiis_view_hfurl"]["value"]), "mradio", '', '', $comiis_app_lang["507"]);
	showtips("<p style=\"line-height:24px;padding-bottom:5px;color:#dd0000;\">" . $comiis_app_lang["300"] . "</p>", "tips", true, $comiis_app_lang["297"]);
	showtableheader();
	showsetting($comiis_app_lang["298"], "comiis_app[comiis_flxx_list]", intval($comiis_value["comiis_flxx_list"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["298"]);
	showsetting($comiis_app_lang["382"], "comiis_app[comiis_flxx_list_ss]", intval($comiis_value["comiis_flxx_list_ss"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["382"]);
	showsetting($comiis_app_lang["299"], array("comiis_app[comiis_flxx_view]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["505"]), array("2", $comiis_app_lang["506"])), true), intval($comiis_value["comiis_flxx_view"]["value"]), "mradio", '', '', $comiis_app_lang["299"]);
	showsetting($comiis_app_lang["334"], array("comiis_app[comiis_flxx_view_wz]", array(array("0", $comiis_app_lang["336"]), array("1", $comiis_app_lang["335"])), true), intval($comiis_value["comiis_flxx_view_wz"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["334"]);
	showsetting($comiis_app_lang["301"], "comiis_app[comiis_flxx_css]", $comiis_value["comiis_flxx_css"]["value"], "textarea", '', '', $comiis_app_lang["302"]);
	showtagfooter("tbody");
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