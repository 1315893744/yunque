<?PHP

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache('plugin');
require_once DISCUZ_ROOT.'./source/plugin/comiis_app_video/language/language.'.currentlang().'.php';
include_once DISCUZ_ROOT.'./source/plugin/comiis_app_video/comiis_app_video.fun.php';
$_G['comiis_video_access_token'] = _comiis_getyoukukey(1);
include template('comiis_app_video:comiis_upbox');
