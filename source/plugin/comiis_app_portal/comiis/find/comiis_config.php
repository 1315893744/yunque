<?php

 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $comiis_config, $comiis_portal;
$comiis_config = array(
	'name' => $comiis_portal['find_a'],
	'dir' => 'find',
	'copyright' => 'http://www.comiis.com',
	'version' => '2',
	'types' => '5',
	'install' => array('block'=>array('0'=>array('blockclass'=>'plugin')))
);