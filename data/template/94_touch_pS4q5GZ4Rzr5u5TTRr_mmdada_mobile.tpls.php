<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:43
//Identify: 01b976054efd60cde91114fb0666ab67

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($otherlist && $comiis_app_switch['comiis_wzview_related'] == 1) { if($comiis_app_switch['comiis_blogv_fg'] == 0) { ?>
<div class="comiis_wztit cl">
<h2 class="f_hot">
<span class="f_d"><a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=blog&amp;view=me&amp;from=space">More...</a></span>
<i class="comiis_font">&#xe615</i> <?php echo $comiis_lang['tip142'];?>
</h2>	
</div>
<?php } elseif($comiis_app_switch['comiis_blogv_fg'] == 1) { ?>
<div class="styli_h10 bg_e b_t b_b"></div>
<div class="comiis_pltit bg_f b_b cl"><h2><span class="f12 f_d y"><a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=blog&amp;view=me&amp;from=space">More...</a></span><?php echo $comiis_lang['tip142'];?></h2></div>
<?php } elseif($comiis_app_switch['comiis_blogv_fg'] == 2) { ?>
<div class="comiis_pltit bg_e b_t b_b cl"><h2><span class="f12 f_d y"><a href="home.php?mod=space&amp;uid=<?php echo $blog['uid'];?>&amp;do=blog&amp;view=me&amp;from=space">More...</a></span><?php echo $comiis_lang['tip142'];?></h2></div>
<?php } ?>
<div class="comiis_wzlist cl">
<ul><?php if(is_array($otherlist)) foreach($otherlist as $value) { ?><li><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=blog&amp;id=<?php echo $value['blogid'];?>"><i class="comiis_font f_d">&#xe60c</i><?php echo $value['subject'];?></a></li>
<?php } ?>
</ul>
</div>
<?php } if($newlist && $comiis_app_switch['comiis_wzview_hotnews'] == 1) { if($comiis_app_switch['comiis_blogv_fg'] == 0) { ?>
<div class="comiis_wztit cl">
<h2 class="f_hot"><i class="comiis_font">&#xe615</i> <?php echo $comiis_lang['tip143'];?></h2>
</div>
<?php } elseif($comiis_app_switch['comiis_blogv_fg'] == 1) { ?>
<div class="styli_h10 bg_e b_t b_b"></div>
<div class="comiis_pltit bg_f b_b cl"><h2><?php echo $comiis_lang['tip143'];?></h2></div>
<?php } elseif($comiis_app_switch['comiis_blogv_fg'] == 2) { ?>
<div class="comiis_pltit bg_e b_t b_b cl"><h2><?php echo $comiis_lang['tip143'];?></h2></div>
<?php } ?>
<div class="comiis_wzlist cl">
<ul><?php if(is_array($newlist)) foreach($newlist as $value) { ?><li><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=blog&amp;id=<?php echo $value['blogid'];?>"><i class="comiis_font f_d">&#xe60c</i><?php echo $value['subject'];?></a></li>
<?php } ?>
</ul>
</div>
<?php } ?>