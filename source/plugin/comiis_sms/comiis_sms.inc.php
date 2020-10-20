<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/comiis_sms/language/language.' . currentlang() . '.php';
$_G['comiis_sms'] = $_G['cache']['plugin']['comiis_sms'];
if (!in_array($_GET['action'], array('register', 'binding', 'Unbundling', 'lostpw', 'login'))) {
	comiis_sms_tip('-1');
}
$plugin_id = 'comiis_sms';
$comiis_upload = 0;
if (empty($_GET['comiis_tel']) || !preg_match('/^(\\+)?(86)?0?1\\d{10}$/', $_GET['comiis_tel'])) {
	comiis_sms_tip('-4');
}
if (in_array($_GET['action'], array('binding', 'Unbundling')) && !$_G['uid']) {
	comiis_sms_tip('-3');
}
if ($_G['comiis_sms']['tel_limit']) {
	$numarr = explode("\n", $_G['comiis_sms']['tel_limit']);
	foreach ($numarr as $value) {
		if (strlen(trim($value)) > 1) {
			if (substr(trim($_GET['comiis_tel']), 0, strlen(trim($value))) == trim($value)) {
				comiis_sms_tip('-8');
			}
		}
	}
}
if ($_G['comiis_sms']['sms_province']) {
	$comiis_sms_province = array();
	$numarr = explode("\n", $_G['comiis_sms']['sms_province']);
	foreach ($numarr as $value) {
		if (strlen(trim($value)) > 1) {
			$comiis_sms_province[] = trim($value);
		}
	}
	if (count($comiis_sms_province)) {
		$tel_info = comiis_sms_info($_GET['comiis_tel']);
		if ($tel_info['tel'] != $_GET['comiis_tel'] || !in_array($tel_info['province'], $comiis_sms_province)) {
			comiis_sms_tip('-13');
		}
	}
}
DB::query('DELETE FROM ' . DB::table('comiis_sms_temp') . ' WHERE dateline<\'' . (TIMESTAMP - 86400) . '\'');
if ($_GET['action'] == 'login' && $_G['comiis_sms']['tel_reglogin']) {
	if ($_G['uid']) {
		comiis_sms_tip('-2');
	}
	comiis_sms_sms($_GET['comiis_tel'], 4);
} else {
	if ($_GET['action'] == 'register' && (!defined('IN_MOBILE') && $_G['comiis_sms']['open_pcreg'] || defined('IN_MOBILE') && $_G['comiis_sms']['open_mobreg'])) {
		if ($_G['uid']) {
			comiis_sms_tip('-2');
		}
		if ($_G['comiis_sms']['renum'] > 0 && DB::result_first('SELECT COUNT(*) FROM %t WHERE tel=%s', array('comiis_sms_user', $_GET['comiis_tel'])) > $_G['comiis_sms']['renum'] - 1) {
			comiis_sms_tip('-5');
		}
		comiis_sms_sms($_GET['comiis_tel'], 0);
	} else {
		if ($_GET['action'] == 'lostpw' && $_G['comiis_sms']['tel_lpw']) {
			if ($_G['uid']) {
				comiis_sms_tip('-12');
			}
			if ($_G['comiis_sms']['lostpw_seccodeverify']) {
				list($seccodecheck) = seccheck('login');
				if ($seccodecheck && !check_seccode($_GET['seccodeverify'], $_GET['seccodehash'], 0, $_GET['seccodemodid'])) {
					comiis_sms_tip($comiis_sms['213']);
				}
			}
			$uid_mobnum = DB::result_first('SELECT COUNT(*) FROM %t WHERE tel=%s', array('comiis_sms_user', $_GET['comiis_tel']));
			if ($uid_mobnum) {
				comiis_sms_sms($_GET['comiis_tel'], 1);
			} else {
				comiis_sms_tip('-4');
			}
		} else {
			if ($_GET['action'] == 'binding' || $_GET['action'] == 'Unbundling' && $_G['comiis_sms']['unbundling']) {
				if ($_GET['action'] == 'Unbundling') {
					$uid_mobnum = DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d && tel=%s', array('comiis_sms_user', $_G['uid'], $_GET['comiis_tel']));
					if (!$uid_mobnum) {
						comiis_sms_tip('-11');
					}
				} else {
					if ($_G['comiis_sms']['renum'] > 0 && DB::result_first('SELECT COUNT(*) FROM %t WHERE tel=%s', array('comiis_sms_user', $_GET['comiis_tel'])) > $_G['comiis_sms']['renum'] - 1) {
						comiis_sms_tip('-5');
					}
				}
				if ($_G['comiis_sms']['setup_seccodeverify']) {
					list($seccodecheck) = seccheck('login');
					if ($seccodecheck && !check_seccode($_GET['seccodeverify'], $_GET['seccodehash'], 0, $_GET['seccodemodid'])) {
						comiis_sms_tip($comiis_sms['213']);
					}
				}
				if ($_GET['action'] == 'Unbundling') {
					if ($_G['comiis_sms']['unbundling']) {
						comiis_sms_sms($_GET['comiis_tel'], 3);
					}
				} else {
					comiis_sms_sms($_GET['comiis_tel'], 2);
				}
			}
		}
	}
}
function comiis_sms_sms($tel = '', $type = 0)
{
	global $_G;
	global $comiis_sms;
	if (empty($_G['comiis_sms']['appkey']) || empty($_G['comiis_sms']['appsecret']) || empty($_G['comiis_sms']['name']) || empty($_G['comiis_sms']['reg_template']) || empty($_G['comiis_sms']['lostpw_template']) || empty($_G['comiis_sms']['bd_template']) || empty($_G['comiis_sms']['unre_template'])) {
		comiis_sms_tip('-9');
	}
	if ($_G['comiis_sms']['seccodeverify'] && $type == '0' || $_G['comiis_sms']['login_seccodeverify'] && $type == '4') {
		if ($_G['comiis_sms']['seccodeverify'] && $type == '0') {
			list($seccodecheck, $secqaacheck) = seccheck('register');
		} else {
			if ($_G['comiis_sms']['login_seccodeverify'] && $type == '4') {
				list($seccodecheck) = seccheck('login');
			}
		}
		if ($secqaacheck && !check_secqaa($_GET['secanswer'], $_GET['secqaahash'])) {
			comiis_sms_tip($comiis_sms['213']);
		}
		if ($seccodecheck && !check_seccode($_GET['seccodeverify'], $_GET['seccodehash'], 0, $_GET['seccodemodid'])) {
			comiis_sms_tip($comiis_sms['213']);
		}
	}
	$smstemplate = array('0' => $_G['comiis_sms']['reg_template'], '1' => $_G['comiis_sms']['lostpw_template'], '2' => $_G['comiis_sms']['bd_template'], '3' => $_G['comiis_sms']['unre_template'], '4' => $_G['comiis_sms']['login_template']);
	$smsnum = DB::result_first('SELECT COUNT(*) FROM %t WHERE tel=%s OR ip=%s OR sid=%s', array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid']));
	if ($_G['comiis_sms']['mfnum'] > 0 && $smsnum > $_G['comiis_sms']['mfnum'] - 1) {
		comiis_sms_tip('-6');
	}
	if ($smsnum) {
		$resms_time_data = DB::fetch_first('SELECT dateline FROM %t WHERE tel=%s OR ip=%s OR sid=%s ORDER BY dateline DESC ' . DB::limit(0, 1), array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid']));
		$out_time = $resms_time_data['dateline'] + (!(intval($_G['comiis_sms']['code_time']) >= 60) ? 60 : intval($_G['comiis_sms']['code_time']));
		if ($out_time > TIMESTAMP) {
			$out_time = $out_time - TIMESTAMP;
			comiis_sms_tip('-7', intval($out_time));
		}
	}
	$code_len = !empty($_G['comiis_sms']['code_len']) ? intval($_G['comiis_sms']['code_len']) : 6;
	$code = '';
	$i = 0;
	while ($i < $code_len) {
		$code .= rand(0, 9);
		$i = $i + 1;
	}
	if (intval($_G['comiis_sms']['sms_service']) == 1) {
		include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/TopSdk.php';
		$c = new TopClient();
		$c->appkey = $_G['comiis_sms']['appkey'];
		$c->secretKey = $_G['comiis_sms']['appsecret'];
		$c->format = 'json';
		$req = new AlibabaAliqinFcSmsNumSendRequest();
		$req->setExtend('');
		$req->setSmsType('normal');
		$req->setSmsFreeSignName(diconv($_G['comiis_sms']['name'], CHARSET, 'UTF-8'));
		$req->setSmsParam('{"code":"' . $code . '"}');
		$req->setRecNum($tel);
		$req->setSmsTemplateCode($smstemplate[$type]);
		$resp = $c->execute($req);
		if (isset($resp->sub_code)) {
			$result = json_encode($resp->sub_code);
			comiis_sms_log($tel, $type, $code, $result);
			comiis_sms_tip($result);
			exit(0);
		}
	} else {
		if (intval($_G['comiis_sms']['sms_service']) == 2) {
			include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/tx/SmsTools.php';
			include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/tx/SmsSender.php';
			$singleSender = new SmsSingleSender($_G['comiis_sms']['appkey'], $_G['comiis_sms']['appsecret']);
			$result = $singleSender->sendWithParam('86', $tel, $smstemplate[$type], array($code), diconv($_G['comiis_sms']['name'], CHARSET, 'UTF-8'), '', '');
			$rsp = json_decode($result);
			if ($rsp->result != '0') {
				comiis_sms_log($tel, $type, $code, $rsp->result);
				comiis_sms_tip($rsp->result);
				exit(0);
			}
		} else {
			if (intval($_G['comiis_sms']['sms_service']) == 3) {
				$comiis_sms_bao_tip = array('-1' => $comiis_sms['219'], '-2' => $comiis_sms['220'], '30' => $comiis_sms['221'], '40' => $comiis_sms['222'], '41' => $comiis_sms['223'], '42' => $comiis_sms['224'], '43' => $comiis_sms['225'], '50' => $comiis_sms['226'], '51' => $comiis_sms['227']);
				$user = $_G['comiis_sms']['appkey'];
				$pass = md5($_G['comiis_sms']['appsecret']);
				$content = $comiis_sms['232'] . $_G['comiis_sms']['name'] . $comiis_sms['233'] . str_replace('{code}', $code, $smstemplate[$type]);
				if (intval($_G['comiis_sms']['sms_bao_type']) == 0) {
					$result = dfsockopen('https://api.smsbao.com/sms?u=' . $user . '&p=' . $pass . '&m=' . $tel . '&c=' . urlencode(diconv($content, CHARSET, 'UTF-8')));
					if ($result == '51') {
						$result = dfsockopen('https://api.smsbao.com/wsms?u=' . $user . '&p=' . $pass . '&m=' . $tel . '&c=' . urlencode(diconv($content, CHARSET, 'UTF-8')));
					}
					if ($result != '0') {
						comiis_sms_log($tel, $type, $code, $comiis_sms_bao_tip[$result]);
						comiis_sms_tip($comiis_sms_bao_tip[$result]);
						exit(0);
					}
				} else {
					$result = dfsockopen('https://api.smsbao.com/voice?u=' . $user . '&p=' . $pass . '&m=' . $tel . '&c=' . $code);
					if ($result != '0') {
						comiis_sms_log($tel, $type, $code, $comiis_sms_bao_tip[$result]);
						comiis_sms_tip($comiis_sms_bao_tip[$result]);
						exit(0);
					}
				}
			} else {
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/Regions/ProductDomain.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/Http/HttpResponse.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/Auth/ISigner.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/Profile/IClientProfile.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/AcsRequest.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/IAcsClient.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/RpcAcsRequest.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/Config.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/Profile/DefaultProfile.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Core/DefaultAcsClient.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Api/Sms/Request/V20170525/SendSmsRequest.php';
				include_once DISCUZ_ROOT . './source/plugin/comiis_sms/sdk/lib/Api/Sms/Request/V20170525/QuerySendDetailsRequest.php';
				Config::load();
				$accessKeyId = $_G['comiis_sms']['appkey'];
				$accessKeySecret = $_G['comiis_sms']['appsecret'];
				$product = 'Dysmsapi';
				$domain = 'dysmsapi.aliyuncs.com';
				$region = 'cn-hangzhou';
				$profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
				DefaultProfile::addEndpoint('cn-hangzhou', 'cn-hangzhou', $product, $domain);
				$acsClient = new DefaultAcsClient($profile);
				$request = new SendSmsRequest();
				$request->setPhoneNumbers($tel);
				$request->setSignName(diconv($_G['comiis_sms']['name'], CHARSET, 'UTF-8'));
				$request->setTemplateCode($smstemplate[$type]);
				$request->setTemplateParam('{"code":"' . $code . '"}');
				$acsResponse = $acsClient->getAcsResponse($request);
				if ($acsResponse->Code != 'OK') {
					comiis_sms_log($tel, $type, $code, $acsResponse->Code);
					comiis_sms_tip($acsResponse->Code);
					exit(0);
				}
			}
		}
	}
	comiis_sms_log($tel, $type, $code, 'ok');
	comiis_sms_tip('1', $_G['comiis_sms']['code_time']);
}
function comiis_sms_log($tel = '', $type = 0, $code = '', $result)
{
	global $_G;
	$result = str_replace('"', '', $result);
	$tel_info = comiis_sms_info($tel);
	DB::insert('comiis_sms_log', array('uid' => $_G['uid'], 'tel' => $tel, 'ip' => $_G['clientip'], 'type' => $type, 'smscode' => $code, 'error' => $result, 'dateline' => TIMESTAMP, 'province' => $tel_info['tel_info'], 'ua' => $_SERVER['HTTP_USER_AGENT']));
	if ($result == 'ok') {
		comiis_sms_temp($tel, $type, $code);
	}
}
function comiis_sms_temp($tel = '', $type = 0, $code = '')
{
	global $_G;
	DB::update('comiis_sms_temp', array('state' => 0), DB::field('tel', $tel) . ' OR ' . DB::field('ip', $_G['clientip']) . ' OR ' . DB::field('sid', $_G['sid']));
	DB::insert('comiis_sms_temp', array('tel' => $tel, 'ip' => $_G['clientip'], 'sid' => $_G['sid'], 'code' => $code, 'uid' => $_G['uid'], 'type' => $type, 'dateline' => TIMESTAMP, 'state' => 1));
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
function comiis_sms_tip($a, $b = 0)
{
	global $comiis_sms;
	$comiis_mobreg_tip = array('-1' => $comiis_sms['98'], '-2' => $comiis_sms['81'], '-3' => $comiis_sms['80'], '-4' => $comiis_sms['84'], '-5' => $comiis_sms['82'], '-6' => $comiis_sms['99'], '-7' => $comiis_sms['100'], '-8' => $comiis_sms['85'], '-9' => $comiis_sms['83'], '-11' => $comiis_sms['95'], '-12' => $comiis_sms['94'], '-13' => $comiis_sms['231'], 'isv.OUT_OF_SERVICE' => $comiis_sms['101'], 'isv.PRODUCT_UNSUBSCRIBE' => $comiis_sms['102'], 'isv.ACCOUNT_NOT_EXISTS' => $comiis_sms['103'], 'isv.ACCOUNT_ABNORMAL' => $comiis_sms['104'], 'isv.SMS_TEMPLATE_ILLEGAL' => $comiis_sms['105'], 'isv.SMS_SIGNATURE_ILLEGAL' => $comiis_sms['106'], 'isv.MOBILE_NUMBER_ILLEGAL' => $comiis_sms['107'], 'isv.MOBILE_COUNT_OVER_LIMIT' => $comiis_sms['108'], 'isv.TEMPLATE_MISSING_PARAMETERS' => $comiis_sms['109'], 'isv.INVALID_PARAMETERS' => $comiis_sms['110'], 'isv.BUSINESS_LIMIT_CONTROL' => $comiis_sms['111'], 'isv.INVALID_JSON_PARAM' => $comiis_sms['112'], 'isp.SYSTEM_ERROR' => $comiis_sms['113'], 'isv.BLACK_KEY_CONTROL_LIMIT' => $comiis_sms['114'], 'isv.PARAM_NOT_SUPPORT_URL' => $comiis_sms['115'], 'isv.PARAM_LENGTH_LIMIT' => $comiis_sms['116'], 'isv.AMOUNT_NOT_ENOUGH' => $comiis_sms['117'], 'isp.RAM_PERMISSION_DENY' => $comiis_sms['164'], 'isv.PRODUCT_UN_SUBSCRIPT' => $comiis_sms['165'], '1001' => $comiis_sms['180'], '1002' => $comiis_sms['181'], '1003' => $comiis_sms['182'], '1004' => $comiis_sms['183'], '1006' => $comiis_sms['184'], '1007' => $comiis_sms['185'], '1008' => $comiis_sms['186'], '1009' => $comiis_sms['187'], '1011' => $comiis_sms['188'], '1012' => $comiis_sms['189'], '1013' => $comiis_sms['190'], '1014' => $comiis_sms['191'], '1015' => $comiis_sms['192'], '1016' => $comiis_sms['193'], '1017' => $comiis_sms['194'], '1018' => $comiis_sms['195'], '1019' => $comiis_sms['196'], '1020' => $comiis_sms['197'], '1021' => $comiis_sms['198'], '1022' => $comiis_sms['199'], '1023' => $comiis_sms['200'], '1024' => $comiis_sms['201'], '1025' => $comiis_sms['202'], '1026' => $comiis_sms['203'], '1030' => $comiis_sms['204'], '1031' => $comiis_sms['205'], '1032' => $comiis_sms['206'], '1033' => $comiis_sms['207']);
	$a = str_replace('"', '', $a);
	include template('common/header_ajax');
	echo 'comiis_mob_reg|' . ($comiis_mobreg_tip[$a] ? $comiis_mobreg_tip[$a] : $a) . '|' . ($b ? $b : '0');
	include template('common/footer_ajax');
	exit(0);
}