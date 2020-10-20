<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['img06_a'],
	'dir' => 'img06',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '1',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'forum_thread', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'100', 'blockstyle'=>array( 'name'=>'', 'blockclass'=>'forum_thread', 'makethumb'=>0, 'getpic'=>1, 'getsummary'=>0, 'settarget'=>1, 'moreurl'=>0, 'fields'=>array( 0=>'url', 1=>'title', 2=>'pic', 3=>'author', 4=>'authorid', 5=>'avatar', 6=>'dateline', 7=>'views', 8=>'replies', 9=>'currentorder',), 'template'=>array( 'raw'=>'[loop]{url}{title}{target}{pic}{author}{authorid}{avatar}{dateline}{views}{replies}{currentorder}[/loop]', 'footer'=>'', 'header'=>'', 'indexplus'=>array(), 'index'=>array(), 'orderplus'=>array(), 'order'=>array(), 'loopplus'=>array(), 'loop'=>'{url}{title}{target}{pic}{author}{authorid}{avatar}{dateline}{views}{replies}{currentorder}',), 'hash'=>'e6b4e32e',), 'picwidth'=>'200', 'picheight'=>'200', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'thread', 'param'=>array( 'tids'=>'', 'uids'=>'', 'keyword'=>'', 'tagkeyword'=>'', 'fids'=>array( 0=>'0',), 'typeids'=>'', 'recommend'=>'0', 'viewmod'=>'0', 'rewardstatus'=>'0', 'picrequired'=>'1', 'orderby'=>'lastpost', 'postdateline'=>'0', 'lastpost'=>'0', 'highlight'=>'0', 'titlelength'=>'60', 'summarylength'=>'80', 'startrow'=>'0', 'items'=>5,), 'shownum'=>'5', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1485247798', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);