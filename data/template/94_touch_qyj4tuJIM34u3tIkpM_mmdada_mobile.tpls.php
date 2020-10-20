<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:38
//Identify: f66fb3014fb9c0dae9bf2ef0c871837f

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<?php if($grouplist) { if($view == 'join') { ?>
<div class="comiis_uibox bg_f b_t b_b mt10 cl">
<div class="comiis_userlist01 cl">
<ul><?php if(is_array($grouplist)) foreach($grouplist as $groupid => $group) { ?><li class="b_t">
<a href="forum.php?mod=group&amp;fid=<?php echo $groupid;?>" title="<?php echo $group['name'];?>" class="block">
<i class="comiis_font f_d">&#xe60c</i>
<span class="list01_limg bg_e"><img src="<?php echo $group['icon'];?>" alt="<?php echo $group['name'];?>" /></span>
<p class="tit"><?php echo $group['name'];?><?php if($group['flevel'] == '-1') { ?><em class="f_a">(<?php echo $comiis_lang['group_wait_mod'];?>)</em><?php } ?></p>
<p class="txt f_c"><?php echo $comiis_group_lang['014'];?> <?php echo $group['threads'];?> / <?php echo $comiis_group_lang['028'];?> <?php if($group['todayposts']) { ?><?php echo $group['todayposts'];?><?php } else { ?>0<?php } ?></p>
</a>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } elseif($view == 'manager') { ?>
<div class="comiis_uibox bg_f b_t b_b mt10 cl">
<div class="comiis_userlist01 cl">
<ul><?php if(is_array($grouplist)) foreach($grouplist as $groupid => $group) { ?>            
<li class="b_t">
<p class="ybtn">
<a href="forum.php?mod=group&amp;action=manage&amp;fid=<?php echo $groupid;?>" class="comiis_sendbtn bg_0 f_f"> <?php echo $comiis_group_lang['007'];?></a>
</p>
<a href="forum.php?mod=group&amp;fid=<?php echo $groupid;?>" class="list01_limg bg_e"><img src="<?php echo $group['icon'];?>" alt="<?php echo $group['name'];?>" /></a>
<p class="tit"><a href="forum.php?mod=group&amp;fid=<?php echo $groupid;?>" title="<?php echo $group['name'];?>"><?php echo $group['name'];?><?php if($group['flevel'] == '-1') { ?><em class="f_a">(<?php echo $comiis_lang['group_wait_mod'];?>)</em><?php } ?></a></p>
<p class="txt f_c"><?php echo $comiis_group_lang['014'];?> <?php echo $group['threads'];?> / <?php echo $comiis_group_lang['028'];?> <?php if($group['todayposts']) { ?><?php echo $group['todayposts'];?><?php } else { ?>0<?php } ?></p>
</a>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>      
<?php if($multipage) { ?><?php echo $multipage;?><?php } } else { if($view == 'manager') { ?>
<div class="comiis_notip comiis_sofa mt15 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span><em class="f_d"><?php echo $comiis_group_lang['029'];?><?php echo $comiis_group_lang['001'];?></em><br><a href="forum.php?mod=group&amp;action=create" class="bg_c f_f"><?php echo $comiis_group_lang['030'];?></a></span>
</div>
<?php } elseif($view == 'join') { ?>
<div class="comiis_notip comiis_sofa mt15 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span><em class="f_d"><?php echo $comiis_group_lang['031'];?><?php echo $comiis_group_lang['001'];?></em><br><a href="group.php?gid=3&amp;hot=yes" class="bg_c f_f"><?php echo $comiis_group_lang['032'];?><?php echo $comiis_group_lang['001'];?></a></span>
</div>		
<?php } ?>     
<?php } ?> 