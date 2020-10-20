<?php

$plugin_id = "comiis_app";
$verify4 = 0;

function comiis_forumdisplay_verify_author($ids)
{
	global $_G;
	$verify = array();
	foreach (C::t("common_member_verify")->fetch_all($ids) as $value) {
		foreach ($_G["setting"]["verify"] as $vid => $vsetting) {
			if ($vsetting["available"] && $vsetting["showicon"] && $value["verify" . $vid] == 1) {
				$srcurl = !empty($vsetting["icon"]) ? $vsetting["icon"] : '';
				$verify[$value["uid"]] = $verify[$value["uid"]] . ("<a href=\"home.php?mod=spacecp&ac=profile&op=verify&vid=" . $vid . "\" target=\"_blank\">" . (!empty($srcurl) ? "<img src=\"" . $srcurl . "\" class=\"vm\" alt=\"" . $vsetting["title"] . "\" title=\"" . $vsetting["title"] . "\" />" : $vsetting["title"]) . "</a>");
			}
		}
	}
	return $verify;
}
global $_G;
global $comiis_app_switch;
global $comiis_reply_list_array;
global $groupcolor;
global $comiis_open_displayorder;
global $comiis_forumlist_notit;
global $comiis_app_list_num;
global $comiis_app_list;
global $member;
global $comiis_displayorder_num;
global $comiis_pic_list;
global $comiis_memberrecommend_array;
global $re_sn;
global $comiis_liststyle_config;
global $comiis_app_lang;
global $comiis_app_nav_name;
global $comiis_pic_lists;
global $comiis_pic_lista;
global $message;
global $comiis_app_info;
global $comiis_md5file;
global $comiis_app_time;
$plugin_id = "comiis_app";
$verify4 = 0;
$authorids = $comiis_tids = $comiis_readtids = array();
loadcache(array("stamps", "usergroups"));
foreach ($_G["forum_threadlist"] as $key => $temp) {
	$authorids[] = $temp["authorid"];
	$comiis_tids[] = $temp["tid"];
	if ($temp["attachment"] == 2) {
		$comiis_readtids[] = $temp["tid"];
	}
	if (!$temp["forumstick"] && $temp["closed"] > 1 && ($temp["isgroup"] == 1 || $temp["fid"] != $_G["fid"]) || $temp["moved"]) {
		$_G["forum_threadlist"][$key]["tid"] = $temp["closed"];
	}
}
if ($comiis_app_switch["comiis_list_verify"] == 1 && $_G["setting"]["verify"]["enabled"] && ($_G["basescript"] != "forum" || CURMODULE != "forumdisplay") && $authorids) {
	$_G["comiis_verify"] = comiis_forumdisplay_verify_author($authorids);
}
$comiis_app_switch["comiis_list_ico"] = $_G["comiis_app_var"]["comiis_list_ico"];
$comiis_open_displayorder = $_G["comiis_app_var"]["comiis_open_displayorder"];
$comiis_forumlist_notit = $_G["comiis_app_var"]["comiis_forumlist_notit"];
$comiis_app_list_num = $_G["comiis_app_var"]["comiis_app_list_num"];
$comiis_app_list = $_G["comiis_app_var"]["comiis_app_list"];
$member = array();
$_G["comiis_list_group"] = array();
if ($authorids) {
	$query = DB::query("SELECT m.uid, m.groupid, p.gender FROM `" . DB::table("common_member") . "` m LEFT JOIN `" . DB::table("common_member_profile") . "` p ON m.uid=p.uid WHERE m.uid IN (" . dimplode($authorids) . ")");
	if ($temp = DB::fetch($query)) {
		$member[$temp["uid"]]["stars"] = $_G["cache"]["usergroups"][$temp["groupid"]]["stars"];
		$member[$temp["uid"]]["gender"] = $temp["gender"];
		$_G["comiis_list_group"][$temp["uid"]] = strip_tags($_G["cache"]["usergroups"][$temp["groupid"]]["grouptitle"]);
		if (!$groupcolor[$temp["uid"]]) {
			$groupcolor[$temp["uid"]] = $_G["cache"]["usergroups"][$temp["groupid"]]["color"];
		}
	}
}
$comiis_displayorder_array = array();
$comiis_tids = array();
$comiis_readtids = array();
$comiis_displayorder_num = 0;
if (count($_G["forum_threadlist"])) {
	foreach ($_G["forum_threadlist"] as $thread) {
		if (in_array($thread["displayorder"], array(1, 2, 3, 4)) && $page == 1 && $comiis_open_displayorder) {
			$value8 = $value8 . ("<li class=\"b_t\"><a href=\"forum.php?mod=viewthread&tid=" . $thread[tid] . "&" . ($_GET["archiveid"] ? "archiveid=" . $_GET["archiveid"] . "&" : '') . "extra=" . $extra . "\"" . $thread[highlight] . ($thread["isgroup"] == 1 || $thread["forumstick"] ? "target=\"_blank\"" : '') . "><span class=\"bg_0 f_f\">{lang thread_sticky}</span>" . $thread[subject] . "</a></li>");
			$comiis_displayorder_num = $comiis_displayorder_num + 1;
		} else {
			if ($thread["attachment"] == 2) {
				$comiis_readtids[] = $thread[tid];
			}
			$comiis_tids[] = $thread[tid];
		}
	}
}
$comiis_pyqlist_noimg = unserialize($comiis_app_switch["comiis_pyqlist_noimg"]);
$all_fid = array();
$message = array();
$comiis_picid_array = array();
if (count($_G["forum_threadlist"])) {
	require_once libfile("function/post");
	$query = DB::query("SELECT fid, tid, pid, message FROM `" . DB::table("forum_post") . "` WHERE tid IN (" . dimplode($comiis_tids) . ") AND first=1");
	if ($temp = DB::fetch($query)) {
		$message[$temp["tid"]] = messagecutstr($temp["message"], 100);
		if (in_array($temp["tid"], $comiis_readtids) && !in_array($temp["fid"], $comiis_pyqlist_noimg)) {
			$comiis_picid_array[getattachtableid($temp["tid"])][] = $temp["pid"];
		}
	}
}
$comiis_pic_list = $comiis_pic_lists = array();
require DISCUZ_ROOT . "./source/plugin/comiis_app/language/language." . currentlang() . ".php";
loadcache("comiis_app_list_style", 1);
foreach ($comiis_liststyle_config as $k => $v) {
	if ($v["sn"] == $re_sn) {
		$k = intval($k);
		$repicnum = intval($_G["cache"]["comiis_app_list_style"]["fid_picnum"][$k]);
		if ($comiis_liststyle_config[$k]["num"]) {
			$repicnum = $repicnum ? $repicnum : intval($comiis_liststyle_config[$k]["num"]);
		} else {
			$repicnum = 1;
		}
		break;
	}
}
$comiis_pic_list["all_num"] = $repicnum;
foreach ($comiis_picid_array as $tableid => $pids) {
	if ($tableid >= 0 && $tableid < 10) {
		$query = DB::query("SELECT tid, aid, attachment, width FROM `" . DB::table("forum_attachment_" . intval($tableid)) . "` WHERE pid IN (" . dimplode($pids) . ") AND isimage IN (1, -1)");
		if ($temp = DB::fetch($query)) {
			$comiis_pic_list[$temp["tid"]]["nums"] = $comiis_pic_list[$temp["tid"]]["nums"] + 1;
			if ($comiis_pic_list[$temp["tid"]]["num"] < $repicnum) {
				$comiis_pic_list[$temp["tid"]]["num"] = $comiis_pic_list[$temp["tid"]]["num"] + 1;
				if ($comiis_pic_list[$temp["tid"]]["num"] == 1) {
					$comiis_pic_lista[$temp["tid"]]["aid"][] = $temp["aid"];
					$comiis_pic_lista[$temp["tid"]]["width"][] = $temp["width"];
					$comiis_pic_lista[$temp["tid"]]["attachment"][] = $temp["attachment"];
				}
				if ($comiis_pic_list[$temp["tid"]]["num"] <= 3) {
					$comiis_pic_list[$temp["tid"]]["aid"][] = $temp["aid"];
					$comiis_pic_list[$temp["tid"]]["width"][] = $temp["width"];
					$comiis_pic_list[$temp["tid"]]["attachment"][] = $temp["attachment"];
				}
				if ($comiis_pic_list[$temp["tid"]]["num"] <= 9) {
					$comiis_pic_lists[$temp["tid"]]["aid"][] = $temp["aid"];
					$comiis_pic_lists[$temp["tid"]]["width"][] = $temp["width"];
					$comiis_pic_lists[$temp["tid"]]["attachment"][] = $temp["attachment"];
				}
			}
		}
	}
}
if ($re_sn == "c3k9MkNvk90mZnsP6s") {
	require_once libfile("function/discuzcode");
	require_once libfile("function/post");
	$comiis_memberrecommend_array = array();
	if (count($_G["forum_threadlist"])) {
		$query = DB::query("SELECT f.tid, m.uid, m.username FROM `" . DB::table("forum_memberrecommend") . "` f INNER JOIN `" . DB::table("common_member") . "` m ON f.recommenduid=m.uid WHERE f.tid IN (" . dimplode($comiis_tids) . ") ORDER BY dateline DESC");
		if ($temp = DB::fetch($query)) {
			$comiis_memberrecommend_array[$temp["tid"]][$temp[uid]] = $temp;
		}
	}
	$comiis_reply_list_array = array();
	if (count($_G["forum_threadlist"])) {
		$commis_readlist_num = intval($comiis_app_switch["comiis_pyqlist_hfnum"]);
		if ($commis_readlist_num) {
			foreach ($comiis_tids as $temp) {
				$query = DB::query("SELECT tid, pid, message, author, authorid, dateline FROM `" . DB::table("forum_post") . "` WHERE tid='" . intval($temp) . "' AND invisible=0 AND status>=0 AND first=0 ORDER BY dateline DESC LIMIT " . $commis_readlist_num . ";");
				if ($temps = DB::fetch($query)) {
					$temps["encode_name"] = $temps["re_name"] = '';
					if (substr($temps["message"], 0, 7) == "[quote]") {
						preg_match_all("/^\\[quote\\].*?\\[color=#\\d+?\\](.*?)\\s/i", $temps["message"], $re_name);
						$temps["re_name"] = strlen($re_name[1][0]) ? $re_name[1][0] : '';
						$temps["encode_name"] = rawurlencode($temps["re_name"]);
					}
					$temps = discuzcode($temps["message"], 0, 0, 0, 1, 0, 0);
					$temps["message"] = comiis_messages($temps);
					$comiis_reply_list_array[$temps["tid"]][] = $temps;
				}
			}
		}
	}
} else {
	if ($re_sn == "jjOI1A55JVeuAvs15V" || $re_sn == "X7G6GddLn7gYdfN7NF") {
		if (count($_G["forum_threadlist"]) && $_G["uid"]) {
			$query = DB::query("SELECT tid,recommenduid FROM `" . DB::table("forum_memberrecommend") . "` WHERE recommenduid='" . $_G["uid"] . "' AND tid IN (" . dimplode($comiis_tids) . ")");
			if ($temp = DB::fetch($query)) {
				$_G["comiis_memberrecommend"][$temp["tid"]] = 1;
			}
		}
	}
}