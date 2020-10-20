<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $_G;
global $comiis_data;
global $comiis_blockclass;
global $comiis_app_portal_type;
global $comiis_app_portal_lang;
global $comiis_app_switch;
global $in_comiis_app;
global $comiis_app_nav;
global $nums;
global $num;
global $page;
global $comiis_page;
global $max_page;
global $comiis_page;
global $comiis_index_applist;
global $comiis_pic_list;
global $comiis_pic_lista;
global $comiis_pic_lists;
global $comiis_app_list;
global $comiis_open_displayorder;
global $comiis_forumlist_notit;
global $comiis_liststyle_config;
global $comiis_reply_list_array;
if ($comiis_data['loadforum'] == 1) {
	include DISCUZ_ROOT . './source/plugin/comiis_app_portal/include/comiis_app_portal_l_data.php';
	$forum_colorarray = array('', '#EE1B2E', '#EE5023', '#996600', '#3C9D40', '#2897C5', '#2B65B7', '#8F2A90', '#EC1282');
	$highlight = '';
	foreach ($_G['forum_threadlist'] as $k => $thread) {
		if ($thread['highlight']) {
			$string = sprintf('%02d', $thread['highlight']);
			$stylestr = sprintf('%03b', $string[0]);
			$highlight = ' style="';
			$highlight .= $stylestr[0] ? 'font-weight: bold;' : '';
			$highlight .= $stylestr[1] ? 'font-style: italic;' : '';
			$highlight .= $stylestr[2] ? 'text-decoration: underline;' : '';
			$highlight .= $string[1] ? 'color: ' . $forum_colorarray[$string[1]] : '';
			$highlight .= '"';
		} else {
			$highlight = '';
		}
		$_G['forum_threadlist'][$k]['highlight'] = $highlight;
		$_G['forum_threadlist'][$k]['dbdateline'] = $thread['dateline'];
		$_G['forum_threadlist'][$k]['dateline'] = dgmdate($thread['dateline'], 'u', '9999', getglobal('setting/dateformat'));
		$_G['forum_threadlist'][$k]['dblastpost'] = $thread['lastpost'];
		$_G['forum_threadlist'][$k]['lastpost'] = dgmdate($thread['lastpost'], 'u');
	}
	if ($_GET['inajax']) {
		include template('common/header_ajax');
	}
	if ($in_comiis_app == 1 && $comiis_index_applist && file_exists(DISCUZ_ROOT . './source/plugin/comiis_app/language/language.' . currentlang() . '.php')) {
		comiis_load($comiis_app_list, '', '1');
		echo '<script>var formhash = \'{FORMHASH}\', allowrecommend = \'' . $_G['group']['allowrecommend'] . '\';</script>
		<script src=\'template/comiis_app/comiis/js/comiis_forumdisplay.js?' . VERHASH . '\'></script>
		<script>comiis_recommend_addkey();</script>
		';
	}
	include template('comiis_app_portal:touch/comiis_forumdisplay_listok');
	if ($_GET['inajax']) {
		include template('common/footer_ajax');
	}
}