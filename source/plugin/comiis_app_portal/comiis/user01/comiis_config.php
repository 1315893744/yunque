<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['user01_a'],
	'dir' => 'user01',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '99',
	'install' => array('block'=>array('0'=>array( 'bid'=>0, 'blockclass'=>'member_member', 'blocktype'=>'1', 'name'=>'comiis', 'title'=>'', 'classname'=>'', 'summary'=>'', 'uid'=>'0', 'username'=>'comiis', 'styleid'=>'0', 'blockstyle'=>array( 'name'=>'', 'blockclass'=>'member_member', 'makethumb'=>0, 'getpic'=>0, 'getsummary'=>0, 'settarget'=>0, 'moreurl'=>0, 'fields'=>array( 0=>'url', 1=>'title', 2=>'avatar_middle', 3=>'posts', 4=>'threads', 5=>'digestposts', 6=>'credits', 7=>'extcredits1', 8=>'extcredits2', 9=>'extcredits3', 10=>'gender', 11=>'currentorder', 12=>'birthprovince', 13=>'birthcity', 14=>'resideprovince', 15=>'residecity',), 'template'=>array( 'raw'=>'[loop]{url}{title}{avatar_middle}{posts}{threads}{digestposts} {credits}{extcredits1}{extcredits2}{extcredits3}{gender}{currentorder}{birthprovince}{birthcity}{resideprovince}{residecity}[/loop]', 'footer'=>'', 'header'=>'', 'indexplus'=>array(), 'index'=>array(), 'orderplus'=>array(), 'order'=>array(), 'loopplus'=>array(), 'loop'=>'{url}{title}{avatar_middle}{posts}{threads}{digestposts} {credits}{extcredits1}{extcredits2}{extcredits3}{gender}{currentorder}{birthprovince}{birthcity}{resideprovince}{residecity}',), 'hash'=>'af92f7e6',), 'picwidth'=>'0', 'picheight'=>'0', 'target'=>'blank', 'dateformat'=>'Y-m-d', 'dateuformat'=>'0', 'script'=>'membercredit', 'param'=>array( 'orderby'=>'credits', 'extcredit'=>'1', 'startrow'=>'0', 'items'=>10,), 'shownum'=>'10', 'cachetime'=>'3600', 'cachetimerange'=>'', 'punctualupdate'=>'0', 'hidedisplay'=>'0', 'dateline'=>'1524234159', 'notinherited'=>'0', 'isblank'=>'0',),),'style'=>array())
);