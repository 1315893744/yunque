<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 18:06
//Identify: 938e7becdd299d54228f23f953e10475

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_forumlist<?php if(!$_GET['inajax']) { ?> mt10 b_t<?php } ?> mb0 cl">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?><li class="forumlist_li comiis_milist bg_f b_b comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>				
<div class="forumlist_li_box cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"<?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 2 || ($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] < 640))) { ?> class="milist_oneimg"<?php } ?>>
<?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 2 || ($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] < 640))) { ?>
<img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($comiis_pic_list[$thread['tid']]['aid']['0'], '0', '200', '145'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>>
                        <?php if($comiis_pic_list[$thread['tid']]['nums'] == 2) { ?>
                          <span class="nums f_f"><i class="comiis_font">&#xe627</i><?php echo $comiis_pic_list[$thread['tid']]['nums'];?></span>
                        <?php } } ?>												
<h2 <?php echo $thread['highlight'];?><?php if(!$thread['attachment'] == 2) { ?> class="comiis_nob"<?php } ?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?><span class="toico b_ok b_0 f_0"><?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></h2>		
<?php if($thread['attachment'] !=2 || !empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?><div class="list_body f_c"><?php if($thread['price'] && !$thread['special'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip255'];?></p><?php } elseif($thread['readperm'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip256'];?></p><?php } else { ?><?php echo $message[$thread['tid']];?><?php } ?></div><?php } if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?>
                        <?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] > 2 || ($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] >= 640))) { ?>
                            <div class="<?php if($comiis_pic_list[$thread['tid']]['num'] == 1) { ?>listimgbigx<?php } else { ?>listimgs<?php } ?>">
                                <ul class="listimg">						
                                    <?php if(is_array($comiis_pic_list[$thread['tid']]['aid'])) foreach($comiis_pic_list[$thread['tid']]['aid'] as $temp) { ?>                                        <?php if($comiis_pic_list[$thread['tid']]['num'] == 1) { ?>
                                            <li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '640', '330'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>></li>
                                        <?php } else { ?>
                                            <li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>></li>
                                        <?php } ?>
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
<div class="forumlist_li_tops cl">
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="milist_tximg"><img class="top_tximg" src="<?php if($thread['authorid'] && $thread['author']) { ?><?php echo avatar($thread['authorid'], small, true);?><?php } else { ?><?php echo avatar(0, small, true);?><?php } ?>"></a>
<h2>
<span class="bottom_views f_d y"><i class="comiis_font">&#xe634</i><em><?php echo $thread['views'];?></em> <i class="comiis_font">&#xe626</i><em><?php echo $thread['replies'];?></em></span>
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="top_user"><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></a><?php if($comiis_app_switch['comiis_list_verify'] == 1 && !empty($_G['comiis_verify'][$thread['authorid']])) { ?><span class="comiis_verify"><?php echo $_G['comiis_verify'][$thread['authorid']];?></span><?php } ?><span class="bottom_time f_d"><?php if($comiis_app_switch['comiis_listtime'] == 1 && $_G['basescript'] != 'group') { ?><?php echo $thread['lastpost'];?><?php } else { ?><?php echo $thread['dateline'];?><?php } ?></span>		
</h2>			
</div>	
</li>
<?php } } else { ?>
<li class="comiis_notip comiis_sofa bg_f b_b cl">
<i class="comiis_font f_e cl">&#xe613</i>
<span class="f_d"><?php echo $comiis_lang['forum_nothreads'];?></span>
</li>
<?php } ?>
</ul>
</div>