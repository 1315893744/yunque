<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:33
//Identify: 4d6ff2b7f6c666196b81d3079fdabe27

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<?php if($_G['forum_threadstamp'] && $comiis_app_switch['comiis_view_header'] != 1) { ?>
<div class="comiis_threadstamp<?php if($comiis_app_switch['comiis_view_header'] == 2) { ?>_v2<?php } ?>"><img src="<?php echo STATICURL;?>image/stamp/<?php echo $_G['forum_threadstamp']['url'];?>" /></div>
<?php } if($comiis_app_switch['comiis_view_header'] == 1 || $comiis_app_switch['comiis_view_header'] == 2) { if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
<div class="<?php if($comiis_app_switch['comiis_view_header'] == 1 && $_G['comiis_new'] > 2) { ?>comiis_top_nums2<?php } else { ?>comiis_top_nums1<?php } ?>">
<?php if($post['authorid'] != $_G['uid']) { if(helper_access::check_module('follow')) { if(!comiis_ckfollow($post['authorid']) || !$_G['uid']) { ?>
<a href="<?php if(!$_G['uid']) { ?>javascript:;<?php } else { ?>home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid=<?php echo $post['authorid'];?><?php } ?>"<?php if($_G['uid']) { ?> id="followmod"<?php } ?> class="top_nums bg_c f_f followmod<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>"><?php echo $comiis_lang['all3'];?><?php echo $comiis_lang['view4'];?></a>
<?php } else { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $post['authorid'];?>" id="followmod" class="top_nums bg_b f_d followmod"><?php echo $comiis_lang['all4'];?><?php echo $comiis_lang['view4'];?></a>
<?php } } } ?>
</div>
<?php } } ?>
<a href="<?php if(!$post['authorid'] || $post['anonymous']) { ?>javascript:;<?php } else { ?>home.php?mod=space&uid=<?php echo $post['authorid'];?>&do=profile<?php } ?>" class="postli_top_tximg bg_e"><img src="<?php if(!$post['authorid'] || $post['anonymous']) { ?><?php echo avatar(0, small, true);?><?php } else { ?><?php echo avatar($post[authorid], small, true);?><?php } ?>" class="top_tximg"></a>
<h2>
<?php if($post['authorid'] != $_G['uid']) { if(helper_access::check_module('follow') && $comiis_app_switch['comiis_view_header'] == 0) { if($post['authorid'] && $post['username'] && !$post['anonymous']) { if(!comiis_ckfollow($post['authorid']) || !$_G['uid']) { ?>
<a href="<?php if(!$_G['uid']) { ?>javascript:;<?php } else { ?>home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid=<?php echo $post['authorid'];?><?php } ?>"<?php if($_G['uid']) { ?> id="followmod"<?php } ?> class="top_nums bg_c f_f y followmod<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>"><?php if($_G['uid']) { ?><?php echo $comiis_lang['all3'];?><?php } ?><?php echo $comiis_lang['view4'];?></a>
<?php } else { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $post['authorid'];?>" id="followmod" class="top_nums bg_b f_d y followmod"><?php echo $comiis_lang['all4'];?><?php echo $comiis_lang['view4'];?></a>
<?php } } } } else { ?>
<span class="top_nums bg_c f_f y">
<?php if(isset($post['isstick'])) { ?>
<?php echo $comiis_lang['replystick'];?> / <?php echo $comiis_lang['from'];?><?php echo $post['number'];?><?php echo $postnostick;?>
<?php } elseif($post['number'] == -1) { ?>
<?php echo $comiis_lang['recommend_post'];?>
<?php } else { if(!empty($postno[$post['number']])) { ?><?php echo $postno[$post['number']];?><?php } else { ?><?php echo $post['number'];?><?php echo $postno['0'];?><?php } } ?>
</span>
<?php } ?>			
<?php if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>&amp;do=profile" class="top_user f_b"><?php echo $post['author'];?></a>
<?php if($post['authortitle'] && ($comiis_app_switch['comiis_view_lev'] == 1 || $comiis_app_switch['comiis_view_lev_tit'] == 1)) { ?><a<?php if($_G['comiis_new'] > 1) { ?> href="home.php?mod=spacecp&amp;ac=usergroup<?php if($_G['uid']!=$post['authorid']) { ?>&amp;gid=<?php echo $post['groupid'];?><?php } ?>"<?php } ?> class="top_lev bg_a f_f"<?php if($comiis_app_switch['comiis_view_lev_color'] != 0 && $_G['cache']['usergroups'][$post['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$post['groupid']]['color'];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_view_lev'] == 1) { if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $post['stars'];?><?php } if($comiis_app_switch['comiis_view_lev_tit'] == 1) { ?> <?php echo strip_tags($_G['cache']['usergroups'][$post['groupid']]['grouptitle']);; } ?></a><?php } if($comiis_app_switch['comiis_view_gender'] == 1) { if($post['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($post['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } } } else { if(!$post['authorid']) { ?>
<a href="javascript:;" class="top_user f_b"><?php echo $comiis_lang['guest'];?> <em class="f_d"><?php echo $post['useip'];?><?php if($post['port']) { ?>:<?php echo $post['port'];?><?php } ?></em></a>
<?php } elseif($post['authorid'] && $post['username'] && $post['anonymous']) { if($_G['forum']['ismoderator']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>&amp;do=profile" target="_blank" class="top_user f_b"><?php echo $comiis_lang['anonymous'];?></a><?php } else { ?><em class="top_user f_b"><?php echo $comiis_lang['anonymous'];?></em><?php } } else { ?>
<em class="top_user f_b"><?php echo $post['author'];?></em><em class="f_d z"> <?php echo $comiis_lang['member_deleted'];?></em>
<?php } } if($comiis_app_switch['comiis_view_verify'] == 1 && $authorverifys) { ?><span class="comiis_verify"><?php echo $authorverifys;?></span><?php } ?>
</h2>			
<div class="comiis_postli_time">
<?php if($comiis_app_switch['comiis_view_header'] == 0) { ?>
<span class="top_views f_d y">
<i class="comiis_font">&#xe63a</i><?php echo $_G['forum_thread']['views'];?>
<i class="comiis_font">&#xe679</i><?php echo $_G['forum_thread']['allreplies'];?>
</span>
<?php } ?>
<span class="f_d">
                <?php echo $post['dateline'];?>
                <?php if($comiis_app_switch['comiis_view_typeid'] == 3) { ?>
                    <?php if($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) { ?>
                        <?php if(!IS_ROBOT && ($_G['forum']['threadtypes']['listable'] || $_G['forum']['status'] == 3)) { ?>
                            <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $_G['forum_thread']['typeid'];?>"><?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?></a>
                        <?php } else { ?>
                            <?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?>
                        <?php } ?>
                    <?php } ?>
                    <?php if($threadsorts && $_G['forum_thread']['sortid']) { ?>
                        <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?>"><?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?></a>
                    <?php } ?>
                <?php } ?>
</span>
</div>