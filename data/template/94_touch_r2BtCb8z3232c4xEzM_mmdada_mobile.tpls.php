<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:45
//Identify: bf4c7c776d4df26912929ef679e3a889

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($list) { ?>
<div class="comiis_allpl_hfbox bg_e">
<i class="allpl_hfbox_ico bg_e"></i>
<ul><?php if(is_array($list)) foreach($list as $value) { if($value['uid']) { ?>
<li class="b_t">
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" class="f_ok"><?php echo $value['username'];?></a><span class="f_b">: <?php echo $value['message'];?></span> <span class="f_d"><?php echo dgmdate($value['dateline'], 'n-j H:i');?></span>
<?php if($value['uid']==$_G['uid'] || $dv['uid']==$_G['uid'] || checkperm('managedoing')) { ?>
<a href="home.php?mod=spacecp&amp;ac=doing&amp;op=delete&amp;doid=<?php echo $value['doid'];?>&amp;id=<?php echo $value['id'];?>&amp;handlekey=doinghk_<?php echo $value['doid'];?>_<?php echo $value['id'];?>" id="<?php echo $_GET['key'];?>_doing_delete_<?php echo $value['doid'];?>_<?php echo $value['id'];?>" class="dialog f_g"><?php echo $comiis_lang['all13'];?></a>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>