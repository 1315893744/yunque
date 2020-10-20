<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/comiis_sms/language/language.' . currentlang() . '.php';
$plugin_id = 'comiis_sms';
$comiis_upload = 0;
if (!submitcheck('del_search_log')) {
	$comiis_type = array('0' => $comiis_sms['119'], '1' => $comiis_sms['96'], '2' => $comiis_sms['120'], '3' => $comiis_sms['121'], '4' => $comiis_sms['179'], '9' => $comiis_sms['122'], '8' => $comiis_sms['123']);
	$comiis_error = array('ok' => $comiis_sms['118'], '-1' => $comiis_sms['98'], '-2' => $comiis_sms['81'], '-3' => $comiis_sms['80'], '-4' => $comiis_sms['84'], '-5' => $comiis_sms['82'], '-6' => $comiis_sms['99'], '-7' => $comiis_sms['100'], '-8' => $comiis_sms['85'], '-9' => $comiis_sms['83'], '-11' => $comiis_sms['95'], '-12' => $comiis_sms['94'], '-13' => $comiis_sms['231'], 'isv.OUT_OF_SERVICE' => $comiis_sms['101'], 'isv.PRODUCT_UNSUBSCRIBE' => $comiis_sms['102'], 'isv.ACCOUNT_NOT_EXISTS' => $comiis_sms['103'], 'isv.ACCOUNT_ABNORMAL' => $comiis_sms['104'], 'isv.SMS_TEMPLATE_ILLEGAL' => $comiis_sms['105'], 'isv.SMS_SIGNATURE_ILLEGAL' => $comiis_sms['106'], 'isv.MOBILE_NUMBER_ILLEGAL' => $comiis_sms['107'], 'isv.MOBILE_COUNT_OVER_LIMIT' => $comiis_sms['108'], 'isv.TEMPLATE_MISSING_PARAMETERS' => $comiis_sms['109'], 'isv.INVALID_PARAMETERS' => $comiis_sms['110'], 'isv.BUSINESS_LIMIT_CONTROL' => $comiis_sms['111'], 'isv.INVALID_JSON_PARAM' => $comiis_sms['112'], 'isp.SYSTEM_ERROR' => $comiis_sms['113'], 'isv.BLACK_KEY_CONTROL_LIMIT' => $comiis_sms['114'], 'isv.PARAM_NOT_SUPPORT_URL' => $comiis_sms['115'], 'isv.PARAM_LENGTH_LIMIT' => $comiis_sms['116'], 'isv.AMOUNT_NOT_ENOUGH' => $comiis_sms['117'], 'isp.RAM_PERMISSION_DENY' => $comiis_sms['164'], 'isv.PRODUCT_UN_SUBSCRIPT' => $comiis_sms['165'], '1001' => $comiis_sms['180'], '1002' => $comiis_sms['181'], '1003' => $comiis_sms['182'], '1004' => $comiis_sms['183'], '1006' => $comiis_sms['184'], '1007' => $comiis_sms['185'], '1008' => $comiis_sms['186'], '1009' => $comiis_sms['187'], '1011' => $comiis_sms['188'], '1012' => $comiis_sms['189'], '1013' => $comiis_sms['190'], '1014' => $comiis_sms['191'], '1015' => $comiis_sms['192'], '1016' => $comiis_sms['193'], '1017' => $comiis_sms['194'], '1018' => $comiis_sms['195'], '1019' => $comiis_sms['196'], '1020' => $comiis_sms['197'], '1021' => $comiis_sms['198'], '1022' => $comiis_sms['199'], '1023' => $comiis_sms['200'], '1024' => $comiis_sms['201'], '1025' => $comiis_sms['202'], '1026' => $comiis_sms['203'], '1030' => $comiis_sms['204'], '1031' => $comiis_sms['205'], '1032' => $comiis_sms['206'], '1033' => $comiis_sms['207']);
	$nums = 20;
	$page = intval($_GET['page']) ? intval($_GET['page']) : 1;
	$sql_array = array('comiis_sms_log', 'common_member');
	if (!empty($_GET['comiis_search_keyword'])) {
		$s = daddslashes($_GET['comiis_search_keyword']);
		$where = 'WHERE (cm.tel like %s or cm.ip like %s or cm.smscode like %s or m.username like %s)';
		$sql_array[] = '%' . $s . '%';
		$sql_array[] = '%' . $s . '%';
		$sql_array[] = '%' . $s . '%';
		$sql_array[] = '%' . $s . '%';
		if ($_GET['comiis_search_state']) {
			$where .= $_GET['comiis_search_state'] == 1 ? ' AND error=\'ok\' ' : ' AND  error!=\'ok\' ';
		}
		if ($_GET['comiis_search_type'] != '') {
			$where .= ' AND `type`=\'' . intval($_GET['comiis_search_type']) . '\' ';
		}
	} else {
		$s = '';
		$where = '';
	}
	$s_url = 'plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_log' . ($_GET['comiis_search_keyword'] ? '&comiis_search_keyword=' . urldecode($_GET['comiis_search_keyword']) : '') . ($_GET['comiis_search_state'] ? '&comiis_search_state=' . intval($_GET['comiis_search_state']) : '') . (!($_GET['comiis_search_type'] == '') ? '&comiis_search_type=' . intval($_GET['comiis_search_type']) : '');
	$num = DB::result_first('SELECT COUNT(*) FROM %t cm LEFT JOIN %t m ON cm.uid = m.uid ' . $where, $sql_array);
	$comiis_page = ceil($num / $nums);
	$startlimit = ($page - 1) * $nums;
	$comiis_sms_log = DB::fetch_all('SELECT cm.*, m.username FROM %t cm LEFT JOIN %t m ON cm.uid = m.uid ' . $where . ' ORDER BY dateline DESC ' . DB::limit($startlimit, $nums), $sql_array);
	$multipage = multi($num, $nums, $page, ADMINSCRIPT . '?action=plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_log');
	showformheader($s_url);
	showtableheader();
	echo '<br>&nbsp;&nbsp;' . $comiis_sms['124'] . ': <select name="comiis_search_state">
	<option value="0">' . $comiis_sms['126'] . '</option>
	<option value="1" ' . (intval($_GET['comiis_search_state']) == 1 ? 'selected="selected"' : '') . '>' . $comiis_sms['38'] . '</option>
	<option value="2" ' . (intval($_GET['comiis_search_state']) == 2 ? 'selected="selected"' : '') . '>' . $comiis_sms['125'] . '</option>';
	echo '</select>
	&nbsp;' . $comiis_sms['127'] . ': <select name="comiis_search_type">
	<option value="">' . $comiis_sms['126'] . '</option>';
	foreach ($comiis_type as $k => $v) {
		echo '<option value="' . $k . '" ' . (!($_GET['comiis_search_type'] == '') && intval($_GET['comiis_search_type']) == $k ? 'selected="selected"' : '') . '>' . $v . '</option>';
	}
	echo '</select> &nbsp;' . $lang['keywords'] . ': <input type="text" name="comiis_search_keyword" value="' . $s . '" /> &nbsp;<input type="submit" name="comiis_search_submit" value="' . $lang[search] . '" class="btn" style="margin:0;vertical-align:top;">';
	showtablefooter();
	showformfooter();
	showformheader('plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_log', '', 'keywordsearch');
	showtableheader();
	showtablerow('', array('class="rowform" style="width:auto;display:block;"'), array($comiis_sms['128'] . ': 
			<input type="hidden" name="del_search_log" value="true">
			<input class="radio" type="radio" name="delsd" value="1"> ' . $comiis_sms['129'] . ' &nbsp; &nbsp;
			<input class="radio" type="radio" name="delsd" value="2"> ' . $comiis_sms['130'] . ' &nbsp; &nbsp;
			<input class="radio" type="radio" name="delsd" value="3"> ' . $comiis_sms['131'] . ' &nbsp; &nbsp;
			<input class="radio" type="radio" name="delsd" value="4"> ' . $comiis_sms['132'] . ' 
			<input type="submit" value="' . $comiis_sms['133'] . '" class="btn" style="margin:0 0 0 5px;">'));
	showtablefooter();
	showformfooter();
	showtableheader($comiis_sms['134']);
	showsubtitle(array($comiis_sms['43'], $comiis_sms['44'], $comiis_sms['45'], $comiis_sms['229'], $comiis_sms['230'], $comiis_sms['127'], $comiis_sms['124'], $comiis_sms['11'], $comiis_sms['46'], $comiis_sms['135']));
	foreach ($comiis_sms_log as $k => $v) {
		if (!empty($_GET['comiis_search_keyword'])) {
			$v['tel'] = str_replace($s, '<font class="highlight">' . $s . '</font>', $v['tel']);
			$v['ip'] = str_replace($s, '<font class="highlight">' . $s . '</font>', $v['ip']);
			$v['smscode'] = str_replace($s, '<font class="highlight">' . $s . '</font>', $v['smscode']);
			$v['username'] = str_replace($s, '<font class="highlight">' . $s . '</font>', $v['username']);
		}
		showtablerow('', array('width="5%"', 'width="10%"', 'width="15%"', 'width="5%"', 'width="5%"', 'width="12%"', 'width="17%"', 'width="8%"', 'class="8%"', 'class="10%"'), array($v['uid'] ? $v['uid'] : '--', $v['username'] ? '<a href=\'home.php?mod=space&uid=' . $v['uid'] . '\' target=\'_blank\'>' . $v['username'] . '</a>' : '--', $v['tel'], $v['province'], '<a href="javascript:;" title="' . $v['ua'] . '">' . (strpos($v['ua'], 'iPhone') || strpos($v['ua'], 'iPad') ? 'IOS' : (strpos($v['ua'], 'Android') ? 'Android' : 'other')) . '</a>', $comiis_type[$v['type']], $v['error'] == 'ok' ? $comiis_error[$v['error']] : '<font color=red>' . $comiis_error[$v['error']] . '</font>', $v['smscode'], $v['ip'], dgmdate($v['dateline'])));
	}
	showsubmit('', '', '', '', $multipage, false);
	showtablefooter();
} else {
	$deldate = array(1 => 86400 * 7, 2 => 86400 * 30, 3 => 86400 * 90, 4 => 86400 * 182);
	$ids = intval($_GET['delsd']);
	if ($deldate[$ids]) {
		$deldateline = intval($deldate[$ids]);
		DB::query('DELETE FROM ' . DB::table('comiis_sms_log') . ' WHERE dateline<' . (TIMESTAMP - $deldateline));
		cpmsg($comiis_sms['63'], 'action=plugins&operation=config&do=' . $_G['gp_do'] . '&identifier=comiis_sms&pmod=comiis_log', 'succeed', array(), '', 0);
	} else {
		cpmsg($comiis_sms['136'], '', 'error', array(), '', 0);
	}
}