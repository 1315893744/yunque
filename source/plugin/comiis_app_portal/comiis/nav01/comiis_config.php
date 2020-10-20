<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['nav01_a'],
	'dir' => 'nav01',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '3',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'html_html', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'<ul class="comiis_flex"><li class="flex f_b"><a href="#">'.$comiis_portal['nav01_b'].'</a></li><li class="flex f_b"><a href="#">'.$comiis_portal['nav01_b'].'</a></li><li class="flex f_b"><a href="#">'.$comiis_portal['nav01_b'].'</a></li><li class="flex f_b"><a href="#">'.$comiis_portal['nav01_b'].'</a></li></ul>', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>'', 'picwidth'=>'0', 'picheight'=>'0', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'blank', 'param'=>array( 'content'=>'<ul class="comiis_flex"><li class="flex f_b"><a href="#">'.$comiis_portal['nav01_b'].'</a></li><li class="flex f_b"><a href="#">'.$comiis_portal['nav01_b'].'</a></li><li class="flex f_b"><a href="#">'.$comiis_portal['nav01_b'].'</a></li><li class="flex f_b"><a href="#">'.$comiis_portal['nav01_b'].'</a></li></ul>', 'items'=>10,), 'shownum'=>'10', 'cachetime'=>'0', 'cachetimerange'=>'0,0', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1474900087', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);