<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:52
//Identify: 0555625a5ce17a73cc22ed6435471086

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(is_array($list['list'])) foreach($list['list'] as $value) { $highlight = article_title_style($value);?><?php $article_url = fetch_article_url($value);?><?php $color = array(' ', 'color1', 'color2', 'color3', 'color4', 'color5');?><?php if(!in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist2']))) { if(count($value['piclist']) < 2 || in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist3']))) { ?>
<div class="wz_list comiis_list_readimgs<?php if(in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist1']))) { ?> wz_nr<?php } ?>">
<?php if($value['pic']) { ?>
<a href="<?php echo $article_url;?>" class="b_t">
<div class="wz_img bg_e"><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo $value['pic'];?>" alt="<?php echo $value['title'];?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>></div>
<div class="wz_info">
<p <?php echo $highlight;?>><?php echo $value['title'];?><?php if($value['status'] == 1) { ?>(<?php echo $comiis_lang['tip95'];?>)<?php } ?></p>
<span class="f_d"><em><?php if($comiis_app_switch['comiis_list_hot'] >= 50 && $list_count[$value['aid']]['viewnum'] >= $comiis_app_switch['comiis_list_hot']) { ?><i class="comiis_xifont f_g"><?php echo $comiis_lang['all43'];?></i><?php } ?><?php echo $list_count[$value['aid']]['viewnum'];?><?php echo $comiis_lang['view47'];?></em><?php if(in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist1']))) { ?><?php echo $value['summary'];?><?php } else { ?><?php echo $value['dateline'];?><?php } ?></span>
</div>
</a>
<?php } else { ?>
<a href="<?php echo $article_url;?>" class="b_t wz_noimg">
<div class="wz_info">
<p class="wz_tits" <?php echo $highlight;?>><?php echo $value['title'];?><?php if($value['status'] == 1) { ?>(<?php echo $comiis_lang['tip95'];?>)<?php } ?></p>
<span class="f_d"><em><?php if($comiis_app_switch['comiis_list_hot'] >= 50 && $list_count[$value['aid']]['viewnum'] >= $comiis_app_switch['comiis_list_hot']) { ?><i class="comiis_xifont f_g"><?php echo $comiis_lang['all43'];?></i><?php } ?><?php echo $list_count[$value['aid']]['viewnum'];?><?php echo $comiis_lang['view47'];?></em><?php if(in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist1']))) { ?><?php echo $value['summary'];?><?php } else { ?><?php echo $value['dateline'];?><?php } ?></span>							
</div>
</a>
<?php } ?>
</div>
<?php } else { ?>
<div class="wz_list comiis_list_readimgs cl<?php if(in_array($_GET['catid'], dunserialize($comiis_app_switch['comiis_catlist1']))) { ?> wz_nr<?php } ?>">
<a href="<?php echo $article_url;?>" class="b_t wz_imgs">
<h2 <?php echo $highlight;?>><?php echo $value['title'];?><?php if($value['status'] == 1) { ?>(<?php echo $comiis_lang['tip95'];?>)<?php } ?></h2>
<div class="listimg">
<ul><?php if(is_array($value['piclist'])) foreach($value['piclist'] as $temp) { ?><li class="bg_e"><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo $temp;?>" alt="<?php echo $value['title'];?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>></li>
<?php } ?>
</ul>
</div>				
<span class="f_d"><em><?php if($comiis_app_switch['comiis_list_hot'] >= 50 && $list_count[$value['aid']]['viewnum'] >= $comiis_app_switch['comiis_list_hot']) { ?><i class="comiis_xifont f_g"><?php echo $comiis_lang['all43'];?></i><?php } ?><?php echo $list_count[$value['aid']]['viewnum'];?><?php echo $comiis_lang['view47'];?></em><?php echo $value['dateline'];?></span>
</a>
</div>			
<?php } } else { ?>
<li class="comiis_wzlist_img comiis_list_readimgs">
<a href="<?php echo $article_url;?>" class="<?php if($value['pic']) { ?>bg_e<?php } else { ?>bg_0 f_f <?php echo $color[array_rand($color,1)];; } ?>">
<?php if($value['pic']) { ?><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo $value['pic'];?>" alt="<?php echo $value['title'];?>" class="vm<?php if($comiis_app_switch['comiis_loadimg']) { ?> comiis_noloadimage comiis_loadimages<?php } ?>"><?php } if($value['pic']) { ?><h2><span><?php echo $value['title'];?></span></h2><?php } else { ?><h1><?php echo $value['title'];?></h1><?php } ?>
</a>
</li>
<?php } } ?>