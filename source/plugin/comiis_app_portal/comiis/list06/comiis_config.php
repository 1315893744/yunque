<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['list06_a'],
	'dir' => 'list06',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '2',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'forum_thread', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>$comiis_portal['list06_b'], 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>array( 'name'=>'', 'blockclass'=>'forum_thread', 'makethumb'=>0, 'getpic'=>0, 'getsummary'=>0, 'settarget'=>0, 'moreurl'=>0, 'fields'=>array( 0=>'url', 1=>'title',), 'template'=>array( 'raw'=>'[loop]{url}{title}[/loop]', 'footer'=>'', 'header'=>'', 'indexplus'=>array(), 'index'=>array(), 'orderplus'=>array(), 'order'=>array(), 'loopplus'=>array(), 'loop'=>'{url}{title}',), 'hash'=>'6287f4a3',), 'picwidth'=>'0', 'picheight'=>'0', 'target'=>'blank', 'dateformat'=>'m-d', 'dateuformat'=>'0', 'script'=>'thread', 'param'=>array( 'tids'=>'', 'uids'=>'', 'keyword'=>'', 'tagkeyword'=>'', 'typeids'=>'', 'recommend'=>'0', 'viewmod'=>'0', 'rewardstatus'=>'0', 'picrequired'=>'0', 'orderby'=>'lastpost', 'postdateline'=>'0', 'lastpost'=>'0', 'highlight'=>'0', 'titlelength'=>'60', 'summarylength'=>'80', 'startrow'=>'0', 'items'=>5,), 'shownum'=>'5', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1474968219', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);