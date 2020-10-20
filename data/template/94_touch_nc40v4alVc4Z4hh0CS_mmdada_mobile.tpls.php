<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:26
//Identify: b43078cb2254d2928b0e1ee7fc7941bf

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post_trade_name'];?> <span class="f_g">*</span></div>
<div class="flex"><input type="text" name="item_name" id="item_name" class="comiis_input kmshow" value="<?php echo $trade['subject'];?>" /></div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post_trade_number'];?> <span class="f_g">*</span></div>
<div class="flex"><input type="text" name="item_number" id="item_number" class="comiis_input kmshow" value="<?php echo $trade['amount'];?>" /></div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_type_viewthread'];?></div>
<div class="flex">
<div class="comiis_login_select">
<span class="inner">
<i class="comiis_font f_d">&#xe60c</i>
<span class="z">
<span class="comiis_question" id="item_quality_name"></span>
</span>					
</span>
<select id="item_quality" name="item_quality" tabindex="1">
<option value="1" <?php if($trade['quality'] == 1) { ?>selected="selected"<?php } ?>><?php echo $comiis_lang['trade_new'];?></option>
<option value="2" <?php if($trade['quality'] == 2) { ?>selected="selected"<?php } ?>><?php echo $comiis_lang['trade_old'];?></option>
</select>
</div>	
</div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['post_trade_locus'];?></div>
<div class="flex"><input type="text" name="item_locus" id="item_locus" class="comiis_input kmshow" value="<?php echo $trade['locus'];?>" /></div>
</li>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['post_trade_price'];?> <span class="f_g">*</span></li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_price'];?></div>
<div class="flex"><input type="text" name="item_price" id="item_price" class="comiis_input f_a kmshow" value="<?php echo $trade['price'];?>" /></div>
<div class="styli_r f_c"><?php echo $comiis_lang['payment_unit'];?></div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_costprice'];?></div>
<div class="flex"><input type="text" name="item_costprice" id="item_costprice" class="comiis_input f_a kmshow" value="<?php echo $trade['costprice'];?>" /></div>
<div class="styli_r f_c"><?php echo $comiis_lang['payment_unit'];?></div>
</li>
<?php if($_G['setting']['creditstransextra']['5'] != -1) { ?>
<li class="comiis_stylitit b_b bg_e f_c"><?php echo $comiis_lang['post10'];?> (<?php echo $comiis_lang['post11'];?>)</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_price'];?></div>
<div class="flex"><input type="text" name="item_credit" id="item_credit" class="comiis_input f_a kmshow" value="<?php echo $trade['credit'];?>" /></div>
<div class="styli_r f_c"><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></div>
</li>
<li class="comiis_styli comiis_flex b_b">
<div class="styli_tit f_c"><?php echo $comiis_lang['trade_costprice'];?></div>
<div class="flex"><input type="text" name="item_costcredit" id="item_costcredit" class="comiis_input f_a kmshow" value="<?php echo $trade['costcredit'];?>" /></div>
<div class="styli_r f_c"><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></div>
</li>
<?php } ?>