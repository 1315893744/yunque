<?php

	if (!defined("IN_DISCUZ") || !defined("IN_ADMINCP")) {
		echo "Access Denied";
		return 0;
	}
	global $_G;
	global $navtitle;
	global $comiis_foot;
	global $comiis_isweixin;
	global $comiis_wxre;
	global $key;
	global $comiis_is_weixin_user;
	global $user_id;
	global $username;
	global $comiis_weixin_time;
	global $comiis_weixin_info;
	global $comiis_weixin_lan;
	global $lang;
	$navtitle = $key = $user_id = $username = '';
	$comiis_foot = $comiis_isweixin = $comiis_wxre = 0;
	$_var_13 = $_var_14 = $comiis_weixin_time = $comiis_weixin_info = $comiis_is_weixin_user = $comiis_weixin_lan = array();
	loadcache("plugin");
	
	$_G["comiis_weixin"] = $_G["cache"]["plugin"]["comiis_weixin"];
	$plugin_id = "comiis_weixin";
	$_var_16 = 0;
	require DISCUZ_ROOT . "./source/plugin/comiis_weixin/language/language." . currentlang() . ".php";
	if ($_GET["actions"] == "edituser") {
		$_var_17 = intval($_GET["editid"]);
		if ($_var_17) {
			$_var_18 = DB::fetch_first("SELECT * FROM %t WHERE id=%d", array("comiis_weixin", $_var_17));
			if ($_var_18["id"] == $_var_17) {
				DB::update("comiis_weixin", array("start" => $_var_18["start"] == 1 ? 0 : 1), DB::field("id", $_var_17));
				if ($_var_18["uid"]) {
					DB::update("common_member", array("status" => $_var_18["start"] == 1 ? "-1" : "0"), DB::field("uid", $_var_18["uid"]));
				}
				cpmsg($comiis_weixin_lan["01"], "action=plugins&operation=config&do=" . $_G["gp_do"] . "&identifier=comiis_weixin&pmod=comiis_weixin_admin" . ($_GET["keyword"] ? "&keyword=" . urldecode($_GET["keyword"]) : '') . ($_GET["ismore"] ? "&ismore=" . intval($_GET["ismore"]) : '') . ($_GET["page"] ? "&page=" . $_GET["page"] : ''), "succeed", array(), '', 0);
				return 0;
			}
		}
		cpmsg($comiis_weixin_lan["02"], '', "error", array(), '', 0);
	} else {
		if (!submitcheck("delsubmit")) {
			$_var_19 = 20;
			$_var_20 = '';
			$_var_21 = array("comiis_weixin", "common_member");
			if (!empty($_GET["ismore"]) && intval($_GET["ismore"])) {
				if (intval($_GET["ismore"]) == 1) {
					$_var_20 = " AND cm.sex='1'";
				} else {
					if (intval($_GET["ismore"]) == 2) {
						$_var_20 = " AND cm.sex='2'";
					} else {
						if (intval($_GET["ismore"]) == 3) {
							$_var_20 = " AND cm.start='0'";
						}
					}
				}
			}
			if (!empty($_GET["keyword"])) {
				$_var_22 = daddslashes($_GET["keyword"]);
				$_var_20 = $_var_20 . " AND (cm.uid=%s or cm.openid like %s or cm.nickname like %s or cm.city like %s or cm.province like %s or cm.country like %s or cm.unionid like %s or m.username like %s)";
				$_var_21[] = $_var_22;
				$_var_21[] = "%" . $_var_22 . "%";
				$_var_21[] = "%" . $_var_22 . "%";
				$_var_21[] = "%" . $_var_22 . "%";
				$_var_21[] = "%" . $_var_22 . "%";
				$_var_21[] = "%" . $_var_22 . "%";
				$_var_21[] = "%" . $_var_22 . "%";
				$_var_21[] = "%" . $_var_22 . "%";
			}
			
			$_var_23 = intval($_GET["page"]) ? intval($_GET["page"]) : 1;
			$_var_24 = DB::result_first("SELECT COUNT(*) FROM %t cm LEFT JOIN %t m ON cm.uid = m.uid WHERE cm.uid>'0' " . $_var_20 . '', $_var_21);
			$_var_25 = ceil($_var_24 / $_var_19);
			$_var_26 = ($_var_23 - 1) * $_var_19;
			$_var_27 = multi($_var_24, $_var_19, $_var_23, ADMINSCRIPT . "?action=plugins&operation=config&do=" . $_G["gp_do"] . "&identifier=comiis_weixin&pmod=comiis_weixin_admin" . ($_GET["keyword"] ? "&keyword=" . urldecode($_GET["keyword"]) : '') . ($_GET["ismore"] ? "&ismore=" . intval($_GET["ismore"]) : ''));
			$_var_28 = DB::fetch_all("SELECT cm.*, m.username FROM %t cm LEFT JOIN %t m ON cm.uid = m.uid  WHERE cm.uid>'0' " . $_var_20 . " ORDER BY cm.dateline DESC " . DB::limit($_var_26, $_var_19), $_var_21);
			showformheader("plugins&operation=config&do=" . $_G["gp_do"] . "&identifier=comiis_weixin&pmod=comiis_weixin_admin", '', "search");
			showtableheader();
			echo "<input type=\"hidden\" name=\"search_submit\" value=\"true\"><br>" . $lang["keywords"] . ": <input type=\"text\" name=\"keyword\" value=\"" . $_var_22 . "\" /> &nbsp;<select name=\"ismore\" style=\"width:80px;\"><option value=\"0\">" . $comiis_weixin_lan["03"] . "</option><option value=\"1\"" . ($_GET["ismore"] == 1 ? " selected=\"selected\"" : '') . ">" . $comiis_weixin_lan["04"] . "</option><option value=\"2\"" . ($_GET["ismore"] == 2 ? " selected=\"selected\"" : '') . ">" . $comiis_weixin_lan["05"] . "</option><option value=\"3\"" . ($_GET["ismore"] == 3 ? " selected=\"selected\"" : '') . ">" . $comiis_weixin_lan["06"] . "</option></select> &nbsp;<input type=\"submit\" name=\"search_key\" value=\"" . $lang[search] . "\" class=\"btn\" style=\"margin:0;vertical-align:top;\"> " . $comiis_weixin_lan["07"] . $_var_24;
			showtablefooter();
			showformfooter();
			showformheader("plugins&operation=config&do=" . $_G["gp_do"] . "&identifier=comiis_weixin&pmod=comiis_weixin_admin" . ($_GET["keyword"] ? "&keyword=" . urldecode($_GET["keyword"]) : '') . ($_GET["ismore"] ? "&ismore=" . intval($_GET["ismore"]) : '') . ($_GET["page"] ? "&page=" . $_GET["page"] : ''), '', "del");
			showtableheader($comiis_weixin_lan["08"]);
			showsubtitle(array('', "UID", $comiis_weixin_lan["09"], $comiis_weixin_lan["10"], $comiis_weixin_lan["11"], $comiis_weixin_lan["12"], $comiis_weixin_lan["13"], "OpenID", "UnionID", $comiis_weixin_lan["14"], $comiis_weixin_lan["15"]));
			foreach ($_var_28 as $_var_29 => $_var_30) {
				if (!empty($_GET["keyword"])) {
					$_var_30["openid"] = str_replace($_var_22, "<font class=\"highlight\">" . $_var_22 . "</font>", $_var_30["openid"]);
					$_var_30["nickname"] = str_replace($_var_22, "<font class=\"highlight\">" . $_var_22 . "</font>", $_var_30["nickname"]);
					$_var_30["city"] = str_replace($_var_22, "<font class=\"highlight\">" . $_var_22 . "</font>", $_var_30["city"]);
					$_var_30["province"] = str_replace($_var_22, "<font class=\"highlight\">" . $_var_22 . "</font>", $_var_30["province"]);
					$_var_30["country"] = str_replace($_var_22, "<font class=\"highlight\">" . $_var_22 . "</font>", $_var_30["country"]);
					$_var_30["unionid"] = str_replace($_var_22, "<font class=\"highlight\">" . $_var_22 . "</font>", $_var_30["unionid"]);
					$_var_30["username"] = str_replace($_var_22, "<font class=\"highlight\">" . $_var_22 . "</font>", $_var_30["username"]);
				}
				
				showtablerow($_var_30["username"] == '' ? "style=\"background: #fbb;\"" : ($_var_30["start"] == 1 ? '' : "style=\"background: #eee;\""), array("width=\"10px\"", "width=\"5%\"", "width=\"10%\"", "width=\"10%\"", "width=\"5%\"", "width=\"10%\"", "width=\"5%\"", "width=\"15%\"", "width=\"15%\"", "width=\"12%\"", ''), array("<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"" . $_var_30["id"] . "\">", $_var_30["uid"] == $_var_22 ? "<font class=\"highlight\">" . $_var_30["uid"] . "</font>" : $_var_30["uid"], "<a href='home.php?mod=space&uid=" . $_var_30["uid"] . "' target='_blank'><img src='uc_server/avatar.php?uid=" . $_var_30["uid"] . "&size=small' style='width:32px;height:32px' align='absmiddle' /> " . ($_var_30["username"] == '' ? $comiis_weixin_lan["16"] : $_var_30["username"]) . "</a>", "<img src='" . $_var_30["headimgurl"] . "' style='width:32px;height:32px' align='absmiddle' /> " . $_var_30["nickname"], $_var_30["sex"] == 1 ? $comiis_weixin_lan["17"] : ($_var_30["sex"] == 2 ? $comiis_weixin_lan["18"] : "--"), dgmdate($_var_30["dateline"]) . "<br><font style=\"color:#090\">" . dgmdate($_var_30["lastdate"]) . "</font>", $_var_30["num"], $_var_30["openid"], $_var_30["unionid"], $_var_30["country"] . " " . $_var_30["province"] . " " . $_var_30["city"], "<a href=\"" . ADMINSCRIPT . "?action=members&operation=edit&uid=" . $_var_30["uid"] . "\">" . $comiis_weixin_lan["19"] . "</a>&nbsp;&nbsp;<a href=\"" . ADMINSCRIPT . "?action=plugins&operation=config&do=" . $_G["gp_do"] . "&identifier=comiis_weixin&pmod=comiis_weixin_admin" . ($_GET["keyword"] ? "&keyword=" . urldecode($_GET["keyword"]) : '') . ($_GET["ismore"] ? "&ismore=" . intval($_GET["ismore"]) : '') . ($_GET["page"] ? "&page=" . $_GET["page"] : '') . "&actions=edituser&editid=" . $_var_30["id"] . "\" style=\"color:#db0000\">" . ($_var_30["start"] == 1 ? $comiis_weixin_lan["20"] : $comiis_weixin_lan["21"]) . "</a>"));
			}
			showsubmit("delsubmit", "submit", "del", '', $_var_27, false);
			showtablefooter();
			showformfooter();
		} else {
			if ($_var_17 = dimplode($_GET["delete"])) {
				DB::query("DELETE FROM " . DB::table("comiis_weixin") . " WHERE " . DB::field("id", $_GET["delete"]));
			}
			cpmsg($comiis_weixin_lan["01"], "action=plugins&operation=config&do=" . $_G["gp_do"] . "&identifier=comiis_weixin&pmod=comiis_weixin_admin" . ($_GET["keyword"] ? "&keyword=" . urldecode($_GET["keyword"]) : '') . ($_GET["ismore"] ? "&ismore=" . intval($_GET["ismore"]) : '') . ($_GET["page"] ? "&page=" . $_GET["page"] : ''), "succeed", array(), '', 0);
		}
	}
