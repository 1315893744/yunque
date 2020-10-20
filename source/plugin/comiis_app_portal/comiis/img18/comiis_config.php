<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['img18_a'],
	'dir' => 'img18',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '1',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'forum_thread', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>array( 'name'=>'', 'blockclass'=>'forum_thread', 'makethumb'=>'1', 'getpic'=>'1', 'getsummary'=>'0', 'settarget'=>'0', 'moreurl'=>'0', 'fields'=>array( 0=>'url', 1=>'title', 2=>'pic', 3=>'authorid', 4=>'author', 5=>'avatar_middle', 6=>'replies',), 'template'=>array( 'raw'=>'[loop]{url}{title}{pic}{picwidth}{picheight}{authorid}{author}{avatar_middle}{replies}[/loop]', 'footer'=>'', 'header'=>'', 'indexplus'=>array(), 'index'=>array(), 'orderplus'=>array(), 'order'=>array(), 'loopplus'=>array(), 'loop'=>'{url}{title}{pic}{picwidth}{picheight}{authorid}{author}{avatar_middle}{replies}',), 'hash'=>'37dc8382',), 'picwidth'=>'200', 'picheight'=>'250', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'thread', 'param'=>array( 'tids'=>'', 'uids'=>'', 'keyword'=>'', 'tagkeyword'=>'', 'fids'=>array( 0=>'0',), 'typeids'=>'', 'recommend'=>'0', 'viewmod'=>'0', 'rewardstatus'=>'0', 'picrequired'=>'1', 'orderby'=>'lastpost', 'postdateline'=>'0', 'lastpost'=>'0', 'highlight'=>'0', 'titlelength'=>'30', 'summarylength'=>'80', 'startrow'=>'0', 'items'=>'10',), 'shownum'=>'12', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1474942455', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);