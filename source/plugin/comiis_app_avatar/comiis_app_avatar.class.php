<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobileplugin_comiis_app_avatar{
	function global_footer_mobile(){
		global $_G;
		if($_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do'] == 'profile' & $_GET['mycenter'] == '1'){
			$__FORMHASH = FORMHASH;
			loadcache('plugin');
			$comiis_app_avatar_add_css = strip_tags($_G['cache']['plugin']['comiis_app_avatar']['css']);
			$return = <<<EOF
<style>
.comiis_app_avflexxnvu {display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;}.app_avflex {-webkit-box-flex:1;-webkit-flex:1;-ms-flex:1;flex:1;}.comiis_app_avloading {background-color:#000;width:28px;padding:10px;border-radius:5px;filter:alpha(opacity=85);-moz-opacity:0.85;-khtml-opacity:0.85;opacity:0.85;}.comiis_PhotoClip{position:fixed;width:100%;height:100%;overflow:hidden;top:0;left:0;z-index:200;background:{$_G['cache']['plugin']['comiis_app_avatar']['bgcolor']};}#comiis_Clip_file_vczu{display:none}#clipArea{height:100%;}.comiis_clip_load {position:fixed;width:100%;height:100%;overflow:hidden;top:0;left:0;z-index:201;background:rgba(0,0,0,0.5);}.comiis_clip_load img{position:fixed;top:50%;left:50%;z-index:202;margin:-20px 0 0 -20px;}.comiis_clip_topkey {position:fixed;width:100%;height:50px;line-height:50px;text-align:center;font-size:16px;color:{$_G['cache']['plugin']['comiis_app_avatar']['color']};overflow:hidden;top:0;left:0;z-index:201;background:{$_G['cache']['plugin']['comiis_app_avatar']['hbcolor']};}.comiis_clip_topkey button {background:{$_G['cache']['plugin']['comiis_app_avatar']['save_bgcolor']};border:none !important;color:{$_G['cache']['plugin']['comiis_app_avatar']['color']};height:30px;margin:10px;padding:0 15px;outline:none;border-radius:1.5px;}.comiis_clip_topkey button.kmqx {background:{$_G['cache']['plugin']['comiis_app_avatar']['close_bgcolor']};}.comiis_clip_bottomkeywitb button {background:none;border:none !important;height:40px;margin:5px;outline:none;}.comiis_clip_bottomkeywitb button img {height:28px;margin-top:6px;}.comiis_clip_bottomkeywitb {position:fixed;width:100%;height:52px;overflow:hidden;bottom:0;left:0;z-index:201;background:{$_G['cache']['plugin']['comiis_app_avatar']['hbcolor']};}.comiis_clip_bottomkeywitb button {background:none;border:none !important;height:40px;line-height:40px;margin:5px;outline:none;}.comiis_clip_bottomkeywitb button i {font-size:28px;}{$comiis_app_avatar_add_css}
</style>
<script src="source/plugin/comiis_app_avatar/style/iscroll-zoom.js" type="text/javascript"></script>
<script src="source/plugin/comiis_app_avatar/style/hammer.js" type="text/javascript"></script>
<script src="source/plugin/comiis_app_avatar/style/lrz.all.bundle.js" type="text/javascript"></script>
<script src="source/plugin/comiis_app_avatar/style/jquery.photoClip.min.js" type="text/javascript"></script>
<div class="comiis_clip_load" style="display:none">
<img src="source/plugin/comiis_app_avatar/style/imageloading.gif" class="comiis_app_avloading">
</div>
<input type="file" id="comiis_Clip_file_vczu" style="display:none;">
<div class="comiis_PhotoClip" style="display:none">
<div class="comiis_clip_topkey">
<div class="comiis_app_avflexxnvu">				
<button id="comiis_closeBtn" class="kmqx">{$_G['cache']['plugin']['comiis_app_avatar']['close']}</button>
<div class="app_avflex"> </div>
<button id="comiis_clipBtn">{$_G['cache']['plugin']['comiis_app_avatar']['save']}</button>
</div>
</div>	
<div class="comiis_clip_bottomkeywitb">
<div class="comiis_app_avflexxnvu">
<button id="comiis_rightBtn" class="app_avflex"><img src="source/plugin/comiis_app_avatar/style/comiis_rbtn.png"></button>
<button id="comiis_leftBtn" class="app_avflex"><img src="source/plugin/comiis_app_avatar/style/comiis_lbtn.png"></button>	
<button id="comiis_narrowBtn" class="app_avflex"><img src="source/plugin/comiis_app_avatar/style/comiis_xbtn.png"></button>			
<button id="comiis_enlargeBtn" class="app_avflex"><img src="source/plugin/comiis_app_avatar/style/comiis_dbtn.png"></button>				
</div>		
</div>	
<div id="clipArea"></div>
<script>
var comiis_app_avatar_imgweam = $('.comiis_edit_avatar,.avatar_m');
var Comiis_clipAreaicli = new Comiis.PhotoClip("#clipArea", {
size: [200, 200],
outputSize: [200, 200],
file: "#comiis_Clip_file_vczu",
ok: "#comiis_clipBtn",
loadStart: function() {
$('.comiis_clip_load').css('display','block');
},
loadComplete: function() {
$('.comiis_clip_load').css('display','none');
$('.comiis_PhotoClip').css('display','block');
},
loadError: function() {
$('.comiis_clip_load').css('display','none');
popup.open('{$_G['cache']['plugin']['comiis_app_avatar']['error']}', 'alert');
},
clipFinish: function(dataURL) {
Comiis_Touch_on = 0;
$.ajax({
url: 'plugin.php?id=comiis_app_avatar&inajax=1&mobile=2', 
data: {str: dataURL, formhash:'{$__FORMHASH}', comiis_submit:'yes'}, 
type: 'post', 
dataType: 'html', 
}).success(function(s) {
comiis_app_avatar_imgweam.find('img').attr('src', dataURL);
$('.comiis_PhotoClip').css('display','none');
popup.open('{$_G['cache']['plugin']['comiis_app_avatar']['yes']}', 'alert');
setTimeout(function() {
	location.reload();
},1500);
});
}
});
comiis_app_avatar_imgweam.click(function(){
Comiis_Touch_on = 0;
$('#comiis_Clip_file_vczu').click();
});
$('#comiis_closeBtn').click(function(){
Comiis_Touch_on = 1;
$('.comiis_PhotoClip').css('display','none');
});
</script>
</div>
EOF;
			return $return;
		}
	}
}