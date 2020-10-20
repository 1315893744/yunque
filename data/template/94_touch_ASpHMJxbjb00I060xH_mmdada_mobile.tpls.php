<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:45
//Identify: 58e5986c6a78c9d318ac85a4c54a91e9

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if(is_array($list)) foreach($list as $key => $value) { ?><li class="b_t cl" id="comiis_friendbox_<?php echo $key;?>">
<?php if($value['username'] == '') { ?>
<div class="tx_img"><img src="<?php echo STATICURL;?>image/magic/hidden.gif" /></div>
<h2 class="f_d"><?php echo $comiis_lang['tip191'];?></h2>
<?php } else { ?>
<div class="tx_img"><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=profile" /><?php echo avatar($value[uid],middle);?></a></div>					
<h2>
<span class="y">
<?php if($_GET['view'] == 'blacklist') { ?>
<a href="home.php?mod=spacecp&amp;ac=friend&amp;op=blacklist&amp;subop=delete&amp;uid=<?php echo $value['uid'];?>&amp;start=<?php echo $_GET['start'];?>" class="f_a"><?php echo $comiis_lang['tip192'];?></a>
<?php } elseif($_GET['view'] == 'visitor' || $_GET['view'] == 'trace') { ?>
<span class="f_d"><?php echo dgmdate($value[dateline], 'n'.$comiis_lang['tip194'].'j'.$comiis_lang['all15']);?></span>
<?php } else { ?>
<a href="home.php?mod=spacecp&amp;ac=friend&amp;op=changenum&amp;uid=<?php echo $value['uid'];?>&amp;handlekey=hotuserhk" id="friendnum_<?php echo $value['uid'];?>" class="f_d dialog"><?php echo $comiis_lang['tip141'];?> <span id="spannum_<?php echo $value['uid'];?>"><?php echo $value['num'];?></span></a>
<?php } ?>
</span>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=profile"<?php g_color($value[groupid]);?>><?php echo $value['username'];?></a>
<span class="friend_bz f_0" id="friend_bz_<?php echo $value['uid'];?>"><?php echo $value['note'];?></span>
</h2>									
<?php } ?>
<div class="friend_txt f_d"><?php echo $value['recentnote'];?></div>
<div class="friend_gl">											
<?php if(isset($value['follow']) && $key != $_G['uid'] && $value['username'] != '') { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=<?php if($value['follow']) { ?>del<?php } else { ?>add<?php } ?>&amp;fuid=<?php echo $value['uid'];?>&amp;hash=<?php echo FORMHASH;?>&amp;from=a_followmod_<?php echo $key;?>&amp;handlekey=followmod" uid="<?php echo $value['uid'];?>" id="a_followmod_<?php echo $value['uid'];?>" class="user_gz<?php if($value['follow']) { ?> bg_b f_c<?php } else { ?> bg_0 f_f<?php } ?>" comiis="handle"><?php if($value['follow']) { ?><?php echo $comiis_lang['all4'];?><?php } else { ?><?php echo $comiis_lang['all37'];?><?php } ?></a>
<?php } if($value['isfriend'] && !in_array($_GET['view'], array('blacklist', 'visitor', 'trace', 'online'))) { ?>
<a href="home.php?mod=spacecp&amp;ac=friend&amp;op=changegroup&amp;uid=<?php echo $value['uid'];?>&amp;handlekey=editgrouphk" id="friend_group_<?php echo $value['uid'];?>" class="b_ok f_c dialog"><?php echo $comiis_lang['tip168'];?></a>
<a href="home.php?mod=spacecp&amp;ac=friend&amp;op=editnote&amp;uid=<?php echo $value['uid'];?>&amp;handlekey=editnote" id="friend_editnote" class="b_ok f_c dialog"><?php echo $comiis_lang['tip193'];?></a>
<a href="home.php?mod=spacecp&amp;ac=friend&amp;op=ignore&amp;uid=<?php echo $value['uid'];?>&amp;handlekey=delfriendhk" id="a_ignore_<?php echo $key;?>" class="b_ok f_c dialog"><?php echo $comiis_lang['all13'];?></a>
<?php } ?>
</div>
</li>
<?php } ?>