<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
function comiis_app_up_switch()
{
    $comiis_value = DB::fetch_all('SELECT * FROM %t', array('comiis_app_switch'), 'name');
    $comiis_value_data = array();
    foreach ($comiis_value as $k => $v) {
        if (substr($k, 0, 7) == 'comiis_') {
            $k = addslashes(strip_tags($k));
            $v = $v['value'];
            $comiis_value_data[$k] = $v;
        }
    }
    save_syscache('comiis_app_switch', $comiis_value_data);
    return null;
}
function comiis_app_up_nav()
{
    $comiis_value = DB::fetch_all('SELECT * FROM %t WHERE `show`=\'1\' ORDER BY displayor', array('comiis_app_nav'));
    $comiis_value_data = array();
    foreach ($comiis_value as $v) {
        $url_f = '';
        $v['nav_ids'] = '';
        $url_fs = array();
        if ($v['url'] != '#' && substr($v['url'], 0, 11) != 'javascript:') {
            $url_fs = parse_url($v['url']);
            $url_f = end(explode('/', $url_fs['path']));
            if (stripos($v['url'], '?')) {
                $parameter = array();
                $url_data = array();
                $parameter = explode('&', current(explode('#', end(explode('?', $v['url'])))));
                foreach ($parameter as $temp) {
                    $tmp = explode('=', $temp);
                    if ($tmp[0] != 'mobile') {
                        $url_data[$tmp[0]] = $tmp[1];
                    }
                }
                ksort($url_data);
                $params = '';
                foreach ($url_data as $ks => $vs) {
                    $params .= '&' . $ks . '=' . rawurlencode($vs);
                }
                $v['nav_ids'] = substr(md5($url_f . $params), 0, 5);
            } else {
                $v['nav_ids'] = substr(md5($url_f), 0, 5);
            }
        }
        $comiis_value_data[$v['navtype']][] = $v;
    }
    save_syscache('comiis_app_nav', $comiis_value_data);
    return null;
}
function comiis_app_updates($comiis_get)
{
	if (is_array($comiis_get)) {
		$plugin_id = "comiis_app";
		global $_G;
		global $comiis_app_time;
		global $comiis_app_info;
		global $comiis_app_lang;
		loadcache("comiis_app_switch");
		foreach ($comiis_get as $k => $v) {
			if (substr($k, 0, 7) == "comiis_") {
				$k = addslashes(strip_tags($k));
				if (is_array($v)) {
					$v = serialize($v);
				} else {
					$v = $v;
				}
				if (strlen($k) < 30) {
					if (DB::result_first("SELECT COUNT(*) FROM %t WHERE name=%s", array("comiis_app_switch", $k)) == 1) {
						DB::update("comiis_app_switch", array("value" => $v), DB::field("name", $k));
					}
				}
			}
		}
		comiis_app_up_switch();
	}
    return null;
}
function comiis_write_file($id, $data)
{
    $fp = @fopen(DISCUZ_ROOT . './source/plugin/comiis_app/cache/comiis_' . intval($id) . '_style.css', 'wb');
    if (@fopen(DISCUZ_ROOT . './source/plugin/comiis_app/cache/comiis_' . intval($id) . '_style.css', 'wb')) {
        fwrite($fp, $data);
        fclose($fp);
    } else {
        exit('Can not write to cache files, please check directory ./source/plugin/comiis_app/cache/ .');
    }
    return null;
}