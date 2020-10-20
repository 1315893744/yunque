<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:44
//Identify: 6fe0cbfdb7505679ae995a2cae491cf0

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<dl id="comment_<?php echo $value['cid'];?>_li" class="comiis_list_readimgs b_t cl">
<dt>
<?php if($value['author']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $value['authorid'];?>&amp;do=profile" class="rzlist_tximg bg_e"><img src="<?php echo avatar($value[authorid], small, true);?>" class="top_tximg"></a>
<?php } else { ?>
<img src="<?php echo avatar(0, small, true);?>" class="top_tximg">
<?php } ?>
<h2>
<span class="f_c y">
<?php if($value['authorid']!=$_G['uid'] && ($value['idtype'] != 'uid' || $space['self']) && $value['author']) { ?>
<a href="home.php?mod=spacecp&amp;ac=comment&amp;op=reply&amp;cid=<?php echo $value['cid'];?>&amp;feedid=<?php echo $feedid;?>&amp;handlekey=replycommenthk_<?php echo $value['cid'];?>" id="c_<?php echo $value['cid'];?>_reply" class="dialog bg_e b_ok"><i class="comiis_font">&#xe679</i></a></a>
<?php } if($_G['uid']) { if($value['authorid']==$_G['uid']) { ?>
<a href="home.php?mod=spacecp&amp;ac=comment&amp;op=edit&amp;cid=<?php echo $value['cid'];?>&amp;handlekey=editcommenthk_<?php echo $value['cid'];?>" id="c_<?php echo $value['cid'];?>_edit" class="dialog bg_e b_ok"><i class="comiis_font">&#xe655</i></a>
<?php } if($value['authorid']==$_G['uid'] || $value['uid']==$_G['uid'] || checkperm('managecomment')) { ?>
<a href="home.php?mod=spacecp&amp;ac=comment&amp;op=delete&amp;cid=<?php echo $value['cid'];?>&amp;handlekey=delcommenthk_<?php echo $value['cid'];?>" id="c_<?php echo $value['cid'];?>_delete" class="dialog bg_e b_ok"><i class="comiis_font">&#xe67f</i></a>
<?php } } ?>
</span>
<?php if($value['author']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $value['authorid'];?>&amp;do=profile" id="author_<?php echo $value['cid'];?>" class="top_user f_b"><?php echo $value['author'];?></a>
<?php } else { ?>
<span class="top_user f_b"><?php echo $_G['setting']['anonymoustext'];?></span>
<?php } ?>
</h2>
<span class="top_time f_d"><?php echo dgmdate($value[dateline]);?><?php if($value['status'] == 1) { ?> (<?php echo $comiis_lang['tip95'];?>)<?php } ?></span>
</dt>
<dd class="plface"><?php if($value['status'] == 0 || $value['authorid'] == $_G['uid'] || $_G['adminid'] == 1) { if($comiis_app_switch['comiis_home_view_quote'] == 1) { echo str_replace(array('class="quote"'), array('class="comiis_quote bg_h f_c comiis_quotes"'), $value['message']);; } else { echo str_replace(array('class="quote"'), array('class="comiis_quote bg_e b_ok b_d b_dashed f_c"'), $value['message']);; } } else { ?><?php echo $comiis_lang['tip139'];?><?php } ?></dd>
</dl>