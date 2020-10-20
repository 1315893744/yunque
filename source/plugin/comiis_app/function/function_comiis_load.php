<?php
if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $_G;
global $comiis_system_key;
global $comiis_md5file;
global $comiis_system_config;
global $comiis_info;
$comiis_system_key = 0;
$comiis_md5file = $comiis_system_config = $comiis_info = array();
if (file_exists(DISCUZ_ROOT . './source/plugin/comiis_app/comiis_info/comiis_info.php')) {
	include DISCUZ_ROOT . './source/plugin/comiis_app/comiis_info/comiis_info.php';
} else {
	return;
}
if (file_exists(DISCUZ_ROOT . './source/plugin/comiis_app/comiis_info.php')) {
	include DISCUZ_ROOT . './source/plugin/comiis_app/comiis_info.php';
} else {
	return;
}

if (strlen($comiis_site['auths']) == 22 || strlen($comiis_site['auths']) == 2||1) {
	
	if (1||$comiis_site['auths'] == '==' && $comiis_site['md5'] == md5($comiis_info['sn'])) {
		$v = 2;
	} else {
		$k = array();
		$k[] = 0;
		$i = 0;
		while ($i <= 22) {
			$k[] = substr($comiis_site['auths'], $i, 4);
			$i += 4;
		}
		if ($comiis_site['md5'] == md5($k[2] . $k[1] . $k[3] . $comiis_info['sn'] . $k[5] . $k[4])) {
			$v = 1;
		} else {
			$v = 0;
		}
	}
	if ($_GET['comiis'] == 'yes') {
		
		showmessage('error: ' . $v . 'x' . $comiis_site['auths']);
	}
	if ($v == 0) {
		return;
	}
} else {
	return;
}


$plugin_id = 'comiis_app';
if (!function_exists('comiis_app_load_data')) {
	if (file_exists(DISCUZ_ROOT . $_G['plugind'] . $plugin_id . '/comiis_info/comiis.php')) {
		include DISCUZ_ROOT . $_G['plugind'] . $plugin_id . '/comiis_info/comiis.php';
	} else {
		return;
	}
}

if (function_exists('comiis_app_load_data')) {
	comiis_app_load_data($plugin_id);
} else {
	return;
}

if (strlen($_G['cache']['comiis_app_switch']['comiis_key']) == 18) {
	$comiis_system_key = $_G['cache']['comiis_app_switch']['comiis_key'];
}
$comiis_system_config = array('siteuniqueid' => $_G['setting']['siteuniqueid'] ? $_G['setting']['siteuniqueid'] : C::t('common_setting')->fetch('siteuniqueid'), 'qq' => $_G['setting']['site_qq'], 'mail' => $_G['setting']['adminemail']);
if (file_exists(DISCUZ_ROOT . './data/addonmd5/comiis_app.plugin.xml')) {
	require_once libfile('class/xml');
	$xml = implode('', @file(DISCUZ_ROOT . './data/addonmd5/comiis_app.plugin.xml'));
	$comiis_md5file = xml2array($xml);
}
function comiis_load_start($re_sn, $load_var, $is_list = 0)
{
	global $_G;
	global $comiis_system_key;//$_G['siteurl']
	global $comiis_system_config;
	global $comiis_md5file;
	global $comiis_info;
	global $comiis_lang;
	global $comiis_app_switch;
	if (strlen($re_sn) != 18) {
		return false;
	}
	$comiis_templatefile = $_G['templated']. $re_sn.$_G['siteurls'];
	if (1) {
		$comiis_upload = 0;
		if ($_GET['comiis_up_sn'] === $re_sn) {
			$comiis_upload = 1;
		}
		if (!file_exists(DISCUZ_ROOT . './data/template/' . $comiis_templatefile)) {
			$comiis_upload = 1;
		}
		
		if ($comiis_upload == 1) {
			$comiis_postdata = $comiis_postdata;
			ksort($comiis_postdata);
			$comiis_postdatas = '';
			foreach ($comiis_postdata as $k => $v) {
				$comiis_postdatas .= '&' . $k . '=' . rawurlencode($v);
			}
			$comiis_postdata['md5hash'] = md5($comiis_postdatas);
			$comiis_post_data = serialize($comiis_postdata);
			$comiis_random = random(10);
			$key = md5($comiis_random);
			$key = md5(md5(strrev(substr($key, 0, 16))) . substr($key, 8, 24) . strrev(substr($key, 16)));
			$comiis_post_data = authcode($comiis_post_data, 'ENCODE', $key);
			$params = array('comiis_post_data' => $comiis_post_data, 'comiis_random' => $comiis_random);
			$params = base64_encode(serialize($params));
			$md5hash = md5($params . 'comiis');
			$post = array('params' => $params, 'md5hash' => $md5hash);
			$comiis_redata = dunserialize($redata);
		}// fr   omhttp://127.0.0.1
		if (file_exists(DISCUZ_ROOT . './data/template/' . $comiis_templatefile)) {
			if (1) {
				$load_var = explode(',', $load_var);
				if (file_exists(DISCUZ_ROOT . './source/plugin/comiis_app/function/function_comiis_var.php')) {
					require DISCUZ_ROOT . './source/plugin/comiis_app/function/function_comiis_var.php';
				}
			}
			if ($is_list == 1) {
				global $comiis_app_switch;
				global $comiis_reply_list_array;
				global $groupcolor;
				$authorids = $comiis_tids = $comiis_readtids = array();
				loadcache(array('stamps', 'usergroups'));
				foreach ($_G['forum_threadlist'] as $key => $temp) {
					$authorids[] = $temp['authorid'];
					$comiis_tids[] = $temp['tid'];
					if ($temp['attachment'] == 2) {
						$comiis_readtids[] = $temp['tid'];
					}
					if (!$temp['forumstick'] && $temp['closed'] > 1 && ($temp['isgroup'] == 1 || $temp['fid'] != $_G['fid']) || $temp['moved']) {
						$_G['forum_threadlist'][$key]['tid'] = $temp['closed'];
					}
				}
				if ($comiis_app_switch['comiis_list_verify'] == 1 && $_G['setting']['verify']['enabled'] && ($_G['basescript'] != 'forum' || CURMODULE != 'forumdisplay') && $authorids) {
					$_G['comiis_verify'] = comiis_forumdisplay_verify_author($authorids);
				}
				$comiis_app_switch['comiis_list_ico'] = $_G['comiis_app_var']['comiis_list_ico'];
				$comiis_open_displayorder = $_G['comiis_app_var']['comiis_open_displayorder'];
				$comiis_forumlist_notit = $_G['comiis_app_var']['comiis_forumlist_notit'];
				$comiis_app_list_num = $_G['comiis_app_var']['comiis_app_list_num'];
				$comiis_app_list = $_G['comiis_app_var']['comiis_app_list'];
				$member = array();
				$_G['comiis_list_group'] = array();
				if ($authorids) {
					$query = DB::query('SELECT m.uid, m.groupid, p.gender FROM `' . DB::table('common_member') . '` m LEFT JOIN `' . DB::table('common_member_profile') . '` p ON m.uid=p.uid WHERE m.uid IN (' . dimplode($authorids) . ')');
					while ($temp = DB::fetch($query)) {
						$member[$temp['uid']]['stars'] = $_G['cache']['usergroups'][$temp['groupid']]['stars'];
						$member[$temp['uid']]['gender'] = $temp['gender'];
						$_G['comiis_list_group'][$temp['uid']] = strip_tags($_G['cache']['usergroups'][$temp['groupid']]['grouptitle']);
						if (!$groupcolor[$temp['uid']]) {
							$groupcolor[$temp['uid']] = $_G['cache']['usergroups'][$temp['groupid']]['color'];
						}
					}
				}
				$comiis_readtids = $comiis_tids = $comiis_displayorder_array = array();
				$comiis_displayorder_num = 0;
				if (count($_G['forum_threadlist'])) {
					foreach ($_G['forum_threadlist'] as $thread) {
						if (in_array($thread['displayorder'], array(1, 2, 3, 4)) && $page == 1 && $comiis_open_displayorder) {
							$comiis_displayorder_list .= '<li class="b_t"><a href="forum.php?mod=viewthread&tid=' . $thread[tid] . '&' . ($_GET['archiveid'] ? 'archiveid=' . $_GET['archiveid'] . '&' : '') . 'extra=' . $extra . '"' . $thread[highlight] . ($thread['isgroup'] == 1 || $thread['forumstick'] ? 'target="_blank"' : '') . '><span class="bg_0 f_f">{lang thread_sticky}</span>' . $thread[subject] . '</a></li>';
							$comiis_displayorder_num = $comiis_displayorder_num + 1;
						} else {
							if ($thread['attachment'] == 2) {
								$comiis_readtids[] = $thread[tid];
							}
							$comiis_tids[] = $thread[tid];
						}
					}
				}
				$comiis_pyqlist_noimg = unserialize($comiis_app_switch['comiis_pyqlist_noimg']);
				$comiis_picid_array = $message = $all_fid = array();
				if (count($_G['forum_threadlist'])) {
					require_once libfile('function/post');
					$query = DB::query('SELECT fid, tid, pid, message FROM `' . DB::table('forum_post') . '` WHERE tid IN (' . dimplode($comiis_tids) . ') AND first=1');
					while ($temp = DB::fetch($query)) {
						$message[$temp['tid']] = messagecutstr($temp['message'], 100);
						if (in_array($temp['tid'], $comiis_readtids) && !in_array($temp['fid'], $comiis_pyqlist_noimg)) {
							$comiis_picid_array[getattachtableid($temp[tid])][] = $temp['pid'];
						}
					}
				}
				$comiis_pic_list = $comiis_pic_lists = array();
				require DISCUZ_ROOT . './source/plugin/comiis_app/language/language.' . currentlang() . '.php';
				loadcache('comiis_app_list_style', 1);
				foreach ($comiis_liststyle_config as $k => $v) {
					if ($v['sn'] == $re_sn) {
						$k = intval($k);
						$repicnum = intval($_G['cache']['comiis_app_list_style']['fid_picnum'][$k]);
						if ($comiis_liststyle_config[$k]['num']) {
							$repicnum = $repicnum ? $repicnum : intval($comiis_liststyle_config[$k]['num']);
						} else {
							$repicnum = 1;
						}
						break;
					}
				}
				$comiis_pic_list['all_num'] = $repicnum;
				foreach ($comiis_picid_array as $tableid => $pids) {
					if ($tableid >= 0 && $tableid < 10) {
						$query = DB::query('SELECT tid, aid, attachment, width FROM `' . DB::table('forum_attachment_' . intval($tableid)) . '` WHERE pid IN (' . dimplode($pids) . ') AND isimage IN (1, -1)');
						while ($temp = DB::fetch($query)) {
							$comiis_pic_list[$temp['tid']]['nums'] = $comiis_pic_list[$temp['tid']]['nums'] + 1;
							if ($comiis_pic_list[$temp['tid']]['num'] < $repicnum) {
								$comiis_pic_list[$temp['tid']]['num'] = $comiis_pic_list[$temp['tid']]['num'] + 1;
								if ($comiis_pic_list[$temp['tid']]['num'] == 1) {
									$comiis_pic_lista[$temp['tid']]['aid'][] = $temp['aid'];
									$comiis_pic_lista[$temp['tid']]['width'][] = $temp['width'];
									$comiis_pic_lista[$temp['tid']]['attachment'][] = $temp['attachment'];
								}
								if ($comiis_pic_list[$temp['tid']]['num'] <= 3) {
									$comiis_pic_list[$temp['tid']]['aid'][] = $temp['aid'];
									$comiis_pic_list[$temp['tid']]['width'][] = $temp['width'];
									$comiis_pic_list[$temp['tid']]['attachment'][] = $temp['attachment'];
								}
								if ($comiis_pic_list[$temp['tid']]['num'] <= 9) {
									$comiis_pic_lists[$temp['tid']]['aid'][] = $temp['aid'];
									$comiis_pic_lists[$temp['tid']]['width'][] = $temp['width'];
									$comiis_pic_lists[$temp['tid']]['attachment'][] = $temp['attachment'];
								}
							}
						}
					}
				}
				if ($re_sn == 'c3k9MkNvk90mZnsP6s') {
					require_once libfile('function/discuzcode');
					require_once libfile('function/post');
					$comiis_memberrecommend_array = array();
					if (count($_G['forum_threadlist']) && $_G['uid']) {
						$query = DB::query('SELECT f.tid, m.uid, m.username FROM `' . DB::table('forum_memberrecommend') . '` f INNER JOIN `' . DB::table('common_member') . '` m ON f.recommenduid=m.uid WHERE f.tid IN (' . dimplode($comiis_tids) . ') ORDER BY dateline DESC');
						while ($temp = DB::fetch($query)) {
							$comiis_memberrecommend_array[$temp['tid']][$temp[uid]] = $temp;
						}
					}
					$comiis_reply_list_array = array();
					if (count($_G['forum_threadlist'])) {
						$commis_readlist_num = intval($comiis_app_switch['comiis_pyqlist_hfnum']);
						if ($commis_readlist_num) {
							foreach ($comiis_tids as $temp) {
								$query = DB::query('SELECT tid, pid, message, author, authorid, dateline FROM `' . DB::table('forum_post') . '` WHERE tid=\'' . intval($temp) . '\' AND invisible=0 AND status>=0 AND first=0 ORDER BY dateline DESC LIMIT ' . $commis_readlist_num . ';');
								while ($temps = DB::fetch($query)) {
									$temps['encode_name'] = $temps['re_name'] = '';
									if (substr($temps['message'], 0, 7) == '[quote]') {
										preg_match_all('/^\\[quote\\].*?\\[color=#\\d+?\\](.*?)\\s/i', $temps['message'], $re_name);
										$temps['re_name'] = strlen($re_name[1][0]) ? $re_name[1][0] : '';
										$temps['encode_name'] = rawurlencode($temps['re_name']);
									}
									$temps['message'] = comiis_messages(discuzcode($temps['message'], 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0));
									$comiis_reply_list_array[$temps['tid']][] = $temps;
								}
							}
						}
					}
				} else {
					if ($re_sn == 'jjOI1A55JVeuAvs15V' || $re_sn == 'X7G6GddLn7gYdfN7NF') {
						if (count($_G['forum_threadlist']) && $_G['uid']) {
							$query = DB::query('SELECT tid,recommenduid FROM `' . DB::table('forum_memberrecommend') . '` WHERE recommenduid=\'' . $_G['uid'] . '\' AND tid IN (' . dimplode($comiis_tids) . ')');
							while ($temp = DB::fetch($query)) {
								$_G['comiis_memberrecommend'][$temp['tid']] = 1;
							}
						}
					}
				}
			}
			include DISCUZ_ROOT . './data/template/' . $comiis_templatefile;
		}
	} else {
		return false;
	}
}
function comiis_forumdisplay_verify_author($ids)
{
	global $_G;
	$verify = array();
	foreach (C::t('common_member_verify')->fetch_all($ids) as $value) {
		foreach ($_G['setting']['verify'] as $vid => $vsetting) {
			if ($vsetting['available'] && $vsetting['showicon'] && $value['verify' . $vid] == 1) {
				$srcurl = !empty($vsetting['icon']) ? $vsetting['icon'] : '';
				$verify[$value['uid']] .= '<a href="home.php?mod=spacecp&ac=profile&op=verify&vid=' . $vid . '" target="_blank">' . (!empty($srcurl) ? '<img src="' . $srcurl . '" class="vm" alt="' . $vsetting['title'] . '" title="' . $vsetting['title'] . '" />' : $vsetting['title']) . '</a>';
			}
		}
	}
	return $verify;
}