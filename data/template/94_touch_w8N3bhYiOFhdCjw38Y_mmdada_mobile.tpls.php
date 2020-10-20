<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:35
//Identify: f84d6a0b86050586d81148267779039b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<?php if($trades) { ?>
<div class="comiis_splist b_l b_r b_b mb15 cl">
<ul><?php if(is_array($trades)) foreach($trades as $key => $trade) { ?><li id="trade<?php echo $trade['pid'];?>">
<a href="forum.php?mod=viewthread&amp;do=tradeinfo&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $trade['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>">				
<span class="splist_img comiis_imgbg">
 <?php if($trade['thumb']) { ?>
<img src="<?php echo $trade['thumb'];?>" alt="<?php echo $trade['subject'];?>" class="vm"/>
<?php } else { ?>
<div class="comiis_notip bg_e b_ok cl" title="<?php echo $trade['subject'];?>">
<i class="comiis_font f_e cl">&#xe627</i>
<em class="f_d"><?php echo $comiis_lang['tip69'];?></em>
</div>
<?php } ?>
</span>
<p class="splist_box b_t">
<span class="splist_tit"><?php echo $trade['subject'];?></span>
<span class="splist_txt f_d">								
<?php if($trade['displayorder'] > 0) { ?><em class="bg_del f_f z"><?php echo $comiis_lang['view60'];?></em><?php } ?>
<em class="bg_0 f_f z"><?php if($trade['quality'] == 1) { ?><?php echo $comiis_lang['tip205'];?><?php } if($trade['quality'] == 2) { ?><?php echo $comiis_lang['tip206'];?><?php } ?></em>
<?php if($trade['locus']) { ?><?php echo $trade['locus'];?><?php } ?>
</span>
</p>
<p class="splist_price">					
<?php if($trade['price'] > 0) { ?><span class="f_a">&yen; <em><?php echo $trade['price'];?></em></span><?php } if($_G['setting']['creditstransextra']['5'] != -1 && $trade['credit']) { if($trade['price'] > 0) { ?> <span class="f_d"><?php echo $comiis_lang['tip207'];?> <?php } else { ?><span class="f_a"><?php } ?><em><?php echo $trade['credit'];?></em>&nbsp;<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?></span>
<?php } ?>
</p>
</a>
</li>
<?php } ?>
</ul>
</div>
<?php } ?>	
<div id="postmessage_<?php echo $post['pid'];?>"><?php echo $post['counterdesc'];?></div>