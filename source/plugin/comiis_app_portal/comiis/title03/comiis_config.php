<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['title03_a'],
	'dir' => 'title03',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '3',
		'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'html_html', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'<h2 class="pb12">'.$comiis_portal['title03_b'].'</h2>', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>'', 'picwidth'=>'0', 'picheight'=>'0', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'blank', 'param'=>array( 'content'=>'<h2 class="pb12">'.$comiis_portal['title03_b'].'</h2>', 'items'=>10,), 'shownum'=>'10', 'cachetime'=>'0', 'cachetimerange'=>'0,0', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1474937857', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);