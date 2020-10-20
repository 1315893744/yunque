<?php


 
if(!defined('IN_DISCUZ')) {exit('Access Denied');}
class mobileplugin_comiis_code {
	function global_header_mobile(){
		global $_G;
		require DISCUZ_ROOT.'./source/plugin/comiis_code/comiis_code.php';
		return $recomiis_code;
	}
}
?>
