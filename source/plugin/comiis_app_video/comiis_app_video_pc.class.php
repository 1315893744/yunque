<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_comiis_app_video{
	function discuzcode($param){
		global $_G, $pid;
		if($param['caller'] == 'discuzcode'){
			if($_G['forum_thread']['isgroup'] || ($_G['basescript']=='forum' && CURMODULE=='viewthread' && in_array($_G['fid'], unserialize($_G['cache']['plugin']['comiis_app_video']['comiis_forum'])))){
				if(dstrpos($_G['discuzcodemessage'], array('[/media]', '[/flash]', '[/audio]', '[/attach]')) !== FALSE){
					$_G['comiis_video'] = 1;
					$_G['comiis_video_attach'] = C::t('forum_attachment_n')->fetch_all_by_id(getattachtableid($_G['tid']), 'pid', $pid);
					include_once DISCUZ_ROOT.'./source/plugin/comiis_app_video/comiis_app_video.fun.php';
					$_G['discuzcodemessage'] = comiis_discuzcode($_G['discuzcodemessage'], $param);
				}
			}
		}
	}
	function global_header(){
		global $_G;
		if(($_G['basescript']=='forum' || $_G['basescript']=='group') && CURMODULE=='post'){
			return '<script src="./source/plugin/comiis_app_video/static/jquery.min.js"></script><script>jQuery.noConflict();</script><script src="./source/plugin/comiis_app_video/static/upload.js" charset="utf-8"></script>';
		}
	}
}
class plugin_comiis_app_video_forum extends plugin_comiis_app_video{
    function post_editorctrl_left(){
        global $_G;
		$users = unserialize($_G['cache']['plugin']['comiis_app_video']['comiis_upload_group']);
		if(isset($users[0]) && ($users[0] == '0' || $users[0] == '')){
			unset($users[0]);
		}
		if(($_G['basescript'] == 'group' && $_G['cache']['plugin']['comiis_app_video']['comiis_group_uploadvideo']) || in_array($_G['fid'], unserialize($_G['cache']['plugin']['comiis_app_video']['comiis_upload_video'])) && count($users) && in_array($_G['member']['groupid'], $users)){
			include_once DISCUZ_ROOT.'./source/plugin/comiis_app_video/language/language.'.currentlang().'.php';
			include template('comiis_app_video:comiis_upkey');
			return $html;
		}
    }
}
class plugin_comiis_app_video_group extends plugin_comiis_app_video {
	function post_editorctrl_left(){
        global $_G;
		$users = unserialize($_G['cache']['plugin']['comiis_app_video']['comiis_upload_group']);
		if(isset($users[0]) && ($users[0] == '0' || $users[0] == '')){
			unset($users[0]);
		}
		if(($_G['basescript'] == 'group' && $_G['cache']['plugin']['comiis_app_video']['comiis_group_uploadvideo']) || in_array($_G['fid'], unserialize($_G['cache']['plugin']['comiis_app_video']['comiis_upload_video'])) && count($users) && in_array($_G['member']['groupid'], $users)){
			include_once DISCUZ_ROOT.'./source/plugin/comiis_app_video/language/language.'.currentlang().'.php';
			include template('comiis_app_video:comiis_upkey');
			return $html;
		}
	}
}
