<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['album_a'],
	'dir' => 'album',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '99',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'space_album', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>array( 'name'=>'', 'blockclass'=>'space_album', 'makethumb'=>1, 'getpic'=>1, 'getsummary'=>0, 'settarget'=>0, 'moreurl'=>0, 'fields'=>array( 0=>'url', 1=>'pic', 2=>'title', 3=>'picnum',), 'template'=>array( 'raw'=>'[loop]{url}{pic}{picwidth}{picheight}{title}{picnum}[/loop]', 'footer'=>'', 'header'=>'', 'indexplus'=>array(), 'index'=>array(), 'orderplus'=>array(), 'order'=>array(), 'loopplus'=>array(), 'loop'=>'{url}{pic}{picwidth}{picheight}{title}{picnum}',), 'hash'=>'0a53bdf5',), 'picwidth'=>'200', 'picheight'=>'200', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'album', 'param'=>array( 'aids'=>'', 'uids'=>'', 'orderby'=>'dateline', 'titlelength'=>'20', 'startrow'=>'0', 'items'=>10,), 'shownum'=>'6', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1485348840', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);