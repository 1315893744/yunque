<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:06
//Identify: b4104e5d949838ddda76c50a5fa22ad6

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(!strpos($_SERVER['HTTP_USER_AGENT'], 'Android') && (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') || strpos($_SERVER['HTTP_USER_AGENT'], 'iphone') || strpos($_SERVER['HTTP_USER_AGENT'], 'ipod') || strpos($_SERVER['HTTP_USER_AGENT'], 'ipad'))){
$is_iphone = 1;
}else{
$is_iphone = 0;
}?><?php if($_G['basescript'] == 'forum' && CURMODULE == 'index') { if(!$_COOKIE['comiis_mobile_tip_cookies'] && $comiis_app_switch['comiis_tip_open']) { ?>
<div class="comiis_gototip">
<?php if($comiis_app_switch['comiis_tip_open'] && !$_COOKIE['comiis_mobile_tip_cookies']) { ?>
<div class="showtip_t f_f showtip1">
<?php echo $comiis_app_switch['comiis_tip1'];?>
<p class="bg_0 f_f" onclick="comiis_tip(1)"><?php echo $comiis_app_switch['comiis_tip_key'];?></p>
</div>
<div class="showtip_b f_f showtip2" style="display:none;">
<p class="bg_0 f_f" onclick="comiis_tip(2)"><?php echo $comiis_app_switch['comiis_tip_key'];?></p>		
<?php echo $comiis_app_switch['comiis_tip2'];?>
</div>
<?php } ?>
</div>
<?php } if(!$_COOKIE['comiis_mobile_tip_cookies2'] && $comiis_app_switch['comiis_tip_save'] && $is_iphone) { ?>
<div class="comiis_gototip showtip3"<?php if($_COOKIE['comiis_mobile_tip_cookies2'] || ($comiis_app_switch['comiis_tip_open'] && !$_COOKIE['comiis_mobile_tip_cookies'])) { ?> style="display:none;"<?php } ?>>
<?php if($comiis_app_switch['comiis_tip_save'] && !$_COOKIE['comiis_mobile_tip_cookies2']) { ?>
<div class="comiis_athbox bg_f f_b">
<div class="comiis_athbox_jt bg_f"></div>
<i class="comiis_font ath_close f_c" onclick="comiis_tip(3)">&#xe639</i>
<?php echo $comiis_app_switch['comiis_tip_save1'];?>
</div>
<?php } ?>
</div>
<?php } ?>
<script>
function comiis_tip(a){
if(a == 1){
$('.showtip1').css('display', 'none');
$('.showtip2').css('display', 'block');
}else if(a == 2){
$('.showtip2').css('display', 'none');
$('.comiis_gototip').css('display', 'none');			
if(<?php echo $is_iphone;?> == 1 && <?php echo intval($comiis_app_switch['comiis_tip_save']); ?> && <?php echo intval($_COOKIE['comiis_mobile_tip_cookies2']); ?> == 0){
$('.showtip3').css('display', 'block');
}			
$.cookie('comiis_mobile_tip_cookies', 1, {expires : <?php echo $comiis_app_switch['comiis_tip_time'];?>, path : '/'}); 
}else if(a == 3){
$('.showtip3').css('display', 'none');
$.cookie('comiis_mobile_tip_cookies2', 1, {expires : <?php echo $comiis_app_switch['comiis_tip_save_time'];?>, path : '/'}); 
}
}
</script>
<?php } ?>