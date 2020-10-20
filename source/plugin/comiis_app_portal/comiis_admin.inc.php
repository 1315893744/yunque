<?php

function comiis_app_portal_read_dir_list()
{
	global $comiis_portal;
	global $comiis_config;
	global $comiis_portal_lang;
	$_var_3 = array();
	$_var_4 = DISCUZ_ROOT . "./source/plugin/comiis_app_portal/comiis";
	$_var_5 = dir($_var_4);
	$comiis_portal = $comiis_portal_lang = array();
	while ($_var_6 = $_var_5->read()) {
		if ($_var_6 != "." && $_var_6 != ".." && preg_match("/^\\w+\$/", $_var_6) && strlen($_var_6) < 20 && is_dir($_var_4 . "/" . $_var_6) && is_file($_var_4 . "/" . $_var_6 . "/comiis_config.php")) {
			$comiis_config = $comiis_portal_lang = '';
			if (is_file($_var_4 . "/" . $_var_6 . "/language/language_" . currentlang() . ".php")) {
				$comiis_portal_lang = array();
				include_once libfile("language/" . currentlang(), "plugin/comiis_app_portal/comiis/" . $_var_6);
				$comiis_portal = array_merge($comiis_portal, $comiis_portal_lang);
			}
			include $_var_4 . "/" . $_var_6 . "/comiis_config.php";
			$comiis_config = daddslashes($comiis_config);
			if ($comiis_config["dir"] == $_var_6) {
				if ($comiis_config["version"] > 1 && intval($comiis_config["types"])) {
					$_var_3[$_var_6] = $comiis_config;
				}
			}
		}
	}
	return $_var_3;
}
if (!defined("IN_DISCUZ") || !defined("IN_ADMINCP")) {
	echo "Access Denied";
	return 0;
}
$_var_0 = "comiis_app_portal";
global $_G;
global $comiis_app_portal_time;
global $comiis_app_portal_info;
global $comiis_blockclass;
global $comiis_app_portal_type;
global $comiis_app_portal_lang;
global $pluginid;
global $plugin;
global $comiis_portal;
global $comiis_config;
global $comiis_portal_lang;
global $comiis_liststyle_config;
loadcache("comiis_app_portal_key");
require DISCUZ_ROOT . "./source/plugin/comiis_app_portal/language/language." . currentlang() . ".php";
if (empty($_GET["comiis_sub"]) || !in_array($_GET["comiis_sub"], array("page", "block", "import"))) {
	$_GET["comiis_sub"] = "page";
}
$_var_15 = DISCUZ_ROOT . "./source/plugin/comiis_app_portal/comiis";
$_var_16 = "plugins&operation=config&do=" . $pluginid . "&identifier=" . $plugin["identifier"] . "&pmod=comiis_admin";
if ($_GET["comiis_sub"] == "import") {
	if (!submitcheck("comiis_submit")) {
		showformheader($_var_16 . "&comiis_sub=import", "enctype");
		showtableheader();
		showtitle($comiis_app_portal_lang["129"]);
		showsetting($comiis_app_portal_lang["261"], "file", '', "file", '', 0, $comiis_app_portal_lang["260"]);
		showsubmit("comiis_submit", "submit");
		showtablefooter();
		showformfooter();
	} else {
		if ($_FILES["file"]["type"] == "text/xml" && $_FILES["file"]["error"] == "0") {
			$_var_18 = @implode('', file($_FILES["file"]["tmp_name"]));
			require_once libfile("class/xml");
			$_var_19 = xml2array($_var_18);
			if ($_var_19["page"]["id"]) {
				$_var_20 = $_var_19["page"]["id"];
				unset($_var_19["page"]["id"]);
				$_var_19["page"]["dateline"] = $_G["timestamp"];
				$_var_19["page"]["default"] = 0;
				DB::insert("comiis_app_portal_page", $_var_19["page"]);
				$_var_21 = DB::insert_id();
				if (is_array($_var_19["diydata"])) {
					$_var_22 = array();
					if (is_array($_var_19["diy"])) {
						require_once libfile("function/portalcp");
						require_once libfile("function/block");
						$_var_19["diy"]["block"][0]["username"] = $_G["username"];
						$_var_19["diy"]["block"][0]["uid"] = $_G["uid"];
						$_var_23 = block_import($_var_19["diy"]);
						block_get_batch($_var_23);
						foreach ($_var_23 as $_var_24 => $_var_25) {
							block_updatecache($_var_25, 1);
							$_var_22[$_var_24] = $_var_25;
						}
					}
					foreach ($_var_19["diydata"] as $_var_18) {
						unset($_var_18["id"]);
						$_var_18["pid"] = $_var_21;
						$_var_18["bid"] = 0;
						$_var_18["diyid"] = $_var_22[$_var_18["diyid"]];
						DB::insert("comiis_app_portal_diy", $_var_18);
					}
				}
				cpmsg($comiis_app_portal_lang["259"], "action=" . $_var_16 . "&comiis_sub=page", "succeed", array(), '', 0);
				include DISCUZ_ROOT . "./source/plugin/comiis_app_portal/include/comiis_app_portal_c.php";
				comiis_app_portal_html($_var_21);
			} else {
				cpmsg($comiis_app_portal_lang["258"], '', "error");
			}
		} else {
			cpmsg($comiis_app_portal_lang["257"], '', "error");
		}
	}
} else {
	if ($_GET["comiis_sub"] == "page") {
		if ($_GET["comiis_do"] == "edit") {
			$_var_26 = intval($_GET["editid"]);
			if ($_var_26) {
				$_var_18 = DB::fetch_first("SELECT * FROM %t WHERE id='%d'", array("comiis_app_portal_page", $_var_26));
				if ($_var_26 == $_var_18["id"]) {
					if (!submitcheck("comiis_submit")) {
						$_var_27 = (array) dunserialize($_var_18["moresetup"]);
						$_var_18["open_post"] = intval($_var_27["open_post"]) ? intval($_var_27["open_post"]) : 0;
						$_var_18["open_displayorder"] = intval($_var_27["open_displayorder"]) ? intval($_var_27["open_displayorder"]) : 0;
						$_var_18["open_video"] = intval($_var_27["open_video"]) ? intval($_var_27["open_video"]) : 0;
						$_var_18["open_color"] = intval($_var_27["open_color"]) ? intval($_var_27["open_color"]) : 0;
						$_var_28 = DB::fetch_first("SELECT t.directory FROM %t s LEFT JOIN %t t ON s.templateid = t.templateid WHERE s.styleid='%d'", array("common_style", "common_template", $_G["setting"]["styleid2"]));
						$_var_29 = $_var_28["directory"] == "./template/comiis_app" ? '' : "disabled";
						include_once libfile("function/forumlist");
						echo "<style>.comiis_app_portal_tit {height:30px;line-height:30px;background:#f2f9fd;color:#2366a8;padding:5px 10px;margin-bottom:-9px;overflow:hidden;}</style><div class=\"comiis_app_portal_tit\"><a href=\"" . ADMINSCRIPT . "?action=" . $_var_16 . "&comiis_sub=page\">" . $comiis_app_portal_lang["01"] . "</a> &gt; [" . $_var_18["name"] . "] " . $comiis_app_portal_lang["02"] . "</div>";
						showformheader($_var_16 . "&comiis_sub=page&comiis_do=edit&editid=" . $_var_26);
						showtableheader();
						showsetting($comiis_app_portal_lang["04"], "name", $_var_18["name"], "text", '', '', $comiis_app_portal_lang["98"]);
						showsetting($comiis_app_portal_lang["116"], "uptime", $_var_18["uptime"], "text", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["116"]);
						showsetting($comiis_app_portal_lang["123"], "image", $_var_18["image"], "text", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["123"]);
						showsetting($comiis_app_portal_lang["266"], "title", $_var_18["title"], "text", '', '', $comiis_app_portal_lang["267"]);
						showsetting($comiis_app_portal_lang["122"], "description", $_var_18["description"], "text", '', '', $comiis_app_portal_lang["05"]);
						showsetting("keywords", "keywords", $_var_18["keywords"], "text", '', '', $comiis_app_portal_lang["06"]);
						showsetting($comiis_app_portal_lang["96"], "comiisheader", $_var_29 ? 0 : intval($_var_18["comiisheader"]), "radio", $_var_29, '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["97"]);
						showtitle($comiis_app_portal_lang["132"]);
						showsetting($comiis_app_portal_lang["03"], "header", intval($_var_18["header"]), "radio", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["03"]);
						showsetting($comiis_app_portal_lang["13"], "rekey", intval($_var_18["rekey"]), "radio", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["13"] . $comiis_app_portal_lang["134"]);
						showsetting($comiis_app_portal_lang["131"], "icon2", $_var_18["icon2"], "text", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["131"] . $comiis_app_portal_lang["114"]);
						showsetting($comiis_app_portal_lang["14"], "rekeyurl", $_var_18["rekeyurl"], "text", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["14"] . $comiis_app_portal_lang["121"]);
						showsetting($comiis_app_portal_lang["268"], "openre", intval($_var_18["openre"]), "radio", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["268"] . $comiis_app_portal_lang["115"]);
						showsetting($comiis_app_portal_lang["112"], "icon", $_var_18["icon"], "text", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["112"] . $comiis_app_portal_lang["114"]);
						showsetting($comiis_app_portal_lang["113"], "icon_url", $_var_18["icon_url"], "text", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["113"]);
						showtitle($comiis_app_portal_lang["130"]);
						showsetting($comiis_app_portal_lang["119"], "open_color", intval($_var_18["open_color"]), "radio", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["119"] . $comiis_app_portal_lang["120"]);
						showsetting($comiis_app_portal_lang["07"], "color", $_var_18["color"], "color", '', '', $comiis_app_portal_lang["08"]);
						showsetting($comiis_app_portal_lang["09"], "bgcolor", $_var_18["bgcolor"], "color", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["09"]);
						showsetting($comiis_app_portal_lang["124"], "hcolor", $_var_18["hcolor"], "color", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["124"]);
						showsetting($comiis_app_portal_lang["11"], "css", $_var_18["css"], "textarea", '', '', $comiis_app_portal_lang["12"]);
						showtitle($comiis_app_portal_lang["276"]);
						showsetting($comiis_app_portal_lang["15"], array("loadforum", array(array("1", $comiis_app_portal_lang["274"], array("loadforum_nos" => '')), array("0", $comiis_app_portal_lang["275"], array("loadforum_nos" => "none"))), true), intval($_var_18["loadforum"]), "mradio", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["15"]);
						showtagheader("tbody", "loadforum_nos", intval($_var_18["loadforum"]) ? true : false, "sub");
						$_var_30 = "<select name=\"fids[]\" multiple=\"multiple\" size=\"10\"><option value=\"\">" . $comiis_app_portal_lang["16"] . "</option>" . forumselect(false, 0, 0, true) . "</select>";
						foreach ((array) dunserialize($_var_18["fids"]) as $_var_31) {
							$_var_30 = str_replace("<option value=\"" . $_var_31 . "\">", "<option value=\"" . $_var_31 . "\" selected>", $_var_30);
						}
						showsetting($comiis_app_portal_lang["17"], '', '', $_var_30, '', '', $comiis_app_portal_lang["18"]);
						showsetting($comiis_app_portal_lang["19"], '', '', "<select name=\"pl\">\r\n\t\t\t\t\t\t\t\t\t<option value=\"lastpost\"" . ($_var_18["pl"] == "lastpost" ? " selected=\"selected\"" : '') . ">" . $comiis_app_portal_lang["20"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"dateline\"" . ($_var_18["pl"] == "dateline" ? " selected=\"selected\"" : '') . ">" . $comiis_app_portal_lang["21"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"replies\"" . ($_var_18["pl"] == "replies" ? " selected=\"selected\"" : '') . ">" . $comiis_app_portal_lang["22"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"views\"" . ($_var_18["pl"] == "views" ? " selected=\"selected\"" : '') . ">" . $comiis_app_portal_lang["23"] . "</option>\r\n\t\t\t\t\t\t\t\t</select>", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["19"]);
						showsetting($comiis_app_portal_lang["24"], '', '', "<select name=\"times\">\r\n\t\t\t\t\t\t\t\t\t<option value=\"0\"" . ($_var_18["times"] == "0" ? " selected=\"selected\"" : '') . ">" . $comiis_app_portal_lang["25"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"86400\"" . ($_var_18["times"] == "86400" ? " selected=\"selected\"" : '') . ">24" . $comiis_app_portal_lang["26"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"604800\"" . ($_var_18["times"] == "604800" ? " selected=\"selected\"" : '') . ">7" . $comiis_app_portal_lang["27"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"2592000\"" . ($_var_18["times"] == "2592000" ? " selected=\"selected\"" : '') . ">1" . $comiis_app_portal_lang["28"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"7776000\"" . ($_var_18["times"] == "7776000" ? " selected=\"selected\"" : '') . ">3" . $comiis_app_portal_lang["28"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"15552000\"" . ($_var_18["times"] == "15552000" ? " selected=\"selected\"" : '') . ">" . $comiis_app_portal_lang["29"] . "</option>\r\n\t\t\t\t\t\t\t\t\t<option value=\"31104000\"" . ($_var_18["times"] == "31104000" ? " selected=\"selected\"" : '') . ">" . $comiis_app_portal_lang["30"] . "</option>\r\n\t\t\t\t\t\t\t\t</select>", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["24"]);
						showsetting($comiis_app_portal_lang["31"], "tids", $_var_18["tids"], "text", '', '', $comiis_app_portal_lang["32"]);
						showsetting($comiis_app_portal_lang["33"], "num", $_var_18["num"], "text", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["33"]);
						showsetting($comiis_app_portal_lang["34"], "pages", $_var_18["pages"], "text", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["34"]);
						showsetting($comiis_app_portal_lang["35"], "comiispages", intval($_var_18["comiispages"]), "radio", '', '', $comiis_app_portal_lang["36"]);
						showsetting($comiis_app_portal_lang["269"], "isimage", intval($_var_18["isimage"]), "radio", '', '', $comiis_app_portal_lang["270"]);
						showsetting($comiis_app_portal_lang["117"], "open_displayorder", intval($_var_18["open_displayorder"]), "radio", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["117"]);
						showsetting($comiis_app_portal_lang["118"], "open_video", intval($_var_18["open_video"]), "radio", '', '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["118"]);
						showtagfooter("tbody");
						showtitle($comiis_app_portal_lang["37"] . ($_var_29 ? "<font style=\"color:red\"> " . $comiis_app_portal_lang["38"] . "</font>" : ''));
						showsetting($comiis_app_portal_lang["40"], "comiisfooter", $_var_29 ? 0 : intval($_var_18["comiisfooter"]), "radio", $_var_29, '', $comiis_app_portal_lang["41"]);
						showsetting($comiis_app_portal_lang["133"], "open_post", $_var_29 ? 0 : intval($_var_18["open_post"]), "radio", $_var_29, '', '');
						$_var_32 = '';
						if (!$_var_29) {
							include DISCUZ_ROOT . "./source/plugin/comiis_app/language/language." . currentlang() . ".php";
							if (is_array($comiis_liststyle_config)) {
								foreach ($comiis_liststyle_config as $_var_33 => $_var_31) {
									$_var_32 = $_var_32 . ("<option value=\"" . $_var_33 . "\" " . (intval($_var_18["comiisstyle"]) == $_var_33 ? "selected" : '') . ">" . $_var_31["name"] . "</option>");
								}
							}
						}
						$_var_34 = "<select name=\"comiisstyle\"" . $_var_29 . "><option value=\"0\"" . (intval($_var_18["comiisstyle"]) == 0 ? "selected" : '') . ">" . $comiis_app_portal_lang["42"] . "</option>" . $_var_32 . "</select>";
						showsetting($comiis_app_portal_lang["43"], '', '', $_var_34, $_var_29, '', $comiis_app_portal_lang["00"] . $comiis_app_portal_lang["43"]);
						showsubmit("comiis_submit", "submit");
						showtablefooter();
						showformfooter();
					} else {
						$_var_35 = trim($_GET["name"]);
						$_var_36 = trim(dhtmlspecialchars($_GET["description"]));
						$_var_37 = trim(dhtmlspecialchars($_GET["title"]));
						$_var_38 = trim(dhtmlspecialchars($_GET["keywords"]));
						$_var_39 = intval($_GET["loadforum"]);
						$_var_40 = intval($_GET["header"]);
						$_var_41 = trim(dhtmlspecialchars($_GET["color"]));
						$_var_42 = trim(dhtmlspecialchars($_GET["bgcolor"]));
						$_var_43 = trim(dhtmlspecialchars($_GET["fontcolor"]));
						$_var_44 = trim(dhtmlspecialchars($_GET["hcolor"]));
						$_var_45 = trim(dhtmlspecialchars($_GET["css"]));
						$_var_46 = intval($_GET["rekey"]);
						$_var_47 = trim(dhtmlspecialchars($_GET["rekeyurl"]));
						$_var_48 = intval($_GET["openre"]);
						$_var_49 = intval($_GET["comiisheader"]);
						$_var_50 = intval($_GET["comiisfooter"]);
						$_var_51 = trim(dhtmlspecialchars($_GET["comiisstyle"]));
						$_var_52 = intval($_GET["isimage"]) ? 1 : 0;
						$_var_53 = trim(dhtmlspecialchars($_GET["image"]));
						$_var_54 = trim($_GET["icon"]);
						$_var_55 = trim($_GET["icon2"]);
						$_var_56 = trim(dhtmlspecialchars($_GET["icon_url"]));
						$_var_57 = intval($_GET["uptime"]);
						$_var_58 = intval($_GET["open_displayorder"]) ? 1 : 0;
						$_var_59 = intval($_GET["open_video"]) ? 1 : 0;
						$_var_60 = intval($_GET["open_color"]) ? 1 : 0;
						$_var_61 = intval($_GET["open_post"]);
						$_var_27 = serialize(array("open_displayorder" => $_var_58, "open_video" => $_var_59, "open_color" => $_var_60, "open_post" => $_var_61));
						if (is_array($_GET["fids"])) {
							$_var_62 = serialize($_GET["fids"]);
						}
						$_var_63 = trim(dhtmlspecialchars($_GET["pl"]));
						$_var_64 = intval($_GET["times"]);
						$_var_65 = intval($_GET["num"]);
						$_var_66 = intval($_GET["pages"]);
						$_var_67 = intval($_GET["comiispages"]);
						$_var_68 = trim(dhtmlspecialchars($_GET["tids"]));
						DB::update("comiis_app_portal_page", array("name" => $_var_35, "title" => $_var_37, "description" => $_var_36, "keywords" => $_var_38, "loadforum" => $_var_39, "header" => $_var_40, "color" => $_var_41, "bgcolor" => $_var_42, "fontcolor" => $_var_43, "css" => $_var_45, "rekey" => $_var_46, "rekeyurl" => $_var_47, "openre" => $_var_48, "comiisheader" => $_var_49, "comiisfooter" => $_var_50, "comiisstyle" => $_var_51, "fids" => $_var_62, "tids" => $_var_68, "pl" => $_var_63, "times" => $_var_64, "num" => $_var_65, "pages" => $_var_66, "comiispages" => $_var_67, "isimage" => $_var_52, "hcolor" => $_var_44, "image" => $_var_53, "icon" => $_var_54, "icon2" => $_var_55, "icon_url" => $_var_56, "uptime" => $_var_57, "moresetup" => $_var_27), DB::field("id", $_var_26));
						cpmsg($comiis_app_portal_lang["44"], "action=" . $_var_16 . "&comiis_sub=page&comiis_do=edit&editid=" . $_var_26, "succeed", array(), '', 0);
						include DISCUZ_ROOT . "./source/plugin/comiis_app_portal/include/comiis_app_portal_c.php";
						comiis_app_portal_html($_var_26);
					}
				} else {
					cpmsg($comiis_app_portal_lang["45"], '', "error", array(), '', 0);
				}
			} else {
				cpmsg($comiis_app_portal_lang["45"], '', "error", array(), '', 0);
			}
		} else {
			if ($_GET["comiis_do"] == "edit_page") {
				if (!submitcheck("comiis_submit")) {
					$_var_69 = intval($_GET["editid"]);
					$_var_70 = DB::fetch_first("SELECT * FROM %t WHERE id='%d'", array("comiis_app_portal_page", $_var_69));
					if ($_var_69 == $_var_70["id"]) {
						$_var_71 = DB::fetch_all("SELECT t.*,b.name as names,b.blockclass FROM `%t` t LEFT JOIN `%t` b ON b.bid=t.diyid WHERE pid='" . $_var_70["id"] . "' ORDER BY displayorder, id DESC", array("comiis_app_portal_diy", "common_block"));
						echo "<form name=\"diyform\" id=\"diyform\"><input type=\"hidden\" name=\"template\" value=\"\" /></form><script>var drag = {blockForceUpdate: function(a){var bid = a.replace('portal_block_', '');ajaxget('portal.php?mod=portalcp&ac=block&op=getblock&forceupdate=1&inajax=1&bid='+bid+'&from=cp');},setClose: function(){hideWindow('showblock');}};disallowfloat = '';</script><script type=\"text/javascript\" src=\"" . $_G[setting][jspath] . "portal.js?{VERHASH}\"></script><style>#li_style{display:none}.comiis_app_portal_tit {height:30px;line-height:30px;background:#f2f9fd;color:#2366a8;padding:5px 10px;margin-bottom:-9px;overflow:hidden;}</style>" . "<div class=\"comiis_app_portal_tit\"><a href=\"" . ADMINSCRIPT . "?action=" . $_var_16 . "&comiis_sub=page\">" . $comiis_app_portal_lang["01"] . "</a> &gt; [" . $_var_70["name"] . "] " . $comiis_app_portal_lang["46"] . " <a href=\"plugin.php?id=comiis_app_portal&pid=" . $_var_69 . "\" target=\"_blank\" style=\"color:#d00;padding-left:20px;\">[" . $comiis_app_portal_lang["47"] . "]</a></div>";
						showformheader($_var_16 . "&comiis_sub=page&comiis_do=edit_page&editid=" . $_var_69);
						showtableheader();
						showsubtitle(array('', "display_order", $comiis_app_portal_lang["48"], $comiis_app_portal_lang["49"], "type", "available", ''));
						if (is_array($_var_71)) {
							$_var_72 = array();
							foreach ($_var_71 as $_var_31) {
								if (preg_match("/^\\w+\$/", $_var_31["dir"]) && strlen($_var_31["dir"]) < 20 && is_dir($_var_15 . "/" . $_var_31["dir"]) && is_file($_var_15 . "/" . $_var_31["dir"] . "/comiis_config.php")) {
									if ($_var_31["blocknone"] == 1) {
										DB::update("comiis_app_portal_diy", array("blocknone" => 0), DB::field("id", $_var_31["id"]));
									}
								} else {
									if ($_var_31["blocknone"] == 0) {
										DB::update("comiis_app_portal_diy", array("blocknone" => 1), DB::field("id", $_var_31["id"]));
										$_var_31["blocknone"] = 1;
									}
								}
								if ($_var_31["type"] == "footer") {
									$_var_72[] = $_var_31;
								} else {
									$_var_73 = $_var_31["type"] == "plugin" ? $_var_31["type"] : $_var_31["blockclass"];
									showtablerow('', array("class=\"td25\"", "class=\"td25\"", '', '', '', '', "width=\"200\""), array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $_var_31["id"] . "\">", "<input type=\"text\" class=\"txt\" size=\"2\" name=\"displayorder[" . $_var_31["id"] . "]\" value=\"" . $_var_31["displayorder"] . "\">", $_var_31["type"] == "plugin" ? $_var_31["name"] : $_var_31["names"], $_var_31["type"] == "plugin" ? $comiis_blockclass[$_var_31["type"]] : $_var_31["name"], $comiis_blockclass[$_var_73] ? $comiis_blockclass[$_var_73] : $comiis_blockclass["err"], "<input class=\"checkbox\" type=\"checkbox\" name=\"show[" . $_var_31["id"] . "]\" value=\"1\" " . ($_var_31["show"] > 0 && $_var_31["blocknone"] == 0 ? " checked" : '') . ($_var_31["blocknone"] == 1 ? " disabled=\"disabled\"" : '') . ">", $_var_31["blocknone"] == 1 ? "<font style=\"color:red\">" . $comiis_app_portal_lang["50"] . "</font>" : "<a href=\"javascript:;\" onclick=\"zoom(this, './source/plugin/comiis_app_portal/comiis/" . $_var_31["dir"] . "/comiis_img.jpg', 1)\">" . $comiis_app_portal_lang["51"] . "</a> &nbsp;" . ($_var_31["type"] == "plugin" ? '' : "\r\n\t\t\t\t\t\t\t\t\t\t<a href=\"portal.php?mod=portalcp&ac=block&op=block&bid=" . $_var_31["diyid"] . "&from=cp\" onclick=\"showWindow('showblock',this.href);return false;\">" . $comiis_app_portal_lang["52"] . "</a> &nbsp;\r\n\t\t\t\t\t\t\t\t\t\t<a href=\"portal.php?mod=portalcp&ac=block&op=data&bid=" . $_var_31["diyid"] . "&from=cp\" onclick=\"showWindow('showblock',this.href);return false;\">" . $comiis_app_portal_lang["53"] . "</a> &nbsp;\r\n\t\t\t\t\t\t\t\t\t\t") . "<a href=\"plugin.php?id=comiis_app_portal&style=yes&editid=" . $_var_31["id"] . "\" onclick=\"showWindow('showstyle',this.href);return false;\">" . $comiis_app_portal_lang["54"] . "</a> &nbsp;" . ($_var_31["type"] == "plugin" ? '' : "\r\n\t\t\t\t\t\t\t\t\t\t<a href=\"portal.php?mod=portalcp&ac=block&op=getblock&forceupdate=1&inajax=1&bid=" . $_var_31["diyid"] . "&from=cp\" onclick=\"ajaxget(this.href,'','','','',function(){location.reload();});return false;\">" . $comiis_app_portal_lang["55"] . "</a>")));
								}
							}
							foreach ($_var_72 as $_var_31) {
								showtablerow('', array("class=\"td25\"", "class=\"td25\"", '', '', '', '', "width=\"200\""), array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $_var_31["id"] . "\">", "<input type=\"text\" class=\"txt\" size=\"2\" name=\"displayorder[" . $_var_31["id"] . "]\" value=\"99999\">", $_var_31["type"] == "plugin" ? $_var_31["name"] : $_var_31["names"], $_var_31["type"] == "plugin" ? $comiis_blockclass[$_var_31["type"]] : $_var_31["name"], $comiis_blockclass[$_var_73] ? $comiis_blockclass[$_var_73] : $comiis_blockclass["err"], "<input class=\"checkbox\" type=\"checkbox\" name=\"show[" . $_var_31["id"] . "]\" value=\"1\" " . ($_var_31["show"] > 0 && $_var_31["blocknone"] == 0 ? " checked" : '') . ($_var_31["blocknone"] == 1 ? " disabled=\"disabled\"" : '') . ">", $_var_31["blocknone"] == 1 ? "<font style=\"color:red\">" . $comiis_app_portal_lang["50"] . "</font>" : "<a href=\"javascript:;\" onclick=\"zoom(this, './source/plugin/comiis_app_portal/comiis/" . $_var_31["dir"] . "/comiis_img.jpg', 1)\">" . $comiis_app_portal_lang["51"] . "</a> &nbsp;" . ($_var_31["type"] == "plugin" ? '' : "\r\n\t\t\t\t\t\t\t\t\t<a href=\"portal.php?mod=portalcp&ac=block&op=block&bid=" . $_var_31["diyid"] . "&from=cp\" onclick=\"showWindow('showblock',this.href);return false;\">" . $comiis_app_portal_lang["52"] . "</a> &nbsp;\r\n\t\t\t\t\t\t\t\t\t<a href=\"portal.php?mod=portalcp&ac=block&op=data&bid=" . $_var_31["diyid"] . "&from=cp\" onclick=\"showWindow('showblock',this.href);return false;\">" . $comiis_app_portal_lang["53"] . "</a> &nbsp;\r\n\t\t\t\t\t\t\t\t\t") . "<a href=\"plugin.php?id=comiis_app_portal&style=yes&editid=" . $_var_31["id"] . "\" onclick=\"showWindow('showstyle',this.href);return false;\">" . $comiis_app_portal_lang["54"] . "</a> &nbsp;" . ($_var_31["type"] == "plugin" ? '' : "\r\n\t\t\t\t\t\t\t\t\t<a href=\"portal.php?mod=portalcp&ac=block&op=getblock&forceupdate=1&inajax=1&bid=" . $_var_71["diyid"] . "&from=cp\" onclick=\"ajaxget(this.href,'','','','',function(){location.reload();});return false;\">" . $comiis_app_portal_lang["55"] . "</a>")));
							}
						}
						echo "<tr><td colspan=\"1\"></td><td colspan=\"7\"><div><a href=\"###\" onclick=\"showMenu({'ctrlid':'comiis_adds','evt':'click', 'duration':3, 'pos':'00'});\" class=\"addtr\">" . $comiis_app_portal_lang["56"] . "</a></div></td></tr>";
						showsubmit("comiis_submit", "submit", "del", '');
						showtablefooter();
						showformfooter();
						$_var_74 = array();
						$_var_75 = comiis_app_portal_read_dir_list();
						if (is_array($_var_75)) {
							foreach ($_var_75 as $_var_31) {
								$_var_76 = intval($_var_31["types"]);
								if ($_var_76) {
									$_var_74[$_var_76] = $_var_74[$_var_76] . ("<a href=\"" . ADMINSCRIPT . "?action=" . $_var_16 . "&comiis_sub=page&comiis_do=add_diy&pid=" . $_var_70["id"] . "&dir=" . $_var_31["dir"] . "\"><div class=\"kmimg\"><img src=\"./source/plugin/comiis_app_portal/comiis/" . $_var_31["dir"] . "/comiis_img.jpg\" /></div>" . $_var_31["name"] . "</a>");
								}
							}
						}
						$_var_77 = $_var_78 = $_var_79 = '';
						$_var_80 = 1;
						foreach ($comiis_app_portal_type as $_var_33 => $_var_31) {
							if ($_var_74[$_var_33]) {
								$_var_80 = $_var_80 + 1;
								$_var_77 = $_var_77 . ("<li><a href=\"javascript:;\" id=\"comiis_portal_block_" . $_var_80 . "\" onclick=\"switchTab('comiis_portal_block', " . $_var_80 . ", [===n===], 'kmon');\">" . $_var_31 . "</a></li>");
								$_var_78 = $_var_78 . ("<div id=\"comiis_portal_block_c_" . $_var_80 . "\" class=\"cl\" style=\"display:none\">" . $_var_74[$_var_33] . "</div>");
								$_var_79 = $_var_79 . $_var_74[$_var_33];
							}
						}
						$_var_77 = str_replace("[===n===]", $_var_80, $_var_77);
						echo "\r\n\t\t\t\t<style>\r\n\t\t\t\t#comiis_adds_menu .cmain {width:955px;}\r\n\t\t\t\t#comiis_adds_menu .cnote {border-bottom:1px solid #deeffb;}\r\n\t\t\t\t#comiis_adds_menu a {text-decoration:none;}\r\n\t\t\t\t.comiis_portal_block {height:400px;clear:left;overflow-y:auto;padding-left:1px;}\r\n\t\t\t\t.comiis_portal_block a {float:left;background:#f3f3f3;width:210px;height:auto;line-height:20px;color:#09c;text-align:center;padding:6px;margin:0 12px 12px 0;overflow: hidden;}\r\n\t\t\t\t.comiis_portal_block a:hover {background:#a6c9d7;color:#fff;}\r\n\t\t\t\t.comiis_portal_block .kmimg {width:210px;height:130px;margin-bottom:4px;overflow:hidden;}\r\n\t\t\t\t.comiis_portal_block .kmimg img {display:block;width:100%;height:100%;object-fit:scale-down;overflow:hidden;}\r\n\t\t\t\t.comiis_adds_tab {height:26px;line-height:26px;padding:12px 0;}\r\n                .comiis_adds_tab li {float:left;margin-right:10px;}\r\n                .comiis_adds_tab li a {display:block;padding:0 10px;border-radius:3px;}\r\n                .comiis_adds_tab li a:hover, .comiis_adds_tab li a.kmon {background:#A6C9D7;color:#fff;}                \r\n\t\t\t\t</style>\r\n\t\t\t\t<div id=\"comiis_adds_menu\" class=\"custom\" style=\"display:none\">\r\n\t\t\t\t\t<div class=\"cmain\">\r\n\t\t\t\t\t\t<div class=\"cnote\"><span class=\"right\"><a href=\"###\" class=\"flbc\" onclick=\"hideMenu();return false;\"></a></span><h3>" . $comiis_app_portal_lang["56"] . "</h3></div>\t\t\t\t\t\r\n\t\t\t\t\t\t<div class=\"comiis_adds_tab\">\r\n                            <ul>\r\n                                <li><a href=\"javascript:;\" id=\"comiis_portal_block_1\" class=\"kmon\" onclick=\"switchTab('comiis_portal_block', 1, " . $_var_80 . ", 'kmon');\">" . $comiis_app_portal_type[0] . "</a></li>\r\n\t\t\t\t\t\t\t\t" . $_var_77 . "\r\n                            </ul>\r\n\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t<div class=\"comiis_portal_block\"><div id=\"comiis_portal_block_c_1\" class=\"cl\">" . $_var_79 . "</div>" . $_var_78 . "</div>\r\n\t\t\t\t\t</div>\r\n\t\t\t\t</div>";
					}
				} else {
					$_var_26 = intval($_GET["editid"]);
					if (is_array($_GET["displayorder"])) {
						foreach ($_GET["displayorder"] as $_var_69 => $_var_31) {
							$_var_69 = intval($_var_69);
							$_var_81 = intval($_GET["show"][$_var_69]);
							$_var_82 = intval($_GET["displayorder"][$_var_69]);
							DB::update("comiis_app_portal_diy", array("show" => $_var_81, "displayorder" => $_var_82), DB::field("id", $_var_69) . " AND " . DB::field("pid", $_var_26));
						}
						$_var_71 = DB::fetch_all("SELECT * FROM %t WHERE pid='" . $_var_26 . "' ORDER BY displayorder, id", array("comiis_app_portal_diy"));
						$_var_82 = 0;
						if (is_array($_var_71)) {
							foreach ($_var_71 as $_var_31) {
								$_var_82 = $_var_82 + 5;
								DB::update("comiis_app_portal_diy", array("displayorder" => $_var_82), DB::field("id", $_var_31["id"]) . " AND " . DB::field("pid", $_var_26));
							}
						}
					}
					if ($_var_83 = dimplode($_GET["delete"])) {
						$_var_84 = array();
						foreach ($_GET["delete"] as $_var_31) {
							$_var_85 = DB::fetch_first("SELECT diyid FROM %t WHERE id='%d'", array("comiis_app_portal_diy", $_var_31));
							if (intval($_var_85["diyid"])) {
								$_var_84[] = intval($_var_85["diyid"]);
							}
						}
						C::t("common_block_item")->delete_by_bid($_var_84);
						C::t("common_block")->delete($_var_84);
						C::t("common_block_permission")->delete_by_bid_uid_inheritedtplname($_var_84);
						DB::query("DELETE FROM " . DB::table("comiis_app_portal_diy") . " WHERE " . DB::field("id", $_GET["delete"]) . " AND " . DB::field("pid", $_var_26));
					}
					cpmsg($comiis_app_portal_lang["57"], "action=" . $_var_16 . "&comiis_sub=page&comiis_do=edit_page&editid=" . $_var_26, "succeed", array(), '', 0);
					include DISCUZ_ROOT . "./source/plugin/comiis_app_portal/include/comiis_app_portal_c.php";
					comiis_app_portal_html($_var_26);
				}
			} else {
				if ($_GET["comiis_do"] == "add_diy") {
					$_var_86 = daddslashes($_GET["dir"]);
					$_GET["pid"] = intval($_GET["pid"]);
					$comiis_portal = $comiis_portal_lang = array();
					$_var_70 = DB::fetch_first("SELECT * FROM %t WHERE id='%d'", array("comiis_app_portal_page", $_GET["pid"]));
					if ($_GET["pid"] == $_var_70["id"] && preg_match("/^\\w+\$/", $_var_86) && strlen($_var_86) < 20 && is_dir($_var_15 . "/" . $_var_86) && is_file($_var_15 . "/" . $_var_86 . "/comiis_config.php")) {
						if (is_file($_var_15 . "/" . $_var_86 . "/language/language_" . currentlang() . ".php")) {
							$comiis_portal_lang = array();
							include_once libfile("language/" . currentlang(), "plugin/comiis_app_portal/comiis/" . $_var_86);
							$comiis_portal = array_merge($comiis_portal, $comiis_portal_lang);
						}
						include $_var_15 . "/" . $_var_86 . "/comiis_config.php";
						$comiis_config = daddslashes($comiis_config);
						if ($comiis_config["version"] < 2 || intval($comiis_config["types"]) == 0 || $comiis_config["dir"] != $_var_86) {
							cpmsg($comiis_app_portal_lang["59"] . "!", '', "error", array(), '', 0);
						}
						require_once libfile("function/portalcp");
						require_once libfile("function/block");
						$_var_35 = $comiis_config["name"] . "_" . random(4);
						if ($comiis_config["install"]["block"][0]["blockclass"] == "plugin") {
							DB::insert("comiis_app_portal_diy", array("pid" => $_GET["pid"], "bid" => 0, "diyid" => 0, "displayorder" => 0, "name" => $_var_35, "dir" => $comiis_config["dir"], "type" => "plugin", "show" => 0));
						} else {
							$comiis_config["install"]["block"][0]["name"] = $_var_35;
							$comiis_config["install"]["block"][0]["username"] = $_G["username"];
							$comiis_config["install"]["block"][0]["uid"] = $_G["uid"];
							$_var_23 = block_import($comiis_config["install"]);
							block_get_batch($_var_23);
							foreach ($_var_23 as $_var_24 => $_var_25) {
								block_updatecache($_var_25, 1);
								DB::insert("comiis_app_portal_diy", array("pid" => $_GET["pid"], "bid" => $_GET["bid"], "diyid" => $_var_25, "displayorder" => 0, "name" => $comiis_config["name"], "dir" => $comiis_config["dir"], "type" => $comiis_config["type"] == "footer" ? "footer" : '', "show" => 0));
							}
						}
						cpmsg($comiis_app_portal_lang["58"], "action=" . $_var_16 . "&comiis_sub=page&comiis_do=edit_page&editid=" . $_GET["pid"], "succeed", array(), '', 0);
					} else {
						cpmsg($comiis_app_portal_lang["59"], '', "error", array(), '', 0);
					}
				} else {
					if ($_GET["comiis_do"] == "export") {
						$_var_26 = intval($_GET["editid"]);
						$_var_70 = DB::fetch_first("SELECT * FROM %t WHERE id='%d'", array("comiis_app_portal_page", $_var_26));
						$_var_87 = $_var_88 = $_var_89 = $_var_90 = $_var_91 = array();
						if ($_var_70["id"]) {
							$_var_87 = DB::fetch_all("SELECT * FROM %t WHERE pid='%d'", array("comiis_app_portal_diy", $_var_70["id"]));
							if (is_array($_var_87)) {
								foreach ($_var_87 as $_var_31) {
									if ($_var_31["bid"]) {
										$_var_90[] = $_var_31["bid"];
									}
									if ($_var_31["diyid"]) {
										$_var_91[$_var_31["diyid"]] = $_var_31["diyid"];
									}
								}
								require_once libfile("function/portalcp");
								require_once libfile("class/xml");
								$_var_88 = block_export($_var_91);
							}
							$_var_92 = array("page" => $_var_70, "diydata" => $_var_87, "diy" => $_var_88);
							$_var_93 = array2xml($_var_92, true);
							ob_end_clean();
							$_G["gzipcompress"] ? ob_start("ob_gzhandler") : ob_start();
							header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
							header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
							header("Cache-Control: no-cache, must-revalidate");
							header("Pragma: no-cache");
							header("Content-Encoding: none");
							header("Content-Length: " . strlen($_var_93));
							header("Content-Disposition: attachment; filename=comiis_export_" . $_var_70["id"] . ".xml");
							header("Content-Type: text/xml");
							echo $_var_93;
							return 0;
						}
						cpmsg($comiis_app_portal_lang["256"], '', "error");
					} else {
						if (!submitcheck("comiis_submit")) {
							echo "<script type=\"text/JavaScript\">var rowtypedata = [[[1,'', 'td25'],[1,'<input type=\"text\" class=\"txt\" size=\"2\" name=\"new_name[]\" value=\"" . $comiis_app_portal_lang["60"] . "\">',''],[1,''],[1,''],[1,'','td25'],[1,'','td25'],[1,''],[1,'']]];</script><style>.tb2 td img {background:#0099CC;padding:0 6px;height:40px;}</style>";
							$_var_94 = DB::fetch_all("SELECT * FROM %t ORDER BY id DESC", array("comiis_app_portal_page"));
							showformheader($_var_16 . "&comiis_sub=" . $_GET["comiis_sub"]);
							showtips($comiis_app_portal_lang["61"], "tips", true, $comiis_app_portal_lang["62"]);
							showtableheader();
							showtitle($comiis_app_portal_lang["01"]);
							showsubtitle(array('', "name", $comiis_app_portal_lang["63"], $comiis_app_portal_lang["64"], $comiis_app_portal_lang["65"], "available", $comiis_app_portal_lang["66"], $comiis_app_portal_lang["67"]));
							if (is_array($_var_94)) {
								foreach ($_var_94 as $_var_31) {
									showtablerow('', array("class=\"td25\"", "width=\"30%\"", '', '', "class=\"td25\"", "class=\"td25\"", "width=\"100\"", "width=\"120\""), array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $_var_31["id"] . "\">", $_var_31["name"], $_var_31["user"] == "comiis.com" ? "<a href=\"http://www.comiis.com/\" target=\"_blank\">www.comiis.com</a>" : "<a href=\"home.php?mod=space&uid=" . $_var_31["uid"] . "\" target=\"_blank\">" . $_var_31["user"] . "</a>", dgmdate($_var_31["dateline"], "u"), "<input class=\"checkbox\" type=\"radio\" name=\"default\" value=\"" . $_var_31["id"] . "\" " . ($_var_31["default"] > 0 ? "checked" : '') . ">", "<input class=\"checkbox\" type=\"checkbox\" name=\"show[" . $_var_31["id"] . "]\" value=\"1\" " . ($_var_31["show"] > 0 ? "checked" : '') . "><input type=\"hidden\" name=\"ids[" . $_var_31["id"] . "]\" value=\"" . $_var_31["id"] . "\">", "<a href=\"plugin.php?id=comiis_app_portal&pid=" . $_var_31["id"] . "\" target=\"_blank\">" . $comiis_app_portal_lang["68"] . "</a> &nbsp;<a href=\"" . ADMINSCRIPT . "?action=" . $_var_16 . "&comiis_sub=page&comiis_do=edit&editid=" . $_var_31["id"] . "\" style=\"color:#0A0\">" . $comiis_app_portal_lang["69"] . "</a> &nbsp;<a href=\"" . ADMINSCRIPT . "?action=" . $_var_16 . "&comiis_sub=page&comiis_do=export&editid=" . $_var_31["id"] . "\">" . $comiis_app_portal_lang["255"] . "</a>", "<a href=\"" . ADMINSCRIPT . "?action=" . $_var_16 . "&comiis_sub=page&comiis_do=edit_page&editid=" . $_var_31["id"] . "\" style=\"color:#db0000\">" . $comiis_app_portal_lang["46"] . "</a>"));
								}
							}
							echo "<tr><td colspan=\"1\"></td><td colspan=\"7\"><div><a href=\"###\" onclick=\"addrow(this, 0, 0)\" class=\"addtr\">" . $comiis_app_portal_lang["70"] . "</a></div></td></tr>";
							showsubmit("comiis_submit", "submit", "del", '');
							showtablefooter();
							showformfooter();
						} else {
							if (is_array($_GET["ids"])) {
								foreach ($_GET["ids"] as $_var_69 => $_var_31) {
									$_var_69 = intval($_var_69);
									$_var_81 = intval($_GET["show"][$_var_69]) ? 1 : 0;
									$_var_95 = $_GET["default"] == $_var_69 ? 1 : 0;
									DB::update("comiis_app_portal_page", array("show" => $_var_81, "default" => $_var_95), DB::field("id", $_var_69));
								}
							}
							if ($_var_83 = dimplode($_GET["delete"])) {
								$_var_84 = array();
								foreach ($_GET["delete"] as $_var_31) {
									$_var_85 = DB::fetch_all("SELECT diyid FROM %t WHERE pid='%d'", array("comiis_app_portal_diy", $_var_31));
									if (is_array($_var_85)) {
										foreach ($_var_85 as $_var_96) {
											if (intval($_var_96["diyid"])) {
												$_var_84[] = intval($_var_96["diyid"]);
											}
										}
									}
								}
								C::t("common_block_item")->delete_by_bid($_var_84);
								C::t("common_block")->delete($_var_84);
								C::t("common_block_permission")->delete_by_bid_uid_inheritedtplname($_var_84);
								DB::query("DELETE FROM " . DB::table("comiis_app_portal_page") . " WHERE " . DB::field("id", $_GET["delete"]));
								DB::query("DELETE FROM " . DB::table("comiis_app_portal_diy") . " WHERE " . DB::field("pid", $_GET["delete"]));
							}
							if (is_array($_GET["new_name"])) {
								foreach ($_GET["new_name"] as $_var_69 => $_var_31) {
									if (strlen($_GET["new_name"][$_var_69])) {
										$_var_35 = trim(dhtmlspecialchars($_GET["new_name"][$_var_69]));
										DB::insert("comiis_app_portal_page", array("name" => $_var_35, "user" => $_G["username"], "uid" => $_G["uid"], "dateline" => $_G["timestamp"]));
									}
								}
							}
							cpmsg($comiis_app_portal_lang["44"], "action=" . $_var_16 . "&comiis_sub=" . $_GET["comiis_sub"], "succeed", array(), '', 0);
						}
					}
				}
			}
		}
	} else {
		if ($_GET["comiis_sub"] == "block") {
			showtips($comiis_app_portal_lang["71"], "tips", true, $comiis_app_portal_lang["72"]);
			showtableheader();
			showtitle($comiis_app_portal_lang["126"]);
			showtablefooter();
			$_var_97 = '';
			$_var_75 = comiis_app_portal_read_dir_list();
			if (is_array($_var_75)) {
				foreach ($_var_75 as $_var_31) {
					$_var_97 = $_var_97 . ("<a href=\"javascript:;\" onclick=\"zoom(this, './source/plugin/comiis_app_portal/comiis/" . $_var_31["dir"] . "/comiis_img.jpg', 1)\"><div class=\"kmimg\"><img src=\"./source/plugin/comiis_app_portal/comiis/" . $_var_31["dir"] . "/comiis_img.jpg\" /></div><span class=\"bold\">" . $_var_31["name"] . "</span> <em>(" . $_var_31["dir"] . ")</em></a>");
				}
			}
			echo "<style>\r\n\t.comiis_portal_block a {float:left;background:#f3f3f3;width:210px;height:auto;line-height:20px;text-align:center;padding:6px;margin:0 12px 12px 0;overflow: hidden;}\r\n\t.comiis_portal_block a:hover {background:#a6c9d7;color:#fff;}\r\n\t.comiis_portal_block .kmimg {width:210px;height:130px;margin-bottom:4px;overflow:hidden;}\r\n\t.comiis_portal_block .kmimg img {display:block;width:100%;height:100%;object-fit:scale-down;overflow:hidden;}\r\n\t</style>\r\n\t<div class=\"cmain cl\"><div class=\"comiis_portal_block\">" . $_var_97 . "</div></div>";
			showtips($comiis_app_portal_lang["128"], "tips", true, $comiis_app_portal_lang["127"]);
		}
	}
}