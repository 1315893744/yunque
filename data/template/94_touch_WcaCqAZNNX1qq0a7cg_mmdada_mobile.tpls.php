<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:48
//Identify: b69f8984754dd84077d291d9ff773731

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<form id="<?php echo $_GET['key'];?>_docommform_<?php echo $doid;?>_<?php echo $id;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=doing&amp;op=comment&amp;doid=<?php echo $doid;?>&amp;id=<?php echo $id;?>">
<input type="hidden" name="commentsubmit" value="true" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="mood_addform" /><?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="do_button" value="true" />
<div class="comiis_tip bg_f cl">
<div class="tip_tit txt_l bg_e b_b"><span class="f_d y" style="font-size:12px;"><?php echo $comiis_lang['tip164'];?> <span class="<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>_limit">200</span> <?php echo $comiis_lang['tip165'];?></span><span class="f_b"><?php echo $comiis_lang['reply'];?></span></div>
<dt class="f_c">
<div class="tip_form">
<li class="nop bg_e b_ok cl"><textarea class="comiis_pt" placeholder="<?php echo $comiis_lang['all27'];?>" id="needmessage" name="message" onkeyup="strLenCalc(this, '<?php echo $_GET['key'];?>_form_<?php echo $doid;?>_<?php echo $id;?>_limit')"></textarea></li>			
</div>					
</dt>				
<dd class="b_t cl">
                    <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
                        <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><?php echo $comiis_lang['cancel'];?></a>		
                        <button type="submit" name="do_button" id="fastpostsubmit_btn" value="<?php echo $comiis_lang['reply'];?>" class="formdialog tip_btn bg_f f_0"><span class="tip_lx"><?php echo $comiis_lang['reply'];?></span></button>
                    <?php } else { ?>
                        <input type="submit" name="do_button" id="fastpostsubmit_btn" value="<?php echo $comiis_lang['reply'];?>" class="formdialog tip_btn bg_f f_0">
                        <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx"><?php echo $comiis_lang['cancel'];?></span></a>
                    <?php } ?>
</dd>
</div>
</form>