<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:48
//Identify: 50e8c1673b5d3aecfb79158e435affee

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<form method="post" autocomplete="off" id="favoriteform_<?php echo $id;?>" name="favoriteform_<?php echo $id;?>" action="home.php?mod=spacecp&amp;ac=favorite&amp;type=<?php echo $type;?>&amp;id=<?php echo $id;?>&amp;spaceuid=<?php echo $spaceuid;?>&amp;mobile=2" >
<input type="hidden" name="favoritesubmit" value="true" />
<input type="hidden" name="referer" value="<?php echo dreferer();?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="handlekey" value="favorite_add" />
<div class="tip_tit bg_e f_b b_b"><?php if($_GET['type'] == 'forum') { ?><?php echo $comiis_lang['all3'];?><?php echo $comiis_lang['list1'];?><?php } elseif($_GET['type'] == 'thread') { ?><?php echo $comiis_lang['all11'];?><?php echo $comiis_lang['all12'];?><?php } else { ?><?php echo $comiis_lang['all11'];?><?php } ?></div>
<dt class="f_c">
<div class="tip_form">
<li class="tip_txt f_c"><?php echo $comiis_lang['tip166'];?>:</li>
<li class="nop b_ok bg_e f_c cl"><textarea id="general_<?php echo $id;?>" name="description" rows="1" class="comiis_pt f_c" ><?php if($description) { ?><?php echo $description;?><?php } else { ?><?php echo $comiis_lang['tip167'];?><?php } ?></textarea></li>
</div>
</dt>
<dd class="b_t cl">
            <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
                <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><?php echo $comiis_lang['cancel'];?></a>		
                <button type="submit" name="favoritesubmit_btn" id="favoritesubmit_btn" value="<?php echo $comiis_lang['all8'];?>" class="formdialog tip_btn bg_f f_0" comiis="handle"><span class="tip_lx"><?php echo $comiis_lang['all8'];?></span></button>
<?php } else { ?>
                <input type="submit" name="favoritesubmit_btn" id="favoritesubmit_btn" value="<?php echo $comiis_lang['all8'];?>" class="formdialog tip_btn bg_f f_0" comiis="handle">
                <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx"><?php echo $comiis_lang['cancel'];?></span></a>
<?php } ?>
</dd>
</form>