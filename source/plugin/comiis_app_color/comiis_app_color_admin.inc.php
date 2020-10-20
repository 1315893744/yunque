<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$plugin_id = 'comiis_app_color';
$comiis_upload = 0;
$comiis_md5file = $comiis_system_config = $comiis_info = array();
if (empty($_GET['comiis_sub']) || !in_array($_GET['comiis_sub'], array('list', 'add', 'edit'))) {
	$_GET['comiis_sub'] = 'list';
}
$plugin_url = 'plugins&operation=config&do=' . $pluginid . '&identifier=' . $plugin['identifier'] . '&pmod=comiis_app_color_admin';
require_once DISCUZ_ROOT . './source/plugin/comiis_app_color/language/language.' . currentlang() . '.php';
loadcache(array('comiis_app_switch'));
if (!submitcheck('comiis_submit')) {
	if ($_GET['comiis_sub'] == 'list' || $_GET['comiis_sub'] == 'edit') {
		$comiis_app_style = DB::fetch_all('SELECT * FROM %t' . ($_GET['comiis_sub'] == 'edit' ? ' WHERE id=\'' . intval($_GET['editid']) . '\'' : ' ORDER BY displayorder'), array('comiis_app_style'));
		if ($_GET['comiis_sub'] == 'edit') {
			$comiis_app_style = $comiis_app_style[0];
		}
	} else {
		$comiis_app_style = array();
	}
	if ($_GET['comiis_sub'] == 'list') {
		showtips($comiis_app_color_lang['66'], 'tips', true, $comiis_app_color_lang['67']);
		showtableheader($comiis_app_color_lang['68'] . $comiis_app_color_lang['02']);
		showformheader($plugin_url . '&comiis_sub=' . $_GET['comiis_sub']);
		showtableheader();
		showsubtitle(array('', 'display_order', 'name', $comiis_app_color_lang['69'], 'available', ''));
		if (is_array($comiis_app_style)) {
			foreach ($comiis_app_style as $v) {
				showtablerow('', array('class="td25"', 'class="td25"', 'width="370"', 'class="td25"', 'class="td25"', ''), array('<input class="checkbox" type="checkbox" name="delete[]" value="' . $v['id'] . '">', '<input type="text" class="txt" size="2" name="displayorder[' . $v['id'] . ']" value="' . $v['displayorder'] . '">', '<em style="background:' . $v['color1'] . '">&nbsp;&nbsp;&nbsp;&nbsp;</em>&nbsp;' . $v['name'], '<input class="checkbox" type="radio" name="default" value="' . $v['id'] . '" ' . ($v['default'] > 0 ? 'checked' : '') . '>', '<input class="checkbox" type="checkbox" name="show[' . $v['id'] . ']" value="1" ' . ($v['show'] > 0 ? 'checked' : '') . '>', '<a href="admin.php?action=' . $plugin_url . '&comiis_sub=edit&editid=' . $v['id'] . '" class="act">' . $comiis_app_color_lang['70'] . '</a>'));
			}
		}
		echo '<tr><td colspan="1"></td><td colspan="6"><div><a href="admin.php?action=' . $plugin_url . '&comiis_sub=add" class="addtr">' . $comiis_app_color_lang['71'] . $comiis_app_color_lang['68'] . '</a></div></td></tr>';
		showsubmit('comiis_submit', 'submit', 'del', '');
		showtablefooter();
		showformfooter();
	} else {
		if ($_GET['comiis_sub'] == 'add' || $_GET['comiis_sub'] == 'edit') {
			showformheader($plugin_url . '&comiis_sub=' . $_GET['comiis_sub'] . ($_GET['comiis_sub'] == 'edit' ? '&editid=' . $comiis_app_style['id'] : ''));
			showtableheader(($_GET['comiis_sub'] == 'edit' ? $comiis_app_color_lang['70'] . ' [' . $comiis_app_style['name'] . '] ' : $comiis_app_color_lang['71']) . $comiis_app_color_lang['68']);
			showsetting($comiis_app_color_lang['72'], 'comiis_style[name]', $comiis_app_style['name'] ? $comiis_app_style['name'] : $comiis_app_color_lang['73'] . random(4), 'text', '', '', $comiis_app_color_lang['72']);
			showtitle($comiis_app_color_lang['74']);
			showsetting($comiis_app_color_lang['75'], 'comiis_style[color1]', $comiis_app_style['color1'] ? $comiis_app_style['color1'] : '#53bcf5', 'color', '', '', $comiis_app_color_lang['76']);
			showsetting($comiis_app_color_lang['77'], 'comiis_style[color2]', $comiis_app_style['color2'] ? $comiis_app_style['color2'] : '#f3f3f3', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['77']);
			showsetting($comiis_app_color_lang['78'], 'comiis_style[color3]', $comiis_app_style['color3'] ? $comiis_app_style['color3'] : '#53bcf5', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['78']);
			showsetting($comiis_app_color_lang['79'], 'comiis_style[color4]', $comiis_app_style['color4'] ? $comiis_app_style['color4'] : '#fcad30', 'color', '', '', $comiis_app_color_lang['80']);
			showsetting($comiis_app_color_lang['81'], 'comiis_style[color5]', $comiis_app_style['color5'] ? $comiis_app_style['color5'] : '#99db5e', 'color', '', '', $comiis_app_color_lang['82']);
			showsetting($comiis_app_color_lang['83'], 'comiis_style[color6]', $comiis_app_style['color6'] ? $comiis_app_style['color6'] : '#f1f1f1', 'color', '', '', $comiis_app_color_lang['83'] . $comiis_app_color_lang['84']);
			showsetting($comiis_app_color_lang['85'], 'comiis_style[color7]', $comiis_app_style['color7'] ? $comiis_app_style['color7'] : '#f8f8f8', 'color', '', '', $comiis_app_color_lang['85'] . $comiis_app_color_lang['84']);
			showsetting($comiis_app_color_lang['86'], 'comiis_style[color8]', $comiis_app_style['color8'] ? $comiis_app_style['color8'] : '#ffffff', 'color', '', '', $comiis_app_color_lang['86'] . $comiis_app_color_lang['84']);
			showsetting($comiis_app_color_lang['87'], 'comiis_style[color9]', $comiis_app_style['color9'] ? $comiis_app_style['color9'] : '#e8f5f9', 'color', '', '', $comiis_app_color_lang['87'] . $comiis_app_color_lang['90']);
			showsetting($comiis_app_color_lang['88'], 'comiis_style[color10]', $comiis_app_style['color10'] ? $comiis_app_style['color10'] : '#fffdef', 'color', '', '', $comiis_app_color_lang['88'] . $comiis_app_color_lang['90']);
			showsetting($comiis_app_color_lang['89'], 'comiis_style[color11]', $comiis_app_style['color11'] ? $comiis_app_style['color11'] : '#edffcc', 'color', '', '', $comiis_app_color_lang['89'] . $comiis_app_color_lang['90']);
			showsetting($comiis_app_color_lang['91'], 'comiis_style[color12]', $comiis_app_style['color12'] ? $comiis_app_style['color12'] : '#87d0f5', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['91']);
			showsetting($comiis_app_color_lang['92'], 'comiis_style[color13]', $comiis_app_style['color13'] ? $comiis_app_style['color13'] : '#ffa3a3', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['92']);
			showsetting($comiis_app_color_lang['93'], 'comiis_style[color14]', $comiis_app_style['color14'] ? $comiis_app_style['color14'] : '#dd0000', 'color', '', '', $comiis_app_color_lang['94']);
			showsetting($comiis_app_color_lang['205'], 'comiis_style[color33]', $comiis_app_style['color33'] ? $comiis_app_style['color33'] : '#ffffff', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['205']);
			showtitle($comiis_app_color_lang['95']);
			showsetting($comiis_app_color_lang['204'], 'comiis_style[color32]', $comiis_app_style['color32'] ? $comiis_app_style['color32'] : '#ffffff', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['204']);
			showsetting($comiis_app_color_lang['206'], 'comiis_style[color34]', $comiis_app_style['color34'] ? $comiis_app_style['color34'] : '#aaaaaa', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['206']);
			showsetting($comiis_app_color_lang['207'], 'comiis_style[color35]', $comiis_app_style['color35'] ? $comiis_app_style['color35'] : '#53bcf5', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['207']);
			showsetting($comiis_app_color_lang['96'], 'comiis_style[color15]', $comiis_app_style['color15'] ? $comiis_app_style['color15'] : '#333333', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['96']);
			showsetting($comiis_app_color_lang['97'], 'comiis_style[color16]', $comiis_app_style['color16'] ? $comiis_app_style['color16'] : '#507daf', 'color', '', '', $comiis_app_color_lang['98']);
			showsetting($comiis_app_color_lang['99'], 'comiis_style[color17]', $comiis_app_style['color17'] ? $comiis_app_style['color17'] : '#ff9900', 'color', '', '', $comiis_app_color_lang['100']);
			showsetting($comiis_app_color_lang['101'], 'comiis_style[color18]', $comiis_app_style['color18'] ? $comiis_app_style['color18'] : '#777777', 'color', '', '', $comiis_app_color_lang['101'] . $comiis_app_color_lang['105']);
			showsetting($comiis_app_color_lang['102'], 'comiis_style[color19]', $comiis_app_style['color19'] ? $comiis_app_style['color19'] : '#999999', 'color', '', '', $comiis_app_color_lang['102'] . $comiis_app_color_lang['105']);
			showsetting($comiis_app_color_lang['103'], 'comiis_style[color20]', $comiis_app_style['color20'] ? $comiis_app_style['color20'] : '#bbbbbb', 'color', '', '', $comiis_app_color_lang['103'] . $comiis_app_color_lang['105']);
			showsetting($comiis_app_color_lang['104'], 'comiis_style[color21]', $comiis_app_style['color21'] ? $comiis_app_style['color21'] : '#dddddd', 'color', '', '', $comiis_app_color_lang['104'] . $comiis_app_color_lang['105']);
			showsetting($comiis_app_color_lang['106'], 'comiis_style[color22]', $comiis_app_style['color22'] ? $comiis_app_style['color22'] : '#ffffff', 'color', '', '', $comiis_app_color_lang['107']);
			showsetting($comiis_app_color_lang['108'], 'comiis_style[color23]', $comiis_app_style['color23'] ? $comiis_app_style['color23'] : '#f66c75', 'color', '', '', $comiis_app_color_lang['109']);
			showtitle($comiis_app_color_lang['110']);
			showsetting($comiis_app_color_lang['111'], 'comiis_style[color24]', $comiis_app_style['color24'] ? $comiis_app_style['color24'] : '#5cb3eb', 'color', '', '', $comiis_app_color_lang['111']);
			showsetting($comiis_app_color_lang['112'], 'comiis_style[color25]', $comiis_app_style['color25'] ? $comiis_app_style['color25'] : '#f66c75', 'color', '', '', $comiis_app_color_lang['112']);
			showsetting($comiis_app_color_lang['113'], 'comiis_style[color26]', $comiis_app_style['color26'] ? $comiis_app_style['color26'] : '#8fd353', 'color', '', '', $comiis_app_color_lang['113']);
			showtitle($comiis_app_color_lang['114']);
			showsetting($comiis_app_color_lang['115'], 'comiis_style[color27]', $comiis_app_style['color27'] ? $comiis_app_style['color27'] : '#efefef', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['115']);
			showsetting($comiis_app_color_lang['116'], 'comiis_style[color28]', $comiis_app_style['color28'] ? $comiis_app_style['color28'] : '#f66c75', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['116']);
			showsetting($comiis_app_color_lang['117'], 'comiis_style[color29]', $comiis_app_style['color29'] ? $comiis_app_style['color29'] : '#e3e3e3', 'color', '', '', $comiis_app_color_lang['02'] . $comiis_app_color_lang['117']);
			showsetting($comiis_app_color_lang['118'], 'comiis_style[color30]', $comiis_app_style['color30'] ? $comiis_app_style['color30'] : '#b2dceb', 'color', '', '', $comiis_app_color_lang['118'] . $comiis_app_color_lang['120']);
			showsetting($comiis_app_color_lang['119'], 'comiis_style[color31]', $comiis_app_style['color31'] ? $comiis_app_style['color31'] : '#e7e1cd', 'color', '', '', $comiis_app_color_lang['119'] . $comiis_app_color_lang['120']);
			showsetting($comiis_app_color_lang['121'], 'comiis_style[css]', $comiis_app_style['css'], 'textarea', '', '', $comiis_app_color_lang['122']);
			showsubmit('comiis_submit', 'submit');
			showtablefooter();
			showformfooter();
		}
	}
} else {
	if ($_GET['comiis_sub'] == 'add') {
		$_GET['comiis_style'] = dhtmlspecialchars($_GET['comiis_style']);
		$postdata = array('displayorder' => 0, 'default' => 0, 'show' => 0, 'name' => $_GET['comiis_style']['name'], 'css' => $_GET['comiis_style']['css'], 'color1' => $_GET['comiis_style']['color1'], 'color2' => $_GET['comiis_style']['color2'], 'color3' => $_GET['comiis_style']['color3'], 'color4' => $_GET['comiis_style']['color4'], 'color5' => $_GET['comiis_style']['color5'], 'color6' => $_GET['comiis_style']['color6'], 'color7' => $_GET['comiis_style']['color7'], 'color8' => $_GET['comiis_style']['color8'], 'color9' => $_GET['comiis_style']['color9'], 'color10' => $_GET['comiis_style']['color10'], 'color11' => $_GET['comiis_style']['color11'], 'color12' => $_GET['comiis_style']['color12'], 'color13' => $_GET['comiis_style']['color13'], 'color14' => $_GET['comiis_style']['color14'], 'color15' => $_GET['comiis_style']['color15'], 'color16' => $_GET['comiis_style']['color16'], 'color17' => $_GET['comiis_style']['color17'], 'color18' => $_GET['comiis_style']['color18'], 'color19' => $_GET['comiis_style']['color19'], 'color20' => $_GET['comiis_style']['color20'], 'color21' => $_GET['comiis_style']['color21'], 'color22' => $_GET['comiis_style']['color22'], 'color23' => $_GET['comiis_style']['color23'], 'color24' => $_GET['comiis_style']['color24'], 'color25' => $_GET['comiis_style']['color25'], 'color26' => $_GET['comiis_style']['color26'], 'color27' => $_GET['comiis_style']['color27'], 'color28' => $_GET['comiis_style']['color28'], 'color29' => $_GET['comiis_style']['color29'], 'color30' => $_GET['comiis_style']['color30'], 'color31' => $_GET['comiis_style']['color31'], 'color32' => $_GET['comiis_style']['color32'], 'color33' => $_GET['comiis_style']['color33'], 'color34' => $_GET['comiis_style']['color34'], 'color35' => $_GET['comiis_style']['color35']);
		DB::insert('comiis_app_style', $postdata);
	} else {
		if ($_GET['comiis_sub'] == 'list') {
			if ($ids = dimplode($_GET['delete'])) {
				DB::query('DELETE FROM ' . DB::table('comiis_app_style') . ' WHERE ' . DB::field('id', $_GET['delete']));
				foreach ($_GET['delete'] as $v) {
					@unlink(DISCUZ_ROOT . './source/plugin/comiis_app/cache/comiis_' . intval($v) . '_style.css');
				}
			}
			if (is_array($_GET['displayorder'])) {
				$_GET['default'] = intval($_GET['default']);
				foreach ($_GET['displayorder'] as $id => $v) {
					$id = intval($id);
					$displayorder = intval($_GET['displayorder'][$id]);
					$show = $_GET['default'] == $id ? 1 : intval($_GET['show'][$id]);
					$default = $_GET['default'] == $id ? 1 : 0;
					$postdata = array('displayorder' => $displayorder, 'show' => $show, 'default' => $default);
					DB::update('comiis_app_style', $postdata, DB::field('id', $id));
				}
			}
		} else {
			if ($_GET['comiis_sub'] == 'edit') {
				$_GET['comiis_style'] = dhtmlspecialchars($_GET['comiis_style']);
				$postdata = array('name' => $_GET['comiis_style']['name'], 'css' => $_GET['comiis_style']['css'], 'color1' => $_GET['comiis_style']['color1'], 'color2' => $_GET['comiis_style']['color2'], 'color3' => $_GET['comiis_style']['color3'], 'color4' => $_GET['comiis_style']['color4'], 'color5' => $_GET['comiis_style']['color5'], 'color6' => $_GET['comiis_style']['color6'], 'color7' => $_GET['comiis_style']['color7'], 'color8' => $_GET['comiis_style']['color8'], 'color9' => $_GET['comiis_style']['color9'], 'color10' => $_GET['comiis_style']['color10'], 'color11' => $_GET['comiis_style']['color11'], 'color12' => $_GET['comiis_style']['color12'], 'color13' => $_GET['comiis_style']['color13'], 'color14' => $_GET['comiis_style']['color14'], 'color15' => $_GET['comiis_style']['color15'], 'color16' => $_GET['comiis_style']['color16'], 'color17' => $_GET['comiis_style']['color17'], 'color18' => $_GET['comiis_style']['color18'], 'color19' => $_GET['comiis_style']['color19'], 'color20' => $_GET['comiis_style']['color20'], 'color21' => $_GET['comiis_style']['color21'], 'color22' => $_GET['comiis_style']['color22'], 'color23' => $_GET['comiis_style']['color23'], 'color24' => $_GET['comiis_style']['color24'], 'color25' => $_GET['comiis_style']['color25'], 'color26' => $_GET['comiis_style']['color26'], 'color27' => $_GET['comiis_style']['color27'], 'color28' => $_GET['comiis_style']['color28'], 'color29' => $_GET['comiis_style']['color29'], 'color30' => $_GET['comiis_style']['color30'], 'color31' => $_GET['comiis_style']['color31'], 'color32' => $_GET['comiis_style']['color32'], 'color33' => $_GET['comiis_style']['color33'], 'color34' => $_GET['comiis_style']['color34'], 'color35' => $_GET['comiis_style']['color35']);
				DB::update('comiis_app_style', $postdata, DB::field('id', intval($_GET['editid'])));
			}
		}
	}
	$comiis_value = DB::fetch_all('SELECT * FROM %t WHERE `show`=\'1\' ORDER BY displayorder', array('comiis_app_style'));
	$comiis_cache = array();
	foreach ($comiis_value as $style) {
		$css = '.bg_0,.comiis_head,code.comiis_checkbox:before,.comiis_bbs_show h2 code:before{background:' . $style['color1'] . ' !important;}.comiis_bodybg{background:' . $style['color2'] . ';}.f_0,.f_0 a,.ntc_body a.lit,.comiis_tip dt.kmlab strong,.comiis_wzv .view_body a{color:' . $style['color3'] . ' !important;}.bg_a{background:' . $style['color4'] . ' !important;}.bg_c{background:' . $style['color5'] . ' !important;}.bg_b{background:' . $style['color6'] . ' !important;}.bg_e{background:' . $style['color7'] . ' !important;}.bg_f{background:' . $style['color8'] . ' !important;}.bg_g{background:' . $style['color9'] . ';}.bg_h,.comiis_wzv_plli .quote{background:' . $style['color10'] . ';}.bg_i{background:' . $style['color11'] . ';}.bg_boy{background:' . $style['color12'] . ';}.bg_girl{background:' . $style['color13'] . ';}.bg_del{background:' . $style['color14'] . ' !important;}html,body,a:link,a:visited,a:hover{color:' . $style['color15'] . ';}.f_ok,.f_ok a,.comiis_a a{color:' . $style['color16'] . ' !important;}.f_a,.f_a a{color:' . $style['color17'] . ' !important;}.f_b,.f_b a,.comiis_share_box #comiis_share a{color:' . $style['color18'] . ' !important;}.f_c,.f_c a,.ntc_body{color:' . $style['color19'] . ' !important;}.f_d,.f_d a{color:' . $style['color20'] . ' !important;}.f_e,.f_e a{color:' . $style['color21'] . ' !important;}.f_f,.f_f a{color:' . $style['color22'] . ' !important;}.f_fs,.f_fs a{color:' . $style['color22'] . ';}.f_hot,.comiis_wztit h2.f_hot,.f_hot a,.comiis_wztit h2.f_hot a{border-color:' . $style['color23'] . ' !important;color:' . $style['color23'] . ';}.f_qq,.f_qq a{color:' . $style['color24'] . ' !important;}.f_wb,.f_wb a{color:' . $style['color25'] . ' !important;}.f_wx,.f_wx a{color:' . $style['color26'] . ' !important;}.b_ok,.b_t,.b_b,.b_l,.b_r,.comiis_tip dd .tip_btn span.tip_lx{border-color:' . $style['color27'] . ' !important;}.b_0{border-color:' . $style['color3'] . ' !important;}.b_a{border-color:' . $style['color4'] . ' !important;}.b_c{border-color:' . $style['color28'] . ' !important;}.b_d{border-color:' . $style['color29'] . ' !important;}.b_g,.bg_g{border-color:' . $style['color30'] . ' !important;}.b_h,.bg_h,.comiis_wzv_plli .quote{border-color:' . $style['color31'] . ' !important;}.b_i{border-color:' . $style['color14'] . ' !important;}code.comiis_checkbox_close:before, .comiis_forum_close h2 code:before{background:#ccc !important;}.bg_foot {background:' . $style['color33'] . '}.bg_foot_btn {background:' . $style['color35'] . '}.f_top, .f_top a {color:' . $style['color32'] . ' !important}.f_foot, .f_foot a {color:' . $style['color34'] . ' !important}.f_foot_on, .f_foot_on a {color:' . $style['color35'] . ' !important}' . strip_tags($style['css']);
		if ($style['default'] == 1) {
			comiis_write_file(0, $css);
		}
		comiis_write_file($style['id'], $css);
		$comiis_cache[] = array('id' => $style['id'], 'name' => $style['name'], 'color' => $style['color1']);
	}
	save_syscache('comiis_app_style', $comiis_cache);
	cpmsg($comiis_app_color_lang['123'], 'action=' . $plugin_url, 'succeed', array(), '', 0);
}
function comiis_write_file($id, $data)
{
	if ($fp = @fopen(DISCUZ_ROOT . './source/plugin/comiis_app/cache/comiis_' . intval($id) . '_style.css', 'wb')) {
		fwrite($fp, $data);
		fclose($fp);
	} else {
		exit('Can not write to cache files, please check directory ./source/plugin/comiis_app/cache/ .');
	}
}