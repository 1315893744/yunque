<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($comiis_app_switch['comiis_share_js']) { ?>
<script>
function comiis_user_share() {
<?php echo $comiis_app_switch['comiis_share_js'];?>
}
</script>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?><?php comiis_load('j9alEz9X55JrjbA3l9', '');?><div id="mask" style="display:none;"></div>
<div id="comiis_menu_bg" style="display:none;"></div>
<div id="comiis_alert" style="display:none;"></div></div>
<?php if($comiis_app_switch['comiis_statcode']) { ?><div style="display:none;"><?php echo $comiis_app_switch['comiis_statcode'];?></div><?php } if($comiis_app_switch['comiis_scrolltop'] != 1 && $comiis_app_switch['comiis_leftnv_back'] != 2) { ?>
    <?php if(($comiis_isweixin == 1 && (($_G['basescript'] == 'portal' && CURMODULE == 'view') || ($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog' && $_GET['id']) || (($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread'))) || $comiis_app_switch['comiis_leftnv_back'] == 1) { ?>
    <style>.comiis_view_foot li.backico {display:none;}</style>
    <?php } ?>
    <?php if($comiis_app_switch['comiis_leftnv_back'] == 1) { ?>    
    <div class="comiis_footer_scroll scrolltop_l"<?php if($comiis_foot != 'no' || $comiis_open_footer) { ?> style="bottom:82px;"<?php } ?>>
        <?php if(count($comiis_app_nav['ynav'])) { ?>
            <?php if(is_array($comiis_app_nav['ynav'])) foreach($comiis_app_nav['ynav'] as $temp) { ?>                <?php if($temp['url'] == ':comiis_back:') { ?>
                    <a href="javascript:history.back();"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    <?php } else { ?>
        <?php if($comiis_isweixin == 1 && $_G['comiis_close_header'] != 1) { ?>
        <div class="comiis_footer_scroll scrolltop_l"<?php if($comiis_foot != 'no' || $comiis_open_footer) { ?> style="bottom:82px;"<?php } ?>>
            <?php if(count($comiis_app_nav['ynav'])) { ?>
                <?php if(is_array($comiis_app_nav['ynav'])) foreach($comiis_app_nav['ynav'] as $temp) { ?>                    <?php if($temp['url'] == ':comiis_back:') { ?>
                        <a href="javascript:history.back();"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
        <?php } ?>
    <?php } } if($comiis_app_switch['comiis_scrolltop'] > 0) { ?>
<div class="comiis_footer_scroll<?php if($comiis_app_switch['comiis_scrolltop'] == 1) { ?> scrolltop_l<?php } ?>"<?php if($comiis_foot != 'no' || $comiis_open_footer) { ?> style="bottom:82px;"<?php } ?>>
    <?php if(count($comiis_app_nav['ynav'])) { ?>
        <?php $nn=0;?>        <div class="comiis_lrmenu comiis_lrshow">
        <?php if(is_array($comiis_app_nav['ynav'])) foreach($comiis_app_nav['ynav'] as $temp) { ?>            <?php $nn++;?>            <?php if($nn < 15) { ?>
                <?php if($temp['url'] == ':comiis_top:') { ?>
                    <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> onclick="$('body,html').animate({scrollTop:0}, 800);" class="comiis_scrolltops f_f" style="display:none;<?php if($temp['bgcolor']) { ?>background:<?php echo $temp['bgcolor'];?><?php } ?>"><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } elseif($temp['url'] == ':comiis_back:') { ?>
                    <?php if(($comiis_isweixin == 1 && $comiis_app_switch['comiis_scrolltop'] != 2) || $comiis_app_switch['comiis_leftnv_back'] == 2) { ?>
                    <a href="javascript:history.back();"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                <?php } elseif($temp['url'] == ':comiis_head:') { ?>
                    <?php if($comiis_isweixin == 1 && $_G['comiis_close_header'] != 1) { ?>
                    <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="comiis_isweixin_key f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                <?php } elseif($temp['url'] == ':comiis_reload:') { ?>
                    <a href="javascript:;" onclick="location.reload();"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } elseif($temp['url'] == ':comiis_nav:') { ?>
                    <?php if($comiis_app_switch['comiis_leftnv'] != 2) { ?> 
                        <?php if($comiis_isweixin == 1 && $comiis_app_switch['comiis_leftnv'] == 1) { ?> 
                            <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="f_f comiis_leftnv_top_key"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                        <?php } elseif($comiis_app_switch['comiis_leftnv'] == 0) { ?> 
                            <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> onclick="comiis_leftnv();" class="f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                        <?php } ?>
                    <?php } ?>
                <?php } elseif($temp['url'] == ':comiis_home:') { ?>
                    <?php if($comiis_data['default'] != 1) { ?>
                    <a href="./"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                <?php } elseif($temp['url'] == ':comiis_showbtn:') { ?>
                <?php } elseif($temp['url'] == ':comiis_msn:') { ?>
                    <?php if($_G['uid'] && ($_G['member']['newpm'] || $_G['member']['newprompt']) && $comiis_app_switch['comiis_showpm'] == 2 && $comiis_app_switch['comiis_scrolltop_fenli'] == 0) { ?>
                        <a href="home.php?mod=space&amp;do=notice"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_a <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span><span class="comiis_rpm<?php if(!$temp['name']) { ?>a<?php } ?> bg_del"></span></a>
                    <?php } ?>
                <?php } elseif($temp['url'] == ':comiis_albumbtn:') { ?>
                    <?php if($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $comiis_app_switch['comiis_scrolltop_fenli'] == 0) { ?>
                        <a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=upload<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                <?php } elseif($temp['url'] == ':comiis_postbtn:') { ?>
                    <?php if((($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay' && $comiis_app_switch['comiis_list_fpost'] == 2) || ($_G['basescript'] == 'group' && CURMODULE == 'forumdisplay')) && $comiis_app_switch['comiis_scrolltop_fenli'] == 0) { ?>
                        <?php if($comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) { ?>
                            <a href="<?php if(!(!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>#comiis_post_type<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if($_G['uid']) { ?>popup <?php } if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                        <?php } else { ?>
                            <a href="<?php if(!(!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                        <?php } ?>
                    <?php } ?>
                    <?php if($comiis_data['more']['open_post'] == 1 && $comiis_app_switch['comiis_scrolltop_fenli'] == 0) { ?>
                        <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="comiis_gobtna<?php if(!$temp['bgcolor']) { ?> bg_0<?php } ?> f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                    <?php if($_G['basescript'] == 'forum' && CURMODULE == 'index' && $comiis_app_switch['comiis_scrolltop_fenli'] == 0) { ?>
                        <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="comiis_gobtna<?php if(!$temp['bgcolor']) { ?> bg_0<?php } ?> f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                    <?php if($_G['basescript'] == 'portal' && CURMODULE == 'list' && $comiis_app_switch['comiis_scrolltop_fenli'] == 0) { ?>
                        <?php if(($_G['group']['allowpostarticle'] || $_G['group']['allowmanagearticle'] || $categoryperm[$catid]['allowmanage'] || $categoryperm[$catid]['allowpublish']) && empty($cat['disallowpublish'])) { ?>
                        <a href="<?php if($_G['uid']) { ?>portal.php?mod=portalcp&ac=article&catid=<?php echo $cat['catid'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                        <?php } ?>
                    <?php } ?>
                    <?php if($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog' && !$_GET['id'] && $comiis_app_switch['comiis_scrolltop_fenli'] == 0) { ?>
                        <a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=blog<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                <?php } else { ?>
                    <a href="<?php echo $temp['url'];?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        </div>
    <?php } ?>
    <?php if(count($comiis_app_nav['ynav'])) { ?>
        <?php if(is_array($comiis_app_nav['ynav'])) foreach($comiis_app_nav['ynav'] as $temp) { if($temp['url'] == ':comiis_showbtn:') { if($comiis_app_switch['comiis_scrolltop_show'] == 0) { ?>
                    <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="comiis_lrmenukey<?php if(!$temp['bgcolor']) { ?> bg_a<?php } ?> f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } ?>
            <?php } elseif($temp['url'] == ':comiis_msn:') { ?>
                <?php if($_G['uid'] && ($_G['member']['newpm'] || $_G['member']['newprompt']) && $comiis_app_switch['comiis_showpm'] == 2 && $comiis_app_switch['comiis_scrolltop_fenli'] == 1) { ?>
                    <a href="home.php?mod=space&amp;do=notice"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_a <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span><span class="comiis_rpm<?php if(!$temp['name']) { ?>a<?php } ?> bg_del"></span></a>
                <?php } ?>
            <?php } elseif($temp['url'] == ':comiis_albumbtn:') { ?>
                <?php if($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album' && $comiis_app_switch['comiis_scrolltop_fenli'] == 1) { ?>
                    <a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=upload<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } ?>
            <?php } elseif($temp['url'] == ':comiis_postbtn:') { ?>
                <?php if((($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay' && $comiis_app_switch['comiis_list_fpost'] == 2) || ($_G['basescript'] == 'group' && CURMODULE == 'forumdisplay')) && $comiis_app_switch['comiis_scrolltop_fenli'] == 1) { ?>
                    <?php if($comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) { ?>
                        <a href="<?php if(!(!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>#comiis_post_type<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if($_G['uid']) { ?>popup <?php } if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } else { ?>
                        <a href="<?php if(!(!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                <?php } ?>
                <?php if($comiis_data['more']['open_post'] && $comiis_app_switch['comiis_scrolltop_fenli'] == 1) { ?>
                    <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="comiis_gobtna<?php if(!$temp['bgcolor']) { ?> bg_0<?php } ?> f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } ?>                
                <?php if($_G['basescript'] == 'forum' && CURMODULE == 'index' && $comiis_app_switch['comiis_scrolltop_fenli'] == 1) { ?>
                    <a href="javascript:;"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="comiis_gobtna<?php if(!$temp['bgcolor']) { ?> bg_0<?php } ?> f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } ?>
                <?php if($_G['basescript'] == 'portal' && CURMODULE == 'list' && $comiis_app_switch['comiis_scrolltop_fenli'] == 1) { ?>
                    <?php if(($_G['group']['allowpostarticle'] || $_G['group']['allowmanagearticle'] || $categoryperm[$catid]['allowmanage'] || $categoryperm[$catid]['allowpublish']) && empty($cat['disallowpublish'])) { ?>
                    <a href="<?php if($_G['uid']) { ?>portal.php?mod=portalcp&ac=article&catid=<?php echo $cat['catid'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                    <?php } ?>
                <?php } ?>
                <?php if($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog'  && !$_GET['id'] && $comiis_app_switch['comiis_scrolltop_fenli'] == 1) { ?>
                    <a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=blog<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> class="<?php if(!$temp['bgcolor']) { ?>bg_0 <?php } ?>f_f"<?php if($temp['bgcolor']) { ?> style="background:<?php echo $temp['bgcolor'];?>;"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotxt<?php } ?>">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e632<?php } ?>;</i><span><?php if($temp['name']) { ?><em><?php echo $temp['name'];?></em><?php } ?></span></a>
                <?php } ?>
                <?php if($comiis_isweixin == 1 && $_GET['id'] == 'comiis_app_activity') { ?>
                    <?php if($comiis_app_activity_set['post_url']) { ?>
                    <a href="<?php echo $comiis_app_activity_set['post_url'];?>" title="<?php echo $comiis_lang['post24'];?>" class="bg_0 f_f"><i class="comiis_font">&#xe62d;</i><span><em><?php echo $comiis_lang['post24'];?></em></span></a>
                    <?php } ?>
                <?php } } } } if($comiis_isweixin == 1 || $_G['comiis_close_header'] == 0) { ?>
    <script>
    $(document).on('click', '.comiis_isweixin_key', function() {
    $('#comiis_head').toggleClass("comiis_head_hidden");
    });
    </script>
<?php } if($comiis_app_switch['comiis_scrolltop_show'] == 0) { ?>
<script>
$(".comiis_lrmenukey").on('click', function(e) {
$('.comiis_lrmenu').toggleClass('comiis_lrshow');
});
</script>
<?php } ?>
</div>
<?php } if($comiis_closefooter == 1) { $comiis_foot = 'no';$comiis_open_footer = 0;?><?php } if(($comiis_foot != 'no' || $comiis_open_footer) && count($comiis_app_nav['mnav']) || (($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread')) { ?>
<div class="comiis_foot_height"></div>
<?php } if(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread') { comiis_load('jj74PQM0ehoQfoM9EU', 'comiis_thead_fav,comiis_my_recommend,comiis_isweixin');?><?php } else { ?>
<div id="comiis_foot_box" class="sdxt">
<?php if(($comiis_foot != 'no' || $comiis_open_footer) && count($comiis_app_nav['mnav'])) { if($comiis_close_footermenu != 1) { ?>
<div id="comiis_foot_memu" class="comiis_foot_memu bg_foot b_t">
<ul class="comiis_flex"><?php $nn=0;?><?php if(is_array($comiis_app_nav['mnav'])) foreach($comiis_app_nav['mnav'] as $temp) { $nn++;?><?php if($nn < 7) { if($temp['url'] == ':comiisbig:') { ?>
<li class="flex comiis_fbigbtn"><a href="javascript:;" class="comiis_openfootbox" title="<?php echo $temp['name'];?>" icon1="&#x<?php echo $temp['icon'];?>;" icon2="&#x<?php echo $temp['bgcolor'];?>;"><em class="bg_foot b_ok"></em><span class="bg_foot"><i class="comiis_font foot_btn bg_foot_btn f_f">&#x<?php echo $temp['icon'];?>;</i></span></a></li>
<?php } elseif($temp['url'] == ':comiis:') { ?>
<li class="flex"><a href="javascript:;" class="comiis_openfootbox" title="<?php echo $temp['name'];?>" icon1="&#x<?php echo $temp['icon'];?>;" icon2="&#x<?php echo $temp['bgcolor'];?>;"><i class="comiis_font foot_btn bg_foot_btn f_f">&#x<?php echo $temp['icon'];?>;</i></a></li>
<?php } elseif($temp['url'] == '#comiis_post') { ?>
<li class="flex"><a href="javascript:;" class="comiis_openfootboxg f_foot"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?> icon1="&#x<?php echo $temp['icon'];?>;" icon2="&#x<?php echo $temp['bgcolor'];?>;"><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotit<?php } ?>">&#x<?php echo $temp['icon'];?>;</i><?php if($temp['name']) { ?><span><?php echo $temp['name'];?></span><?php } ?></a></li>
<?php } elseif($temp['url'] == 'home.php?mod=space&do=profile&mycenter=1') { ?>
<li class="flex f_<?php if($temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2) { ?>foot_on<?php } else { ?>foot<?php } ?>"><a href="<?php echo $temp['url'];?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotit<?php } ?>">&#x<?php if($temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2) { ?><?php echo $temp['bgcolor'];?><?php } else { ?><?php echo $temp['icon'];?><?php } ?>;<?php if($_G['uid'] && ($_G['member']['newpm'] || $_G['member']['newprompt'])) { ?><span class="icon_msgs bg_del"></span><?php } ?></i><?php if($temp['name']) { ?><span><?php echo $temp['name'];?></span><?php } ?></a></li>
<?php } elseif($temp['url'] == 'home.php?mod=space&do=notice' || $temp['url'] == 'home.php?mod=space&do=notice&mobile=2') { ?>
<li class="flex f_<?php if($temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2) { ?>foot_on<?php } else { ?>foot<?php } ?>"><a href="<?php echo $temp['url'];?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotit<?php } ?>">&#x<?php if($temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2) { ?><?php echo $temp['bgcolor'];?><?php } else { ?><?php echo $temp['icon'];?><?php } ?>;<?php if($_G['uid'] && ($_G['member']['newpm'] || $_G['member']['newprompt'])) { ?><span class="icon_msgs bg_del"></span><?php } ?></i><?php if($temp['name']) { ?><span><?php echo $temp['name'];?></span><?php } ?></a></li>
<?php } else { ?>
<li class="flex f_<?php if($temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2) { ?>foot_on<?php } else { ?>foot<?php } ?>"><a href="<?php echo $temp['url'];?>"<?php if($temp['name']) { ?> title="<?php echo $temp['name'];?>"<?php } ?>><i class="comiis_font<?php if(!$temp['name']) { ?> kmnotit<?php } ?>">&#x<?php if($temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2) { ?><?php echo $temp['bgcolor'];?><?php } else { ?><?php echo $temp['icon'];?><?php } ?>;</i><?php if($temp['name']) { ?><span><?php echo $temp['name'];?></span><?php } ?></a></li>
<?php } } } ?>
</ul>
</div>
<?php } } ?>
<div class="comiis_gobtn cl">
<?php if($comiis_app_switch['comiis_fnav_date']) { ?>
<div class="comiis_gobtn_top cl">
<div class="comiis_fttime cl" id="comiis_show_datebox"></div>		
</div>
<?php } if($comiis_app_switch['comiis_fnavimgs']) { ?><?php echo $comiis_app_switch['comiis_fnavimgs'];?><?php } ?>
<a href="javascript:;" class="comiis_gobtn_close comiis_gobtna"><i class="comiis_font f_d">&#xe639;</i></a>
</div>
<div class="comiis_gobtn_box bg_f b_t cl">
<h2 class="f_c"><?php echo $comiis_app_switch['comiis_fnav_title'];?></h2>
<ul class="cl"><?php if(is_array($comiis_app_nav['fnav'])) foreach($comiis_app_nav['fnav'] as $temp) { ?><li><a href="<?php echo $temp['url'];?>"><span style="background:<?php if($temp['bgcolor']) { ?><?php echo $temp['bgcolor'];?><?php } else { ?>#FF9900<?php } ?>;"><i class="comiis_font f_f">&#x<?php if($temp['icon']) { ?><?php echo $temp['icon'];?><?php } else { ?>e651<?php } ?>;</i></span><?php echo $temp['name'];?></a></li>
<?php } ?>
</ul>
<div class="comiis_gobtn_foot cl">
</div>
</div>
</div>
<script type="text/javascript"> 
<?php if($comiis_app_switch['comiis_fnav_date']) { ?>
var sWeek = new Array(<?php echo $comiis_lang['tip223'];?>);
var dNow = new Date();
var CalendarData = new Array(100);
var madd = new Array(12);
var numString = "<?php echo $comiis_lang['tip224'];?>";
var monString = "<?php echo $comiis_lang['tip225'];?>";
var cYear, cMonth, cDay, TheDate;
CalendarData = new Array(0xA4B, 0x5164B, 0x6A5, 0x6D4, 0x415B5, 0x2B6, 0x957, 0x2092F, 0x497, 0x60C96, 0xD4A, 0xEA5, 0x50DA9, 0x5AD, 0x2B6, 0x3126E, 0x92E, 0x7192D, 0xC95, 0xD4A, 0x61B4A, 0xB55, 0x56A, 0x4155B, 0x25D, 0x92D, 0x2192B, 0xA95, 0x71695, 0x6CA, 0xB55, 0x50AB5, 0x4DA, 0xA5B, 0x30A57, 0x52B, 0x8152A, 0xE95, 0x6AA, 0x615AA, 0xAB5, 0x4B6, 0x414AE, 0xA57, 0x526, 0x31D26, 0xD95, 0x70B55, 0x56A, 0x96D, 0x5095D, 0x4AD, 0xA4D, 0x41A4D, 0xD25, 0x81AA5, 0xB54, 0xB6A, 0x612DA, 0x95B, 0x49B, 0x41497, 0xA4B, 0xA164B, 0x6A5, 0x6D4, 0x615B4, 0xAB6, 0x957, 0x5092F, 0x497, 0x64B, 0x30D4A, 0xEA5, 0x80D65, 0x5AC, 0xAB6, 0x5126D, 0x92E, 0xC96, 0x41A95, 0xD4A, 0xDA5, 0x20B55, 0x56A, 0x7155B, 0x25D, 0x92D, 0x5192B, 0xA95, 0xB4A, 0x416AA, 0xAD5, 0x90AB5, 0x4BA, 0xA5B, 0x60A57, 0x52B, 0xA93, 0x40E95);
madd[0] = 0;
madd[1] = 31;
madd[2] = 59;
madd[3] = 90;
madd[4] = 120;
madd[5] = 151;
madd[6] = 181;
madd[7] = 212;
madd[8] = 243;
madd[9] = 273;
madd[10] = 304;
madd[11] = 334;
function GetBit(m, n) {
    return (m >> n) & 1
}
function e2c() {
    TheDate = (arguments.length != 3) ? new Date() : new Date(arguments[0], arguments[1], arguments[2]);
    var total, m, n, k;
    var isEnd = false;
    var tmp = TheDate.getFullYear();
    total = (tmp - 1921) * 365 + Math.floor((tmp - 1921) / 4) + madd[TheDate.getMonth()] + TheDate.getDate() - 38;
    if (TheDate.getYear() % 4 == 0 && TheDate.getMonth() > 1) {
        total++
    }
    for (m = 0;; m++) {
        k = (CalendarData[m] < 0xfff) ? 11 : 12;
        for (n = k; n >= 0; n--) {
            if (total <= 29 + GetBit(CalendarData[m], n)) {
                isEnd = true;
                break
            }
            total = total - 29 - GetBit(CalendarData[m], n)
        }
        if (isEnd) break
    }
    cYear = 1921 + m;
    cMonth = k - n + 1;
    cDay = total;
    if (k == 12) {
        if (cMonth == Math.floor(CalendarData[m] / 0x10000) + 1) {
            cMonth = 1 - cMonth
        }
        if (cMonth > Math.floor(CalendarData[m] / 0x10000) + 1) {
            cMonth--
        }
    }
}
function GetcDateString() {
    var tmp = '<h2 class="f_f">';
    if (cMonth < 1) {
        tmp += "<?php echo $comiis_lang['tip226'];?>";
        tmp += monString.charAt( - cMonth - 1)
    } else {
        tmp += monString.charAt(cMonth - 1)
    }
    tmp += '<?php echo $comiis_lang['tip227'];?></h2><p class="bg_f f_c">';
    tmp += (cDay < 11) ? "<?php echo $comiis_lang['tip228'];?>": ((cDay < 20) ? "<?php echo $comiis_lang['tip229'];?>": ((cDay < 30) ? "<?php echo $comiis_lang['tip230'];?>": "<?php echo $comiis_lang['tip234'];?>"));
    if (cDay == 20) {
    tmp += "<?php echo $comiis_lang['tip229'];?>";
    }
    if (cDay % 10 != 0 || cDay == 10) {
        tmp += numString.charAt((cDay - 1) % 10)
    }
    return tmp + '</p>'
}
function GetLunarDay(solarYear, solarMonth, solarDay) {
    if (solarYear < 1921 || solarYear > 2020) {
        return ""
    } else {
        solarMonth = (parseInt(solarMonth) > 0) ? (solarMonth - 1) : 11;
        e2c(solarYear, solarMonth, solarDay);
        return GetcDateString()
    }
}
function comiis_timesadd0(obj){
if(obj<10){
return "0" +""+ obj;
}else{
return obj;
}
}
var D = new Date();
var yy = D.getFullYear();
var mm = D.getMonth() + 1;
var dd = D.getDate();
var ww = D.getDay();
var ss = parseInt(D.getTime() / 1000);
function getFullYear(d) {
    yr = d.getYear();
    if (yr < 1000) yr += 1900;
    return yr
}
$('#comiis_show_datebox').html('<div class="z fttime_rq f_b">' + comiis_timesadd0(dNow.getDate()) + '</div><div class="z fttime_xq"><span class="f_b"><?php echo $comiis_lang['tip231'];?>' + sWeek[dNow.getDay()] + '</span><em class="f_d">/</em><span class="f_b">' + getFullYear(dNow) + '<?php echo $comiis_lang['tip232'];?>' + comiis_timesadd0(dNow.getMonth() + 1) + '<?php echo $comiis_lang['tip233'];?></span></div><div class="z fttime_nl bg_0">' + GetLunarDay(yy, mm, dd) + '</div>');
<?php } ?>
$(document).on('click', '.comiis_openfootbox,.comiis_openfootboxg,.comiis_gobtna', function() {
if($('#comiis_foot_box').hasClass('comiis_footer_showbox')){
$('#comiis_foot_memu').css('z-index','101');
$('.comiis_openfootboxg i').text($('.comiis_openfootboxg').attr('icon1')).removeClass('f_0');
$('.comiis_openfootbox i').text($('.comiis_openfootbox').attr('icon1'));
$('#comiis_foot_box').removeClass('comiis_footer_showbox');
Comiis_Touch_on = 1;
}else{
Comiis_Touch_on = 0;
$('.comiis_openfootboxg i').text($('.comiis_openfootboxg').attr('icon2')).addClass('f_0');
$('.comiis_openfootbox i').text($('.comiis_openfootbox').attr('icon2'));
$('#comiis_foot_box').addClass('comiis_footer_showbox');
$('#comiis_foot_memu').css('z-index','211');
}
});
</script><?php loadcache('forums');?><?php } comiis_load('g7J1y0H7T0j12HU32t', '');?><div id="comiis_bgbox" style="display:none;"></div>
</div><?php $comiis_wx_title_box = str_replace("&nbsp;", '', ($comiis_app_wx_share['title'] ? strip_tags($comiis_app_wx_share['title']) : strip_tags($navtitle)));;
$comiis_wx_description_box = str_replace("&nbsp;", '', ($comiis_app_wx_share['desc'] ? strip_tags($comiis_app_wx_share['desc']) : ($metadescription ? strip_tags($metadescription) : ($comiis_app_switch['comiis_sitename'] ? $comiis_app_switch['comiis_sitename'] : $_G['setting']['sitename']))));?><div id="comiis_wx_title_box" style="display:none;"><?php echo $comiis_wx_title_box;?></div>
<div id="comiis_wx_description_box" style="display:none;"><?php echo $comiis_wx_description_box;?></div>
<?php if($comiis_app_switch['comiis_share_html']) { ?>
<?php echo $comiis_app_switch['comiis_share_html'];?>
<?php } ?>
<script>
<?php if($comiis_app_switch['comiis_loadimg']) { ?>
$(document).ready(function() {
$("img.comiis_loadimages").lazyload();
});
<?php } ?>
$(document).on('click', '.comiis_openrebox', function() {
<?php if($_G['uid']) { ?>
comiis_openrebox(1);
<?php } else { if((!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>
popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');
<?php } else { ?>	
comiis_openrebox(1);
<?php } } ?>
return false;
});
$(document).ready(function(){
var comiis_wx_title = $('#comiis_wx_title_box').html();
var comiis_wx_description = $('#comiis_wx_description_box').html();
<?php if($comiis_app_wx_share['img']) { ?>
var comiis_wx_imgUrl = "<?php echo $_G['siteurl'];?><?php echo $comiis_app_wx_share['img'];?>";
<?php } else { ?>
var comiis_wx_img_objs;
<?php if(($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread') { ?>
var comiis_wx_img_obj = $(".comiis_messages img[comiis_loadimages*='/attachment/'],.comiis_messages img[comiis_loadimages*='forum.php?mod=image'],.comiis_messages img[src*='/attachment/'],.comiis_messages img[src*='forum.php?mod=image']");
<?php } elseif(($_G['basescript'] == 'portal') && CURMODULE == 'view' || $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog' && $_GET['id']) { ?>
var comiis_wx_img_obj = $(".view_body img[comiis_loadimages*='/attachment/'],.view_body img[comiis_loadimages*='forum.php?mod=image'],.view_body img[src*='/attachment/'],.view_body img[src*='forum.php?mod=image']");
<?php } else { ?>
var comiis_wx_img_obj = $(".comiis_bodybox img[comiis_loadimages*='/attachment/'],.comiis_bodybox img[comiis_loadimages*='forum.php?mod=image'],.comiis_bodybox img[src*='/attachment/'],.comiis_bodybox img[src*='forum.php?mod=image']");
<?php } ?>
for(var i = 0; i < comiis_wx_img_obj.length; i++){
if(comiis_wx_img_obj[i].width >= 60 && comiis_wx_img_obj[i].height >= 60){
comiis_wx_img_objs = comiis_wx_img_obj[i];
break;
}
}
var comiis_wx_img = $(comiis_wx_img_objs).attr('comiis_loadimages');
if(typeof(comiis_wx_img)=="undefined"){
comiis_wx_img = $(comiis_wx_img_objs).attr('src');
if(typeof(comiis_wx_img)=="undefined"){
comiis_wx_img = '<?php echo $comiis_app_switch['comiis_wximg'];?>';
}
}
var comiis_wx_imgUrl = ((comiis_wx_img.indexOf("ttp://") > 0 || comiis_wx_img.indexOf("ttps://") > 0) ? '' : "<?php echo $_G['siteurl'];?>") + comiis_wx_img;
<?php } ?>
var comiis_wx_url = window.location.href.replace('&mobile=2', '');
<?php if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
setTimeout(function(){
$.ajax({
type:'GET',
url: 'home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>' ,
dataType:'xml',
});
}, 1000);
<?php } ?>
});
</script>
<?php if($comiis_app_switch['comiis_foot_backico'] < 2 && $comiis_is_new_url == 1) { ?>
<script>$('.backico').html('<li class="backico" style="margin-left:3px;"><a href="./" class="b_r"><i class="comiis_font f_0" style="line-height:24px;">&#xe662;</i></a></li>');</script>
<?php } if($comiis_isweixin) { ?>
<script src="https://res.wx.qq.com/open/js/jweixin-1.3.2.js" type="text/javascript" type="text/javascript"></script>
<?php if($comiis_app_switch['comiis_wxappid'] && $comiis_app_switch['comiis_wxappsecret']) { include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/jssdk.php';?><script>
$(document).ready(function() {
wx.config({
debug: 0,
appId: '<?php echo $comiis_signPackage["appId"];?>',
timestamp: '<?php echo $comiis_signPackage["timestamp"];?>',
nonceStr: '<?php echo $comiis_signPackage["nonceStr"];?>',
signature: '<?php echo $comiis_signPackage["signature"];?>',
jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'onMenuShareQZone', 'getLocation', 'openLocation']
});
wx.ready(function () {
var comiis_wx_share_data = {
title: comiis_wx_title,
desc: comiis_wx_description,
imgUrl: comiis_wx_imgUrl,
link: comiis_wx_url
}
wx.onMenuShareAppMessage(comiis_wx_share_data);
wx.onMenuShareQQ(comiis_wx_share_data);
wx.onMenuShareWeibo(comiis_wx_share_data);
wx.onMenuShareQZone(comiis_wx_share_data);
wx.onMenuShareTimeline(comiis_wx_share_data);
});
});
</script>
<?php } } ?>
</body>
</html><?php global $comiis_fsimage;
$content = ob_get_contents();
ob_end_clean();
$content = output_replace($content);
$content = str_replace(array('http://'.$_G['setting']['domain']['app']['default'].'/'), array($_G['siteurl']), $content);
$_G['gzipcompress'] ? ob_start('ob_gzhandler') : ob_start();
echo $content;
updatesession();
(function_exists("comiis_replace_https") ? comiis_replace_https() : "");output();?>