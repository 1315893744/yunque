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
if (!submitcheck("comiis_navsubmit")) {
	if (empty($_GET["comiis_sub"]) || !in_array($_GET["comiis_sub"], array("lnav", "mnav", "tnav", "fnav", "ynav"))) {
		$_GET["comiis_sub"] = "lnav";
	}
	$comiis_nav = DB::fetch_all("SELECT * FROM %t WHERE navtype='" . $_GET["comiis_sub"] . "' ORDER BY displayor", array("comiis_app_nav"));
	$plugin_id = "comiis_app";
	loadcache("comiis_app_switch");
	echo "<div class=\"comiis_tabbox\">\r\n\t  <div class=\"comiis_tabbox_tit\">\r\n\t\t<ul>\r\n\t\t  <li><a href=\"" . ADMINSCRIPT . "?action=" . $plugin_url . "&comiis_sub=lnav\"" . ($_GET["comiis_sub"] == "lnav" ? " class=\"tabon\"" : '') . ">" . $comiis_app_lang["131"] . "</a></li>\r\n\t\t  <li><a href=\"" . ADMINSCRIPT . "?action=" . $plugin_url . "&comiis_sub=tnav\"" . ($_GET["comiis_sub"] == "tnav" ? " class=\"tabon\"" : '') . ">" . $comiis_app_lang["132"] . "</a></li>\r\n\t\t  <li><a href=\"" . ADMINSCRIPT . "?action=" . $plugin_url . "&comiis_sub=mnav\"" . ($_GET["comiis_sub"] == "mnav" ? " class=\"tabon\"" : '') . ">" . $comiis_app_lang["133"] . "</a></li>\r\n\t\t  <li><a href=\"" . ADMINSCRIPT . "?action=" . $plugin_url . "&comiis_sub=fnav\"" . ($_GET["comiis_sub"] == "fnav" ? " class=\"tabon\"" : '') . ">" . $comiis_app_lang["134"] . "</a></li>\r\n\t\t  <li><a href=\"" . ADMINSCRIPT . "?action=" . $plugin_url . "&comiis_sub=ynav\"" . ($_GET["comiis_sub"] == "ynav" ? " class=\"tabon\"" : '') . ">" . $comiis_app_lang["434"] . "</a></li>\r\n\t\t</ul>\r\n\t  </div>\r\n\t  <div class=\"comiis_tabbox_body\">";
	if ($_GET["comiis_sub"] == "lnav") {
		echo $comiis_app_lang["135"];
	} else {
		if ($_GET["comiis_sub"] == "tnav") {
			echo $comiis_app_lang["136"];
		} else {
			if ($_GET["comiis_sub"] == "mnav") {
				echo $comiis_app_lang["137"];
			} else {
				if ($_GET["comiis_sub"] == "fnav") {
					echo $comiis_app_lang["138"];
				} else {
					if ($_GET["comiis_sub"] == "ynav") {
						echo $comiis_app_lang["435"];
					}
				}
			}
		}
	}
	if ($_GET["comiis_sub"] == "lnav") {
		echo "<script type=\"text/JavaScript\">\r\n\t\t\tvar rowtypedata = [\r\n\t\t\t\t[\r\n\t\t\t\t\t[1,'', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" size=\"2\" name=\"new_displayor[]\" value=\"0\">', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_name[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_icon[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input id=\"nc{n}_v\" type=\"text\" class=\"txt\" style=\"float:left;\" name=\"new_bgcolor[]\\ value=\"\" onchange=\"updatecolorpreview(\\'nc{n}\\')\"><input id=\"nc{n}\" onclick=\"nc{n}_frame.location=\\'static/image/admincp/getcolor.htm?nc{n}|nc{n}_v\\';showMenu({\\'ctrlid\\':\\'nc{n}\\'})\" type=\"button\" class=\"colorwd\" value=\"\" style=\"background: \"><span id=\"nc{n}_menu\" style=\"display: none\"><iframe name=\"nc{n}_frame\" src=\"\" frameborder=\"0\" width=\"210\" height=\"148\" scrolling=\"no\"></iframe></span>'],\t\t\t\t\t\t\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_url[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,''],\r\n\t\t\t\t\t[1,'']\r\n\t\t\t\t]\r\n\t\t\t];\r\n\t\t</script>";
	} else {
		if ($_GET["comiis_sub"] == "ynav") {
			echo "<script type=\"text/JavaScript\">\r\n\t\t\tvar rowtypedata = [\r\n\t\t\t\t[\r\n\t\t\t\t\t[1,'', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" size=\"2\" name=\"new_displayor[]\" value=\"0\">', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_name[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_icon[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input id=\"nc{n}_v\" type=\"text\" class=\"txt\" style=\"float:left;\" name=\"new_bgcolor[]\\ value=\"\" onchange=\"updatecolorpreview(\\'nc{n}\\')\"><input id=\"nc{n}\" onclick=\"nc{n}_frame.location=\\'static/image/admincp/getcolor.htm?nc{n}|nc{n}_v\\';showMenu({\\'ctrlid\\':\\'nc{n}\\'})\" type=\"button\" class=\"colorwd\" value=\"\" style=\"background: \"><span id=\"nc{n}_menu\" style=\"display: none\"><iframe name=\"nc{n}_frame\" src=\"\" frameborder=\"0\" width=\"210\" height=\"148\" scrolling=\"no\"></iframe></span>'],\t\t\t\t\t\t\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_url[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,''],\r\n\t\t\t\t\t[1,'']\r\n\t\t\t\t]\r\n\t\t\t];\r\n\t\t</script>";
		} else {
			if ($_GET["comiis_sub"] == "mnav") {
				echo "<script type=\"text/JavaScript\">\r\n\t\t\tvar rowtypedata = [\r\n\t\t\t\t[\r\n\t\t\t\t\t[1,'', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" size=\"2\" name=\"new_displayor[]\" value=\"0\">', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_name[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_icon[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_bgcolor[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_url[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,''],\r\n\t\t\t\t\t[1,'']\r\n\t\t\t\t]\r\n\t\t\t];\r\n\t\t</script>";
			} else {
				if ($_GET["comiis_sub"] == "tnav") {
					echo "<script type=\"text/JavaScript\">\r\n\t\t\tvar rowtypedata = [\r\n\t\t\t\t[\r\n\t\t\t\t\t[1,'', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" size=\"2\" name=\"new_displayor[]\" value=\"0\">', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_name[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_url[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,''],\r\n\t\t\t\t\t[1,'']\r\n\t\t\t\t]\r\n\t\t\t];\r\n\t\t</script>";
				} else {
					if ($_GET["comiis_sub"] == "fnav") {
						echo "<script type=\"text/JavaScript\">\r\n\t\t\tvar rowtypedata = [\r\n\t\t\t\t[\r\n\t\t\t\t\t[1,'', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" size=\"2\" name=\"new_displayor[]\" value=\"0\">', 'td25'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_name[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_icon[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,'<input id=\"nc{n}_v\" type=\"text\" class=\"txt\" style=\"float:left;\" name=\"new_bgcolor[]\\ value=\"\" onchange=\"updatecolorpreview(\\'nc{n}\\')\"><input id=\"nc{n}\" onclick=\"nc{n}_frame.location=\\'static/image/admincp/getcolor.htm?nc{n}|nc{n}_v\\';showMenu({\\'ctrlid\\':\\'nc{n}\\'})\" type=\"button\" class=\"colorwd\" value=\"\" style=\"background: \"><span id=\"nc{n}_menu\" style=\"display: none\"><iframe name=\"nc{n}_frame\" src=\"\" frameborder=\"0\" width=\"210\" height=\"148\" scrolling=\"no\"></iframe></span>'],\t\t\t\t\t\t\r\n\t\t\t\t\t[1,'<input type=\"text\" class=\"txt\" name=\"new_url[]\" size=\"15\">'],\r\n\t\t\t\t\t[1,''],\r\n\t\t\t\t\t[1,'']\r\n\t\t\t\t]\r\n\t\t\t];\r\n\t\t</script>";
					}
				}
			}
		}
	}
	showformheader($plugin_url . "&comiis_sub=" . $_GET["comiis_sub"]);
	if ($_GET["comiis_sub"] == "fnav") {
		$comiis_value = DB::fetch_all("SELECT * FROM %t WHERE name in('comiis_fnav_date', 'comiis_fnav_title')", array("comiis_app_switch"), "name");
		showtableheader();
		showsetting($comiis_app_lang["139"], "comiis_app[comiis_fnav_date]", intval($comiis_value["comiis_fnav_date"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["139"]);
		showsetting($comiis_app_lang["140"], "comiis_app[comiis_fnav_title]", $comiis_value["comiis_fnav_title"]["value"], "text", '', '', $comiis_app_lang["02"] . $comiis_app_lang["140"]);
		showtablefooter();
	} else {
		if ($_GET["comiis_sub"] == "lnav") {
			$comiis_value = DB::fetch_all("SELECT * FROM %t WHERE name in('comiis_leftnv', 'comiis_leftnv_top', 'comiis_leftnv_user', 'comiis_leftnv_list')", array("comiis_app_switch"), "name");
			showtableheader();
			showsetting($comiis_app_lang["397"], array("comiis_app[comiis_leftnv]", array(array("0", $comiis_app_lang["398"]), array("1", $comiis_app_lang["399"]), array("2", $comiis_app_lang["400"])), true), intval($comiis_value["comiis_leftnv"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["397"]);
			showsetting($comiis_app_lang["401"], "comiis_app[comiis_leftnv_user]", intval($comiis_value["comiis_leftnv_user"]["value"]), "radio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["401"]);
			showsetting($comiis_app_lang["141"], array("comiis_app[comiis_leftnv_top]", array(array("0", $comiis_app_lang["142"]), array("1", $comiis_app_lang["143"])), true), intval($comiis_value["comiis_leftnv_top"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["141"]);
			showsetting($comiis_app_lang["144"], array("comiis_app[comiis_leftnv_list]", array(array("0", $comiis_app_lang["145"]), array("1", $comiis_app_lang["146"])), true), intval($comiis_value["comiis_leftnv_list"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["144"]);
			showtablefooter();
		} else {
			if ($_GET["comiis_sub"] == "ynav") {
				$comiis_value = DB::fetch_all("SELECT * FROM %t WHERE name in('comiis_scrolltop', 'comiis_scrolltop_ico', 'comiis_scrolltop_show', 'comiis_scrolltop_fenli', 'comiis_leftnv_back')", array("comiis_app_switch"), "name");
				showtableheader();
				showsetting($comiis_app_lang["203"], array("comiis_app[comiis_scrolltop]", array(array("0", $comiis_app_lang["204"]), array("1", $comiis_app_lang["205"]), array("2", $comiis_app_lang["206"])), true), intval($comiis_value["comiis_scrolltop"]["value"]), "mradio", '', '', $comiis_app_lang["264"]);
				showsetting($comiis_app_lang["416"], array("comiis_app[comiis_scrolltop_ico]", array(array("0", $comiis_app_lang["417"]), array("1", $comiis_app_lang["418"])), true), intval($comiis_value["comiis_scrolltop_ico"]["value"]), "mradio", '', '', $comiis_app_lang["02"] . $comiis_app_lang["416"]);
				showsetting($comiis_app_lang["419"], array("comiis_app[comiis_scrolltop_show]", array(array("0", $comiis_app_lang["420"]), array("1", $comiis_app_lang["421"])), true), intval($comiis_value["comiis_scrolltop_show"]["value"]), "mradio", '', '', $comiis_app_lang["422"]);
				showsetting($comiis_app_lang["423"], "comiis_app[comiis_scrolltop_fenli]", intval($comiis_value["comiis_scrolltop_fenli"]["value"]), "radio", '', '', $comiis_app_lang["424"]);
				showsetting($comiis_app_lang["522"], array("comiis_app[comiis_leftnv_back]", array(array("0", $comiis_app_lang["523"]), array("1", $comiis_app_lang["525"]), array("2", $comiis_app_lang["11"]))), intval($comiis_value["comiis_leftnv_back"]["value"]), "mradio", '', '', $comiis_app_lang["526"]);
				showtablefooter();
			}
		}
	}
	showtableheader($_GET["comiis_sub"] == "lnav" ? $comiis_app_lang["131"] : ($_GET["comiis_sub"] == "fnav" ? $comiis_app_lang["134"] : ($_GET["comiis_sub"] == "ynav" ? $comiis_app_lang["434"] . $comiis_app_lang["425"] : '')));
	if ($_GET["comiis_sub"] == "lnav") {
		showsubtitle(array('', "display_order", "name", $comiis_app_lang["147"], $comiis_app_lang["402"], "url", "type", "available"));
	} else {
		if ($_GET["comiis_sub"] == "mnav") {
			showsubtitle(array('', "display_order", "name", $comiis_app_lang["147"], $comiis_app_lang["148"], "url", "type", "available"));
		} else {
			if ($_GET["comiis_sub"] == "tnav") {
				showsubtitle(array('', "display_order", "name", "url", "type", "available"));
			} else {
				if ($_GET["comiis_sub"] == "fnav") {
					showsubtitle(array('', "display_order", "name", $comiis_app_lang["147"], $comiis_app_lang["149"], "url", "type", "available"));
				} else {
					if ($_GET["comiis_sub"] == "ynav") {
						showsubtitle(array('', "display_order", "name", $comiis_app_lang["147"], $comiis_app_lang["127"] . $comiis_app_lang["149"], "url", "type", "available"));
					}
				}
			}
		}
	}
	if (is_array($comiis_nav)) {
		$colorid = 0;
		foreach ($comiis_nav as $v) {
			$v["displayor"] = intval($v["displayor"]);
			$v["type"] = intval($v["type"]);
			$v["show"] = intval($v["show"]);
			$v["name"] = dhtmlspecialchars($v["name"]);
			$v["icon"] = dhtmlspecialchars($v["icon"]);
			$v["bgcolor"] = dhtmlspecialchars($v["bgcolor"]);
			$v["url"] = dhtmlspecialchars($v["url"]);
			if ($_GET["comiis_sub"] == "lnav") {
				$colorid = $colorid + 1;
				showtablerow('', array("class=\"td25\"", "class=\"td25\"", '', '', '', '', ''), array($v["type"] == 1 ? "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $v["navid"] . "\">" : "<input type=\"checkbox\" class=\\checkbox\" value=\"\" disabled=\"disabled\">", "<input type=\"text\" class=\"txt\" size=\"2\" name=\"nav_displayor[" . $v["navid"] . "]\" value=\"" . $v["displayor"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_name[" . $v["navid"] . "]\" value=\"" . $v["name"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_icon[" . $v["navid"] . "]\" value=\"" . $v["icon"] . "\">", "<input id=\"c" . $colorid . "_v\" type=\"text\" class=\"txt\" style=\"float:left;\" name=\"nav_bgcolor[" . $v["navid"] . "]\" value=\"" . $v["bgcolor"] . "\" onchange=\"updatecolorpreview('c" . $colorid . "')\">\n" . "<input id=\"c" . $colorid . "\" onclick=\"c" . $colorid . "_frame.location='static/image/admincp/getcolor.htm?c" . $colorid . "|c" . $colorid . "_v';showMenu({'ctrlid':'c" . $colorid . "'})\" type=\"button\" class=\"colorwd\" value=\"\" style=\"background:" . $v["bgcolor"] . ";\"><span id=\"c" . $colorid . "_menu\" style=\"display: none\"><iframe name=\"c" . $colorid . "_frame\" src=\"\" frameborder=\"0\" width=\"210\" height=\"148\" scrolling=\"no\"></iframe></span>\n", $v["type"] == 1 ? "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_url[" . $v["navid"] . "]\" value=\"" . $v["url"] . "\">" : ($v["type"] == 0 && ($v["url"] == ":comiis:" || substr($v["url"], 0, 11) == "javascript:") ? "###" : $v["url"]), $v["type"] == 1 ? $comiis_app_lang["150"] : $comiis_app_lang["151"], "<input class=\"checkbox\" type=\"checkbox\" name=\"nav_show[" . $v["navid"] . "]\" value=\"1\" " . ($v["show"] > 0 ? "checked" : '') . ">"));
			} else {
				if ($_GET["comiis_sub"] == "ynav") {
					$colorid = $colorid + 1;
					showtablerow('', array("class=\"td25\"", "class=\"td25\"", '', '', '', '', ''), array($v["type"] == 1 ? "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $v["navid"] . "\">" : "<input type=\"checkbox\" class=\\checkbox\" value=\"\" disabled=\"disabled\">", "<input type=\"text\" class=\"txt\" size=\"2\" name=\"nav_displayor[" . $v["navid"] . "]\" value=\"" . $v["displayor"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_name[" . $v["navid"] . "]\" value=\"" . $v["name"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_icon[" . $v["navid"] . "]\" value=\"" . $v["icon"] . "\">", "<input id=\"c" . $colorid . "_v\" type=\"text\" class=\"txt\" style=\"float:left;\" name=\"nav_bgcolor[" . $v["navid"] . "]\" value=\"" . $v["bgcolor"] . "\" onchange=\"updatecolorpreview('c" . $colorid . "')\">\n" . "<input id=\"c" . $colorid . "\" onclick=\"c" . $colorid . "_frame.location='static/image/admincp/getcolor.htm?c" . $colorid . "|c" . $colorid . "_v';showMenu({'ctrlid':'c" . $colorid . "'})\" type=\"button\" class=\"colorwd\" value=\"\" style=\"background:" . $v["bgcolor"] . ";\"><span id=\"c" . $colorid . "_menu\" style=\"display: none\"><iframe name=\"c" . $colorid . "_frame\" src=\"\" frameborder=\"0\" width=\"210\" height=\"148\" scrolling=\"no\"></iframe></span>\n", $v["type"] == 1 ? "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_url[" . $v["navid"] . "]\" value=\"" . $v["url"] . "\">" : ($v["type"] == 0 && ($v["url"] == ":comiis:" || substr($v["url"], 0, 11) == "javascript:") ? "###" : $v["url"]), $v["type"] == 1 ? $comiis_app_lang["150"] : $comiis_app_lang["151"], "<input class=\"checkbox\" type=\"checkbox\" name=\"nav_show[" . $v["navid"] . "]\" value=\"1\" " . ($v["show"] > 0 ? "checked" : '') . ">"));
				} else {
					if ($_GET["comiis_sub"] == "mnav") {
						showtablerow('', array("class=\"td25\"", "class=\"td25\"", '', '', '', '', ''), array($v["type"] == 1 ? "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $v["navid"] . "\">" : "<input type=\"checkbox\" class=\\checkbox\" value=\"\" disabled=\"disabled\">", "<input type=\"text\" class=\"txt\" size=\"2\" name=\"nav_displayor[" . $v["navid"] . "]\" value=\"" . $v["displayor"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_name[" . $v["navid"] . "]\" value=\"" . $v["name"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_icon[" . $v["navid"] . "]\" value=\"" . $v["icon"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_bgcolor[" . $v["navid"] . "]\" value=\"" . $v["bgcolor"] . "\">", $v["type"] == 1 ? "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_url[" . $v["navid"] . "]\" value=\"" . $v["url"] . "\">" : ($v["type"] == 0 && ($v["url"] == ":comiis:" || substr($v["url"], 0, 11) == "javascript:") ? "###" : $v["url"]), $v["type"] == 1 ? $comiis_app_lang["150"] : $comiis_app_lang["151"], "<input class=\"checkbox\" type=\"checkbox\" name=\"nav_show[" . $v["navid"] . "]\" value=\"1\" " . ($v["show"] > 0 ? "checked" : '') . ">"));
					} else {
						if ($_GET["comiis_sub"] == "tnav") {
							showtablerow('', array("class=\"td25\"", "class=\"td25\"", '', '', '', '', ''), array($v["type"] == 1 ? "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $v["navid"] . "\">" : "<input type=\"checkbox\" class=\\checkbox\" value=\"\" disabled=\"disabled\">", "<input type=\"text\" class=\"txt\" size=\"2\" name=\"nav_displayor[" . $v["navid"] . "]\" value=\"" . $v["displayor"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_name[" . $v["navid"] . "]\" value=\"" . $v["name"] . "\">", $v["type"] == 1 ? "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_url[" . $v["navid"] . "]\" value=\"" . $v["url"] . "\">" : ($v["type"] == 0 && ($v["url"] == ":comiis:" || substr($v["url"], 0, 11) == "javascript:") ? "###" : $v["url"]), $v["type"] == 1 ? $comiis_app_lang["150"] : $comiis_app_lang["151"], "<input class=\"checkbox\" type=\"checkbox\" name=\"nav_show[" . $v["navid"] . "]\" value=\"1\" " . ($v["show"] > 0 ? "checked" : '') . ">"));
						} else {
							if ($_GET["comiis_sub"] == "fnav") {
								$colorid = $colorid + 1;
								showtablerow('', array("class=\"td25\"", "class=\"td25\"", '', '', '', '', ''), array($v["type"] == 1 ? "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $v["navid"] . "\">" : "<input type=\"checkbox\" class=\\checkbox\" value=\"\" disabled=\"disabled\">", "<input type=\"text\" class=\"txt\" size=\"2\" name=\"nav_displayor[" . $v["navid"] . "]\" value=\"" . $v["displayor"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_name[" . $v["navid"] . "]\" value=\"" . $v["name"] . "\">", "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_icon[" . $v["navid"] . "]\" value=\"" . $v["icon"] . "\">", "<input id=\"c" . $colorid . "_v\" type=\"text\" class=\"txt\" style=\"float:left;\" name=\"nav_bgcolor[" . $v["navid"] . "]\" value=\"" . $v["bgcolor"] . "\" onchange=\"updatecolorpreview('c" . $colorid . "')\">\n" . "<input id=\"c" . $colorid . "\" onclick=\"c" . $colorid . "_frame.location='static/image/admincp/getcolor.htm?c" . $colorid . "|c" . $colorid . "_v';showMenu({'ctrlid':'c" . $colorid . "'})\" type=\"button\" class=\"colorwd\" value=\"\" style=\"background:" . $v["bgcolor"] . ";\"><span id=\"c" . $colorid . "_menu\" style=\"display: none\"><iframe name=\"c" . $colorid . "_frame\" src=\"\" frameborder=\"0\" width=\"210\" height=\"148\" scrolling=\"no\"></iframe></span>\n", $v["type"] == 1 ? "<input type=\"text\" class=\"txt\" size=\"15\" name=\"nav_url[" . $v["navid"] . "]\" value=\"" . $v["url"] . "\">" : ($v["type"] == 0 && ($v["url"] == ":comiis:" || substr($v["url"], 0, 11) == "javascript:") ? "###" : $v["url"]), $v["type"] == 1 ? $comiis_app_lang["150"] : $comiis_app_lang["151"], "<input class=\"checkbox\" type=\"checkbox\" name=\"nav_show[" . $v["navid"] . "]\" value=\"1\" " . ($v["show"] > 0 ? "checked" : '') . ">"));
							}
						}
					}
				}
			}
		}
	}
	echo "<tr><td colspan=\"1\"></td><td colspan=\"7\"><div><a href=\"###\" onclick=\"addrow(this, 0, 0)\" class=\"addtr\">" . $comiis_app_lang["152"] . "</a></div></td></tr>";
	showsubmit("comiis_navsubmit", "submit", "del", '');
	showtablefooter();
	showformfooter();
	echo "</div></div>";
} else {
	if (!in_array($_GET["comiis_sub"], array("lnav", "mnav", "tnav", "fnav", "ynav"))) {
		cpmsg($comiis_app_lang["65"], '', "error", array(), '', 0);
	} else {
		$navtype = $_GET["comiis_sub"];
	}
	if ($ids = dimplode($_GET["delete"])) {
		DB::query("DELETE FROM " . DB::table("comiis_app_nav") . " WHERE " . DB::field("navid", $_GET["delete"]));
	}
	if (is_array($_GET["nav_name"])) {
		foreach ($_GET["nav_name"] as $id => $v) {
			$id = intval($id);
			$displayor = intval($_GET["nav_displayor"][$id]);
			$name = trim(dhtmlspecialchars($_GET["nav_name"][$id]));
			$icon = $navtype == "tnav" ? '' : trim(dhtmlspecialchars($_GET["nav_icon"][$id]));
			$bgcolor = $navtype == "fnav" || $navtype == "mnav" || $navtype == "lnav" || $navtype == "ynav" ? trim(dhtmlspecialchars($_GET["nav_bgcolor"][$id])) : '';
			$show = !empty($_GET["nav_show"][$id]) ? 1 : 0;
			$postdata = array("displayor" => $displayor, "name" => $name, "icon" => $icon, "bgcolor" => $bgcolor, "show" => $show);
			if (!empty($_GET["nav_url"][$id])) {
				$url = str_replace(array("&amp;"), array("&"), dhtmlspecialchars($_GET["nav_url"][$id]));
				$postdata["url"] = $url;
			}
			DB::update("comiis_app_nav", $postdata, DB::field("navid", $id) . " AND " . DB::field("navtype", $navtype));
		}
	}
	if (is_array($_GET["new_name"])) {
		foreach ($_GET["new_name"] as $id => $v) {
			if (strlen($_GET["new_name"][$id])) {
				$displayor = intval($_GET["new_displayor"][$id]);
				$name = trim(dhtmlspecialchars($_GET["new_name"][$id]));
				$icon = $navtype == "tnav" ? '' : trim(dhtmlspecialchars($_GET["new_icon"][$id]));
				$bgcolor = $navtype == "fnav" || $navtype == "mnav" ? trim(dhtmlspecialchars($_GET["new_bgcolor"][$id])) : '';
				$url = str_replace(array("&amp;"), array("&"), dhtmlspecialchars($_GET["new_url"][$id]));
				$postdata = array("displayor" => $displayor, "name" => $name, "icon" => $icon, "bgcolor" => $bgcolor, "url" => $url, "navtype" => $navtype, "type" => "1");
				if ($url != '') {
					$postdata["show"] = 1;
				}
				DB::insert("comiis_app_nav", $postdata);
			}
		}
	}
	if ($_GET["comiis_sub"] == "fnav") {
		$comiis_get = array("comiis_fnav_date" => intval($_GET["comiis_app"]["comiis_fnav_date"]), "comiis_fnav_title" => trim(dhtmlspecialchars($_GET["comiis_app"]["comiis_fnav_title"])));
		comiis_app_updates($comiis_get);
	} else {
		if ($_GET["comiis_sub"] == "lnav") {
			$comiis_get = array("comiis_leftnv" => intval($_GET["comiis_app"]["comiis_leftnv"]), "comiis_leftnv_user" => intval($_GET["comiis_app"]["comiis_leftnv_user"]), "comiis_leftnv_top" => intval($_GET["comiis_app"]["comiis_leftnv_top"]), "comiis_leftnv_list" => intval($_GET["comiis_app"]["comiis_leftnv_list"]));
			comiis_app_updates($comiis_get);
		} else {
			if ($_GET["comiis_sub"] == "ynav") {
				$comiis_get = array("comiis_scrolltop" => intval($_GET["comiis_app"]["comiis_scrolltop"]), "comiis_scrolltop_ico" => intval($_GET["comiis_app"]["comiis_scrolltop_ico"]), "comiis_scrolltop_show" => intval($_GET["comiis_app"]["comiis_scrolltop_show"]), "comiis_scrolltop_fenli" => intval($_GET["comiis_app"]["comiis_scrolltop_fenli"]), "comiis_leftnv_back" => intval($_GET["comiis_app"]["comiis_leftnv_back"]));
				comiis_app_updates($comiis_get);
			}
		}
	}
	comiis_app_up_nav();
	cpmsg($comiis_app_lang["64"], "action=" . $plugin_url . "&comiis_sub=" . $navtype, "succeed", array(), '', 0);
}