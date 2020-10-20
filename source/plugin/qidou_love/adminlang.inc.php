<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
$Identifier =  $plugin['identifier'];
loadcache('pluginlanguage_script');
if(!submitcheck('LangSubmit')){
	$FormUrl = ltrim(rawurldecode(cpurl()),'action=');
    showformheader($FormUrl,'enctype="multipart/form-data"');
	showtableheader();
	foreach($_G['cache']['pluginlanguage_script'][$Identifier] as $K => $V) {
		if(is_array($V)){
			foreach($V as $TK => $TV) {
				showsetting($K, 'Config['.$K.']['.$TK.']',$TV, 'text', 0, 0 );
			}
		}else{
			showsetting($K, 'Config['.$K.']',$V, 'text', 0, 0 );
		}
	}
	showsubmit('LangSubmit');
	showtablefooter();
	showformfooter();
}else{
	$CaChe = DB::result_first("select data from ".DB::table('common_syscache')." where cname='pluginlanguage_template'");
    $Data = unserialize($CaChe);
    $Data[$Identifier] = $_GET['Config'];
    C::t('common_syscache')->update('pluginlanguage_template',$Data);
    unset($Data);
    $CaChe = DB::result_first("select data from ".DB::table('common_syscache')." where cname='pluginlanguage_script'");
    $Data = unserialize($CaChe);
    $Data[$Identifier] = $_GET['Config'];
    C::t('common_syscache')->update('pluginlanguage_script', $Data);
    cpmsg(lang('plugin/'.$Identifier,'UpdateOk'),rawurldecode(cpurl()), 'succeed');
}