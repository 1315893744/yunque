<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 18:06
//Identify: 8c1044dae348ed415f8f88d2c4b8f1ed

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

						


?>
<div class="comiis_forumlist mb0 cl">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?><li class="forumlist_li comiis_znlist bg_f b_t b_b comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
<div class="forumlist_li_tops cl">
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="znlist_tximg"><img class="top_tximg" src="<?php if($thread['authorid'] && $thread['author']) { ?><?php echo avatar($thread['authorid'], small, true);?><?php } else { ?><?php echo avatar(0, small, true);?><?php } ?>"></a>
<h2>
<span class="f_d y"><?php if($comiis_app_switch['comiis_listtime'] == 1 && $_G['basescript'] != 'group') { ?><?php echo $thread['lastpost'];?><?php } else { ?><?php echo $thread['dateline'];?><?php } ?></span>
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
						<?php


$ar2=DB::fetch_all("select * from ".DB::table("forum_post")." where tid=".$thread['tid']);
$eee = 0; 
if(strpos($ar2[0][message],"[/media]") != 0){ 

	echo '
	<style>
	.forumlist_li_box .list_body {
    max-height: 266px!important;
    line-height: 22px!important;
    font-size: 14px!important;
    margin: 2px 12px!important;
    overflow: hidden!important;
}

.zhf{
	display:none
	}
</style>
';
$eee='100';
}			



if(strpos($ar2[0][message],"[/audio]") != 0){ 
	//$string = $ar2[0][message];
	//$pattern="/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
	//preg_match($pattern,$string,$match1);

echo '
<style>
.zhf{
	display:none
	}
	
</style>
';

	}


			?>							
<?php } ?>				
</h2>
</div>
<div class="forumlist_li_box cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" <?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] < 640)) { ?> class="listimgx"<?php } ?>>
<h2 <?php echo $thread['highlight'];?><?php if(!$thread['attachment'] || ($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] < 640))) { ?> class="comiis_nob"<?php } ?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></h2>
<?php if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?>
                        <?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] < 640)) { ?>
                            <img <?php if($comiis_app_switch['comiis_loadimg']) { 
							
							echo 'src="'.getforumimg($comiis_pic_list[$thread['tid']]['aid']['0'], '0', '200', '160').'" comiis_loadimages=';
							
													} else { 
							?>src=<?php } ?>"<?php echo getforumimg($comiis_pic_list[$thread['tid']]['aid']['0'], '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>>
                        <?php } ?>

                        <?php if($thread['attachment'] == 2 && (($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] >= 640) || $comiis_pic_list[$thread['tid']]['num'] > 1)) { ?>
                            <div class="<?php if($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] >= 640) { ?>listimgbig<?php } elseif($comiis_pic_list[$thread['tid']]['num'] == 2) { ?>listimgtwo<?php } elseif($comiis_pic_list[$thread['tid']]['num'] > 2) { ?>listimgs 000
							<?php
							
if($eee=='100'){
 echo 'zhf';
}
 ?>
							
							<?php } ?>"> 
                                <ul class="listimg">
                                    <?php if(is_array($comiis_pic_list[$thread['tid']]['aid'])) foreach($comiis_pic_list[$thread['tid']]['aid'] as $temp) { ?>                                        <?php if($comiis_pic_list[$thread['tid']]['num'] == 1) { ?>
                                            <li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '640', '330'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage 111 comiis_loadimages"<?php } ?>></li>
                                        <?php } elseif($comiis_pic_list[$thread['tid']]['num'] == 2) { ?>
                                            <li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '300', '190'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage 222 comiis_loadimages"<?php } ?>></li>
                                        <?php } elseif($comiis_pic_list[$thread['tid']]['num'] > 2) { ?>
                                            <li><img <?php if($comiis_app_switch['comiis_loadimg']) { 
											
											echo 'src="'.getforumimg($temp, '0', '200', '160').'" comiis_loadimages=';
											
											 } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage 333 comiis_loadimages"<?php } ?>></li>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if($comiis_pic_list[$thread['tid']]['nums'] > $comiis_pic_list['all_num']) { ?>
                                      <span class="nums f_f"><i class="comiis_font">&#xe627</i><?php echo $comiis_pic_list[$thread['tid']]['nums'];?></span>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } } ?>
<div class="list_body f_b<?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 1 && $comiis_pic_list[$thread['tid']]['width']['0'] < 640)) { ?> list_bodys<?php } ?>"><?php if($thread['price'] && !$thread['special'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip255'];?></p><?php } elseif($thread['readperm'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip256'];?></p><?php } else { ?>

 <?php
echo $message[$thread['tid']]; 

$afid = $_G['fid'];
$ar2=DB::fetch_all("select * from ".DB::table("forum_post")." where tid=".$thread['tid']);
$eee = 0; 
if(strpos($ar2[0][message],"[/audio]") != 0){ 
	$string = $ar2[0][message];
	$pattern="/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
	preg_match($pattern,$string,$match1);

echo '
<style>
.zhf{
	display:none
	}
</style>
';

	if($afid==''){
		echo '<audio style="width:100%" src="'.$match1[0].'" controls="controls"></audio>';
		}
	$eee = 1;
	}

if(strpos($ar2[0][message],"[/media]") != 0){ 

	echo '
	<style>
	.mmlist_li_box .list_body {
    max-height: 266px!important;
    line-height: 22px!important;
    font-size: 14px!important;
    margin: 2px 12px!important;
    overflow: hidden!important;
}</style>
';

	
	$string = $ar2[0][message];
	$pattern="/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
	preg_match($pattern,$string,$match1);
	//print_r($match1[0]);
	$pattern1 = "/\[([^\]]*)\]/";
	preg_match($pattern1, $string,$match2);
	$number=  explode(',',$match2[1]);
	$number1 =$number[1];
	$number2 = $number[2];
	
		if($afid==''&&(strpos($ar2[0][message],"[/media]") != 0)){
			$s = substr($match1[0],0,-6);
			$s = str_replace("http","https",$s);
			$s = str_replace("player.php/sid/","embed/",$s);
				echo '<iframe src="'.$s.'" width="100%" height="225px" frameborder=0></iframe>';
			$eee = 1;		
				}

	}
  
 ?>

<?php } ?></div>					
</a>
<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) echo $_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key];?>
</div>
<div class="forumlist_li_bottom cl">
<em class="y">
<?php if(!($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay') && $_G['basescript'] != 'group') { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>" class="f_ok">#<?php echo $_G['cache']['forums'][$thread['fid']]['name'];?></a>
<?php } elseif($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $thread['sortid'];?>" class="f_ok">#<?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></a>
<?php } elseif($thread['typeid'] && $_G['forum']['threadtypes']['types'][$thread['typeid']]) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $thread['typeid'];?>" class="f_ok">#<?php echo $_G['forum']['threadtypes']['types'][$thread['typeid']];?></a>
<?php } ?>
</em>
<span class="bottom_views f_d"><i class="comiis_font kmview">&#xe63a</i><em><?php echo $thread['views'];?></em> <i class="comiis_font">&#xe679</i><em><?php echo $thread['replies'];?></em></span>
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