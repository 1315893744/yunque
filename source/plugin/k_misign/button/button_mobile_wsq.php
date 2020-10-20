<?php
!defined('IN_DISCUZ') && exit('Access Denied');

$op = in_array($_GET['op'], array('buttonreturn', 'setting', 'uninstall', 'check')) ? $_GET['op'] : '';
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$act.'.'.currentlang().'.php')){
	require_once DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$act.'.'.currentlang().'.php';
}
	$levelquery = get_levels();
	$qiandaodb['levelarray'] = get_level($qiandaodb['days']);
	$nextlevel = $qiandaodb['levelarray']['levelkey']+1;
	$sign_width = $qiandaodb['days'] / $levelquery[$nextlevel]['leveldays'] * 100;
if(!$op){
	$buttonsetting = $setting['extendb']['mobile_wsq_detail'];
	$buttonsetting['buttoncolor'] = $buttonsetting['buttoncolor'] ? $buttonsetting['buttoncolor'] : "#70a128";
	$buttonsetting['buttoncolor2'] = $buttonsetting['buttoncolor2'] ? $buttonsetting['buttoncolor2'] : "#70a128";
	include template("k_misign:button_mobile_wsq");
	if(!$buttonsetting['displayinplugin'] && CURMODULE == 'k_misign'){
		return '';
	}
	return $return;
}elseif($op == 'buttonreturn'){
	$buttonsetting = $setting['extendb']['mobile_wsq_detail'];
	$buttonsetting['buttoncolor'] = $buttonsetting['buttoncolor'] ? $buttonsetting['buttoncolor'] : "#70a128";
	$buttonsetting['buttoncolor2'] = $buttonsetting['buttoncolor2'] ? $buttonsetting['buttoncolor2'] : "#70a128";
	include template("k_misign:button_mobile_wsq");
	include template('common/header_ajax');
	if(!$buttonsetting['displayinplugin'] && CURMODULE == 'k_misign'){
		return '';
	}
	echo $return;
	dexit();
}elseif($op == 'check'){
	$data['value'] = $setting['extendb'];
	$data['value']['mobile_default'] = 'mobile_wsq';
	$data['value']['mobile_special'] = 'true';
	$data['value'] = serialize($data['value']);
	C::t("common_pluginvar")->update_by_variable($do, 'extendb', $data);
	
	updatecache('plugin');
	cpmsg('update_success', 'action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles', 'succeed');
}elseif($op == 'uninstall'){
	
}elseif($op == 'setting'){
	if(!submitcheck('setbutton')){
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$act.'&op=setting', 'enctype');
		showtableheader($extendlang['title'].$lang['detail'], 'fixpadding', '');
		showsetting($extendlang['displayinplugin'], 'displayinpluginnew', $setting['extendb']['mobile_wsq_detail']['displayinplugin'], 'radio');
		showsetting($extendlang['buttoncolor'], 'buttoncolornew', $setting['extendb']['mobile_wsq_detail']['buttoncolor'], 'color');
		showsetting($extendlang['buttoncolor2'], 'buttoncolor2new', $setting['extendb']['mobile_wsq_detail']['buttoncolor2'], 'color');
		showsubmit('setbutton', 'submit');
		showtablefooter();
		showformfooter();// f rom ww w.mo qu 8.co m
	}else{
		$data['value'] = $setting['extendb'];
		$data['value']['mobile_wsq_detail'] = array(
			'displayinplugin' => intval($_GET['displayinpluginnew']),
			'buttoncolor' => addslashes($_GET['buttoncolornew']),
			'buttoncolor2' => addslashes($_GET['buttoncolor2new']),
		);
		$data['value'] = serialize($data['value']);
		C::t("common_pluginvar")->update_by_variable($do, 'extendb', $data);
		
		updatecache('plugin');
		cpmsg('update_success', 'action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$act.'&op=setting', 'succeed');
	}
}