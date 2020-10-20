<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:21
//Identify: dcb805a22bf06434f3e135b080a2a70b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_flxx_listbox mt10 b_t cl">
    <?php function comiis_replace_flxx_color($var) {
return 'comiis_flxx_color'.$var[1].'><em class="comiis_xifont">'.str_replace('&nbsp;','</em><em class="comiis_xifont">', $var[2]).'</em></';
}
if(strpos($sorttemplate['body'], '/common/digest') !== false){
$sorttemplate['body'] = preg_replace("/<h2>(.*?)<img (.*?)><\/h2>/i", "<h2><span class=\"top_jh bg_c f_f\">{$comiis_lang['view1']}</span>\\1</h2>", $sorttemplate['body']);
}
if(strpos($sorttemplate['body'], 'comiis_flxx_color') !== false){
$sorttemplate['body'] = preg_replace_callback("/comiis_flxx_color(.*?)>(.*?)&nbsp;<\//i", 'comiis_replace_flxx_color', $sorttemplate['body']);
}?>    <?php echo $sorttemplate['body'];?>
</div>
