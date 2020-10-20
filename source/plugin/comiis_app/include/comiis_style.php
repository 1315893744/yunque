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
global $comiis_liststyle_config;
$plugin_id = 'comiis_app';
$_var_10 = 0;
if (!submitcheck("comiis_submit")) {
	$comiis_value = DB::fetch_all("SELECT * FROM %t", array("comiis_app_switch"), "name");
	$plugin_id = "comiis_app";
	loadcache("comiis_app_switch");
	$comiis_forum = "<option value=\"0\">" . $comiis_app_lang["219"] . "</option>" . forumselect(false, 0, 0, true);
	loadcache("comiis_app_list_style");
	$comiis_app_list_style = $_G["cache"]["comiis_app_list_style"];
	$comiis_app_list_style["default_s_style"] = intval($comiis_app_list_style["default_s_style"]) ? intval($comiis_app_list_style["default_s_style"]) : "4";
	$comiis_app_list_style["default_t_style"] = intval($comiis_app_list_style["default_t_style"]) ? intval($comiis_app_list_style["default_t_style"]) : "4";
	$comiis_app_list_style["default_h_style"] = intval($comiis_app_list_style["default_h_style"]) ? intval($comiis_app_list_style["default_h_style"]) : "4";
	$comiis_app_list_style["default_b_style"] = intval($comiis_app_list_style["default_b_style"]) ? intval($comiis_app_list_style["default_b_style"]) : "4";
	$comiis_app_list_style["default_g_style"] = intval($comiis_app_list_style["default_g_style"]) ? intval($comiis_app_list_style["default_g_style"]) : "4";
	showformheader($plugin_url);
	echo $comiis_app_lang["218"];
	showtableheader($comiis_app_lang["217"]);
	showsetting($comiis_app_lang["179"], array("comiis_app[comiis_listpage]", array(array("0", $comiis_app_lang["39"]), array("1", $comiis_app_lang["40"]), array("2", $comiis_app_lang["41"]))), intval($comiis_value["comiis_listpage"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["179"]);
	showtablefooter();
	showtableheader($comiis_app_lang["220"]);
	$default_style = '';
	foreach ($comiis_liststyle_config as $k => $v) {
		$default_style = $default_style . ("<option value=\"" . $k . "\">" . $k . "." . $v["name"] . "</option>");
	}
	showsetting($comiis_app_lang["221"], '', '', "<select name=\"default_s_style\">" . str_replace("<option value=\"" . $comiis_app_list_style["default_s_style"] . "\">", "<option value=\"" . $comiis_app_list_style["default_s_style"] . "\" selected>", $default_style) . "</select>", '', '', $comiis_app_lang["02"] . $comiis_app_lang["221"]);
	showsetting($comiis_app_lang["222"], '', '', "<select name=\"default_t_style\">" . str_replace("<option value=\"" . $comiis_app_list_style["default_t_style"] . "\">", "<option value=\"" . $comiis_app_list_style["default_t_style"] . "\" selected>", $default_style) . "</select>", '', '', $comiis_app_lang["02"] . $comiis_app_lang["222"]);
	showsetting($comiis_app_lang["223"], '', '', "<select name=\"default_h_style\">" . str_replace("<option value=\"" . $comiis_app_list_style["default_h_style"] . "\">", "<option value=\"" . $comiis_app_list_style["default_h_style"] . "\" selected>", $default_style) . "</select>", '', '', $comiis_app_lang["02"] . $comiis_app_lang["223"]);
	showsetting($comiis_app_lang["224"], '', '', "<select name=\"default_b_style\">" . str_replace("<option value=\"" . $comiis_app_list_style["default_b_style"] . "\">", "<option value=\"" . $comiis_app_list_style["default_b_style"] . "\" selected>", $default_style) . "</select>", '', '', $comiis_app_lang["02"] . $comiis_app_lang["224"]);
	showsetting($comiis_app_lang["328"], '', '', "<select name=\"default_g_style\">" . str_replace("<option value=\"" . $comiis_app_list_style["default_g_style"] . "\">", "<option value=\"" . $comiis_app_list_style["default_g_style"] . "\" selected>", $default_style) . "</select>", '', '', $comiis_app_lang["02"] . $comiis_app_lang["328"]);
	showtablefooter();
	showtableheader($comiis_app_lang["291"] . $comiis_app_lang["02"]);
	showsetting($comiis_app_lang["501"], array("comiis_app[comiis_listtime]", array(array("0", $comiis_app_lang["502"]), array("1", $comiis_app_lang["503"])), true), intval($comiis_value["comiis_listtime"]["value"]), "mradio", '', '', $comiis_app_lang["504"]);
	$comiis_forumk = "<select name=\"comiis_app[comiis_pyqlist_noimg][]\" multiple=\"multiple\" size=\"10\"><option value=\"\">" . $comiis_app_lang["254"] . "</option>" . forumselect(false, 0, 0, true) . "</select>";
	foreach ((array) dunserialize($comiis_value["comiis_pyqlist_noimg"]["value"]) as $v) {
		$comiis_forumk = str_replace("<option value=\"" . $v . "\">", "<option value=\"" . $v . "\" selected>", $comiis_forumk);
	}
	showsetting($comiis_app_lang["292"], '', '', $comiis_forumk, '', '', $comiis_app_lang["02"] . $comiis_app_lang["292"]);
	showsetting($comiis_app_lang["528"], array("comiis_app[comiis_pyqlist_user]", array(array("0", $comiis_app_lang["530"]), array("1", $comiis_app_lang["529"])), true), intval($comiis_value["comiis_pyqlist_user"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["528"] . $comiis_app_lang["290"]);
	showsetting($comiis_app_lang["288"], "comiis_app[comiis_pyqlist_hynum]", $comiis_value["comiis_pyqlist_hynum"]["value"], "number", '', '', $comiis_app_lang["02"] . $comiis_app_lang["288"] . $comiis_app_lang["290"]);
	showsetting($comiis_app_lang["289"], "comiis_app[comiis_pyqlist_hfnum]", $comiis_value["comiis_pyqlist_hfnum"]["value"], "number", '', '', $comiis_app_lang["02"] . $comiis_app_lang["289"] . $comiis_app_lang["290"]);
	showtablefooter();
	echo "<div class=\"comiis_liststyle\"><ul>";
	$n = 0;
	foreach ($comiis_liststyle_config as $k => $v) {
		$n = $n + 1;
		$comiis_forums = "<select name=\"select[" . $k . "][]\" multiple=\"multiple\" size=\"10\" class=\"comiis_select\" comiis_name=\"" . $v["name"] . "\">" . $comiis_forum . "</select>";
		$select = $comiis_app_list_style["stylelist"][$k];
		foreach ($select as $vs) {
			$comiis_forums = str_replace("<option value=\"" . $vs . "\">", "<option value=\"" . $vs . "\" selected>", $comiis_forums);
		}
		echo "<li>\r\n\t\t   <h2>" . $k . "." . $v["name"] . ": </h2><div class=\"comiis_liststyle_sum\"><span class=\"kmtit\">" . ($v["num"] ? $comiis_app_lang["303"] . ": </span><input name=\"comiis_picnum[" . $k . "]\" value=\"" . ($comiis_app_list_style["fid_picnum"][$k] ? $comiis_app_list_style["fid_picnum"][$k] : $v["num"]) . "\" type=\"number\" class=\"txt\"><span class=\"kmtxt\">" . $comiis_app_lang["304"] . "</span></div>" : '') . "<div class=\"comiis_liststyle_box\">\r\n\t\t\t<a href=\"javascript:;\" onclick=\"zoom(this, './source/plugin/comiis_app/style/" . $v["img"] . "', 1)\" title=\"" . $comiis_app_lang["225"] . "\" id=\"comiis_liststyle01\" initialized=\"true\" class=\"left_img\"><span>" . $comiis_app_lang["226"] . "</span><img src=\"./source/plugin/comiis_app/style/" . $v["img"] . ".s.jpg\"></a>        \r\n\t\t\t" . $comiis_forums . "\r\n\t\t\t</div>" . "</li>";
	}
	echo "</ul></div>\r\n\t<select multiple=\"multiple\" style=\"display:none\" id=\"comiis_new_select\">" . $comiis_forum . "</select>\r\n\t<script src=\"./template/comiis_app/comiis/js/jquery.min.js\" type=\"text/javascript\"></script>\r\n\t<script>\r\n\t\tvar jq = jQuery.noConflict();\r\n\t\tjq(document).on(\"change\", \"select.comiis_select\", function() {\r\n\t\t\tcomiis_upforums();\r\n\t\t});\r\n\t\tfunction comiis_upforums() {\r\n\t\t\tvar all_fids = new Array();\r\n\t\t\tvar all_names = new Array();\r\n\t\t\tjq(\"select.comiis_select option:selected\").each(function(){\r\n\t\t\t\tvar reval = jq(this).val();\r\n\t\t\t\tif(reval){\r\n\t\t\t\t\tall_fids.push(reval);\r\n\t\t\t\t\tall_names.push(jq(this).parent().parent(\"select\").attr(\"comiis_name\"));\r\n\t\r\n\t\t\t\t}\r\n\t\t\t});\r\n\t\t\tif(all_fids.length){\r\n\t\t\t\tjq(\"select.comiis_select\").each(function(){\r\n\t\t\t\t\tvar set_fisds = all_fids.concat(); \r\n\t\t\t\t\tvar set_names = all_names.concat();\r\n\t\t\t\t\tvar html = jq(\"<select multiple=\\\"multiple\\\" size=\\\"10\\\" >\" + jq(\"#comiis_new_select\").html() + \"</select>\");\r\n\t\t\t\t\tjq(this).find(\"option:selected\").each(function(){\r\n\t\t\t\t\t\tvar reval = jq(this).val();\r\n\t\t\t\t\t\tif(reval){\r\n\t\t\t\t\t\t\tjq(html).find(\"option[value='\"+reval+\"']\").attr(\"selected\",true);\r\n\t\t\t\t\t\t\tif(jq.inArray(reval, set_fisds) > -1){\r\n\t\t\t\t\t\t\t\tvar n = set_fisds.indexOf(reval);\r\n\t\t\t\t\t\t\t\tif(n > -1){\r\n\t\t\t\t\t\t\t\t\tset_fisds.splice(n,1);\r\n\t\t\t\t\t\t\t\t\tset_names.splice(n,1);\r\n\t\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t}\r\n\t\t\t\t\t});\r\n\t\t\t\t\tif(set_fisds.length){\r\n\t\t\t\t\t\tfor(var i=0;i<set_fisds.length;i++){\r\n\t\t\t\t\t\t\tif(set_fisds[i] > 0){\r\n\t\t\t\t\t\t\t\tvar comiis_fop = jq(html).find(\"option[value='\"+set_fisds[i]+\"']\");\r\n\t\t\t\t\t\t\t\tcomiis_fop.attr(\"disabled\",\"disabled\").text(comiis_fop.text() + \" (\" + set_names[i] + \")\");\r\n\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t}\r\n\t\t\t\t\t}\r\n\t\t\t\t\tjq(this).html(html.html());\r\n\t\t\t\t});\r\n\t\t\t}\r\n\t\t}\r\n\t\tcomiis_upforums();\r\n\t</script>";
	showsubmit("comiis_submit", "submit");
	showformfooter();
} else {
	$fid_style = array();
	$fid_picnum = array();
	$fid_style_array = array();
	if (is_array($_GET["select"])) {
		foreach ($_GET["select"] as $k => $v) {
			$k = intval($k);
			if (is_array($v) && $k) {
				foreach ($v as $vs) {
					$vs = intval($vs);
					if ($vs) {
						$fid_style[$vs] = $k;
						$fid_style_array[$k][] = $vs;
					}
				}
			}
		}
	}
	if (is_array($_GET["comiis_picnum"])) {
		foreach ($_GET["comiis_picnum"] as $k => $v) {
			$k = intval($k);
			$v = intval($v);
			$fid_picnum[$k] = $v;
		}
	}
	$cache = array("fid_picnum" => $fid_picnum, "fidlist" => $fid_style, "stylelist" => $fid_style_array, "default_s_style" => intval($_GET["default_s_style"]), "default_t_style" => intval($_GET["default_t_style"]), "default_h_style" => intval($_GET["default_h_style"]), "default_b_style" => intval($_GET["default_b_style"]), "default_g_style" => intval($_GET["default_g_style"]));
	save_syscache("comiis_app_list_style", $cache);
	if (is_array($_GET["comiis_app"])) {
		comiis_app_updates($_GET["comiis_app"]);
	}
	cpmsg($comiis_app_lang["64"], "action=" . $plugin_url, "succeed", array(), '', 0);
}