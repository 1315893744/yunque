<?php
//Author: 顾顾顾北辰
//Created: 2019-01-05 16:41
//Identify: 463af8577c6f468697e116eee80816ae

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>

<div class="comiis_forumlist comiis_kcimg mb0 bg_f mt10 b_t cl" style="padding-top:12px;">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?>
<li class="forumlist_li bg_e comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) echo $_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key];?>
    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="kcimg comiis_imgbg">
	<?php if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?>
		<?php if($thread['attachment'] == 2) { ?>
			<?php if(is_array($comiis_pic_lista[$thread['tid']]['aid'])) foreach($comiis_pic_lista[$thread['tid']]['aid'] as $temp) { ?>
				<img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '300', '260'); ?>" class="vm <?php if($comiis_app_switch['comiis_loadimg']) { ?>comiis_noloadimage comiis_loadimages<?php } ?>" style="display: inline;">
			<?php }}} ?>
    </a>
    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="kctit"><?php if($thread['attachment'] != 2 && empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key]) && !$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="bg_a f_f"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></a>
    <a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="kcuser f_b">
	
        <span class="f_d y"><?php echo $thread['views'];?> 阅读</span>
        <em class="bg_f"><img class="vm" src="<?php if($thread['authorid'] && $thread['author']) { ?><?php echo avatar($thread['authorid'], small, true);?><?php } else { ?><?php echo avatar(0, small, true);?><?php } ?>"></em><span class="f_ok"><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></span>
    </a>
</li>

<?php } } else { ?>
<li class="comiis_notip comiis_sofa bg_f b_t b_b mt10 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['forum_nothreads'];?></span>
</li>
<?php } ?>
</ul>
</div>