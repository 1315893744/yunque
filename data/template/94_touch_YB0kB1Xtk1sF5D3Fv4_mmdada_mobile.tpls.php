<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:43
//Identify: 583448a3a5ad3fc1cd801b28ddf91fa7

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($list) { ?>
<div>
<ul class="comiis_album_imgs cl"><?php if(is_array($list)) foreach($list as $key => $value) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $value['picid'];?>">
<?php if($value['pic']) { ?><img src="<?php echo str_replace('.thumb.jpg', '', $value['pic']);; ?>" class="vm" /><?php } if($value['status'] == 1) { ?><span class="album_tit"><?php echo $comiis_lang['tip95'];?></span><?php } ?>
</a>
</li>
<?php } ?>
</ul>
</div>
<?php if($pricount) { ?><div class="comiis_quote bg_h f_c"><?php echo $comiis_lang['tip145'];?> <?php echo $pricount;?> <?php echo $comiis_lang['tip145s'];?></div><?php } if($multi) { ?><?php echo $multi;?><?php } } else { if(!$pricount) { ?>
<div class="comiis_notip comiis_sofa mt12 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['tip146'];?></span>
</div>
<?php } if($pricount) { ?><div class="comiis_quote bg_h f_c"><?php echo $comiis_lang['tip145'];?> <?php echo $pricount;?> <?php echo $comiis_lang['tip145s'];?></div><?php } } if($albumlist) { ?>
<div class="comiis_wztit cl">
<h2 class="b_0 f_0"><i class="comiis_font">&#xe653</i> <?php echo $space['username'];?><?php echo $comiis_lang['tip147'];?></h2>
</div>
<div class="comiis_album_list cl">
<ul>
<?php if($albumlist) { ?> <?php if(is_array($albumlist)) foreach($albumlist as $key => $albums) { ?> <?php if(is_array($albums)) foreach($albums as $akey => $value) { ?> <?php $pwdkey = 'view_pwd_album_'.$value['albumid'];?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=<?php echo $value['albumid'];?>">
<?php if($value['pic']) { ?><img src="<?php echo str_replace(array('static/image/common/nopublish.gif'), array('template/comiis_app/comiis/img/comiis_jmalbum.jpg'), $value['pic']);; ?>" class="vm" /><?php } ?>
<span class="album_tit"><?php echo $value['albumname'];?></span>
<?php if($value['picnum']) { ?><span class="album_num f_f"><i class="comiis_font">&#xe627</i><?php echo $value['picnum'];?></span><?php } ?>
</a>
</li>
<?php } ?> 
<?php } ?> 
<?php } ?>
</ul>
</div> 
<?php } ?>