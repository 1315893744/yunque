<?php


 
if(!defined('IN_DISCUZ')) {exit('Access Denied');}
$plugindata = array();
$comiis_code_view = $recomiis_code = '';
$plugindata = $_G['cache']['plugin']['comiis_code'];
if(isset($_GET['code']) && $_GET['code'] == substr(md5($_G['tid']), 8, 16) && $_G['basescript'] == 'forum' && CURMODULE == 'viewthread'){
	loadcache('comiis_code_view');
	$comiis_code_view = intval($_G['cache']['comiis_code_view']) + 1;
	savecache('comiis_code_view', $comiis_code_view);
	if($plugindata['comiis_code_top_open'] == 1){
		$plugindata['comiis_code_mob_view'] = str_replace("{views}", "<span>". $comiis_code_view. "</span>", $plugindata['comiis_code_mob_view']);
		$recomiis_code = '<style>
		.comiis_mob_code {width:100%;margin:0 auto;padding-bottom:15px;background:#fff url(source/plugin/comiis_code/comiis_img/comiis_mob_x.gif) repeat-x bottom;text-align:center;}
		.comiis_mob_code .comiis_mob_wz{padding:10px 10px 4px 40px; background:#fff url(source/plugin/comiis_code/comiis_img/comiis_mob_logo.gif) no-repeat 0px 14px;text-align:left;margin:0px auto;display:inline-block;}
		.comiis_mob_code .comiis_mob_wz .comiis_mob_titlenpix{font-size:16px;display:block;}
		.comiis_mob_code .comiis_mob_wz .comiis_mob_viewsfwti{color:#999;font-size:12px;height:12px;line-height:12px;display:block;}
		.comiis_mob_code .comiis_mob_wz .comiis_mob_viewsfwti span{margin:0px 6px;color:#333;}
		.comiis_mob_code .comiis_mob_wz .comiis_mob_viewsfwti img{margin-left:4px;vertical-align:bottom;}
		</style>				
		<div class="comiis_mob_code">
		<div class="comiis_mob_wz">
		<p class="comiis_mob_titlenpix">'.$plugindata['comiis_code_mob_title'].'</p>
		<p class="comiis_mob_viewsfwti">'.$plugindata['comiis_code_mob_view'].'</p>
		</div>
		</div>';
	}else{
		$recomiis_code = '';
	}
}
?>