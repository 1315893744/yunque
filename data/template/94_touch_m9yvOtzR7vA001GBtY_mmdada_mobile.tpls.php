<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:53
//Identify: 21b8453158ed6e52ac05fc6879240c28

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($article['related'] && $comiis_app_switch['comiis_pwzview_related'] == 1) { if($comiis_app_switch['comiis_portal_view_fg'] == 0) { ?>
<div class="comiis_wztit mb0 cl">
<h2 class="f_hot"><i class="comiis_font">&#xe615</i> <?php echo $comiis_lang['tip98'];?></h2>
</div>
<?php } elseif($comiis_app_switch['comiis_portal_view_fg'] == 1) { ?>
<div class="styli_h10 bg_e b_t b_b"></div>
<div class="comiis_pltit bg_f b_b cl"><h2><?php echo $comiis_lang['tip98'];?></h2></div>
<?php } elseif($comiis_app_switch['comiis_portal_view_fg'] == 2) { ?>
<div class="comiis_pltit bg_e b_t b_b cl"><h2><?php echo $comiis_lang['tip98'];?></h2></div>
<?php } ?>
<div class="comiis_wz_list mb3 cl">
<ul><?php $n = 0?><?php if(is_array($article['related'])) foreach($article['related'] as $raid => $rvalue) { $n++?><?php if($n <= 6) { ?>
<li class="wz_list b_t">
<a href="<?php echo $rvalue['uri'];?>">
<?php if($rvalue['pic']) { ?><div class="wz_img comiis_imgbg"><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php if($rvalue['remote']) { ?><?php echo $_G['setting']['ftp']['attachurl'];?><?php } else { ?><?php echo $_G['setting']['attachurl'];?><?php } ?><?php echo $rvalue['pic'];?><?php if($rvalue['thumb']==1) { ?>.thumb.jpg<?php } ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>></div><?php } ?>
<div class="wz_info">
<p><?php echo $rvalue['title'];?></p>
<span class="f_d"><em><?php echo dgmdate($rvalue['dateline'], 'u'); ?></em><?php echo $cat['others'][$rvalue['catid']]['catname'];?></span>
</div>
</a>
</li>
<?php } } ?>
</ul>
</div>
<?php } if($comiis_app_switch['comiis_vfoot_gohome'] == 1 && $comiis_is_new_url == 1) { ?><?php echo $comiis_app_switch['comiis_vfoot_gohomedm'];?><?php } ?>
<div id="comiis_bgbox" style="display:none;"></div>
<?php if($article['allowcomment']==1 && !$article['htmlmade']) { ?>
<div class="comiis_foot_height"></div>
<div id="comiis_foot_memu" class="comiis_view_foot bg_e b_t">
<ul>
    <?php if($comiis_app_switch['comiis_foot_backico'] == 0) { ?>
    <?php if($comiis_app_switch['comiis_header_show'] == 2 || ($comiis_isweixin == 1 && $comiis_app_switch['comiis_header_show'] == 3)) { ?><li class="backico"><a href="javascript:history.back();" class="b_r"><i class="comiis_font f_d" style="line-height:26px;">&#xe60d</i></a></li><?php } ?>
    <?php } elseif($comiis_app_switch['comiis_foot_backico'] == 1) { ?>
    <li class="backico"><a href="javascript:history.back();" class="b_r"><i class="comiis_font f_d" style="line-height:24px;">&#xe60d</i></a></li>
    <?php } ?>
<li><a href="javascript:;" class="comiis_share_key"><i class="comiis_font f_b">&#xe61f</i></a></li>
<li><a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=article&id=<?php echo $article['aid'];?>&handlekey=favoritearticlehk<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($_G['uid']) { ?> class="dialog"<?php } ?> comiis="handle" id="comiis_favorite_a"><i class="comiis_favorite_a_color comiis_font <?php if($comiis_thead_fav['favid']) { ?>f_a<?php } else { ?>f_b<?php } ?>"><?php if($comiis_thead_fav['favid']) { ?>&#xe64c<?php } else { ?>&#xe617<?php } ?></i><?php if($comiis_fav_count) { ?><span class="bg_del f_f comiis_kmvnum comiis_favorite_a_num"><?php echo $comiis_fav_count;?></span><?php } ?></a></li>
<li><a href="javascript:" class="comiis_openrebox"><i class="comiis_font f_b">&#xe680</i><?php if($article['commentnum']) { ?><span class="bg_del f_f comiis_kmvnum"><?php echo $article['commentnum'];?></span><?php } ?></a></li>	
<li class="hf_box"><a href="javascript:" class="bg_f f_c b_ok comiis_openrebox"><i class="comiis_font">&#xe655</i><em><?php echo $comiis_lang['tip14'];?>...</em></a></li>		
</ul>
</div>
<div class="comiis_fastpostbox comiis_showleftbox bg_e"><?php include template('portal/edit'); ?></div>
<script>
function errorhandle_favoritearticlehk(a, b){
popup.open(a, 'alert')
}
function succeedhandle_favorite_add(a, b, c){
if($('#comiis_favorite_a span').length < 1){
$('#comiis_favorite_a').append('<span class="bg_del f_f comiis_kmvnum comiis_favorite_a_num" id="comiis_recommend_num">0</span>')
}
$('.comiis_favorite_a_num').text(Number($('.comiis_favorite_a_num').text()) + 1)
$('.comiis_favorite_a_color').removeClass('f_b').addClass("f_a").html('&#xe64c')
popup.open(b, 'alert')
}
function errorhandle_favorite_add(a, b){
popup.open(a, 'alert')
}
var comiis_view_redata;
$('.comiis_openrebox').on('click', function() {
<?php if($_G['uid']) { ?>
comiis_openrebox(1);
<?php } elseif(!$_G['connectguest']) { ?>
popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');
<?php } else { ?>
popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');
<?php } ?>	
return false;
});
<?php if($_G['uid']) { ?>
function comiis_openrebox(a){
if(a == 1){
$('#comiis_foot_memu').css('display', 'none');
$('.comiis_fastpostbox').css('display', 'block');
setTimeout(function() {
$('.comiis_fastpostbox').addClass("comiis_showrebox");
}, 20);
$('#comiis_bgbox').off().on('touchstart', function() {
$(this).off().css({'display':'none'});
comiis_openrebox(0);
if(comiis_view_redata == $('#needmessage').val()){
$('#needmessage').val('');
$('#comiis_foot_memu .hf_box em').text('<?php echo $comiis_lang['all27'];?>...');
}
comiis_view_redata = '';
return false;
}).css({
'display':'block',
'width':'100%',
'height':'100%',
'position':'fixed',
'top':'0',
'left':'0',
'background':'#000',
'opacity' : '.7',
'z-index':'101'
});

}else{
$('#comiis_bgbox').off().css({'display':'none'});
$('.comiis_fastpostbox').removeClass("comiis_showrebox").on('webkitTransitionEnd transitionend', function() {
$(this).off().css('display', 'none');
$('#comiis_foot_memu .hf_box em').text($('#needmessage').val().length > 0 ? $('#needmessage').val() : '<?php echo $comiis_lang['all27'];?>...');
$('#comiis_foot_memu').css('display', 'block');
});
}
}
<?php } ?>
$(document).on('keydown', '.comiis_message_d', function(event) {
if(event.keyCode == "8") {
return $(this).comiis_delete();
}
});
function portal_comment_requote(cid, aid) {
<?php if($_G['uid']) { ?>
$.ajax({
type:'GET',
url: 'portal.php?mod=portalcp&ac=comment&op=requote&cid='+cid+'&aid='+aid+'&inajax=1',
dataType:'xml'
}).success(function(s) {
if(s.lastChild.firstChild.nodeValue) {
if(comiis_ishandle(s.lastChild.firstChild.nodeValue)){
return false;
}else{
comiis_openrebox(1);
comiis_view_redata = s.lastChild.firstChild.nodeValue;
$('#needmessage').val(s.lastChild.firstChild.nodeValue).focus();
}
}
});	
<?php } elseif(!$_G['connectguest']) { ?>
popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');
<?php } else { ?>
popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');
<?php } ?>	
}
</script>
<?php } ?>
<div class="comiis_share_box bg_e b_t comiis_showleftbox">
<div id="comiis_share" class="bdsharebuttonbox"></div>
<h2 class="bg_f f_g b_t comiis_share_box_close"><a href="javascript:;"><?php echo $comiis_lang['cancel'];?></a></h2>
</div>
<div class="comiis_share_tip"></div>
<script src="template/comiis_app/comiis/js/comiis_nativeShare.js" type="text/javascript"></script>
<script><?php $comiis_share_message = cutstr(str_replace(array("\r\n", "\r", "\n", "'"), '', strip_tags($content[content])), 100);?>var share_obj = new nativeShare('comiis_share', {
img: (document.getElementsByTagName('img').length > 1 && document.getElementsByTagName('img')[1].src) || '',
url:'<?php echo $_G['siteurl'];?>portal.php?mod=view&aid=<?php echo $article['aid'];?>',
title:'<?php echo $article['title'];?>',
desc:'<?php echo $comiis_share_message;?>',
from:'<?php echo $_G['setting']['bbname'];?>'
});
</script>