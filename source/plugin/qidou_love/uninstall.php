<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) exit('Access Denied!');
DB::query("DROP TABLE IF EXISTS ".DB::table('qidou_love_list'));
DB::query("DROP TABLE IF EXISTS ".DB::table('qidou_love_reward'));
DB::query("DROP TABLE IF EXISTS ".DB::table('qidou_love_user'));

rm_dir(DISCUZ_ROOT.'/source/plugin','/qidou_love');

/*
*删除文件夹下所有文件及文件夹
*/
function rm_dir($root_dir,$dir){
	$all_file = scandir($root_dir.$dir);
	foreach( $all_file as $file ){
		if( $file!='.' && $file!='..' ){
			if( strpos($file,'.') ){
				unlink($root_dir.$dir.'/'.$file);	
			}else if( count(scandir($root_dir.$dir.'/'.$file)) >2 ){
				rm_dir($root_dir.$dir,'/'.$file);
			}else{
				rmdir($root_dir.$dir.'/'.$file);	
			}
		}
	}
	rmdir($root_dir.$dir);	
}

$finish = TRUE;

?>