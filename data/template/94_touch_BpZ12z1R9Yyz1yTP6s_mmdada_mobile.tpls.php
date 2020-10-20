<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:28
//Identify: f03f59864ecfebf0a6c21323d7c38377

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_splist bg_f b_t cl">
<ul>
<li>
<a href="forum.php?mod=viewthread&amp;do=tradeinfo&amp;tid=<?php echo $trade['tid'];?>&amp;pid=<?php echo $trade['pid'];?>">
<span class="splist_img bg_e">
<?php if($trade['aid']) { ?>
<img src="<?php echo getforumimg($trade['aid']); ?>">
<?php } else { ?>
<div class="comiis_notip bg_e b_ok cl" title="<?php echo $usertrade['subject'];?>">
<i class="comiis_font f_e cl">&#xe627</i>
<em class="f_d"><?php echo $comiis_lang['tip69'];?></em>
</div>
<?php } ?>
</span>
<p class="splist_box b_t">
<span class="splist_tit"><?php echo $trade['subject'];?></span>
<?php if($trade['locus']) { ?><span class="splist_txt f_d cl"><?php echo $comiis_lang['post_trade_locus'];?>: <?php echo $trade['locus'];?></span><?php } ?>
<span class="splist_txt f_d">
<?php if($trade['number']) { ?><em class="y">x <?php echo $trade['number'];?></em><?php } ?>
<em class="z"><?php if($trade['quality'] == 1) { ?><?php echo $comiis_lang['trade_new'];?><?php } if($trade['quality'] == 2) { ?><?php echo $comiis_lang['trade_old'];?><?php } ?><?php echo $comiis_lang['trade_type_buy'];?></em>
</span>

</p>					
<p class="splist_price">					
<?php if($trade['price'] > 0) { ?><span class="f_a">гд <em><?php echo $trade['price'];?></em> <?php echo $comiis_lang['payment_unit'];?></span><?php } if($_G['setting']['creditstransextra']['5'] != -1 && $trade['credit']) { if($trade['price'] > 0) { ?> <span class="f_d"><?php echo $comiis_lang['trade_additional'];?> <?php } else { ?><span class="f_a"><?php } ?><em><?php echo $trade['credit'];?></em> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></span>
<?php } ?>
</p>					
</a>
</li>
</ul>
</div>
<div class="comiis_spbox_txt bg_f b_b cl">
<li class="comiis_flex" style="padding-top:2px;">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_seller'];?></div>
<div class="flex"><a href="home.php?mod=space&amp;uid=<?php echo $trade['sellerid'];?>&amp;do=profile"><em class="spbox_tximg bg_e"><img src="<?php echo avatar($tradelog[sellerid], middle, true);?>" class="top_tximg"></em> <?php echo $trade['seller'];?></a></div>
<div class="styli_r"><a href="home.php?mod=space&amp;do=pm&amp;subop=view&amp;touid=<?php echo $trade['sellerid'];?>" class="b_ok b_0 f_0"><?php echo $comiis_lang['tip70'];?><?php echo $comiis_lang['trade_seller'];?></a></div>
</li>
</div>
<div class="comiis_pltit bg_f b_t b_b mt10 cl">	
<h2><i class="comiis_font f_c z">&#xe687</i> <?php echo $comiis_lang['trade_confirm_buy'];?></h2>
</div>	
<div class="comiis_spbox_txt bg_f b_b cl">
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_credits_total'];?></div>
<div class="flex">
<?php if($trade['price'] > 0) { ?><strong id="caculate"></strong> <?php echo $comiis_lang['trade_units'];?>  <?php } if($_G['setting']['creditstransextra']['5'] != -1 && $trade['credit']) { ?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?> <strong id="caculatecredit"></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?> <span id="crediterror"></span><?php } ?>
</div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_nums'];?></div>
<div class="flex"><input type="text" id="number" name="number" onkeyup="calcsum()" value="1" class="comiis_input f_a" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post_trade_transport'];?></div>
<div class="flex">
<?php if($trade['transport'] == 1) { ?><input type="hidden" name="transport" value="1"><?php echo $comiis_lang['post_trade_transport_seller'];?><?php } if($trade['transport'] == 2) { ?><input type="hidden" name="transport" value="2"><?php echo $comiis_lang['post_trade_transport_buyer'];?><?php } if($trade['transport'] == 3) { ?><input type="hidden" name="transport" value="3"><?php echo $comiis_lang['post_trade_transport_virtual'];?><?php } if($trade['transport'] == 4) { ?><input type="hidden" name="transport" value="4"><?php echo $comiis_lang['post_trade_transport_physical'];?><?php } ?>
</div>
</li>
<?php if($trade['transport'] == 1 or $trade['transport'] == 2 or $trade['transport'] == 4) { ?>
<li class="comiis_flex comiis_input_style b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['tip71'];?></div>
<div class="flex">
<?php if(!empty($trade['ordinaryfee'])) { ?>
<input id="comiis_emsfee1" type="radio" name="fee" value="1" checked="checked" <?php if($trade['transport'] == 2) { ?>onclick="feevalue = <?php echo $trade['ordinaryfee'];?>;calcsum()"<?php } ?> />
<label for="comiis_emsfee1"><i class="comiis_font"></i><?php echo $comiis_lang['post_trade_transport_mail'];?> <?php echo $trade['ordinaryfee'];?> <?php echo $comiis_lang['payment_unit'];?></label>
<?php if($trade['transport'] == 2) { ?><script type="text/javascript">feevalue = <?php echo $trade['ordinaryfee'];?></script><?php } } ?>					
<?php if(!empty($trade['expressfee'])) { ?>
<input id="comiis_emsfee2" type="radio" name="fee" value="3" checked="checked" <?php if($trade['transport'] == 2) { ?>onclick="feevalue = <?php echo $trade['expressfee'];?>;calcsum()"<?php } ?> />
<label for="comiis_emsfee2"><i class="comiis_font"></i><?php echo $comiis_lang['post_trade_transport_express'];?> <?php echo $trade['expressfee'];?> <?php echo $comiis_lang['payment_unit'];?></label>
<?php if($trade['transport'] == 2) { ?><script type="text/javascript">feevalue = <?php echo $trade['expressfee'];?></script><?php } } ?>					
<?php if(!empty($trade['emsfee'])) { ?>
<input id="comiis_emsfee3" type="radio" name="fee" value="2" checked="checked" <?php if($trade['transport'] == 2) { ?>onclick="feevalue = <?php echo $trade['emsfee'];?>;calcsum()"<?php } ?> />
<label for="comiis_emsfee3"><i class="comiis_font"></i>EMS <?php echo $trade['emsfee'];?> <?php echo $comiis_lang['payment_unit'];?></label>
<?php if($trade['transport'] == 2) { ?><script type="text/javascript">feevalue = <?php echo $trade['emsfee'];?></script><?php } } ?>
</div>
</li>
<?php } ?>
<li class="comiis_flex comiis_input_style b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_paymethod'];?></div>
<div class="flex">
<?php if(!$_G['uid']) { ?>
<label><input type="hidden" name="offline" value="0" checked="checked" /><?php echo $comiis_lang['trade_pay_alipay'];?></label>
<?php } elseif(!$trade['account'] && !$trade['tenpayaccount']) { ?>
<input type="hidden" name="offline" value="1" checked="checked" /><?php echo $comiis_lang['trade_pay_offline'];?>
<?php } else { ?>
<input type="radio" id="comiis_trade_pay1" name="offline" value="0" checked="checked" />
<label for="comiis_trade_pay1"><i class="comiis_font"></i><?php echo $comiis_lang['trade_pay_alipay'];?></label>
<input type="radio" id="comiis_trade_pay2" name="offline" value="1" />
<label for="comiis_trade_pay2"><i class="comiis_font"></i><?php echo $comiis_lang['trade_pay_offline'];?></label>
<?php } ?>
</div>
</li>
<?php if($trade['transport'] != 3) { ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyername'];?></div>
<div class="flex"><input type="text" id="buyername" name="buyername" maxlength="50" value="<?php echo $lastbuyerinfo['buyername'];?>" class="comiis_input" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyercontact'];?></div>
<div class="flex"><input type="text" id="buyercontact" name="buyercontact" maxlength="100" value="<?php echo $lastbuyerinfo['buyercontact'];?>" class="comiis_input" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyerzip'];?></div>
<div class="flex"><input type="text" id="buyerzip" name="buyerzip" maxlength="10" value="<?php echo $lastbuyerinfo['buyerzip'];?>" class="comiis_input" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyerphone'];?></div>
<div class="flex"><input type="text" id="buyerphone" name="buyerphone" maxlength="20" value="<?php echo $lastbuyerinfo['buyerphone'];?>" class="comiis_input" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyermobile'];?></div>
<div class="flex"><input type="text" id="buyermobile" name="buyermobile" maxlength="20" value="<?php echo $lastbuyerinfo['buyermobile'];?>" class="comiis_input" /></div>
</li>
<?php } else { ?>
<input type="hidden" name="buyername" value="" />
<input type="hidden" name="buyercontact" value="" />
<input type="hidden" name="buyerzip" value="" />
<input type="hidden" name="buyerphone" value="" />
<input type="hidden" name="buyermobile" value="" />
<?php } ?>		
<li><div class="styli_tit f_c"><?php echo $comiis_lang['trade_seller_remark'];?></div></li>
<div class="spbox_bz bg_h cl"><textarea id="buyermsg" name="buyermsg" class="comiis_pxs" placeholder="<?php echo $comiis_lang['trade_seller_remark'];?>"></textarea></div>
<div class="comiis_btnbox bg_f" style="padding-top:3px;">
<button type="submit" id="tradesubmit" name="tradesubmit" value="true" class="comiis_btn bg_c f_f"><?php echo $comiis_lang['trade_buy_confirm'];?></button>
</div>		
<?php if(!$_G['uid']) { ?><div class="f_c f14" style="padding:0 15px 10px;"><?php echo $comiis_lang['trade_guest_alarm'];?></div><?php } ?>
</div>