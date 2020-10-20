<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:29
//Identify: 8291d590c7d8bdee2e6086606a8a1f63

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_spinfo_foot bg_f b_t">
<ul>
<?php if($trade['amount']) { ?>
<li class="wr30"><a href="<?php if($_G['uid']) { ?>forum.php?mod=trade&tid=<?php echo $post['tid'];?>&pid=<?php echo $_GET['pid'];?><?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } ?>" class="comiis_sppm bg_del f_f"><?php echo $comiis_lang['tip72'];?><?php echo $comiis_lang['attachment_buy'];?></a></li>
<?php } else { ?>
<li class="wr30"><button disabled="yes" class="bg_b f_d"><?php echo $comiis_lang['sold_out'];?></button></li>
<?php } ?>
<li class="wr30"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&do=pm&subop=view&touid=<?php echo $post['authorid'];?><?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } ?>" class="comiis_sppm bg_a f_f"><?php echo $comiis_lang['tip70'];?><?php echo $comiis_lang['trade_seller'];?></a></li>
<li class="wl13 f_c b_r"><a href="javascript:;" class="comiis_share_key"><i class="comiis_font">&#xe616</i><span><?php echo $comiis_lang['all1'];?></span></a></li>		
<li class="wl13 f_c b_r"><a <?php if($_G['uid']) { ?>href="forum.php?mod=misc&amp;action=comment&amp;pid=<?php echo $_GET['pid'];?>" class="dialog"<?php } else { ?>href="javascript:;" class="comiis_openrebox"<?php } ?>><i class="comiis_font">&#xe680</i><span><?php echo $comiis_lang['comments'];?></span></a></li>
<li class="wl13 f_c"><a <?php if($_G['uid']) { ?>href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>&amp;handlekey=favorite_thread" class="dialog b_b" comiis="handle"<?php } else { ?>href="javascript:;" class="comiis_openrebox"<?php } ?>><i class="comiis_font comiis_favorite_a_color <?php if($comiis_thead_fav['favid']) { ?>f_a<?php } else { ?>f_b<?php } ?>"><?php if($comiis_thead_fav['favid']) { ?>&#xe64c<?php } else { ?>&#xe617<?php } ?></i><span><?php echo $comiis_lang['all11'];?></span></a></li>
</ul>
</div>
<script>
function succeedhandle_favorite_thread(a, b, c){
popup.open(b, 'alert');
}
function errorhandle_favorite_thread(a, b){
popup.open(a, 'alert');
}

function succeedhandle_favorite_add(a, b, c){
$('.comiis_favorite_a_color').removeClass('f_b').addClass("f_a").html('&#xe64c');
popup.open(b, 'alert');
}
function errorhandle_favorite_add(a, b){
popup.open(a, 'alert');
}
</script>
<div class="comiis_spinfo_top comiis_imgbg cl">
<?php if($trade['displayorder'] > 0) { ?><div class="sphot bg_del f_f"><?php echo $comiis_lang['post_trade_sticklist'];?></div><?php } if(!$_G['forum_thread']['is_archived']) { if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] < $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid'])) && !$post['first'] || $_G['forum']['ismoderator'] && $_G['group']['allowdelpost']) { ?>
<div class="spedit">
<?php if($_G['forum']['ismoderator'] && $_G['group']['allowdelpost']) { ?><a href="javascript:;" onclick="modaction('delpost', <?php echo $_GET['pid'];?>)" class="bg_del f_f"><?php echo $comiis_lang['delete'];?></a><?php } if($_G['forum']['picstyle'] && ($_G['forum']['ismoderator'] || ($_G['uid'] == $_G['thread']['authorid'] && $_G['forum_thread']['closed'] == 0))) { ?><a href="forum.php?mod=ajax&amp;action=setthreadcover&amp;aid=<?php echo $trade['aid'];?>&amp;fid=<?php echo $_G['fid'];?>" class="bg_del f_f"><?php echo $comiis_lang['set_cover'];?></a><?php } ?>
<a href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>" class="bg_del f_f"><?php echo $comiis_lang['edit_trade'];?></a>
</div>
<?php } } if($trade['thumb']) { ?>
<a href="<?php echo $trade['thumb'];?>" target="_blank"><img src="<?php echo $trade['thumb'];?>" alt="<?php echo $trade['subject'];?>" /></a>
<?php } else { ?>
<div class="comiis_notip bg_e b_ok cl" title="<?php echo $trade['subject'];?>">
<i class="comiis_font f_e cl">&#xe627</i>
<span class="f_d"><?php echo $comiis_lang['tip69'];?></span>
</div>
<?php } ?>
</div>
<div class="comiis_spinfo_tit bg_f b_b cl">
<h2><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;do=tradeinfo&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>"><?php echo $trade['subject'];?></a></h2>
<div class="spinfo_price">					
<?php if($trade['price'] > 0) { ?><span class="f_a">&#165; <em class="price_big"><?php echo $trade['price'];?></em></span><?php } if($_G['setting']['creditstransextra']['5'] != -1 && $trade['credit']) { if($trade['price'] > 0) { ?> <span class="f_a"><?php echo $comiis_lang['trade_additional'];?> <?php } else { ?><span class="f_a"><?php } ?><em<?php if($trade['price'] == 0) { ?> class="price_big<?php } ?>"><?php echo $trade['credit'];?></em> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></span>
<?php } if($trade['price'] && $trade['costprice'] > 0 || $_G['setting']['creditstransextra']['5'] != -1 && $trade['credit'] && $trade['costcredit'] > 0) { ?>
<span class="spinfo_priceold f_d">
<?php echo $comiis_lang['trade_costprice'];?>: 
<?php if($trade['costprice'] > 0) { ?>
<del><?php echo $trade['costprice'];?> <?php echo $comiis_lang['payment_unit'];?></del>
<?php } if($_G['setting']['creditstransextra']['5'] != -1 && $trade['costcredit'] > 0) { ?>
<del><?php if($trade['costprice'] > 0) { ?><?php echo $comiis_lang['trade_additional'];?> <?php } ?><?php echo $trade['costcredit'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></del>
<?php } ?>
</span>
<?php } if($trade['tenpayaccount']) { ?><div class="f_0 cl" style="padding-top:5px;"><?php echo $comiis_lang['post_trade_support_tenpay'];?></div><?php } ?>
</div>
<div class="spinfo_num">
<ul class="comiis_flex f_d">
<li class="flex"><?php echo $comiis_lang['post_trade_number'];?>: <?php echo $trade['amount'];?></li>
<li class="flex" style="text-align:center;"><?php echo $comiis_lang['post_trade_buynumber'];?>: <?php echo $trade['totalitems'];?></li>
<li class="flex" style="text-align:right;"><?php if($trade['quality'] == 1) { ?><?php echo $comiis_lang['trade_new'];?><?php } if($trade['quality'] == 2) { ?><?php echo $comiis_lang['trade_old'];?><?php } ?><?php echo $comiis_lang['trade_type_buy'];?></li>
</ul>
</div>
</div>
<div class="comiis_spinfo_ems bg_f b_t mt10 cl">
<ul>
<?php if($trade['locus']) { ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_locus'];?></div>
<div class="flex"><?php echo $trade['locus'];?></div>
</li>
<?php } ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_transport'];?></div>
<div class="flex">
<?php if($trade['transport'] == 0) { ?><?php echo $comiis_lang['post_trade_transport_offline'];?><?php } if($trade['transport'] == 1) { ?><?php echo $comiis_lang['post_trade_transport_seller'];?><?php } if($trade['transport'] == 2 || $trade['transport'] == 4) { if($trade['transport'] == 4) { ?><?php echo $comiis_lang['post_trade_transport_physical'];?><?php } if(!empty($trade['ordinaryfee']) || !empty($trade['expressfee']) || !empty($trade['emsfee'])) { if(!empty($trade['ordinaryfee'])) { ?><?php echo $comiis_lang['post_trade_transport_mail'];?> <?php echo $trade['ordinaryfee'];?> <?php echo $comiis_lang['payment_unit'];?><?php } if(!empty($trade['expressfee'])) { ?> <?php echo $comiis_lang['post_trade_transport_express'];?> <?php echo $trade['expressfee'];?> <?php echo $comiis_lang['payment_unit'];?><?php } if(!empty($trade['emsfee'])) { ?> EMS <?php echo $trade['emsfee'];?> <?php echo $comiis_lang['payment_unit'];?><?php } } elseif($trade['transport'] == 2) { ?>
<?php echo $comiis_lang['post_trade_transport_none'];?>
<?php } } if($trade['transport'] == 3) { ?><?php echo $comiis_lang['post_trade_transport_virtual'];?><?php } ?>
</div>
</li>		
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_remaindays'];?></div>
<div class="flex">
<?php if($trade['closed']) { ?>
<?php echo $comiis_lang['trade_timeout'];?>
<?php } elseif($trade['expiration'] > 0) { ?>
<?php echo $trade['expiration'];?> <?php echo $comiis_lang['days'];?> <?php echo $trade['expirationhour'];?> <?php echo $comiis_lang['trade_hour'];?>
<?php } elseif($trade['expiration'] == 0) { ?>
<?php echo $trade['expirationhour'];?> <?php echo $comiis_lang['trade_hour'];?>
<?php } elseif($trade['expiration'] == -1) { ?>
<?php echo $comiis_lang['trade_timeout'];?>
<?php } ?>
</div>
</li>
</ul>
</div>