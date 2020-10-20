<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobileplugin_comiis_app_activity{
	function global_comiis_app_activity(){
		return $this->_show_comiis_app_activity(1);
	}
	function _show_comiis_app_activity($open){
		global $_G;
		loadcache('comiis_app_activity');
		if(($open ==1 || $_G['cache']['plugin']['comiis_app_activity']['activity_index'] == 1) && trim($_G['cache']['plugin']['comiis_app_activity']['tids'])){
			require_once DISCUZ_ROOT.'./source/plugin/comiis_app_activity/language/language.'.currentlang().'.php';
			$tids = explode(',', trim($_G['cache']['plugin']['comiis_app_activity']['tids']));
			$comiis_app_activity = DB::fetch_all('SELECT t.subject, t.tid, a.starttimefrom, a.starttimeto, a.class, a.aid FROM '.DB::table('forum_activity').' a INNER JOIN '.DB::table("forum_thread").' t ON t.tid=a.tid WHERE t.displayorder>=\'0\' AND a.tid IN ('.dimplode($tids).') ORDER BY t.dateline DESC');
			include_once template('comiis_app_activity:comiis_hook');
			return $return;
		}
	}
}
class mobileplugin_comiis_app_activity_forum extends mobileplugin_comiis_app_activity{
	function index_top_mobile(){
		return $this->_show_comiis_app_activity(2);
	}
}
