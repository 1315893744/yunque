<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['list01_a'],
	'dir' => 'list01',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '2',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'forum_thread', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>array( 'name'=>'', 'blockclass'=>'forum_thread', 'makethumb'=>0, 'getpic'=>0, 'getsummary'=>1, 'settarget'=>0, 'moreurl'=>0, 'fields'=>array( 0=>'url', 1=>'title', 2=>'summary',), 'template'=>array( 'raw'=>'[loop]{url}{title}{summary}[/loop]', 'footer'=>'', 'header'=>'', 'indexplus'=>array(), 'index'=>array(), 'orderplus'=>array(), 'order'=>array(), 'loopplus'=>array(), 'loop'=>'{url}{title}{summary}',), 'hash'=>'5464e80f',), 'picwidth'=>'200', 'picheight'=>'200', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'thread', 'param'=>array( 'tids'=>'', 'uids'=>'', 'keyword'=>'', 'tagkeyword'=>'', 'typeids'=>'', 'recommend'=>'0', 'special'=>array( 0=>'0',), 'viewmod'=>'0', 'rewardstatus'=>'0', 'picrequired'=>'0', 'orderby'=>'lastpost', 'postdateline'=>'0', 'lastpost'=>'0', 'highlight'=>'1', 'titlelength'=>'60', 'summarylength'=>'90', 'startrow'=>'0', 'items'=>2,), 'shownum'=>'2', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1474897428', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);