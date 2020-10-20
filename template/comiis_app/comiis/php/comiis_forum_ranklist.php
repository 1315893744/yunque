<?php
  
if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$comiis_readfids_s=array();
$comiis_forum_icon_s=$comiis_readfids_s;
foreach($_G['cache']['forums'] as $temp)
{
	if (($temp['status']==1 && ($temp['type']=='forum' || $temp['type']=='sub'))) 
	{
		$comiis_readfids_s[]=$temp['fid'];
	}
}
$comiis_forum_icon_s=DB::fetch_all('SELECT fid,icon FROM %t WHERE fid IN ('.dimplode($comiis_readfids_s).')',array(0=>'forum_forumfield'),'fid');
foreach($comiis_forum_icon_s as $k=>$temp)
{
	$parse=parse_url($temp['icon']);
	if (isset($parse['host'])) 
	{
		$comiis_forum_icon_s[$k]['icon']=$temp['icon'];
	}
	else 
	{
		$comiis_forum_icon_s[$k]['icon']=($temp['icon']?$_G['setting']['attachurl'].'common/'.$temp['icon']:'');
	}
}
?>