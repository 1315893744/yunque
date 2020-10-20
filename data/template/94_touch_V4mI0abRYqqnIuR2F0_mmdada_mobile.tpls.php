<?php
//Discuz! cache file, DO NOT modify me!
//Created: Sep 29, 2018, 17:18
//Identify: 3cd1bfc93580d5307c3791d361b68c12

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
?>
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