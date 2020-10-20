<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:14
//Identify: 4785ca597a40abfbc7bd216f062e8326

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div id="comiis_foot_memu" class="comiis_view_foot bg_e b_t">
<ul>
    <?php if($comiis_app_switch['comiis_foot_backico'] == 0) { ?>
    <?php if($comiis_app_switch['comiis_header_show'] == 2 || ($comiis_isweixin == 1 && $comiis_app_switch['comiis_header_show'] == 3)) { ?><li class="backico"><a href="javascript:history.back();" class="b_r"><i class="comiis_font f_d" style="line-height:24px;">&#xe60d</i></a></li><?php } ?>
    <?php } elseif($comiis_app_switch['comiis_foot_backico'] == 1) { ?>
    <li class="backico"><a href="javascript:history.back();" class="b_r"><i class="comiis_font f_d" style="line-height:24px;">&#xe60d</i></a></li>
    <?php } ?>
<li><a href="javascript:;" class="comiis_share_key"><i class="comiis_font f_b">&#xe61f</i></a></li>
<li><a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=thread&id=<?php echo $_G['tid'];?>&handlekey=favorite_thread<?php } else { ?>javascript:;<?php } ?>"<?php if($_G['uid']) { ?> class="dialog" comiis="handle"<?php } else { ?> class="comiis_openrebox"<?php } ?> id="comiis_favorite_a"><i class="comiis_favorite_a_color comiis_font <?php if($comiis_thead_fav['favid']) { ?>f_a<?php } else { ?>f_b<?php } ?>"><?php if($comiis_thead_fav['favid']) { ?>&#xe64c<?php } else { ?>&#xe617<?php } ?></i><?php if($_G['forum_thread']['favtimes']) { ?><span class="bg_del f_f comiis_kmvnum comiis_favorite_a_num"<?php if($_G['forum_thread']['favtimes'] > 99) { ?> style="padding:0 6px;"<?php } ?>><?php echo $_G['forum_thread']['favtimes'];?></span><?php } ?></a></li>
<li><a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=recommend&handlekey=recommend_add&do=add&tid=<?php echo $_G['tid'];?>&hash=<?php echo FORMHASH;?><?php } else { ?>javascript:;<?php } ?>" class="<?php if($_G['uid']) { ?>comiis_recommend_addkey <?php } ?>comiis_recommend_new<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>"><i class="comiis_font comiis_recommend_color <?php if($comiis_my_recommend['tid']) { ?>f_a<?php } else { ?>f_b<?php } ?>"><?php if($comiis_my_recommend['tid']) { ?>&#xe654<?php } else { ?>&#xe63b<?php } ?></i><?php if($_G['forum_thread']['recommend_add']) { ?><span class="bg_del f_f comiis_kmvnum comiis_recommend_num" id="comiis_recommend_num"<?php if($_G['forum_thread']['recommend_add'] > 99) { ?> style="padding:0 6px;"<?php } ?>><?php echo $_G['forum_thread']['recommend_add'];?></span><?php } ?></a></li>
<li class="hf_box"><?php if($comiis_app_switch['comiis_view_hfurl'] == 1) { ?><a href="<?php if($_G['uid']) { ?>forum.php?mod=post&action=reply&fid=<?php echo $_G['fid'];?>&tid=<?php echo $_G['tid'];?><?php } else { ?>javascript:;<?php } ?>" class="bg_f f_c b_ok<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>"><?php } else { ?><a href="javascript:;" class="bg_f f_c b_ok comiis_openrebox"><?php } ?><i class="comiis_font">&#xe655</i><em><?php echo $comiis_lang['tip25'];?></em></a></li>	
</ul>
</div>
<script>
<?php if($_G['uid'] || !((!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm'])))))) { ?>
function comiis_openrebox(a){
if(a == 1){
<?php if($_G['comiis_new'] < 2) { ?>
$('#comiis_foot_memu').css('display', 'none');
<?php } ?>
$('.comiis_fastpostbox').css('display', 'block');
setTimeout(function() {
$('.comiis_fastpostbox').addClass("comiis_showrebox");
}, 20);
<?php if($_G['comiis_new'] <= 1) { ?>
$('#comiis_bgbox').off().on('touchstart', function() {
$(this).off().css({'display':'none'});
comiis_openrebox(0);
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
<?php } ?>
var smilies_show_id = 0;
if(smilies_show_id == 0){
var smilies_type_box = '';
if(typeof smilies_type == 'object') {
for(i in smilies_type) {
key = i.substring(1);
smilies_type_box += '<li><a href="javascript:;" onclick="comiis_smilies_tab(\''+ key+ '\')" id="comiis_smilies_tab'+ key+ '"' + (smilies_show_id == 0 ? ' class="bg_f"' : '') + '><img src="' + STATICURL + 'image/smiley/' + smilies_type['_' + key][1] + '/' + smilies_array[key][1][0][2] + '" class="vm"></a></li>';
if(smilies_show_id == 0){
smilies_show_id = key;
}
}
$('#comiis_smilies_key').html(smilies_type_box);
comiis_smilies_tab(smilies_show_id)
}
}		
}else{
$('#comiis_bgbox').off().css({'display':'none'});
$('.comiis_fastpostbox').removeClass("comiis_showrebox").on('webkitTransitionEnd transitionend', function() {
$(this).off().css('display', 'none');
$('#comiis_foot_memu .hf_box em').text($('#needmessage').val().length > 0 ? $('#needmessage').val() : '<?php echo $comiis_lang['tip25'];?>');
$('#comiis_foot_memu').css('display', 'block');
});
}
}
<?php } ?>
</script>