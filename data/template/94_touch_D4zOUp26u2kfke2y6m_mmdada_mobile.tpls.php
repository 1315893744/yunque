<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:40
//Identify: e09b2c1f0d6cf2c8324711c15a02ae50

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_picshow cl">
<header class="comiis_topimg comiis_tmbg comiis_flex f_f">
<div class="flex comiis_tl"><a href="javascript:history.back();"><i class="comiis_font">&#xe60d</i></a></div>
<div class="flex comiis_tr">			
<a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=album&id=<?php echo $pic['albumid'];?>&handlekey=favorite_thread<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($_G['uid']) { ?> class="dialog" comiis="handle"<?php } ?> style="color:<?php if($comiis_thead_fav['favid']) { ?>#ffaa00 !important<?php } else { ?>#fff<?php } ?>" id="comiis_favorite_a"><i class="comiis_font">&#xe617</i></a>
<a href="javascript:;" class="comiis_share_key"><i class="comiis_font">&#xe61f</i></a>		
<a href="javascript:;" class="comiis_open_piclistbox"><i class="comiis_font">&#xe666</i></a>
</div>
</header>
<div class="comiis_picshowbox" id="comiis_picshowbox">
<div class="comiis_num_box"><em class="comiis_show_num"><?php echo $comiis_img_no + 1;; ?></em> / <?php echo count($comiis_show_aid);; ?></div>
<ul class="swiper-wrapper"><?php if(is_array($comiis_pic)) foreach($comiis_pic as $temp) { ?><li class="swiper-slide comiis_optimization" aid="<?php echo $temp['picid'];?>" aid-src="<?php echo $_G['siteurl'];?><?php echo $temp['pic'];?>"><div class="comiis_pic_zoom comiis_optimization"  style="overflow-y: auto;"><img data-src="<?php echo $temp['pic'];?>" class="swiper-lazy" src="<?php echo IMGDIR;?>/imageloading.gif"></div></li>
<?php } ?>
</ul>
</div>
<footer class="picshow_foot comiis_tmbg f_f cl">
<h2><span><em class="comiis_show_num"><?php echo $comiis_img_no + 1;; ?></em> / <?php echo count($comiis_show_aid);; ?></span><font><?php echo $album['albumname'];?></font></h2>
<div class="picshow_txt comiis_tm"><div id="picshow_txt"></div></div>
<div class="picshow_ico b_t">
<span class="y f_f"><?php echo $comiis_lang['all54'];?>: <?php echo dgmdate($album['dateline'] , 'Y-m-d H:i:s'); ?></span>	
<a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $pic['uid'];?>&do=album&picid=<?php echo $pic['picid'];?>&pic=yes<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" id="comiis_reurl"><i class="comiis_font">&#xe626</i> <?php echo $comiis_lang['all53'];?></a>						
</div>
</footer>
</div>
<div class="comiis_piclistbox comiis_piclistbox_masonry">
<ul class="cl"><?php if(is_array($comiis_pic)) foreach($comiis_pic as $temp) { ?><li><img src="<?php echo $temp['pic'];?>"></li>
<?php } ?>
</ul>
</div>
<div style="display:none"><?php if(is_array($comiis_pic)) foreach($comiis_pic as $key => $temp) { ?><p id="comiis_message_<?php echo $temp['picid'];?>">  <?php echo $temp['title'];?></p><?php } ?></div>
