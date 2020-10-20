<?php
!defined('IN_DISCUZ') && exit('Access Denied');
$act = 'postnav';
$op = in_array($_GET['op'], array('buttonreturn', 'setting', 'uninstall', 'check')) ? $_GET['op'] : '';
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$act.'.'.currentlang().'.php')){
	require_once DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$act.'.'.currentlang().'.php';
}
if(!$op){
	return include template("k_misign:button_postnav");
}elseif($op == 'buttonreturn'){
	$lastnum = !$lastnum ? 1 : $lastnum;
	$qiandaodb['days'] = $qiandaodb['days']+1;
	$qiandaodb['lasted'] = $qiandaodb['lasted']+1;
	include template("k_misign:button_postnav_return");
}elseif($op == 'check'){
	$data['value'] = unserialize($setting['extendb']);
	$data['value']['default'] = 'postnav';
	$data['value'] = serialize($data['value']);
	C::t("common_pluginvar")->update_by_variable($do, 'extendb', $data);
	
	updatecache('plugin');
	cpmsg('update_success', 'action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles', 'succeed');
}elseif($op == 'uninstall'){
	
}elseif($op == 'setting'){

	if(!submitcheck('setbutton')){
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$act.'&op=setting', 'enctype');
		showtableheader($extendlang['title'].$lang['detail'], 'fixpadding', '');
		showsetting($extendlang['bgcolor'], 'bgcolornew', $setting['extendb']['postnav_detail']['bgcolor'], 'color');
		showsetting($extendlang['width'], 'widthnew', $setting['extendb']['postnav_detail']['width'], 'number');
		showsubmit('setbutton', 'submit');
		showtablefooter();
		showformfooter();
	}else{
		$data['value'] = $setting['extendb'];
		$data['value']['postnav_detail'] = array(
			'bgcolor' => addslashes($_GET['bgcolornew']),
			'width' => intval($_GET['widthnew']),
		);
		$data['value'] = serialize($data['value']);
		C::t("common_pluginvar")->update_by_variable($do, 'extendb', $data);
		
		updatecache('plugin');
		cpmsg('update_success', 'action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$act.'&op=setting', 'succeed');
	}
}
?>