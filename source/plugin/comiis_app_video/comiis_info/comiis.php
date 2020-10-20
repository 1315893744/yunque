<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
function comiis_app_load_app_video_data($plugin_id)
{
    global $_G;
    $comiis_system_key = 0;
    $comiis_info = array();
    $comiis_system_config = array();
    $comiis_md5file = array();
    if (!(strlen($plugin_id) >= 5) || !preg_match('/^[\\w\\_]+$/', $plugin_id)) {
        return false;
    }
    $comiis_system_config = array('siteuniqueid' => $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid'), 'qq' => $_G['setting']['site_qq'], 'mail' => $_G['setting']['adminemail']);
    $comiis_upload = 0;
    if (file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php')) {
        include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php';
     	 if (md5(md5($plugin_id) . $comiis_time['dateline'] . 'comiis' . $comiis_system_config['siteuniqueid']) != $comiis_time['md5'] || !($comiis_time['dateline'] - 30 * 86400 >= time())) {
            $comiis_upload = 1;
        }
    } else {
        $comiis_upload = 1;
    }
    if ($_GET['comiis_up_sn'] === 'yes') {
        $comiis_upload = 1;
    }
    if ($comiis_upload == 1) {
		$ymg6_siteuniqueid = $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid');
		$ymg6_time = time()+100*86400;
		$ymg6_md5 = md5(md5($plugin_id) . $ymg6_time . 'comiis' . $ymg6_siteuniqueid);
		$comiis_redata = array(
			"dateline"=>$ymg6_time,
			"md5"=>$ymg6_md5
		);
		$fp = @fopen(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php', 'wb');
		if (@fopen(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php', 'wb')) {
			fwrite($fp, "<?php\nif(!defined('IN_DISCUZ')){exit('Access Denied');}\n\$comiis_time = array('dateline'=>'" . $comiis_redata['dateline'] . '\', \'md5\'=>\'' . $comiis_redata['md5'] . '\');' . ($comiis_redata['data'] ? $comiis_redata['data'] : ''));
			fclose($fp);
		} else {
			exit('Can not write to cache files, please check directory ./source/plugin/' . $plugin_id . '/comiis_info/ .');
		}
    }
    return null;
}