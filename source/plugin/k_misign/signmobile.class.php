<?php
if(!defined('IN_DISCUZ')) exit('Access Denied');

class mobileplugin_k_misign {
	
	function _k_misign_showbutton(){
		global $_G, $hook, $extend, $levelquery, $setting, $misign;
		require_once libfile('function/core', 'plugin/k_misign');
		
		$stats = C::t("#k_misign#plugin_k_misignset")->fetch(1);
		$tdtime = gmmktime(0,0,0,dgmdate($_G['timestamp'], 'n',$misign['tos']),dgmdate($_G['timestamp'], 'j',$misign['tos']),dgmdate($_G['timestamp'], 'Y',$misign['tos'])) - $misign['tos']*3600;

		$qiandaodb = C::t('#k_misign#plugin_k_misign')->fetch_by_uid($_G['uid']);
		
		$setting['extendb']['mobile_default'] = $misign['extendb']['mobile_default'] = $misign['extendb']['mobile_default'] ? $misign['extendb']['mobile_default'] : 'mobile_default';
		$return = include_once libfile('button/'.$misign['extendb']['mobile_default'], 'plugin/k_misign');
		return $return;
	}
	
	function global_misign_mobile() {
		global $_G, $hook, $extend, $setting, $misign;
		require_once libfile('function/core', 'plugin/k_misign');
		if(!$misign['extendb']['mobile_special']) return '';
		return $this->_k_misign_showbutton();
	}
}
class mobileplugin_k_misign_portal extends mobileplugin_k_misign {
}

class mobileplugin_k_misign_forum extends mobileplugin_k_misign {
	function index_top_mobile_output() {
		global $_G, $hook, $extend, $levelquery, $setting, $misign;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		if(!$misign['mobilehookstatus']) return '';
		require_once libfile('function/core', 'plugin/k_misign');
		$setting['extendb'] = $misign['extendb'] = unserialize($misign['extendb']);
		if($misign['extendb']['mobile_special']) return '';
		return $this->_k_misign_showbutton();
	}

	function guide_top_mobile_output() {
		global $_G, $hook, $extend, $levelquery, $setting, $misign;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		if(!$misign['mobilehookstatus']) return '';
		require_once libfile('function/core', 'plugin/k_misign');
		$setting['extendb'] = $misign['extendb'] = unserialize($misign['extendb']);
		if($misign['extendb']['mobile_special']) return '';
		return $this->_k_misign_showbutton();
	}
}
class mobileplugin_k_misign_home extends mobileplugin_k_misign {
}

?>