<?php
!defined('IN_DISCUZ') && exit('Access Denied');

$op = in_array($_GET['op'], array('buttonreturn', 'setting')) ? $_GET['op'] : '';
if(is_file(DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$act.'.'.currentlang().'.php')){
	require_once DISCUZ_ROOT.'./source/plugin/k_misign/language/button_'.$act.'.'.currentlang().'.php';
}
if(!$op){	
	return include template("k_misign:button_default");
}elseif($op == 'buttonreturn'){
	/*
	include template('common/header_ajax');
	$lastnum = !$lastnum ? 1 : $lastnum;
	echo '<div class="midaben_con mbm"><a class="midaben_signpanel JD_sign visted" id="JD_sign" href="'.$setting['pluginurl'].'sign" target="_blank"><div class="font">'.lang('plugin/k_misign','signed').'</div><span class="nums">'.lang('plugin/k_misign','row').($lastnum ? $lastnum : '0').lang('plugin/k_misign','days').'</span><div class="fblock"><div class="all">'.($isfirst ? 1 : $stats['todayq']+1).lang('plugin/k_misign','people').'</div><div class="line">'.$row.'</div></div></a>
			<div id="JD_win" class="midaben_win JD_win" style="display:block;">
				<div class="title">
					<h3>
						'.lang('plugin/k_misign','signsuccess').'
					</h3>
					<p class="con">'.($ajaxcreditshow['ext']['type'] == $ajaxcreditshow['normal']['type'] ? lang('plugin/k_misign','getreward', array('reward' => $ajaxcreditshow['normal']['number'].$_G['setting']['extcredits'][$ajaxcreditshow['normal']['type']]['unit'].$_G['setting']['extcredits'][$ajaxcreditshow['normal']['type']]['title'])) : lang('plugin/k_misign','getreward2', array('reward' => $ajaxcreditshow['normal']['number'].$_G['setting']['extcredits'][$ajaxcreditshow['normal']['type']]['unit'].$_G['setting']['extcredits'][$ajaxcreditshow['normal']['type']]['title'], 'reward2' => $ajaxcreditshow['ext']['number'].$_G['setting']['extcredits'][$ajaxcreditshow['ext']['type']]['unit'].$_G['setting']['extcredits'][$ajaxcreditshow['ext']['type']]['title']))).'</p>
				</div>
				<div class="info">'.lang('plugin/k_misign','yljqddays', array('days' => ($qiandaodb['days'] ? $qiandaodb['days'] : 1))).'
				</div>
				<div class="angleA">
				</div>
				<div class="angleB">
				</div>
			</div>
			</div>
	';
	include template('common/footer_ajax');
	*/
	$lastnum = !$lastnum ? 1 : $lastnum;
	$qiandaodb['days'] = $qiandaodb['days']+1;
	$qiandaodb['lasted'] = $qiandaodb['lasted']+1;
	include template("k_misign:button_default_return");
}elseif($op == 'setting'){
	cpmsg('update_success', 'action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_buttonstyles', 'succeed');
}
?>