<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobileplugin_comiis_app_color{
	function global_comiis_header_mobile(){
		global $_G;
		$_G['comiis_cssid'] = '0';
		if($_G['uid']){
			$comiis_uidcssid = 'comiis_colorid_u'.$_G['uid'];
			$comiis_uid_color = getcookie($comiis_uidcssid);
			if($comiis_uid_color == ''){
				$css = DB::fetch_first("SELECT css FROM %t WHERE uid='%d'", array('comiis_app_userstyle', $_G['uid']));
				dsetcookie($comiis_uidcssid, intval($css['css']).'s', 86400 * 360);
				$_G['comiis_cssid'] = intval($css['css']);
			}else{
				$_G['comiis_cssid'] = intval($comiis_uid_color);
			}
		}
		return '<link rel="stylesheet" href="./source/plugin/comiis_app/cache/comiis_'.$_G['comiis_cssid'].'_style.css?'.VERHASH.'" type="text/css" media="all" id="comiis_app_addclass" />';
	}
}