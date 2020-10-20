<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:25
//Identify: 3c03b4df7fbf5f30c2288d18637906de

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<?php if($isorigauthor) { if($thread['price'] > 0) { ?>
<li class="styli_h bg_e b_b"></li>
<li class="comiis_stylino mt12 comiis_flex">
<div class="styli_tit f_c"><?php echo $comiis_lang['reward_price'];?></div>
<div class="flex"><input type="text" name="rewardprice" id="rewardprice" onkeyup="getrealprice(this.value)" value="<?php echo $rewardprice;?>" class="comiis_input b_b f_a kmshow" style="padding:4px 0;"></div>
<div class="styli_r"><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?></div>
</li>
<li class="comiis_stylino">
<div class="comiis_quote bg_h f_c">
<?php echo $comiis_lang['reward_tax_add'];?> <span id="realprice" class="f_a">0</span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?>
<p class="mt5">
<?php echo $comiis_lang['reward_price_min'];?> <?php echo $_G['group']['minrewardprice'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?>
<?php if($_G['group']['maxrewardprice'] > 0) { ?>, <?php echo $comiis_lang['reward_price_max'];?> <?php echo $_G['group']['maxrewardprice'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php } ?>
, <?php echo $comiis_lang['you_have'];?> <?php echo getuserprofile('extcredits'.$_G['setting']['creditstransextra']['2']);; ?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?>
</p>
</div>
</li>
<?php } else { ?>
<li class="comiis_stylino">
<div class="comiis_quote bg_h f_c"><?php echo $comiis_lang['post_reward_resolved'];?></div>
<input type="hidden" name="rewardprice" value="<?php echo $rewardprice;?>" tabindex="1" />
</li>
<?php } } else { if($thread['price'] > 0) { ?>
<li class="comiis_stylino"><div class="comiis_quote bg_h f_c"><?php echo $comiis_lang['reward_price'];?>: <span class="f_a"><?php echo $rewardprice;?></span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?></div></li>
<?php } else { ?>
<li class="comiis_stylino"><div class="comiis_quote bg_h f_c"><?php echo $comiis_lang['post_reward_resolved'];?></div></li>
<?php } } ?>