<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:06
//Identify: b4104e5d949838ddda76c50a5fa22ad6

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_G['comiis_new'] <= 1) { ?>
<div class="comiis_fmenu" id="comiis_fpostmore" style="display:none;z-index:200;">
<div class="comiis_fmenubox<?php if($comiis_app_switch['comiis_post_nav'] == 1) { ?> bg_e<?php } else { ?> bg_f<?php } ?>">
<div class="comiis_gosx_title bg_f b_b cl"><span class="y"><i class="comiis_font f_d" onclick="comiis_fmenu('#comiis_fpostmore');">&#xe639</i></span><?php echo $comiis_lang['post36'];?></div>
<div class="comiis_over_box comiis_wzpost">
<?php if($comiis_app_switch['comiis_post_nav'] == 1) { ?>
<ul class="comiis_post_nav"><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $temp) { if($temp['status'] == 1 && ($temp['fup'] == 0 ||$_G['cache']['forums'][$temp['fup']]['status'] == 1)) { if(($temp['type'] == 'forum' || $temp['type'] == 'sub') && (!$temp['viewperm'] || ($temp['viewperm'] && forumperm($temp['viewperm'])) || strstr($temp['users'], "\t".$_G['uid']."\t"))) { ?>
<li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $temp['fid'];?>" class="bg_f b_ok"><?php echo $temp['name'];?></a></li>
<?php } } } ?>
</ul>
<?php } elseif($comiis_app_switch['comiis_post_nav'] == 0) { ?>
<ul><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $temp) { if($temp['status'] == 1 && ($temp['fup'] == 0 ||$_G['cache']['forums'][$temp['fup']]['status'] == 1)) { if($temp['type'] == 'group') { ?>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $temp['name'];?> <span class="comiis_rfid f_d">GID: <?php echo $temp['fid'];?></span></li>
<?php } elseif($temp['type'] == 'forum' && (!$temp['viewperm'] || ($temp['viewperm'] && forumperm($temp['viewperm'])) || strstr($temp['users'], "\t".$_G['uid']."\t"))) { ?>
<li>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $temp['fid'];?>" class="comiis_styli comiis_flex b_b">
<div class="flex"><?php echo $temp['name'];?><span class="comiis_rfid f_d y">fid:<?php echo $temp['fid'];?></span></div>
<div class="styli_r"><i class="comiis_font f_d">&#xe60c</i></div>
</a>
</li>
<?php } elseif($temp['type'] == 'sub' && (!$temp['viewperm'] || ($temp['viewperm'] && forumperm($temp['viewperm'])) || strstr($temp['users'], "\t".$_G['uid']."\t"))) { ?>
<li>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $temp['fid'];?>" class="comiis_styli comiis_flex b_b">
<div class="flex comiis_lp15"><span class="f_c"><?php echo $temp['name'];?></span><span class="comiis_rfid f_d y">fid:<?php echo $temp['fid'];?></span></div>
<div class="styli_r"><i class="comiis_font f_d">&#xe60c</i></div>
</a>
</li>
<?php } } } ?>
</ul>
<?php } ?>
</div>
</div>
</div>
<?php } else { if($comiis_app_switch['comiis_post_nav'] != 2) { ?>
    <?php $comiis_readfids = array();
    foreach($_G['cache']['forums'] as $temp) {
        if($temp['status'] == 1 && ($temp['type'] == 'forum' || $temp['type'] == 'sub')) {
            $comiis_readfids[] = $temp['fid'];
        }
    }
    $comiis_forum_icon = DB::fetch_all('SELECT fid,icon FROM %t WHERE fid IN ('.dimplode($comiis_readfids).')', array('forum_forumfield'), 'fid');
foreach($comiis_forum_icon as $k => $temp) {
$parse = parse_url($temp['icon']);
if(isset($parse['host'])) {
$comiis_forum_icon[$k]['icon'] = $temp['icon'];
} else {
$comiis_forum_icon[$k]['icon'] = $temp['icon'] ? $_G['setting']['attachurl'].'common/'.$temp['icon'] : '';
}		
}?><?php } ?>
<div class="comiis_fmenu" id="comiis_fpostmore" style="display:none;z-index:200;">
<div class="comiis_fmenubox bg_f">
<div class="comiis_gosx_title bg_e b_b cl"><span class="y"><i class="comiis_font f_d" onclick="comiis_fmenu('#comiis_fpostmore');">&#xe639</i></span><?php echo $comiis_lang['post36'];?></div>
<div class="comiis_over_box comiis_wzpost">
<?php if($comiis_app_switch['comiis_post_nav'] == 2) { ?>
<ul class="comiis_post_navs"><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $temp) { if($temp['status'] == 1 && ($temp['fup'] == 0 ||$_G['cache']['forums'][$temp['fup']]['status'] == 1)) { if(($temp['type'] == 'forum' || $temp['type'] == 'sub') && (!$temp['viewperm'] || ($temp['viewperm'] && forumperm($temp['viewperm'])) || strstr($temp['users'], "\t".$_G['uid']."\t"))) { ?>
<li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $temp['fid'];?>" class="bg_e b_ok"><?php echo $temp['name'];?></a></li>
<?php } } } ?>
</ul>
<?php } elseif($comiis_app_switch['comiis_post_nav'] == 1) { ?>
<ul class="comiis_post_nav"><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $temp) { if($temp['status'] == 1 && ($temp['fup'] == 0 ||$_G['cache']['forums'][$temp['fup']]['status'] == 1)) { if($temp['type'] == 'group') { ?>
<li class="kmtit f_0"><?php echo $temp['name'];?></li>
<?php } elseif(($temp['type'] == 'forum' || $temp['type'] == 'sub') && (!$temp['viewperm'] || ($temp['viewperm'] && forumperm($temp['viewperm'])) || strstr($temp['users'], "\t".$_G['uid']."\t"))) { ?>
<li>
                            <a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $temp['fid'];?>" class="bg_e b_ok">
                            <?php if($comiis_forum_icon[$temp['fid']]['icon']) { ?>
                                <img src="<?php echo $comiis_forum_icon[$temp['fid']]['icon'];?>" alt="<?php echo $temp['name'];?>" />
                            <?php } else { ?>
                                <img src="./template/comiis_app/comiis/img/forum.png" alt="<?php echo $temp['name'];?>" />
                            <?php } ?>
                            <?php echo $temp['name'];?>
                            </a>
</li>
<?php } } } ?>
</ul>
<?php } elseif($comiis_app_switch['comiis_post_nav'] == 0) { ?>
<div class="comiis_bbslists bg_f cl" style="height:100%;">
                <div class="comiis_bbslists_gid bg_e cl" style="height:100%;">
                    <ul><?php $nn = 0;$comiis_sublistff = array();?><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $temp) { if($temp['type'] == 'group' && $temp['status'] == 1) { $nn++;?><li class="comiis_fxpostlistkey <?php if($nn == 1) { ?>bg_f <?php } ?>b_b comiis_fxpostlist_<?php echo $temp['fid'];?>" fid="<?php echo $temp['fid'];?>"><span class="bg_0"></span><a href="javascript:;"><?php echo $temp['name'];?></a></li>
<?php } if($temp['type'] == 'sub' && $temp['status'] == 1 && (!$temp['viewperm'] || ($temp['viewperm'] && forumperm($temp['viewperm'])) || strstr($temp['users'], "\t".$_G['uid']."\t"))) { $comiis_sublistff[$temp['fup']] .= '<li><a href="forum.php?mod=post&amp;action=newthread&amp;fid='.$temp['fid'].'" class="bg_e b_ok">'.($comiis_forum_icon[$temp['fid']]['icon'] ? '<img src="'.$comiis_forum_icon[$temp['fid']]['icon'].'" alt="'.$temp[name].'" />' : '<img src="./template/comiis_app/comiis/img/forum.png" alt="'.$temp[name].'" />').$temp[name].'</a></li>';?><?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="comiis_bbslists_fid cl" style="height:100%;"><?php $nn = 0;?>                <?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $temp) { if($temp['type'] == 'group' && $temp['status'] == 1) { $nn++;?><ul class="comiis_fxpostlistbox_<?php echo $temp['fid'];?>"<?php if($nn > 1) { ?> style="display:none"<?php } ?>><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $temp1) { if($temp1['fup'] == $temp['fid'] && $temp1['type'] == 'forum' && $temp1['status'] == 1 && (!$temp1['viewperm'] || ($temp1['viewperm'] && forumperm($temp1['viewperm'])) || strstr($temp1['users'], "\t".$_G['uid']."\t"))) { ?>
<li class="b_b">
                                    <i class="comiis_font f_e y">&#xe60c</i>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $temp1['fid'];?>" class="bbslist_ico"><?php if($comiis_forum_icon[$temp1['fid']]['icon']) { ?><img class="comiis_noloadimage" src="<?php echo $comiis_forum_icon[$temp1['fid']]['icon'];?>" alt="<?php echo $temp1['name'];?>" /><?php } else { ?><img class="comiis_noloadimage" src="./template/comiis_app/comiis/img/forum.png" alt="<?php echo $temp1['name'];?>" /><?php } ?>	</a>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $temp1['fid'];?>" class="post_tit"><em><?php echo $temp1['name'];?></em></a>
</li>
<?php if($comiis_sublistff[$temp1['fid']]) { ?><div class="comiis_post_nav b_b"><?php echo $comiis_sublistff[$temp1['fid']];?></div><?php } } } ?>
</ul>
<?php } ?>
                <?php } ?>
                </div>
            </div>
            <script>
            $('.comiis_fxpostlistkey').on('click', function() {
var key_fid = $(this).attr('fid');
$('.comiis_fxpostlistkey').removeClass('bg_f');
$(this).addClass('bg_f');
$('.comiis_bbslists_fid ul').css('display','none');
$('.comiis_bbslists_fid ul.comiis_fxpostlistbox_'+key_fid).css('display','block');
            });
            </script>
<?php } ?>
</div>
</div>
</div>
<?php } ?>