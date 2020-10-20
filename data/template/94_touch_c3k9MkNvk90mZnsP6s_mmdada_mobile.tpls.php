<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 18:05
//Identify: 2980ee02d161a60bd8d6b35757981922

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
<div class="comiis_forumlist<?php if(!$_GET['inajax']) { ?> mt10 b_t<?php } ?> mb0 cl">
<ul>
<?php if(count($_G['forum_threadlist'])) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($thread['displayorder'] > 0 && $comiis_open_displayorder) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include template('touch/forum/comiis_forumdisplay_ztfl'); ?><li class="comiis_mmlist comiis_wxlist bg_f b_b comiis_list_readimgs">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
<div class="wxlist_li_top cl">
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="top_tximg"><img src="<?php if($thread['authorid'] && $thread['author']) { echo avatar($thread['authorid'], 'small', true); } else { echo avatar(0, 'small', true); } ?>" class="vm"></a>
<h2>
<em class="y">
<?php if(!$comiis_open_displayorder && in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="f_g">#<?php echo $comiis_lang['thread_stick'];?></span>
<?php } else { if(!($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay') && $_G['basescript'] != 'group') { ?>
                                <?php if($_G['cache']['forums'][$thread['fid']]['name']) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>" class="f_d">#<?php echo $_G['cache']['forums'][$thread['fid']]['name'];?></a>
<?php } } elseif($thread['sortid'] && !empty($_G['forum']['threadsorts']['prefix'])) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $thread['sortid'];?>" class="f_d">#<?php echo $_G['forum']['threadsorts']['types'][$thread['sortid']];?></a>
<?php } elseif($thread['typeid'] && $_G['forum']['threadtypes']['types'][$thread['typeid']]) { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $thread['typeid'];?>" class="f_d">#<?php echo $_G['forum']['threadtypes']['types'][$thread['typeid']];?></a>
<?php } } ?>							
</em>
<a href="<?php if($thread['authorid'] && $thread['author']) { ?>home.php?mod=space&uid=<?php echo $thread['authorid'];?>&do=profile<?php } else { ?>javascript:;<?php } ?>" class="top_user f_ok"><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></a>
<?php if($thread['authorid'] && $thread['author']) { ?>					
                            <?php if($_G['comiis_new'] <= 1) { ?>
                                <span class="top_lev <?php if($member[$thread['authorid']]['stars']) { ?>bg_a f_f<?php } else { ?>bg_b f_d<?php } ?>"<?php if($comiis_app_switch['comiis_list_lev_color'] != 0 && $groupcolor[$thread['authorid']]) { ?> style="background:<?php echo $groupcolor[$thread['authorid']];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $member[$thread['authorid']]['stars'];?><?php if($_G['comiis_list_group'][$thread['authorid']]) { ?><?php echo $_G['comiis_list_group'][$thread['authorid']];?><?php } ?></span>
                                <?php if($member[$thread['authorid']]['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($member[$thread['authorid']]['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } ?>
                            <?php } else { ?>
                                <?php if($comiis_app_switch['comiis_list_lev'] == 1 || $comiis_app_switch['comiis_list_lev_tit'] == 1) { ?><span class="top_lev <?php if($member[$thread['authorid']]['stars']) { ?>bg_a f_f<?php } else { ?>bg_b f_d<?php } ?>"<?php if($comiis_app_switch['comiis_list_lev_color'] != 0 && $groupcolor[$thread['authorid']]) { ?> style="background:<?php echo $groupcolor[$thread['authorid']];?> !important"<?php } ?>><?php if($comiis_app_switch['comiis_list_lev'] == 1) { if($comiis_app_switch['comiis_lev_txt']) { ?><?php echo $comiis_app_switch['comiis_lev_txt'];?><?php } else { ?>Lv.<?php } ?><?php echo $member[$thread['authorid']]['stars'];?><?php } if($comiis_app_switch['comiis_list_lev_tit'] == 1) { ?> <?php if($_G['comiis_list_group'][$thread['authorid']]) { ?><?php echo $_G['comiis_list_group'][$thread['authorid']];?><?php } } ?></span><?php } ?>
                                <?php if($comiis_app_switch['comiis_list_gender'] == 1) { if($member[$thread['authorid']]['gender'] == 1) { ?><i class="comiis_font top_gender bg_boy f_f">&#xe63f</i><?php } elseif($member[$thread['authorid']]['gender'] == 2) { ?><i class="comiis_font top_gender bg_girl f_f">&#xe637</i><?php } } ?>                                
                                <?php if($comiis_app_switch['comiis_list_verify'] == 1 && !empty($_G['comiis_verify'][$thread['authorid']])) { ?><span class="comiis_verify"><?php echo $_G['comiis_verify'][$thread['authorid']];?></span><?php } ?>
                            <?php } } ?>
</h2>					
</div>	
<div class="wxlist_li_box cl">		
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
<div class="list_body<?php if($comiis_forumlist_notit == 1) { if(trim($thread['subject']) != cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), '')) { ?> f14 f_b<?php } } if($comiis_forumlist_notit != 1 || (trim($thread['subject']) == cutstr(trim(strip_tags($message[$thread['tid']])), dstrlen($thread['subject']), ''))) { ?> f16<?php } ?>" <?php if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { ?> style="max-height:72px;line-height:24px;"<?php } ?>><?php if($thread['price'] && !$thread['special'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip255'];?></p><?php } elseif($thread['readperm'] && $_G['comiis_new'] >= 1) { ?><p class="f_g"><?php echo $comiis_lang['tip256'];?></p><?php } else { ?><?php echo $message[$thread['tid']];?><?php } ?></div>
<?php } if(empty($_G['setting']['pluginhooks']['global_comiis_forumdisplay_list_bottom'][$key])) { if($thread['attachment'] == 2 && $comiis_pic_list[$thread['tid']]['num'] == 1) { ?>
                        <div class="comiis_pyqlist_img">
                            <img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($comiis_pic_lists[$thread['tid']]['aid']['0'], '0', '300', '9999'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_noloadimage comiis_loadimages"<?php } ?>>
                        </div>
                        <?php } ?>
                        <?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] > 1)) { ?><div class="comiis_pyqlist_imgs<?php if($thread['attachment'] == 2 && ($comiis_pic_list[$thread['tid']]['num'] == 4)) { ?> comiis_pyqlist_imga<?php } ?>">
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
<div class="comiis_wxlist_bottom cl">
<a href="javascript:" tid="<?php echo $thread['tid'];?>" class="wxlist_bottom_ico"><i class="comiis_font f_d">&#xe671</i></a>
<span class="f_d"><?php if($comiis_app_switch['comiis_listtime'] == 1 && $_G['basescript'] != 'group') { ?><?php echo $thread['lastpost'];?><?php } else { ?><?php echo $thread['dateline'];?><?php } ?></span>
<div class="wxlist_bottom_box" id="wxlist_bottom_box_<?php echo $thread['tid'];?>">
<div class="wxlist_bottom_showbox">
<div class="wxlist_bottom_show">
<a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=recommend&handlekey=recommend_add&do=add&tid=<?php echo $thread['tid'];?>&hash=<?php echo FORMHASH;?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" tid="<?php echo $thread['tid'];?>" class="f_f<?php if($_G['uid']) { ?> comiis_recommend_addkey<?php } ?>"><i class="comiis_font">&#xe63b</i><span id="comiis_zhan_key<?php echo $thread['tid'];?>"><?php if(is_array($comiis_memberrecommend_array[$thread['tid']][$_G['uid']])) { ?><?php echo $comiis_lang['cancel'];?><?php } else { ?><?php echo $comiis_lang['view7'];?><?php } ?></span></a>
<a href="<?php if(!(!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>forum.php?mod=post&action=reply&fid=<?php echo $thread['fid'];?>&tid=<?php echo $thread['tid'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" class="<?php if(!(!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm'])))) && !$_G['cache']['plugin']['geetest']['mobile']) { ?>dialog <?php } ?>f_f"><i class="comiis_font">&#xe626</i><?php echo $comiis_lang['collection_commentnum'];?></a>
</div>
</div>
</div>
</div>	
<div id="comiis_wxlist_showbox_<?php echo $thread['tid'];?>">
              <div class="<?php if(count($comiis_memberrecommend_array[$thread['tid']]) || count($comiis_reply_list_array[$thread['tid']])) { ?>comiis_wxlist_showbox bg_e <?php } ?>cl">
                <i class="triangle bg_e"></i>
                <div class="zhan_list<?php if($comiis_app_switch['comiis_pyqlist_user'] == 1) { ?> zhan_listimg<?php } ?> zhan_list_x<?php if(count($comiis_reply_list_array[$thread['tid']])) { ?> nb_b b_b<?php } ?> cl"<?php if(!count($comiis_memberrecommend_array[$thread['tid']])) { ?> style="display:none"<?php } ?>>
                <?php if($comiis_app_switch['comiis_pyqlist_user'] == 1) { ?>
                    <a href="misc.php?op=recommend&amp;tid=<?php echo $thread['tid'];?>&amp;mod=faq" class="num-all_<?php echo $thread['tid'];?> imgbox f_c"><?php if($thread['recommend_add']) { ?><?php echo $thread['recommend_add'];?><?php } ?><?php echo $comiis_lang['view7'];?></a>
                <?php } else { ?>
                    <i class="comiis_font f_b">&#xe63b</i> <span class="num-all_<?php echo $thread['tid'];?> f_b"><?php if($thread['recommend_add']) { ?><?php echo $thread['recommend_add'];?><?php } ?></span>&nbsp
                <?php } ?>
                <?php $key=0?>                <?php if(is_array($comiis_memberrecommend_array[$thread['tid']])) foreach($comiis_memberrecommend_array[$thread['tid']] as $temp) { ?>                  <?php $key++?>                  <?php if(!$comiis_app_switch['comiis_pyqlist_hynum'] || $key <= $comiis_app_switch['comiis_pyqlist_hynum']) { ?>
                    <?php if($comiis_app_switch['comiis_pyqlist_user'] == 1) { ?>
                        <a href="home.php?mod=space&amp;uid=<?php echo $temp['uid'];?>&amp;do=profile" id="tid_<?php echo $thread['tid'];?>_uid_<?php echo $temp['uid'];?>"><img src="<?php echo avatar($temp['uid'], 'small', true); ?>" class="kmimg vm"></a>
                    <?php } else { ?>
                        <?php if($key>1) { ?><span class="f_b">, </span> <?php } ?><a href="home.php?mod=space&amp;uid=<?php echo $temp['uid'];?>&amp;do=profile" class="top_user f_ok" id="tid_<?php echo $thread['tid'];?>_uid_<?php echo $temp['uid'];?>"><?php echo $temp['username'];?></a>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
                <?php if($comiis_app_switch['comiis_pyqlist_user'] != 1) { ?>
                    <?php if($comiis_app_switch['comiis_pyqlist_hynum'] && (count($comiis_memberrecommend_array[$thread['tid']]) > $comiis_app_switch['comiis_pyqlist_hynum'])) { ?><span class="f_b">, </span><a href="misc.php?op=recommend&amp;tid=<?php echo $thread['tid'];?>&amp;mod=faq" class="top_user f_ok"><?php echo $comiis_lang['view3'];?>...</a><?php } ?>
                <?php } ?>
                </div>
                <ul class="reply_list cl">
                  <?php if(is_array($comiis_reply_list_array[$thread['tid']])) foreach($comiis_reply_list_array[$thread['tid']] as $temp) { ?>                    <li id="retid_<?php echo $thread['tid'];?>_pid_<?php echo $temp['pid'];?>"><span class="f_ok"><?php if($temp['author']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $temp['authorid'];?>&amp;do=profile" class="top_user f_ok"><?php echo $temp['author'];?></a><?php } else { ?><a href="javascript:;" class="top_user f_ok"><?php echo $_G['setting']['anonymoustext'];?></a><?php } ?></span><?php if($temp['re_name']) { ?> <span class="f_b"><?php echo $comiis_lang['reply'];?></span> <a href="<?php if($temp['re_name'] == $comiis_lang['tip138']) { ?>javascript:;<?php } else { ?>home.php?mod=space&username=<?php echo $temp['encode_name'];?><?php } ?>" class="top_user f_ok"><?php echo $temp['re_name'];?></a><?php } ?><span class="f_b">: <a href="<?php if(!(!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>forum.php?mod=post&action=reply&fid=<?php echo $thread['fid'];?>&tid=<?php echo $temp['tid'];?><?php if($temp['authorid'] != $_G['uid']) { ?>&repquote=<?php echo $temp['pid'];?><?php } } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" <?php if(!(!$_G['uid'] && !((!$_G['forum']['postperm'] && $_G['group']['allowpost']) || ($_G['forum']['postperm'] && forumperm($_G['forum']['postperm']))))) { ?>class="dialog"<?php } ?>><?php echo $temp['message'];?></a></span></li>
                  <?php } ?>
                  <?php if($comiis_app_switch['comiis_pyqlist_hfnum'] && ($thread['replies'] > $comiis_app_switch['comiis_pyqlist_hfnum'])) { ?>
                  <li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>" class="f_b"><?php echo $comiis_lang['view3'];?><?php echo $thread['replies'];?><?php echo $comiis_lang['view40'];?>...</a>
                  <?php } ?>
                </ul>
              </div>
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
<?php if(!$_GET['inajax']) { ?>
<script>
$(document).on('click', '.wxlist_bottom_ico', function() {
var obj = $(this)
var obj_tid = obj.attr('tid')
$('.wxlist_bottom_box').css('width', '0')
$('#wxlist_bottom_box_' + obj_tid).css('width', $('#wxlist_bottom_box_' + obj_tid + ' .wxlist_bottom_show').width() + 18)
Comiis_MENU_on = 1
popup.close();
$('#comiis_menu_bg').off().on('touchstart', function() {
comiis_menu_hide();
return false;
}).css({
'display':'block',
'width':'100%',
'height':'100%',
'position':'fixed',
'top':'0',
'left':'0',
'background':'transparent',
'z-index':'101'
});
});
function comiis_postre() {
$.ajax({
type:'POST',
url:$('#postforms').attr('action') + '&handlekey=fastposts&loc=1&inajax=1',
data:$('#postforms').serialize(),
dataType:'xml'
})
.success(function(s) {
evalscript(s.lastChild.firstChild.nodeValue);
});
return false;
}
function succeedhandle_fastposts(locationhref, message, param) {
var pid = param['pid'];
var tid = param['tid'];
if(pid && tid) {
upzhanlist(tid);
popup.open('<?php echo $comiis_lang['view9'];?>', 'alert');
} else {
if(!message) {
message = '<?php echo $comiis_lang['postreplyneedmod'];?>';
}
popup.open(message, 'alert');
}
}
function errorhandle_fastposts(message, param) {
popup.open(message, 'alert');
}
</script>
<?php } ?>
