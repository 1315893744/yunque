<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(is_array($load_var) && count($load_var)){
	$temp_var = array();
	foreach($load_var as $v){
		if(preg_match('/^[a-z0-9_\.]+$/i', $v) && !empty($GLOBALS[$v])){
			$temp_var[$v] = $GLOBALS[$v];
		}
	}
	if(is_array($temp_var) && count($temp_var)){
		extract($temp_var);
		unset($temp_var);
	}
}