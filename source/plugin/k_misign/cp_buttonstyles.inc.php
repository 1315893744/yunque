<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
loadcache('plugin');
$setting = $misign = $_G['cache']['plugin']['k_misign'];
require_once libfile('function/core', 'plugin/k_misign');

$act = $_GET['act'];
$formhash = isset($_GET['formhash']) ? trim($_GET['formhash']) : '';
if($act && !in_array($act, array('default', 'mobile_default'))){
	require_once libfile('button/'.$act, 'plugin/k_misign');
}elseif($act && in_array($act, array('default', 'mobile_default'))){
	$op = in_array($_GET['op'], array('check')) ? $_GET['op'] : '';
	if($op == 'check'){
		$data['value'] = $misign['extendb'];
		if($act == 'default')$data['value']['default'] = $act;
		if($act == 'mobile_default')$data['value']['mobile_default'] = $act;
		if($act == 'mobile_default')$data['value']['mobile_special'] = '';
		$data['value'] = serialize($data['value']);
		C::t("common_pluginvar")->update_by_variable($do, 'extendb', $data);
		
		updatecache('plugin');
		cpmsg('update_success', 'action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles', 'succeed');
	}else{
		require_once libfile('button/'.$act, 'plugin/k_misign');
	}
}else{
	$narray = array();
	$dir = DISCUZ_ROOT.'./source/plugin/k_misign/button/';
	$buttondir = dir($dir);
	while($entry = $buttondir->read()) {
		$tpldir = realpath($dir.'/'.$entry);
		if(!is_dir($tpldir)) {
			$entrycode = str_replace(array('button_', '.php'), array(),$entry);
			
			if(!in_array($entrycode, array('default', 'mobile_default'))){
				require_once DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$entrycode.'.'.currentlang().'.php';
			}
			$exlang[$entrycode] = $extendlang;
			$sarray[] = array(
				'name' => $entrycode,
				'directory' => './source/plugin/k_misign/static/image/button/'.$entrycode,
				'tplname' => in_array($entrycode, array('default', 'mobile_default')) ? lang('plugin/k_misign', 'cp_style_'.$entrycode) : $exlang[$entrycode]['title'],
				'filemtime' => @filemtime($dir.'/'.$entry),
				'mobile' => (strstr($entry, 'button_mobile_') ? true : false),
			);
		}
	}

	$stylelist = '';
	$i = 0;
	$updatestring = array();
	
	foreach($sarray as $id => $style) {
		$style['name'] = dhtmlspecialchars($style['name']);
		$isdefault['pc'] = $style['name'] == $misign['extendb']['default'] ? true : false;
		$isdefault['mobile'] = $style['name'] == $misign['extendb']['mobile_default'] ? true : false;
		
		$preview = file_exists($style['directory'].'/preview.jpg') ? $style['directory'].'/preview.jpg' : './static/image/admincp/stylepreview.gif';
		$previewlarge = file_exists($style['directory'].'/preview_large.jpg') ? $style['directory'].'/preview_large.jpg' : '';

		$stylelist .=
			'<table cellspacing="0" cellpadding="0" style="margin-left: 10px; width: 220px;height: 170px;" class="left"><tr><th class="partition"><center>'.$style['tplname'].'<center></th></tr><tr><td style="width: 240px;height:140px" valign="top">'.
			"<p style=\"margin-bottom: 12px;\"><img width=\"220\" height=\"90\" ".($previewlarge ? 'style="cursor:pointer" title="'.$lang['preview_large'].'" onclick="zoom(this, \''.$previewlarge.'\', 1)" ' : '')."src=\"$preview\" alt=\"$lang[preview]\"/></p>".
			'<p style="margin: 1px 0"><span style="float:right;">'.((!in_array($style['name'], array('default', 'mobile_default')) && (!$isdefault['pc'] && !$isdefault['mobile']))  ? '<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$do.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$style['name'].'&op=uninstall">'.lang('plugin/k_misign', 'extend_uninstall').'</a>&nbsp;&nbsp;' : '').'<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$do.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$style['name'].'&op=setting">'.$lang['detail'].'</a></span><a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$do.'&identifier=k_misign&pmod=cp_buttonstyles&act='.$style['name'].'&op=check">'.($style['mobile'] ? ($isdefault['mobile'] ? lang('plugin/k_misign', 'prize_status_on') : lang('plugin/k_misign', 'cp_style_usestyle_mobile')) : ($isdefault['pc'] ? lang('plugin/k_misign', 'prize_status_on') : lang('plugin/k_misign', 'cp_style_usestyle'))).'</a></p>'.
			"</td></tr></table>\n".($i == 3 ? '</tr>' : '');
		$i++;
		if($i == 3) {
			$i = 0;
		}
	}
	if($i > 0) {
		$stylelist .= str_repeat('<td></td>', 3 - $i);
	}

	showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_style');
	showtableheader();
	echo $stylelist;
	showtablefooter();
	showtableheader();
	echo '<tr><td><a href="http://addon.discuz.com/?@k_misign.plugin">'.cplang('cloudaddons_style_link').'</a>';
	showtablefooter();
	showformfooter();
}
?>