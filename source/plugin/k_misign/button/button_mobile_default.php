<?php
!defined('IN_DISCUZ') && exit('Access Denied');

$op = in_array($_GET['op'], array('setting')) ? $_GET['op'] : '';
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$act.'.'.currentlang().'.php')){
	require_once DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$act.'.'.currentlang().'.php';
}
if(!$op){
	$buttonsetting = $misign['extendb']['mobile_default_detail'];
	$buttonsetting['buttoncolor'] = $buttonsetting['buttoncolor'] ? $buttonsetting['buttoncolor'] : "#70a128";
	$buttonsetting['navcolor'] = $buttonsetting['navcolor'] ? $buttonsetting['navcolor'] : "#8db943";
	$buttonsetting['nav2color'] = $buttonsetting['nav2color'] ? $buttonsetting['nav2color'] : "#70a128";
	
	$levelquery = get_levels();
	$qiandaodb['levelarray'] = get_level($qiandaodb['days']);
	$nextlevel = $qiandaodb['levelarray']['levelkey']+1;
	$sign_width = $qiandaodb['days'] / $levelquery[$nextlevel]['leveldays'] * 100;
	return include template("k_misign:button_mobile_default");
}elseif($op == 'setting'){
	if(!submitcheck('setbutton')){
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$act.'&op=setting', 'enctype');
		showtableheader($extendlang['title'].$lang['detail'], 'fixpadding', '');
		showsetting($extendlang['buttoncolor'], 'buttoncolornew', $misign['extendb']['mobile_default_detail']['buttoncolor'], 'color');
		showsetting($extendlang['navcolor'], 'navcolornew', $misign['extendb']['mobile_default_detail']['navcolor'], 'color');
		showsetting($extendlang['nav2color'], 'nav2colornew', $misign['extendb']['mobile_default_detail']['nav2color'], 'color');
		showsubmit('setbutton', 'submit');
		showtablefooter();
		showformfooter();
	}else{
		$data['value'] = $misign['extendb'];
		$data['value']['mobile_default_detail'] = array(
			'buttoncolor' => addslashes($_GET['buttoncolornew']),
			'navcolor' => addslashes($_GET['navcolornew']),
			'nav2color' => addslashes($_GET['nav2colornew']),
		);
		$data['value'] = serialize($data['value']);
		C::t("common_pluginvar")->update_by_variable($do, 'extendb', $data);
		
		updatecache('plugin');
		cpmsg('update_success', 'action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$act.'&op=setting', 'succeed');
	}
}
?>