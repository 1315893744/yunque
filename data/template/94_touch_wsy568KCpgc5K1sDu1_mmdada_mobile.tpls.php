<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:51
//Identify: 7c3c83070ab406447c82b1fc3c919d70

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
					<?php if($_G['comiis_new'] <= 1) { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip246'];?><?php if(!$_G['setting']['forgesms']) { ?><span class="f_g">*</span><?php } ?></div>
<div class="flex"><input type="text" tabindex="5" class="comiis_input kmshow" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['sms'];?>" id="<?php echo $_G['setting']['reginput']['sms'];?>" fwin="login"></div>
</li>
<?php } else { ?>
<li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
<div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe684</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip246'];?><?php if(!$_G['setting']['forgesms']) { ?><span class="f_g">*</span><?php } } ?></div>
<div class="flex"><input type="text" tabindex="5" class="comiis_input kmshow" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['sms'];?>" id="<?php echo $_G['setting']['reginput']['sms'];?>" fwin="login"></div>
</li>
<?php } ?>