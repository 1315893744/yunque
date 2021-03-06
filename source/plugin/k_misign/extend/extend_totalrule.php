<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$setting['extends'] = unserialize($setting['extendp']);
$op = in_array($_GET['op'], array('add', 'edit', 'install', 'uninstall', 'check')) ? $_GET['op'] : '';
require_once DISCUZ_ROOT.'./source/plugin/k_misign/language/extend_totalrule.'.currentlang().'.php';

if(!$op){
	if(!submitcheck('rulesubmit')) {
		$install = DB::fetch_first("show tables like '".DB::table("plugin_k_misign_totalrule")."';");
		if(!$install){
			cpmsg(lang('plugin/k_misign', 'extend_install'), "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=totalrule&op=install", 'loading');
		}
		
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
		$list = C::t("#k_misign#plugin_k_misign_totalrule")->fetch_all_cp($start, $perpage);
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
				'<label><input class="checkbox" type="checkbox" name="statusnew['.$lists['ruleid'].']" value="1" '.($lists['status'] ? 'checked="checked" ' : '').'>'.$extendlang['status_1'].'</label>&nbsp;<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=totalrule&op=edit&ruleid='.$lists['ruleid'].'">'.$lang['detail'].'</a>',
			), TRUE);
		}
		$count =  0;
		$count = C::t("#k_misign#plugin_k_misign_totalrule")->count();
		$multi = multi($count, $perpage, $page, '?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=totalrule');
		
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=totalrule');
		showtableheader(lang('plugin/k_misign', 'extend_totalrule').'  <a id="check" onclick="ajaxget(this.href, this.id, this.id, \''.$extendlang['plzwait'].'\');return false" href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=totalrule&op=check">'.($setting['extends']['totalrule'] ? $extendlang['extendstatus_2'] : $extendlang['extendstatus_1']).'</a>', 'fixpadding', '');
		showsubtitle(array('', $extendlang['days'], $extendlang['rulecontent'], $extendlang['relatedmedal'], $extendlang['status']));
		echo $companylist;
		echo '<tr><td>&nbsp;</td><td colspan="8"><div><a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=totalrule&op=add" class="addtr">'.$extendlang['add'].'</a></div></td></tr>';
		showsubmit('rulesubmit', 'submit', 'del', '', $multi);
		showtablefooter();
		showformfooter();
	}else{
		if(is_array($_GET['delete'])) {
			foreach($_GET['delete'] as $id) {
				C::t("#k_misign#plugin_k_misign_totalrule")->delete($id);
			}
		}
		if(is_array($_GET['lastdaynew'])) {
			foreach($_GET['lastdaynew'] as $id => $value) {
				$data = array('lastday' => intval($value), 'status' => intval($_GET['statusnew'][$id]));
				C::t("#k_misign#plugin_k_misign_totalrule")->update(intval($id),$data);
			}
		}
		cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=totalrule", 'succeed');
	}
}elseif($op == 'add'){
	if(!submitcheck('addsubmit')) {
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=totalrule&op=add', "enctype");
		showtableheader($extendlang['add'], 'fixpadding', '');
		showsetting($extendlang['days'], 'lastdaynew', $rule['lastday'], 'number', '', '', lang('plugin/k_misign', 'days'));
		//关联勋章设置
		$relatedmedalid = array('relatedmedalnew', array(), 'isfloat');
		$relatedmedalid[1][0] = array(0, lang('plugin/k_misign', 'empty'));
		$query = C::t("forum_medal")->fetch_all_name_by_available(1);
		foreach($query as $relatedmedal) {
			$relatedmedalid[1][] = array($relatedmedal['medalid'], $relatedmedal['name']);
		}
		showsetting($extendlang['relatedmedal'], $relatedmedalid, $rule['relatedmedal'], 'select', '', '', $extendlang['medal_comment']);
		showsetting($extendlang['relatedmedaldate'], 'relatedmedaldatenew', $rule['relatedmedaldate'], 'number', '', '', $extendlang['relatedmedaldate_comment']);
		
		showsetting($extendlang['reward'], 'rewardnew', $rule['reward'], 'textarea', '', '', $extendlang['reward_comment']);
		showsetting($extendlang['status'], 'statusnew', $rule['status'], 'radio');
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
		C::t("#k_misign#plugin_k_misign_totalrule")->insert($data);
		cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=totalrule", 'succeed');
	}
}elseif($op == 'edit'){
	$ruleid = intval($_GET['ruleid']);
	$rule = C::t("#k_misign#plugin_k_misign_totalrule")->fetch_by_ruleid($ruleid);
	if(!submitcheck('editsubmit')) {
		showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_extend&act=totalrule&op=edit&ruleid='.$ruleid, "enctype");
		showtableheader($extendlang['add'], 'fixpadding', '');
		showsetting($extendlang['lastday'], 'lastdaynew', $rule['lastday'], 'number', '', '', lang('plugin/k_misign', 'days'));
		//关联勋章设置
		$relatedmedalid = array('relatedmedalnew', array(), 'isfloat');
		$relatedmedalid[1][0] = array(0, lang('plugin/k_misign', 'empty'));
		$query = C::t("forum_medal")->fetch_all_name_by_available(1);
		foreach($query as $relatedmedal) {
			$relatedmedalid[1][] = array($relatedmedal['medalid'], $relatedmedal['name']);
		}
		showsetting($extendlang['relatedmedal'], $relatedmedalid, $rule['relatedmedal'], 'select', '', '', $extendlang['relatedmedal_comment']);
		showsetting($extendlang['relatedmedaldate'], 'relatedmedaldatenew', $rule['relatedmedaldate'], 'number', '', '', $extendlang['relatedmedaldate_comment']);
		
		showsetting($extendlang['reward'], 'rewardnew', $rule['reward'], 'textarea', '', '', $extendlang['reward_comment']);
		showsetting($extendlang['status'], 'statusnew', $rule['status'], 'radio');
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
		C::t("#k_misign#plugin_k_misign_totalrule")->update($ruleid, $data);
		cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=totalrule", 'succeed');
	}
}elseif($op == 'install'){
	$sql = <<<EOF
CREATE TABLE IF NOT EXISTS pre_plugin_k_misign_totalrule (
  ruleid int(11) NOT NULL AUTO_INCREMENT,
  lastday int(11) NOT NULL,
  reward text NOT NULL,
  relatedmedal int(11) NOT NULL,
  relatedmedaldate int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (ruleid),
  KEY lastday (lastday,`status`)
) ENGINE=MyISAM;
EOF;
	runquery($sql);
	cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend&act=totalrule", 'succeed');
}elseif($op == 'uninstall'){
	$data['value'] = $setting['extends'];
	unset($data['value']['totalrule']);
	$data['value'] = serialize($data['value']);
	C::t("common_pluginvar")->update_by_variable($do, 'extendp', $data);
	
	DB::query("DROP TABLE IF EXISTS ".DB::table('plugin_k_misign_totalrule'));
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/language/extend_totalrule.'.currentlang().'.php');
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/extend/extend_totalrule.php');
	@unlink(DISCUZ_ROOT.'./source/plugin/k_misign/table/table_plugin_k_misign_totalrule.php');
	cpmsg('update_success', "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_extend", 'succeed');
}elseif($op == 'check'){
	if($setting['extends']['totalrule']){
		$data['value'] = $setting['extends'];
		$data['value']['totalrule'] = '0';
		$data['value'] = serialize($data['value']);
		C::t("common_pluginvar")->update_by_variable($do, 'extendp', $data);
		$resultshow = $extendlang['extendstatus_1'];
	}else{
		$data['value'] = $setting['extends'];
		$data['value']['totalrule'] = '1';
		$data['value'] = serialize($data['value']);
		C::t("common_pluginvar")->update_by_variable($do, 'extendp', $data);
		$resultshow = $extendlang['extendstatus_2'];
	}
	
	updatecache('plugin');
	ajaxshowheader();
	echo $resultshow;
	ajaxshowfooter();
}
?>