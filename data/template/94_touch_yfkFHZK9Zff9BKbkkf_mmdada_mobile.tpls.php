<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(!empty($srchtype)) { ?><input type="hidden" name="srchtype" value="<?php echo $srchtype;?>" /><?php } ?>
<div class="comiis_topsearch bg_e b_b cl">	
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
>{$comiis_lang['thread']}</option>
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
>{$comiis_lang['portal']}</option>
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
>{$comiis_lang['blog']}</option>
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
>{$comiis_lang['album']}</option>
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
>{$comiis_group_lang['001']}</option>
EOF;
?>
<?php } ?><?php
$slist[user] = <<<EOF
<option value="user">{$comiis_lang['tip332']}</option>
EOF;
?>
    <div id="comiis_search_noe"><a href="javascript:comiis_search_show(1);" class="ssbox ssct b_ok bg_f f_d"><i class="comiis_font f_d">&#xe622</i> <?php echo $comiis_group_lang['024'];?></a></div>
    <div id="comiis_search_two" style="display:none">            
        <form method="post" action="misc.php?mod=tag&amp;type=thread">
            <input type="hidden" name="searchsubmit" value="yes">
            <ul class="comiis_flex">
            <div class="comiis_ssstyle b_ok bg_f">
                <div class="comiis_login_select comiis_input_style b_r">
                    <span class="inner">
                        <i class="comiis_font f_d">&#xe620</i>
                        <span class="z"><span class="comiis_question f_c" id="comiis_ssbox_style_name"><?php if(CURMODULE == 'forum') { ?><?php echo $comiis_lang['thread'];?><?php } elseif(CURMODULE == 'portal') { ?><?php echo $comiis_lang['portal'];?><?php } elseif(CURMODULE == 'blog') { ?><?php echo $comiis_lang['blog'];?><?php } elseif(CURMODULE == 'album') { ?><?php echo $comiis_lang['album'];?><?php } ?></span></span>					
                    </span>
                    <select id="comiis_ssbox_style" onchange="comiis_search()" name="mod">
                        <?php echo implode("", $slist);; ?>                    </select>
                </div>
            </div>
            <input value="<?php echo $keyword;?>" type="search" name="srchtxt" id="scform_srchtxt" placeholder="<?php echo $comiis_lang['enter_content'];?>..." class="ssbox b_ok bg_f f_c flex" style="border-left:none !important;border-radius:0 3px 3px 0;" />
            <a href="javascript:comiis_search_show(0);" class="ssclose bg_f f_e"><i class="comiis_font">&#xe647</i></a>
            <button type="submit" id="scform_submit" value="true" class="ssbtn bg_c f_f"><?php echo $comiis_lang['tip129'];?></button>
            </ul>			
        </form>
    </div>
</div>	
<script>
function comiis_search_show(a){
    if(a == 1){
        $('#comiis_search_noe').hide();
        $('#comiis_search_two').show()
        $('#scform_srchtxt').focus();
    }else{
        $('#comiis_search_two').hide();
        $('#comiis_search_noe').show();
    }
}
<?php if($keyword) { ?>comiis_search_show(1);<?php } ?>
</script>