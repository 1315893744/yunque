<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['search_a'],
	'dir' => 'search',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '99',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'html_html', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>$comiis_portal['search_a'], 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>'', 'picwidth'=>'0', 'picheight'=>'0', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'blank', 'param'=>array( 'content'=>$comiis_portal['search_a'], 'items'=>10,), 'shownum'=>'10', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1475032468', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);