<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:54
//Identify: 8c1c5bb971f4b57329e014f8fdb96b13

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(!empty($srchtype)) { ?><input type="hidden" name="srchtype" value="<?php echo $srchtype;?>" /><?php } ?>
<div class="comiis_search<?php if(empty($searchid) || (empty($threadlist) && empty($articlelist) && empty($bloglist) && empty($albumlist) && empty($grouplist))) { ?> bg_e<?php } else { ?> bg_f<?php } ?> b_b cl">
<?php if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<option value="forum"
EOF;
 if(CURMODULE == 'forum') { 
$slist[forum] .= <<<EOF
 selected="selected"
EOF;
 } 
$slist[forum] .= <<<EOF
>{$comiis_lang['thread']}</a></option>
EOF;
?>
<?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<option value="portal"
EOF;
 if(CURMODULE == 'portal') { 
$slist[portal] .= <<<EOF
 selected="selected"
EOF;
 } 
$slist[portal] .= <<<EOF
>{$comiis_lang['portal']}</a></option>
EOF;
?>
<?php } if(helper_access::check_module('blog') && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<option value="blog"
EOF;
 if(CURMODULE == 'blog') { 
$slist[blog] .= <<<EOF
 selected="selected"
EOF;
 } 
$slist[blog] .= <<<EOF
>{$comiis_lang['blog']}</a></option>
EOF;
?>
<?php } if(helper_access::check_module('album') && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<option value="album"
EOF;
 if(CURMODULE == 'album') { 
$slist[album] .= <<<EOF
 selected="selected"
EOF;
 } 
$slist[album] .= <<<EOF
>{$comiis_lang['album']}</a></option>
EOF;
?>
<?php } if(helper_access::check_module('group') && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<option value="group"
EOF;
 if(CURMODULE == 'group') { 
$slist[group] .= <<<EOF
 selected="selected"
EOF;
 } 
$slist[group] .= <<<EOF
>{$comiis_group_lang['001']}</a></option>
EOF;
?>
<?php } ?>
<div class="comiis_ssbox comiis_flex">
<div class="ssbox_style bg_f b_t b_b b_l">
<div class="comiis_login_select comiis_input_style b_r">
<span class="inner">
<i class="comiis_font f_d">&#xe620</i>
<span class="z"><span class="comiis_question f_c" id="comiis_ssbox_style_name"><?php if(CURMODULE == 'forum') { ?><?php echo $comiis_lang['thread'];?><?php } elseif(CURMODULE == 'portal') { ?><?php echo $comiis_lang['portal'];?><?php } elseif(CURMODULE == 'blog') { ?><?php echo $comiis_lang['blog'];?><?php } elseif(CURMODULE == 'album') { ?><?php echo $comiis_lang['album'];?><?php } ?></span></span>					
</span>
<select id="comiis_ssbox_style" onchange="comiis_search()"><?php echo implode("", $slist);; ?></select>
</div>
</div>
<div class="ssbox_input flex bg_f b_t b_b"><input value="<?php echo $keyword;?>" autocomplete="off" class="comiis_input f_c" name="srchtxt" id="scform_srchtxt" value="" placeholder="<?php echo $comiis_lang['enter_content'];?>" type="search" style="line-height:34px;height:34px;padding:0;"></div>
<div class="comiis_ssbox_y">
<input type="hidden" name="searchsubmit" value="yes">
<button type="submit" id="scform_submit" value="true" class="ss_btns bg_a f_f"><i class="comiis_font">&#xe622</i></button>
</div>
</div>
</div>