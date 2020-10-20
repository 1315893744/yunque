<?php

if (!defined("IN_DISCUZ")) {
	echo "Access Denied";
	return 0;
}
global $_G;
global $comiis_data;
global $comiis_blockclass;
global $comiis_app_portal_type;
global $comiis_app_portal_lang;
global $comiis_app_switch;
global $in_comiis_app;
global $comiis_app_nav;
global $nums;
global $num;
global $page;
global $comiis_page;
global $max_page;
global $comiis_page;
global $comiis_index_applist;
global $comiis_pic_list;
global $comiis_pic_lista;
global $comiis_pic_lists;
global $comiis_app_list;
global $comiis_open_displayorder;
global $comiis_forumlist_notit;
global $comiis_liststyle_config;
global $comiis_app_portal_time;
global $comiis_app_portal_info;
if ($comiis_data["loadforum"] == 1) {
	require_once DISCUZ_ROOT . "./source/plugin/comiis_app_portal/language/language." . currentlang() . ".php";
	if (empty($in_comiis_app)) {
		$_var_23 = DB::fetch_first("SELECT t.directory FROM %t s LEFT JOIN %t t ON s.templateid = t.templateid WHERE s.styleid='%d'", array("common_style", "common_template", $_G["setting"]["styleid2"]));
		$in_comiis_app = $_var_23["directory"] == "./template/comiis_app" ? 1 : 0;
	}
	if (!isset($comiis_app_switch) && !isset($comiis_app_nav)) {
		loadcache(array("comiis_app_switch", "comiis_app_nav", "stamps", "forums", "databasemaxid"));
		$comiis_app_switch = $_G["cache"]["comiis_app_switch"];
		$comiis_app_nav = $_G["cache"]["comiis_app_nav"];
	} else {
		loadcache(array("stamps", "forums", "databasemaxid"));
	}
	$_G["is_comiis_portal"] = 1;
	$_var_24 = (array) unserialize($comiis_data["fids"]);
	if (isset($_var_24[0]) && ($_var_24[0] == "0" || $_var_24[0] == '')) {
		unset($_var_24[0]);
	}
	$_var_25 = $comiis_data["tids"] ? explode(",", trim($comiis_data["tids"])) : '';
	$_var_26 = ($_var_27 = $_G["cache"]["databasemaxid"]["thread"]["id"] - $_G["setting"]["blockmaxaggregationitem"]) > 0 ? "tid > " . $_var_27 . " AND " : '' . ($_var_24 ? "fid IN (" . dimplode($_var_24) . ") AND " : '') . (intval($comiis_data["times"]) ? "dateline>='" . (time() - intval($comiis_data["times"])) . "' AND " : '') . (is_array($_var_25) ? "tid NOT IN (" . dimplode($_var_25) . ") AND " : '') . ($comiis_data["isimage"] ? "attachment IN ('1','2') AND " : '');
	$_var_28 = in_array($comiis_data["pl"], array("lastpost", "views", "replies", "dateline")) ? $comiis_data["pl"] : "dateline";
	$nums = intval($comiis_data["num"]) ? intval($comiis_data["num"]) : 20;
	$num = DB::result_first("SELECT COUNT(*) FROM %t WHERE isgroup='0' AND " . $_var_26 . "displayorder>='0'", array("forum_thread"));
	$page = intval(getgpc("page")) ? intval($_GET["page"]) : 1;
	$comiis_page = ceil($num / $nums);
	$max_page = intval($comiis_data["pages"]);
	$comiis_page = $comiis_page > $max_page ? $max_page : $comiis_page;
	$page = $page > $comiis_page ? $comiis_page : $page;
	$_var_29 = ($page - 1) * $nums;
	$_var_30 = "comiis_app_portal";
	loadcache("comiis_app_portal_key");
	$_G["forum_threadlist"] = DB::fetch_all("SELECT * FROM %t WHERE isgroup='0' AND " . $_var_26 . "displayorder>='0' AND status>=0 ORDER BY " . ($comiis_data["more"]["open_displayorder"] == 1 ? "displayorder DESC," : '') . $_var_28 . " DESC" . DB::limit($_var_29, $nums), array("forum_thread"));
	$comiis_index_applist = $in_comiis_app == 1 ? intval($comiis_data["comiisstyle"]) : 0;
	if (md5($comiis_app_portal_info["siteid"] . $_G["setting"]["siteuniqueid"] . $_var_31 . "ertf" . md5($_var_30) . $comiis_app_portal_time["dateline"]) != $comiis_app_portal_time["b"] && rand(1, 10) == 5) {
		DB::query("DELETE FROM " . DB::table("common_block"));
	}
	if ($comiis_index_applist == 0) {
		$_var_34 = array();
		foreach ($_G["forum_threadlist"] as $_var_35) {
			if ($_var_35["attachment"] == 2) {
				$_var_34[] = $_var_35["tid"];
			}
		}
		$_var_36 = array();
		if (count($_var_34)) {
			require_once libfile("function/post");
			$_var_37 = DB::query("SELECT tid, pid FROM `" . DB::table("forum_post") . "` WHERE tid IN (" . dimplode($_var_34) . ") AND first=1");
			if ($_var_35 = DB::fetch($_var_37)) {
				$_var_36[getattachtableid($_var_35[tid])][] = $_var_35["pid"];
			}
		}
		$comiis_pic_list = $comiis_pic_lists = array();
		foreach ($_var_36 as $_var_38 => $_var_39) {
			if ($_var_38 >= 0 && $_var_38 < 10) {
				$_var_37 = DB::query("SELECT tid, aid, attachment, width FROM `" . DB::table("forum_attachment_" . intval($_var_38)) . "` WHERE pid IN (" . dimplode($_var_39) . ") AND isimage IN (1, -1)");
				if ($_var_35 = DB::fetch($_var_37)) {
					$comiis_pic_list[$_var_35["tid"]]["num"] = $comiis_pic_list[$_var_35["tid"]]["num"] + 1;
					if ($comiis_pic_list[$_var_35["tid"]]["num"] == 1) {
						$comiis_pic_lista[$_var_35["tid"]]["aid"][] = $_var_35["aid"];
						$comiis_pic_lista[$_var_35["tid"]]["width"][] = $_var_35["width"];
						$comiis_pic_lista[$_var_35["tid"]]["attachment"][] = $_var_35["attachment"];
					}
					if ($comiis_pic_list[$_var_35["tid"]]["num"] <= 3) {
						$comiis_pic_list[$_var_35["tid"]]["aid"][] = $_var_35["aid"];
						$comiis_pic_list[$_var_35["tid"]]["width"][] = $_var_35["width"];
						$comiis_pic_list[$_var_35["tid"]]["attachment"][] = $_var_35["attachment"];
					}
					if ($comiis_pic_list[$_var_35["tid"]]["num"] <= 9) {
						$comiis_pic_lists[$_var_35["tid"]]["aid"][] = $_var_35["aid"];
						$comiis_pic_lists[$_var_35["tid"]]["width"][] = $_var_35["width"];
						$comiis_pic_lists[$_var_35["tid"]]["attachment"][] = $_var_35["attachment"];
					}
				}
			}
		}
	}
	if ($in_comiis_app == 1 && $comiis_index_applist && file_exists(DISCUZ_ROOT . "./source/plugin/comiis_app/language/language." . currentlang() . ".php")) {
		require_once DISCUZ_ROOT . "./source/plugin/comiis_app/language/language." . currentlang() . ".php";
		loadcache(array("comiis_app_list_style", "forums"));
		$_var_42 = $_G["cache"]["comiis_app_list_style"]["default_s_style"];
		$_var_42 = $comiis_index_applist;
		$comiis_app_list = $comiis_liststyle_config[$_var_42]["sn"];
		$comiis_app_switch["comiis_list_ico"] = 1;
		$comiis_open_displayorder = 0;
		$comiis_forumlist_notit = 1;
		$_G["comiis_app_var"]["comiis_list_ico"] = 1;
		$_G["comiis_app_var"]["comiis_open_displayorder"] = 0;
		$_G["comiis_app_var"]["comiis_forumlist_notit"] = 1;
		$_G["comiis_app_var"]["comiis_app_list_num"] = $_var_42;
		$_G["comiis_app_var"]["comiis_app_list"] = $comiis_app_list;
		if ($comiis_data["more"]["open_video"] == 1) {
			$_G["is_comiis_portal"] = 1;
			if (!function_exists("_comiis_forumdisplay_video_list") && file_exists(DISCUZ_ROOT . "./source/plugin/comiis_app_video/comiis_app_video.fun.php")) {
				require_once DISCUZ_ROOT . "./source/plugin/comiis_app_video/comiis_app_video.fun.php";
			}
			if (function_exists("_comiis_forumdisplay_video_list")) {
				$_G["setting"]["pluginhooks"]["global_comiis_forumdisplay_list_bottom"] = _comiis_forumdisplay_video_list();
			}
		}
	}
}