<?php

if(!defined('IN_DISCUZ') && !$_G['uid']) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT.'./source/plugin/comiis_app/language/language.'.currentlang().'.php';
if(empty($_GET['comiis']) || !in_array($_GET['comiis'], array('re_recommend', 're_hotreply', 're_forum_list_zhan'))) $_GET['comiis'] = '';
if($_GET['comiis'] != ''){
	include_once libfile('comiis_'. $_GET['comiis'], 'plugin/comiis_app/module/');
}
