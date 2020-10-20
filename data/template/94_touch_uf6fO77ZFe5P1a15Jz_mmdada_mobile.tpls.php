<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:30
//Identify: 2e750b2132d0df8b6b27fcb2745aaec4

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<?php if($tradelog['offline'] && !empty($messagelist)) { ?>
<div class="comiis_pltit bg_f b_t mt10 cl">	
<h2><i class="comiis_font f_c z">&#xe680</i> <?php echo $comiis_lang['trade_message'];?></h2>
</div>
<div class="comiis_spbox_mess bg_f b_b cl"><?php if(is_array($messagelist)) foreach($messagelist as $message) { ?><div class="comiis_postli">
<div class="comiis_postli_top bg_f b_t">
<a href="home.php?mod=space&amp;uid=<?php echo $message['0'];?>&amp;do=profile"><em class="postli_top_tximg bg_e z"><img src="<?php echo avatar($message[0], middle, true);?>" class="top_tximg"></em></a>
<h2><span class="f_d y"><?php echo $message['2'];?></span><a href="home.php?mod=space&amp;uid=<?php echo $message['0'];?>&amp;do=profile" class="top_user f_b"><?php echo $message['1'];?></a></h2> 
</div>
<div class="comiis_message bg_f view_all">
<div class="comiis_messages comiis_aimg_show">															  
<div class="comiis_a comiis_message_table">
<?php echo $message['3'];?>
</div>
</div>
</div>	
</div>
<?php } ?>
</div>
<?php } if($usertrades) { ?>
<div class="comiis_pltit bg_f b_t mt10 cl">	
<h2><i class="comiis_font f_c z">&#xe632</i> <?php echo $trade['seller'];?><?php echo $comiis_lang['trade_recommended_goods'];?></h2>
</div>
<div class="comiis_splist bg_f b_t b_b cl">
<ul><?php if(is_array($usertrades)) foreach($usertrades as $usertrade) { ?><li>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $usertrade['tid'];?>&amp;do=tradeinfo&amp;pid=<?php echo $usertrade['pid'];?>">				
<span class="splist_img comiis_imgbg">
<?php if($usertrade['aid']) { ?>
<img src="<?php echo getforumimg($usertrade['aid']); ?>" alt="<?php echo $usertrade['subject'];?>" />
<?php } else { ?>
<div class="comiis_notip bg_e b_ok cl" title="<?php echo $usertrade['subject'];?>">
<i class="comiis_font f_e cl">&#xe627</i>
<em class="f_d"><?php echo $comiis_lang['tip69'];?></em>
</div>
<?php } ?>
</span>
<p class="splist_box b_t">
<span class="splist_tit"><?php echo $usertrade['subject'];?></span>
<span class="splist_txt f_d">
<?php if($usertrade['displayorder'] > 0) { ?><em class="bg_del f_f z"><?php echo $comiis_lang['view60'];?></em><?php } ?>
<em class="bg_0 f_f z"><?php if($usertrade['quality'] == 1) { ?><?php echo $comiis_lang['trade_new'];?><?php } if($usertrade['quality'] == 2) { ?><?php echo $comiis_lang['trade_old'];?><?php } ?></em>
<?php echo $usertrade['locus'];?>
</span>					
</p>
<p class="splist_price">					
<?php if($usertrade['price'] > 0) { ?><span class="f_a">&#65509 <em><?php echo $usertrade['price'];?></em></span><?php } if($_G['setting']['creditstransextra']['5'] != -1 && $usertrade['credit']) { if($usertrade['price'] > 0) { ?> <span class="f_d"><?php echo $comiis_lang['trade_additional'];?> <?php } else { ?><span class="f_a"><?php } ?><em><?php echo $usertrade['credit'];?></em> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></span>
<?php } ?>
</p>
</a>
</li>
<?php } ?>
</ul>
</div>
<?php } ?>