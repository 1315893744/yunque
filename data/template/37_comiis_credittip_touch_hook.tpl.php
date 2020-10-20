<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$html = <<<EOF

<style>
.comiis_showCredit,.comiis_showCredit_v1tagr{background:{$comiis_credittip['jbgcolor']};color:{$comiis_credittip['jcolor']};}
.comiis_showCreditn{background:{$comiis_credittip['nbgcolor']};color:{$comiis_credittip['ncolor']};}
.comiis_showCredit{position:fixed;top:0;left:0;bottom:0;right:0;width:140px;height:120px;z-index:9999;text-align:center;margin:auto;box-shadow:0 0 6px rgba(0, 0, 0, 0.2);border-radius:4px;}
.comiis_showCredit img {margin:15px auto 3px;height:44px;overflow:hidden;}
.comiis_showCredit span {display:block;line-height:20px;height:20px;overflow:hidden;}
.comiis_showCredit p {display:block;line-height:20px;font-size:16px;height:20px;overflow:hidden;}
.comiis_showCredit_v1tagr {position:fixed;top:-200px;left:0;bottom:0;right:0;width:68%;height:24px;line-height:24px;padding:11px 0;z-index:9999;text-align:center;margin:auto;box-shadow:0 0 6px rgba(0, 0, 0, 0.2);border-radius:4px;}
.comiis_showCredit_v1tagr img {height:24px;padding-right:5px;vertical-align:top;font-size:0;overflow:hidden;}
.comiis_showCredit_v1tagr span {font-size:14px;}
.comiis_showCredit{opacity:0;transform:scale(0.5);-webkit-transform:scale(0.5);}
.comiis_showCredit_ashow{-webkit-animation:comiis_showCredit_ashow {$comiis_alltime}ms forwards;animation:comiis_showCredit_ashow {$comiis_alltime}ms forwards;}
@keyframes comiis_showCredit_ashow{0%{opacity:0;transform:scale(0.5);-webkit-transform:scale(0.5);}{$comiis_keyframes_bfb['1']}%{opacity:1;transform:scale(1.05);-webkit-transform:scale(1.05);}{$comiis_keyframes_bfb['2']}%{transform:scale(1);-webkit-transform:scale(1);}{$comiis_keyframes_bfb['3']}%{opacity:1;transform:scale(1);-webkit-transform:scale(1);}100%{transform:scale(1.2);-webkit-transform:scale(1.2);opacity:0;}}
@-webkit-keyframes comiis_showCredit_ashow{0%{opacity:0;transform:scale(0.5);-webkit-transform:scale(0.5);}{$comiis_keyframes_bfb['1']}%{opacity:1;transform:scale(1.05);-webkit-transform:scale(1.05);}{$comiis_keyframes_bfb['2']}%{transform:scale(1);-webkit-transform:scale(1);}{$comiis_keyframes_bfb['3']}%{opacity:1;transform:scale(1);-webkit-transform:scale(1);}100%{transform:scale(1.2);-webkit-transform:scale(1.2);opacity:0;}}
</style>
<script>
var comiis_tip_ieipk = 0, comiis_Credit_tipmwam = new Array();
function comiis_showCredit_tipmwam(){
if(comiis_Credit_tipmwam.length > 0){
$('body').append(comiis_Credit_tipmwam[comiis_tip_ieipk]);
$('#comiis_showCredit').addClass('comiis_showCredit_ashow').on('webkitAnimationEnd animationend', function(){
comiis_tip_ieipk++;
$(this).remove();
if(comiis_Credit_tipmwam.length >= (comiis_tip_ieipk + 1)){
setTimeout(function() {
comiis_showCredit_tipmwam();
}, 100);
}else{
comiis_Credit_tipmwam = new Array();
comiis_tip_ieipk = 0;
}
});
}
}
function comiis_showCredit_tip_startdgsw(){
if(!getcookie('creditnotice')){
return;
}
var comiis_credittip_titleijxt = '';
if(getcookie('creditrule')){
comiis_credittip_titleijxt = decodeURI(getcookie('creditrule', 1)).replace(String.fromCharCode(9), ' ');
}
var comiis_credittip_credit = getcookie('creditnotice').split('D');
if(comiis_credittip_credit.length < 2 || comiis_credittip_credit[9] != discuz_uid){
setcookie('creditnotice', '');
setcookie('creditrule', '');
return;
}
var creditnames = creditnotice.split(',');
var creditinfo = [];
var e, ii = 0;
for(var i = 0; i < creditnames.length; i++) {
e = creditnames[i].split('|');
creditinfo[e[0]] = [e[1], e[2]];
}
for(i = 1; i <= 8; i++){
if(comiis_credittip_credit[i] !== '0' && creditinfo[i]) {

EOF;
 if($comiis_set_style == 1) { 
$html .= <<<EOF

comiis_Credit_tipmwam.push('<div class="comiis_showCredit'+(comiis_credittip_credit[i] < 0 ? ' comiis_showCreditn' : '')+'" id="comiis_showCredit"><img src="'+(comiis_credittip_credit[i] > 0 ? '{$comiis_credittip['jicon']}' : '{$comiis_credittip['nicon']}')+'"><span>'+comiis_credittip_titleijxt+'</span><p>'+creditinfo[i][0]+' '+(comiis_credittip_credit[i] > 0 ? '+' : '')+comiis_credittip_credit[i] +' '+ creditinfo[i][1]+'</p></div>');

EOF;
 } else { 
$html .= <<<EOF

comiis_Credit_tipmwam.push('<div class="comiis_showCredit_v1tagr'+(comiis_credittip_credit[i] < 0 ? ' comiis_showCreditn' : '')+'" id="comiis_showCredit"><img src="'+(comiis_credittip_credit[i] > 0 ? '{$comiis_credittip['jicon']}' : '{$comiis_credittip['nicon']}')+'"><span>'+comiis_credittip_titleijxt+' '+creditinfo[i][0]+' '+(comiis_credittip_credit[i] > 0 ? '+' : '')+comiis_credittip_credit[i] +' '+ creditinfo[i][1]+'</span></div>');

EOF;
 } 
$html .= <<<EOF

ii++;
}
}
setcookie('creditnotice', '');
setcookie('creditbase', '');
setcookie('creditrule', '');
comiis_showCredit_tipmwam();
}
$(document).ready(function(){
setTimeout(function() {
comiis_showCredit_tip_startdgsw();
}, 500);
var comiis_appendscript = appendscript;
appendscript = function(src, text, reload, charset){
comiis_showCredit_tip_startdgsw();
comiis_appendscript(src, text, reload, charset);
}
});
</script>

EOF;
?>