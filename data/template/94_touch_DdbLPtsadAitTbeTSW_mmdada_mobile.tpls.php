<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:17
//Identify: ba895004e59ae1629c32b6b051cae021

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_act_gl b_b bg_f">
<div class="comiis_quote bg_h f_a cl"><?php echo $comiis_lang['view30'];?></div>
<ul><?php if(is_array($applylist)) foreach($applylist as $apply) { ?><li class="cl b_t">
<?php if($isactivitymaster) { ?>
<div class="act_gl_input comiis_input_style">
<?php if($apply['uid'] != $_G['uid']) { ?>
<input type="checkbox" name="applyidarray[]" value="<?php echo $apply['applyid'];?>" id="comiis_applyid<?php echo $apply['applyid'];?>" />
<label for="comiis_applyid<?php echo $apply['applyid'];?>" class="comiis_applyid_class"><i class="comiis_font f_d">&#xe643</i></label>
<?php } else { ?>
<input type="checkbox" disabled="disabled" id="comiis_disabled<?php echo $apply['applyid'];?>"/>
<label for="comiis_disabled<?php echo $apply['applyid'];?>"><i class="comiis_font f_e">&#xe643</i></label>
<?php } ?>
</div>
<?php } ?>
<a href="home.php?mod=space&amp;uid=<?php echo $apply['uid'];?>&amp;do=profile" class="act_gl_tx"><?php echo avatar($apply[uid],middle);?></a>
<h2>
<a href="home.php?mod=space&amp;uid=<?php echo $apply['uid'];?>&amp;do=profile" class="f_0"><?php echo $apply['username'];?></a>
<?php if($isactivitymaster) { ?>
<span class="f_c">
<?php if($apply['verified'] == 1) { ?>
<?php echo $comiis_lang['activity_allow_join'];?>
<?php } elseif($apply['verified'] == 2) { ?>
<?php echo $comiis_lang['activity_do_replenish'];?>
<?php } else { ?>
<?php echo $comiis_lang['activity_cant_audit'];?>
<?php } ?>
</span>					
<?php } ?>
</h2>
<div class="act_gl_time cl">
<span class="y f_c<?php if($activity['cost'] || $apply['message'] || $apply['ufielddata']) { ?> comiis_activity_more<?php } ?>" id="comiis_activity_<?php echo $apply['applyid'];?>"><?php echo $comiis_lang['all19'];?><i class="comiis_font f_d">&#xe620</i></span>
<span class="f_d"><?php echo $apply['dateline'];?></span>	
</div>
<?php if($activity['cost'] || $apply['message'] || $apply['ufielddata']) { ?>
<div class="comiis_quote bg_g f_b cl" id="comiis_activity_<?php echo $apply['applyid'];?>_box" style="display:none;">
<ul>
<?php if($apply['message']) { ?><li><?php echo $comiis_lang['all20'];?>  :    <?php echo $apply['message'];?></li><?php } if($activity['cost']) { ?>
<li><?php echo $comiis_lang['view31'];?>  :  <?php if($apply['payment'] >= 0) { ?><?php echo $apply['payment'];?> <?php echo $comiis_lang['payment_unit'];?><?php } else { ?><?php echo $comiis_lang['activity_self'];?><?php } ?></li>
<?php } if($apply['ufielddata']) { ?>
<?php echo $apply['ufielddata'];?>
<?php } else { ?>
<li><?php echo $comiis_lang['no_informations'];?></li>
<?php } ?>
</ul>
</div>
<?php } ?>
</li>
<?php } ?>
</ul>
</div>