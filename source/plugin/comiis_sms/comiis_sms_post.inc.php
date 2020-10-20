<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/comiis_sms/language/language.' . currentlang() . '.php';
if (!in_array($_GET['action'], array('register', 'binding', 'Unbundling', 'rename', 'lostpw', 'login'))) {
	showmessage($comiis_sms['79']);
}
if (in_array($_GET['action'], array('binding', 'Unbundling', 'rename')) && !$_G['uid']) {
	showmessage($comiis_sms['80']);
}
$plugin_id = 'comiis_sms';
$comiis_upload = 0;
$_G['comiis_sms'] = $_G['cache']['plugin']['comiis_sms'];
DB::query('DELETE FROM ' . DB::table('comiis_sms_temp') . ' WHERE dateline<\'' . (TIMESTAMP - 86400) . '\'');
if ($_GET['action'] == 'login' && $_G['comiis_sms']['tel_reglogin']) {
	if (submitcheck('comiis_mobile_loginsubmit')) {
		if (!$_G['uid']) {
			$comiis_usersetup = 1;
			if (empty($_G['comiis_sms']['appkey']) || empty($_G['comiis_sms']['appsecret']) || empty($_G['comiis_sms']['name']) || empty($_G['comiis_sms']['reg_template']) || empty($_G['comiis_sms']['lostpw_template']) || empty($_G['comiis_sms']['bd_template']) || empty($_G['comiis_sms']['unre_template'])) {
				showmessage($comiis_sms['83']);
			}
			if (empty($_GET['comiis_tel']) || !preg_match('/^(\\+)?(86)?0?1\\d{10}$/', $_GET['comiis_tel'])) {
				showmessage($comiis_sms['84']);
			}
			if ($_G['comiis_sms']['tel_limit']) {
				$numarr = explode("\n", $_G['comiis_sms']['tel_limit']);
				foreach ($numarr as $value) {
					if (strlen(trim($value)) > 1) {
						if (substr(trim($_GET['comiis_tel']), 0, strlen(trim($value))) == trim($value)) {
							showmessage($comiis_sms['85']);
						}
					}
				}
			}
			if ($_G['comiis_sms']['login_seccodeverify']) {
				list($seccodecheck) = seccheck('login');
				if ($seccodecheck && !check_seccode($_GET['seccodeverify'], $_GET['seccodehash'], 0, $_GET['seccodemodid'])) {
					showmessage('submit_seccode_invalid');
				}
			}
			$tel_info = comiis_sms_info($_GET['comiis_tel']);
			if ($_G['comiis_sms']['sms_province']) {
				$comiis_sms_province = array();
				$numarr = explode("\n", $_G['comiis_sms']['sms_province']);
				foreach ($numarr as $value) {
					if (strlen(trim($value)) > 1) {
						$comiis_sms_province[] = trim($value);
					}
				}
				if (count($comiis_sms_province)) {
					if ($tel_info['tel'] != $_GET['comiis_tel'] || !in_array($tel_info['province'], $comiis_sms_province)) {
						showmessage($comiis_sms['231']);
					}
				}
			}
			$resms_data = DB::fetch_first('SELECT * FROM %t WHERE dateline>\'' . (TIMESTAMP - $_G['comiis_sms']['code_outtime']) . '\' AND type=\'4\' AND (tel=%s OR ip=%s OR sid=%s) ORDER BY dateline DESC ' . DB::limit(0, 1), array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid']));
			if (empty($_GET['code']) || !preg_match('/^\\d{' . (!empty($_G['comiis_sms']['code_len']) ? intval($_G['comiis_sms']['code_len']) : 6) . '}$/', $_GET['code'])) {
				comiis_sms_errlog($resms_data['id'], $resms_data['count']);
				showmessage($comiis_sms['86']);
			}
			if ($resms_data['count'] > $_G['comiis_sms']['code_errnum']) {
				showmessage($comiis_sms['87']);
			}
			if (!empty($resms_data['tel']) && $resms_data['tel'] == $_GET['comiis_tel'] && $_GET['code'] == $resms_data['code'] && $resms_data['state'] == 1) {
				DB::update('comiis_sms_temp', array('state' => 0), DB::field('id', $resms_data['id']));
				$comiis_teluser = DB::fetch_first('SELECT * FROM %t WHERE tel=%s ORDER BY dateline DESC', array('comiis_sms_user', $_GET['comiis_tel']));
				if ($comiis_teluser['uid']) {
					if ($comiis_teluser['state'] == 1) {
						$comiis_usersetup = 0;
					}
					require_once libfile('function/member');
					if (!function_exists('uc_user_login')) {
						loaducenter();
					}
					$member = getuserbyuid($comiis_teluser['uid'], 1);
					if ($member['uid'] == $comiis_teluser['uid']) {
						setloginstatus($member, 1296000);
					} else {
						showmessage($comiis_sms['166']);
					}
				} else {
					$ids = comiis_get_rand(2) . mt_rand(10000, 99999);
					$username = str_replace('{id}', $ids, $_G['comiis_sms']['reg_name']);
					$email = 'mob' . str_replace('{id}', mt_rand(100000, 999999), $_G['comiis_sms']['reg_email']);
					$password = md5(random(16));
					$groupid = intval($_G['comiis_sms']['reg_group'] ? $_G['comiis_sms']['reg_group'] : $_G['setting']['newusergroupid']);
					include_once libfile('function/member');
					if (!function_exists('uc_user_login')) {
						loaducenter();
					}
					if (uc_get_user(addslashes($username)) || C::t('common_member')->fetch_uid_by_username($username) || C::t('common_member_archive')->fetch_uid_by_username($username)) {
						$ids = comiis_get_rand(2) . mt_rand(1000, 9999);
						$username = str_replace('{id}', $ids, $_G['comiis_sms']['reg_name']);
						$email = 'mob' . str_replace('{id}', mt_rand(100000, 999999), $_G['comiis_sms']['reg_email']);
					}
					$uid = uc_user_register(addslashes($username), $password, $email, '', '', $_G['clientip']);
					if ($uid <= 0) {
						if ($uid == 0 - 1) {
							showmessage('profile_username_illegal');
						} else {
							if ($uid == 0 - 2) {
								showmessage('profile_username_protect');
							} else {
								if ($uid == 0 - 3) {
									showmessage('profile_username_duplicate');
								} else {
									if ($uid == 0 - 4) {
										showmessage('profile_email_illegal ' . $email);
									} else {
										if ($uid == 0 - 5) {
											showmessage('profile_email_domain_illegal ' . $email);
										} else {
											if ($uid == 0 - 6) {
												showmessage('profile_email_duplicate ' . $email);
											} else {
												showmessage('undefined_action');
											}
										}
									}
								}
							}
						}
						return;
					}
					$initcredits = array('credits' => explode(',', $_G['setting']['initcredits']));
					C::t('common_member')->insert($uid, $username, $password, $email, $_G['clientip'], $groupid, $initcredits);
					DB::insert('comiis_sms_user', array('uid' => $uid, 'tel' => $_GET['comiis_tel'], 'regip' => $_G['clientip'], 'type' => 1, 'state' => 2, 'dateline' => TIMESTAMP, 'province' => $tel_info['tel_info'], 'ua' => $_SERVER['HTTP_USER_AGENT']));
					if ($_G['comiis_sms']['reg_verify'] != '0') {
						$verifys = array();
						$verifys['verify' . $_G['comiis_sms']['reg_verify']] = '1';
						$verifys['uid'] = $uid;
						C::t('common_member_verify')->insert($verifys, false, true);
					}
					C::t('common_member_profile')->update($uid, array('mobile' => $_GET['comiis_tel']));
					if ($_G['setting']['regctrl'] || $_G['setting']['regfloodctrl']) {
						C::t('common_regip')->delete_by_dateline($_G['timestamp'] - ($_G['setting']['regctrl'] > 72 ? $_G['setting']['regctrl'] : 72) * 3600);
						if ($_G['setting']['regctrl']) {
							C::t('common_regip')->insert(array('ip' => $_G['clientip'], 'count' => 0 - 1, 'dateline' => $_G['timestamp']));
						}
					}
					if ($_G['setting']['regverify'] == 2) {
						C::t('common_member_validate')->insert(array('uid' => $uid, 'submitdate' => $_G['timestamp'], 'moddate' => 0, 'admin' => '', 'submittimes' => 1, 'status' => 0, 'message' => '', 'remark' => ''), false, true);
						manage_addnotify('verifyuser');
					}
					include_once libfile('function/stat');
					updatestat('register');
					setloginstatus(array('uid' => $uid, 'username' => $username, 'password' => $password, 'groupid' => $groupid), 1296000);
				}
			} else {
				comiis_sms_errlog($resms_data['id'], $resms_data['count']);
				showmessage($comiis_sms['86']);
			}
		}
		showmessage($comiis_sms['75'], $comiis_usersetup ? './home.php?mod=spacecp&ac=plugin&id=comiis_sms:comiis_setup&mods=rename' : ($_GET['referer'] ? $_GET['referer'] : './'), '', array('showdialog' => 1, 'locationtime' => true));
	}
} else {
	if ($_GET['action'] == 'register' && (!defined('IN_MOBILE') && $_G['comiis_sms']['open_pcreg'] || defined('IN_MOBILE') && $_G['comiis_sms']['open_mobreg'])) {
		if (submitcheck('comiis_smssubmit')) {
			if ($_G['uid']) {
				showmessage($comiis_sms['81']);
			}
			if ($_G['setting']['bbrules'] && $_GET['agreebbrule'] != '1') {
				showmessage($comiis_sms['212']);
			}
			if ($_G['comiis_sms']['seccodeverify']) {
				list($seccodecheck, $secqaacheck) = seccheck('register');
				if ($secqaacheck && !check_secqaa($_GET['secanswer'], $_GET['secqaahash'])) {
					showmessage('submit_secqaa_invalid');
				}
				if ($seccodecheck && !check_seccode($_GET['seccodeverify'], $_GET['seccodehash'], 0, $_GET['seccodemodid'])) {
					showmessage('submit_seccode_invalid');
				}
			}
			if ($_G['comiis_sms']['renum'] > 0 && DB::result_first('SELECT COUNT(*) FROM %t WHERE tel=%s', array('comiis_sms_user', $_GET['comiis_tel'])) > $_G['comiis_sms']['renum'] - 1) {
				showmessage($comiis_sms['82']);
			}
			if (empty($_G['comiis_sms']['appkey']) || empty($_G['comiis_sms']['appsecret']) || empty($_G['comiis_sms']['name']) || empty($_G['comiis_sms']['reg_template']) || empty($_G['comiis_sms']['lostpw_template']) || empty($_G['comiis_sms']['bd_template']) || empty($_G['comiis_sms']['unre_template'])) {
				showmessage($comiis_sms['83']);
			}
			if (empty($_GET['comiis_tel']) || !preg_match('/^(\\+)?(86)?0?1\\d{10}$/', $_GET['comiis_tel'])) {
				showmessage($comiis_sms['84']);
			}
			if ($_G['comiis_sms']['tel_limit']) {
				$numarr = explode("\n", $_G['comiis_sms']['tel_limit']);
				foreach ($numarr as $value) {
					if (strlen(trim($value)) > 1) {
						if (substr(trim($_GET['comiis_tel']), 0, strlen(trim($value))) == trim($value)) {
							showmessage($comiis_sms['85']);
						}
					}
				}
			}
			$tel_info = comiis_sms_info($_GET['comiis_tel']);
			if ($_G['comiis_sms']['sms_province']) {
				$comiis_sms_province = array();
				$numarr = explode("\n", $_G['comiis_sms']['sms_province']);
				foreach ($numarr as $value) {
					if (strlen(trim($value)) > 1) {
						$comiis_sms_province[] = trim($value);
					}
				}
				if (count($comiis_sms_province)) {
					if ($tel_info['tel'] != $_GET['comiis_tel'] || !in_array($tel_info['province'], $comiis_sms_province)) {
						showmessage($comiis_sms['231']);
					}
				}
			}
			if ($_G['comiis_sms']['open_name'] == 1) {
				include_once libfile('function/member');
				loaducenter();
				$username = dhtmlspecialchars(trim($_GET['name']));
				$usernamelen = dstrlen($username);
				if ($usernamelen < 3) {
					showmessage('profile_username_tooshort');
				} else {
					if ($usernamelen > 15) {
						showmessage('profile_username_toolong');
					}
				}
				if (uc_get_user(addslashes($username)) || C::t('common_member')->fetch_uid_by_username($username) || C::t('common_member_archive')->fetch_uid_by_username($username)) {
					showmessage('profile_username_duplicate');
				}
			}
			if ($_G['setting']['strongpw']) {
				$strongpw_str = array();
				if (in_array(1, $_G['setting']['strongpw']) && !preg_match('/\\d+/', $_GET['password2'])) {
					$strongpw_str[] = lang('member/template', 'strongpw_1');
				}
				if (in_array(2, $_G['setting']['strongpw']) && !preg_match('/[a-z]+/', $_GET['password2'])) {
					$strongpw_str[] = lang('member/template', 'strongpw_2');
				}
				if (in_array(3, $_G['setting']['strongpw']) && !preg_match('/[A-Z]+/', $_GET['password2'])) {
					$strongpw_str[] = lang('member/template', 'strongpw_3');
				}
				if (in_array(4, $_G['setting']['strongpw']) && !preg_match('/[^a-zA-z0-9]+/', $_GET['password2'])) {
					$strongpw_str[] = lang('member/template', 'strongpw_4');
				}
				if ($strongpw_str) {
					showmessage(lang('member/template', 'password_weak') . implode(',', $strongpw_str));
				}
			}
			if ($_GET['password1'] !== $_GET['password2']) {
				showmessage('profile_passwd_notmatch');
			}
			if (!$_GET['password1'] || $_GET['password1'] != addslashes($_GET['password1'])) {
				showmessage('profile_passwd_illegal');
			}
			if ($_G['setting']['pwlength']) {
				if (strlen($_GET['password1']) < $_G['setting']['pwlength']) {
					showmessage('profile_password_tooshort', '', array('pwlength' => $_G['setting']['pwlength']));
				}
			}
			$resms_data = DB::fetch_first('SELECT * FROM %t WHERE dateline>\'' . (TIMESTAMP - $_G['comiis_sms']['code_outtime']) . '\' AND type=\'0\' AND (tel=%s OR ip=%s OR sid=%s) ORDER BY dateline DESC ' . DB::limit(0, 1), array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid']));
			if (empty($_GET['code']) || !preg_match('/^\\d{' . (!empty($_G['comiis_sms']['code_len']) ? intval($_G['comiis_sms']['code_len']) : 6) . '}$/', $_GET['code'])) {
				comiis_sms_errlog($resms_data['id'], $resms_data['count']);
				showmessage($comiis_sms['86']);
			}
			if ($resms_data['count'] > $_G['comiis_sms']['code_errnum']) {
				showmessage($comiis_sms['87']);
			}
			if (!empty($resms_data['tel']) && $resms_data['tel'] == $_GET['comiis_tel'] && $_GET['code'] == $resms_data['code'] && $resms_data['state'] == 1) {
				$ids = comiis_get_rand(2) . mt_rand(10000, 99999);
				if ($_G['comiis_sms']['open_name'] != 1) {
					$username = str_replace('{id}', $ids, $_G['comiis_sms']['reg_name']);
				}
				$email = 'mob' . str_replace('{id}', mt_rand(100000, 999999), $_G['comiis_sms']['reg_email']);
				$password = addslashes($_GET['password2']);
				$groupid = intval($_G['comiis_sms']['reg_group'] ? $_G['comiis_sms']['reg_group'] : $_G['setting']['newusergroupid']);
				if ($_G['comiis_sms']['open_name'] != 1) {
					include_once libfile('function/member');
					loaducenter();
					if (uc_get_user(addslashes($username)) || C::t('common_member')->fetch_uid_by_username($username) || C::t('common_member_archive')->fetch_uid_by_username($username)) {
						$ids = comiis_get_rand(2) . mt_rand(1000, 9999);
						$username = str_replace('{id}', $ids, $_G['comiis_sms']['reg_name']);
						$email = 'mob' . str_replace('{id}', mt_rand(100000, 999999), $_G['comiis_sms']['reg_email']);
					}
				}
				$uid = uc_user_register(addslashes($username), $password, $email, '', '', $_G['clientip']);
				if ($uid <= 0) {
					if ($uid == 0 - 1) {
						showmessage('profile_username_illegal');
					} else {
						if ($uid == 0 - 2) {
							showmessage('profile_username_protect');
						} else {
							if ($uid == 0 - 3) {
								showmessage('profile_username_duplicate');
							} else {
								if ($uid == 0 - 4) {
									showmessage('profile_email_illegal ' . $email);
								} else {
									if ($uid == 0 - 5) {
										showmessage('profile_email_domain_illegal ' . $email);
									} else {
										if ($uid == 0 - 6) {
											showmessage('profile_email_duplicate ' . $email);
										} else {
											showmessage('undefined_action');
										}
									}
								}
							}
						}
					}
					return;
				}
				$initcredits = array('credits' => explode(',', $_G['setting']['initcredits']));
				C::t('common_member')->insert($uid, $username, $password, $email, $_G['clientip'], $groupid, $initcredits);
				DB::update('comiis_sms_temp', array('state' => 0), DB::field('id', $resms_data['id']));
				DB::insert('comiis_sms_user', array('uid' => $uid, 'tel' => $_GET['comiis_tel'], 'regip' => $_G['clientip'], 'type' => $_G['comiis_sms']['open_name'] == 1 ? 0 : 1, 'state' => 1, 'dateline' => TIMESTAMP, 'province' => $tel_info['tel_info'], 'ua' => $_SERVER['HTTP_USER_AGENT']));
				if ($_G['comiis_sms']['reg_verify'] != '0') {
					$verifys = array();
					$verifys['verify' . $_G['comiis_sms']['reg_verify']] = '1';
					$verifys['uid'] = $uid;
					C::t('common_member_verify')->insert($verifys, false, true);
				}
				C::t('common_member_profile')->update($uid, array('mobile' => $_GET['comiis_tel']));
				if ($_G['setting']['regctrl'] || $_G['setting']['regfloodctrl']) {
					C::t('common_regip')->delete_by_dateline($_G['timestamp'] - ($_G['setting']['regctrl'] > 72 ? $_G['setting']['regctrl'] : 72) * 3600);
					if ($_G['setting']['regctrl']) {
						C::t('common_regip')->insert(array('ip' => $_G['clientip'], 'count' => 0 - 1, 'dateline' => $_G['timestamp']));
					}
				}
				if ($_G['setting']['regverify'] == 2) {
					C::t('common_member_validate')->insert(array('uid' => $uid, 'submitdate' => $_G['timestamp'], 'moddate' => 0, 'admin' => '', 'submittimes' => 1, 'status' => 0, 'message' => '', 'remark' => ''), false, true);
					manage_addnotify('verifyuser');
				}
				include_once libfile('function/stat');
				updatestat('register');
				setloginstatus(array('uid' => $uid, 'username' => $username, 'password' => $password, 'groupid' => $groupid), 1296000);
				showmessage($comiis_sms['88'], $_GET['referer'] ? $_GET['referer'] : './', '', array('showdialog' => 1, 'locationtime' => true));
			} else {
				comiis_sms_errlog($resms_data['id'], $resms_data['count']);
				showmessage($comiis_sms['86']);
			}
		}
	} else {
		if ($_GET['action'] == 'binding') {
			if (submitcheck('comiis_mobile_bindingsubmit')) {
				if (empty($_GET['comiis_tel']) || !preg_match('/^(\\+)?(86)?0?1\\d{10}$/', $_GET['comiis_tel'])) {
					showmessage($comiis_sms['84']);
				}
				if ($_G['comiis_sms']['setup_seccodeverify']) {
					list($seccodecheck) = seccheck('login');
					if ($seccodecheck && !check_seccode($_GET['seccodeverify'], $_GET['seccodehash'], 0, $_GET['seccodemodid'])) {
						showmessage('submit_seccode_invalid');
					}
				}
				$comiis_mobile_user = DB::fetch_first('SELECT * FROM %t WHERE uid=%d ' . DB::limit(0, 1), array('comiis_sms_user', $_G['uid']));
				if ($comiis_mobile_user['uid'] == $_G['uid']) {
					showmessage($comiis_sms['89']);
				}
				if ($_G['comiis_sms']['renum'] > 0 && DB::result_first('SELECT COUNT(*) FROM %t WHERE tel=%s', array('comiis_sms_user', $_GET['comiis_tel'])) > $_G['comiis_sms']['renum'] - 1) {
					showmessage($comiis_sms['82']);
				}
				if (empty($_G['comiis_sms']['appkey']) || empty($_G['comiis_sms']['appsecret']) || empty($_G['comiis_sms']['name']) || empty($_G['comiis_sms']['reg_template']) || empty($_G['comiis_sms']['lostpw_template']) || empty($_G['comiis_sms']['bd_template']) || empty($_G['comiis_sms']['unre_template'])) {
					showmessage($comiis_sms['83']);
				}
				if ($_G['comiis_sms']['tel_limit']) {
					$numarr = explode("\n", $_G['comiis_sms']['tel_limit']);
					foreach ($numarr as $value) {
						if (strlen(trim($value)) > 1) {
							if (substr(trim($_GET['comiis_tel']), 0, strlen(trim($value))) == trim($value)) {
								showmessage($comiis_sms['85']);
							}
						}
					}
				}
				$tel_info = comiis_sms_info($_GET['comiis_tel']);
				if ($_G['comiis_sms']['sms_province']) {
					$comiis_sms_province = array();
					$numarr = explode("\n", $_G['comiis_sms']['sms_province']);
					foreach ($numarr as $value) {
						if (strlen(trim($value)) > 1) {
							$comiis_sms_province[] = trim($value);
						}
					}
					if (count($comiis_sms_province)) {
						if ($tel_info['tel'] != $_GET['comiis_tel'] || !in_array($tel_info['province'], $comiis_sms_province)) {
							showmessage($comiis_sms['231']);
						}
					}
				}
				$resms_data = DB::fetch_first('SELECT * FROM %t WHERE dateline>\'' . (TIMESTAMP - $_G['comiis_sms']['code_outtime']) . '\' AND type=\'2\' AND (tel=%s OR ip=%s OR sid=%s) ORDER BY dateline DESC ' . DB::limit(0, 1), array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid']));
				if (empty($_GET['code']) || !preg_match('/^\\d{' . (!empty($_G['comiis_sms']['code_len']) ? intval($_G['comiis_sms']['code_len']) : 6) . '}$/', $_GET['code'])) {
					comiis_sms_errlog($resms_data['id'], $resms_data['count']);
					showmessage($comiis_sms['86']);
				}
				if ($resms_data['count'] > $_G['comiis_sms']['code_errnum']) {
					showmessage($comiis_sms['87']);
				}
				if (!empty($resms_data['tel']) && $resms_data['tel'] == $_GET['comiis_tel'] && $_GET['code'] == $resms_data['code'] && $resms_data['state'] == 1) {
					DB::update('comiis_sms_temp', array('state' => 0), DB::field('id', $resms_data['id']));
					if ($_G['comiis_sms']['reg_verify'] != '0') {
						$verifys = array();
						$verifys['verify' . $_G['comiis_sms']['reg_verify']] = '1';
						$verifys['uid'] = $_G['uid'];
						C::t('common_member_verify')->insert($verifys, false, true);
					}
					C::t('common_member_profile')->update($_G['uid'], array('mobile' => $_GET['comiis_tel']));
					DB::insert('comiis_sms_user', array('uid' => $_G['uid'], 'tel' => $_GET['comiis_tel'], 'regip' => $_G['clientip'], 'type' => 0, 'state' => 1, 'dateline' => TIMESTAMP, 'province' => $tel_info['tel_info'], 'ua' => $_SERVER['HTTP_USER_AGENT']));
					showmessage($comiis_sms['90'], 'home.php?mod=spacecp&ac=plugin&id=comiis_sms:comiis_setup', '', array('showdialog' => 1, 'locationtime' => true));
				} else {
					comiis_sms_errlog($resms_data['id'], $resms_data['count']);
					showmessage($comiis_sms['86']);
				}
			}
		} else {
			if ($_GET['action'] == 'Unbundling' && $_G['comiis_sms']['unbundling']) {
				if (submitcheck('comiis_mobile_bindingsubmit')) {
					if (empty($_GET['comiis_tel']) || !preg_match('/^(\\+)?(86)?0?1\\d{10}$/', $_GET['comiis_tel'])) {
						showmessage($comiis_sms['84']);
					}
					if ($_G['comiis_sms']['setup_seccodeverify']) {
						list($seccodecheck) = seccheck('login');
						if ($seccodecheck && !check_seccode($_GET['seccodeverify'], $_GET['seccodehash'], 0, $_GET['seccodemodid'])) {
							showmessage('submit_seccode_invalid');
						}
					}
					$uid_mobnum = DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d && tel=%s', array('comiis_sms_user', $_G['uid'], $_GET['comiis_tel']));
					if (!$uid_mobnum) {
						showmessage($comiis_sms['91']);
					}
					if (empty($_G['comiis_sms']['appkey']) || empty($_G['comiis_sms']['appsecret']) || empty($_G['comiis_sms']['name']) || empty($_G['comiis_sms']['reg_template']) || empty($_G['comiis_sms']['lostpw_template']) || empty($_G['comiis_sms']['bd_template']) || empty($_G['comiis_sms']['unre_template'])) {
						showmessage($comiis_sms['83']);
					}
					$resms_data = DB::fetch_first('SELECT * FROM %t WHERE dateline>\'' . (TIMESTAMP - $_G['comiis_sms']['code_outtime']) . '\' AND type=\'3\' AND (tel=%s OR ip=%s OR sid=%s) ORDER BY dateline DESC ' . DB::limit(0, 1), array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid']));
					if (empty($_GET['code']) || !preg_match('/^\\d{' . (!empty($_G['comiis_sms']['code_len']) ? intval($_G['comiis_sms']['code_len']) : 6) . '}$/', $_GET['code'])) {
						comiis_sms_errlog($resms_data['id'], $resms_data['count']);
						showmessage($comiis_sms['86']);
					}
					if ($resms_data['count'] > $_G['comiis_sms']['code_errnum']) {
						showmessage($comiis_sms['87']);
					}
					if (!empty($resms_data['tel']) && $resms_data['tel'] == $_GET['comiis_tel'] && $_GET['code'] == $resms_data['code'] && $resms_data['state'] == 1) {
						DB::update('comiis_sms_temp', array('state' => 0), DB::field('id', $resms_data['id']));
						if ($_G['comiis_sms']['reg_verify'] != '0') {
							$verifys = array();
							$verifys['verify' . $_G['comiis_sms']['reg_verify']] = '0';
							$verifys['uid'] = $_G['uid'];
							C::t('common_member_verify')->insert($verifys, false, true);
						}
						DB::query('DELETE FROM ' . DB::table('comiis_sms_user') . ' WHERE ' . DB::field('uid', $_G['uid']));
						showmessage($comiis_sms['92'], 'home.php?mod=spacecp&ac=plugin&id=comiis_sms:comiis_setup', '', array('showdialog' => 1, 'locationtime' => true));
					} else {
						comiis_sms_errlog($resms_data['id'], $resms_data['count']);
						showmessage($comiis_sms['86']);
					}
				}
			} else {
				if ($_GET['action'] == 'rename') {
					if (submitcheck('renamesubmit')) {
						$comiis_mobile_reg_user = DB::fetch_first('SELECT * FROM %t WHERE type=\'1\' AND uid=%d ' . DB::limit(0, 1), array('comiis_sms_user', $_G['uid']));
						if ($comiis_mobile_reg_user['uid'] == $_G['uid']) {
							include_once libfile('function/member');
							loaducenter();
							$username = dhtmlspecialchars(trim($_GET['newname']));
							$usernamelen = dstrlen($username);
							if ($usernamelen < 3) {
								showmessage('profile_username_tooshort');
							} else {
								if ($usernamelen > 15) {
									showmessage('profile_username_toolong');
								}
							}
							if ($username != $_G['member']['username']) {
								if (uc_get_user(addslashes($username)) || C::t('common_member')->fetch_uid_by_username($username) || C::t('common_member_archive')->fetch_uid_by_username($username)) {
									showmessage('profile_username_duplicate');
								}
							}
							if ($comiis_mobile_reg_user['state'] == 2) {
								if ($_G['setting']['strongpw']) {
									$strongpw_str = array();
									if (in_array(1, $_G['setting']['strongpw']) && !preg_match('/\\d+/', $_GET['password2'])) {
										$strongpw_str[] = lang('member/template', 'strongpw_1');
									}
									if (in_array(2, $_G['setting']['strongpw']) && !preg_match('/[a-z]+/', $_GET['password2'])) {
										$strongpw_str[] = lang('member/template', 'strongpw_2');
									}
									if (in_array(3, $_G['setting']['strongpw']) && !preg_match('/[A-Z]+/', $_GET['password2'])) {
										$strongpw_str[] = lang('member/template', 'strongpw_3');
									}
									if (in_array(4, $_G['setting']['strongpw']) && !preg_match('/[^a-zA-z0-9]+/', $_GET['password2'])) {
										$strongpw_str[] = lang('member/template', 'strongpw_4');
									}
									if ($strongpw_str) {
										showmessage(lang('member/template', 'password_weak') . implode(',', $strongpw_str));
									}
								}
								if ($_GET['password1'] !== $_GET['password2']) {
									showmessage('profile_passwd_notmatch');
								}
								if (!$_GET['password1'] || $_GET['password1'] != addslashes($_GET['password1'])) {
									showmessage('profile_passwd_illegal');
								}
								if ($_G['setting']['pwlength']) {
									if (strlen($_GET['password1']) < $_G['setting']['pwlength']) {
										showmessage('profile_password_tooshort', '', array('pwlength' => $_G['setting']['pwlength']));
									}
								}
								$ucresult = uc_user_edit(addslashes($_G['member']['username']), NULL, $_GET['password1'], NULL, 1);
								if ($ucresult == 0 - 1) {
									showmessage('profile_passwd_wrong', '', array(), array('return' => true));
								}
								C::t('common_member')->update($_G['uid'], array('password' => md5(random(10))));
							}
							DB::update('comiis_sms_user', array('type' => 0, 'state' => 1), DB::field('id', $comiis_mobile_reg_user['id']));
							if ($username != $_G['member']['username']) {
								$oldname = $_G['member']['username'];
								$newname = $username;
								DB::query('UPDATE ' . DB::table('common_adminnote') . (' SET admin=\'' . $newname . '\' WHERE admin=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_block') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_block_item') . (' SET title=\'' . $newname . '\' WHERE title=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_block_item_data') . (' SET title=\'' . $newname . '\' WHERE title=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_card_log') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_failedlogin') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_grouppm') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_invite') . (' SET fusername=\'' . $newname . '\' WHERE fusername=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_member') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_member_security') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_member_validate') . (' SET admin=\'' . $newname . '\' WHERE admin=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_member_verify_info') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_member_security') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_mytask') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_report') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_session') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('common_word') . (' SET admin=\'' . $newname . '\' WHERE admin=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_activityapply') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_announcement') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_collection') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_collectioncomment') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_collectionfollow') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_collectionteamworker') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_forumrecommend') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_groupuser') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_imagetype') . (' SET name=\'' . $newname . '\' WHERE name=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_order') . (' SET buyer=\'' . $newname . '\' WHERE buyer=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_order') . (' SET admin=\'' . $newname . '\' WHERE admin=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_pollvoter') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_post') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_postcomment') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_promotion') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_ratelog') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_rsscache') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_thread') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_threadmod') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_trade') . (' SET seller=\'' . $newname . '\' WHERE seller=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_tradelog') . (' SET seller=\'' . $newname . '\' WHERE seller=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_tradelog') . (' SET buyer=\'' . $newname . '\' WHERE buyer=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_warning') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_album') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_blog') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_clickuser') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_comment') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_docomment') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_doing') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_feed') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_feed_app') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_follow') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_follow') . (' SET fusername=\'' . $newname . '\' WHERE fusername=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_follow_feed') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_follow_feed_archiver') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_friend') . (' SET fusername=\'' . $newname . '\' WHERE fusername=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_friend_request') . (' SET fusername=\'' . $newname . '\' WHERE fusername=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_notification') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_pic') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_poke') . (' SET fromusername=\'' . $newname . '\' WHERE fromusername=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_share') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_show') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_specialuser') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_visitor') . (' SET vusername=\'' . $newname . '\' WHERE vusername=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_specialuser') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('portal_article_title') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('portal_comment') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('portal_rsscache') . (' SET author=\'' . $newname . '\' WHERE author=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('portal_topic') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('portal_topic_pic') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_collection') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_collectioncomment') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_collectionfollow') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('forum_collectionteamworker') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_follow') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_follow') . (' SET username=\'' . $fusername . '\' WHERE username=\'' . $fusername . '\''));
								DB::query('UPDATE ' . DB::table('home_follow_feed') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . DB::table('home_follow_feed_archiver') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . UC_DBTABLEPRE . ('admins SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . UC_DBTABLEPRE . ('badwords SET admin=\'' . $newname . '\' WHERE admin=\'' . $oldname . '\''));
								DB::query('UPDATE ' . UC_DBTABLEPRE . ('feeds SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . UC_DBTABLEPRE . ('members SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . UC_DBTABLEPRE . ('mergemembers SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								DB::query('UPDATE ' . UC_DBTABLEPRE . ('protectedmembers SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
								C::t('common_member')->update_cache($_G['uid'], array('username' => $newname));
							}
							showmessage($comiis_sms['93'], dreferer(), array());
						}
					}
				} else {
					if ($_GET['action'] == 'lostpw' && $_G['comiis_sms']['tel_lpw']) {
						if ($_G['uid']) {
							showmessage($comiis_sms['94']);
						}
						if (empty($_GET['comiis_tel']) || !preg_match('/^(\\+)?(86)?0?1\\d{10}$/', $_GET['comiis_tel'])) {
							showmessage($comiis_sms['84']);
						}
						$uid_mobnum = DB::result_first('SELECT COUNT(*) FROM %t WHERE tel=%s', array('comiis_sms_user', $_GET['comiis_tel']));
						if (!$uid_mobnum) {
							showmessage($comiis_sms['95']);
						}
						if (submitcheck('comiis_mobile_lostpwsubmit')) {
							if (empty($_G['comiis_sms']['appkey']) || empty($_G['comiis_sms']['appsecret']) || empty($_G['comiis_sms']['name']) || empty($_G['comiis_sms']['reg_template']) || empty($_G['comiis_sms']['lostpw_template']) || empty($_G['comiis_sms']['bd_template']) || empty($_G['comiis_sms']['unre_template'])) {
								showmessage($comiis_sms['83']);
							}
							if ($_G['comiis_sms']['lostpw_seccodeverify']) {
								list($seccodecheck) = seccheck('login');
								if ($seccodecheck && !check_seccode($_GET['seccodeverify'], $_GET['seccodehash'], 0, $_GET['seccodemodid'])) {
									showmessage('submit_seccode_invalid');
								}
							}
							$resms_data = DB::fetch_first('SELECT * FROM %t WHERE dateline>\'' . (TIMESTAMP - $_G['comiis_sms']['code_outtime']) . '\' AND type=\'1\' AND (tel=%s OR ip=%s OR sid=%s) ORDER BY dateline DESC ' . DB::limit(0, 1), array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid']));
							if (empty($_GET['code']) || !preg_match('/^\\d{' . (!empty($_G['comiis_sms']['code_len']) ? intval($_G['comiis_sms']['code_len']) : 6) . '}$/', $_GET['code'])) {
								comiis_sms_errlog($resms_data['id'], $resms_data['count']);
								showmessage($comiis_sms['86']);
							}
							if ($resms_data['count'] > $_G['comiis_sms']['code_errnum']) {
								showmessage($comiis_sms['87']);
							}
							if (!empty($resms_data['tel']) && $resms_data['tel'] == $_GET['comiis_tel'] && $_GET['code'] == $resms_data['code'] && $resms_data['state'] == 1) {
								DB::update('comiis_sms_temp', array('type' => 9), DB::field('id', $resms_data['id']));
								showmessage($comiis_sms['96'], dreferer(), array('tel' => $_GET['comiis_tel'], 'code' => $_GET['code'], 'md5' => md5($_GET['comiis_tel'] . $_G['clientip'] . $_G['sid'] . $_GET['code'])));
							} else {
								comiis_sms_errlog($resms_data['id'], $resms_data['count']);
								showmessage($comiis_sms['86']);
							}
						} else {
							if (submitcheck('comiis_mobile_pwsubmit') && $_GET['comiis_tel'] && $_GET['code'] && $_GET['md5'] && $_GET['md5'] == md5($_G['clientip'] . $_GET['comiis_tel'] . $_G['sid'] . $_GET['code'])) {
								if (empty($_G['comiis_sms']['appkey']) || empty($_G['comiis_sms']['appsecret']) || empty($_G['comiis_sms']['name']) || empty($_G['comiis_sms']['reg_template']) || empty($_G['comiis_sms']['lostpw_template']) || empty($_G['comiis_sms']['bd_template']) || empty($_G['comiis_sms']['unre_template'])) {
									showmessage($comiis_sms['83']);
								}
								$resms_data = DB::fetch_first('SELECT * FROM %t WHERE dateline>\'' . (TIMESTAMP - $_G['comiis_sms']['code_outtime']) . '\' AND type=\'8\' AND (tel=%s OR ip=%s OR sid=%s) ORDER BY dateline DESC ' . DB::limit(0, 1), array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid']));
								if (empty($_GET['code']) || !preg_match('/^\\d{' . (!empty($_G['comiis_sms']['code_len']) ? intval($_G['comiis_sms']['code_len']) : 6) . '}$/', $_GET['code'])) {
									comiis_sms_errlog($resms_data['id'], $resms_data['count']);
									showmessage($comiis_sms['86']);
								}
								if ($resms_data['count'] > $_G['comiis_sms']['code_errnum']) {
									showmessage($comiis_sms['87']);
								}
								if (!empty($resms_data['tel']) && $resms_data['tel'] == $_GET['comiis_tel'] && $_GET['code'] == $resms_data['code'] && $resms_data['state'] == 1) {
									$_GET['comiis_uidpassedit'] = intval($_GET['comiis_uidpassedit']);
									$uid_tel = DB::fetch_first('SELECT m.username, m.uid FROM %t cm LEFT JOIN %t m ON m.uid=cm.uid WHERE cm.tel=%s AND cm.uid=%d', array('comiis_sms_user', 'common_member', $_GET['comiis_tel'], $_GET['comiis_uidpassedit']));
									if ($uid_tel['uid'] == $_GET['comiis_uidpassedit']) {
										include_once libfile('function/member');
										loaducenter();
										if ($_G['setting']['strongpw']) {
											$strongpw_str = array();
											if (in_array(1, $_G['setting']['strongpw']) && !preg_match('/\\d+/', $_GET['password2'])) {
												$strongpw_str[] = lang('member/template', 'strongpw_1');
											}
											if (in_array(2, $_G['setting']['strongpw']) && !preg_match('/[a-z]+/', $_GET['password2'])) {
												$strongpw_str[] = lang('member/template', 'strongpw_2');
											}
											if (in_array(3, $_G['setting']['strongpw']) && !preg_match('/[A-Z]+/', $_GET['password2'])) {
												$strongpw_str[] = lang('member/template', 'strongpw_3');
											}
											if (in_array(4, $_G['setting']['strongpw']) && !preg_match('/[^a-zA-z0-9]+/', $_GET['password2'])) {
												$strongpw_str[] = lang('member/template', 'strongpw_4');
											}
											if ($strongpw_str) {
												showmessage(lang('member/template', 'password_weak') . implode(',', $strongpw_str));
											}
										}
										if ($_GET['password1'] !== $_GET['password2']) {
											showmessage('profile_passwd_notmatch');
										}
										if (!$_GET['password1'] || $_GET['password1'] != addslashes($_GET['password1'])) {
											showmessage('profile_passwd_illegal');
										}
										if ($_G['setting']['pwlength']) {
											if (strlen($_GET['password1']) < $_G['setting']['pwlength']) {
												showmessage('profile_password_tooshort', '', array('pwlength' => $_G['setting']['pwlength']));
											}
										}
										$ucresult = uc_user_edit($uid_tel['username'], NULL, $_GET['password1'], NULL, 1);
										if ($ucresult == 0 - 1) {
											showmessage('profile_passwd_wrong', '', array(), array('return' => true));
										}
										C::t('common_member')->update($uid_tel['uid'], array('password' => md5(random(10))));
										DB::update('comiis_sms_temp', array('state' => 0), DB::field('id', $resms_data['id']));
										showmessage($comiis_sms['97'], dreferer(), '', array('showdialog' => 1, 'locationtime' => true));
									} else {
										showmessage($comiis_sms['98']);
									}
								} else {
									comiis_sms_errlog($resms_data['id'], $resms_data['count']);
									showmessage($comiis_sms['86']);
								}
							} else {
								if ($_GET['comiis_tel'] && $_GET['code'] && $_GET['md5'] && $_GET['md5'] == md5($_GET['comiis_tel'] . $_G['clientip'] . $_G['sid'] . $_GET['code'])) {
									if (empty($_GET['code']) || !preg_match('/^\\d{' . (!empty($_G['comiis_sms']['code_len']) ? intval($_G['comiis_sms']['code_len']) : 6) . '}$/', $_GET['code'])) {
										showmessage($comiis_sms['86']);
									}
									$resms_data = DB::fetch_first('SELECT * FROM %t WHERE dateline>\'' . (TIMESTAMP - $_G['comiis_sms']['code_outtime']) . '\' AND type=\'9\' AND tel=%s AND ip=%s AND sid=%s AND code=%d ORDER BY dateline DESC ' . DB::limit(0, 1), array('comiis_sms_temp', $_GET['comiis_tel'], $_G['clientip'], $_G['sid'], $_GET['code']));
									if ($resms_data['count'] > $_G['comiis_sms']['code_errnum']) {
										showmessage($comiis_sms['87']);
									}
									if (!empty($resms_data['tel']) && $resms_data['tel'] == $_GET['comiis_tel'] && $_GET['code'] == $resms_data['code'] && $resms_data['state'] == 1) {
										DB::update('comiis_sms_temp', array('type' => 8), DB::field('id', $resms_data['id']));
										$comiis_alluser = DB::fetch_all('SELECT m.username, m.uid FROM %t cm  LEFT JOIN %t m ON m.uid=cm.uid WHERE cm.tel=%s ', array('comiis_sms_user', 'common_member', $_GET['comiis_tel']));
										$comiis_newpwmd5 = md5($_G['clientip'] . $_GET['comiis_tel'] . $_G['sid'] . $_GET['code']);
										include_once template('comiis_sms:comiis_lostpws');
									} else {
										showmessage($comiis_sms['98']);
									}
								} else {
									showmessage($comiis_sms['98']);
								}
							}
						}
					}
				}
			}
		}
	}
}
function comiis_sms_errlog($id, $num)
{
	global $_G;
	if ($id) {
		DB::query('UPDATE %t SET `count`=`count`+1 WHERE id=%d', array('comiis_sms_temp', $id));
		if ($num + 1 > $_G['comiis_sms']['code_errnum']) {
			DB::update('comiis_sms_temp', array('state' => 0), DB::field('id', $id));
		}
	}
}
function comiis_get_rand($length = 3)
{
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$password = '';
	$i = 0;
	while ($i < $length) {
		$password .= $chars[mt_rand(0, strlen($chars) - 1)];
		$i = $i + 1;
	}
	return $password;
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