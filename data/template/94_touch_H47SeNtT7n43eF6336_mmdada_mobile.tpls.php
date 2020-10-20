<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:34
//Identify: 470321b054f8d2389456850bcf1423b9

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
		<?php if($post['first']) { if($comiis_app_switch['comiis_view_rate'] > 0) { ?>
                <div class="comiis_rate cl">
                    <?php if($comiis_app_switch['comiis_view_rate'] == 1) { ?><p class="rate_tit f_c"><?php echo $comiis_lang['view52'];?></p><?php } ?>
                    <h2<?php if($comiis_app_switch['comiis_view_rate'] == 2) { ?> class="rate_btn"<?php } ?>><a href="<?php if(!$_G['uid']) { ?>javascript:;<?php } else { ?>forum.php?mod=misc&action=rate&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?><?php } ?>" class="bg_a f_f cl<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } else { ?> dialog<?php } ?>"><?php if($comiis_app_switch['comiis_view_rate'] == 2) { ?><?php echo $comiis_lang['view7'];?><?php } ?><?php echo $comiis_lang['view53'];?></a></h2>
                    <?php if($_GET['from'] != 'preview' && !empty($post['ratelog'])) { ?>
                        <p class="rate_tip f_c">
                            <a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>"><?php if($comiis_app_switch['comiis_view_rate'] == 1) { ?><?php echo $comiis_lang['have'];?><?php } ?><span class="f_a"><?php echo count($postlist[$post['pid']]['totalrate']);; ?></span><?php echo $comiis_lang['activity_member_unit'];?><?php echo $comiis_lang['view50'];?><?php if($comiis_app_switch['comiis_view_rate'] == 1) { ?><?php echo $comiis_lang['author'];?><?php } ?>
                            <?php if($comiis_app_switch['comiis_view_rate'] == 2) { ?>
                                <?php if(is_array($post['ratelogextcredits'])) foreach($post['ratelogextcredits'] as $id => $score) { ?>                                    <?php if($score > 0) { ?>
                                        , <?php echo $score;?><?php echo $_G['setting']['extcredits'][$id]['title'];?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                            <?php if(count($post['ratelog']) > 5) { ?>, <?php echo $comiis_lang['view3'];?><?php } ?>
                            </a>
                        </p>
                        <?php if($comiis_app_switch['comiis_view_rate_style'] != 1) { ?>
                        <ul class="cl">	
                            <?php if(is_array($post['ratelog'])) foreach($post['ratelog'] as $uid => $ratelog) { ?>                            <li><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>&amp;do=profile"><?php echo avatar($uid, 'small');; ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    <?php } ?>
                </div>
                <?php if($comiis_app_switch['comiis_view_rate_style'] == 1 && $_GET['from'] != 'preview' && !empty($post['ratelog'])) { ?>
                    <div id="ratelog_<?php echo $post['pid'];?>" class="comiis_view_lcrate mb10">
                        <?php $n=0;?>                        <?php if(is_array($post['ratelog'])) foreach($post['ratelog'] as $uid => $ratelog) { ?>                            <?php $n++;?>                            <?php if($n <= 5) { ?>
                            <li id="rate_<?php echo $post['pid'];?>_<?php echo $uid;?>" class="bg_e mb5">
                                <a href="home.php?mod=space&amp;uid=<?php echo $uid;?>&amp;do=profile" class="lcrate_img"><?php echo avatar($uid, 'small');; ?></a>
                                <h2>
                                    <?php if(is_array($ratelog['score'])) foreach($ratelog['score'] as $id => $score) { ?>                                        <?php if($score > 0) { ?>
                                            <span class="f_a"><?php echo $_G['setting']['extcredits'][$id]['title'];?>+<?php echo $score;?><?php echo $_G['setting']['extcredits'][$id]['unit'];?></span>
                                        <?php } else { ?>
                                            <span class="f_a"><?php echo $_G['setting']['extcredits'][$id]['title'];?><?php echo $score;?><?php echo $_G['setting']['extcredits'][$id]['unit'];?></span>
                                        <?php } ?>
                                   <?php } ?>
                                   <a href="home.php?mod=space&amp;uid=<?php echo $uid;?>&amp;do=profile" class="f_c"><?php echo $ratelog['username'];?></a>
                               </h2>
                                <p><?php if($ratelog['reason']) { ?><?php echo $ratelog['reason'];?><?php } else { ?><?php echo $comiis_lang['tip257'];?><?php } ?></p>
                            </li>
                            <?php } ?>
                        <?php } ?>        
                    </div>
                <?php } ?>            
            <?php } ?>
            <?php if(($comiis_app_switch['comiis_header_show'] == 2 || ($comiis_app_switch['comiis_header_show'] == 3 && $comiis_isweixin == 1))) { ?>
                <div class="comiis_tags<?php if($comiis_app_switch['comiis_view_foottid'] == 1) { ?> pb10 b_b<?php } ?> cl">
                    <div class="y f_g">
                    <a href="<?php if($_G['uid']) { ?>misc.php?mod=report&url=<?php echo $_G['currenturl_encode'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" class="<?php if($_G['uid']) { ?>dialog <?php } ?>f14 y"><?php echo $comiis_lang['all2'];?></a>
                    <?php if((($_G['forum']['ismoderator'] || $_G['group']['alloweditpost']) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($_G['forum_thread']['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $_G['forum_thread']['dateline'] > $edittimelimit)))) { ?>
                        <?php if(is_array($postlist)) foreach($postlist as $posts) { ?>                            <?php if($posts['first']) { ?>
                                <span href="#moption_<?php echo $posts['pid'];?>" class="popup" style="margin-right:10px;"><?php echo $comiis_lang['edit'];?></span>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    </div>
                    <?php if(($post['tags'] || $relatedkeywords) && $_GET['from'] != 'preview' && $comiis_app_switch['comiis_view_tag'] == 1) { ?>
                        <i class="comiis_font f_d">&#xe62c</i>
                        <?php if($post['tags']) { ?>
                            <?php $tagi = 0;?>                            <?php if(is_array($post['tags'])) foreach($post['tags'] as $var) { ?>                                <?php if($tagi) { ?><span class="f_d">, </span><?php } ?><a href="misc.php?mod=tag&amp;id=<?php echo $var['0'];?>&amp;type=thread" title="<?php echo $var['1'];?>" class="f_ok"><?php echo $var['1'];?></a>
                                <?php $tagi++;?>                            <?php } ?>
                        <?php } ?>
                        <?php if($relatedkeywords) { ?><span><?php echo $relatedkeywords;?></span><?php } ?>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <?php if(($post['tags'] || $relatedkeywords) && $_GET['from'] != 'preview' && $comiis_app_switch['comiis_view_tag'] == 1) { ?>
                    <div class="comiis_tags<?php if($comiis_app_switch['comiis_view_foottid'] == 1) { ?> pb10 b_b<?php } ?> cl">
                        <i class="comiis_font f_d">&#xe62c</i>
                        <?php if($post['tags']) { ?>
                            <?php $tagi = 0;?>                            <?php if(is_array($post['tags'])) foreach($post['tags'] as $var) { ?>                                <?php if($tagi) { ?><span class="f_d">, </span><?php } ?><a href="misc.php?mod=tag&amp;id=<?php echo $var['0'];?>&amp;type=thread" title="<?php echo $var['1'];?>" class="f_ok"><?php echo $var['1'];?></a>
                                <?php $tagi++;?>                            <?php } ?>
                        <?php } ?>
                        <?php if($relatedkeywords) { ?><span><?php echo $relatedkeywords;?></span><?php } ?>
                    </div>
                <?php } } if($comiis_app_switch['comiis_recommend'] == 0 && $comiis_app_switch['comiis_recommend_open'] == 0) { ?>
<div class="comiis_dzhan_img<?php if($comiis_app_switch['comiis_view_foottid'] != 1) { ?> b_t<?php } if($comiis_app_switch['comiis_view_foottid'] == 1) { ?> comiis_dzhan_mt5<?php } ?> cl">
                    <?php if($comiis_app_switch['comiis_view_foottid'] != 1) { ?>
<h2><span class="f_d"><?php if($comiis_app_switch['comiis_view_header'] == 3) { ?><?php echo $_G['forum_thread']['views'];?> <?php echo $comiis_lang['view47'];?><?php } else { ?><?php echo $comiis_lang['view5'];?>ID: <?php echo $_G['tid'];?><?php } ?></span><a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=recommend&handlekey=recommend_add&do=add&tid=<?php echo $_G['tid'];?>&hash=<?php echo FORMHASH;?><?php } else { ?>javascript:;<?php } ?>" class="<?php if($_G['uid']) { ?>comiis_recommend_addkey <?php } ?>bg_c f_f<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>"><i class="comiis_font">&#xe63b</i> <?php echo $comiis_lang['view6'];?> <em class="comiis_recommend_nums"><?php if($_G['forum_thread']['recommend_add']) { ?>+<?php echo $_G['forum_thread']['recommend_add'];?><?php } ?></em></a></h2>
<?php } ?>
<ul class="comiis_recommend_list_a<?php if($_G['forum_thread']['recommend_add']) { ?> comiis_recommend_list_on<?php } ?>">
<?php if($_G['forum_thread']['recommend_add']) { ?>
<li style="float:right;margin-right:0;"><a href="misc.php?op=recommend&amp;tid=<?php echo $_G['tid'];?>&amp;mod=faq"><span class="bg_b f_c"><?php if($comiis_app_switch['comiis_view_foottid'] == 1) { ?><i class="comiis_font">&#xe63b</i> <?php } ?><em class="comiis_recommend_num"><?php echo $_G['forum_thread']['recommend_add'];?></em><?php echo $comiis_lang['view7'];?></span></a></li><?php if(is_array($comiis_recommend_style1)) foreach($comiis_recommend_style1 as $temp) { ?><li id="comiis_recommend_list_a<?php echo $temp['uid'];?>"><a href="home.php?mod=space&amp;uid=<?php echo $temp['uid'];?>&amp;do=profile" class="bg_e"><img src="<?php echo $_G['setting']['ucenterurl'];?>/avatar.php?uid=<?php echo $temp['uid'];?>&size=small"<?php if($_GET['in_ajax']) { ?> class="comiis_noloadimage"<?php } ?>></a></li>
<?php } } ?>
</ul>
</div>
<?php } elseif($comiis_app_switch['comiis_recommend'] == 1 && $comiis_app_switch['comiis_recommend_open'] == 0) { ?>
<div class="comiis_dzhan_txt bg_e cl">
                    <?php if($comiis_app_switch['comiis_view_foottid'] != 1) { ?>
<h2><span class="f_d"><?php if($comiis_app_switch['comiis_view_header'] == 3) { ?><?php echo $_G['forum_thread']['views'];?> <?php echo $comiis_lang['view47'];?><?php } else { ?><?php echo $comiis_lang['view5'];?>ID: <?php echo $_G['tid'];?><?php } ?></span><a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=recommend&handlekey=recommend_add&do=add&tid=<?php echo $_G['tid'];?>&hash=<?php echo FORMHASH;?><?php } else { ?>javascript:;<?php } ?>" class="comiis_recommend_addkey bg_c f_f<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>"><i class="comiis_font">&#xe63b</i> <?php echo $comiis_lang['view6'];?> <em class="comiis_recommend_nums"><?php if($_G['forum_thread']['recommend_add']) { ?>+<?php echo $_G['forum_thread']['recommend_add'];?><?php } ?></em></a></h2>
<?php } ?>
<div class="comiis_recommend_list_t<?php if($_G['forum_thread']['recommend_add']) { ?> comiis_recommend_list_on<?php } ?>">
<?php if($_G['forum_thread']['recommend_add']) { if(is_array($comiis_recommend_style2)) foreach($comiis_recommend_style2 as $key => $temp) { ?><span id="comiis_recommend_list_t<?php echo $temp['uid'];?>"><a href="home.php?mod=space&amp;uid=<?php echo $temp['uid'];?>&amp;do=profile" class="f_c"><?php echo $temp['username'];?></a><?php if(count($comiis_recommend_style2) > $key + 1) { ?><span class="f_d"> , </span><?php } ?></span>
<?php } if($comiis_app_switch['comiis_view_foottid'] == 1) { ?>
                            <span class="f_d">...</span> <a href="misc.php?op=recommend&amp;tid=<?php echo $_G['tid'];?>&amp;mod=faq" class="f_a"><?php echo $comiis_lang['view3'];?><em class="comiis_recommend_num"><?php echo $_G['forum_thread']['recommend_add'];?></em><?php echo $comiis_lang['view7'];?></a>
                        <?php } else { ?>
                            <?php if(count($comiis_recommend_style2) > 9) { ?>
                                <span class="f_d">...</span> <a href="misc.php?op=recommend&amp;tid=<?php echo $_G['tid'];?>&amp;mod=faq" class="f_c"><?php echo $comiis_lang['view8'];?></a>
                            <?php } ?>
                        <?php } } ?>
</div>
</div>
<?php } } ?>