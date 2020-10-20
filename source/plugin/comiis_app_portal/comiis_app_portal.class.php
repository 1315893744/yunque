<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class mobileplugin_comiis_app_portal{
	function common(){
		global $_G;
		if(($_G['basescript'] == 'forum' && CURMODULE == 'guide' && $_GET['view'] == 'hot' && $_GET['index'] != '1') || ($_G['basescript'] == 'portal' && CURMODULE == 'index')){
			$comiis_data = DB::fetch_first("SELECT id, comiisheader FROM %t WHERE `show`='1' AND `default`='1'", array('comiis_app_portal_page'));
			if($comiis_data['id']){		
				$_GET['pid'] = $comiis_data['id'];
				require DISCUZ_ROOT.'./source/plugin/comiis_app_portal/comiis_app_portal.inc.php';
				exit;
			}			
		}
	}
}