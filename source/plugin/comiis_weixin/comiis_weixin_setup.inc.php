<?php

if (!defined('IN_DISCUZ') && !$_G['uid']) {
	exit('Access Denied');
}
if (!in_array($_GET['ops'], array('setup', 'edit'))) {
	$_GET['ops'] = 'setup';
}
$comiis_isweixin = !(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') === false) ? true : false;
$_G['comiis_weixin'] = $_G['cache']['plugin']['comiis_weixin'];
$comiis_is_weixin_user = DB::fetch_first('SELECT * FROM ' . DB::table('comiis_weixin') . ' WHERE `uid`=\'' . $_G['uid'] . '\'');
require_once DISCUZ_ROOT . './source/plugin/comiis_weixin/source/function_comiis_weixin.php';
comiis_get_weixin_lang();
$_G['basescript'] = 'comiis_app_home';
$comiis_foot = 'no';
if ($_GET['ops'] == 'setup') {
	if (defined('IN_MOBILE')) {
		include template('common/header');
		echo '<link rel="stylesheet" type="text/css" href="source/plugin/comiis_weixin/style/comiis.css" /><style>body.bg {background:#f3f3f3;}</style>';
		include_once template('comiis_weixin:touch/comiis_weixin_setup');
		include template('common/footer');
		exit(0);
	}
} else {
	if ($_GET['ops'] == 'edit') {
		if (submitcheck('editsubmit')) {
			$password = '';
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
			if ($_GET['password'] !== $_GET['password2']) {
				showmessage('profile_passwd_notmatch');
			}
			if (!$_GET['password'] || $_GET['password'] != addslashes($_GET['password'])) {
				showmessage('profile_passwd_illegal');
			}
			if ($_G['setting']['pwlength']) {
				if (strlen($_GET['password']) < $_G['setting']['pwlength']) {
					showmessage('profile_password_tooshort', '', array('pwlength' => $_G['setting']['pwlength']));
				}
			}
			$ucresult = uc_user_edit(addslashes($_G['member']['username']), NULL, $_GET['password'], NULL, 1);
			if ($ucresult == 0 - 1) {
				showmessage('profile_passwd_wrong', '', array(), array('return' => true));
			}
			
			C::t('common_member')->update($_G['uid'], array('password' => md5(random(10))));
			if ($username != $_G['member']['username']) {
				$oldname = $_G['member']['username'];
				$newname = $username;
				DB::query('UPDATE ' . DB::table('common_member') . (' SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
				DB::query('UPDATE ' . UC_DBTABLEPRE . ('members SET username=\'' . $newname . '\' WHERE username=\'' . $oldname . '\''));
				C::t('common_member')->update_cache($_G['uid'], array('username' => $newname));
			}
			DB::update('comiis_weixin', array('edit' => 1), DB::field('uid', $_G['uid']));
			showmessage($_G['comiis_wxlang']['070'], dreferer(), array());
		} else {
			if (defined('IN_MOBILE')) {
				include template('common/header');
				echo '<link rel="stylesheet" type="text/css" href="source/plugin/comiis_weixin/style/comiis.css" /><style>body.bg {background:#f3f3f3;}</style>';
				include_once template('comiis_weixin:touch/comiis_weixin_setup');
				include template('common/footer');
				exit(0);
			}
		}
	}
}