<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
loadcache('plugin');
$setting = $misign = $_G['cache']['plugin']['k_misign'];
$misign['modstatus'] = unserialize($misign['modstatus']);
if(submitcheck('modstatussubmit')) {
	$data['value']['portal_index'] = dintval($_GET['portal_index'], true);
	$data['value']['portal_list'] = dintval($_GET['portal_list'], true);
	$data['value']['portal_view'] = dintval($_GET['portal_view'], true);
	$data['value']['forum_index'] = dintval($_GET['forum_index'], true);
	$data['value']['forum_forumdisplay'] = dintval($_GET['forum_forumdisplay'], true);
	$data['value']['forum_viewthread'] = dintval($_GET['forum_viewthread'], true);
	$data['value']['group_default'] = dintval($_GET['group_default'], true);
	$data['value']['group_index'] = dintval($_GET['group_index'], true);
	$data['value']['group_forumdisplay'] = dintval($_GET['group_forumdisplay'], true);
	$data['value']['group_viewthread'] = dintval($_GET['group_viewthread'], true);
	$data['value']['group_other'] = dintval($_GET['group_other'], true);
	$data['value']['home_index'] = dintval($_GET['home_index'], true);
	
	$data['value'] = serialize($data['value']);
	
	C::t("common_pluginvar")->update_by_variable($do, 'modstatus', $data);
	updatecache(array('plugin'));
	cpmsg(lang('plugin/k_misign', 'success'), "action=plugins&operation=config&do=".$do."&identifier=k_misign&pmod=cp_button", 'succeed');
}else{
	
	showformheader('plugins&operation=config&do='.$pluginid.'&identifier=k_misign&pmod=cp_button', 'enctype');
	showtableheader();
	
	showtableheader(lang('plugin/k_misign', 'portal_index'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'portal_index[status]', (($misign['modstatus']['portal_index']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'portal_index[width]', $misign['modstatus']['portal_index']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'portal_list'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'portal_list[status]', (($misign['modstatus']['portal_list']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'portal_list[width]', $misign['modstatus']['portal_list']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'portal_view'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'portal_view[status]', (($misign['modstatus']['portal_view']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'portal_view[width]', $misign['modstatus']['portal_view']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'forum_index'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'forum_index[status]', (($misign['modstatus']['forum_index']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'forum_index[width]', $misign['modstatus']['forum_index']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'forum_forumdisplay'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'forum_forumdisplay[status]', (($misign['modstatus']['forum_forumdisplay']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'forum_forumdisplay[width]', $misign['modstatus']['forum_forumdisplay']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'forum_viewthread'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'forum_viewthread[status]', (($misign['modstatus']['forum_viewthread']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'forum_viewthread[width]', $misign['modstatus']['forum_viewthread']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'group_default'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'group_default[status]', (($misign['modstatus']['group_default']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'group_default[width]', $misign['modstatus']['group_default']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'group_index'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'group_index[status]', (($misign['modstatus']['group_index']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'group_index[width]', $misign['modstatus']['group_index']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'group_forumdisplay'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'group_forumdisplay[status]', (($misign['modstatus']['group_forumdisplay']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'group_forumdisplay[width]', $misign['modstatus']['group_forumdisplay']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'group_viewthread'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'group_viewthread[status]', (($misign['modstatus']['group_viewthread']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'group_viewthread[width]', $misign['modstatus']['group_viewthread']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'group_other'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'group_other[status]', (($misign['modstatus']['group_other']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'group_other[width]', $misign['modstatus']['group_other']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();
	showtableheader(lang('plugin/k_misign', 'home_index'));
	showsetting(lang('plugin/k_misign', 'button_status'), 'home_index[status]', (($misign['modstatus']['home_index']['status'] == 1) ? 1 : 0), 'radio');
	showsetting(lang('plugin/k_misign', 'button_width'), 'home_index[width]', $misign['modstatus']['home_index']['width'], 'text', '', '', lang('plugin/k_misign', 'buttoncp_tip'));
	showtablefooter();

	showsubmit('modstatussubmit', 'submit');
	showtablefooter();
	showformfooter();
}
?>