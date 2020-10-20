<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:43
//Identify: 0e6a8f5a57de090d8ad6487951090a9c

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_bloglist b_t mt10 cl">
<ul><?php if(is_array($list)) foreach($list as $k => $value) { ?><li class="<?php if($_GET['from'] == 'space') { ?>kmspace <?php } ?>comiis_list_readimgs bg_f b_b">
<?php if($_GET['from'] != 'space') { ?><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=profile" class="blog_avt bg_e"><?php echo avatar($value[uid],small);?></a><?php } ?>
<div class="blog_tit"><?php $stickflag = isset($value['stickflag']) ? 0 : 1;?><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=blog&amp;id=<?php echo $value['blogid'];?>"<?php if($value['magiccolor']) { ?> style="color: <?php echo $_G['colorarray'][$value['magiccolor']];?>"<?php } ?>><?php if(!$stickflag) { ?><span class="bg_c f_f"><?php echo $comiis_lang['view41'];?></span><?php } if($value['status'] == 1) { ?><span class="bg_a f_f"><?php echo $comiis_lang['tip95'];?></span><?php } if($value['friend']) { ?><i class="comiis_font f_wb">&#xe61d</i> <?php } ?><?php echo $value['subject'];?></a>					
</div>
<div class="blog_user">
<?php if($_GET['view']=='me' && $space['self'] && $_GET['from'] != 'space') { ?> 
<span class="f_g y"><a href="home.php?mod=spacecp&amp;ac=blog&amp;blogid=<?php echo $value['blogid'];?>&amp;op=delete&amp;handlekey=delbloghk_<?php echo $value['blogid'];?>" class="dialog"><?php echo $comiis_lang['all13'];?></a></span>
<?php } if($value['hot']) { ?><span class="f_wb y"><i class="comiis_font">&#xe64e</i><em><?php echo $value['hot'];?></em></span><?php } ?>
<span class="f_d y"><i class="comiis_font">&#xe63a</i><em><?php echo $value['viewnum'];?></em></span>
<span class="f_d y"><i class="comiis_font">&#xe679</i><em><?php echo $value['replynum'];?></em></span>					
<?php if(empty($diymode)) { ?><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=profile" class="f_ok"><?php echo $value['username'];?></a><?php } if($_GET['from']=='space') { ?><em class="f_d"><?php echo $value['dateline'];?></em><?php } else { ?><span class="f_d"><?php echo $value['dateline'];?></span><?php } ?>
</div>
<?php if($value['message']) { ?>
<div class="blog_mes f_c cl">
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=blog&amp;id=<?php echo $value['blogid'];?>">
<?php if($value['pic']) { ?><div class="blog_img bg_e"><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo $value['pic'];?>" class="<?php if($comiis_app_switch['comiis_loadimg']) { ?> comiis_noloadimage comiis_loadimages <?php } ?>vm" /></div><?php } if($_GET['from']=='space') { echo cutstr(strip_tags($value['message']),140); } else { echo cutstr(strip_tags($value['message']),110); } ?>
</a>
</div>
<?php } ?>
</li>
<?php } ?>
</ul>
<?php if($multi) { ?><?php echo $multi;?><?php } ?> 
</div>