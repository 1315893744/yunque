<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<script type="text/javascript">
var comiis_mobile_runjs_num_wmse = 0;
var comiis_lostpwform_xlco;

EOF;
 if(!$_G['uid']) { 
$return .= <<<EOF

function succeedhandle_comiis_mobile_jms_sms(locationhref, message, param) {
document.location.href = './plugin.php?id=comiis_sms:comiis_sms_post&action=lostpw&comiis_tel='+param['tel']+'&code='+param['code']+'&md5='+param['md5'];
}
function errorhandle_comiis_mobile_jms_sms(a, b){
popup.open(a, 'alert');
}

EOF;
 } 
$return .= <<<EOF

var comiis_mobreg_timeout;
function comiis_mobreg_fkey(type){
//���ͺͷ���
var phone = $("."+type+" #comiis_tel").val();
var myreg = /^(\+)?(86)?0?1\d{10}$/;             
if(phone == '' || !myreg.test(phone)){
popup.open('{$comiis_sms['35']}', 'alert');
}else{
$('.'+type+' .comiis_mobreg_timekey').attr("disabled","disabled");
var comiis_seccodeverify = '';

EOF;
 if($secqaacheck) { 
$return .= <<<EOF

var secanswer = jQuery('.'+type+' input[name="secanswer"]').val();
var secqaahash = jQuery('.'+type+' input[name="secqaahash"]').val();
comiis_seccodeverify = '&secanswer='+secanswer+'&secqaahash='+secqaahash;

EOF;
 } if($seccodecheck) { 
$return .= <<<EOF

var seccodeverify = jQuery('.'+type+' input[name="seccodeverify"]').val();
var seccodehash = jQuery('.'+type+' input[name="seccodehash"]').val();
var seccodemodid = jQuery('.'+type+' input[name="seccodemodid"]').val();
comiis_seccodeverify = '&seccodeverify='+seccodeverify+'&seccodehash='+seccodehash+'&seccodemodid='+seccodemodid;

EOF;
 } 
$return .= <<<EOF

jQuery.ajax({
type:'GET',
url: 'plugin.php?id=comiis_sms&action='+type+'&comiis_tel='+phone+comiis_seccodeverify+'&inajax=1' ,
dataType:'xml',
}).success(function(s) {
if(s.lastChild.firstChild.nodeValue.length < 1){
popup.open('{$comiis_sms['37']}', 'alert');
}
$('.'+type+' .comiis_mobreg_timekey').removeAttr("disabled");
var aaakb = s.lastChild.firstChild.nodeValue;
var dataarr_ypci = aaakb.split('|');
if(dataarr_ypci[0] == 'comiis_mob_reg'){
$('.'+type+' .comiis_mobreg_time span').text((Number(dataarr_ypci[2]) > 0 ? Number(dataarr_ypci[2]) : 60)); // ��������
if(dataarr_ypci[1] == '1'){
popup.open('{$comiis_sms['38']}', 'alert');
comiis_mobreg_timeout_fun_ypci(type);
}else{
popup.open(dataarr_ypci[1], 'alert');
}

if(Number(dataarr_ypci[2]) > 0){
$('.'+type+' .comiis_mobreg_timekey').hide();
$('.'+type+' .comiis_mobreg_time').show();
comiis_mobreg_timeout_fun_ypci(type);
}
}else{
popup.open('{$comiis_sms['39']}', 'alert');
}
}).error(function() {
popup.open('{$comiis_sms['40']}', 'alert');
});
}
}
function comiis_mobreg_timeout_fun_ypci(type){
var outtime_bfhl = Number($('.'+type+' .comiis_mobreg_time span').text()) - 1;
$('.'+type+' .comiis_mobreg_time span').text(outtime_bfhl);
if(outtime_bfhl < 1){
$('.'+type+' .comiis_mobreg_timekey').show();
$('.'+type+' .comiis_mobreg_time').hide();
}else{
comiis_mobreg_timeout = setTimeout(function() {
comiis_mobreg_timeout_fun_ypci(type);
}, 1000);
}
}
</script>

EOF;
?>
