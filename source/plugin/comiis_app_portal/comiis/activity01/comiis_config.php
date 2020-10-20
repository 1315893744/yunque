<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['activity01_a'],
	'dir' => 'activity01',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '99',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'forum_activity', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>'', 'picwidth'=>'500', 'picheight'=>'250', 'target'=>'blank', 'dateformat'=>'Y-m-d H:i', 'dateuformat'=>'1', 'script'=>'activity', 'param'=>array( 'tids'=>'', 'uids'=>'', 'keyword'=>'', 'fids'=>array( 0=>'0',), 'viewmod'=>'0', 'recommend'=>'0', 'place'=>'', 'class'=>'', 'gender'=>'', 'orderby'=>'dateline', 'highlight'=>'0', 'titlelength'=>'40', 'summarylength'=>'80', 'startrow'=>'0', 'items'=>3,), 'shownum'=>'3', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1539783772', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);