<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$a_lang = @include DISCUZ_ROOT.'./source/plugin/dc_signin/language/autosign.'.currentlang().'.php';
if(empty($a_lang))$a_lang = @include DISCUZ_ROOT.'./source/plugin/dc_signin/language/autosign.php';
$autosigninpath = DISCUZ_ROOT.'./source/plugin/dc_signin/data/autosign.config.php';
$autoconfig = @include $autosigninpath;
if(!$autoconfig['isauto'])showmessage($a_lang['noopen']);
$auto = C::t('#dc_signin#dc_signin_auto')->fetch($_G['uid']);
if(submitcheck('buydayssubmit')){
	$days = dintval($_GET['days']);
	if($days<1||!$_G['setting']['extcredits'][$autoconfig['extcredit']])showmessage($a_lang['error']);
	$credit = $days*$autoconfig['price'];
	$mycredit = C::t('common_member_count')->fetch($_G['uid']);
	if($mycredit['extcredits'.$autoconfig['extcredit']]<$credit){
		showmessage(str_replace('{credit}',$_G['setting']['extcredits'][$autoconfig['extcredit']]['title'],$a_lang['nocredit']));
	}
	updatemembercount($_G['uid'], array($autoconfig['extcredit']=>'-'.$credit), true, '', 0, '',$_lang['pluginname'],$a_lang['buy_auto']);
	if($auto){
		$data=array(
			'days'=>$auto['days']+$days,
		);
		C::t('#dc_signin#dc_signin_auto')->update($_G['uid'],$data);
	}else{
		$data=array(
			'uid'=>$_G['uid'],
			'days'=>$days,
			'dateline'=>TIMESTAMP,
		);
		C::t('#dc_signin#dc_signin_auto')->insert($data);
	}
	showmessage($a_lang['buydaysok'],'plugin.php?id=dc_signin&action=autosign',array('days'=>$days),array('alert'=>'right'));
	
}
?>