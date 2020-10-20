<?php
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['forum02_a'],
	'dir' => 'forum02',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '99',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'forum_forum', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>array( 'name'=>'', 'blockclass'=>'forum_forum', 'makethumb'=>0, 'getpic'=>0, 'getsummary'=>0, 'settarget'=>0, 'moreurl'=>0, 'fields'=>array( 0=>'url', 1=>'title', 2=>'icon',), 'template'=>array( 'raw'=>'[loop]{url}{title}{icon}[/loop]', 'footer'=>'', 'header'=>'', 'indexplus'=>array(), 'index'=>array(), 'orderplus'=>array(), 'order'=>array(), 'loopplus'=>array(), 'loop'=>'{url}{title}{icon}',), 'hash'=>'67c7dc21',), 'picwidth'=>'0', 'picheight'=>'0', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'forum', 'param'=>array( 'fids'=>'', 'fups'=>array( 0=>'0',), 'titlelength'=>'40', 'summarylength'=>'80', 'orderby'=>'todayposts', 'items'=>8,), 'shownum'=>'10', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1474938955', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);