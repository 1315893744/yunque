<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 18:06
//Identify: be9292f449f8e29a53f24aee7b662666

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_forumlist mb0 cl">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?><li class="comiis_mmlist bg_f b_t b_b mt10 comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
<div class="mmlist_li_top cl">
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="top_tximg"><img src="<?php if($thread['authorid'] && $thread['author']) { ?><?php echo avatar($thread['authorid'], small, true);?><?php } else { ?><?php echo avatar(0, small, true);?><?php } ?>"></a>
<h2>
<em class="y">
<?php if(!($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay') && $_G['basescript'] != 'group') { ?>
                            <?php if($_G['cache']['forums'][$thread['fid']]['name']) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>" class="f_ok">#<?php echo $_G['cache']['forums'][$thread['fid']]['name'];?></a>
<?php } } elseif($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $thread['sortid'];?>" class="f_ok">#<?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></a>
<?php } elseif($thread['typeid'] && $_G['forum']['threadtypes']['types'][$thread['typeid']]) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $thread['typeid'];?>" class="f_ok">#<?php echo $_G['forum']['threadtypes']['types'][$thread['typeid']];?></a>
<?php } ?>				
</em>
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="top_user"><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></a>
<?php if($thread['authorid'] && $thread['author']) { ?>
                            <?php if($_G['comiis_new'] <= 1) { ?>
                                <span class="top_lev <?php if($member[$thread['authorid']]['stars']) { ?>bg_a f_f<?php } else { ?>bg_b f_d<?php } ?>"<?php if($comiis_app_switch['comiis_list_lev_color'] != 0 && $groupcolor[$thread['authorid']]) { ?> style="background:<?php echo $groupcolor[$thread['authorid']];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $member[$thread['authorid']]['stars'];?><?php if($_G['comiis_list_group'][$thread['authorid']]) { ?><?php echo $_G['comiis_list_group'][$thread['authorid']];?><?php } ?></span>
                                <?php if($member[$thread['authorid']]['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($member[$thread['authorid']]['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } ?>
                            <?php } else { ?>
                                <?php if($comiis_app_switch['comiis_list_lev'] == 1 || $comiis_app_switch['comiis_list_lev_tit'] == 1) { ?><span class="top_lev <?php if($member[$thread['authorid']]['stars']) { ?>bg_a f_f<?php } else { ?>bg_b f_d<?php } ?>"<?php if($comiis_app_switch['comiis_list_lev_color'] != 0 && $groupcolor[$thread['authorid']]) { ?> style="background:<?php echo $groupcolor[$thread['authorid']];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_list_lev'] == 1) { if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $member[$thread['authorid']]['stars'];?><?php } if($comiis_app_switch['comiis_list_lev_tit'] == 1) { ?> <?php if($_G['comiis_list_group'][$thread['authorid']]) { ?><?php echo $_G['comiis_list_group'][$thread['authorid']];?><?php } } ?></span><?php } ?>
                                <?php if($comiis_app_switch['comiis_list_gender'] == 1) { if($member[$thread['authorid']]['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($member[$thread['authorid']]['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } } ?>                                
                                <?php if($comiis_app_switch['comiis_list_verify'] == 1 && !empty($_G['comiis_verify'][$thread['authorid']])) { ?><span class="comiis_verify"><?php echo $_G['comiis_verify'][$thread['authorid']];?></span><?php } ?>
                            <?php } ?>						
<?php } ?>						
</h2>			
<div class="mmlist_li_time b_b comiis_tm">
<span class="f_c"><?php if($comiis_app_switch['comiis_listtime'] == 1 && $_G['basescript'] != 'group') { ?><?php echo $thread['lastpost'];?><?php } else { ?><?php echo $comiis_lang['poston'];?> <?php echo $thread['dateline'];?><?php } ?></span>
<?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="f_g">&nbsp;<?php echo $comiis_lang['thread_stick'];?></span>
<?php } ?>
</div>
</div>	
<div class="mmlist_li_box kmleft cl">					
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
<?php if($comiis_forumlist_notit == 1) { ?>
                        <?php if($comiis_app_switch['comiis_list_zntits'] == 1 && $_G['comiis_new'] >= 1) { ?>
                            <?php if(trim($thread['subject']) != cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), '') || !empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?>
                            <h2 <?php echo $thread['highlight'];?>><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></h2>
                            <?php } ?>
                        <?php } else { ?>
                            <h2 <?php echo $thread['highlight'];?>><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></h2>
                        <?php } ?>
                    <?php } if(!($comiis_forumlist_notit == 1 && !empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key]) && trim($thread['subject']) == cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), ''))) { ?>
<div class="list_body<?php if($comiis_forumlist_notit == 1) { if(trim($thread['subject']) != cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), '')) { ?> f_b<?php } } ?>"<?php if($comiis_forumlist_notit != 1 || (trim($thread['subject']) == cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), ''))) { if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?> style="font-size:16px;max-height:72px;line-height:24px;"<?php } } ?>><?php if($thread['price'] && !$thread['special'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip255'];?></p><?php } elseif($thread['readperm'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip256'];?></p><?php } else { ?><?php echo $message[$thread['tid']];?><?php } ?></div>
<?php } if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?>	
                        <?php if($thread['attachment'] == 2 && $comiis_pic_list[$thread['tid']]['num'] == 1) { ?>
                        <div class="comiis_pyqlist_img">
                            <img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($comiis_pic_lists[$thread['tid']]['aid']['0'], '0', '360', '9999'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>>
                        </div>
                        <?php } ?>
                        <?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] > 1)) { ?>
                        <div class="comiis_pyqlist_imgs<?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 4)) { ?> comiis_pyqlist_imga<?php } ?>">
                            <ul>
                                <?php if(is_array($comiis_pic_lists[$thread['tid']]['aid'])) foreach($comiis_pic_lists[$thread['tid']]['aid'] as $temp) { ?>                                        <li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '220', '200'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>></li>
                                <?php } ?>
                                <?php if($comiis_pic_list[$thread['tid']]['nums'] > $comiis_pic_list['all_num']) { ?>
                                    <span class="nums f_f"><i class="comiis_font">&#xe627</i><?php echo $comiis_pic_list[$thread['tid']]['nums'];?></span>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } } ?>
</a>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) echo $_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key];?>					
</div>	
<div class="comiis_mmlist_bottom kmlefts cl">				
<ul class="cl">
<li class="kmview f_d"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><i class="comiis_font">&#xe67b</i><?php echo $thread['views'];?></a></li>
<li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="b_ok f_c bg_e"><i class="comiis_font">&#xe679</i><?php if($thread['replies'] == 0) { ?><?php echo $comiis_lang['collection_commentnum'];?><?php } else { ?><?php echo $thread['replies'];?><?php } ?></a></li>
<li id="comiis_listzhan_<?php echo $thread['tid'];?>"><a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=recommend&handlekey=recommend_add&do=add&tid=<?php echo $thread['tid'];?>&hash=<?php echo FORMHASH;?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" tid="<?php echo $thread['tid'];?>" class="b_ok f_c bg_e <?php if($_G['uid']) { ?>comiis_recommend_addkey<?php } if($_G['comiis_memberrecommend'][$thread['tid']]) { ?> f_wb<?php } ?>"><i class="comiis_font"><?php if($_G['comiis_memberrecommend'][$thread['tid']] && $_G['comiis_new'] > 2) { ?>&#xe654<?php } else { ?>&#xe63b<?php } ?></i><span class="num-all_<?php echo $thread['tid'];?>"><?php if($thread['recommend_add']) { ?><?php echo $thread['recommend_add'];?><?php } ?></span><?php echo $comiis_lang['view7'];?></a></li>
</ul>
</div>
</li>
<?php } } else { ?>
<li class="comiis_notip comiis_sofa bg_f b_t b_b mt10 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['forum_nothreads'];?></span>
</li>
<?php } ?>
</ul>
</div>