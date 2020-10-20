<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$plugin_id = 'comiis_app_find';
$comiis_upload = 0;
$comiis_md5file = $comiis_system_config = $comiis_info = array();
if (empty($_G['cache']['comiis_app_find'])) {
	comiis_app_find_updata();
}
require_once DISCUZ_ROOT . './source/plugin/' . $plugin_id . '/language/language.' . currentlang() . '.php';
$plugin_url = 'plugins&operation=config&do=' . $pluginid . '&identifier=' . $plugin['identifier'] . '&pmod=comiis_app_find_admin';
if (!submitcheck('comiis_findsubmit')) {
	$comiis_app_find = DB::fetch_all('SELECT * FROM %t ORDER BY displayor', array('comiis_app_find'));
	echo '<script type="text/JavaScript">
		var rowtypedata = [
			[
				[1,\'\', \'td25\'],
				[1,\'<input type="text" class="txt" size="2" name="new_displayor[]" value="0"><input type="hidden" name="new_cid[]" value="{1}">\', \'td25\'],
				[1,\'<div class="board"><input type="text" class="txt" name="new_name[]" size="15" value="' . $comiis_app_find_lang['01'] . '"><a href="javascript:;" class="deleterow" onclick="deleterow(this)">' . $comiis_app_find_lang['02'] . '</a></div>\'],
				[1,\'<input type="text" class="txt" name="new_icon[]" size="15">\'],
				[1,\'<input type="text" class="txt" name="new_url[]" value="#" size="15">\'],
				[1,\'<input type="text" class="txt" name="new_data[]" size="15">\'],
				[1,\'\'],
				[1,\'\']
			],
			[
				[1,\'\', \'td25\'],
				[1,\'<input type="text" class="txt" size="2" name="new_displayor[]" value="0"><input type="hidden" name="new_cid[]" value="0">\', \'td25\'],
				[1,\'<div><input type="text" class="txt" size="15" name="new_name[]" value="' . $comiis_app_find_lang['03'] . '"><a href="javascript:;" class="deleterow" onclick="deleterow(this)">' . $comiis_app_find_lang['02'] . '</a></div>\'],
			]
			
		];
	</script>';
	showformheader($plugin_url . '&comiis_sub=' . $_GET['comiis_sub']);
	showtips($comiis_app_find_lang['04'], 'tips', true, $comiis_app_find_lang['05']);
	showtableheader();
	showsubtitle(array('', 'display_order', 'name', $comiis_app_find_lang['06'], 'url', $comiis_app_find_lang['07'], $comiis_app_find_lang['08']));
	if (is_array($comiis_app_find)) {
		foreach ($comiis_app_find as $v) {
			if ($v['cid'] == 0) {
				showtablerow('', array('class="td25"', 'class="td25"', '', '', '', '', ''), array('<input class="checkbox" type="checkbox" name="delete[]" value="' . $v['id'] . '">', '<input type="text" class="txt" size="2" name="find_displayor[' . $v['id'] . ']" value="' . $v['displayor'] . '"><input type="hidden" name="find_cid[' . $v['id'] . ']" value="' . $v['cid'] . '">', '<input type="text" class="txt" size="15" name="find_name[' . $v['id'] . ']" value="' . $v['name'] . '"><select name="find_show[' . $v['id'] . ']"><option value="0"' . ($v['show'] == 0 ? 'selected="selected"' : '') . '>' . $comiis_app_find_lang['09'] . '</option><option value="1"' . ($v['show'] == 1 ? 'selected="selected"' : '') . '>' . $comiis_app_find_lang['10'] . '</option></select>', '', '', '', ''));
				foreach ($comiis_app_find as $t) {
					if ($v['id'] == $t['cid']) {
						showtablerow('', array('class="td25"', 'class="td25"', '', '', '', '', ''), array('<input class="checkbox" type="checkbox" name="delete[]" value="' . $t['id'] . '">', '<input type="text" class="txt" size="2" name="find_displayor[' . $t['id'] . ']" value="' . $t['displayor'] . '"><input type="hidden" name="find_cid[' . $t['id'] . ']" value="' . $t['cid'] . '">', '<div class="board"><input type="text" class="txt" size="15" name="find_name[' . $t['id'] . ']" value="' . $t['name'] . '"></div>', '<input type="text" class="txt" size="15" name="find_icon[' . $t['id'] . ']" value="' . $t['icon'] . '">', '<input type="text" class="txt" size="15" name="find_url[' . $t['id'] . ']" value="' . $t['url'] . '">', '<input type="text" class="txt" size="15" name="find_data[' . $t['id'] . ']" value="' . $t['data'] . '">', '<input class="checkbox" type="checkbox" name="find_show[' . $t['id'] . ']" value="1" ' . ($t['show'] > 0 ? 'checked' : '') . '>'));
					}
				}
				echo '<tr><td colspan="1"></td><td colspan="7"><div class="lastboard"><a href="###" onclick="addrow(this, 0, ' . $v['id'] . ')" class="addtr">' . $comiis_app_find_lang['11'] . '</a></div></td></tr>';
			}
		}
	}
	echo '<tr><td colspan="1"></td><td colspan="7"><div><a href="###" onclick="addrow(this, 1, 0)" class="addtr">' . $comiis_app_find_lang['12'] . '</a></div></td></tr>';
	showsubmit('comiis_findsubmit', 'submit', 'del', '');
	showtablefooter();
	showformfooter();
} else {
	if ($ids = dimplode($_GET['delete'])) {
		DB::query('DELETE FROM ' . DB::table('comiis_app_find') . ' WHERE ' . DB::field('id', $_GET['delete']) . ' OR ' . DB::field('cid', $_GET['delete']));
	}
	if (is_array($_GET['find_name'])) {
		foreach ($_GET['find_name'] as $id => $v) {
			if (strlen($v)) {
				$id = intval($id);
				$cid = intval(intval($_GET['find_cid'][$id]));
				$displayor = intval($_GET['find_displayor'][$id]);
				$name = trim(dhtmlspecialchars($_GET['find_name'][$id]));
				$show = !empty($_GET['find_show'][$id]) ? 1 : 0;
				$icon = $cid ? trim(dhtmlspecialchars($_GET['find_icon'][$id])) : '';
				$url = $cid ? str_replace(array('&amp;'), array('&'), dhtmlspecialchars($_GET['find_url'][$id])) : '';
				$data = $cid ? trim(dhtmlspecialchars($_GET['find_data'][$id])) : '';
				$postdata = array('displayor' => $displayor, 'name' => $name, 'icon' => $icon, 'url' => $url, 'data' => $data, 'show' => $show);
				DB::update('comiis_app_find', $postdata, DB::field('id', $id) . ' AND ' . DB::field('cid', $cid));
			}
		}
	}
	if (is_array($_GET['new_name'])) {
		foreach ($_GET['new_name'] as $id => $v) {
			if (strlen($v)) {
				$id = intval($id);
				$cid = intval(intval($_GET['new_cid'][$id]));
				$displayor = intval($_GET['new_displayor'][$id]);
				$name = trim(dhtmlspecialchars($_GET['new_name'][$id]));
				$icon = $cid ? trim(dhtmlspecialchars($_GET['new_icon'][$id])) : '';
				$url = $cid ? str_replace(array('&amp;'), array('&'), dhtmlspecialchars($_GET['new_url'][$id])) : '';
				$data = $cid ? trim(dhtmlspecialchars($_GET['new_data'][$id])) : '';
				$postdata = array('displayor' => $displayor, 'name' => $name, 'icon' => $icon, 'url' => $url, 'data' => $data, 'cid' => $cid);
				DB::insert('comiis_app_find', $postdata);
			}
		}
	}
	comiis_app_find_updata();
	cpmsg($comiis_app_find_lang['13'], 'action=' . $plugin_url, 'succeed', array(), '', 0);
}
function comiis_app_find_updata()
{
	$comiis_value = DB::fetch_all('SELECT * FROM %t ORDER BY displayor', array('comiis_app_find'));
	$comiis_value_data = array();
	$comiis_value_data['data'] = $comiis_value;
	save_syscache('comiis_app_find', $comiis_value_data);
}