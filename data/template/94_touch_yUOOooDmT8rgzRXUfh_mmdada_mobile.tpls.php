<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:29
//Identify: 4c3a6051337367d5bfa4ca3690e4a3cd

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<?php if($usertrades) { ?>
<div class="comiis_pltit bg_f b_t mt10 cl">	
<h2><i class="comiis_font f_c z">&#xe632</i> <?php echo $comiis_lang['trade_other_goods'];?></h2>
</div>
<div class="comiis_splist bg_f b_t b_b cl">
<ul><?php if(is_array($usertrades)) foreach($usertrades as $usertrade) { ?><li>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $usertrade['tid'];?>&amp;do=tradeinfo&amp;pid=<?php echo $usertrade['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>">				
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
<?php } if($userthreads) { ?>
<div class="comiis_pltit bg_f b_t mt10 cl">	
<h2><i class="comiis_font f_c z">&#xe632</i> <?php echo $trade['seller'];?> <?php echo $comiis_lang['trade_seller_other_goods'];?></h2>
</div>
<div class="comiis_cnxh bg_f b_b cl">
<ul class="cl"><?php if(is_array($userthreads)) foreach($userthreads as $userthread) { ?><li class="b_t"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $userthread['tid'];?>"><span class="f_d y"><?php echo dgmdate($userthread[dateline], 'n-j');?></span><i class="comiis_font f_d">&#xe60c</i><?php echo $userthread['subject'];?></a></li>
<?php } ?>
</ul>
</div>
<?php } ?>