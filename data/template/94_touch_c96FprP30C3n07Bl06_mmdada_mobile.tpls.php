<?php
//Discuz! cache file, DO NOT modify me!
//Created: Jan 15, 2019-01-05 11:29
//Identify: 463af8577c6f468697e116eee80816ae

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_G['basescript'] == 'group' && $_G['mod'] != 'forumdisplay') { $group_names = $group_all_fids = array();?><?php if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $a => $thread) { if($thread['fid']) { $group_all_fids[] = $thread['fid'];?><?php } } $group_names = C::t('forum_forum')->fetch_all_name_by_fid($group_all_fids);?><?php } ?>
<div class="comiis_forumlist bg_f mb0<?php if(!$_GET['inajax']) { ?> mt10 b_t<?php } ?> cl"<?php if(!$_GET['inajax']) { ?> style="padding-top:15px;"<?php } ?>>
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?><li class="forumlist_li comiis_tukuimg mt0 mb15 comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>                
                <?php if($thread['attachment'] == 2) { ?>
                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="comiis_tukubox bg_e">
                    <div class="listimg comiis_imgbgx">
                        <?php if(is_array($comiis_pic_lista[$thread['tid']]['aid'])) foreach($comiis_pic_lista[$thread['tid']]['aid'] as $temp) { ?>                           <img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '600', '500'); ?>" class="vm<?php if($comiis_app_switch['comiis_loadimg']) { ?> comiis_noloadimage comiis_loadimages<?php } ?>">
                        <?php } ?>
                        <?php if($comiis_pic_list[$thread['tid']]['nums'] > $comiis_pic_list['all_num']) { ?>
                          <span class="nums f_f"><i class="comiis_font">&#xe627</i><?php echo $comiis_pic_list[$thread['tid']]['nums'];?></span>
                        <?php } ?>
                    </div>
                </a>
                <?php } ?>           
                <div class="comiis_tukuuser<?php if($thread['attachment'] == 2) { ?> comiis_tukufd f_f<?php } else { ?> bg_e<?php } ?>">                    
                    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
                        <h1 class="mb5 cl">
                        <?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?>
                        <?php if(!($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay') && $_G['basescript'] != 'group') { ?>
                            <?php if($_G['cache']['forums'][$thread['fid']]['name']) { ?><span class="bg_0 f_f">#<?php echo $_G['cache']['forums'][$thread['fid']]['name'];?></span><?php } ?>
                        <?php } elseif($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?>
                            <span class="bg_0 f_f">#<?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></span>
                        <?php } elseif($thread['typeid'] && $_G['forum']['threadtypes']['types'][$thread['typeid']]) { ?>
                            <span class="bg_0 f_f">#<?php echo $_G['forum']['threadtypes']['types'][$thread['typeid']];?></span>
                        <?php } if($_G['basescript'] == 'group') { ?>
                            <?php if($group_names[$thread['fid']]['name']) { ?>
                                <span class="bg_0 f_f">#<?php echo $group_names[$thread['fid']]['name'];?></span>
<?php } ?>
                        <?php } ?>
                        <?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="<?php if($thread['attachment'] == 2) { ?>bg_a f_f<?php } else { ?>comiis_xifont f_g<?php } ?>"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } ?>
                        <?php if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="bg_del f_f"><?php echo $comiis_lang['tip346'];?></span><?php } ?>
                        </h1>
                        <h1><?php echo $thread['subject'];?></h1>
                        <?php if($thread['attachment'] != 2) { ?><div class="list_body f_b"><?php if($thread['price'] && !$thread['special'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip255'];?></p><?php } elseif($thread['readperm'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip256'];?></p><?php } else { ?><?php echo $message[$thread['tid']];?><?php } ?></div><?php } ?>
                    </a>
                    <div class="forumlist_li_tops">
                        <a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="sylist_tximg bg_e"><img class="top_tximg" src="<?php if($thread['authorid'] && $thread['author']) { ?><?php echo avatar($thread['authorid'], small, true);?><?php } else { ?><?php echo avatar(0, small, true);?><?php } ?>"></a>
                        <h2>
                           <span class="bottom_views y<?php if($thread['attachment'] != 2) { ?> f_d<?php } ?>"><i class="comiis_font kmview">&#xe67b</i><em><?php echo $thread['views'];?></em> <i class="comiis_font">&#xe64f</i><em><?php echo $thread['replies'];?></em></span>
                           <a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="top_user z<?php if($thread['attachment'] != 2) { ?> f_c<?php } ?>"><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></a>
                            <?php if($thread['authorid'] && $thread['author']) { ?>
                                <?php if($comiis_app_switch['comiis_list_lev'] == 1 || $comiis_app_switch['comiis_list_lev_tit'] == 1) { ?><span class="top_lev <?php if($member[$thread['authorid']]['stars']) { ?>bg_a f_f<?php } else { ?>bg_b f_d<?php } ?>"<?php if($comiis_app_switch['comiis_list_lev_color'] != 0 && $groupcolor[$thread['authorid']]) { ?> style="background:<?php echo $groupcolor[$thread['authorid']];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_list_lev'] == 1) { if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $member[$thread['authorid']]['stars'];?><?php } if($comiis_app_switch['comiis_list_lev_tit'] == 1) { ?> <?php if($_G['comiis_list_group'][$thread['authorid']]) { ?><?php echo $_G['comiis_list_group'][$thread['authorid']];?><?php } } ?></span><?php } ?>
                                <?php if($comiis_app_switch['comiis_list_gender'] == 1) { ?>
                                    <?php if($member[$thread['authorid']]['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($member[$thread['authorid']]['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } ?>
                                <?php } ?>
                                <?php if($comiis_app_switch['comiis_list_verify'] == 1 && !empty($_G['comiis_verify'][$thread['authorid']])) { ?><span class="comiis_verify"><?php echo $_G['comiis_verify'][$thread['authorid']];?></span><?php } ?>
                            <?php } ?>
                        </h2>			
                    </div>
                </div>
</li>
<?php } } else { ?>
<li class="comiis_notip comiis_sofa mt10 cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['forum_nothreads'];?></span>
</li>
<?php } ?>
</ul>
</div>