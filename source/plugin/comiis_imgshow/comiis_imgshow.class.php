<?php

 
if(!defined('IN_DISCUZ')) {exit('Access Denied');}
$finish = TRUE;
class plugin_comiis_imgshow {
	function global_header() {
		global $_G;
		$style="";
		$color = $_G['cache']['plugin']['comiis_imgshow']['color'];
		if($color == 1){
			$style=".comiis_key a{background-position:0px 0px;}.comiis_key a span{background-position:right -24px;color:#fff;}.comiis_key a:hover span{color:#fff79d;}.comiis_colors{color:#738c11}";
		}elseif($color == 2){
			$style=".comiis_key a{background-position:0px -48px;}.comiis_key a span{background-position:right -72px;color:#fff;}.comiis_key a:hover span{color:#e3f4ff;}.comiis_colors{color:#336699}";
		}elseif($color == 3){
			$style=".comiis_key a{background-position:0px -96px;}.comiis_key a span{background-position:right -120px;color:#654302;}.comiis_key a:hover span{color:#222;}.comiis_colors{color:#ff6600}";
		}elseif($color == 4){
			$style=".comiis_key a{background-position:0px -144px;}.comiis_key a span{background-position:right -168px;color:#fff;}.comiis_key a:hover span{color:#fff79e;}.comiis_colors{color:#ce0200}";
		}elseif($color == 5){
			$style=".comiis_key a{background-position:0px -192px;}.comiis_key a span{background-position:right -216px;color:#fff;}.comiis_key a:hover span{color:#fff79e;}.comiis_colors{color:#ff3979}";
		}elseif($color == 6){
			$style=".comiis_key a{background-position:0px -240px;}.comiis_key a span{background-position:right -264px;color:#fff;}.comiis_key a:hover span{color:#fefee3;}.comiis_colors{color:#6f4d28}";
		}elseif($color == 7){
			$style=".comiis_key a{background-position:0px -288px;}.comiis_key a span{background-position:right -312px;color:#fff;}.comiis_key a:hover span{color:#fefee3;}.comiis_colors{color:#333333}";
		}elseif($color == 8){
			$style=".comiis_key a{background-position:0px -336px;}.comiis_key a span{background-position:right -360px;color:#666;}.comiis_key a:hover span{color:#a32828;}.comiis_colors{color:#999999}";
		}elseif($color == 9){
			$style=".comiis_key a{background-position:0px -384px;}.comiis_key a span{background-position:right -408px;color:#fff;}.comiis_key a:hover span{color:#fff79e;}.comiis_colors{color:#b31c7c}";
		}
		return '<style>.comiis_key{padding-bottom:8px;width:100%} .comiis_key a,.comiis_key a span{background: url(./source/plugin/comiis_imgshow/comiis_img/comiis_key.jpg) no-repeat;height:24px;line-height:24px;word-wrap:normal;overflow:hidden;} .comiis_key a:hover{text-decoration:none;} .comiis_key a{padding-left:8px;display:inline-block;} .comiis_key a span{padding-right:8px;float:left;font-weight:700;font-size:12px;cursor:pointer;color:#fff;} '.$style.'</style>';
	}
	function _inforum() {
		global $_G;
		$forum = $_G['cache']['plugin']['comiis_imgshow']['forum'];
		$forum = empty($forum) ? array() : dunserialize($forum);
		if(!is_array($forum)) $forum = array();
		if(empty($forum[0]) || in_array($_G['fid'],$forum)){
			if($this->_minnumber()){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	function _locationforum() {
		global $_G;
		$forum = $_G['cache']['plugin']['comiis_imgshow']['locationforum'];
		$_G['cache']['plugin']['comiis_imgshow']['Rewrite'] ? $url = "pic-{$_G[tid]}.html" : $url = "plugin.php?id=comiis_imgshow&tid=".$_G['tid'];
		$forum = empty($forum) ? array() : dunserialize($forum);
		if(!is_array($forum)) $forum = array();
		if(in_array($_G['fid'],$forum)){
			$page = intval($_GET['page']);
			$t = intval($_GET['t']);
			if($page<='1' && $_GET['inajax']!='1' && $t!='1'){
				dheader("location: {$url}");				
			}	
		}
	}		
	function _minnumber() {
		global $_G;
		$min_image_number = $_G['cache']['plugin']['comiis_imgshow']['minnumber'];
		$return_image_number = C::t('#comiis_imgshow#comiis')->image_number_tid_uid($_G['tid'],$_G['forum_thread']['authorid']);
		if($return_image_number >= $min_image_number){
			$this->_locationforum();
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function _locationgroup() {
		global $_G;
		if($_G['cache']['plugin']['comiis_imgshow']['locationgroup'] && $_G['cache']['plugin']['comiis_imgshow']['group_key']){
			$_G['cache']['plugin']['comiis_imgshow']['Rewrite'] ? $url = "pic-{$_G[tid]}.html" : $url = "plugin.php?id=comiis_imgshow&tid=".$_G['tid'];
			$page = intval($_GET['page']);
			$t = intval($_GET['t']);
			if($page<='1' && $_GET['inajax']!='1' && $t!='1'){
				dheader("location: {$url}");
			}
		}
		return TRUE;
	}
}
class plugin_comiis_imgshow_forum extends plugin_comiis_imgshow {
	function viewthread_title_extra() {
		global $_G;
		if($_G['cache']['plugin']['comiis_imgshow']['key'] == '1' && $this->_inforum()){
			$_G['cache']['plugin']['comiis_imgshow']['Rewrite'] ? $url = "pic-{$_G[tid]}.html" : $url = "plugin.php?id=comiis_imgshow&tid=".$_G['tid'];
			return '<a href="'.$url.'" class="comiis_colors">'.$_G['cache']['plugin']['comiis_imgshow']['name'].'</a>';
		}
	}
	function viewthread_posttop() {
		global $_G;
		$_G['cache']['plugin']['comiis_imgshow']['Rewrite'] ? $url = "pic-{$_G[tid]}.html" : $url = "plugin.php?id=comiis_imgshow&tid=".$_G['tid'];
		if($_G['cache']['plugin']['comiis_imgshow']['key'] == '2' && $this->_inforum()){
			return array('<div class="comiis_key cl"><a href="'.$url.'" target="_blank" title="'.$_G['cache']['plugin']['comiis_imgshow']['name'].'"><span>'.$_G['cache']['plugin']['comiis_imgshow']['name'].'</span></a></div>');
		}elseif($_G['cache']['plugin']['comiis_imgshow']['key'] == '3' && $this->_inforum()){
			return array('<div class="comiis_key cl"><a href="'.$url.'" class="y" target="_blank" title="'.$_G['cache']['plugin']['comiis_imgshow']['name'].'"><span>'.$_G['cache']['plugin']['comiis_imgshow']['name'].'</span></a></div>');
		}
	}
}
class plugin_comiis_imgshow_group extends plugin_comiis_imgshow {
	function viewthread_title_extra() {
		global $_G;
		if($_G['cache']['plugin']['comiis_imgshow']['group_key'] == '1' && $this->_locationgroup()){
			$_G['cache']['plugin']['comiis_imgshow']['Rewrite'] ? $url = "pic-{$_G[tid]}.html" : $url = "plugin.php?id=comiis_imgshow&tid=".$_G['tid'];
			return '<a href="'.$url.'" class="comiis_colors">'.$_G['cache']['plugin']['comiis_imgshow']['name'].'</a>';
		}
	}
	function viewthread_posttop() {
		global $_G;
		$_G['cache']['plugin']['comiis_imgshow']['Rewrite'] ? $url = "pic-{$_G[tid]}.html" : $url = "plugin.php?id=comiis_imgshow&tid=".$_G['tid'];
		if($_G['cache']['plugin']['comiis_imgshow']['group_key'] == '2' && $this->_locationgroup()){
			return array('<div class="comiis_key cl"><a href="'.$url.'" target="_blank" title="'.$_G['cache']['plugin']['comiis_imgshow']['name'].'"><span>'.$_G['cache']['plugin']['comiis_imgshow']['name'].'</span></a></div>');
		}elseif($_G['cache']['plugin']['comiis_imgshow']['group_key'] == '3' && $this->_locationgroup()){
			return array('<div class="comiis_key cl"><a href="'.$url.'" class="y" target="_blank" title="'.$_G['cache']['plugin']['comiis_imgshow']['name'].'"><span>'.$_G['cache']['plugin']['comiis_imgshow']['name'].'</span></a></div>');
		}
	}
}
?>