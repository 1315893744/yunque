<?php  

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$_G['comiis_user_data']=array();
$user_uids=$_G['comiis_user_data'];
if (count($list)) 
{
	foreach($list as $temp)
	{
		$user_uids[$temp['uid']]=$temp['uid'];
	}
	if ($comiis_app_switch['comiis_phb_style']!=1) 
	{
		$query=DB::query('SELECT uid, gender FROM `'.DB::table('common_member_profile').'` WHERE uid IN ('.dimplode($user_uids).')');
	}
	else 
	{
		$query=DB::query('SELECT m.uid, m.groupid, p.gender FROM `'.DB::table('common_member').'` m LEFT JOIN `'.DB::table('common_member_profile').'` p ON m.uid=p.uid WHERE m.uid IN ('.dimplode($user_uids).')');
	}
	while ($temp=DB::fetch($query)) 
	{
		$_G['comiis_user_data'][$temp['uid']]=array('gender'=>$temp['gender'],'stars'=>($comiis_app_switch['comiis_phb_style']!=1 ? '' : $_G['cache']['usergroups'][$temp['groupid']]['stars']),'title'=>($comiis_app_switch['comiis_phb_style']!=1 ? '' : strip_tags($_G['cache']['usergroups'][$temp['groupid']]['grouptitle'])),'color'=>($comiis_app_switch['comiis_phb_style']!=1 ? '' : $_G['cache']['usergroups'][$temp['groupid']]['color']));
	}
}
?>