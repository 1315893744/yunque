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
if (!submitcheck("comiis_submit")) {
	$comiis_value = DB::fetch_all("SELECT * FROM %t", array("comiis_app_switch"), "name");
	showformheader($plugin_url);
	showtableheader($comiis_app_lang["227"]);
	showsetting($comiis_app_lang["228"], "comiis_app[comiis_key]", $comiis_value["comiis_key"]["value"], "text", '', '', $comiis_app_lang["229"]);
	showtablefooter();
	showtableheader($comiis_app_lang["329"]);
	showsetting($comiis_app_lang["330"], "comiis_app[comiis_app_del]", $comiis_value["comiis_app_del"]["value"], "radio", '', '', $comiis_app_lang["331"]);
	showsubmit("comiis_submit", "submit");
	showtablefooter();
	showformfooter();
} else {
	if (is_array($_GET["comiis_app"])) {
		include_once DISCUZ_ROOT . "./source/plugin/comiis_app/language/language." . currentlang() . ".php";
		$comiis_app_switch_data = DB::fetch_all("SELECT name FROM %t", array("comiis_app_switch"), "name");
		foreach ($comiis_app_switch_insert as $k => $v) {
			if (!isset($comiis_app_switch_data[$k])) {
				DB::insert("comiis_app_switch", array("name" => $k, "value" => $v));
			}
		}
		$tpl = dir(DISCUZ_ROOT . "./data/template");
		if ($entry = $tpl->read()) {
			if (preg_match("/\\.tpls\\.php\$/", $entry)) {
				@unlink(DISCUZ_ROOT . "./data/template/" . $entry);
			}
		}
		$tpl->close();
		DB::update("comiis_app_switch", array("value" => intval($_GET["comiis_app"]["comiis_app_del"])), DB::field("name", "comiis_app_del"));
		comiis_app_up_switch();
		cpmsg($comiis_app_lang["64"], "action=" . $plugin_url, "succeed", array(), '', 0);
	} else {
		cpmsg($comiis_app_lang["65"], '', "error", array(), '', 0);
	}
}