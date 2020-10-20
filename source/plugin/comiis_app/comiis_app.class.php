<?php
/**
 * 
 * www.52lcx.COM   
 * 
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobileplugin_comiis_app{
	function common() {
		global $_G, $connect_guest;
		if(CURSCRIPT == 'member' && CURMODULE == 'connect' && ($_GET['auth_hash'] || $_G['cookie']['con_auth_hash'])) {
			$connect_guest = array();
			if(!$_GET['auth_hash']) {
				$_GET['auth_hash'] = $_G['cookie']['con_auth_hash'];
			}
			$conopenid = authcode($_GET['auth_hash']);
			$connect_guest = C::t('#qqconnect#common_connect_guest')->fetch($conopenid);
		}
		if(CURSCRIPT == 'home' && CURMODULE == 'spacecp' && $_GET['gid']){
			$_G['comiis_homegid'] = $_GET['gid'];
		}else{
			$_G['comiis_homegid'] = 0;
		}
	}
}
