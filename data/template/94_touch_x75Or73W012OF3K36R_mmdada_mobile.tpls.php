<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 18:06
//Identify: 266ef0234f96bb73e78406b3bc9dd35b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(!$_GET['inajax']) { ?><div class="styli_h10 b_b cl"></div><?php } ?>
<div class="comiis_forumlist mb0 cl">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?><li class="forumlist_li comiis_wzlists bg_f b_b comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
<div class="<?php if(!$comiis_pic_list[$thread['tid']]['num']) { ?>wzlist_noimg<?php } elseif($comiis_pic_list[$thread['tid']]['num'] < 3) { ?>wzlist_one<?php } else { ?>wzlist_imgs<?php } ?>">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
<?php if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 1 || $comiis_pic_list[$thread['tid']]['num'] == 2)) { ?>
<div class="wzlist_imga"><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($comiis_pic_list[$thread['tid']]['aid']['0'], '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>></div>
<?php } } if($thread['attachment'] == 2 && $comiis_pic_list[$thread['tid']]['num'] >= 3) { ?>
<h2 <?php echo $thread['highlight'];?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?><span class="bg_0 f_f"><?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></h2>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) echo $_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key];?>
<?php if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?>
<div class="listimgs">
<ul><?php if(is_array($comiis_pic_list[$thread['tid']]['aid'])) foreach($comiis_pic_list[$thread['tid']]['aid'] as $temp) { ?><li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>></li>
<?php } ?>
</ul>
</div>
<?php } } else { ?>
<div class="wzlist_info<?php if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { if($thread['attachment'] == 2) { ?> wzlist_infoa<?php } else { ?> wzlist_infob<?php } } ?>">
<h2 <?php echo $thread['highlight'];?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] >= 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?><span class="bg_0 f_f"><?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></h2>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) echo $_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key];?>
</div>
<?php } ?>						
<div class="wzlist_bottom<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?> kmvideo<?php } ?> f_d"><em class="y"><?php echo $thread['views'];?><?php echo $comiis_lang['view47'];?></em><?php if(!($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay') && $_G['basescript'] != 'group') { if($_G['cache']['forums'][$thread['fid']]['name']) { ?><span>#<?php echo $_G['cache']['forums'][$thread['fid']]['name'];?></span><?php } } else { ?><span><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></span><?php } if($comiis_app_switch['comiis_listtime'] == 1 && $_G['basescript'] != 'group') { ?><?php echo $thread['lastpost'];?><?php } else { ?><?php echo $thread['dateline'];?><?php } ?></div>
</a>
</div>	
</li>
<?php } } else { ?>
<li class="comiis_notip comiis_sofa bg_f b_b cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['forum_nothreads'];?></span>
</li>
<?php } ?>
</ul>
</div>