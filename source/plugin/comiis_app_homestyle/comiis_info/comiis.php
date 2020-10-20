<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
function comiis_app_load_app_homestyle_data($plugin_id)
{
    global $_G;
    $comiis_system_key = 0;
    $comiis_info = array();
    $comiis_system_config = array();
    $comiis_md5file = array();
    loadcache(array('comiis_app_switch'));
    if (!(strlen($plugin_id) >= 5) || !preg_match('/^[\\w\\_]+$/', $plugin_id)) {
        return false;
    }
    $comiis_system_config = array('siteuniqueid' => $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid'), 'qq' => $_G['setting']['site_qq'], 'mail' => $_G['setting']['adminemail']);
    $comiis_upload = 0;
    if (file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php')) {
        include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php';
 
    } else {
        $comiis_upload = 1;
    }
    if ($_GET['comiis_up_sn'] === 'yes') {
        $comiis_upload = 1;
    }
    if ($comiis_upload == 1) {
     
    }
    return null;
}