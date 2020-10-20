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
$_var_12 = 0;
if (!submitcheck("comiis_submit")) {
	loadcache("portalcategory");
	$comiis_catlist = "<option value=\"0\">" . $comiis_app_lang["169"] . "</option>";
	foreach ($_G["cache"]["portalcategory"] as $value) {
		if ($value["level"] == 0) {
			$comiis_catlist = $comiis_catlist . ("<option value=\"" . $value["catid"] . "\">" . $value["catname"] . "</option>");
			if ($value["children"]) {
				foreach ($value["children"] as $catid2) {
					$comiis_catlist = $comiis_catlist . ("<option value=\"" . $_G["cache"]["portalcategory"][$catid2]["catid"] . "\">&nbsp; &nbsp;" . $_G["cache"]["portalcategory"][$catid2]["catname"] . "</option>");
					if ($_G["cache"]["portalcategory"][$catid2]["children"]) {
						foreach ($_G["cache"]["portalcategory"][$catid2]["children"] as $catid3) {
							$comiis_catlist = $comiis_catlist . ("<option value=\"" . $_G["cache"]["portalcategory"][$catid3]["catid"] . "\">&nbsp; &nbsp; &nbsp; " . $_G["cache"]["portalcategory"][$catid3]["catname"] . "</option>");
						}
					}
				}
			}
		}
	}
	$plugin_id = "comiis_app";
	loadcache("comiis_app_switch");
	$comiis_value = DB::fetch_all("SELECT * FROM %t", array("comiis_app_switch"), "name");
	showformheader($plugin_url);
	showtableheader($comiis_app_lang["484"]);
	$comiis_catlist_9 = "<select name=\"comiis_app[comiis_noshowcatlist][]\" multiple=\"multiple\" size=\"10\">" . $comiis_catlist . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_noshowcatlist"]["value"]) as $v) {
		$comiis_catlist_9 = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_catlist_9);
	}
	showsetting($comiis_app_lang["485"], '', '', $comiis_catlist_9, '', '', $comiis_app_lang["485"] . $comiis_app_lang["486"]);
	showtablefooter();
	showtips("<p style=\"line-height:24px;padding-bottom:5px;color:#dd0000;\">" . $comiis_app_lang["170"] . "</p>", "tips", true, $comiis_app_lang["171"]);
	showtableheader();
	$comiis_catlist_1 = "<select name=\"comiis_app[comiis_catlist1][]\" multiple=\"multiple\" size=\"10\" class=\"comiis_select\" comiis_name=\"" . $comiis_app_lang["173"] . "\">" . $comiis_catlist . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_catlist1"]["value"]) as $v) {
		$comiis_catlist_1 = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_catlist_1);
	}
	showsetting($comiis_app_lang["172"] . $comiis_app_lang["173"], '', '', $comiis_catlist_1, '', '', $comiis_app_lang["174"]);
	$comiis_catlist_2 = "<select name=\"comiis_app[comiis_catlist2][]\" multiple=\"multiple\" size=\"10\" class=\"comiis_select\" comiis_name=\"" . $comiis_app_lang["175"] . "\">" . $comiis_catlist . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_catlist2"]["value"]) as $v) {
		$comiis_catlist_2 = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_catlist_2);
	}
	showsetting($comiis_app_lang["172"] . $comiis_app_lang["175"], '', '', $comiis_catlist_2, '', '', $comiis_app_lang["176"]);
	$comiis_catlist_3 = "<select name=\"comiis_app[comiis_catlist3][]\" multiple=\"multiple\" size=\"10\" class=\"comiis_select\" comiis_name=\"" . $comiis_app_lang["515"] . "\">" . $comiis_catlist . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_catlist3"]["value"]) as $v) {
		$comiis_catlist_3 = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_catlist_3);
	}
	showsetting($comiis_app_lang["172"] . $comiis_app_lang["515"], '', '', $comiis_catlist_3, '', '', $comiis_app_lang["516"]);
	showsetting($comiis_app_lang["177"], "comiis_app[comiis_list_hot]", intval($comiis_value["comiis_list_hot"]["value"]) < 50 ? "50" : intval($comiis_value["comiis_list_hot"]["value"]), "number", '', '', $comiis_app_lang["178"]);
	showsetting($comiis_app_lang["179"], array("comiis_app[comiis_page_style]", array(array("0", $comiis_app_lang["39"]), array("1", $comiis_app_lang["40"]), array("2", $comiis_app_lang["41"]))), intval($comiis_value["comiis_page_style"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["179"]);
	showsetting($comiis_app_lang["273"], "comiis_app[comiis_list_dbdh]", intval($comiis_value["comiis_list_dbdh"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["273"]);
	showtitle($comiis_app_lang["180"]);
	showsetting($comiis_app_lang["383"], "comiis_app[comiis_portal_vtname]", $comiis_value["comiis_portal_vtname"]["value"], "text", '', '', $comiis_app_lang["384"]);
	showsetting($comiis_app_lang["181"], array("comiis_app[comiis_portal_view_top]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["182"])), true), intval($comiis_value["comiis_portal_view_top"]["value"]), "mradio", '', '', $comiis_app_lang["183"]);
	showsetting($comiis_app_lang["154"], array("comiis_app[comiis_portal_view_fg]", array(array("0", $comiis_app_lang["156"]), array("1", $comiis_app_lang["157"]), array("2", $comiis_app_lang["158"]))), intval($comiis_value["comiis_portal_view_fg"]["value"]), "mradio", '', '', $comiis_app_lang["155"]);
	showsetting($comiis_app_lang["163"], array("comiis_app[comiis_portal_view_quote]", array(array("0", $comiis_app_lang["49"]), array("1", $comiis_app_lang["50"])), true), intval($comiis_value["comiis_portal_view_quote"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["163"]);
	showsetting($comiis_app_lang["184"], "comiis_app[comiis_pwzview_zy]", intval($comiis_value["comiis_pwzview_zy"]["value"]), "radio", '', '', $comiis_app_lang["185"]);
	showsetting($comiis_app_lang["186"], "comiis_app[comiis_pwzview_zytit]", $comiis_value["comiis_pwzview_zytit"]["value"], "text", '', '', $comiis_app_lang["187"]);
	showsetting($comiis_app_lang["188"], "comiis_app[comiis_pwzview_atd]", intval($comiis_value["comiis_pwzview_atd"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["188"]);
	showsetting($comiis_app_lang["189"], "comiis_app[comiis_pwzview_next]", intval($comiis_value["comiis_pwzview_next"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["189"]);
	showsetting($comiis_app_lang["190"], "comiis_app[comiis_pwzview_related]", intval($comiis_value["comiis_pwzview_related"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["190"]);
	showsubmit("comiis_submit", "submit");
	showtablefooter();
	showformfooter();
	echo "\r\n\t<select multiple=\"multiple\" style=\"display:none\" id=\"comiis_new_select\">" . $comiis_catlist . "</select>\r\n\t<script src=\"./template/comiis_app/comiis/js/jquery.min.js\" type=\"text/javascript\"></script>\r\n\t<script>\r\n\t\tvar jq = jQuery.noConflict();\r\n\t\tjq(document).on(\"change\", \"select.comiis_select\", function() {\r\n\t\t\tcomiis_upcatlist();\r\n\t\t});\r\n\t\tfunction comiis_upcatlist() {\r\n\t\t\tvar all_fids = new Array();\r\n\t\t\tvar all_names = new Array();\r\n\t\t\tjq(\"select.comiis_select option:selected\").each(function(){\r\n\t\t\t\tvar reval = jq(this).val();\r\n\t\t\t\tif(reval){\r\n\t\t\t\t\tall_fids.push(reval);\r\n\t\t\t\t\tall_names.push(jq(this).parent(\"select\").attr(\"comiis_name\"));\r\n\t\r\n\t\t\t\t}\r\n\t\t\t});\r\n\t\t\tif(all_fids.length){\r\n\t\t\t\tjq(\"select.comiis_select\").each(function(){\r\n\t\t\t\t\tvar set_fisds = all_fids.concat(); \r\n\t\t\t\t\tvar set_names = all_names.concat();\r\n\t\t\t\t\tvar html = jq(\"<select multiple=\\\"multiple\\\" size=\\\"10\\\" >\" + jq(\"#comiis_new_select\").html() + \"</select>\");\r\n\t\t\t\t\tjq(this).find(\"option:selected\").each(function(){\r\n\t\t\t\t\t\tvar reval = jq(this).val();\r\n\t\t\t\t\t\tif(reval){\r\n\t\t\t\t\t\t\tjq(html).find(\"option[value='\"+reval+\"']\").attr(\"selected\",true);\r\n\t\t\t\t\t\t\tif(jq.inArray(reval, set_fisds) > -1){\r\n\t\t\t\t\t\t\t\tvar n = set_fisds.indexOf(reval);\r\n\t\t\t\t\t\t\t\tif(n > -1){\r\n\t\t\t\t\t\t\t\t\tset_fisds.splice(n,1);\r\n\t\t\t\t\t\t\t\t\tset_names.splice(n,1);\r\n\t\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t}\r\n\t\t\t\t\t});\r\n\t\t\t\t\tif(set_fisds.length){\r\n\t\t\t\t\t\tfor(var i=0;i<set_fisds.length;i++){\r\n\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\tif(set_fisds[i] > 0){\r\n\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\tvar comiis_fop = jq(html).find(\"option[value='\"+set_fisds[i]+\"']\");\r\n\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\tcomiis_fop.attr(\"disabled\",\"disabled\").text(comiis_fop.text() + \" (\" + set_names[i] + \")\");\r\n\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t}\r\n\t\t\t\t\t}\r\n\t\t\t\t\tjq(this).html(html.html());\r\n\t\t\t\t});\r\n\t\t\t}\r\n\t\t}\r\n\t\tcomiis_upcatlist();\r\n\t</script>";
} else {
	if (is_array($_GET["comiis_app"])) {
		comiis_app_updates($_GET["comiis_app"]);
		cpmsg($comiis_app_lang["64"], "action=" . $plugin_url, "succeed", array(), '', 0);
	} else {
		cpmsg($comiis_app_lang["65"], '', "error", array(), '', 0);
	}
}