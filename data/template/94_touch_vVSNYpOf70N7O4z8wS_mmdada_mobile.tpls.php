<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:51
//Identify: 27b745dbd08195020fcbae43380fd102

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
						<?php if($_G['comiis_new'] <= 1) { ?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip247'];?><span class="f_g">*</span></div>
<div class="flex"><input type="text" tabindex="6" class="comiis_input kmshow" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['smscode'];?>" id="<?php echo $_G['setting']['reginput']['smscode'];?>" fwin="login"></div>
<div class="styli_r"><input type="button" tabindex="7" class="comiis_sendbtn bg_0 f_f kmshow" size="15" value="<?php echo $comiis_lang['tip248'];?>" id="smscodesend" fwin="login"></div>
</li>
<?php } else { ?>						
                        <li class="comiis_flex<?php if($comiis_isweixin != 1 || !$comiis_app_switch['comiis_reg_regtxt']) { ?> qqli<?php } ?> styli_zico b_b f16">
                            <div class="styli_tit"><?php if($comiis_app_switch['comiis_reg_ico']==1) { ?><i class="comiis_font f_d">&#xe6e0</i><?php } if($comiis_app_switch['comiis_reg_tit']==1) { ?><?php echo $comiis_lang['tip247'];?><span class="f_g">*</span><?php } ?></div>
<div class="flex"><input type="text" tabindex="6" class="comiis_input kmshow" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['smscode'];?>" id="<?php echo $_G['setting']['reginput']['smscode'];?>" fwin="login"></div>
<div class="styli_r"><input type="button" tabindex="7" class="comiis_sendbtn bg_0 f_f kmshow" value="<?php echo $comiis_lang['tip248'];?>" id="smscodesend" fwin="login"></div>
</li>
<?php } ?>
<script type="text/javascript">
var smscodesendtime = 60,smscodesendtimefuc,lastsms,lastsmscode;
$(function(){
$('#smscodesend').click(function(){
sendsms("#<?php echo $_G['setting']['reginput']['sms'];?>","#<?php echo $_G['setting']['reginput']['smscode'];?>");
});
smscodesendtime = getcookie('smscodesendtime');
if(smscodesendtime) disabledsendsms(smscodesendtime, true);
});
function checksms(id) {
var sms = $(id).val();
if(sms == '' || sms == lastsms) {
popup.open('<?php echo $comiis_lang['tip241'];?>','alert');
return false;
} else {
lastsms = sms;
}
if(!sms.match(/1\d{10}/ig)) {
popup.open('<?php echo $comiis_lang['tip242'];?>','alert');
return false;
}
$.get('forum.php?mod=ajax&inajax=yes&infloat=register&handlekey=register&ajaxmenu=1&action=checksms&sms=' + sms,{}, function(s) {
s = s.match(/<p>(.*)<\/p>/)[1];
if(s != 'succeed'){
popup.open(s,'alert');
return false;
}
},'text');
return true;
}
function sendsms(smsid,smscodeid){
disabledsendsms(5);
if(checksms(smsid) === false){
return false;
}
var sms = $(smsid).val();
$.get('forum.php',{mod:'ajax',inajax:'yes',infloat:'register',handlekey:'register','ajaxmenu':1,action:'sendsmscode',sms:sms}, function(s) {
s = s.match(/<p>(.*)<\/p>/)[1];
var success = s == '<?php echo $comiis_lang['tip243'];?>' ? true : false;
if(success){
disabledsendsms(60,true);
}else{
popup.open(s,'alert');
}
},'text');
}
function disabledsendsms(time, changestr){
clearTimeout(smscodesendtimefuc);
smscodesendtime = time;
if(changestr){
$('#smscodesend').val(smscodesendtime + '<?php echo $comiis_lang['tip244'];?>');
setcookie('smscodesendtime',smscodesendtime,smscodesendtime);
}
$('#smscodesend').attr('disabled','disabled');
smscodesendtimefuc = setInterval(function(){
if(smscodesendtime == 1){
undisabledsendsms();
}else{
--smscodesendtime;
if(changestr){
$('#smscodesend').val(smscodesendtime + '<?php echo $comiis_lang['tip244'];?>');
setcookie('smscodesendtime',smscodesendtime,smscodesendtime);
}
}
},1000);
}		
function undisabledsendsms(){
clearTimeout(smscodesendtimefuc);
$('#smscodesend').val('<?php echo $comiis_lang['tip245'];?>');
$('#smscodesend').removeAttr("disabled");
}
</script>