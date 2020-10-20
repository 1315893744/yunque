<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobileplugin_comiis_app_find{
	function global_comiis_app_find(){
		return $this->_show_comiis_app_find(1);
	}
	function _show_comiis_app_find($open){
		global $_G;
		loadcache('comiis_app_find');
		$comiis_app_find = $_G['cache']['plugin']['comiis_app_find'];
		$comiis_app_find_data = $_G['cache']['comiis_app_find']['data'];
		if($open ==1 || $comiis_app_find['comiis_app_find_index'] == 1){
			include_once template('comiis_app_find:comiis_hook');
			return $return;
		}
	}
}
class mobileplugin_comiis_app_find_forum extends mobileplugin_comiis_app_find{
	function index_top_mobile(){
		return $this->_show_comiis_app_find(2);
	}
}