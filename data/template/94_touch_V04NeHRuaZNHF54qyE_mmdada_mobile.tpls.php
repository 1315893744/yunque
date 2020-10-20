<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:51
//Identify: 583ed495906900e3d5d81bcfcfbde5ef

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<dl id="comment_<?php echo $comment['cid'];?>_li" class="comiis_list_readimgs b_t cl">
<dt>
<?php if(!empty($comment['uid'])) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $comment['uid'];?>&amp;do=profile" class="rzlist_tximg bg_e"><img src="<?php if($comment['idtype'] == 'blogid') { ?><?php echo avatar($comment[authorid], small, true);?><?php } else { ?><?php echo avatar($comment[uid], small, true);?><?php } ?>" class="top_tximg"></a>
<?php } else { ?>
<img src="<?php echo avatar(0, small, true);?>" class="top_tximg">
<?php } ?>
<h2>
<span class="f_c y">
<?php if(!($_G['basescript'] == 'portal' && CURMODULE == 'comment' && $_GET['idtype']=='aid')) { if(!isset($_G['makehtml'])) { ?>
<a href="javascript:;" onclick="portal_comment_requote(<?php echo $comment['cid'];?>, '<?php echo $article['aid'];?>');" class="bg_e b_ok"><i class="comiis_font">&#xe679</i></a>
<?php } } if(($_G['group']['allowmanagearticle'] || $_G['uid'] == $comment['uid']) && $_G['groupid'] != 7 && !$article['idtype']) { ?>
<a href="portal.php?mod=portalcp&amp;ac=comment&amp;op=edit&amp;cid=<?php echo $comment['cid'];?>" id="c_<?php echo $comment['cid'];?>_edit" class="dialog bg_e b_ok"><i class="comiis_font">&#xe655</i></a>
<a href="portal.php?mod=portalcp&amp;ac=comment&amp;op=delete&amp;cid=<?php echo $comment['cid'];?>" id="c_<?php echo $comment['cid'];?>_delete" class="dialog bg_e b_ok"><i class="comiis_font">&#xe67f</i></a>
<?php } ?>
</span>
<?php if(!empty($comment['uid'])) { if($comment['idtype'] == 'blogid') { ?>
<a class="top_user f_b" href="home.php?mod=space&amp;uid=<?php echo $comment['authorid'];?>&amp;do=profile"><?php echo $comment['author'];?></a>
<?php } else { ?>
<a class="top_user f_b" href="home.php?mod=space&amp;uid=<?php echo $comment['uid'];?>&amp;do=profile"><?php echo $comment['username'];?></a>
<?php } } else { ?>
<span class="top_user f_b"><?php echo $comiis_lang['tip138'];?></span>
<?php } ?>
</h2>
<span class="top_time f_d"><?php echo dgmdate($comment[dateline]);?><?php if($comment['status'] == 1) { ?> (<?php echo $comiis_lang['tip95'];?>)<?php } ?></span>
</dt>
<dd><?php if($_G['adminid'] == 1 || $comment['uid'] == $_G['uid'] || $comment['status'] != 1) { if($comiis_app_switch['comiis_portal_view_quote'] == 1) { echo str_replace('class="quote"', 'class="comiis_quote bg_h f_c comiis_quotes"', $comment['message']);; } else { echo str_replace('class="quote"', 'class="comiis_quote bg_e b_ok b_d b_dashed f_c"', $comment['message']);; } } else { ?><?php echo $comiis_lang['tip139'];?><?php } ?></dd>
</dl>