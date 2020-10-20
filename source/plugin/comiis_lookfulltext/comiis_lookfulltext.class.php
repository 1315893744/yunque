<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobileplugin_comiis_lookfulltext{
	function global_footer_mobile() {
		global $_G;
		$comiis_lookfulltext = $_G['cache']['plugin']['comiis_lookfulltext'];
		if($comiis_lookfulltext['open_mob']){
			if(($comiis_lookfulltext['blog'] && $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do'] == 'blog' && !empty($_GET['id'])) || ($comiis_lookfulltext['group'] && $_G['basescript'] == 'group' && CURMODULE == 'viewthread') || ($comiis_lookfulltext['portal'] && $_G['basescript'] == 'portal' && CURMODULE == 'view') || ($_G['basescript'] == 'forum' && CURMODULE == 'viewthread' && intval($comiis_lookfulltext['maxheight']) > 300 && in_array($_G['fid'], unserialize($comiis_lookfulltext['forum'])))) {
				if($comiis_lookfulltext['class']){
					$comiis_lookfulltext['class'] = ','.$comiis_lookfulltext['class'];
				}
				include_once template('comiis_lookfulltext:comiis_hook');
				return $return;
			}
		}
	}
}