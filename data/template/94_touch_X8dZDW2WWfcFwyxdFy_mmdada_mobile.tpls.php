<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:33
//Identify: 2c40d3fb985d25b1e76374751e0d2a98

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($post['first'] && $comiis_app_switch['comiis_view_header'] == 3) { ?>
<div class="comiis_view_header3 bg_f cl">  
  <div class="comiis_postli_top bg_f b_b">
<?php if($_G['forum_threadstamp'] && $comiis_app_switch['comiis_view_header'] != 1) { ?>
<div class="comiis_threadstamp<?php if($comiis_app_switch['comiis_view_header'] == 2) { ?>_v2<?php } ?>"><img src="<?php echo STATICURL;?>image/stamp/<?php echo $_G['forum_threadstamp']['url'];?>" /></div>
<?php } ?>
    <a href="<?php if(!$post['authorid'] || $post['anonymous']) { ?>javascript:;<?php } else { ?>home.php?mod=space&uid=<?php echo $post['authorid'];?>&do=profile<?php } ?>" class="postli_top_box">
      <i class="comiis_font f_d yico">&#xe60c</i>
      <span class="postli_top_tximg bg_e"><img src="<?php if(!$post['authorid'] || $post['anonymous']) { ?><?php echo avatar(0, small, true);?><?php } else { ?><?php echo avatar($post[authorid], small, true);?><?php } ?>" class="top_tximg"></span>
      <h2<?php if(!$post['spacenote']) { ?> style="margin-top:8px;"<?php } ?>>
        <?php if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
          <em class="top_user f_b"><?php echo $post['author'];?></em>				
          <?php if($comiis_app_switch['comiis_view_gender'] == 1) { if($post['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($post['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } } ?>
          <?php if($post['authortitle']) { ?><span class="top_lev bg_a f_f"<?php if($comiis_app_switch['comiis_view_lev_color'] != 0 && $_G['cache']['usergroups'][$post['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$post['groupid']]['color'];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_view_lev'] == 1) { if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $post['stars'];?> <?php } echo strip_tags($_G['cache']['usergroups'][$post['groupid']]['grouptitle']);; ?></span><?php } ?>
        <?php } else { ?>
          <?php if(!$post['authorid']) { ?>
          <em class="top_user f_b"><?php echo $comiis_lang['guest'];?> <em class="f_d"><?php echo $post['useip'];?><?php if($post['port']) { ?>:<?php echo $post['port'];?><?php } ?></em></em>
          <?php } elseif($post['authorid'] && $post['username'] && $post['anonymous']) { ?>
          <?php if($_G['forum']['ismoderator']) { ?><em class="top_user f_b"><?php echo $comiis_lang['anonymous'];?></em><?php } else { ?><em class="top_user f_b"><?php echo $comiis_lang['anonymous'];?></em><?php } ?>
          <?php } else { ?>
          <em class="top_user f_b"><?php echo $post['author'];?></em><em class="f_b z"> <?php echo $comiis_lang['member_deleted'];?></em>
          <?php } ?>
        <?php } ?>
      </h2>
      <?php if($post['spacenote']) { ?><div class="comiis_postli_topxq f_d"><?php echo $post['spacenote'];?></div><?php } ?>
</a>
  </div>
  <?php if($comiis_app_switch['comiis_view_zntit'] == 1 && $comiis_isnotitle == 1) { ?>  
  <?php } else { ?>
  <div class="comiis_viewtit mt5 cl">
    <?php if($_G['comiis_new'] <= 1) { ?>
        <h2>
          <?php if($post['warned']) { ?><span class="top_jg bg_del f_f"><?php echo $comiis_lang['warn_get'];?></span><?php } ?>
          <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="top_jh bg_0 f_f"><?php echo $comiis_lang['view2'];?></span><?php } ?>
          <?php if($thread['digest'] > 0 && $filter != 'digest') { ?><span class="top_jh bg_c f_f"><?php echo $comiis_lang['view1'];?></span><?php } ?>
          <?php if($thread['icon'] >= 0 && $comiis_app_switch['comiis_view_titico'] != 1) { ?><span class="top_jh comiis_xifont f_a"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } ?>
          <?php echo $_G['forum_thread']['subject'];?>
          <?php if($_G['forum_thread']['displayorder'] == -2) { ?> <span class="f_c">(<?php echo $comiis_lang['moderating'];?>)</span>
          <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?> <span class="f_c">(<?php echo $comiis_lang['have_ignored'];?>)</span>
          <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?> <span class="f_c">(<?php echo $comiis_lang['draft'];?>)</span>
          <?php } ?>
        </h2>
    <?php } else { ?>
        <h2>
            <?php if($comiis_app_switch['comiis_view_typeid'] == 1) { ?>
                <?php if($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) { ?>
                    <?php if(!IS_ROBOT && ($_G['forum']['threadtypes']['listable'] || $_G['forum']['status'] == 3)) { ?>
                        <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $_G['forum_thread']['typeid'];?>" class="f16 f_ok">[<?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?>]</a> 
                    <?php } else { ?>
                        <span class="f16 f_ok">[<?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?>]</span> 
                    <?php } ?>
                <?php } ?>
                <?php if($threadsorts && $_G['forum_thread']['sortid']) { ?>
                    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?>" class="f16 f_ok">[<?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?>]</a> 
                <?php } ?>
            <?php } ?>
            <?php echo $_G['forum_thread']['subject'];?>
        </h2>
    <?php } ?>
  </div>
  <?php } ?>
  <div class="comiis_view_header1<?php if($comiis_app_switch['comiis_view_zntit'] == 1 && $comiis_isnotitle == 1) { ?> mt10<?php } ?>">
    <?php if($_G['comiis_new'] > 1) { ?>
        <?php if($post['warned']) { ?><span class="top_jh bg_del f_f"><?php echo $comiis_lang['warn_get'];?></span><?php } ?>
        <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="top_jh bg_0 f_f"><?php echo $comiis_lang['view41'];?></span><?php } ?>
        <?php if($thread['digest'] > 0 && $filter != 'digest') { ?><span class="top_jh bg_c f_f"><?php echo $comiis_lang['view42'];?></span><?php } ?>
        <?php if($thread['icon'] >= 0 && $comiis_app_switch['comiis_view_titico'] != 1) { ?><span class="top_jh comiis_xifont f_a"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } ?>
        <?php if($_G['forum_thread']['displayorder'] == -2) { ?>
            <span class="top_jh bg_a f_f"><?php echo $comiis_lang['moderating'];?></span>
        <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?>
            <span class="top_jh bg_b f_c"><?php echo $comiis_lang['have_ignored'];?></span>
        <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?>
            <span class="top_jh bg_a f_f"><?php echo $comiis_lang['draft'];?></span>
        <?php } ?>
    <?php } ?>
    <span class="f_c"><?php echo dgmdate($post['dbdateline'], 'u', '9999', 'm-d h:i');; ?></span><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>" class="header1_topl b_ok b_0 f_0"><?php echo $_G['forum']['name'];?></a>
  </div>
</div>
<?php } ?>