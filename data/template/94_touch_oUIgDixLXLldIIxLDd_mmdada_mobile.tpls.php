<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:19
//Identify: 3a49cc19b55d4712771201b653f3ad5b

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_bbslist bg_f cl">
<div class="comiis_bbslist_gid bg_e cl">
<ul>	
<?php if(!empty($forum_favlist) || $comiis_app_switch['comiis_bbshot'] == 1) { $comiis_isfav = 1;?><li class="<?php if(!$gid) { ?>bg_f  <?php } ?>b_b"><?php if(!$gid) { ?><span class="bg_0"></span><?php } ?><a href="<?php if(!$gid) { ?>javascript:;<?php } else { ?>forum.php?forumlist=1<?php } ?>"><?php if($comiis_app_switch['comiis_bbshot'] == 1) { ?><?php echo $comiis_lang['all62'];?><?php } else { ?><?php echo $comiis_lang['all33'];?><?php } ?></a></li>
<?php } if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $temp) { if($temp['type'] == 'group' && $temp['status'] == 1) { if($comiis_isfav == 0 && $comiis_isnoe == 0 && !$gid) { $gid = $temp['fid'];$comiis_isnoe = 1;?><?php } if($gid == $temp['fid']) { ?>
<li class="bg_f b_b"><span class="bg_0"></span><a href="javascript:;"><?php echo $temp['name'];?></a></li>
<?php } else { ?>
<li class="b_b"><a href="forum.php?forumlist=1&amp;gid=<?php echo $temp['fid'];?>"><?php echo $temp['name'];?></a></li>
<?php } } } ?>
</ul>
</div>	
<div class="comiis_bbslist_fid cl">
<?php if(!$gid && $comiis_isfav) { if($_G['uid']) { ?>
<h2 class="b_b f_c"><?php echo $comiis_lang['all33'];?></h2>
<div class="comiis_notip cl comiis_nofavbox"<?php if(!empty($forum_favlist)) { ?> style="display:none"<?php } ?>>
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['all63'];?></span>
</div>
<ul id="comiis_favorite_box"><?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { if($favforumlist[$favorite['id']]) { $forum=$favforumlist[$favorite[id]];$forum[icon] = str_replace(array('</a>', 'align="left"', '<img '), array('', '', '<img class="comiis_noloadimage" '), preg_replace("/<a href=\"(.*?)\">/", '', $forum[icon]));?><?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?><li class="b_b" id="comiis_fidbox<?php echo $forum['fid'];?>"<?php if($comiis_recommend_forum[$forum['fid']]) { ?> comiis_num="<?php $keys = array_keys($comiis_recommend_forum_id, $forum['fid']);?><?php echo $keys['0'];?>"<?php } ?>>
                            <?php if(!$forum['redirect']) { ?>
<span class="bg_b f_d"><a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&op=delete&type=forum&formhash=<?php echo FORMHASH;?>&handlekey=forum_fav&favid=<?php echo $key;?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($_G['uid']) { ?> class="dialog"<?php } ?> comiis="handle"><?php echo $comiis_lang['all4'];?></a>
</span>
<?php } ?>
<a href="<?php echo $forumurl;?>" class="bbslist_v2ico"><?php if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" class="comiis_noloadimage" /><?php } ?></a>
<a href="<?php echo $forumurl;?>" class="post_tit"><em><?php echo $forum['name'];?></em><?php if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><i class="bg_a f_f"><?php echo $forum['todayposts'];?></i><?php } ?></a>
<?php if($forum['redirect']) { ?>
                                <p class="f_d"><a href="<?php echo $forumurl;?>"><?php echo $comiis_lang['tip254'];?></a></p>
<?php } else { ?>
                                <?php if($comiis_app_switch['comiis_forum_bkinfo'] == 1) { ?>
                                    <p class="f_d"><em><?php echo $forum['posts'];?><?php echo $comiis_lang['view5'];?></em> <?php echo $forum['favtimes'];?><?php echo $comiis_lang['all3'];?></p>
                                <?php } else { ?>                            
                                    <p class="f_d"><?php if($forum['description']) { ?><?php echo $forum['description'];?><?php } else { ?><?php echo $comiis_lang['all71'];?><?php } ?></p>
                                <?php } } ?>
</li>
<?php } } ?>
</ul>
<?php } if($comiis_app_switch['comiis_bbshot'] == 1) { ?>
<h2 class="b_b f_c"><?php echo $comiis_lang['all62'];?></h2>
<?php if(empty($comiis_recommend_forum)) { ?>
<div class="comiis_notip cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['all65'];?></span>
</div>
<?php } else { ?>
<ul id="comiis_recommend_forum_box"><?php $comiis_norecommendbox_show = 0;?><?php if(is_array($comiis_recommend_forum_id)) foreach($comiis_recommend_forum_id as $key => $temp) { if($comiis_recommend_forum[$temp] && !$favfid_list[$temp]) { $forum=$comiis_recommend_forum[$temp];$forum[icon] = str_replace(array('</a>', 'align="left"', '<img '), array('', '', '<img class="comiis_noloadimage" '), preg_replace("/<a href=\"(.*?)\">/", '', $forum[icon]));?><?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?><?php $comiis_norecommendbox_show = 1;?><li class="b_b" id="comiis_fidbox<?php echo $temp;?>" comiis_num="<?php echo $key;?>">
                                <?php if(!$forum['redirect']) { ?>
<span class="bg_c f_f"><a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=forum&id=<?php echo $temp;?>&formhash=<?php echo FORMHASH;?>&handlekey=forum_fav<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($_G['uid']) { ?> class="dialog"<?php } ?> comiis="handle">+ <?php echo $comiis_lang['all3'];?></a></span>
<?php } ?>
<a href="<?php echo $forumurl;?>" class="bbslist_v2ico"><?php if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" class="comiis_noloadimage" /><?php } ?></a>
<a href="<?php echo $forumurl;?>" class="post_tit"><em><?php echo $forum['name'];?></em><?php if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><i class="bg_a f_f"><?php echo $forum['todayposts'];?></i><?php } ?></a>
                                <?php if($forum['redirect']) { ?>
                                    <p class="f_d"><a href="<?php echo $forumurl;?>"><?php echo $comiis_lang['tip254'];?></a></p>
                                <?php } else { ?>
                                    <?php if($comiis_app_switch['comiis_forum_bkinfo'] == 1) { ?>
                                        <p class="f_d"><em><?php echo $forum['posts'];?><?php echo $comiis_lang['view5'];?></em> <?php echo $forum['favtimes'];?><?php echo $comiis_lang['all3'];?></p>
                                    <?php } else { ?>                            
                                        <p class="f_d"><?php if($forum['description']) { ?><?php echo $forum['description'];?><?php } else { ?><?php echo $comiis_lang['all71'];?><?php } ?></p>
                                    <?php } ?>
                                <?php } ?>
</li>
<?php } } ?>
</ul>
<div class="comiis_notip cl comiis_norecommendbox"<?php if($comiis_norecommendbox_show) { ?> style="display:none"<?php } ?>>
<i class="comiis_font f_e cl">&#xe62e</i>
<span class="f_d"><?php echo $comiis_lang['all66'];?></span>
</div>
<?php } } } else { ?>
<ul><?php if(is_array($catlist)) foreach($catlist as $key => $cat) { if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];$forum[icon] = str_replace(array('</a>', 'align="left"', '<img '), array('', '', '<img class="comiis_noloadimage" '), preg_replace("/<a href=\"(.*?)\">/", '', $forum[icon]));?><?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?><?php if($gid == $cat['fid']) { ?>
<li class="b_b" id="comiis_fidbox<?php echo $forum['fid'];?>">
                    <?php if(!$forum['redirect']) { if($favfid_list[$forum['fid']]) { ?>
<span class="bg_b f_d"><a href="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;type=forum&amp;formhash=<?php echo FORMHASH;?>&amp;handlekey=forum_fav&amp;favid=<?php echo $favfid_list[$forum['fid']];?>" class="dialog" comiis="handle"><?php echo $comiis_lang['all4'];?></a></span>
<?php } else { ?>
<span class="bg_c f_f"><a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=forum&id=<?php echo $forum['fid'];?>&formhash=<?php echo FORMHASH;?>&handlekey=forum_fav<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($_G['uid']) { ?> class="dialog"<?php } ?> comiis="handle">+ <?php echo $comiis_lang['all3'];?></a></span>
<?php } } ?>
<a href="<?php echo $forumurl;?>" class="bbslist_v2ico"><?php if($forum['icon']) { ?><?php echo $forum['icon'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $forum['name'];?>" class="comiis_noloadimage" /><?php } ?></a>
<a href="<?php echo $forumurl;?>" class="post_tit"><em><?php echo $forum['name'];?></em><?php if($forum['todayposts'] && !$forum['redirect'] && $comiis_app_switch['comiis_bbstodayposts'] != 1) { ?><i class="bg_a f_f"><?php echo $forum['todayposts'];?></i><?php } ?></a>
                    <?php if($forum['redirect']) { ?>
                        <p class="f_d"><a href="<?php echo $forumurl;?>"><?php echo $comiis_lang['tip254'];?></a></p>
                    <?php } else { ?>
                        <?php if($comiis_app_switch['comiis_forum_bkinfo'] == 1) { ?>
                            <p class="f_d"><em><?php echo $forum['posts'];?><?php echo $comiis_lang['view5'];?></em> <?php echo $forum['favtimes'];?><?php echo $comiis_lang['all3'];?></p>
                        <?php } else { ?>                            
                            <p class="f_d"><?php if($forum['description']) { ?><?php echo $forum['description'];?><?php } else { ?><?php echo $comiis_lang['all71'];?><?php } ?></p>
                        <?php } ?>
                    <?php } ?>
</li>
<?php } } ?>	
<?php } ?>
</ul>
<?php } ?>
</div>
</div>