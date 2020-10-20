<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:48
//Identify: 0d5ea4e938237a6654ac9087947c263b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<form id="replycommentform_<?php echo $comment['cid'];?>" name="replycommentform_<?php echo $comment['cid'];?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=comment">
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="id" value="<?php echo $comment['id'];?>" />
<input type="hidden" name="idtype" value="<?php echo $comment['idtype'];?>" />
<input type="hidden" name="cid" value="<?php echo $comment['cid'];?>" />
<input type="hidden" name="commentsubmit" value="true" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="comiis_tip bg_f cl">
<div class="tip_tit txt_l bg_f f_d b_b"><?php echo $comiis_lang['reply'];?> <span class="f_0"><?php echo $comment['author'];?></span></div>
<dt class="f_c">
<div class="tip_form">
<li class="nop bg_e b_ok cl"><textarea class="comiis_pt" placeholder="<?php echo $comiis_lang['all27'];?>" id="needmessage" name="message"></textarea></li>			
</div>
<?php if($secqaacheck || $seccodecheck) { ?>
<div class="comiis_minipost_sec b_b cl"><?php include template('common/seccheck'); ?></div>
<?php } ?>
</dt>
<dd class="b_t cl">
            <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
                <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><?php echo $comiis_lang['cancel'];?></a>		
                <button type="submit" name="commentsubmit_btn" id="fastpostsubmit_btn" value="<?php echo $comiis_lang['reply'];?>" class="formdialog tip_btn bg_f f_0"><span class="tip_lx"><?php echo $comiis_lang['reply'];?></span></button>
<?php } else { ?>
                <input type="submit" name="commentsubmit_btn" id="fastpostsubmit_btn" value="<?php echo $comiis_lang['reply'];?>" class="formdialog tip_btn bg_f f_0">
                <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx"><?php echo $comiis_lang['cancel'];?></span></a>
<?php } ?>
</dd>
</div>
</form>