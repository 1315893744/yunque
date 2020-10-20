<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:19
//Identify: 79c75ce37a56992ea2fbf34f458b82c8

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($comiis_app_switch['comiis_bbstimg']) { ?><?php echo $comiis_app_switch['comiis_bbstimg'];?><?php } if($comiis_app_switch['comiis_bbstj'] == 1) { ?>
<div class="comiis_forum_tj<?php if($comiis_app_switch['comiis_header_style'] == 0) { ?> bg_f b_b<?php } elseif($comiis_app_switch['comiis_header_style'] == 1) { ?> bg_e b_b<?php } ?> cl"<?php if(empty($gid) && $announcements && $comiis_app_switch['comiis_bbsan'] == 1) { ?> style="margin-bottom:0;"<?php } ?>>
<ul>
<li><span class="f_c"><?php echo $comiis_lang['all67'];?></span><em class="f_b"><?php if($todayposts) { ?><?php echo $todayposts;?><?php } else { ?>0<?php } ?></em></li>
<li><span class="f_c"><?php echo $comiis_lang['all68'];?></span><em class="f_b"><?php if($posts) { ?><?php echo $posts;?><?php } else { ?>0<?php } ?></em></li>
<li><span class="f_c"><?php echo $comiis_lang['all69'];?></span><em class="f_b"><?php echo $_G['cache']['userstats']['totalmembers'];?></em></li>
</ul>
</div>
<?php } if(empty($gid) && $announcements && $comiis_app_switch['comiis_bbsan'] == 1) { ?>
<div class="comiis_forum_an bg_f b_b cl">
<div id="an">
<dl class="cl">
<dt class="z bg_a f_f"><?php echo $comiis_lang['announcements'];?></dt>
<dd>
<div id="anc">
<ul id="ancl"><?php echo str_replace(array(' class="xi2"', ' target="_blank"'), array("", ""), $announcements);; ?></ul>
</div>
</dd>
</dl>
</div>
</div>
<?php } if(!$_G['setting']['mobile']['mobileforumview']) { $comiis_mobile_forum_cookies = getgpc('comiis_mobile_forum_cookies', 'C');?><?php } else { $comiis_mobile_forum_cookies = '';?><?php } if($_G['uid'] && !empty($forum_favlist)) { $forumcolumns = count($forum_favlist) >= 4 ? 4 : count($forum_favlist);?><div class="comiis_forumlist bg_f b_t b_b cl">
<div class="comiis_bbs_show b_b cl<?php if($_G['setting']['mobile']['mobileforumview'] || !(strpos($comiis_mobile_forum_cookies, '-0-') === FALSE)) { ?> comiis_forum_close<?php } ?>" href="#sub_forum_0">		
<h2><code class="bg_f b_ok"></code><a href="javascript:;"><?php echo $comiis_lang['all70'];?></a></h2>
</div>
<div id="sub_forum_0" class="comiis_forum_nbox <?php if($forumcolumns == 1 || $forumcolumns == 0) { ?>comiis_forum_one<?php } elseif($forumcolumns == 2) { ?>comiis_forum_two<?php } elseif($forumcolumns == 3) { ?>comiis_forum_three<?php } elseif($forumcolumns > 3) { ?>comiis_forum_box<?php } ?>"<?php if($_G['setting']['mobile']['mobileforumview'] || !(strpos($comiis_mobile_forum_cookies, '-0-') === FALSE)) { ?> style="display:none;"<?php } ?>>
<ul><?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { if($favforumlist[$favorite['id']]) { $forum=$favforumlist[$favorite[id]];  $forum[icon] = str_replace(array('</a>', 'align="left"'), '', preg_replace("/<a href=\"(.*?)\">/", '', $forum[icon]));?><?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?><?php if($forumcolumns == 1 || $forumcolumns == 0) { ?>
<li><a href="<?php echo $forumurl;?>" class="b_b"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><?php if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><span class="bg_a f_f"><?php echo $forum['todayposts'];?></span><?php } ?><em class="z"><?php if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" /><?php } ?></em><?php echo $forum['name'];?><?php if($forum['redirect']) { ?><p class="f_d"><?php echo $comiis_lang['tip254'];?></p><?php } else { ?><p class="f_d"><?php if($forum['description']) { ?><?php echo $forum['description'];?><?php } else { ?><?php echo $comiis_lang['all71'];?><?php } ?></p><?php } ?></a></li>
<?php } elseif($forumcolumns == 2) { ?>
<li><a href="<?php echo $forumurl;?>" class="b_b b_r"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><em class="z"><?php if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" /><?php } ?></em><span><?php echo $forum['name'];?></span><?php if($forum['redirect']) { ?><p class="f_d"><?php echo $comiis_lang['tip254'];?></p><?php } else { if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><p class="f_a"><?php echo $comiis_lang['all72'];?>: <?php echo $forum['todayposts'];?></p><?php } else { ?><p class="f_d"><?php echo $comiis_lang['all64'];?>: <?php echo $forum['posts'];?></p><?php } } ?></a></li>
<?php } elseif($forumcolumns > 2) { ?>
<li><a href="<?php echo $forumurl;?>" class="b_b b_r"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><em><?php if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><span class="bg_a f_f"><?php echo $forum['todayposts'];?></span><?php } if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" /><?php } ?></em><p><?php echo $forum['name'];?></p></a></li>
<?php } } } ?>
</ul>
</div>
</div>
<?php } elseif($_G['uid']) { $count = C::t('home_favorite')->count_by_uid_idtype($_G['uid'], 'fid');?><?php if($count) { dsetcookie('nofavfid', '', -1);?><?php } } if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><div class="comiis_forumlist bg_f b_t b_b cl">
<div class="comiis_bbs_show b_b cl<?php if($_G['setting']['mobile']['mobileforumview'] || !(strpos($comiis_mobile_forum_cookies, '-'.$cat['fid'].'-') === FALSE)) { ?> comiis_forum_close<?php } ?>" href="#sub_forum_<?php echo $cat['fid'];?>">		
<h2><code class="bg_f b_ok"></code><a href="javascript:;"><?php echo $cat['name'];?></a></h2>
</div>
<div id="sub_forum_<?php echo $cat['fid'];?>" class="comiis_forum_nbox <?php if($cat['forumcolumns'] == 1 || $cat['forumcolumns'] == 0) { ?>comiis_forum_one<?php } elseif($cat['forumcolumns'] == 2) { ?>comiis_forum_two<?php } elseif($cat['forumcolumns'] == 3) { ?>comiis_forum_three<?php } elseif($cat['forumcolumns'] > 3) { ?>comiis_forum_box<?php } ?>"<?php if($_G['setting']['mobile']['mobileforumview'] || !(strpos($comiis_mobile_forum_cookies, '-'.$cat['fid'].'-') === FALSE)) { ?> style="display:none;"<?php } ?>>
<ul><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];  $forum[icon] = str_replace(array('</a>', 'align="left"'), '', preg_replace("/<a href=\"(.*?)\">/", '', $forum[icon]));?><?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?><?php if($cat['forumcolumns'] == 1 || $cat['forumcolumns'] == 0) { ?>
<li><a href="<?php echo $forumurl;?>" class="b_b"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><?php if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><span class="bg_a f_f"><?php echo $forum['todayposts'];?></span><?php } ?><em class="z"><?php if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" /><?php } ?></em><?php echo $forum['name'];?><?php if($forum['redirect']) { ?><p class="f_d"><?php echo $comiis_lang['tip254'];?></p><?php } else { ?><p class="f_d"><?php if($forum['description']) { ?><?php echo $forum['description'];?><?php } else { ?><?php echo $comiis_lang['all71'];?><?php } ?></p><?php } ?></a></li>
<?php } elseif($cat['forumcolumns'] == 2) { ?>
<li><a href="<?php echo $forumurl;?>" class="b_b b_r"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><em class="z"><?php if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" /><?php } ?></em><span><?php echo $forum['name'];?></span><?php if($forum['redirect']) { ?><p class="f_d"><?php echo $comiis_lang['tip254'];?></p><?php } else { if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><p class="f_a"><?php echo $comiis_lang['all72'];?>: <?php echo $forum['todayposts'];?></p><?php } else { ?><p class="f_d"><?php echo $comiis_lang['all64'];?>: <?php echo $forum['posts'];?></p><?php } } ?></a></li>
<?php } elseif($cat['forumcolumns'] > 2) { ?>
<li><a href="<?php echo $forumurl;?>" class="b_b b_r"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><em><?php if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><span class="bg_a f_f"><?php echo $forum['todayposts'];?></span><?php } if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" /><?php } ?></em><p><?php echo $forum['name'];?></p></a></li>
<?php } } ?>
</ul>
</div>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_middle_mobile'])) echo $_G['setting']['pluginhooks']['index_middle_mobile'];?>
</div>