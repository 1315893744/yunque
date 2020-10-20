<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:29
//Identify: 994b98f6cd43cfe7a104c213faa19192

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_pltit bg_f b_t b_b mt10 cl">	
<h2><?php echo $comiis_lang['tip73'];?></h2>
</div>
<div class="comiis_spbox_txt bg_f cl">
<li class="comiis_flex b_b">
<div class="flex"><a href="home.php?mod=space&amp;uid=<?php echo $trade['sellerid'];?>&amp;do=profile"><img src="<?php echo avatar($trade[sellerid], middle, true);?>" class="top_tximg"> <?php echo $trade['seller'];?></a></div>
<div class="styli_r"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&do=pm&subop=view&touid=<?php echo $post['authorid'];?><?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } ?>" class="b_ok b_0 f_0"><?php echo $comiis_lang['tip70'];?><?php echo $comiis_lang['trade_seller'];?></a></div>
</li>
</div>
<div class="comiis_spbox_xypj bg_f b_b cl">
<?php echo $comiis_lang['trade_seller_real_name'];?>: <?php if($post['realname']) { ?><?php echo $post['realname'];?><?php } if($post['qq']) { ?>&nbsp;&nbsp;&nbsp;&nbsp;QQ: <?php echo $post['qq'];?><?php } if($post['taobao']) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comiis_lang['taobao'];?>: <?php echo $post['taobaoas'];?><?php } ?><br>
<?php echo $comiis_lang['eccredit_sellerinfo'];?>: <?php echo $post['buyercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/buyer/<?php echo $post['buyerrank'];?>.gif" border="0" class="vm" style="padding-right:15px;"><?php echo $comiis_lang['eccredit_buyerinfo'];?>: <?php echo $post['sellercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/seller/<?php echo $post['sellerrank'];?>.gif" border="0" class="vm"><br>		
</div>	
<div class="comiis_pltit bg_f b_t b_b mt10 cl">	
<h2><?php echo $comiis_lang['tip74'];?></h2>
</div>
<div class="comiis_postli cl">
<div class="comiis_message bg_f view_one b_b cl">
<div class="comiis_a comiis_message_table"><?php echo $post['message'];?></div>
<?php if($post['attachment']) { ?>
<div class="comiis_quote bg_h">
<?php echo $comiis_lang['attachment'];?>: <em><?php echo $comiis_lang['attach_nopermission'];?></em>
</div>
<?php } elseif($post['imagelist'] || $post['attachlist']) { if($post['imagelist']) { if(count($post['imagelist']) == 1) { ?>
<ul class="comiis_img_one<?php if(!$post['first'] && $comiis_app_switch['comiis_aimg_show'] == 1) { ?> comiis_vximga<?php } ?> cl"><?php echo showattach($post, 1); ?></ul>
<?php } else { ?>
<ul class="comiis_img_list<?php if(!$post['first'] && $comiis_app_switch['comiis_aimg_show'] == 1) { ?> comiis_vximgb<?php if(count($post['imagelist']) == 4) { ?> comiis_vximgb_img4<?php } } ?> cl"><?php echo showattach($post, 1); ?></ul>
<?php } } if($post['attachlist']) { ?>
<ul class="comiis_attach_box cl"><?php echo showattach($post); ?></ul>
<?php } } ?>		
</div>
</div>
<?php if($allowpostreply && $post['allowcomment'] && $_G['setting']['commentnumber']) { ?>
<div class="comiis_pltit bg_f b_t cl">	
<?php if(!$_G['inajax']) { ?>
            <h2><i class="comiis_font f_c z">&#xe680</i> <?php echo $comiis_lang['comments'];?></h2>
            <div id="comment_<?php echo $post['pid'];?>" class="comiis_dianping bg_f b_t mt5 mb5"></div>
<?php } if(!$post['comment']) { ?>
<h2><i class="comiis_font f_c z">&#xe680</i> <?php echo $comiis_lang['comments'];?></h2>
<div class="comiis_notip comiis_sofa b_t cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['all47'];?><?php echo $comiis_lang['comments'];?></span>
</div>
<?php } ?>
</div>
<?php } if(!$_G['inajax'] && $allowpostreply && $post['allowcomment'] && $_G['setting']['commentnumber']) { ?>
<script type="text/javascript" reload="1">
$.ajax({
type:'GET',
url:'forum.php?mod=misc&action=commentmore&tid=<?php echo $post['tid'];?>&pid=<?php echo $post['pid'];?>&inajax=1',
dataType:'xml'
})
.success(function(s) {
$('#comment_<?php echo $post['pid'];?>').html(s.lastChild.firstChild.nodeValue);
});
function strLenCalc(obj, checklen, maxlen) {
var v = obj.value
  , charlen = 0
  , maxlen = !maxlen ? 200 : maxlen
  , curlen = maxlen
  , len = strlen(v);
for (var i = 0; i < v.length; i++) {
if (v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) {
curlen -= charset == 'utf-8' ? 2 : 1;
}
}
if (curlen >= len) {
$('.'+checklen).text(curlen - len);
} else {
$('.'+checklen).text(0);
obj.value = mb_cutstr(v, maxlen, 0);
}
}
function strlen(str) {
return str.length;
}
function mb_cutstr(str, maxlen, dot) {
var len = 0;
var ret = '';
var dot = !dot ? '...' : dot;
maxlen = maxlen - dot.length;
for (var i = 0; i < str.length; i++) {
len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
if (len > maxlen) {
ret += dot;
break;
}
ret += str.substr(i, 1);
}
return ret;
}	
</script>	
<?php } ?>