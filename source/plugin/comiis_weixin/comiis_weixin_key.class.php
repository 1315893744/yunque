<?php
if (!defined('IN_DISCUZ')) {
  exit('Access Denied');
}
loadcache('plugin');
$_G['comiis_weixin'] = $_G['cache']['plugin']['comiis_weixin'];
require_once DISCUZ_ROOT.'./source/plugin/comiis_weixin/source/function_comiis_weixin.php';
comiis_get_weixin_lang();
include_once template('comiis_weixin:comiis_html');

class plugin_comiis_weixin {
	function global_login_extra(){
		return comiis_weixin_login_extra();
	}
	function global_usernav_extra1(){
		global $_G;
		return comiis_weixin_bd_code();
	}	
	function global_login_text(){
		return comiis_weixin_logging_method();
	}
}

class plugin_comiis_weixin_member {
	function logging_method() {
		return comiis_weixin_logging_method();
	}
	function register_logging_method() {
		return comiis_weixin_logging_method();
	}
}
?>