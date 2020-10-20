<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$plugin_id = 'comiis_sms';
$comiis_upload = 0;
loadcache('plugin');
$_G['comiis_sms'] = $_G['cache']['plugin']['comiis_sms'];
require_once DISCUZ_ROOT . './source/plugin/comiis_sms/language/language.' . currentlang() . '.php';
if (!in_array($_GET['actions'], array('list', 'edit', 'add'))) {
	$_GET['actions'] = 'list';
}
if ($_GET['actions'] == 'list') {
	if (!submitcheck('delsubmit')) {
		$nums = 20;
		$where = '';
		$sql_array = array('comiis_sms_user', 'common_member');
		if (!empty($_GET['keyword'])) {
			if ($_GET['isuid'] == 1) {
				$s = intval($_GET['keyword']);
				$where = 'WHERE cm.uid=\'' . $s . '\'';
			} else {
				$s = daddslashes($_GET['keyword']);
				$where = 'WHERE (cm.tel like %s or cm.regip like %s or m.username like %s)';
				$sql_array[] = '%' . $s . '%';
				$sql_array[] = '%' . $s . '%';
				$sql_array[] = '%' . $s . '%';
			}
			if ($_GET['isname'] > 0) {
				$where .= ($where ? ' AND ' : ' ') . 'cm.type=\'' . ($_GET['isname'] == 1 ? '0' : '1') . '\'';
			}
		}
		$page = intval($_GET['page']) ? intval($_GET['page']) : 1;
		$num = DB::result_first('SELECT COUNT(*) FROM %t cm LEFT JOIN %t m ON cm.uid = m.uid ' . $where, $sql_array);
		$comiis_page = ceil($num / $nums);
		$startlimit = ($page - 1) * $nums;
		$multipage = multi($num, $nums, $page, ADMINSCRIPT . '?action=plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=list' . ($_GET['keyword'] ? '&keyword=' . urldecode($_GET['keyword']) : '') . ($_GET['isuid'] ? '&isuid=' . intval($_GET['isuid']) : '') . ($_GET['isname'] ? '&isname=' . intval($_GET['isname']) : ''));
		$comiis_sms_log = DB::fetch_all('SELECT cm.*, m.username FROM %t cm LEFT JOIN %t m ON cm.uid = m.uid ' . $where . ' ORDER BY dateline DESC ' . DB::limit($startlimit, $nums), $sql_array);
		showformheader('plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=list' . ($_GET['keyword'] ? '&keyword=' . urldecode($_GET['keyword']) : '') . ($_GET['isuid'] ? '&isuid=' . intval($_GET['isuid']) : '') . ($_GET['isname'] ? '&isname=' . intval($_GET['isname']) : ''), '', 'search');
		showtableheader();
		echo '<input type="hidden" name="search_submit" value="true"><br>' . $lang['keywords'] . ': <input type="text" name="keyword" value="' . $s . '" /> &nbsp;<select name="isuid" style="width:80px;"><option value="0">' . $comiis_sms['55'] . $comiis_sms['56'] . '</option><option value="1"' . ($_GET['isuid'] == 1 ? ' selected="selected"' : '') . '>' . $comiis_sms['55'] . 'UID</option></select>&nbsp;<select name="isname" style="width:100px;"><option value="0">' . $comiis_sms['57'] . '</option><option value="1"' . ($_GET['isname'] == 1 ? ' selected="selected"' : '') . '>' . $comiis_sms['54'] . $comiis_sms['22'] . '</option><option value="2"' . ($_GET['isname'] == 2 ? ' selected="selected"' : '') . '>' . $comiis_sms['53'] . $comiis_sms['22'] . '</option></select>&nbsp;<input type="submit" name="search_key" value="' . $lang[search] . '" class="btn" style="margin:0;vertical-align:top;">';
		showtablefooter();
		showformfooter();
		showformheader('plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=list' . ($_GET['keyword'] ? '&keyword=' . urldecode($_GET['keyword']) : '') . ($_GET['isuid'] ? '&isuid=' . intval($_GET['isuid']) : '') . ($_GET['isname'] ? '&isname=' . intval($_GET['isname']) : '') . ($_GET['page'] ? '&page=' . $_GET['page'] : ''), '', 'del');
		showtableheader($comiis_sms['58'] . '<a href=\'' . ADMINSCRIPT . '?action=plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=add\' style=\'color:red;margin-left:20px;\'>+' . $comiis_sms['59'] . '</a>');
		showsubtitle(array('', $comiis_sms['43'], $comiis_sms['44'], $comiis_sms['45'], $comiis_sms['229'], $comiis_sms['230'], $comiis_sms['46'], $comiis_sms['47'], $comiis_sms['60'], $comiis_sms['61']));
		foreach ($comiis_sms_log as $k => $v) {
			if ($_GET['isuid'] != 1 && !empty($_GET['keyword'])) {
				$v['tel'] = str_replace($s, '<font class="highlight">' . $s . '</font>', $v['tel']);
				$v['regip'] = str_replace($s, '<font class="highlight">' . $s . '</font>', $v['regip']);
				$v['username'] = str_replace($s, '<font class="highlight">' . $s . '</font>', $v['username']);
			}
			showtablerow('', array('width="10px"', 'width="5%"', 'width="15%"', 'width="10%"', 'width="7%"', 'width="7%"', 'width="12%"', 'width="12%"', 'width="8%"', ''), array('<input class="checkbox" type="checkbox" name="delete[]" value="' . $v['id'] . '">', $v['uid'], '<a href=\'home.php?mod=space&uid=' . $v['uid'] . '\' target=\'_blank\'>' . $v['username'] . '</a>', $v['tel'], $v['province'], '<a href="javascript:;" title="' . $v['ua'] . '">' . (strpos($v['ua'], 'iPhone') || strpos($v['ua'], 'iPad') ? 'IOS' : (strpos($v['ua'], 'Android') ? 'Android' : 'other')) . '</a>', $v['regip'], dgmdate($v['dateline']), $v['type'] == 0 ? $comiis_sms['54'] : '<font color=green>' . $comiis_sms['53'] . '</font>', '<a href=\'' . ADMINSCRIPT . '?action=plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=edit&editid=' . $v['id'] . '\'>' . $comiis_sms['62'] . '</a>'));
		}
		showsubmit('delsubmit', 'submit', 'del', '', $multipage, false);
		showtablefooter();
		showformfooter();
	} else {
		if ($ids = dimplode($_GET['delete'])) {
			foreach ($_GET['delete'] as $v) {
				$reuser = DB::fetch_first('SELECT * FROM %t WHERE id=%d', array('comiis_sms_user', $v));
				if ($_G['comiis_sms']['reg_verify'] != '0') {
					$verifys = array();
					$verifys['verify' . $_G['comiis_sms']['reg_verify']] = '0';
					$verifys['uid'] = $reuser['uid'];
					C::t('common_member_verify')->insert($verifys, false, true);
				}
			}
			DB::query('DELETE FROM ' . DB::table('comiis_sms_user') . ' WHERE ' . DB::field('id', $_GET['delete']));
		}
		cpmsg($comiis_sms['63'], 'action=plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=list' . ($_GET['keyword'] ? '&keyword=' . urldecode($_GET['keyword']) : '') . ($_GET['isuid'] ? '&isuid=' . intval($_GET['isuid']) : '') . ($_GET['isname'] ? '&isname=' . intval($_GET['isname']) : '') . ($_GET['page'] ? '&page=' . $_GET['page'] : ''), 'succeed', array(), '', 0);
	}
} else {
	if ($_GET['actions'] == 'edit') {
		$ids = intval($_GET['editid']);
		if (!submitcheck('editsubmit')) {
			$reuser = DB::fetch_first('SELECT cm.*, m.username FROM %t cm LEFT JOIN %t m ON cm.uid = m.uid WHERE cm.id=%d', array('comiis_sms_user', 'common_member', $ids));
			if ($reuser['id'] == $ids) {
				showformheader('plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=edit&editid=' . $ids);
				showtableheader($comiis_sms['62'] . (' <a href=\'admin.php?action=members&operation=edit&uid=' . $reuser['uid'] . '\'>[' . $reuser['username'] . ']</a> ') . $comiis_sms['64'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $comiis_sms['47'] . ': ' . dgmdate($reuser['dateline']));
				showsetting($comiis_sms['43'], 'uid', $reuser['uid'], 'text', '', '', $comiis_sms['66'] . $comiis_sms['43']);
				showsetting($comiis_sms['45'], 'tel', $reuser['tel'], 'text', '', '', $comiis_sms['66'] . $comiis_sms['45']);
				showsetting($comiis_sms['46'], 'regip', $reuser['regip'], 'text', '', '', $comiis_sms['66'] . $comiis_sms['46']);
				showsetting($comiis_sms['54'] . $comiis_sms['44'], 'editname', $reuser['type'] ? 0 : 1, 'radio', '', '', $comiis_sms['67'] . $comiis_sms['54'] . $comiis_sms['44']);
				showsubmit('editsubmit', 'submit');
				showtablefooter();
				showformfooter();
			} else {
				cpmsg($comiis_sms['68'], '', 'error', array(), '', 0);
			}
		} else {
			if (empty($_GET['tel']) || !preg_match('/^(\\+)?(86)?0?1\\d{10}$/', $_GET['tel'])) {
				cpmsg($comiis_sms['35'], '', 'error', array(), '', 0);
			} else {
				$reuser = DB::fetch_first('SELECT * FROM %t WHERE id=%d', array('comiis_sms_user', $ids));
				if ($reuser['id'] == $ids) {
					if ($reuser['uid'] != intval($_GET['uid']) && DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d', array('comiis_sms_user', $_GET['uid']))) {
						cpmsg($comiis_sms['70'], '', 'error', array(), '', 0);
					} else {
						$tel_info = comiis_sms_info($_GET['tel']);
						DB::update('comiis_sms_user', array('uid' => intval($_GET['uid']), 'tel' => $_GET['tel'], 'regip' => $_GET['regip'], 'type' => $_GET['editname'] ? 0 : 1, 'province' => $tel_info['tel_info']), DB::field('id', $ids));
						cpmsg($comiis_sms['63'], 'action=plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=edit&editid=' . $ids, 'succeed', array(), '', 0);
					}
				} else {
					cpmsg($comiis_sms['68'], '', 'error', array(), '', 0);
				}
			}
		}
	} else {
		if ($_GET['actions'] == 'add') {
			if (!submitcheck('addsubmit')) {
				showformheader('plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user&actions=add');
				showtableheader($comiis_sms['59']);
				showsetting($comiis_sms['43'], 'uid', '', 'text', '', '', $comiis_sms['66'] . $comiis_sms['43']);
				showsetting($comiis_sms['45'], 'tel', '', 'text', '', '', $comiis_sms['66'] . $comiis_sms['45']);
				showsetting($comiis_sms['54'] . $comiis_sms['44'], 'editname', 1, 'radio', '', '', $comiis_sms['67'] . $comiis_sms['54'] . $comiis_sms['44']);
				showsubmit('addsubmit', 'submit');
				showtablefooter();
				showformfooter();
			} else {
				if (empty($_GET['tel']) || !preg_match('/^(\\+)?(86)?0?1\\d{10}$/', $_GET['tel'])) {
					cpmsg($comiis_sms['35'], '', 'error', array(), '', 0);
				} else {
					if (intval($_GET['uid']) != $_GET['uid']) {
						cpmsg($comiis_sms['69'], '', 'error', array(), '', 0);
					} else {
						if (DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d', array('comiis_sms_user', $_GET['uid']))) {
							cpmsg($comiis_sms['70'], '', 'error', array(), '', 0);
						} else {
							$tel_info = comiis_sms_info($_GET['tel']);
							DB::insert('comiis_sms_user', array('uid' => $_GET['uid'], 'tel' => $_GET['tel'], 'regip' => $_G['clientip'], 'type' => $_GET['editname'] ? 0 : 1, 'state' => 1, 'dateline' => TIMESTAMP, 'province' => $tel_info['tel_info'], 'ua' => $_SERVER['HTTP_USER_AGENT']));
							if ($_G['comiis_sms']['reg_verify'] != '0') {
								$verifys = array();
								$verifys['verify' . $_G['comiis_sms']['reg_verify']] = '1';
								$verifys['uid'] = $_GET['uid'];
								C::t('common_member_verify')->insert($verifys, false, true);
							}
							C::t('common_member_profile')->update($_GET['uid'], array('mobile' => $_GET['tel']));
							cpmsg($comiis_sms['63'], 'action=plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_user', 'succeed', array(), '', 0);
						}
					}
				}
			}
		}
	}
}
function comiis_sms_info($tel = '')
{
	global $_G;
	$return = array();
	if (strlen(trim($tel)) > 6) {
		$url = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel=' . $tel;
		$res = dfsockopen($url);
		$res = diconv($res, 'gbk', CHARSET);
		preg_match_all('/(\\w+):\'([^\']+)/', $res, $re);
		$res_arr = array_combine($re[1], $re[2]);
		if ($res_arr && $tel == $res_arr['telString']) {
			$return['tel_info'] = $res_arr['carrier'] ? $res_arr['carrier'] : $res_arr['province'] . $res_arr['catName'];
			$return['province'] = $res_arr['province'];
			$return['catname'] = $res_arr['catname'];
			$return['carrier'] = $res_arr['carrier'];
			$return['tel'] = $res_arr['telString'];
		}
	}
	return $return;
}