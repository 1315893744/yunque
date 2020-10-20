<?php

	if (!defined("IN_DISCUZ")) {
		echo "Access Denied";
		return 0;
	}
	if (!empty($_GET["inajax"]) && $_GET["comiis_poster"] == "yes") {
		global $_G;
		global $comiis_poster_data;
		global $comiis_poster_mob;
		global $comiis_poster_url;
		global $comiis_poster;
		$plugin_id = "comiis_poster";
		global $comiis_poster_time;
		global $comiis_poster_info;
		global $comiis_poster_lang;
		global $comiis_poster;
		loadcache("plugin");
		$_var_10 = 0;
		$comiis_poster_mob = "view";
		$comiis_poster_data = array();
		loadcache("plugin");
		$comiis_poster = $_G["cache"]["plugin"]["comiis_poster"];
		$comiis_poster["bodybyte"] = intval($comiis_poster["bodybyte"]) ? intval($comiis_poster["bodybyte"]) : 300;
		if ($comiis_poster["code"]) {
			$comiis_poster_url = urlencode($comiis_poster["code"]);
		} else {
			$comiis_poster_url = urlencode((!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" || $_SERVER["SERVER_PORT"] == 443 ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . str_replace(array("?comiis_poster=yes&inajax=1", "&comiis_poster=yes&inajax=1"), '', $_SERVER["REQUEST_URI"]));
		}
		if ($_G["basescript"] == "forum" || $_G["basescript"] == "group") {
			if (CURMODULE == "forumdisplay") {
				$comiis_poster_mob = "list";
			} else {
				if (CURMODULE == "viewthread") {
					global $postlist;
					global $threadsortshow;
					$_var_13 = '';
					$_var_14 = array();
					if ($_G["forum_thread"]["special"] == 2) {
						global $trade;
						global $trades;
						if ($_GET["do"] == "tradeinfo") {
							$_var_13 = $trade["thumb"];
						} else {
							if (is_array($trades)) {
								foreach ($trades as $_var_17) {
									if ($_var_17["attachurl"]) {
										$_var_13 = $_var_17["attachurl"];
										break;
									}
								}
							}
						}
					} else {
						if ($_G["forum_thread"]["special"] == 4) {
							global $activity;
							$_var_13 = $activity["thumb"];
						} else {
							if (is_array($threadsortshow["optionlist"])) {
								foreach ($threadsortshow["optionlist"] as $_var_17) {
									if ($_var_17["type"] == "image") {
										$_var_13 = $_var_17["value"];
										break;
									}
								}
							}
						}
					}
					foreach ($postlist as $_var_19) {
						if ($_var_19["first"]) {
							foreach ($_var_19["attachments"] as $_var_17) {
								if ($_var_17["isimage"] == "1") {
									$_var_14 = $_var_17;
									break;
								}
							}
							$_var_20 = messagecutstr(str_replace(array("\r\n", "\r", "\n", "replyreload += ',' + " . $_var_19[pid] . ";", "'", "'"), '', strip_tags($_var_19["message"])), $comiis_poster["bodybyte"]);
							break;
						}
					}
					$comiis_poster_data = array("pic" => $_var_13 ? $_var_13 : $_var_14["url"] . $_var_14["attachment"], "title" => $_G["forum_thread"]["subject"], "icon" => '', "user" => '', "time" => dgmdate($_G["forum_thread"]["dateline"], "d<\\s\\p\\a\\n>Y/m</\\s\\p\\a\\n>"), "message" => $_var_20);
					if ($comiis_poster["isusername"] == 1) {
						$comiis_poster_data["icon"] = $_G["setting"]["ucenterurl"] . "/avatar.php?uid=" . $_G["forum_thread"]["authorid"] . "&size=small";
						$comiis_poster_data["user"] = $_G["forum_thread"]["author"];
					} else {
						if ($comiis_poster["isusername"] == 2) {
							$comiis_poster_data["icon"] = $_G["forum"]["icon"] ? get_forumimg($_G["forum"]["icon"]) : '';
							$comiis_poster_data["user"] = $_G["forum"]["name"];
						}
					}
				}
			}
		} else {
			if ($_G["basescript"] == "portal" && CURMODULE == "view") {
				global $article;
				global $cat;
				$comiis_poster_data = array("pic" => $article["thumb"] == 1 ? str_replace(".thumb.jpg", '', $article["pic"]) : '', "title" => $article["title"], "icon" => '', "user" => '', "time" => '', "message" => cutstr($article["summary"], $comiis_poster["bodybyte"]));
				if ($comiis_poster["isusername"] == 1) {
					$comiis_poster_data["icon"] = $_G["setting"]["ucenterurl"] . "/avatar.php?uid=" . $article["uid"] . "&size=small";
					$comiis_poster_data["user"] = $article["username"];
				} else {
					if ($comiis_poster["isusername"] == 2) {
						$comiis_poster_data["icon"] = $comiis_poster["logoimg"] ? $comiis_poster["logoimg"] : "./source/plugin/comiis_poster/image/logo.png";
						$comiis_poster_data["user"] = $cat["catname"];
					}
				}
			} else {
				if ($_G["basescript"] == "home" && CURMODULE == "space") {
					if ($_GET["do"] == "blog" && !empty($_GET["id"])) {
						global $blog;
						$comiis_poster_data = array("pic" => $blog["pic"] ? "data/attachment/album/" . str_replace(".thumb.jpg", '', $blog["pic"]) : '', "title" => $blog["subject"], "icon" => '', "user" => '', "time" => dgmdate($blog["dateline"], "d<\\s\\p\\a\\n>Y/m</\\s\\p\\a\\n>"), "message" => cutstr(strip_tags($blog["message"]), $comiis_poster["bodybyte"]));
						if ($comiis_poster["isusername"] == 0) {
							$comiis_poster_data["icon"] = '';
							$comiis_poster_data["user"] = '';
						}
					} else {
						if ($_GET["do"] == "album" && !empty($_GET["id"])) {
							global $album;
							global $list;
							$comiis_poster_data = array("pic" => $list[0]["pic"] ? str_replace(".thumb.jpg", '', $list[0]["pic"]) : '', "title" => $album["albumname"], "icon" => $_G["setting"]["ucenterurl"] . "/avatar.php?uid=" . $album["uid"] . "&size=small", "user" => $album["username"], "time" => dgmdate($album["dateline"], "d<\\s\\p\\a\\n>Y/m</\\s\\p\\a\\n>"), "message" => cutstr(strip_tags($album["depict"]), $comiis_poster["bodybyte"]));
							if ($comiis_poster["isusername"] == 0) {
								$comiis_poster_data["icon"] = '';
								$comiis_poster_data["user"] = '';
							}
						} else {
							if ($_GET["do"] == "album" && !empty($_GET["picid"])) {
								global $pic;
								global $album;
								$comiis_poster_data = array("pic" => $pic["pic"] ? $pic["pic"] : '', "title" => $album["albumname"], "icon" => $_G["setting"]["ucenterurl"] . "/avatar.php?uid=" . $album["uid"] . "&size=small", "user" => $album["username"], "time" => dgmdate($album["dateline"], "d<\\s\\p\\a\\n>Y/m</\\s\\p\\a\\n>"), "message" => cutstr(strip_tags($album["depict"]), $comiis_poster["bodybyte"]));
								if ($comiis_poster["isusername"] == 0) {
									$comiis_poster_data["icon"] = '';
									$comiis_poster_data["user"] = '';
								}
							}
						}
					}
				}
			}
		}
		if ($comiis_poster_mob == "view") {
			if ($comiis_poster["o_image"] == 1) {
				$comiis_poster_data["pic"] = '';
			} else {
				if ($comiis_poster["openimage"] == 1) {
					if ($comiis_poster_data["pic"]) {
						$comiis_poster_data["pic"] = "./plugin.php?id=comiis_poster:comiis_poster_image&src=" . urlencode($comiis_poster_data["pic"]);
					}
					if ($comiis_poster_data["icon"]) {
						$comiis_poster_data["icon"] = "./plugin.php?id=comiis_poster:comiis_poster_image&src=" . urlencode($comiis_poster_data["icon"]);
					}
				}
			}
		}
	}
