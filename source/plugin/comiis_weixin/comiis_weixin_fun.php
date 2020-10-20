<?php

function comiis_wx_match412($_arg_0)
{
	return !(strlen($_arg_0[0]) < 4) ? '' : $_arg_0[0];
}
function comiis_wx_filterEmoji12($_arg_0)
{
	$_arg_0 = preg_replace_callback("/./u", "comiis_wx_match412", $_arg_0);
	$_arg_0 = diconv($_arg_0, "utf-8", "gbk");
	$_arg_0 = diconv($_arg_0, "gbk", "utf-8");
	$_arg_0 = comiis_wx_safe_replace($_arg_0, 1);
	$_arg_0 = trim($_arg_0);
	$_arg_0 = str_replace(array(" ", "\t", "\n", "\r"), '', $_arg_0);
	return $_arg_0;
}
function comiis_wx_safe_replace($_arg_0, $_arg_1 = 1)
{
	$_arg_0 = str_replace("%20", '', $_arg_0);
	$_arg_0 = str_replace("%27", '', $_arg_0);
	$_arg_0 = str_replace("%2527", '', $_arg_0);
	$_arg_0 = str_replace("*", '', $_arg_0);
	$_arg_0 = str_replace("\"", $_arg_1 ? '' : "&quot;", $_arg_0);
	$_arg_0 = str_replace("'", '', $_arg_0);
	$_arg_0 = str_replace("\"", '', $_arg_0);
	$_arg_0 = str_replace(";", '', $_arg_0);
	$_arg_0 = str_replace("<", $_arg_1 ? '' : "&lt;", $_arg_0);
	$_arg_0 = str_replace(">", $_arg_1 ? '' : "&gt;", $_arg_0);
	$_arg_0 = str_replace("{", '', $_arg_0);
	$_arg_0 = str_replace("}", '', $_arg_0);
	$_arg_0 = str_replace("\\", '', $_arg_0);
	return $_arg_0;
}

	if (!defined("IN_DISCUZ")) {
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
	global $comiis_state;
	global $re_weixin_data;
	$navtitle = $key = $user_id = $username = '';
	$comiis_foot = $comiis_isweixin = $comiis_wxre = 0;
	$_var_13 = $_var_14 = $comiis_weixin_time = $comiis_weixin_info = $comiis_is_weixin_user = array();
	loadcache("plugin");
	$_G["comiis_weixin"] = $_G["cache"]["plugin"]["comiis_weixin"];
	$plugin_id = "comiis_weixin";
	$_var_16 = 0;
	//zzb7.taobao.com
	$comiis_isweixin = !(strpos($_SERVER["HTTP_USER_AGENT"], "MicroMessenger") === false) ? true : false;
	require_once DISCUZ_ROOT . "./source/plugin/comiis_weixin/source/function_comiis_weixin.php";
	comiis_get_weixin_lang();
	if ($_GET["mod"] != "mobile_qrcode") {
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"source/plugin/comiis_weixin/style/comiis.css\" /><style>body.bg {background:#f3f3f3;}</style>";
	}
	if (!in_array($_GET["mod"], array("wxlogin", "mobile_qrcode", "weixin_wait")) && $comiis_isweixin == false) {
		comiis_get_weixin_tip($_G["comiis_wxlang"]["051"], 0);
	}
	if (!empty($_GET["state"]) && strlen($_GET["state"]) == 8) {
		$comiis_state = trim(dhtmlspecialchars(daddslashes($_GET["state"])));
		$_var_17 = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin_key") . " WHERE `key`='" . $comiis_state . "'");
		if ($_var_17["key"] == $comiis_state) {
			if ($_var_17["time"] < TIMESTAMP - 330) {
				comiis_get_weixin_tip($_G["comiis_wxlang"]["052"], 0);
			}
		} else {
			comiis_get_weixin_tip($_G["comiis_wxlang"]["053"], 0);
		}
	} else {
		$comiis_state = 0;
	}
	if ($_G["uid"] && $comiis_state === 0 && !in_array($_GET["mod"], array("wxlogin", "mobile_qrcode", "weixin_wait", "wxbd", "wxbd_mob"))) {
		dheader("Location:" . $_GET["referer"]);
	}
	//www-zzb7-net
	DB::query("DELETE FROM " . DB::table("comiis_weixin") . " WHERE uid='0' AND dateline<'" . (TIMESTAMP - 900) . "'");
	if ($_GET["mod"] == "wxlogin") {
		$key = substr(md5($_G["uid"] . $_G["cookie"]["saltkey"]), 0, 8);
		DB::query("DELETE FROM " . DB::table("comiis_weixin_key") . " WHERE time<'" . (TIMESTAMP - 600) . "'");
		$_var_18 = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin_key") . " WHERE `key`='" . $key . "'");
		if ($_var_18["key"] == $key) {
			DB::update("comiis_weixin_key", array("uid" => $_G["uid"], "type" => $_GET["wxdel"] == "yes" ? 2 : ($_G["uid"] ? 1 : 0), "time" => TIMESTAMP), DB::field("key", $key));
		} else {
			DB::insert("comiis_weixin_key", array("key" => $key, "uid" => $_G["uid"], "type" => $_GET["wxdel"] == "yes" ? 2 : ($_G["uid"] ? 1 : 0), "time" => TIMESTAMP));
		}
		if (defined("IN_MOBILE") && $comiis_isweixin) {
			$_var_19 = comiis_get_weixin_login_url($key, 0, 1);
			dheader("Location:" . $_var_19);
		} else {
			$comiis_is_weixin_user = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin") . " WHERE `uid`='" . $_G["uid"] . "'");
		}
	} else {
		if ($_GET["mod"] == "mobile_qrcode") {
			$_var_19 = comiis_get_weixin_login_url($_GET["key"]);
			require_once DISCUZ_ROOT . "./source/plugin/mobile/qrcode.class.php";
			echo QRcode::png($_var_19, false, 4, 4);
		} else {
			if ($_GET["mod"] == "weixin_wait") {
				$comiis_wxre = 0;
				$key = trim(dhtmlspecialchars(daddslashes($_GET["key"])));
				$_var_20 = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin_key") . " WHERE `key`='" . $key . "'");
				if ($_G["uid"] && $_var_20["type"] == 7) {
					DB::query("DELETE FROM " . DB::table("comiis_weixin_key") . " WHERE `key`='" . $comiis_state . "'");
					$comiis_wxre = 1;
				} else {
					if ($_G["uid"]) {
						if ($_var_20["type"] == 6 && $_var_20["uid"] == $_G["uid"]) {
							DB::update("comiis_weixin", array("edit" => 1), DB::field("uid", $_G["uid"]));
							DB::query("DELETE FROM " . DB::table("comiis_weixin_key") . " WHERE `key`='" . $key . "'");
							$comiis_wxre = 1;
						}
					} else {
						if ($_var_20["type"] == 5 && $_var_20["uid"]) {
							include_once libfile("function/member");
							$_var_21 = getuserbyuid($_var_20["uid"], 1);
							setloginstatus($_var_21, 1296000);
							DB::query("DELETE FROM " . DB::table("comiis_weixin_key") . " WHERE `key`='" . $key . "'");
							$comiis_wxre = 1;
						}
					}
				}
			} else {
				if ($_GET["mod"] == "wxbd" || $_GET["mod"] == "wxbd_mob") {
					if ($comiis_state === 0) {
						comiis_get_weixin_tip($_G["comiis_wxlang"]["054"], 0);
					} else {
						if ($_var_17["uid"] && $_var_17["type"] == 1) {
							$_var_22 = json_decode(dfsockopen("https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $_G["comiis_weixin"]["appid"] . "&secret=" . $_G["comiis_weixin"]["appsecret"] . "&code=" . $_GET["code"] . "&grant_type=authorization_code"), true);
							if ($_var_22["openid"] && $_var_22["access_token"]) {
								$_var_23 = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin") . " WHERE `openid`='" . $_var_22["openid"] . "'");
								if ($_var_23["uid"]) {
									comiis_get_weixin_tip($_G["comiis_wxlang"]["055"], 0);
								} else {
									$_var_24 = json_decode(dfsockopen("https://api.weixin.qq.com/sns/userinfo?access_token=" . $_var_22["access_token"] . "&openid=" . $_var_22["openid"] . "&lang=zh_CN"), true);
									if ($_G["comiis_weixin"]["wxnotip"] == 1 && $_var_22["scope"] == "snsapi_base" && $_var_24["errcode"]) {
										dheader("Location:" . comiis_get_weixin_login_url($key, 1, 1));
									}
									if ($_var_24["openid"]) {
										$_var_24["nickname"] = comiis_wx_filterEmoji12($_var_24["nickname"]);
										if (CHARSET != "utf-8") {
											foreach ($_var_24 as $_var_25 => $_var_26) {
												$_var_24[$_var_25] = diconv($_var_26, "utf-8", CHARSET);
											}
										}
										$_var_27 = TIMESTAMP;
										$user_id = md5($_var_24["openid"] . "_comiis");
										if ($_var_23["openid"] != $_var_24["openid"]) {
											DB::insert("comiis_weixin", array("user_id" => $user_id, "uid" => $_var_17["uid"], "openid" => $_var_24["openid"], "nickname" => $_var_24["nickname"], "sex" => $_var_24["sex"], "city" => $_var_24["city"], "province" => $_var_24["province"], "country" => $_var_24["country"], "headimgurl" => $_var_24["headimgurl"], "privilege" => serialize($_var_24["privilege"]), "unionid" => $_var_24["unionid"], "dateline" => $_var_27, "lastdate" => $_var_27));
										} else {
											DB::update("comiis_weixin", array("uid" => $_var_17["uid"], "nickname" => $_var_24["nickname"], "headimgurl" => $_var_24["headimgurl"], "sex" => $_var_24["sex"], "city" => $_var_24["city"], "province" => $_var_24["province"], "country" => $_var_24["country"], "privilege" => serialize($_var_24["privilege"]), "unionid" => $_var_24["unionid"], "dateline" => $_var_27, "lastdate" => TIMESTAMP), DB::field("openid", $_var_24["openid"]));
										}
										if ($_GET["mod"] == "wxbd_mob") {
											DB::query("DELETE FROM " . DB::table("comiis_weixin_key") . " WHERE `key`='" . $comiis_state . "'");
											DB::update("comiis_weixin", array("edit" => 1), DB::field("uid", $_G["uid"]));
										} else {
											DB::update("comiis_weixin_key", array("type" => "6"), DB::field("key", $comiis_state));
										}
										include_once libfile("function/member");
										$_var_21 = getuserbyuid($_var_17["uid"], 1);
										setloginstatus($_var_21, 1296000);
										comiis_get_weixin_tip($_G["comiis_wxlang"]["056"], 1);
									} else {
										comiis_get_weixin_tip($_G["comiis_wxlang"]["057"], 0);
									}
								}
							} else {
								comiis_get_weixin_tip($_G["comiis_wxlang"]["058"] . ":" . $_var_22["errcode"], 0);
							}
						} else {
							if ($_var_17["uid"] && $_var_17["type"] == 2) {
								$_var_22 = json_decode(dfsockopen("https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $_G["comiis_weixin"]["appid"] . "&secret=" . $_G["comiis_weixin"]["appsecret"] . "&code=" . $_GET["code"] . "&grant_type=authorization_code"), true);
								if ($_var_22["openid"] && $_var_22["access_token"]) {
									$_var_23 = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin") . " WHERE `uid`='" . $_var_17["uid"] . "' && openid='" . $_var_22["openid"] . "'");
									if ($_var_23["uid"] == $_var_17["uid"]) {
										if ($_var_23["edit"] == 1) {
											DB::query("DELETE FROM " . DB::table("comiis_weixin") . " WHERE `uid`='" . $_var_17["uid"] . "'");
											if ($_GET["mod"] == "wxbd_mob") {
												DB::query("DELETE FROM " . DB::table("comiis_weixin_key") . " WHERE `key`='" . $comiis_state . "'");
											} else {
												DB::update("comiis_weixin_key", array("type" => "7"), DB::field("key", $comiis_state));
											}
											comiis_get_weixin_tip($_G["comiis_wxlang"]["059"], 1);
										} else {
											comiis_get_weixin_tip($_G["comiis_wxlang"]["060"], 0);
										}
									} else {
										comiis_get_weixin_tip($_G["comiis_wxlang"]["061"], 0);
									}
								}
							} else {
								comiis_get_weixin_tip($_G["comiis_wxlang"]["062"], 0);
							}
						}
					}
				} else {
					if ($_GET["mod"] == "login") {
						$_var_22 = json_decode(dfsockopen("https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $_G["comiis_weixin"]["appid"] . "&secret=" . $_G["comiis_weixin"]["appsecret"] . "&code=" . $_GET["code"] . "&grant_type=authorization_code"), true);
						if ($_var_22["openid"] && $_var_22["access_token"]) {
							$_var_23 = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin") . " WHERE `openid`='" . $_var_22["openid"] . "'");
							if ($_var_23["uid"]) {
								include_once libfile("function/member");
								$_var_21 = getuserbyuid($_var_23["uid"], 1);
								if (empty($_var_21["uid"]) || $_var_23["start"] == 0) {
									comiis_get_weixin_tip($_G["comiis_wxlang"]["075"], 0);
								}
								
								DB::update("comiis_weixin", array("num" => intval($_var_23["num"]) + 1, "lastdate" => TIMESTAMP), DB::field("uid", $_var_23["uid"]));
								if ($comiis_state === 0) {
									setloginstatus($_var_21, 1296000);
									dheader("Location: " . $_GET["referer"] . '');
								} else {
									setloginstatus($_var_21, 1296000);
									DB::update("comiis_weixin_key", array("uid" => $_var_23["uid"], "type" => "5"), DB::field("key", $comiis_state));
									comiis_get_weixin_tip($_G["comiis_wxlang"]["063"], 1);
								}
							} else {
								if (!$_var_23["openid"]) {
									$_var_24 = json_decode(dfsockopen("https://api.weixin.qq.com/sns/userinfo?access_token=" . $_var_22["access_token"] . "&openid=" . $_var_22["openid"] . "&lang=zh_CN"), true);
									if ($_G["comiis_weixin"]["wxnotip"] == 1 && $_var_22["scope"] == "snsapi_base" && $_var_24["errcode"]) {
										dheader("Location:" . comiis_get_weixin_login_url('', 1));
									}
									if ($_var_24["openid"]) {
										$_var_24["nickname"] = comiis_wx_filterEmoji12($_var_24["nickname"]);
										if (CHARSET != "utf-8") {
											foreach ($_var_24 as $_var_25 => $_var_26) {
												$_var_24[$_var_25] = diconv($_var_26, "utf-8", CHARSET);
											}
										}
										$_var_27 = TIMESTAMP;
										$user_id = md5($_var_24["openid"] . "_comiis");
										if ($_var_23["openid"] != $_var_24["openid"]) {
											DB::insert("comiis_weixin", array("user_id" => $user_id, "uid" => "0", "openid" => $_var_24["openid"], "nickname" => $_var_24["nickname"], "sex" => $_var_24["sex"], "city" => $_var_24["city"], "province" => $_var_24["province"], "country" => $_var_24["country"], "headimgurl" => $_var_24["headimgurl"], "privilege" => serialize($_var_24["privilege"]), "unionid" => $_var_24["unionid"], "dateline" => $_var_27, "lastdate" => $_var_27));
										} else {
											DB::update("comiis_weixin", array("nickname" => $_var_24["nickname"], "sex" => $_var_24["sex"], "city" => $_var_24["city"], "province" => $_var_24["province"], "country" => $_var_24["country"], "headimgurl" => $_var_24["headimgurl"], "privilege" => serialize($_var_24["privilege"]), "unionid" => $_var_24["unionid"], "dateline" => $_var_27, "lastdate" => TIMESTAMP), DB::field("openid", $_var_24["openid"]));
										}
									} else {
										comiis_get_weixin_tip($_G["comiis_wxlang"]["064"], 0);
									}
								} else {
									$user_id = md5($_var_23["openid"] . "_comiis");
								}
								if ($_G["comiis_weixin"]["wxuser"] == 1) {
									loaducenter();
									$_var_28 = $_var_23["nickname"] ? $_var_23["nickname"] : $_var_24["nickname"];
									if (uc_get_user($_var_28)) {
										dheader("Location:plugin.php?id=comiis_weixin&mod=login_tip&tipname=yes&user_id=" . $user_id . ($comiis_state ? "&state=" . $comiis_state : '') . "&referer=" . urlencode($_GET["referer"]));
										return 0;
									}
								}
								if ($_G["comiis_weixin"]["perfect"] == 1) {
									dheader("Location:plugin.php?id=comiis_weixin&mod=login_tip&user_id=" . $user_id . ($comiis_state ? "&state=" . $comiis_state : '') . "&referer=" . urlencode($_GET["referer"]));
								} else {
									if ($_G["comiis_weixin"]["perfect"] == 2) {
										dheader("Location:plugin.php?id=comiis_weixin&mod=login_perfect&user_id=" . $user_id . ($comiis_state ? "&state=" . $comiis_state : '') . "&referer=" . urlencode($_GET["referer"]));
									} else {
										dheader("Location:plugin.php?id=comiis_weixin&mod=login_mod&user_id=" . $user_id . ($comiis_state ? "&state=" . $comiis_state : '') . "&referer=" . urlencode($_GET["referer"]));
									}
								}
							}
						} else {
							comiis_get_weixin_tip($_G["comiis_wxlang"]["058"] . ":" . $_var_22["errcode"], 0);
						}
					} else {
						if ($_GET["mod"] == "login_tip" || $_GET["mod"] == "login_perfect") {
							global $username;
							global $username2;
							$user_id = addslashes($_GET["user_id"]);
							$re_weixin_data = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin") . " WHERE `user_id`='" . $user_id . "'");
							$username2 = trim($re_weixin_data["nickname"]);
							if ($_GET["mod"] == "login_perfect") {
								if (md5($re_weixin_data["openid"] . "_comiis") != $user_id) {
									comiis_get_weixin_tip($_G["comiis_wxlang"]["058"] . ":0x0000", 0);
								} else {
									if ($re_weixin_data["uid"]) {
										comiis_get_weixin_tip($_G["comiis_wxlang"]["065"], 0);
									}
								}
								$username = trim($re_weixin_data["nickname"]);
								$_var_30 = dstrlen($username);
								if ($_var_30 < 3) {
									$username = $username . mt_rand(100000, 999999);
								}
								if ($_var_30 > 15) {
									$username = cutstr($username, 15, '');
								}
								loaducenter();
								if (uc_get_user($username)) {
									$username = cutstr($username, 10, '');
									$username = $username . mt_rand(10000, 99999);
								}
							}
							$navtitle = $_G["comiis_wxlang"]["043"];
							$comiis_foot = "no";
						} else {
							if ($_GET["mod"] == "login_mod") {
								if (!submitcheck("submit")) {
									if ($_G["comiis_weixin"]["perfect"] == 0 || $_G["comiis_weixin"]["perfect"] == 1) {
										loaducenter();
										$user_id = addslashes($_GET["user_id"]);
										$re_weixin_data = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin") . " WHERE `user_id`='" . $user_id . "'");
										if (md5($re_weixin_data["openid"] . "_comiis") != $user_id) {
											comiis_get_weixin_tip($_G["comiis_wxlang"]["066"], 0);
										} else {
											if ($re_weixin_data["uid"]) {
												comiis_get_weixin_tip($_G["comiis_wxlang"]["065"], 0);
											}
										}
										$username = trim($re_weixin_data["nickname"]);
										$_var_30 = dstrlen($username);
										if ($_var_30 < 3) {
											$username = $username . mt_rand(100000, 999999);
										}
										if ($_var_30 > 15) {
											$username = cutstr($username, 15, '');
										}
										if (uc_get_user($username)) {
											$username = cutstr($username, 10, '');
											$username = $username . mt_rand(10000, 99999);
										}
										
										$_var_31 = md5(random(16));
										$_var_32 = strtolower(random(10)) . ($_G["comiis_weixin"]["email"] ? $_G["comiis_weixin"]["email"] : "@comiis.com");
										$_var_33 = $_G["comiis_weixin"]["groupid"] ? $_G["comiis_weixin"]["groupid"] : $_G["setting"]["newusergroupid"];
										$_var_34 = uc_user_register(addslashes($username), $_var_31, $_var_32, '', '', $_G["clientip"]);
										if ($_var_34 <= 0) {
											if ($_var_34 == -1) {
												showmessage("profile_username_illegal");
											} else {
												if ($_var_34 == -2) {
													showmessage("profile_username_protect");
												} else {
													if ($_var_34 == -3) {
														showmessage("profile_username_duplicate");
													} else {
														if ($_var_34 == -4) {
															showmessage("profile_email_illegal");
														} else {
															if ($_var_34 == -5) {
																showmessage("profile_email_domain_illegal");
															} else {
																if ($_var_34 == -6) {
																	showmessage("profile_email_duplicate");
																} else {
																	showmessage("undefined_action");
																}
															}
														}
													}
												}
											}
											return $_var_34;
										}
										$_var_35 = array("credits" => explode(",", $_G["setting"]["initcredits"]));
										C::t("common_member")->insert($_var_34, $username, md5($_var_31 . time()), $_var_32, $_G["clientip"], $_var_33, $_var_35);
										DB::update("comiis_weixin", array("uid" => $_var_34), DB::field("id", $re_weixin_data["id"]));
										if ($_G["setting"]["regctrl"] || $_G["setting"]["regfloodctrl"]) {
											C::t("common_regip")->delete_by_dateline($_G["timestamp"] - ($_G["setting"]["regctrl"] > 72 ? $_G["setting"]["regctrl"] : 72) * 3600);
											if ($_G["setting"]["regctrl"]) {
												C::t("common_regip")->insert(array("ip" => $_G["clientip"], "count" => -1, "dateline" => $_G["timestamp"]));
											}
										}
										if ($_G["setting"]["regverify"] == 2) {
											C::t("common_member_validate")->insert(array("uid" => $_var_34, "submitdate" => $_G["timestamp"], "moddate" => 0, "admin" => '', "submittimes" => 1, "status" => 0, "message" => '', "remark" => ''), false, true);
											manage_addnotify("verifyuser");
										}
										DB::update("common_member_profile", array("resideprovince" => comiis_wx_get_district($re_weixin_data["province"], 1), "residecity" => comiis_wx_get_district($re_weixin_data["city"], 2), "gender" => $re_weixin_data["sex"]), array("uid" => $_var_34));
										if ($re_weixin_data["headimgurl"]) {
											comiis_wx_avatar($_var_34, $re_weixin_data["headimgurl"]);
										}
										include_once libfile("function/stat");
										updatestat("register");
										require_once libfile("cache/userstats", "function");
										build_cache_userstats();
										if ($comiis_state === 0) {
											include_once libfile("function/member");
											$_var_21 = getuserbyuid($_var_34, 1);
											setloginstatus($_var_21, 1296000);
											dheader("Location: " . $_GET["referer"] . '');
										} else {
											include_once libfile("function/member");
											$_var_21 = getuserbyuid($_var_34, 1);
											setloginstatus($_var_21, 1296000);
											DB::update("comiis_weixin_key", array("uid" => $_var_34, "type" => "5"), DB::field("key", $comiis_state));
											comiis_get_weixin_tip($_G["comiis_wxlang"]["063"], 1);
										}
									} else {
										comiis_get_weixin_tip($_G["comiis_wxlang"]["067"], 0);
									}
								} else {
									if (FORMHASH == $_GET["formhash"] && strlen($_GET["user_id"]) == 32) {
										$re_weixin_data = DB::fetch_first("SELECT * FROM " . DB::table("comiis_weixin") . " WHERE `user_id`='" . addslashes($_GET["user_id"]) . "'");
										if (md5($re_weixin_data["openid"] . "_comiis") != $_GET["user_id"]) {
											comiis_get_weixin_tip($_G["comiis_wxlang"]["066"], 0);
										} else {
											if ($re_weixin_data["uid"]) {
												comiis_get_weixin_tip($_G["comiis_wxlang"]["065"], 0);
											}
										}
										if ($_GET["lmob"] == "login") {
											include_once libfile("function/member");
											if (!($_var_36 = logincheck($_GET["username"]))) {
												showmessage("login_strike");
											}
											if (!$_GET["password"] || $_GET["password"] != addslashes($_GET["password"])) {
												showmessage("profile_passwd_illegal");
											}
											$_var_37 = userlogin($_GET["username"], $_GET["password"], $_GET["questionid"], $_GET["answer"], $_G["setting"]["autoidselect"] ? "auto" : $_GET["loginfield"], $_G["clientip"]);
											if ($_var_37["status"] <= 0) {
												loginfailed($_GET["username"]);
												failedip();
												showmessage("login_invalid", '', array("loginperm" => $_var_36 - 1));
											}
											if ($_var_37["member"]["uid"]) {
												$_var_38 = DB::fetch_first("SELECT uid FROM " . DB::table("comiis_weixin") . " WHERE `uid`='" . $_var_37["member"]["uid"] . "'");
												if ($_var_38["uid"]) {
													comiis_get_weixin_tip($_G["comiis_wxlang"]["068"], 0);
												}
												DB::update("comiis_weixin", array("uid" => $_var_37["member"]["uid"], "edit" => 1), DB::field("id", $re_weixin_data["id"]));
												if ($comiis_state === 0) {
													$_var_21 = getuserbyuid($_var_37["member"]["uid"], 1);
													setloginstatus($_var_21, 1296000);
													dheader("Location: " . $_GET["referer"] . '');
												} else {
													include_once libfile("function/member");
													$_var_21 = getuserbyuid($_var_37["member"]["uid"], 1);
													setloginstatus($_var_21, 1296000);
													DB::update("comiis_weixin_key", array("uid" => $_var_37["member"]["uid"], "type" => "5"), DB::field("key", $comiis_state));
													comiis_get_weixin_tip($_G["comiis_wxlang"]["063"], 1);
												}
											}
										} else {
											if ($_GET["lmob"] == "register") {
												$username = dhtmlspecialchars(trim($_GET["username"]));
												$_var_30 = dstrlen($username);
												if ($_var_30 < 3) {
													showmessage("profile_username_tooshort");
												} else {
													if ($_var_30 > 15) {
														showmessage("profile_username_toolong");
													}
												}
												loaducenter();
												if (uc_get_user(addslashes($username)) || C::t("common_member")->fetch_uid_by_username($username) || C::t("common_member_archive")->fetch_uid_by_username($username)) {
													showmessage("profile_username_duplicate");
												}
												include_once libfile("function/member");
												if (!$_GET["password"] || $_GET["password"] != addslashes($_GET["password"])) {
													showmessage("profile_passwd_illegal");
												}
												if ($_G["setting"]["pwlength"]) {
													if (strlen($_GET["password"]) < $_G["setting"]["pwlength"]) {
														showmessage("profile_password_tooshort", '', array("pwlength" => $_G["setting"]["pwlength"]));
													}
												}
												$_var_31 = addslashes($_GET["password"]);
												$_var_32 = strtolower(random(10)) . ($_G["comiis_weixin"]["email"] ? $_G["comiis_weixin"]["email"] : "@comiis.com");
												$_var_33 = $_G["comiis_weixin"]["groupid"] ? $_G["comiis_weixin"]["groupid"] : $_G["setting"]["newusergroupid"];
												$_var_34 = uc_user_register(addslashes($username), $_var_31, $_var_32, '', '', $_G["clientip"]);
												if ($_var_34 <= 0) {
													if ($_var_34 == -1) {
														showmessage("profile_username_illegal");
													} else {
														if ($_var_34 == -2) {
															showmessage("profile_username_protect");
														} else {
															if ($_var_34 == -3) {
																showmessage("profile_username_duplicate");
															} else {
																if ($_var_34 == -4) {
																	showmessage("profile_email_illegal");
																} else {
																	if ($_var_34 == -5) {
																		showmessage("profile_email_domain_illegal");
																	} else {
																		if ($_var_34 == -6) {
																			showmessage("profile_email_duplicate");
																		} else {
																			showmessage("undefined_action");
																		}
																	}
																}
															}
														}
													}
													return $_var_34;
												}
												$_var_35 = array("credits" => explode(",", $_G["setting"]["initcredits"]));
												C::t("common_member")->insert($_var_34, $username, md5($_var_31 . time()), $_var_32, $_G["clientip"], $_var_33, $_var_35);
												DB::update("comiis_weixin", array("uid" => $_var_34, "edit" => 1), DB::field("id", $re_weixin_data["id"]));
												if ($_G["setting"]["regctrl"] || $_G["setting"]["regfloodctrl"]) {
													C::t("common_regip")->delete_by_dateline($_G["timestamp"] - ($_G["setting"]["regctrl"] > 72 ? $_G["setting"]["regctrl"] : 72) * 3600);
													if ($_G["setting"]["regctrl"]) {
														C::t("common_regip")->insert(array("ip" => $_G["clientip"], "count" => -1, "dateline" => $_G["timestamp"]));
													}
												}
												if ($_G["setting"]["regverify"] == 2) {
													C::t("common_member_validate")->insert(array("uid" => $_var_34, "submitdate" => $_G["timestamp"], "moddate" => 0, "admin" => '', "submittimes" => 1, "status" => 0, "message" => '', "remark" => ''), false, true);
													manage_addnotify("verifyuser");
												}
												
												DB::update("common_member_profile", array("resideprovince" => comiis_wx_get_district($re_weixin_data["province"], 1), "residecity" => comiis_wx_get_district($re_weixin_data["city"], 2), "gender" => $re_weixin_data["sex"]), array("uid" => $_var_34));
												if ($re_weixin_data["headimgurl"]) {
													comiis_wx_avatar($_var_34, $re_weixin_data["headimgurl"]);
												}
												include_once libfile("function/stat");
												updatestat("register");
												require_once libfile("cache/userstats", "function");
												build_cache_userstats();
												if ($comiis_state === 0) {
													setloginstatus(array("uid" => $_var_34, "username" => $username, "password" => $_var_31, "groupid" => $_var_33), 1296000);
													dheader("Location: " . $_GET["referer"] . '');
												} else {
													include_once libfile("function/member");
													setloginstatus(array("uid" => $_var_34, "username" => $username, "password" => $_var_31, "groupid" => $_var_33), 1296000);
													DB::update("comiis_weixin_key", array("uid" => $_var_34, "type" => "5"), DB::field("key", $comiis_state));
													comiis_get_weixin_tip($_G["comiis_wxlang"]["063"], 1);
												}
											}
										}
									} else {
										comiis_get_weixin_tip($_G["comiis_wxlang"]["069"], 0);
									}
								}
							}
						}
					}
				}
			}
		}
	}
