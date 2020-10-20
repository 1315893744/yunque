<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 18:07
//Identify: 4e571f54b1d777558416a0d37caa05a1

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(!$_GET['inajax']) { ?>
<div class="comiis_waterfall cl">
<ul id="list_new">
<?php } if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?><li class="bg_f b_ok">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>			
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="kmimg">
<?php if($thread['attachment'] == 2) { ?>
<div class="comiis_imgbg"><?php if(is_array($comiis_pic_lista[$thread['tid']]['aid'])) foreach($comiis_pic_lista[$thread['tid']]['aid'] as $temp) { ?><img src="<?php echo getforumimg($temp, '0', '300', '9999'); ?>" class="vm">
<?php } ?>	
</div>		
<?php } ?>
</a>
<?php if($comiis_pic_list[$thread['tid']]['num'] > 1) { ?>
<span class="nums f_f"><i class="comiis_font">&#xe627</i><?php echo $comiis_pic_list[$thread['tid']]['num'];?></span>
<?php } if($thread['attachment'] == 2 && !$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>					
<span class="img_stick bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span>
<?php } ?>					
<h2><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" <?php echo $thread['highlight'];?>><?php if(!$thread['attachment'] && !$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></a></h2>
<?php if($thread['attachment'] != 2 && $message[$thread['tid']]) { ?><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><div class="noimg bg_e f_c"><?php if($thread['price'] && !$thread['special'] && $_G['comiis_new'] >= 1) { ?><span class="f_g"><?php echo $comiis_lang['tip255'];?></span><?php } elseif($thread['readperm'] && $_G['comiis_new'] >= 1) { ?><span class="f_g"><?php echo $comiis_lang['tip256'];?></span><?php } else { ?><?php echo $message[$thread['tid']];?><?php } ?></div></a><?php } ?>
<p>
<span class="f_d y"><i class="comiis_font">&#xe626</i><?php echo $thread['replies'];?></span>
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="f_d"><img src="<?php if($thread['authorid'] && $thread['author']) { ?><?php echo avatar($thread['authorid'], small, true);?><?php } else { ?><?php echo avatar(0, small, true);?><?php } ?>"><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></a>
</p>
</li>
<?php } } elseif(!$_GET['inajax']) { ?>
<li class="comiis_notip comiis_sofa bg_f b_t b_b mt15 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['forum_nothreads'];?></span>
</li>
<?php } if(!$_GET['inajax']) { ?>
</ul>
</div>
<script>
$(function(){
comiis_pic_masonry();
});
$(window).resize(function(){
comiis_pic_masonry();
});
function comiis_pic_masonry(){
var comiis_box = $('#list_new');
var comiis_pic_width = ($(window).width() - 34) / 2;
$('.comiis_waterfall li').css('width', (comiis_pic_width) + 'px');
imagesLoaded($('.comiis_waterfall'),function(){
comiis_box.masonry({
itemSelector:'li',
columnWidth:comiis_pic_width,
gutterWidth : 10
});
});
}
</script>
<?php } ?>