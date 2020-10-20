<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$setting = $_G['cache']['plugin']['k_misign'];
$op = in_array($_GET['op'], array('add', 'edit')) ? $_GET['op'] : '';

if(!$op){
	if(!submitcheck('rulesubmit')) {
		$medallist = C::t("forum_medal")->fetch_all_name_by_available(1);
		$perpage = 30;
		$page = intval($_GET['page']);
		$start = ($page-1) * $perpage;
		if(empty($page)){
			$page = 1;
		}
		if($start < 0){
			$start = 0;
		}
		$multi = '';
		$list = C::t("#k_misign#plugin_k_misign_lastrule")->fetch_all_cp($start, $perpage);
		foreach($list as $lists){
			if($lists['reward']){
				$lists['rewardhhf'] = str_replace(array("\r\n", "\n", "\r"), '/hhf/', $lists['reward']);
				$lists['rewardarr'] = explode("/hhf/", $lists['rewardhhf']);
				foreach($lists['rewardarr'] as $reward){
					$rewards = explode("|", $reward);
					$lists['rewardshow'] .=  $_G['setting']['extcredits'][$rewards[0]]['title'].'<em class="highlight">&nbsp;'.$rewards[1].'&nbsp;</em>'.$_G['setting']['extcredits'][$rewards[0]]['unit'].';&nbsp;';
				}
			}
			$companylist .= showtablerow('', array('class="td25"', 'class="td31"', 'class="td26"', 'class="td26"', 'class="td28"'), array(
				'<input class="checkbox" type="checkbox" name="delete['.$lists['ruleid'].']" value="'.$lists['ruleid'].'">',
				'<input class="text" type="text" name="lastdaynew['.$lists['ruleid'].']" value="'.$lists['lastday'].'">',
				($lists['reward'] ? $lists['rewardshow'] : ''),
				($lists['relatedmedal'] ? $medallist[$lists['relatedmedal']]['name'].'&nbsp;(&nbsp;<em class="highlight">&nbsp;'.$lists['relatedmedaldate'].'&nbsp;</em>'.lang('plugin/k_misign','days').'&nbsp;)' : ''),
				'<label><input class="checkbox" type="checkbox" name="statusnew['.$lists['ruleid'].']" value="1" '.($lists['status'] ? 'checked="checked" ' : '').'>'.lang('plugin/k_misign','cp_last_status_1').'</label>&nbsp;<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_last&op=edit&ruleid='.$lists['ruleid'].'">'.$lang['detail'].'</a>',
			), TRUE);
		}
		$count =  0;
		$count = C::t("#k_misign#plugin_k_misign_lastrule")->count();
		$multi = multi($count, $perpage, $page, '?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_last');
		
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_last');
		showtableheader('', 'fixpadding', '');
		showsubtitle(array('', lang('plugin/k_misign','cp_last_lastday'), lang('plugin/k_misign','cp_last_rulecontent'), lang('plugin/k_misign','cp_last_relatedmedal'), lang('plugin/k_misign','cp_last_status')));
		echo $companylist;
		echo '<tr><td>&nbsp;</td><td colspan="8"><div><a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_last&op=add" class="addtr">'.lang('plugin/k_misign', 'cp_last_add').'</a></div></td></tr>';
		showsubmit('rulesubmit', $lang['submit'], 'del', '', $multi);
		showtablefooter();
		showformfooter();
	}else{
		if(is_array($_GET['delete'])) {
			foreach($_GET['delete'] as $id) {
				C::t("#k_misign#plugin_k_misign_lastrule")->delete($id);
			}
		}
		if(is_array($_GET['lastdaynew'])) {
			foreach($_GET['lastdaynew'] as $id => $value) {
				$data = array('lastday' => intval($value), 'status' => intval($_GET['statusnew'][$id]));
				C::t("#k_misign#plugin_k_misign_lastrule")->update(intval($id),$data);
			}
		}
		cpmsg(lang('plugin/k_misign', 'success'), "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_last", 'succeed');
	}
}elseif($op == 'add'){
	if(!submitcheck('addsubmit')) {
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_last&op=add', "enctype");
		showtableheader(lang('plugin/k_misign', 'cp_last_add'), 'fixpadding', '');
		showsetting(lang('plugin/k_misign', 'cp_last_lastday'), 'lastdaynew', $rule['lastday'], 'number', '', '', lang('plugin/k_misign', 'days'));
		//关联勋章设置
		$relatedmedalid = array('relatedmedalnew', array(), 'isfloat');
		$relatedmedalid[1][0] = array(0, lang('plugin/k_misign', 'empty'));
		$query = C::t("forum_medal")->fetch_all_name_by_available(1);
		foreach($query as $relatedmedal) {
			$relatedmedalid[1][] = array($relatedmedal['medalid'], $relatedmedal['name']);
		}
		showsetting(lang('plugin/k_misign', 'cp_last_relatedmedal'), $relatedmedalid, $rule['relatedmedal'], 'select', '', '', lang('plugin/k_misign', 'cp_last_relatedmedal_comment'));
		showsetting(lang('plugin/k_misign', 'cp_last_relatedmedaldate'), 'relatedmedaldatenew', $rule['relatedmedaldate'], 'number', '', '', lang('plugin/k_misign', 'cp_last_relatedmedaldate_comment'));
		
		showsetting(lang('plugin/k_misign', 'cp_last_reward'), 'rewardnew', $rule['reward'], 'textarea', '', '', lang('plugin/k_misign', 'cp_last_reward_comment'));
		showsetting(lang('plugin/k_misign', 'cp_last_status'), 'statusnew', $rule['status'], 'radio');
		showsubmit('addsubmit', 'submit');
		showtablefooter();
		showformfooter();
	}else{
		$data = array(
			'lastday'=>intval($_GET['lastdaynew']), 
			'relatedmedal'=>intval($_GET['relatedmedalnew']),
			'relatedmedaldate'=>intval($_GET['relatedmedaldatenew']),
			'reward'=>addslashes($_GET['rewardnew']),
			'status'=>addslashes($_GET['statusnew']),
		);
		C::t("#k_misign#plugin_k_misign_lastrule")->insert($data);
		cpmsg(lang('plugin/k_misign', 'success'), "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_last", 'succeed');
	}
}elseif($op == 'edit'){
	$ruleid = intval($_GET['ruleid']);
	$rule = C::t("#k_misign#plugin_k_misign_lastrule")->fetch_by_ruleid($ruleid);
	if(!submitcheck('editsubmit')) {
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_last&op=edit&ruleid='.$ruleid, "enctype");
		showtableheader(lang('plugin/k_misign', 'cp_last_add'), 'fixpadding', '');
		showsetting(lang('plugin/k_misign', 'cp_last_lastday'), 'lastdaynew', $rule['lastday'], 'number', '', '', lang('plugin/k_misign', 'days'));
		//关联勋章设置
		$relatedmedalid = array('relatedmedalnew', array(), 'isfloat');
		$relatedmedalid[1][0] = array(0, lang('plugin/k_misign', 'empty'));
		$query = C::t("forum_medal")->fetch_all_name_by_available(1);
		foreach($query as $relatedmedal) {
			$relatedmedalid[1][] = array($relatedmedal['medalid'], $relatedmedal['name']);
		}
		showsetting(lang('plugin/k_misign', 'cp_last_relatedmedal'), $relatedmedalid, $rule['relatedmedal'], 'select', '', '', lang('plugin/k_misign', 'cp_last_relatedmedal_comment'));
		showsetting(lang('plugin/k_misign', 'cp_last_relatedmedaldate'), 'relatedmedaldatenew', $rule['relatedmedaldate'], 'number', '', '', lang('plugin/k_misign', 'cp_last_relatedmedaldate_comment'));
		
		showsetting(lang('plugin/k_misign', 'cp_last_reward'), 'rewardnew', $rule['reward'], 'textarea', '', '', lang('plugin/k_misign', 'cp_last_reward_comment'));
		showsetting(lang('plugin/k_misign', 'cp_last_status'), 'statusnew', $rule['status'], 'radio');
		showsubmit('editsubmit', 'submit');
		showtablefooter();
		showformfooter();
	}else{
		$data = array(
			'lastday'=>intval($_GET['lastdaynew']), 
			'relatedmedal'=>intval($_GET['relatedmedalnew']),
			'relatedmedaldate'=>intval($_GET['relatedmedaldatenew']),
			'reward'=>addslashes($_GET['rewardnew']),
			'status'=>addslashes($_GET['statusnew']),
		);
		C::t("#k_misign#plugin_k_misign_lastrule")->update($ruleid, $data);
		cpmsg(lang('plugin/k_misign', 'success'), "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_last", 'succeed');
	}
}

?>