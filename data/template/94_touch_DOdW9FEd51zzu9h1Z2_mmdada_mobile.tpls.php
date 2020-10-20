<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 18:06
//Identify: 9bd03be392cee3ae2a29e8b6015c9f14

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_forumlist mb0 cl">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?><li class="forumlist_li comiis_jximg bg_f b_ok comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>	
<div class="forumlist_li_box cl">		
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
<?php if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { if($thread['attachment'] == 2) { ?>
<div class="listimg comiis_imgbg"><?php if(is_array($comiis_pic_lista[$thread['tid']]['aid'])) foreach($comiis_pic_lista[$thread['tid']]['aid'] as $temp) { ?><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '300', '263'); ?>" class="vm<?php if($comiis_app_switch['comiis_loadimg']) { ?> comiis_noloadimage comiis_loadimages<?php } ?>">
<?php } if($comiis_pic_list[$thread['tid']]['nums'] > $comiis_pic_list['all_num']) { ?>
<span class="nums f_f"><i class="comiis_font">&#xe627</i><?php echo $comiis_pic_list[$thread['tid']]['nums'];?></span>
<?php } ?>
</div>
<?php } } ?>
<div class="jximg_user f_ok cl">							
<?php if($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?>
<span class="f_c y">#<?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></span>
<?php } elseif($thread['typeid'] && $_G['forum']['threadtypes']['types'][$thread['typeid']]) { ?>
<span class="f_c y">#<?php echo $_G['forum']['threadtypes']['types'][$thread['typeid']];?></span>
<?php } ?>
<em class="z bg_e"><img class="top_tximg" src="<?php if($thread['authorid'] && $thread['author']) { ?><?php echo avatar($thread['authorid'], small, true);?><?php } else { ?><?php echo avatar(0, small, true);?><?php } ?>"></em><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?>
</div>
<h2<?php if($thread['attachment'] != 2 || !empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?> class="jximg_noimg"<?php } ?> <?php echo $thread['highlight'];?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></h2>
<?php if($thread['attachment'] != 2 || !empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?><div class="list_body b_t f_b"><?php if($thread['price'] && !$thread['special'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip255'];?></p><?php } elseif($thread['readperm'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip256'];?></p><?php } else { ?><?php echo $message[$thread['tid']];?><?php } ?></div><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) echo $_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key];?>
<div class="jximg_bottom f_d cl">
<span class="f_d"><?php if($comiis_app_switch['comiis_listtime'] == 1 && $_G['basescript'] != 'group') { ?><?php echo $thread['lastpost'];?><?php } else { ?><?php echo $thread['dateline'];?><?php } ?></span>
<span class="f_d y"><em><?php echo $thread['views'];?></em><i class="comiis_font">&#xe67b</i><em><?php echo $thread['replies'];?></em><i class="comiis_font">&#xe64f</i></span>
</div>
</a>
</div>
</li>
<?php } } else { ?>
<li class="comiis_notip comiis_sofa bg_f b_t b_b mt10 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['forum_nothreads'];?></span>
</li>
<?php } ?>
</ul>
</div>