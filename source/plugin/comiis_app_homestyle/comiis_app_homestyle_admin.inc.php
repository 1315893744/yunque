<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
$plugin_id = 'comiis_app_homestyle';
$comiis_upload = 0;
$comiis_info = array();
$comiis_system_config = array();
$comiis_md5file = array();
$siteuniqueid = $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid');
if (file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php')) {
    include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php';
    if (md5(md5($plugin_id) . $comiis_time['dateline'] . 'comiis' . $siteuniqueid) != $comiis_time['md5'] || !($comiis_time['dateline'] - 30 * 86400 >= time())) {
        $comiis_upload = 1;
    }
} else {
    $comiis_upload = 1;
}
if ($_GET['comiis_up_sn'] === 'yes') {
    $comiis_upload = 1;
}
if ($comiis_upload == 1) {
    loadcache($plugin_id . '_up');
    if ($_G['cache'][$plugin_id . '_up']['up'] != 1) {
        save_syscache($plugin_id . '_up', array('up' => 1));
        if (!function_exists('comiis_app_load_app_homestyle_data')) {
            if (!file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis.php')) {
                comiis_app_load_data_error();
                return false;
            }
            include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis.php';
        }
        if (!function_exists('comiis_app_load_app_homestyle_data')) {
            comiis_app_load_data_error();
            return false;
        }
        comiis_app_load_app_homestyle_data($plugin_id);
        save_syscache($plugin_id . '_up', array('up' => 0));
    }
}
if (!file_exists(DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php')) {
    comiis_app_load_data_error();
    return false;
}
include DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/comiis_info/comiis_md5file.php';

$plugin_url = 'plugins&operation=config&do=' . $pluginid . '&identifier=' . $plugin['identifier'] . '&pmod=comiis_app_homestyle_admin';
require_once DISCUZ_ROOT . './source/plugin/comiis_app_homestyle/language/language.' . currentlang() . '.php';
if (!submitcheck('comiis_homesubmit')) {
    $dirfilter = array();
    $smdir = DISCUZ_ROOT . './source/plugin/comiis_app_homestyle/image/home_bg';
    $comiis_app_home = DB::fetch_all('SELECT * FROM %t ORDER BY displayorder', array('comiis_app_home'));
    showformheader($plugin_url);
    showtips($comiis_app_homestyle_lang['124'], 'tips', true, $comiis_app_homestyle_lang['125']);
    showtableheader($comiis_app_homestyle_lang['126']);
    showsubtitle(array('', 'display_order', 'name', $comiis_app_homestyle_lang['127'], $comiis_app_homestyle_lang['128']));
    if (is_array($comiis_app_home)) {
        foreach ($comiis_app_home as $v) {
            if ($v['img'] == '0' && is_dir($smdir . '/' . $v['dir'])) {
                $dirfilter[] = $v['dir'];
                showtablerow('class="partition"', array('class="td25" onclick="toggle_group(\'group_' . $v['id'] . '\', $(\'a_comiis_home' . $v['id'] . '\'))"', 'class="td25"', 'style="width:190px"', '', 'class="td25"'), array('<a href="javascript:;" id="a_group_' . $v['id'] . '">[-]</a>', '<input type="text" class="txt" size="2" name="displayorder[' . $v['id'] . ']" value="' . $v['displayorder'] . '">', '<input type="text" class="txt" size="15" name="name[' . $v['id'] . ']" value="' . $v['name'] . '"><a href="admin.php?action=' . $plugin_url . '&updir=' . $v['dir'] . '#g' . $v['id'] . '" class="addtr" id="g' . $v['id'] . '">' . $comiis_app_homestyle_lang['129'] . '</a>', '', '<input type="hidden" name="dir[' . $v['id'] . ']" value="' . $v['dir'] . '"><input type="hidden" name="img[' . $v['id'] . ']" value="0">'));
                $img_list = array();
                showtagheader('tbody', 'group_' . $v['id'], true, 'sub');
                foreach ($comiis_app_home as $sv) {
                    if ($sv['img'] != '0' && $sv['dir'] == $v['dir']) {
                        $img_list[] = $sv['img'];
                        showtablerow('', array('class="td25"', 'class="td25"', '', '', 'class="td25"'), array('<input class="checkbox" type="checkbox" name="delete[]" value="' . $sv['id'] . '">', '<input type="text" class="txt" size="2" name="displayorder[' . $sv['id'] . ']" value="' . $sv['displayorder'] . '">', '<div class="board"><input type="text" class="txt" size="15" name="name[' . $sv['id'] . ']" value="' . $sv['name'] . '"></div>', '<img src="source/plugin/comiis_app_homestyle/image/home_bg/' . $sv['dir'] . '/' . $sv['img'] . '" width="75"/>', '<input class="checkbox" type="checkbox" name="recommend[' . $sv['id'] . ']" value="1" ' . ($sv['recommend'] > 0 ? 'checked' : '') . '>'));
                    }
                }
                if ($_GET['updir'] == $v['dir']) {
                    $smiliesdir = dir($smdir . '/' . $v['dir']);
                    $n = 0;
                    while ($subentry = $smiliesdir->read()) {
                        if (!in_array($subentry, $img_list) && in_array(strtolower(fileext($subentry)), array('jpg', 'gif', 'png')) && preg_match('/^[\\w\\-\\.\\[\\]\\(\\)\\<\\> &]+$/', substr($subentry, 0, strrpos($subentry, '.'))) && !(strlen($subentry) >= 30) && is_file($smdir . '/' . $v['dir'] . '/' . $subentry)) {
                            ($n += 1) + -1;
                            showtablerow('', array('class="td25"', 'class="td25"', '', '', 'class="td25"'), array('<font style="color:red">' . $comiis_app_homestyle_lang['130'] . '</font>', '<input type="text" class="txt" size="2" name="new_displayorder[]" value="0">', '<div class="board"><input type="text" class="txt" size="15" name="new_name[]" value="' . basename($subentry, '.' . fileext($subentry)) . '"></div>', '<a href="javascript:;" onclick="zoom(this, \'source/plugin/comiis_app_homestyle/image/home_bg/' . $v['dir'] . '/' . $subentry . '\', 1)"><img src="source/plugin/comiis_app_homestyle/image/home_bg/' . $v['dir'] . '/' . $subentry . '" width="75"/>', '<input type="hidden" name="new_dir[]" value="' . $v['dir'] . '"><input type="hidden" name="new_img[]" value="' . $subentry . '">'));
                        }
                    }
                }
                showtagfooter('tbody');
            }
        }
    }
    $smtypedir = dir($smdir);
    while ($entry = $smtypedir->read()) {
        if ($entry != '.' && $entry != '..' && !in_array($entry, $dirfilter) && preg_match('/^\\w+$/', $entry) && !(strlen($entry) >= 30) && is_dir($smdir . '/' . $entry)) {
            showtablerow('class="partition"', array('class="td25"', 'class="td25"', 'style="width:15%"', '', 'class="td25"'), array('<font style="color:red">' . $comiis_app_homestyle_lang['130'] . '</font>', '<input type="text" class="txt" size="2" name="new_displayorder[]" value="0">', '<input type="text" class="txt" size="15" name="new_name[]" value="' . $entry . '">', '<input type="hidden" name="new_dir[]" value="' . $entry . '"><input type="hidden" name="new_img[]" value="0">', ''));
            $smiliesdir = dir($smdir . '/' . $entry);
            while ($subentry = $smiliesdir->read()) {
                if (in_array(strtolower(fileext($subentry)), array('jpg', 'gif', 'png')) && preg_match('/^[\\w\\-\\.\\[\\]\\(\\)\\<\\> &]+$/', substr($subentry, 0, strrpos($subentry, '.'))) && !(strlen($subentry) >= 30) && is_file($smdir . '/' . $entry . '/' . $subentry)) {
                    showtablerow('', array('class="td25"', 'class="td25"', '', '', 'class="td25"'), array('<font style="color:red">' . $comiis_app_homestyle_lang['130'] . '</font>', '<input type="text" class="txt" size="2" name="new_displayorder[]" value="0">', '<div class="board"><input type="text" class="txt" size="15" name="new_name[]" value="' . basename($subentry, '.' . fileext($subentry)) . '"></div>', '<a href="javascript:;" onclick="zoom(this, \'source/plugin/comiis_app_homestyle/image/home_bg/' . $entry . '/' . $subentry . '\', 1)"><img src="source/plugin/comiis_app_homestyle/image/home_bg/' . $entry . '/' . $subentry . '" width="75"/>', '<input type="hidden" name="new_dir[]" value="' . $entry . '"><input type="hidden" name="new_img[]" value="' . $subentry . '">'));
                }
            }
        }
    }
    showsubmit('comiis_homesubmit', 'submit', 'del', '');
    showtablefooter();
    showformfooter();
} else {
    if (is_array($_GET['new_name'])) {
        foreach ($_GET['new_name'] as $id => $v) {
            if (strlen($v)) {
                $displayorder = intval($_GET['new_displayorder'][$id]);
                $name = trim(dhtmlspecialchars($_GET['new_name'][$id]));
                $dir = trim(dhtmlspecialchars($_GET['new_dir'][$id]));
                $img = $_GET['new_img'][$id] == '0' ? '0' : trim(dhtmlspecialchars($_GET['new_img'][$id]));
                $postdata = array('displayorder' => $displayorder, 'name' => $name, 'dir' => $dir, 'img' => $img);
                DB::insert('comiis_app_home', $postdata);
            }
        }
    }
    if (is_array($_GET['name'])) {
        foreach ($_GET['name'] as $id => $v) {
            if (strlen($v)) {
                $id = intval($id);
                $displayorder = intval($_GET['displayorder'][$id]);
                $name = trim(dhtmlspecialchars($_GET['name'][$id]));
                $recommend = intval($_GET['recommend'][$id]);
                $postdata = array('displayorder' => $displayorder, 'name' => $name, 'recommend' => $recommend);
                DB::update('comiis_app_home', $postdata, DB::field('id', $id));
            }
        }
    }
    $ids = dimplode($_GET['delete']);
    if (dimplode($_GET['delete'])) {
        DB::query('DELETE FROM ' . DB::table('comiis_app_home') . ' WHERE ' . DB::field('id', $_GET['delete']));
    }
    cpmsg($comiis_app_homestyle_lang['64'], 'action=' . $plugin_url, 'succeed', array(), '', 0);
}
function comiis_app_load_data_error()
{
    cpmsg('Please enter the correct KEY !', '', 'error', array(), '', 0);
    return null;
}