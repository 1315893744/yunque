<?php
!defined('IN_DISCUZ') && exit('Access Denied');

$setting = $misign = $_G['cache']['plugin']['k_misign'];
$setting['extends'] = $misign['extends'] = unserialize($misign['extendp']);
$setting['extendb'] = $misign['extendb'] = unserialize($misign['extendb']);
$setting['extendb']['default'] = $misign['extendb']['default'] = $misign['extendb']['default'] ? $misign['extendb']['default'] : 'default';
$setting['extendb']['mobile_default'] = $misign['extendb']['mobile_default'] = $misign['extendb']['mobile_default'] ? $misign['extendb']['mobile_default'] : 'mobile_default';
$setting['extendb']['mobile_special'] = $misign['extendb']['mobile_special'] = $misign['extendb']['mobile_special'] ? $misign['extendb']['mobile_special'] : '';
$setting['style'] = $misign['style'] = C::t('common_setting')->fetch('k_misignstyle', '1');
$setting['styles'] = $misign['styles'] = $misign['style']['svalue'] ? unserialize($misign['style']['svalue']) : array('pc' => 'default', 'mobile' => 'mobile_default');
$setting['pluginurl'] = $misign['pluginurl'] = $misign['pluginurl'] ? $misign['pluginurl'] : 'plugin.php?id=k_misign:';


if(is_file(DISCUZ_ROOT.'./source/plugin/k_migeyan/k_migeyan.class.php')){
	$extend['k_migeyan'] = 1;
}

//辅助扩展
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_dataimport.php')){
	$extend['dataimport'] = 1; 
}
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_lastdefend.php')){
	$extend['lastdefend'] = 1; 
}
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_dataexport.php')){
	$extend['dataexport'] = 1; 
}
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_lastrule.php')){
	$extend['lastrule'] = 1; 
}
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_totalrule.php')){
	$extend['totalrule'] = 1; 
}
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_level.php')){
	$extend['level'] = 1; 
}

//道具
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/magic/magic_k_misign_bq.php')){
	$extend['magic']['bq'] = 1;
	$extend['magicdetail']['bq'] = C::t('common_magic')->fetch_by_identifier('k_misign:k_misign_bq');
}

//嵌入点扩展
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_hook_global_usernav_extra3.php')){
	$hook['global_usernav_extra3'] = 1; 
}
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_hook_viewthread_sidetop.php')){
	$hook['viewthread_sidetop'] = 1; 
}

//print_r($levelquery);
function pluginurl($mod){
	global $_G;
	$setting = $misign = $_G['cache']['plugin']['k_misign'];
	if($misign['pluginurl']){
		return $misign['pluginurl'].$mod;
	}else{
		return 'plugin.php?id=k_misign:'.($mod ? $mod : 'sign');
	}
}

function array_insert($myarray,$value,$position=0){
   	$fore=($position==0)?array():array_splice($myarray,0,$position);
   	$fore[]=$value;
   	$ret=array_merge($fore,$myarray);
   	return $ret;
}

function get_level($days){
	global $_G, $setting, $misign, $extend;
	$levelquery = levelquery($misign, $extend);
	foreach($levelquery as $key => $fv){
		if ($days >= $fv['leveldays']) {
			$return['level'] = "[LV.".$fv['levelnum']."]".$fv['levelname'];
			$return['levelname'] = $fv['levelname'];
			$return['levelnum'] = $fv['levelnum'];
			$return['levelkey'] = $key;
			break;
		}
	}
	return $return;
}

function get_levels(){
	global $_G, $misign, $extend;
	$levelquery = levelquery($misign, $extend);
	return $levelquery;
}

function levelquery($misign, $extend){
	$misign['extends'] = unserialize($misign['extendp']);
	if($misign['extends']['level'] && $extend['level']){
		$levelquery = C::t("#k_misign#plugin_k_misign_level")->fetch_all(0,999);
		$levelquery = array_reverse($levelquery, true);
	}else{
		$nlvtext = str_replace(array("\r\n", "\n", "\r"), '/hhf/', $misign['lvtext']);
		list($lv1name, $lv2name, $lv3name, $lv4name, $lv5name, $lv6name, $lv7name, $lv8name, $lv9name, $lv10name, $lv11name) = explode("/hhf/", $nlvtext);
		$levelquery =array(
			10 => array(
				'levelnum' => 11,
				'levelname' => $lv11name,
				'leveldays' => 1500,
				'status' => 1
			),
			9 => array(
				'levelnum' => 10,
				'levelname' => $lv10name,
				'leveldays' => 750,
				'status' => 1
			),
			8 => array(
				'levelnum' => 9,
				'levelname' => $lv9name,
				'leveldays' => 365,
				'status' => 1
			),
			7 => array(
				'levelnum' => 8,
				'levelname' => $lv8name,
				'leveldays' => 240,
				'status' => 1
			),
			6 => array(
				'levelnum' => 7,
				'levelname' => $lv7name,
				'leveldays' => 120,
				'status' => 1
			),
			5 => array(
				'levelnum' => 6,
				'levelname' => $lv6name,
				'leveldays' => 60,
				'status' => 1
			),
			4 => array(
				'levelnum' => 5,
				'levelname' => $lv5name,
				'leveldays' => 30,
				'status' => 1
			),
			3 => array(
				'levelnum' => 4,
				'levelname' => $lv4name,
				'leveldays' => 15,
				'status' => 1
			),
			2 => array(
				'levelnum' => 3,
				'levelname' => $lv3name,
				'leveldays' => 7,
				'status' => 1
			),
			1 => array(
				'levelnum' => 2,
				'levelname' => $lv2name,
				'leveldays' => 3,
				'status' => 1
			),
			0 => array(
				'levelnum' => 1,
				'levelname' => $lv1name,
				'leveldays' => 1,
				'status' => 1
			),
	
		);
	}
	return $levelquery;
}
?>