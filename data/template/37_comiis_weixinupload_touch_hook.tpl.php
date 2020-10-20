<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$__STATICURL = STATICURL;$html = <<<EOF


EOF;
 if($comiis_wxup_iswx) { 
$html .= <<<EOF

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" type="text/javascript"></script>

EOF;
 } 
$html .= <<<EOF

<script>
var wxup_num = 0, reimage_num = 0, reimagey_num = 0, reimagen_num = 0;
var comiis_reimage = {};
var comiis_localIds = {};
var comiis_upimgid = new Array();
$(document).ready(function() {
var comiis_wxup_khrh = $('#filedata');
comiis_wxup_khrh.attr({'accept':"image/*"
EOF;
 if($_G['comiis_isAndroid']) { 
$html .= <<<EOF
,"multiple":"multiple"
EOF;
 } 
$html .= <<<EOF
});

EOF;
 if($comiis_wxup_iswx) { 
$html .= <<<EOF

wx.config({
debug: 0,
appId: '{$comiis_signPackage["appId"]}',
timestamp: '{$comiis_signPackage["timestamp"]}',
nonceStr: '{$comiis_signPackage["nonceStr"]}',
signature: '{$comiis_signPackage["signature"]}',
jsApiList: ['chooseImage', 'uploadImage','onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'onMenuShareQZone', 'getLocation', 'openLocation']
});
wx.ready(function(){
comiis_wxup_khrh.off().unbind().on("click", function(){
wxup_num = 0;
comiis_localIds = {}
comiis_upimgid = new Array();
wx.chooseImage({

EOF;
 if($comiis_weixinuploads['picnum']) { 
$html .= <<<EOF
count: {$comiis_weixinuploads['picnum']}, 
EOF;
 } if($comiis_weixinuploads['type']) { 
$html .= <<<EOF
sizeType: [
EOF;
 if($comiis_weixinuploads['type'] == 1) { 
$html .= <<<EOF
'original'
EOF;
 } else { 
$html .= <<<EOF
'compressed'
EOF;
 } 
$html .= <<<EOF
], 
EOF;
 } if($comiis_weixinuploads['in']) { 
$html .= <<<EOF
sourceType: [
EOF;
 if($comiis_weixinuploads['in'] == 1) { 
$html .= <<<EOF
'album'
EOF;
 } else { 
$html .= <<<EOF
'camera'
EOF;
 } 
$html .= <<<EOF
], 
EOF;
 } 
$html .= <<<EOF

success: function(rswx_res){
comiis_localIds = rswx_res.localIds;
if(comiis_localIds.length > 0){
comiis_wxupload(comiis_localIds[wxup_num]);
}
}
});
return false;
});
});

EOF;
 } 
$html .= <<<EOF

});

EOF;
 if($comiis_wxup_iswx) { 
$html .= <<<EOF

function comiis_wxupload(id){
wx.uploadImage({
localId: id,
success: function(rswx_res){
comiis_upimgid.push(rswx_res.serverId);
wxup_num++;
if(wxup_num < comiis_localIds.length){
comiis_wxupload(comiis_localIds[wxup_num]);
}else{
popup.open('<img src="'+IMGDIR+'/imageloading.gif" class="comiis_loading">');
$.ajax({
type: "POST",
url: "{$_G['siteurl']}plugin.php?id=comiis_weixinupload&inajax=1",
data: {uid:'{$_G['uid']}', fid:'{$_G['fid']}', comiis_hash:'{$comiis_hash}', serverId:comiis_upimgid},
dataType: "json",
success: function(lpkq_data){
if(!lpkq_data || lpkq_data.length <1){
popup.open('上传失败，请稍后再试', 'alert');
return false;
}
reimage_num = 0;
reimagey_num = 0;
reimagen_num = 0;
comiis_reimage = {};
comiis_reimage = lpkq_data;
comiis_wxreimage(comiis_reimage[reimage_num]);
}
});
}			
}
});
}
function comiis_wxreimage(redata){
reimage_num++;
if(reimage_num <= comiis_reimage.length){
var dataarr_ozuh = redata.split('|');
if(dataarr_ozuh[0] == 'DISCUZUPLOAD' && dataarr_ozuh[2] == 0){
popup.close();

EOF;
 if($_G['style']['directory'] == './template/comiis_app') { 
$html .= <<<EOF

$('#imglist').append('<li><span aid="'+dataarr_ozuh[3]+'" class="del"><a href="javascript:;"><i class="comiis_font f_g">&#xe648;</i></a></span><span class="charu f_f">&#25554;&#20837;</span><span class="p_img"><a href="javascript:;" onclick="comiis_addsmilies(\'[attachimg]'+dataarr_ozuh[3]+'[/attachimg]\')"><'+'img style="height:54px;width:54px;" id="aimg_'+dataarr_ozuh[3]+'" title="'+dataarr_ozuh[6]+'" src="{$_G['setting']['attachurl']}forum/'+dataarr_ozuh[5]+'" class="vm b_ok" /></a></span><input type="hidden" name="attachnew['+dataarr_ozuh[3]+'][description]" /></li>');

EOF;
 } else { 
$html .= <<<EOF

$('#imglist').append('<li><span aid="'+dataarr_ozuh[3]+'" class="del"><a href="javascript:;"><img src="{$__STATICURL}image/mobile/images/icon_del.png"></a></span><span class="p_img"><a href="javascript:;"><img style="height:54px;width:54px;" id="aimg_'+dataarr_ozuh[3]+'" title="'+dataarr_ozuh[6]+'" src="{$_G['setting']['attachurl']}forum/'+dataarr_ozuh[5]+'" /></a></span><input type="hidden" name="attachnew['+dataarr_ozuh[3]+'][description]" /></li>');

EOF;
 } 
$html .= <<<EOF

reimagey_num++;
comiis_wxreimage(comiis_reimage[reimage_num]);
}else{
var sizelimitqpvj = '';
if(dataarr_ozuh[7] == 'ban'){
sizelimitqpvj = '(附件类型被禁止)';
}else if(dataarr_ozuh[7] == 'perday'){
sizelimitqpvj = '(不能超过'+Math.ceil(dataarr_ozuh[8]/1024)+'K)';
}else if(dataarr_ozuh[7] > 0){
sizelimitqpvj = '(不能超过'+Math.ceil(dataarr_ozuh[7]/1024)+'K)';
}
reimagen_num++;
popup.open(STATUSMSG[dataarr_ozuh[2]] + sizelimitqpvj, 'alert');
setTimeout(function(){
comiis_wxreimage(comiis_reimage[reimage_num]);
}, 1000);
}
}else{
setTimeout(function(){
popup.close();
popup.open((reimagey_num ? reimagey_num + '{$comiis_weixinupload['01']}' : '') + ((reimagey_num && reimagen_num) ? ' , ' : '') +(reimagen_num ? reimagen_num + '{$comiis_weixinupload['02']}' : ''), 'alert');
}, 500);
}
}

EOF;
 } 
$html .= <<<EOF

</script>

EOF;
?>