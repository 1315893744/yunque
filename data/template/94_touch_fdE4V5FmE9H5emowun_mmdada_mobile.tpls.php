<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:32
//Identify: 9e2ad8f358875e82ebee4bab2e1db685

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_picshow cl">
<header class="comiis_topimg comiis_tmbg comiis_flex f_fs">
<div class="flex comiis_tl"><a href="javascript:history.back();"><i class="comiis_font">&#xe60d</i></a><?php if(!$comiis_is_first) { ?> <em class="comiis_show_num"><?php echo $comiis_img_no + 1;; ?></em> / <?php echo count($comiis_show_aid);; } ?></div>
<div class="flex comiis_tr">
<?php if($comiis_is_first) { ?>
<a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=thread&id=<?php echo $_G['tid'];?>&handlekey=favorite_thread<?php } else { ?>member.php?mod=logging&action=login&mobile=2<?php } ?>"<?php if($_G['uid']) { ?> class="dialog" comiis="handle"<?php } ?> style="color:<?php if($comiis_thead_fav['favid']) { ?>#ffaa00 !important<?php } else { ?>#fff<?php } ?>" id="comiis_favorite_a"><i class="comiis_font">&#xe617</i></a>
<a href="javascript:;" class="comiis_share_key"><i class="comiis_font">&#xe61f</i></a>
<?php } ?>
<a href="javascript:;" class="comiis_open_piclistbox"><i class="comiis_font">&#xe666</i></a>
</div>
</header>
<div class="comiis_picshowbox" id="comiis_picshowbox">
<div class="comiis_num_box"><em class="comiis_show_num"><?php echo $comiis_img_no + 1;; ?></em> / <?php echo count($comiis_show_aid);; ?></div>
<ul class="swiper-wrapper"><?php if(is_array($comiis_show_aid)) foreach($comiis_show_aid as $temp) { if($comiis_app_switch['comiis_view_kuimgdata'] == 1) { ?>
<li class="swiper-slide comiis_optimization" aid="<?php echo $temp;?>" aid-src="<?php echo $_G['siteurl'];?><?php echo (($attachmentlist[$temp]['remote'] ? $_G['setting']['ftp']['attachurl'] : $_G['setting']['attachurl']).'forum/').$attachmentlist[$temp]['attachment']; ?>"><div class="comiis_pic_zoom comiis_optimization" style="overflow-y: auto;"><img data-src="<?php echo (($attachmentlist[$temp]['remote'] ? $_G['setting']['ftp']['attachurl'] : $_G['setting']['attachurl']).'forum/').$attachmentlist[$temp]['attachment'];; ?>" class="swiper-lazy" src="<?php echo IMGDIR;?>/imageloading.gif"></div></li>
<?php } else { ?>				
<li class="swiper-slide comiis_optimization" aid="<?php echo $temp;?>" aid-src="<?php echo $_G['siteurl'];?><?php echo getforumimg($temp, 0, 1500, 1500, 'fixnone');; ?>"><div class="comiis_pic_zoom comiis_optimization"><img data-src="<?php echo getforumimg($temp, 0, 1500, 1500, 'fixnone');; ?>" class="swiper-lazy" src="<?php echo IMGDIR;?>/imageloading.gif"></div></li>
<?php } ?>			
<?php } ?>
</ul>
</div>
<?php if($comiis_is_first) { ?>
<footer class="picshow_foot comiis_tmbg f_fs cl">
<h2><span><em class="comiis_show_num"><?php echo $comiis_img_no + 1;; ?></em> / <?php echo count($comiis_show_aid);; ?></span><font><?php echo $_G['forum_thread']['subject'];?></font></h2>
<div class="picshow_txt comiis_tm"><div id="picshow_txt"></div></div>
<div class="picshow_ico b_t">
<span class="y f_f"><?php echo dgmdate($_G['forum_thread']['dateline'] , 'Y-m-d H:i:s'); ?></span>				
<a href="forum.php?mod=misc&amp;action=recommend&amp;handlekey=recommend_add&amp;do=add&amp;tid=<?php echo $_G['tid'];?>&amp;hash=<?php echo FORMHASH;?>&amp;mobile=2" style="color:<?php if($comiis_my_recommend['tid']) { ?>#ffaa00 !important<?php } else { ?>#fff<?php } ?>" class="comiis_recommend_addkey"><i class="comiis_font">&#xe63b</i> <?php echo $comiis_lang['view7'];?> <em class="recommend_add"><?php if($_G['forum_thread']['recommend_add']) { ?><?php echo $_G['forum_thread']['recommend_add'];?><?php } ?></em></a>		
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['forum_thread']['tid'];?>&amp;mobile=2#comiis_allreplies"><i class="comiis_font">&#xe626</i> <?php if($_G['forum_thread']['replies']) { ?><?php echo $_G['forum_thread']['replies'];?><?php } ?><?php echo $comiis_lang['all53'];?></a>
</div>
</footer>
<?php } ?>
</div>
<div class="comiis_piclistbox comiis_piclistbox_masonry">
<ul class="cl"><?php if(is_array($comiis_show_aid)) foreach($comiis_show_aid as $temp) { ?><li><img src="<?php echo getforumimg($temp, 0, 400, 999, 'fixnone');; ?>"></li>
<?php } ?>
</ul>
</div>
<div style="display:none"><?php if(is_array($comiis_show_aid_message)) foreach($comiis_show_aid_message as $key => $temp) { ?><p id="comiis_message_<?php echo $key;?>">  <?php echo $temp;?></p><?php } ?></div>
