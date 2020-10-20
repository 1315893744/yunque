<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:30
//Identify: d27e211ab71e3bcbbd4731f98cf30406

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_spbox_txt bg_f b_b cl">
<?php if($tradelog['status'] == 0) { ?><div class="spbox_bz bg_h f_a cl" style="text-align:center;font-size:12px;margin-bottom:2px;"><?php echo $comiis_lang['trade_payment_comment'];?></div><?php } if(!$tradelog['offline']) { ?>
<li class="comiis_flex b_b" style="padding-top:2px;">
<div class="styli_tit f_c"><?php if(!$tradelog['offline']) { ?><?php echo $comiis_lang['trade_pay_alipay'];?><?php } else { ?><?php echo $comiis_lang['trade_pay_offline'];?><?php } ?></div>
<div class="flex"></div>
<div class="styli_r">
<?php if($tradelog['status'] == 0 && $tradelog['buyerid'] == $_G['uid']) { if($tradelog['tenpayaccount']) { ?>
<a href="forum.php?mod=trade&amp;orderid=<?php echo $orderid;?>&amp;pay=yes&amp;apitype=tenpay" target="_blank" class="b_ok b_0 bg_0 f_f"><?php echo $comiis_lang['trade_online_tenpay'];?></a>
<?php } } else { if($tradelog['paytype'] == 1) { ?>
<a href="<?php echo $loginurl;?>" target="_blank" class="b_ok b_0 bg_0 f_f"><?php echo $comiis_lang['trade_order_status'];?></a>
<?php } if($tradelog['paytype'] == 2) { ?>
<a href="<?php echo $loginurl;?>" target="_blank" class="b_ok b_0 bg_0 f_f"><?php echo $comiis_lang['tenpay_trade_order_status'];?></a>
<?php } } ?>
</div>
</li>
<?php } ?>		
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_seller'];?></div>
<div class="flex"><a href="home.php?mod=space&amp;uid=<?php echo $tradelog['sellerid'];?>&amp;do=profile"><em class="spbox_tximg bg_e"><img src="<?php echo avatar($tradelog[sellerid], middle, true);?>" class="top_tximg"></em> <?php echo $tradelog['seller'];?></a></div>
<?php if($_G['uid'] != $tradelog['sellerid']) { ?><div class="styli_r"><a href="home.php?mod=space&amp;do=pm&amp;subop=view&amp;touid=<?php echo $tradelog['sellerid'];?>" class="b_ok b_0 f_0"><?php echo $comiis_lang['tip70'];?><?php echo $comiis_lang['trade_seller'];?></a></div><?php } ?>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyer'];?></div>
<div class="flex"><a href="home.php?mod=space&amp;uid=<?php echo $tradelog['buyerid'];?>&amp;do=profile"><em class="spbox_tximg bg_e"><img src="<?php echo avatar($tradelog[buyerid], middle, true);?>" class="top_tximg"></em> <?php echo $tradelog['buyer'];?></a></div>
<?php if($_G['uid'] != $tradelog['buyerid']) { ?><div class="styli_r"><a href="home.php?mod=space&amp;do=pm&amp;subop=view&amp;touid=<?php echo $tradelog['buyerid'];?>" class="b_ok b_0 f_0"><?php echo $comiis_lang['tip70'];?><?php echo $comiis_lang['trade_buyer'];?></a></div><?php } ?>
</li>
<?php if($tradelog['status'] == 0 && $tradelog['sellerid'] == $_G['uid']) { ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_baseprice'];?></div>
<div class="flex"><input type="text" id="newprice" name="newprice" value="<?php echo $tradelog['baseprice'];?>" class="comiis_input f_a" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></div>
<div class="flex">
<?php if($_G['setting']['creditstransextra']['5'] != -1 && $tradelog['credit']) { ?>
<input type="text" id="newcredit" name="newcredit" value="<?php echo $tradelog['basecredit'];?>" class="comiis_input f_a" /> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?>
<?php } ?>
</div>
<div class="styli_r f_c"><?php echo $comiis_lang['payment_unit'];?></div>
</li>
<?php } if($tradelog['status'] == 0 && $tradelog['buyerid'] == $_G['uid']) { ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_nums'];?></div>
<div class="flex"><input type="text" id="newnumber" name="newnumber" value="<?php echo $tradelog['number'];?>" class="comiis_input f_a" /></div>
</li>
<?php } if($tradelog['tradeno']) { ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_order_no'];?></div>
<div class="flex"><a href="<?php echo $loginurl;?>"><?php echo $tradelog['tradeno'];?></a></div>
</li>
<?php } ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post_trade_transport'];?></div>
<div class="flex">
<?php if($tradelog['transport'] == 0) { ?><?php echo $comiis_lang['post_trade_transport_offline'];?><?php } if($tradelog['transport'] == 1) { ?><?php echo $comiis_lang['post_trade_transport_seller'];?><?php } if($tradelog['transport'] == 2) { ?><?php echo $comiis_lang['post_trade_transport_buyer'];?><?php } if($tradelog['transport'] == 3) { ?><?php echo $comiis_lang['post_trade_transport_virtual'];?><?php } if($tradelog['transport'] == 4) { ?><?php echo $comiis_lang['post_trade_transport_physical'];?><?php } ?>
</div>
<?php if($tradelog['transport'] && !($tradelog['status'] == 0 && $tradelog['sellerid'] == $_G['uid'])) { ?>
<div class="styli_r f_c"><?php echo $comiis_lang['trade_transportfee'];?> <?php echo $tradelog['transportfee'];?> <?php echo $comiis_lang['payment_unit'];?></div>
<?php } ?>
</li>
<?php if($tradelog['transport'] && $tradelog['status'] == 0 && $tradelog['sellerid'] == $_G['uid']) { ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_transportfee'];?></div>
<div class="flex"><input type="text" name="newfee" value="<?php echo $tradelog['transportfee'];?>" class="comiis_input f_a" /></div>
<div class="styli_r f_c"><?php echo $comiis_lang['payment_unit'];?></div>
</li>
<?php } if($tradelog['transport'] != 3) { if($tradelog['status'] == 0 && $tradelog['buyerid'] == $_G['uid']) { ?>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyername'];?></div>
<div class="flex"><input type="text" id="newbuyername" name="newbuyername" value="<?php echo $tradelog['buyername'];?>" maxlength="50" class="comiis_input" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyercontact'];?></div>
<div class="flex"><input type="text" id="newbuyercontact" name="newbuyercontact" value="<?php echo $tradelog['buyercontact'];?>" maxlength="100" class="comiis_input" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyerzip'];?></div>
<div class="flex"><input type="text" id="newbuyerzip" name="newbuyerzip" value="<?php echo $tradelog['buyerzip'];?>" maxlength="10" class="comiis_input" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyerphone'];?></div>
<div class="flex"><input type="text" id="newbuyerphone" name="newbuyerphone" value="<?php echo $tradelog['buyerphone'];?>" maxlength="20" class="comiis_input" /></div>
</li>
<li class="comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_buyermobile'];?></div>
<div class="flex"><input type="text" id="newbuyermobile" name="newbuyermobile" value="<?php echo $tradelog['buyermobile'];?>" maxlength="20" class="comiis_input" /></div>
</li>
<?php } } else { ?>
<input type="hidden" name="newbuyername" value="" />
<input type="hidden" name="newbuyercontact" value="" />
<input type="hidden" name="newbuyerzip" value="" />
<input type="hidden" name="newbuyerphone" value="" />
<input type="hidden" name="newbuyermobile" value="" />
<?php } if($tradelog['status'] == 0 && $tradelog['buyerid'] == $_G['uid']) { ?>
<li><div class="styli_tit f_c"><?php echo $comiis_lang['trade_seller_remark'];?></div></li>
<div class="spbox_bz bg_h cl" style="margin-bottom:0;"><textarea id="newbuyermsg" name="newbuyermsg" class="comiis_pxs"><?php echo $tradelog['buyermsg'];?></textarea></div>
<?php } else { if($tradelog['buyermsg']) { ?>		
<li><div class="styli_tit f_c"><?php echo $comiis_lang['trade_seller_remark'];?></div></li>
<div class="spbox_bz bg_h cl"><?php echo $tradelog['buyermsg'];?></div>
<?php } } if($tradelog['status'] == 0 && ($_G['uid'] == $tradelog['sellerid'] || $_G['uid'] == $tradelog['buyerid'])) { ?>
<div class="comiis_btnbox bg_f">
<button type="submit" name="tradesubmit" value="true" class="comiis_btn bg_c f_f"><?php echo $comiis_lang['trade_submit_order'];?></button>
</div>
<?php } ?>
</div>