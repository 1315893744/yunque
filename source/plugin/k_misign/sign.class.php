<?php
!defined('IN_DISCUZ') && exit('Access Denied');

class plugin_k_misign{
	
	function global_usernav_extra3() {
		global $_G, $hook, $extend;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		require_once libfile('function/core', 'plugin/k_misign');

		if($hook['global_usernav_extra3'] && $_G['uid']){
			$code = include_once libfile('extend/hook_global_usernav_extra3', 'plugin/k_misign');
			return $code;
		}else{
			return null;
		}
	}
	
	function _k_misign_showbutton($width) {
		global $_G, $hook, $extend;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		require_once libfile('function/core', 'plugin/k_misign');
		
		$setting['extendb'] = $misign['extendb'] = unserialize($misign['extendb']);
		$setting['pluginurl'] = $misign['pluginurl'] = $misign['pluginurl'] ? $misign['pluginurl'] : 'plugin.php?id=k_misign:';
		$setting['groups'] = $misign['groups'] = unserialize($misign['groups']);
		$setting['ban'] = $misign['ban'] = explode(",",$misign['ban']);
		$setting['width'] = $misign['width'] = $misign['width'] ? $misign['width'] : 220;
		$setting['bcolor'] = $misign['bcolor'] = $misign['bcolor'] ? $misign['bcolor'] : '#ff6f3d';
		$setting['hcolor'] = $misign['hcolor'] = $misign['hcolor'] ? $misign['hcolor'] : '#ff7d49';
		$setting['width'] = $misign['width'] = $width ? $width : $misign['width'];
		$setting['width2'] = $misign['width2'] = $misign['width']-158;
		
		$stats = C::t("#k_misign#plugin_k_misignset")->fetch(1);
		$tdtime = gmmktime(0,0,0,dgmdate($_G['timestamp'], 'n',$misign['tos']),dgmdate($_G['timestamp'], 'j',$misign['tos']),dgmdate($_G['timestamp'], 'Y',$misign['tos'])) - $misign['tos']*3600;
		
		if($_G['uid'])$qiandaodb = C::t("#k_misign#plugin_k_misign")->fetch_by_uid($_G['uid']);
		
		$setting['extendb']['default'] = $misign['extendb']['default'] = $misign['extendb']['default'] ? $misign['extendb']['default'] : 'default';
		
		$return = include_once libfile('button/'.$misign['extendb']['default'], 'plugin/k_misign');
		return $return;
	}

}

class plugin_k_misign_portal extends plugin_k_misign {

	function index_side_k_misign_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		
		if($misign['modstatus']['portal_index']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['portal_index']['width']);
		}else{
			return;
		}
	}
	function list_side_k_misign_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['portal_list']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['portal_list']['width']);
		}else{
			return;
		}
	}
	function view_article_side_top_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['portal_view']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['portal_view']['width']);
		}else{
			return;
		}
	}
}
class plugin_k_misign_forum extends plugin_k_misign {

	function index_side_top_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['forum_index']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['forum_index']['width']);
		}else{
			return;
		}
	}
	
	function forumdisplay_side_top_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['forum_forumdisplay']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['forum_forumdisplay']['width']);
		}else{
			return;
		}
	}
	
	function viewthread_side_k_misign_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['forum_viewthread']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['forum_viewthread']['width']);
		}else{
			return;
		}
	}

	function viewthread_sidetop_output() {
		global $_G, $postlist, $hook;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		
		require_once libfile('function/core', 'plugin/k_misign');
		if($hook['viewthread_sidetop']){
			$code = include_once libfile('extend/hook_viewthread_sidetop', 'plugin/k_misign');
			return $code;
		}else{
			return array();
		}
	}
}
class plugin_k_misign_group extends plugin_k_misign {
	function index_side_top_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['group_default']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['group_default']['width']);
		}else{
			return;
		}
	}
	function group_index_side_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['group_index']['status'] && ($_G['basescript'] == 'group' && ($_GET['action'] && $_GET['action'] == 'index'))){
			return $this->_k_misign_showbutton($misign['modstatus']['group_index']['width']);
		}else{
			return;
		}
	}
	function forumdisplay_side_top_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['group_forumdisplay']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['group_forumdisplay']['width']);
		}else{
			return;
		}
	}
	function group_side_top_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['group_other']['status'] && ($_G['basescript'] == 'group' && ($_GET['action'] && $_GET['action'] != 'index'))){
			return $this->_k_misign_showbutton($misign['modstatus']['group_other']['width']);
		}else{
			return;
		}
	}
	function viewthread_side_k_misign_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['group_viewthread']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['group_viewthread']['width']);
		}else{
			return;
		}
	}
}
class plugin_k_misign_home extends plugin_k_misign {
	function space_home_side_top_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['modstatus'] = $misign['modstatus'] = unserialize($misign['modstatus']);
		if($misign['modstatus']['home_index']['status']){
			return $this->_k_misign_showbutton($misign['modstatus']['home_index']['width']);
		}else{
			return;
		}
	}
}
class plugin_k_misign_plugin extends plugin_k_misign {
	function tie_k_misign_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['pextend'] = $misign['pextend'] = unserialize($misign['pextend']);
		if($misign['pextend']['tie_button']['status']){
			return $this->_k_misign_showbutton($misign['pextend']['tie_button']['width']);
		}else{
			return;
		}
	}

	function mijuhe_k_misign_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['pextend'] = $misign['pextend'] = unserialize($misign['pextend']);
		if($misign['pextend']['mijuhe']['status']){
			return $this->_k_misign_showbutton($misign['pextend']['mijuhe']['width']);
		}else{
			return;
		}
	}
	
	function k0usercard_k_misign_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['pextend'] = $misign['pextend'] = unserialize($misign['pextend']);
		if($misign['pextend']['k_usercard']['status']){
			return $this->_k_misign_showbutton($misign['pextend']['k_usercard']['width']);
		}else{
			return;
		}
	}

	function miner_side_middle_output() {
		global $_G;
		$setting = $misign = $_G['cache']['plugin']['k_misign'];
		$setting['pextend'] = $misign['pextend'] = unserialize($misign['pextend']);
		if($misign['pextend']['miner']['status']){
			return $this->_k_misign_showbutton($misign['pextend']['miner']['width']);
		}else{
			return;
		}
	}	
}
?>