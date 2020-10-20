<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 18:06
//Identify: 3c7305ff137cc2a8eed5ed56c3ce54bb
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<?php if($_G['uid'] && !$_GET['inajax']) { ?>
<script>
var formhash = '<?php echo FORMHASH;?>', comiis_list_follow_obj;
$(document).ready(function() {
comiis_user_gz_key();
});
function comiis_user_gz_key(){
if($('.user_gz_key').length > 0) {
$('.user_gz_key').off('click').on('click', function() {
comiis_list_follow_obj = $(this);
if(comiis_list_follow_obj.attr('href').indexOf('op=del') > 0){
popup.open($('#comiis_followmod'));
}else{
comiis_list_followmod();
}
return false;		
});
}
}
function comiis_list_followmod() {
var comiis_list_follow_url = comiis_list_follow_obj.attr('href'),
comiis_list_follow_uid = comiis_list_follow_obj.attr('uid');
$.ajax({
type:'GET',
url: comiis_list_follow_url + '&inajax=1' ,
dataType:'xml',
}).success(function(s) {
if(s.lastChild.firstChild.nodeValue.indexOf("'type':'add'") > 0){
comiis_list_follow_url = comiis_list_follow_url.replace('op=add', 'op=del');
$(".comiis_follow_uid" + comiis_list_follow_uid).text('<?php echo $comiis_lang['all4'];?>').attr({"href" : comiis_list_follow_url, "class" : "user_gz user_gz_key b_ok bg_e f_d comiis_follow_uid" + comiis_list_follow_uid});
popup.open('<?php echo $comiis_lang['tip1'];?>', 'alert');
}else if(s.lastChild.firstChild.nodeValue.indexOf("'type':'del'") > 0){
comiis_list_follow_url = comiis_list_follow_url.replace('op=del', 'op=add');
$(".comiis_follow_uid" + comiis_list_follow_uid).text('+ <?php echo $comiis_lang['all3'];?>').attr({"href" : comiis_list_follow_url, "class" : "user_gz user_gz_key b_ok f_ok comiis_follow_uid" + comiis_list_follow_uid});
popup.open('<?php echo $comiis_lang['tip2'];?>', 'alert');
popup.close();
}
});
}
</script>
<?php } $follow_all = DB::fetch_all('SELECT * FROM %t WHERE uid=%d AND followuid in(%n)', array('home_follow', $_G['uid'], $authorids), 'followuid');?><div class="comiis_forumlist mb0 cl">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('forum/comiis_forumdisplay_ztfl'); ?><li class="forumlist_li comiis_znalist bg_f b_t b_b comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
<div class="forumlist_li_top cl">
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="wblist_tximg"><img class="top_tximg" src="<?php if($thread['authorid'] && $thread['author']) { ?><?php echo avatar($thread['authorid'], small, true);?><?php } else { ?><?php echo avatar(0, small, true);?><?php } ?>"></a>						
<h2>
<?php if($_G['uid'] && $thread['authorid'] != $_G['uid']) { if($follow_all[$thread['authorid']]['uid'] == $_G['uid']) { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $thread['authorid'];?>&amp;hash=<?php echo FORMHASH;?>" uid="<?php echo $thread['authorid'];?>" class="user_gz user_gz_key b_ok bg_e f_d comiis_follow_uid<?php echo $thread['authorid'];?>"><?php echo $comiis_lang['all4'];?></a>
<?php } else { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;fuid=<?php echo $thread['authorid'];?>&amp;hash=<?php echo FORMHASH;?>" uid="<?php echo $thread['authorid'];?>" class="user_gz user_gz_key b_ok f_ok comiis_follow_uid<?php echo $thread['authorid'];?>">+ <?php echo $comiis_lang['all3'];?></a>
<?php } } else { ?>
<a href="javascript:;" class="b_ok f_ok user_gz<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } ?>">+ <?php echo $comiis_lang['all3'];?></a>
<?php } ?>
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="top_user"><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></a>
<?php if($thread['authorid'] && $thread['author']) { ?>					
                            <?php if($_G['comiis_new'] <= 1) { ?>
                                <span class="top_lev <?php if($member[$thread['authorid']]['stars']) { ?>bg_a f_f<?php } else { ?>bg_b f_d<?php } ?>"<?php if($comiis_app_switch['comiis_list_lev_color'] != 0 && $groupcolor[$thread['authorid']]) { ?> style="background:<?php echo $groupcolor[$thread['authorid']];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $member[$thread['authorid']]['stars'];?><?php if($_G['comiis_list_group'][$thread['authorid']]) { ?><?php echo $_G['comiis_list_group'][$thread['authorid']];?><?php } ?></span>
                                <?php if($member[$thread['authorid']]['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($member[$thread['authorid']]['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } ?>
                            <?php } else { ?>
                                <?php if($comiis_app_switch['comiis_list_lev'] == 1 || $comiis_app_switch['comiis_list_lev_tit'] == 1) { ?><span class="top_lev <?php if($member[$thread['authorid']]['stars']) { ?>bg_a f_f<?php } else { ?>bg_b f_d<?php } ?>"<?php if($comiis_app_switch['comiis_list_lev_color'] != 0 && $groupcolor[$thread['authorid']]) { ?> style="background:<?php echo $groupcolor[$thread['authorid']];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_list_lev'] == 1) { if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $member[$thread['authorid']]['stars'];?><?php } if($comiis_app_switch['comiis_list_lev_tit'] == 1) { ?> <?php if($_G['comiis_list_group'][$thread['authorid']]) { ?><?php echo $_G['comiis_list_group'][$thread['authorid']];?><?php } } ?></span><?php } ?>
                                <?php if($comiis_app_switch['comiis_list_gender'] == 1) { if($member[$thread['authorid']]['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($member[$thread['authorid']]['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } } ?>                                
                                <?php if($comiis_app_switch['comiis_list_verify'] == 1 && !empty($_G['comiis_verify'][$thread['authorid']])) { ?><span class="comiis_verify"><?php echo $_G['comiis_verify'][$thread['authorid']];?></span><?php } ?>
                            <?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['comiis_forumdisplay_thread'][$key])) echo $_G['setting']['pluginhooks']['comiis_forumdisplay_thread'][$key];?>
</h2>
<div class="forumlist_li_time">
<span class="f_d"><?php if($comiis_app_switch['comiis_listtime'] == 1 && $_G['basescript'] != 'group') { ?><?php echo $thread['lastpost'];?><?php } else { ?><?php echo $thread['dateline'];?><?php } ?></span>
<?php if(!($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay') && $_G['basescript'] != 'group') { ?>
                            <?php if($_G['cache']['forums'][$thread['fid']]['name']) { ?>
                                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>" class="f_d">&nbsp<?php echo $comiis_lang['from'];?> <?php echo $_G['cache']['forums'][$thread['fid']]['name'];?></a>
<?php } } elseif($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix']) && $comiis_forumlist_notit == 1) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $thread['sortid'];?>" class="f_d">&nbsp<?php echo $comiis_lang['from'];?> <?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></a>
<?php } elseif($thread['typeid'] && $_G['forum']['threadtypes']['types'][$thread['typeid']] && $comiis_forumlist_notit == 1) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $thread['typeid'];?>" class="f_d">&nbsp<?php echo $comiis_lang['from'];?> <?php echo $_G['forum']['threadtypes']['types'][$thread['typeid']];?></a>
<?php } ?>						
<?php if($comiis_forumlist_notit == 0 && !$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
&nbsp<span class="f_g"><?php echo $comiis_lang['thread_stick'];?></span>						
<?php } ?>
</div>
</div>	
<div class="mmlist_li_box cl">					
<?php if($comiis_forumlist_notit == 1) { ?>
                        <?php if($comiis_app_switch['comiis_list_zntits'] == 1 && $_G['comiis_new'] >= 1) { ?>
                            <?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key]) || trim($thread['subject']) != cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), '')) { ?>
                            <h2><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" <?php echo $thread['highlight'];?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></a></h2>
                            <?php } ?>
                        <?php } else { ?>
                            <h2><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" <?php echo $thread['highlight'];?>><?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="bg_del f_f"><?php echo $comiis_lang['thread_stick'];?></span><?php } ?><?php echo $comiis_ztfl;?><?php if($thread['icon'] > 0 && $comiis_app_switch['comiis_list_ico'] == 1) { ?><span class="comiis_xifont f_g"><?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?></span><?php } if($thread['displayorder'] == -1 && $_G['comiis_new'] > 2) { ?><span class="comiis_xifont f_g"><?php echo $comiis_lang['tip346'];?></span><?php } ?><?php echo $thread['subject'];?></a></h2>
                        <?php } ?>
                    <?php } ?>
<div class="<?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?>list_video<?php } else { ?>list_body<?php } ?> cl"<?php if($comiis_forumlist_notit != 1 || (trim($thread['subject']) == cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), ''))) { if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?> style="font-size:16px;max-height:72px;line-height:24px;"<?php } } ?>>                        
<?php if($comiis_forumlist_notit == 0) { if($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $thread['sortid'];?>" class="f_ok">#<?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?>#</a>
<?php } elseif($thread['typeid'] && $_G['forum']['threadtypes']['types'][$thread['typeid']]) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $thread['typeid'];?>" class="f_ok">#<?php echo $_G['forum']['threadtypes']['types'][$thread['typeid']];?>#</a>
<?php } } if(!($comiis_forumlist_notit == 1 && !empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key]) && trim($thread['subject']) == cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), ''))) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"<?php if($comiis_forumlist_notit == 1) { if(trim($thread['subject']) != cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), '')) { ?> class="f_b"<?php } } ?>><?php if($thread['price'] && !$thread['special'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip255'];?></p><?php } elseif($thread['readperm'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip256'];?></p><?php } else { ?>

 <?php
echo $message[$thread['tid']]; //列表摘要

$afid = $_G['fid'];
$ar2=DB::fetch_all("select * from ".DB::table("forum_post")." where tid=".$thread['tid']);
$eee = 0; //混合屏蔽图片初始化
if(strpos($ar2[0][message],"[/audio]") != 0){ //提取音频开始
	$string = $ar2[0][message];
	$pattern="/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
	preg_match($pattern,$string,$match1);
//混合屏蔽图片开始
echo '
<style>
.zhf{
	display:none
	}
</style>
';
//混合屏蔽图片结束
	if($afid==''){
		echo '<audio style="width:100%" src="'.$match1[0].'" controls="controls"></audio>';
		}
	$eee = 1;//混合屏蔽指令
	}//提取音频结束

if(strpos($ar2[0][message],"[/media]") != 0){ //提取视频开始
//开辟视频高度开始
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
//开辟视频高度结束
	
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
			$eee = 1;	//混合屏蔽指令	
				}//提取视频结束

	}
  
 ?>


<?php } ?></a>
<?php } ?>
                        <?php if(!empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) echo $_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key];?>
</div>
<?php if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?>	
                        <?php if($thread['attachment'] == 2 && $comiis_pic_list[$thread['tid']]['num'] == 1) { ?>
                        <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
                            <div class="comiis_pyqlist_img <?php
							if($eee==1){
								
								echo 'zhf';
							}
							?>">
                                <img <?php if($comiis_app_switch['comiis_loadimg']) 
								
								{ 
                                
								echo 'src="'.getforumimg($comiis_pic_lists[$thread['tid']]['aid']['0'], '0', '360', '9999').'" comiis_loadimages=';
								
								} else { 
								?>src=<?php } ?>"<?php 
								
								// echo getforumimg($comiis_pic_lists[$thread['tid']]['aid']['0'], '0', '360', '9999'); 
								
								?>"<?php if($comiis_app_switch['comiis_loadimg']) { 
								
								?> class="comiis_noloadimage comiis_loadimages"<?php 
								
								} ?>>
                            </div>
                        </a>
                        <?php } ?>
                        <?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] > 1)) { ?>
                        <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
                        <!--以下是增加class，混合图片屏蔽控制-->
                            <div class="comiis_pyqlist_imgs <?php if($eee==1){echo 'zhf';
								}
							
							?>
							
							<?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 4)) { ?> comiis_pyqlist_imga<?php } ?>">
                            <!--混合图片屏蔽控制end-->
                                <ul>
                                    <?php if(is_array($comiis_pic_lists[$thread['tid']]['aid'])) foreach($comiis_pic_lists[$thread['tid']]['aid'] as $temp) { ?>  
                                    
                                    <!--以下是输出图片-->
                                    <li><img <?php if($comiis_app_switch['comiis_loadimg']) 
									
									{ 
									
									echo 	'src="'.getforumimg($temp, '0', '220', '200').'" comiis_loadimages=';
								
									
									
									
									} else { 
									
									?>src=<?php } ?>"<?php
									
									//echo getforumimg($temp, '0', '220', '200');
									
									?>"<?php if($comiis_app_switch['comiis_loadimg']) 
									
									{ ?>
                                    
                                     class="comiis_noloadimage comiis_loadimages"<?php } ?>></li>
                                      <!--输出图片end-->
                                    <?php } ?>
                                    <?php if($comiis_pic_list[$thread['tid']]['nums'] > $comiis_pic_list['all_num']) { ?>
                                      <span class="nums f_f"><i class="comiis_font">&#xe627</i><?php echo $comiis_pic_list[$thread['tid']]['nums'];?></span>
                                    <?php } ?>
                                </ul>
                            </div>
                        </a>
                        <?php } } ?>
</div>
<div class="comiis_znalist_bottom b_t cl">				
<ul class="cl">
<li class="f_c"><i class="comiis_font">&#xe63a</i><?php echo $thread['views'];?><?php echo $comiis_lang['view47'];?></li>
<li class="f_c kmc"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="b_l b_r"><i class="comiis_font">&#xe677</i><?php echo $thread['replies'];?><?php echo $comiis_lang['collection_commentnum'];?></a></li>
<li id="comiis_listzhan_<?php echo $thread['tid'];?>"><a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=recommend&handlekey=recommend_add&do=add&tid=<?php echo $thread['tid'];?>&hash=<?php echo FORMHASH;?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" tid="<?php echo $thread['tid'];?>" class="<?php if($_G['uid']) { ?>comiis_recommend_addkey <?php } ?>f_c<?php if($_G['comiis_memberrecommend'][$thread['tid']]) { ?> f_wb<?php } ?>"><i class="comiis_font"><?php if($_G['comiis_memberrecommend'][$thread['tid']] && $_G['comiis_new'] > 2) { ?>&#xe654<?php } else { ?>&#xe63b<?php } ?></i><span class="num-all_<?php echo $thread['tid'];?>"><?php if($thread['recommend_add']) { ?><?php echo $thread['recommend_add'];?><?php } ?></span><?php echo $comiis_lang['view7'];?></a></li>
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
<div id="comiis_followmod" style="display:none">
<div class="comiis_tip bg_f cl">
<dt class="f_b">
<p><?php echo $comiis_lang['all10'];?>?</p>
</dt>	
<dd class="b_t cl">
        <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
            <a href="javascript:popup.close()" class="tip_btn bg_f f_b"><?php echo $comiis_lang['all9'];?></a>
            <a href="javascript:comiis_list_followmod()" class="tip_btn bg_f f_0"><span class="tip_lx"><?php echo $comiis_lang['all8'];?></span></a>
        <?php } else { ?>
            <a href="javascript:comiis_list_followmod()" class="tip_btn bg_f f_0"><?php echo $comiis_lang['all8'];?></a>
            <a href="javascript:popup.close()" class="tip_btn bg_f f_b"><span class="tip_lx"><?php echo $comiis_lang['all9'];?></span></a>
        <?php } ?>
</dd>
</div>
</div>
<?php if($_G['uid'] && $_GET['inajax']) { ?><script>comiis_user_gz_key();</script><?php } ?>