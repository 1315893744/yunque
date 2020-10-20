<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:33
//Identify: 51f16c2313a8f7e8d1c3e717da33abff

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
	<div class="comiis_postli_top bg_f b_t">
<?php if($post['warned']) { ?>
<div class="comiis_viewwarning bg_f b_ok b_a f_a"<?php if($comiis_app_switch['comiis_view_reply'] == 1) { ?> style="top:45px;"<?php } ?>><?php echo $comiis_lang['warn_get'];?></div>
<?php } if($comiis_app_switch['comiis_view_reply'] == 1) { ?>
<span class="view_reply_ico">
<?php if(!$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])) { ?>
<a href="javascript:<?php if($_G['uid']) { ?>comiis_recommend('<?php echo $post['pid'];?>')<?php } ?>;" class="f_c<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } if($_G['comiis_forum_hotreply_member'][$post['pid']]) { ?> f_wb<?php } ?>" id="comiis_hotreply<?php echo $post['pid'];?>"><span class="znums" id="comiis_recommend<?php echo $post['pid'];?>"><?php if($post['postreview']['support']) { ?><?php echo $post['postreview']['support'];?><?php } ?></span> <i class="comiis_font"><?php if($_G['comiis_forum_hotreply_member'][$post['pid']]) { ?>&#xe654<?php } else { ?>&#xe63b<?php } ?></i></a>
<?php } if($_G['comiis_new'] < 1) { ?>
                    <?php if($comiis_app_switch['comiis_view_lcrate'] != 1) { ?>		
                        <?php if(!$post['first'] && $_G['group']['raterange'] && $post['authorid']) { ?>
                        <a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=rate&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?><?php } else { ?>javascript:;<?php } ?>" class="f_c dialog<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>"><i class="comiis_font">&#xe6ba</i></a>
                        <?php } ?>
                    <?php } ?>
                    <?php if($comiis_app_switch['comiis_view_quotes'] != 1) { ?>
                        <a href="<?php if($_G['uid']) { ?>forum.php?mod=post&action=reply&fid=<?php echo $_G['fid'];?>&tid=<?php echo $_G['tid'];?>&repquote=<?php echo $post['pid'];?>&page=<?php echo $page;?><?php } else { ?>javascript:;<?php } ?>" class="f_c dialog<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>"><i class="comiis_font">&#xe677</i></a>
                    <?php } ?>
                <?php } if($_G['uid']) { ?>
<span href="#moption_<?php echo $post['pid'];?>" class="popup"><i class="comiis_font top_guanli f_d">&#xe62b</i></span>
<?php } ?>
</span>	
<?php } ?>
<a href="<?php if(!$post['authorid'] || $post['anonymous']) { ?>javascript:;<?php } else { ?>home.php?mod=space&uid=<?php echo $post['authorid'];?>&do=profile<?php } ?>" class="postli_top_tximg bg_e"><img src="<?php if(!$post['authorid'] || $post['anonymous']) { ?><?php echo avatar(0, small, true);?><?php } else { ?><?php echo avatar($post[authorid], small, true);?><?php } ?>" class="top_tximg"></a>
<h2>
<?php if($comiis_app_switch['comiis_view_reply'] == 0 || $comiis_app_switch['comiis_view_reply'] == 2) { ?>
<span class="f_d y">
<?php if(isset($post['isstick'])) { ?>
<span class="f_g"><?php echo $comiis_lang['view41'];?></span> <?php echo $comiis_lang['from'];?><?php echo $post['number'];?><?php echo $postnostick;?>
<?php } elseif($post['number'] == -1) { ?>
<?php echo $comiis_lang['recommend_post'];?>
<?php } else { if(!empty($postno[$post['number']])) { ?><?php echo $postno[$post['number']];?><?php } else { ?><?php echo $post['number'];?><?php echo $postno['0'];?><?php } } if($_G['uid']) { ?>
<span href="#moption_<?php echo $post['pid'];?>" class="popup top_guanli"><i class="comiis_font">&#xe620</i></span>
<?php } ?>
</span>
<?php } if(!$post['first'] && $post['rewardfloor']) { ?>
<span class="f_d y"><span class="f_g"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;checkrush=1"><?php echo $comiis_lang['prosit'];?><?php echo $comiis_lang['rushreply_hit'];?></a></span><?php if($comiis_app_switch['comiis_view_reply'] != 1) { ?>  <?php } ?></span>
<?php } if($comiis_app_switch['comiis_view_reply'] != 2 && $_G['comiis_new'] > 2) { ?>
                <?php if($_G['forum_thread']['special'] == 3 && ($_G['forum']['ismoderator'] && (!$_G['setting']['rewardexpiration'] || $_G['setting']['rewardexpiration'] > 0 && ($_G['timestamp'] - $_G['forum_thread']['dateline']) / 86400 > $_G['setting']['rewardexpiration']) || $_G['forum_thread']['authorid'] == $_G['uid']) && $post['authorid'] != $_G['forum_thread']['authorid'] && $post['first'] == 0 && $_G['uid'] != $post['authorid'] && $_G['forum_thread']['price'] > 0) { ?>
                        <span class="y"><a href="javascript:;" onclick="setanswer(<?php echo $post['pid'];?>, '<?php echo $_GET['from'];?>')" class="top_lev bg_c f_f<?php if($_G['uid']) { ?> dialog<?php } ?>"<?php if($comiis_app_switch['comiis_view_reply'] != 1) { ?> style="margin-right:5px;"<?php } ?>><i class="comiis_font f12">&#xe683</i> <?php echo $comiis_lang['tip306'];?></a></span>
                <?php } } ?>			
<?php if(!$post['first'] && $_G['forum_thread']['special'] == 5 && $comiis_app_switch['comiis_view_reply'] != 1) { ?>
<span class="y comiis_pdbts pdbts_<?php echo intval($post['stand']); ?>">
<?php if($post['stand'] == 1) { ?><a class="top_lev bg_a f_f<?php if($_G['uid']) { ?> dialog<?php } ?>" href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=debatevote&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?>&handlekey=debatevote<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"><?php echo $comiis_lang['debate_square'];?><?php echo $post['voters'];?></a>
<?php } elseif($post['stand'] == 2) { ?><a class="top_lev bg_0 f_f<?php if($_G['uid']) { ?> dialog<?php } ?>" href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=debatevote&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?>&handlekey=debatevote<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"><?php echo $comiis_lang['debate_opponent'];?><?php echo $post['voters'];?></a>
<?php } else { ?><span class="top_lev comiis_bodybg f_d"><?php echo $comiis_lang['debate_neutral'];?></span><?php } ?>
</span>
<?php } ?>			
<?php if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>&amp;do=profile" class="top_user f_b"><?php echo $post['author'];?></a>
<?php if($comiis_app_switch['comiis_view_lev'] == 1 || $comiis_app_switch['comiis_view_lev_tit'] == 1) { ?><a<?php if($_G['comiis_new'] > 1) { ?> href="home.php?mod=spacecp&amp;ac=usergroup<?php if($_G['uid']!=$post['authorid']) { ?>&amp;gid=<?php echo $post['groupid'];?><?php } ?>"<?php } ?> class="top_lev bg_a f_f"<?php if($comiis_app_switch['comiis_view_lev_color'] != 0 && $_G['cache']['usergroups'][$post['groupid']]['color']) { ?> style="background:<?php echo $_G['cache']['usergroups'][$post['groupid']]['color'];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_view_lev'] == 1) { if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $post['stars'];?><?php } if($comiis_app_switch['comiis_view_lev_tit'] == 1) { ?> <?php echo strip_tags($_G['cache']['usergroups'][$post['groupid']]['grouptitle']);; } ?></a><?php } if($comiis_app_switch['comiis_view_gender'] == 1) { if($post['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($post['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } } $_self = $thread['author'] && $post['author'] == $thread['author'] && $post['position'] !== '1';?><?php if($_self) { ?>
<span class="top_lev bg_c f_f"><?php echo $comiis_lang['thread_author'];?></span>
<?php } } else { if(!$post['authorid']) { ?>
<a href="javascript:;" class="top_user f_b"><?php echo $comiis_lang['guest'];?> <em class="f_d"><?php echo $post['useip'];?><?php if($post['port']) { ?>:<?php echo $post['port'];?><?php } ?></em></a>
<?php } elseif($post['authorid'] && $post['username'] && $post['anonymous']) { if($_G['forum']['ismoderator']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>&amp;do=profile" target="_blank" class="top_user f_b"><?php echo $comiis_lang['anonymous'];?></a><?php } else { ?><em class="top_user f_b"><?php echo $comiis_lang['anonymous'];?></em><?php } } else { ?>
<em class="top_user f_b"><?php echo $post['author'];?></em><em class="f_d z"> <?php echo $comiis_lang['member_deleted'];?></em>
<?php } } if(!$post['first'] && $_G['forum_thread']['special'] == 5 && $comiis_app_switch['comiis_view_reply'] == 1) { ?>
<span class="comiis_pdbts pdbts_<?php echo intval($post['stand']); ?>">
<?php if($post['stand'] == 1) { ?><a class="top_lev bg_a f_f<?php if($_G['uid']) { ?> dialog<?php } ?>" href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=debatevote&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?>&handlekey=debatevote<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"><?php echo $comiis_lang['debate_square'];?><?php echo $post['voters'];?></a>
<?php } elseif($post['stand'] == 2) { ?><a class="top_lev bg_0 f_f<?php if($_G['uid']) { ?> dialog<?php } ?>" href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=debatevote&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?>&handlekey=debatevote<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"><?php echo $comiis_lang['debate_opponent'];?><?php echo $post['voters'];?></a>
<?php } else { ?><span class="top_lev comiis_bodybg f_d"><?php echo $comiis_lang['debate_neutral'];?></span><?php } ?>
</span>
<?php } if($comiis_app_switch['comiis_view_verify'] == 1 && $authorverifys) { ?><span class="comiis_verify"><?php echo $authorverifys;?></span><?php } ?>
</h2> 
<?php if($comiis_app_switch['comiis_view_reply'] == 1 || $comiis_app_switch['comiis_view_reply'] == 2) { ?>
<div class="comiis_postli_time view_replya bg_f">
<span class="f_d">
<?php if($comiis_app_switch['comiis_view_reply'] == 1) { if(isset($post['isstick'])) { ?>
<span class="f_g"><?php echo $comiis_lang['thread_stick'];?></span> <?php echo $comiis_lang['from'];?><?php echo $post['number'];?><?php echo $postnostick;?>
<?php } elseif($post['number'] == -1) { ?>
<?php echo $comiis_lang['recommend_post'];?>
<?php } else { if(!empty($postno[$post['number']])) { ?><?php echo $postno[$post['number']];?><?php } else { ?><?php echo $post['number'];?><?php echo $postno['0'];?><?php } } } if($comiis_app_switch['comiis_view_reply'] == 1) { ?>  <?php } ?><?php echo $post['dateline'];?>
</span>
</div>
<?php } ?>
</div>