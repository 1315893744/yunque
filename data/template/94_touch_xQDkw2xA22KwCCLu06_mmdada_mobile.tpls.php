<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:28
//Identify: 8eb32a7470219d17b85b74e2739e4e89

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($usertrades) { ?>
<div class="comiis_pltit bg_f b_t mt10 cl">	
<h2><i class="comiis_font f_c z">&#xe632</i> <?php echo $trade['seller'];?> <?php echo $comiis_lang['trade_recommended_goods'];?></h2>
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