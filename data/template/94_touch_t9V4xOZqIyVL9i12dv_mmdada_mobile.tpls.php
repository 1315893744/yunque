<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:42
//Identify: 207bdc5d92457f67848decf1890223c5

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_album_list cl">
<ul><?php if(is_array($list)) foreach($list as $key => $value) { $pwdkey = 'view_pwd_album_'.$value['albumid'];?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=<?php echo $value['albumid'];?>">
<?php if($value['pic']) { ?><img src="<?php echo str_replace(array('static/image/common/nopublish.gif'), array('template/comiis_app/comiis/img/comiis_jmalbum.jpg'), $value['pic']);; ?>" class="vm" /><?php } ?>
<span class="album_tit"><?php if($value['albumname']) { ?><?php echo $value['albumname'];?><?php } else { ?><?php echo $comiis_lang['tip144'];?><?php } ?></span>
<?php if($value['picnum']) { ?><span class="album_num f_f"><i class="comiis_font">&#xe627</i><?php echo $value['picnum'];?></span><?php } ?>
</a>
</li>
<?php } ?>	
<?php if($space['self'] && $_GET['view']=='me') { ?>
<li>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=-1">
<img src="<?php echo IMGDIR;?>/comiis_noalbum.jpg" class="vm" />
<span class="album_tit"><?php echo $comiis_lang['tip144'];?></span>
</a>    
</li>
<?php } ?>
</ul>
</div>