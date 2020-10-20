<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:17
//Identify: 426c9ad4ef3ae910630dd8db0ff61a1a

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_annlist cl">
<ul><?php $nn = 0;?><?php if(is_array($announcelist)) foreach($announcelist as $ann) { $nn++;?><li class="comiis_annlist_li b_b cl">
<h2><a href="javascript:;" class="comiis_ann_more" id="comiis_ann_<?php echo $ann['id'];?>"><i class="comiis_font f_d"><?php if($nn == 1 && !$annid || $ann['id'] == $annid) { ?>&#xe620<?php } else { ?>&#xe60c<?php } ?></i><?php echo $ann['subject'];?></a></h2>
<h3 class="mt5 f13"><span class="f_d y"><?php echo $ann['starttime'];?></span><span class="f_c"><?php echo $comiis_lang['author'];?>:</span> <a href="home.php?mod=space&amp;username=<?php echo $ann['authorenc'];?>&amp;do=profile" class="top_user f_ok"><?php echo $ann['author'];?></a></h3>
<div class="comiis_annlist_box bg_h" style="display:<?php if($nn == 1 && !$annid || $ann['id'] == $annid) { ?>block<?php } else { ?>none<?php } ?>;" id="comiis_ann_<?php echo $ann['id'];?>_box">				
<span><?php echo $ann['message'];?></span>
</div>
</li>
<?php } ?>
</ul>	
</div>