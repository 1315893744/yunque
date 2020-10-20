<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:47
//Identify: 36da73a18fc8313f304f710699627db7

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(is_array($list)) foreach($list as $value) { ?><li class="comiis_flex b_b">
<div class="editpic_l">
<input type="checkbox" name="ids[<?php echo $value['picid'];?>]" id="comiis_id<?php echo $value['picid'];?>" value="<?php echo $value['picid'];?>" <?php echo $value['checked'];?>>
<label for="comiis_id<?php echo $value['picid'];?>"><i class="comiis_font"></i></label>
</div>
<div class="editpic_img"><?php $ids .= $common.$value['picid'].':'.$value['picid'];?><?php $common = ',';?><div class="editpic_imgbox">
<a href="<?php if($album['albumname']) { ?>home.php?mod=spacecp&ac=album&op=setpic&albumid=<?php echo $value['albumid'];?>&picid=<?php echo $value['picid'];?>&handlekey=setpichk<?php } else { ?>javascript:;<?php } ?>"<?php if($album['albumname']) { ?> class="dialog"<?php } ?> id="a_picid_<?php echo $value['picid'];?>">
<img src="<?php echo $value['pic'];?>" />
<p class="f_f"><?php echo $comiis_lang['tip160'];?></p>
</a>
</div>									
</div>
<div class="editpic_textarea b_ok flex"><textarea name="title[<?php echo $value['picid'];?>]"><?php echo $value['title'];?></textarea><input type="hidden" name="oldtitle[<?php echo $value['picid'];?>]" value="<?php echo $value['title'];?>"></div>
</li>
<?php } ?>