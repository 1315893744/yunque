<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function comiis_app_portal_fields($fields){
	if(is_array($fields)){
		foreach($fields as $k => $v) {
			$fields[$k]['fields'] = !empty($v['fields']) ? (array)(dunserialize($v['fields'])) : array();
		}
	}
	return $fields;
}



