<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('viewthread');
0
|| checktplrefresh('./template/comiis_app/touch/forum/viewthread.htm', './template/comiis_app/touch/forum/viewthread_node.htm', 1600851447, 'diy', './data/template/37_diy_touch_forum_viewthread.tpl.php', './template/comiis_app', 'touch/forum/viewthread')
|| checktplrefresh('./template/comiis_app/touch/forum/viewthread.htm', './template/comiis_app/touch/forum/comiis_view_cnxh.htm', 1600851447, 'diy', './data/template/37_diy_touch_forum_viewthread.tpl.php', './template/comiis_app', 'touch/forum/viewthread')
|| checktplrefresh('./template/comiis_app/touch/forum/viewthread.htm', './template/comiis_app/touch/forum/forumdisplay_fastpost.htm', 1600851447, 'diy', './data/template/37_diy_touch_forum_viewthread.tpl.php', './template/comiis_app', 'touch/forum/viewthread')
|| checktplrefresh('./template/comiis_app/touch/forum/viewthread.htm', './template/comiis_app/touch/forum/comiis_view_cnxh.htm', 1600851447, 'diy', './data/template/37_diy_touch_forum_viewthread.tpl.php', './template/comiis_app', 'touch/forum/viewthread')
|| checktplrefresh('./template/comiis_app/touch/forum/viewthread.htm', './template/comiis_app/touch/common/comiis_upload.htm', 1600851447, 'diy', './data/template/37_diy_touch_forum_viewthread.tpl.php', './template/comiis_app', 'touch/forum/viewthread')
;?>
<?php if($_G['forum_thread']['isgroup'] == 1) { $comiis_app_switch['comiis_bbsvtname'] = $comiis_app_switch['comiis_bbsvtname_group'];$comiis_app_switch['comiis_view_header'] = $comiis_app_switch['comiis_groupview_header'];$comiis_app_switch['comiis_view_header_noxx'] = $comiis_app_switch['comiis_groupview_header_noxx'];$comiis_app_switch['comiis_view_bkxx'] = $comiis_app_switch['comiis_groupview_bkxx'];$comiis_app_switch['comiis_view_reply'] = $comiis_app_switch['comiis_view_reply_group'];$comiis_app_switch['comiis_view_rate'] = $comiis_app_switch['comiis_view_rate_group'];$comiis_app_switch['comiis_aimg_show'] = $comiis_app_switch['comiis_aimg_show_group'];$comiis_app_switch['comiis_view_quote'] = $comiis_app_switch['comiis_view_quote_group'];$comiis_app_switch['comiis_recommend_open'] = $comiis_app_switch['comiis_recommend_open_group'];$comiis_app_switch['comiis_recommend'] = $comiis_app_switch['comiis_recommend_group'];$comiis_app_switch['comiis_view_tag'] = $comiis_app_switch['comiis_view_tag_group'];$comiis_app_switch['comiis_view_cnxh'] = $comiis_app_switch['comiis_view_cnxh_group'];$comiis_app_switch['comiis_view_cnxh_style'] = $comiis_app_switch['comiis_view_cnxh_style_group'];$comiis_app_switch['comiis_view_cnxh_name'] = $comiis_app_switch['comiis_view_cnxh_name_group'];$comiis_app_switch['comiis_view_cnxh_num'] = $comiis_app_switch['comiis_view_cnxh_num_group'];$comiis_app_switch['comiis_view_lev'] = $comiis_app_switch['comiis_view_lev_group'];$comiis_app_switch['comiis_view_lev_tit'] = $comiis_app_switch['comiis_view_lev_tit_group'];$comiis_app_switch['comiis_view_gender'] = $comiis_app_switch['comiis_view_gender_group'];$comiis_app_switch['comiis_view_zntit'] = $comiis_app_switch['comiis_groupview_zntit'];?><?php } include template('common/header'); require_once("./template/comiis_app/comiis/php/comiis_viewthread.php");?><?php if($threadsort && $comiis_app_switch['comiis_flxx_view'] == 1 && $comiis_app_switch['comiis_flxx_view_wz'] == 1) { if(is_array($postlist)) foreach($postlist as $post) { if($post['first'] && $threadsort && $threadsortshow) { if($threadsortshow['typetemplate']) { comiis_load('N4d5zIuT9huHoUH8od', 'post,thread,filter,threadsortshow,comiis_title_data,comiis_user_data,var,comiis_flxx_color_n');?><?php } ?>        
<?php } ?>
    <?php } } if($_GET['inajax'] == 1) { if(is_array($postlist)) foreach($postlist as $post) { if(!$post['first']) { include template('forum/viewthread_node'); } } } else { ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_top_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_top_mobile'];?>
<script>var replyreload, tid = '<?php echo $_G['tid'];?>', authorid = '<?php echo $_G['forum_thread']['authorid'];?>', formhash = '<?php echo FORMHASH;?>', uid = '<?php echo $_G['uid'];?>', username = '<?php echo $_G['member']['username'];?>', allowrecommend = '<?php echo $_G['group']['allowrecommend'];?>',isgroup = '<?php if($_G['forum_thread']['isgroup'] == 1) { ?>1<?php } else { ?>0<?php } ?>';</script>
<script src="./template/comiis_app/comiis/js/comiis_viewthread.js" type="text/javascript" type="text/javascript"></script>
<form method="post" autocomplete="off" name="modactions" id="modactions">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="optgroup" />
<input type="hidden" name="operation" />
<input type="hidden" name="listextra" value="<?php echo $_GET['extra'];?>" />
<input type="hidden" name="page" value="<?php echo $page;?>" />
</form>
<script>
var fid = parseInt('<?php echo $_G['fid'];?>'), tid = parseInt('<?php echo $_G['tid'];?>');
function modthreads(optgroup, operation) {
var operation = !operation ? '' : operation;
document.getElementById('modactions').action = 'forum.php?mod=topicadmin&action=moderate&fid=' + fid + '&moderate[]=' + tid + '&handlekey=mods&infloat=yes&nopost=yes' + (optgroup != 3 && optgroup != 2 ? '&from=' + tid : '');
document.getElementById('modactions').optgroup.value = optgroup;
document.getElementById('modactions').operation.value = operation;
var obj = $('#modactions');
$.ajax({
type:'POST',
url:obj.attr('action') + '&inajax=1',
data:obj.serialize(),
dataType:'xml'
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
}
function modaction(action, pid, extra, mod) {
if(!action) {
return;
}
var mod = mod ? mod : 'forum.php?mod=topicadmin';
var extra = !extra ? '' : '&' + extra;
document.getElementById('modactions').action = mod + '&action='+ action +'&fid=' + fid + '&tid=' + tid + '&handlekey=mods&infloat=yes&nopost=yes' + (!pid ? '' : '&topiclist[]=' + pid) + extra + '&r' + Math.random();
var obj = $('#modactions');
$.ajax({
type:'POST',
url:obj.attr('action') + '&inajax=1',
data:obj.serialize(),
dataType:'xml'
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
}
</script>
<div class="comiis_memu_y bg_f ojig" id="comiis_menu_vtr_menu"  style="display:none;">
<ul>
        <?php if($comiis_app_switch['comiis_leftnv'] == 1 && (($_G['forum']['ismoderator'] || $_G['group']['alloweditpost']) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($_G['forum_thread']['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $_G['forum_thread']['dateline'] > $edittimelimit)))) { ?>
            <?php if(is_array($postlist)) foreach($postlist as $posts) { ?>                <?php if($posts['first']) { ?>
                    <li class="f_g"><a href="#moption_<?php echo $posts['pid'];?>" class="popup b_b"><i class="comiis_font">&#xe655;</i><?php echo $comiis_lang['edit'];?></a></li>
                <?php } ?>
            <?php } ?>
        <?php } ?>
<li class="f_b"><a href="javascript:;" class="b_b comiis_share_key"><i class="comiis_font">&#xe61f;</i><?php echo $comiis_lang['all1'];?></a></li>
<?php if($_G['uid']) { ?><li class="f_b"><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>&amp;handlekey=favorite_thread" class="dialog b_b" comiis="handle"><i class="comiis_font">&#xe617;</i>收藏</a></li><?php } ?>
<li class="f_b"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" class="b_b"><i class="comiis_font">&#xe657;</i><?php echo $comiis_lang['all29'];?></a></li>
<?php if($_G['uid']) { ?><li class="f_b"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" class="b_b"><i class="comiis_font">&#xe62d;</i><?php if($_G['forum_thread']['isgroup'] == 1) { ?><?php echo $comiis_group_lang['027'];?><?php } else { ?><?php echo $comiis_lang['tip240'];?><?php } ?></a></li><?php } ?>
<li class="f_b"><a href="<?php if($_G['uid']) { ?>misc.php?mod=report&url=<?php echo $_G['currenturl_encode'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($_G['uid']) { ?> class="dialog"<?php } ?>><i class="comiis_font">&#xe636;</i><?php echo $comiis_lang['all2'];?></a></li>
</ul>
</div>
<?php if($comiis_app_switch['comiis_flxx_view'] == 0 || $comiis_app_switch['comiis_flxx_view_wz'] == 0 || !$threadsortshow['typetemplate'] || !$threadsort) { ?>
    <?php if(is_array($postlist)) foreach($postlist as $post) { ?>        <?php if($post['first']) { ?>
            <?php comiis_load('Aa32DAGARkKmSmrOSB', 'page,post,thread,filter,comiis_isnotitle');?>        <?php } ?>
    <?php } } ?>
<div class="comiis_postlist vzyj"><?php $postcount = 0;$comiis_share_pic = array();$comiis_share_message = '';?><?php if(is_array($postlist)) foreach($postlist as $post) { if($_G['forum_thread']['isgroup'] == 1) { $comiis_app_switch['comiis_view_reply'] = $comiis_app_switch['comiis_view_reply_group'];?><?php } $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);?><?php if(!empty($_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount];?>
<?php if($comiis_app_switch['comiis_flxx_view'] == 0 || $comiis_app_switch['comiis_flxx_view_wz'] == 0 || !$threadsortshow['typetemplate'] || !$threadsort) { comiis_load('X8dZDW2WWfcFwyxdFy', 'post,thread,filter,comiis_isnotitle');?><?php } ?><?php
$authorverifys = <<<EOF

EOF;
 if(is_array($post['verifyicon'])) foreach($post['verifyicon'] as $vid) { 
$authorverifys .= <<<EOF
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid={$vid}">
EOF;
 if($_G['setting']['verify'][$vid]['icon']) { 
$authorverifys .= <<<EOF
<img src="{$_G['setting']['verify'][$vid]['icon']}" class="vm" alt="{$_G['setting']['verify'][$vid]['title']}" title="{$_G['setting']['verify'][$vid]['title']}" />
EOF;
 } else { 
$authorverifys .= <<<EOF
{$_G['setting']['verify'][$vid]['title']}
EOF;
 } 
$authorverifys .= <<<EOF
</a>

EOF;
 } if(is_array($post['unverifyicon'])) foreach($post['unverifyicon'] as $vid) { 
$authorverifys .= <<<EOF
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid={$vid}"><img src="{$_G['setting']['verify'][$vid]['unverifyicon']}" class="vm" alt="{$_G['setting']['verify'][$vid]['title']}" title="{$_G['setting']['verify'][$vid]['title']}" /></a>

EOF;
 } 
$authorverifys .= <<<EOF


EOF;
?>
<div class="comiis_postli<?php if(!$_GET['viewpid']) { ?> comiis_list_readimgs<?php } if($comiis_app_switch['comiis_view_reply'] == 1) { ?> comiis_postli_v1<?php } elseif($comiis_app_switch['comiis_view_reply'] == 2) { ?> comiis_postli_v2<?php } ?> zpbe" id="pid<?php echo $post['pid'];?>">
<a name="pid<?php echo $post['pid'];?>"></a>
<?php if($post['first']) { $comiis_share_pic = current($post[attachments]);$comiis_share_message = messagecutstr(str_replace(array("\r\n", "\r", "\n", 'replyreload += \',\' + '.$post[pid].';', "'", "'"), '', strip_tags($post[message])), 100);?><?php if($comiis_app_switch['comiis_view_header'] != 3 && ($comiis_app_switch['comiis_flxx_view'] == 0 || $comiis_app_switch['comiis_flxx_view_wz'] == 0 || !$threadsortshow['typetemplate'] || !$threadsort)) { ?>
<style>.comiis_flxx_stamp {display:none;}</style>
    <div class="comiis_postli_top bg_f b_t">
      <?php comiis_load('Am1I57R3x1C3Mus9M7', 'post,postnostick,postno,authorverifys');?>    </div>
<?php } if((($_G['forum']['ismoderator'] || $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { ?>
<div id="moption_<?php echo $post['pid'];?>" popup="true" class="comiis_manages comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">
<ul>
<?php if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { ?>
<li<?php if(!$_G['forum']['ismoderator'] && !($allowpusharticle && $allowpostarticle)) { ?> class="glall"<?php } ?>><a href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>" class="redirect bg_f b_b"><?php if($_G['forum_thread']['special'] == 2 && !$post['message']) { ?>添加柜台介绍<?php } else { ?>编辑<?php } ?></a></li>
<?php } elseif($_G['uid'] && $post['authorid'] == $_G['uid'] && $_G['setting']['postappend']) { ?>
<li><a href="forum.php?mod=misc&amp;action=postappend&amp;tid=<?php echo $post['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" class="redirect bg_f b_b">补充</a></li>
<?php } if($modmenu['thread']) { $modopt=0;?><?php if($_G['forum']['ismoderator']) { if($_G['group']['allowdelpost']) { $modopt++?><li><a href="javascript:;" onclick="modthreads(3, 'delete')" class="bg_f b_b">删除</a></li><?php } if($_G['group']['allowclosethread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3) { $modopt++?><li><a href="javascript:;" onclick="modthreads(4)" class="bg_f b_b"><?php if(!$_G['forum_thread']['closed']) { ?>关闭<?php } else { ?>打开<?php } ?></a></li><?php } if($_G['group']['allowdigestthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modthreads(1, 'digest')" class="bg_f b_b">精华</a></li><?php } if($_G['group']['allowstickthread'] && ($_G['forum_thread']['displayorder'] <= 3 || $_G['adminid'] == 1) && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modthreads(1, 'stick')" class="bg_f b_b">置顶</a></li><?php } ?>								
<?php if($_G['group']['allowhighlightthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modthreads(1, 'highlight')" class="bg_f b_b">高亮</a></li><?php } if($_G['group']['allowstampthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modaction('stamp')" class="bg_f b_b">图章</a></li><?php } if($_G['group']['allowstamplist'] && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modaction('stamplist')" class="bg_f b_b">图标</a></li><?php } ?>								
<?php if($_G['group']['allowmanagetag']) { ?><li><a href="forum.php?mod=tag&amp;op=manage&amp;tid=<?php echo $_G['tid'];?>" class="dialog bg_f b_b">标签</a></li><?php } if($_G['group']['allowedittypethread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modthreads(2, 'type')" class="bg_f b_b">分类</a></li><?php } if($_G['group']['allowbumpthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modthreads(3, 'bump')" class="bg_f b_b">升降</a></li><?php } ?>								
<?php if($_G['group']['allowrecommendthread'] && !empty($_G['forum']['modrecommend']['open']) && $_G['forum']['modrecommend']['sort'] != 1 && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modthreads(1, 'recommend')" class="bg_f b_b">推荐</a></li><?php } if($_G['group']['allowlivethread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modaction('live')" class="bg_f b_b" style="display:none;">直播</a></li><?php } ?>		
<?php if($_G['group']['allowmovethread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3) { $modopt++?><li><a href="javascript:;" onclick="modthreads(2, 'move')" class="bg_f b_b">移动</a></li><?php } if(!$_G['forum_thread']['special'] && !$_G['forum_thread']['is_archived']) { if($_G['group']['allowcopythread'] && $_G['forum']['status'] != 3) { $modopt++?><li><a href="javascript:;" onclick="modaction('copy')" class="bg_f b_b">复制</a></li><?php } if($_G['group']['allowmergethread'] && $_G['forum']['status'] != 3) { $modopt++?><li><a href="javascript:;" onclick="modaction('merge')" class="bg_f b_b">合并</a></li><?php } if($_G['group']['allowrefund'] && $_G['forum_thread']['price'] > 0) { $modopt++?><li><a href="javascript:;" onclick="modaction('refund')" class="bg_f b_b">撤销付费</a></li><?php } } if($_G['group']['allowremovereward'] && $_G['forum_thread']['special'] == 3 && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modaction('removereward')" class="bg_f b_b">移除悬赏</a></li><?php } ?>	
<?php if($_G['group']['allowsplitthread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3) { $modopt++?><li><a href="javascript:;" onclick="modaction('split')" class="bg_f b_b">分割</a></li><?php } if($_G['group']['allowrepairthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><li><a href="javascript:;" onclick="modaction('repair')" class="bg_f b_b">修复</a></li><?php } ?>								
<?php if($_G['forum_firstpid']) { if($_G['group']['allowwarnpost']) { $modopt++?><li><a href="javascript:;" onclick="modaction('warn', '<?php echo $_G['forum_firstpid'];?>')" class="bg_f b_b">警告</a></li><?php } if($_G['group']['allowbanpost']) { $modopt++?><li><a href="javascript:;" onclick="modaction('banpost', '<?php echo $_G['forum_firstpid'];?>')" class="bg_f b_b">屏蔽</a></li><?php } } ?>								
<?php } if($allowpusharticle && $allowpostarticle) { $modopt++?><li><a href="portal.php?mod=portalcp&amp;ac=article&amp;from_idtype=tid&amp;from_id=<?php echo $_G['tid'];?>" class="bg_f b_b">生成文章</a></li><?php } ?>										
<?php } ?>							
<li class="glall"><a href="javascript:;" class="comiis_glclose mt10 bg_f b_t f_g">取消</a></li>
</ul>
</div>			
<?php } } else { comiis_load('pZCMTUVz481Cc1F1ZV', 'post,rushreply,hiddenreplies,page,postnostick,postno,thread,allowpostreply,authorverifys');?><?php } ?>
<div class="comiis_message bg_f<?php if($post['first']) { ?> view_one b_b<?php } else { ?> view_all<?php } ?> cl message">
<div class="comiis_messages<?php if($comiis_app_switch['comiis_aimg_show'] == 1) { ?> comiis_aimg_show<?php } ?> cl">
<?php if($comiis_app_switch['comiis_view_zntit'] == 1 && $comiis_isnotitle == 1) { } else { ?>
            <?php if($post['first'] && $comiis_app_switch['comiis_view_header'] == 2 && ($comiis_app_switch['comiis_flxx_view'] == 0 || $comiis_app_switch['comiis_flxx_view_wz'] == 0 || !$threadsortshow['typetemplate'] || !$threadsort)) { ?>
            <div class="comiis_viewtit comiis_viewtit_v2">
                <h2>
                    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>"><?php echo $_G['forum_thread']['subject'];?></a>
                    <div class="mt5 cl">
                        <?php if($post['warned']) { ?><span class="top_jg bg_del f_f"><?php echo $comiis_lang['warn_get'];?></span><?php } ?>
                        <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?><span class="top_jh bg_0 f_f"><?php echo $comiis_lang['view41'];?></span><?php } ?>
                        <?php if($thread['digest'] > 0 && $filter != 'digest') { ?><span class="top_jh bg_c f_f"><?php echo $comiis_lang['view42'];?></span><?php } ?>
                        <?php if($_G['forum_thread']['displayorder'] == -2) { ?>
                            <span class="top_jg bg_a f_f">审核中</span>
                        <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?>
                            <span class="top_jg bg_b f_c">已忽略</span>
                        <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?>
                            <span class="top_jg bg_a f_f">草稿</span>
                        <?php } ?>
                    </div>
                </h2>
            </div>
            <?php } } if(!$post['first'] && !empty($post['subject'])) { ?>
<h2 class="f_0"><?php echo $post['subject'];?></h2>
<?php } if(!IS_ROBOT && $post['first'] && !$_G['forum_thread']['archiveid'] && $comiis_app_switch['comiis_modact_log'] == 1) { if(!empty($lastmod['modaction'])) { ?><div class="comiis_modact bg_b f_c"><?php if($lastmod['modactiontype'] == 'REB') { ?>本主题由 <?php echo $lastmod['modusername'];?> 于 <?php echo $lastmod['moddateline'];?> <?php echo $lastmod['modaction'];?>到 <?php echo $lastmod['reason'];?><?php } else { ?>本主题由 <?php echo $lastmod['modusername'];?> 于 <?php echo $lastmod['moddateline'];?> <?php echo $lastmod['modaction'];?><?php } ?></div><?php } } if($post['first'] && $rushreply) { ?>
<div class="comiis_quote comiis_qianglou bg_h">
<?php if($rushresult['creditlimit'] == '') { ?>
<span class="f_a">本帖为抢楼帖，欢迎抢楼!</span><br>
<?php } else { ?>
<span class="f_a">本帖为抢楼帖，<?php echo $rushresult['creditlimit_title'];?>大于<?php echo $rushresult['creditlimit'];?>可以抢楼</span><br>
<?php } ?>
<span class="f_b">
<?php if($rushresult['timer']) { ?>
<span id="rushtimer_<?php echo $thread['tid'];?>"> 【还有 <span id="rushtimer_body_<?php echo $thread['tid'];?>"></span> <script language="javascript">settimer(<?php echo $rushresult['timer'];?>, 'rushtimer_body_<?php echo $thread['tid'];?>');</script><?php if($rushresult['timertype'] == 'start') { ?> 开始 <?php } else { ?> 结束 <?php } ?>】</span><br>
<?php } if($rushresult['stopfloor']) { ?>
截止楼层：<?php echo $rushresult['stopfloor'];?><br>
<?php } if($rushresult['rewardfloor']) { ?>
奖励楼层 : <?php echo $rushresult['rewardfloor'];?><br>
<?php } ?>
</span>
<?php if($rushresult['rewardfloor'] && $_GET['checkrush']) { ?>
<span class="f_0"><?php if($countrushpost) { ?>[<?php echo $countrushpost;?>] 个楼层已中奖<?php } else { ?> 暂时还没有楼层中奖<?php } ?></span><br>
<div class="cl"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>" class="y f_a"><i class="comiis_font">&#xe657;</i> 返回抢楼帖</a></div>
<?php } ?>				
<?php if($rushresult['rewardfloor'] && !$_GET['checkrush']) { ?>
<div class="cl"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;checkrush=1" class="y f_a"><i class="comiis_font">&#xe650;</i> 查看抢中楼层</a></div>
<?php } ?>
</div>
<?php } if($_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])) { ?>
<div class="comiis_quote bg_h f_c">提示: <em>作者被禁止或删除 内容自动屏蔽</em></div>
<?php } elseif($_G['adminid'] != 1 && $post['status'] & 1) { ?>
<div class="comiis_quote bg_h f_c">提示: <em>该帖被管理员或版主屏蔽</em></div>
<?php } elseif($needhiddenreply) { ?>
<div class="comiis_quote bg_h f_c">此帖仅作者可见</div>
<?php } elseif($post['first'] && $_G['forum_threadpay']) { include template('forum/viewthread_pay'); } elseif($_G['forum_discuzcode']['passwordlock'][$post['pid']]) { ?>
<div class="comiis_postpw bg_h">
<ul>
<li class="f_a"><i class="comiis_font">&#xe61d;</i> 本帖为密码帖 ，请输入密码继续访问!</li>
<li class="comiis_flex mt4">
<div class="flex bg_f b_t b_b b_l"><input type="text" id="postpw_<?php echo $post['pid'];?>" class="comiis_px" /></div>					
<button class="bg_0 f_f" type="button" onclick="submitpostpw(<?php echo $post['pid'];?><?php if($_GET['from'] == 'preview') { ?>,<?php echo $post['tid'];?><?php } else { } ?>)">提交</button>
</li>
</ul>
</div>			
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } else { if($_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))) { ?>
<div class="comiis_quote bg_h f_c">提示: <em>作者被禁止或删除 内容自动屏蔽，只有管理员或有管理权限的成员可见</em></div>
<?php } elseif($post['status'] & 1) { ?>
<div class="comiis_quote bg_h f_c">提示: <em>该帖被管理员或版主屏蔽，只有管理员或有管理权限的成员可见</em></div>
<?php } if($post['first'] && $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0) { ?>
<div class="comiis_quote comiis_qianglou bg_h"><a href="forum.php?mod=misc&amp;action=viewpayments&amp;tid=<?php echo $_G['tid'];?>" class="y f_a">记录</a><i class="comiis_font f_a">&#xe61d;</i>&nbsp;付费主题, 价格: <strong><?php echo $_G['forum_thread']['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?></strong></div>
<?php } comiis_load('dQw9EdS6iLz6s65QPd', 'post,threadsort,threadsortshow,matches');?>                      
<?php if($post['first']) { if(!$_G['forum_thread']['special']) { ?>
<div class="comiis_a comiis_message_table cl"><?php echo $post['message'];?></div>
<?php } elseif($_G['forum_thread']['special'] == 1) { include template('forum/viewthread_poll'); } elseif($_G['forum_thread']['special'] == 2) { include template('forum/viewthread_trade'); } elseif($_G['forum_thread']['special'] == 3) { include template('forum/viewthread_reward'); } elseif($_G['forum_thread']['special'] == 4) { include template('forum/viewthread_activity'); } elseif($_G['forum_thread']['special'] == 5) { include template('forum/viewthread_debate'); } elseif($threadplughtml) { ?>
<?php echo $threadplughtml;?>
<div class="comiis_a comiis_message_table cl"><?php echo $post['message'];?></div>
<?php } else { ?>
<div class="comiis_a comiis_message_table cl"><?php echo $post['message'];?></div>
<?php } } else { ?>
<div class="comiis_a comiis_message_table<?php if($comiis_app_switch['comiis_view_quote']==1) { ?> comiis_quote_v1<?php } ?> cl"><?php echo $post['message'];?></div>
<?php } } if($_G['setting']['mobile']['mobilesimpletype'] == 0) { if($post['attachment']) { ?>
   <div class="comiis_p10 bg_e f14 mt10 mb5 cl" style="line-height:24px;">
                    <div class="comiis_noatt_ico bg_0 f_f"><i class="comiis_font">&#xe650;</i></div>
<h3 class="f_c"><?php echo $comiis_lang['tip283'];?></h3>
<p>
                        <?php if($_G['uid']) { ?>
                        <span class="f_c"><?php echo $comiis_lang['tip288'];?></span>
                        <?php } elseif($_G['connectguest']) { ?>
                        <?php echo $comiis_lang['tip287'];?>
                        <?php } else { ?>
                            <span class="f_c"><?php echo $comiis_lang['tip284'];?></span> <a href="member.php?mod=logging&amp;action=login" class="f_wb"><?php echo $comiis_lang['tip285'];?></a> <span class="f_c"><?php echo $comiis_lang['tip286'];?></span> <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="f_wb"><?php echo $_G['setting']['reglinkname'];?></a>
                        <?php } ?>
</p>
   </div>
<?php } elseif($post['imagelist'] || $post['attachlist']) { ?>
   <?php if($post['imagelist']) { if(count($post['imagelist']) == 1) { ?>
<ul class="comiis_img_one<?php if(!$post['first'] && $comiis_app_switch['comiis_aimg_show'] == 1) { ?> comiis_vximga<?php } ?> cl"><?php echo showattach($post, 1); ?></ul>
<?php } else { ?>
<ul class="comiis_img_list<?php if(!$post['first'] && $comiis_app_switch['comiis_aimg_show'] == 1) { ?> comiis_vximgb<?php if(count($post['imagelist']) == 4) { ?> comiis_vximgb_img4<?php } } ?> cl"><?php echo showattach($post, 1); ?></ul>
<?php } } if($post['attachlist']) { ?>
<ul class="comiis_attach_box cl"><?php echo showattach($post); ?></ul>
<?php } } } ?>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_postbottom_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postbottom_mobile'][$postcount];?><?php comiis_load('H47SeNtT7n43eF6336', 'post,postlist,relatedkeywords,comiis_recommend_style1,comiis_recommend_style2,comiis_isweixin,alloweditpost_status,edittimelimit');?><?php if(!$post['first']) { ?>
            <?php if($_GET['from'] != 'preview' && $_G['setting']['commentnumber'] && !empty($comments[$post['pid']])) { ?>
            <div id="comment_<?php echo $post['pid'];?>" class="comiis_dianping bg_e mt10 mb5">
                <ul>
                    <?php if(is_array($comments[$post['pid']])) foreach($comments[$post['pid']] as $comment) { ?>                    <li>
                    <?php if($comment['authorid']) { ?>
                        <a href="home.php?mod=space&amp;uid=<?php echo $comment['authorid'];?>&amp;do=profile" class="f_ok"><?php echo $comment['author'];?>:</a>
                        <?php } else { ?>
                        <span class="f_ok">游客:</span>
                    <?php } ?>
                    <?php echo $comment['comment'];?>&nbsp;
                    <?php if($comment['rpid']) { ?>
                        <a href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=<?php echo $comment['rpid'];?>&amp;ptid=<?php echo $_G['tid'];?>" class="xi2">详情</a>
                        <a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $comment['rpid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" class="xi2" onclick="showWindow('reply', this.href)">回复</a>
                    <?php } ?>
                    <?php if($_G['forum']['ismoderator'] && $_G['group']['allowdelpost']) { ?><a href="javascript:;" onclick="modaction('delcomment', <?php echo $comment['id'];?>)" class="f_g">删除</a><?php } ?>
                    </li>
                    <?php } ?>
                </ul>
                <?php if($commentcount[$post['pid']] > $_G['setting']['commentnumber']) { ?>
                <div class="comiis_dianping_page">
                    <a href="javascript:;" onclick="ajaxget('forum.php?mod=misc&action=commentmore&tid=<?php echo $post['tid'];?>&pid=<?php echo $post['pid'];?>&page=2', 'comment_<?php echo $post['pid'];?>')" class="kmall f_c"><?php echo $comiis_lang['view3'];?><?php if($comiis_app_switch['comiis_view_dianping_name']) { ?><?php echo $comiis_app_switch['comiis_view_dianping_name'];?><?php } else { ?><?php echo $comiis_lang['comments'];?><?php } ?>...</a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        <?php } if(!$post['first'] && $comiis_app_switch['comiis_view_lcrate'] != 1) { ?>
            <?php if($_GET['from'] != 'preview' && !empty($post['ratelog'])) { ?>
            <div id="ratelog_<?php echo $post['pid'];?>" class="comiis_view_lcrate mt10 mb5">
                <h3>
<?php if(count($post['ratelog']) > 5) { ?><a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" class="comiis_xifont f_d"><i class="comiis_font">&#xe622;</i><?php echo $comiis_lang['view3'];?></a><?php } ?>
<span class="f_ok"><i class="comiis_font">&#xe6ba;</i><em class="f_a"><?php echo count($postlist[$post['pid']]['totalrate']);; ?></em> <?php echo $comiis_lang['tip259'];?></span>
                </h3>
                <?php $n=0;?>                <?php if(is_array($post['ratelog'])) foreach($post['ratelog'] as $uid => $ratelog) { ?>                    <?php $n++;?>                    <?php if($n <= 5) { ?>
                    <li id="rate_<?php echo $post['pid'];?>_<?php echo $uid;?>" class="bg_e mt5">
                        <a href="home.php?mod=space&amp;uid=<?php echo $uid;?>&amp;do=profile" class="lcrate_img"><?php echo avatar($uid, 'small');; ?></a>
                        <h2>
                            <?php if(is_array($ratelog['score'])) foreach($ratelog['score'] as $id => $score) { ?>                                <?php if($score > 0) { ?>
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
</div>
<?php if($post['first']) { if($comiis_app_switch['comiis_view_header_noxx'] == 1 && $comiis_app_switch['comiis_view_bkxx'] == 0) { ?>
<div class="comiis_bankuai bg_f b_t b_b cl">
<ul>
<li>
<span><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>"><i class="comiis_font f_d">&#xe60c;</i></a></span>
<div class="top_ico"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>"><?php if($_G['forum']['icon']) { ?><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo get_forumimg($_G['forum']['icon']); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_loadimages"<?php } ?>><?php } else { ?><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><?php } ?></a></div>
<p class="bankuai_tit vm"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>" class="z f_b"><?php echo $_G['forum']['name'];?></a>
<?php if($comiis_forum_fav['favid']) { ?>
<em class="bg_b f_d comiis_favorites"><a href="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;type=forum&amp;formhash=<?php echo FORMHASH;?>&amp;favid=<?php echo $comiis_forum_fav['favid'];?>&amp;handlekey=forum_fav" class="dialog" comiis="handle"><?php echo $comiis_lang['all4'];?></a></em></p>
<?php } else { ?>
<em class="bg_a f_f comiis_favorites"><a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=<?php if($_G['forum_thread']['isgroup'] == 1) { ?>group<?php } else { ?>forum<?php } ?>&id=<?php echo $_G['fid'];?>&formhash=<?php echo FORMHASH;?>&handlekey=forum_fav<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>"<?php if($_G['uid']) { ?> class="dialog"<?php } ?> comiis="handle">+ <?php echo $comiis_lang['all3'];?></a></em>
<?php } ?>
<p class="f_c"><?php echo $comiis_lang['view5'];?>: <?php echo $_G['forum']['posts'];?>&nbsp;&nbsp;&nbsp;<span id="comiis_forum_favtimes"><?php if($_G['forum']['favtimes']) { ?><?php echo $comiis_lang['all3'];?>: <em><?php echo $_G['forum']['favtimes'];?></em><?php } ?></span></p>
</li>
</ul>
</div>
<?php } elseif($comiis_app_switch['comiis_view_header_noxx'] == 1 && $comiis_app_switch['comiis_view_bkxx'] == 1) { ?>
        <div class="comiis_userlist bg_f b_t b_b mb10 cl">
            <ul>
                <li class="f_c">
                    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>" class="kmdbt">
                    <i class="comiis_font f_d">&#xe60c;</i>
                    <img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php if($_G['forum']['icon']) { echo get_forumimg($_G['forum']['icon']); } else { ?>template/comiis_app/comiis/img/forum.png<?php } ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_loadimages"<?php } ?>>
                    <?php echo $comiis_lang['tip253'];?> <span class="f_ok"><?php echo $_G['forum']['name'];?></span> <?php echo $comiis_lang['tip121'];?>
                    </a>
                </li>
            </ul>
        </div>
    <?php } if($post['relateitem'] && $comiis_app_switch['comiis_view_cnxh'] == 1 && $comiis_app_switch['comiis_view_cnxh_wz'] != 1) { ?>
        <?php if($comiis_app_switch['comiis_view_cnxh_style'] == 1) { ?>
  <?php $redata = comiis_relateitem($post['relateitem']);$comiis_pic_list = $redata['comiis_pic_list'];?>  <div class="comiis_pltit bg_f b_b<?php if($comiis_app_switch['comiis_view_cnxh_wz'] == 1) { ?> b_t<?php } ?> cl"><h2><?php if($comiis_app_switch['comiis_view_cnxh_name']) { ?><?php echo $comiis_app_switch['comiis_view_cnxh_name'];?><?php } else { ?>相关帖子<?php } ?></h2></div>
  <div class="comiis_forumlist cl"<?php if($comiis_app_switch['comiis_view_cnxh_wz'] == 1) { ?> style="margin-bottom:0;"<?php } ?>>
    <ul>
      <?php $n=0;$comiis_app_switch['comiis_view_cnxh_num'] = ($comiis_app_switch['comiis_view_cnxh_num'] ? $comiis_app_switch['comiis_view_cnxh_num'] : 5)?>      <?php if(is_array($post['relateitem'])) foreach($post['relateitem'] as $thread_s) { ?>      <?php $n++;?>      <?php if($n <= $comiis_app_switch['comiis_view_cnxh_num']) { ?>
        <li class="forumlist_li comiis_wzlists bg_f b_b">
          <div class="<?php if(!$comiis_pic_list[$thread_s['tid']]['num']) { ?>wzlist_noimg<?php } elseif($comiis_pic_list[$thread_s['tid']]['num'] < 3) { ?>wzlist_one<?php } else { ?>wzlist_imgs<?php } ?>">
            <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread_s['tid'];?>">
            <?php if($thread_s['attachment'] == 2 && ($comiis_pic_list[$thread_s['tid']]['num'] == 1 || $comiis_pic_list[$thread_s['tid']]['num'] == 2)) { ?>
              <div class="wzlist_imga"><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($comiis_pic_list[$thread_s['tid']]['aid']['0'], '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_loadimages"<?php } ?>></div>
            <?php } ?>
            <?php if($thread_s['attachment'] == 2 && $comiis_pic_list[$thread_s['tid']]['num'] >= 3) { ?>
              <h2><?php echo $thread_s['subject'];?></h2>
              <div class="listimgs">
                <ul>
                <?php if(is_array($comiis_pic_list[$thread_s['tid']]['aid'])) foreach($comiis_pic_list[$thread_s['tid']]['aid'] as $temp) { ?>                  <li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_loadimages"<?php } ?>></li>
                <?php } ?>
                </ul>
              </div>
            <?php } else { ?>
              <div class="wzlist_info<?php if($thread_s['attachment'] == 2) { ?> wzlist_infoa<?php } else { ?> wzlist_infob<?php } ?>">
                <h2><?php echo $thread_s['subject'];?></h2>
              </div>
            <?php } ?>
            <div class="wzlist_bottom f_d"><em class="y"><?php echo $thread_s['views'];?><?php echo $comiis_lang['view47'];?></em><?php if(in_array($thread_s['displayorder'], array(1, 2, 3, 4))) { ?><span class="f_g"><?php echo $comiis_lang['thread_stick'];?></span><?php } if($thread_s['digest'] > 0) { ?><span class="f_ok"><?php echo $comiis_lang['view42'];?></span><?php } echo dgmdate($thread_s['dateline'], 'u'); ?></div>
            </a>
          </div>	
        </li>
      <?php } ?>
      <?php } ?>          
    </ul>
  </div>
<?php } else { ?>
  <div class="comiis_cnxh bg_f b_t b_b cl">
    <h2><?php if($comiis_app_switch['comiis_view_cnxh_name']) { ?><?php echo $comiis_app_switch['comiis_view_cnxh_name'];?><?php } else { ?>相关帖子<?php } ?></h2>
      <ul class="cl">
      <?php $n=0;$comiis_app_switch['comiis_view_cnxh_num'] = ($comiis_app_switch['comiis_view_cnxh_num'] ? $comiis_app_switch['comiis_view_cnxh_num'] : 5)?>  
      <?php if(is_array($post['relateitem'])) foreach($post['relateitem'] as $var) { ?>      <?php $n++;?>      <?php if($n <= $comiis_app_switch['comiis_view_cnxh_num']) { ?>
      <li class="b_t"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $var['tid'];?>" title="<?php echo $var['subject'];?>"><i class="comiis_font f_d">&#xe60c;</i><?php echo $var['subject'];?></a></li>
      <?php } ?>
      <?php } ?>
      </ul>
  </div>
<?php } ?>  
<?php } elseif($post['relateitem'] && $comiis_app_switch['comiis_view_cnxh'] == 1 && $comiis_app_switch['comiis_view_cnxh_wz'] == 1) { ?>
        <?php $comiis_relateitem = $post['relateitem'];?><?php } ?>
<a name="comiis_allreplies"></a>
<div class="comiis_pltit bg_f b_t cl">		
<span class="comiis_ordertype f_c y">
<?php if($post['authorid'] && !$post['anonymous'] && ($_G['forum_thread']['allreplies'] != 0 && count($postlist) > 1)) { ?>
              <?php if(!IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']) { ?>
                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;page=<?php echo $page;?>&amp;authorid=<?php echo $_G['forum_thread']['authorid'];?>#comiis_allreplies"><i class="comiis_font vm">&#xe63a;</i>只看楼主</a>
              <?php } elseif(!$_G['forum_thread']['archiveid']) { ?>
                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;page=<?php echo $page;?>#comiis_allreplies"><i class="comiis_font vm">&#xe63a;</i><?php echo $comiis_lang['view3'];?></a>
              <?php } ?>	
                <?php } ?>
                <?php if(!IS_ROBOT && !$_G['forum_thread']['archiveid'] && !$rushreply && $_G['forum_thread']['allreplies']!=0) { ?>
              <?php if($ordertype != 1) { ?>
                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;ordertype=1&amp;mobile=2#comiis_allreplies"><i class="comiis_font vm">&#xe63d;</i>倒序浏览</a>
              <?php } else { ?>
                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;ordertype=2&amp;mobile=2#comiis_allreplies"><i class="comiis_font kmgo vm">&#xe63d;</i>正序浏览</a>
              <?php } } ?>
</span>
<h2><?php if($_G['forum_thread']['allreplies']!=0) { ?><?php echo $comiis_lang['all5'];?><span class="f_d"><?php echo $_G['forum_thread']['allreplies'];?></span><?php } else { ?><?php echo $comiis_lang['all6'];?><?php } ?></h2>
</div>
<?php if($_G['forum_thread']['allreplies'] == 0 && count($postlist) <= 1) { ?>
<div class="comiis_notip bg_f b_t comiis_sofa cl">
<i class="comiis_font f_e cl">&#xe613;</i>
<span class="f_d"><?php echo $comiis_lang['all6'];?>, <?php echo $comiis_lang['all7'];?></span>
</div>
<?php } } if(!$post['first'] && $comiis_app_switch['comiis_view_reply'] == 0) { ?>
<div class="comiis_postli_times bg_f">
<span class="bottom_zhan y">
<?php if(!$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])) { ?>
<a href="javascript:<?php if($_G['uid']) { ?>comiis_recommend('<?php echo $post['pid'];?>')<?php } ?>;" class="f_c<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } if($_G['comiis_forum_hotreply_member'][$post['pid']]) { ?> f_wb<?php } ?>" id="comiis_hotreply<?php echo $post['pid'];?>"><i class="comiis_font">&#xe63b;</i><span class="znums" id="comiis_recommend<?php echo $post['pid'];?>"><?php if($post['postreview']['support']) { ?><?php echo $post['postreview']['support'];?><?php } ?></span></a>
<?php } ?>
            <?php if($comiis_app_switch['comiis_view_lcrate'] != 1) { ?>		
                <?php if(!$post['first'] && $_G['group']['raterange'] && $post['authorid']) { ?>
                <a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=rate&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?><?php } else { ?>javascript:;<?php } ?>" class="f_c<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } else { ?> dialog<?php } ?>"><i class="comiis_font">&#xe6ba;</i></a>
                <?php } ?>
            <?php } ?>
            <?php if($comiis_app_switch['comiis_view_dianping'] != 1) { ?>
                <?php if($post['invisible'] == 0 && $allowpostreply && $post['allowcomment'] && (!$thread['closed'] || $_G['forum']['ismoderator'])) { ?>
                <a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=comment&tid=<?php echo $post['tid'];?>&pid=<?php echo $post['pid'];?>&extra=<?php echo $_GET['extra'];?>&page=<?php echo $page;?><?php if($_G['forum_thread']['special'] == 127) { ?>&special=<?php echo $specialextra;?><?php } } else { ?>javascript:;<?php } ?>" class="f_c<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } else { ?> dialog<?php } ?>"><i class="comiis_font">&#x<?php if($comiis_app_switch['comiis_view_dianping_ico']) { ?><?php echo $comiis_app_switch['comiis_view_dianping_ico'];?><?php } else { ?>e6a0<?php } ?>;</i></a>
                <?php } } if($comiis_app_switch['comiis_view_quotes'] != 1) { ?>
                <a href="<?php if($_G['uid']) { ?>forum.php?mod=post&action=reply&fid=<?php echo $_G['fid'];?>&tid=<?php echo $_G['tid'];?>&repquote=<?php echo $post['pid'];?>&page=<?php echo $page;?><?php } else { ?>javascript:;<?php } ?>" class="f_c<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } else { ?> dialog<?php } ?>"><i class="comiis_font">&#xe677;</i></a>
<?php } ?>
</span>			
<span class="f_d comiis_tm"><?php echo $post['dateline'];?></span>
</div>
<?php } elseif(!$post['first'] && $comiis_app_switch['comiis_view_reply'] == 2) { ?>	
<div class="comiis_zhanv2 bg_f">
        <?php if($comiis_app_switch['comiis_view_quotes'] != 1) { ?>
            <a href="<?php if($_G['uid']) { ?>forum.php?mod=post&action=reply&fid=<?php echo $_G['fid'];?>&tid=<?php echo $_G['tid'];?>&repquote=<?php echo $post['pid'];?>&page=<?php echo $page;?><?php } else { ?>javascript:;<?php } ?>" class="y b_ok f_c bg_e<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } else { ?> dialog<?php } ?>"><i class="comiis_font">&#xe626;</i>回复</a>
<?php } ?>
        <?php if($comiis_app_switch['comiis_view_dianping'] != 1) { ?>
            <?php if($post['invisible'] == 0 && $allowpostreply && $post['allowcomment'] && (!$thread['closed'] || $_G['forum']['ismoderator'])) { ?>
            <a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=comment&tid=<?php echo $post['tid'];?>&pid=<?php echo $post['pid'];?>&extra=<?php echo $_GET['extra'];?>&page=<?php echo $page;?><?php } else { ?>javascript:;<?php } ?>" class="y b_ok f_c bg_e<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } else { ?> dialog<?php } ?>"><i class="comiis_font">&#x<?php if($comiis_app_switch['comiis_view_dianping_ico']) { ?><?php echo $comiis_app_switch['comiis_view_dianping_ico'];?><?php } else { ?>e6a0<?php } ?>;</i><?php if($comiis_app_switch['comiis_view_dianping_name']) { ?><?php echo $comiis_app_switch['comiis_view_dianping_name'];?><?php } else { ?><?php echo $comiis_lang['comments'];?><?php } ?></a>
            <?php } } if($comiis_app_switch['comiis_view_lcrate'] != 1) { ?>		
            <?php if(!$post['first'] && $_G['group']['raterange'] && $post['authorid']) { ?>
            <a href="<?php if($_G['uid']) { ?>forum.php?mod=misc&action=rate&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?><?php } else { ?>javascript:;<?php } ?>" class="y b_ok f_c bg_e<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } else { ?> dialog<?php } ?>"><i class="comiis_font">&#xe6bf;</i><?php echo $comiis_lang['view50'];?></a>
            <?php } ?>
        <?php } if(!$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])) { ?>
<a href="javascript:<?php if($_G['uid']) { ?>comiis_recommend('<?php echo $post['pid'];?>')<?php } ?>;" class="y b_ok f_c bg_e<?php if(!$_G['uid']) { ?> comiis_openrebox<?php } if($_G['comiis_forum_hotreply_member'][$post['pid']]) { ?> f_wb<?php } ?>" id="comiis_hotreply<?php echo $post['pid'];?>"><i class="comiis_font">&#xe63b;</i><span id="comiis_recommend<?php echo $post['pid'];?>"><?php if($post['postreview']['support']) { ?><?php echo $post['postreview']['support'];?><?php } ?></span><?php echo $comiis_lang['view7'];?></a>
<?php } ?>
</div>
<?php } if($_G['uid']) { ?>	
<div id="moption_<?php echo $post['pid'];?>" popup="true" class="comiis_manage comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">	
<ul>
<?php if($_G['forum_thread']['special'] == 3 && ($_G['forum']['ismoderator'] && (!$_G['setting']['rewardexpiration'] || $_G['setting']['rewardexpiration'] > 0 && ($_G['timestamp'] - $_G['forum_thread']['dateline']) / 86400 > $_G['setting']['rewardexpiration']) || $_G['forum_thread']['authorid'] == $_G['uid']) && $post['authorid'] != $_G['forum_thread']['authorid'] && $post['first'] == 0 && $_G['uid'] != $post['authorid'] && $_G['forum_thread']['price'] > 0) { ?>
<li><a href="javascript:;" onclick="setanswer(<?php echo $post['pid'];?>, '<?php echo $_GET['from'];?>')" class="dialog bg_f b_b">最佳答案</a></li>
<?php } ?>
                <?php if($comiis_app_switch['comiis_view_reply'] == 1) { ?>
                    <?php if($comiis_app_switch['comiis_view_lcrate'] != 1) { ?>		
                        <?php if(!$post['first'] && $_G['group']['raterange'] && $post['authorid']) { ?>
                        <li><a href="forum.php?mod=misc&amp;action=rate&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" class="dialog bg_f b_b"><?php echo $comiis_lang['view50'];?></a></li>
                        <?php } ?>
                    <?php } ?>
                    <?php if($_G['comiis_new'] > 1 && $comiis_app_switch['comiis_view_dianping'] != 1) { ?>
                        <?php if($post['invisible'] == 0 && $allowpostreply && $post['allowcomment'] && (!$thread['closed'] || $_G['forum']['ismoderator'])) { ?>
                        <li><a href="forum.php?mod=misc&amp;action=comment&amp;tid=<?php echo $post['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?><?php if($_G['forum_thread']['special'] == 127) { ?>&amp;special=<?php echo $specialextra;?><?php } ?>" class="bg_f b_b dialog"><?php if($comiis_app_switch['comiis_view_dianping_name']) { ?><?php echo $comiis_app_switch['comiis_view_dianping_name'];?><?php } else { ?><?php echo $comiis_lang['comments'];?><?php } ?></a></li>
                        <?php } ?>
                    <?php } ?>
                    <?php if($comiis_app_switch['comiis_view_quotes'] != 1) { ?>
                        <li><a href="<?php if($_G['uid']) { ?>forum.php?mod=post&action=reply&fid=<?php echo $_G['fid'];?>&tid=<?php echo $_G['tid'];?>&repquote=<?php echo $post['pid'];?>&page=<?php echo $page;?><?php } else { ?>javascript:;<?php } ?>" class="bg_f b_b dialog"><?php echo $comiis_lang['reply'];?></a></li>
                    <?php } ?>
                <?php } if($post['authorid'] != $_G['uid']) { ?>
<li><a href="misc.php?mod=report&amp;rtype=post&amp;rid=<?php echo $post['pid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;fid=<?php echo $_G['fid'];?>" class="dialog bg_f b_b">举报</a></li>
<?php } if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { if($_G['forum']['ismoderator'] && $_G['group']['allowstickreply'] || $_G['forum_thread']['authorid'] == $_G['uid']) { ?>
<li><a href="javascript:;" onclick="modaction('stickreply', '<?php echo $post['pid'];?>')" class="bg_f b_b">置顶</a></li>
<?php } if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { ?>

<li><a href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>" class="redirect bg_f b_b">编辑</a></li>
<?php if($_G['group']['allowdelpost']) { ?><li><a href="forum.php?mod=topicadmin&amp;action=delpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>" class="dialog bg_f b_b">删除</a></li><?php } if($_G['group']['allowbanpost']) { ?><li><a href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>" class="dialog bg_f b_b">屏蔽</a></li><?php } if($_G['group']['allowwarnpost']) { ?><li><a href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>" class="dialog bg_f b_b">警告</a></li><?php } ?>	
<?php } ?>	
<?php } ?>
<li><a href="javascript:;" class="comiis_glclose mt10 bg_f b_t f_g">取消</a></li>
</ul>
</div>
<?php } if($_G['uid'] && $allowpostreply && !$post['first']) { ?>
<div id="replybtn_<?php echo $post['pid'];?>" display="true" style="display:none;">
<input type="button" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" value="回复">
</div>
<?php } ?>
</div><?php $postcount++;?>    <?php } ?>
</div>
<div id="post_new" class="comiis_postli"></div>
<div class="comiis_multi_box bg_f b_t<?php if($comiis_app_switch['comiis_view_cnxh_wz'] == 1) { ?> b_b mb10<?php } ?>">
<?php if($multipage && ($comiis_app_switch['comiis_bbspage_style'] == 0 || $page > 1)) { ?>
<?php echo $multipage;?>
<?php } elseif($comiis_app_switch['comiis_bbspage_style'] == 1 && $page < $comiis_page) { ?>
<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_lang['tip5'];?></a>
<?php } elseif($comiis_app_switch['comiis_bbspage_style'] == 2 && $page < $comiis_page) { ?>
<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip6'];?></div>
<?php } ?>
</div>
<?php if($comiis_app_switch['comiis_bbspage_style'] > 0 && !$_G['inajax'] && $page == 1) { ?>
<script>
var comiis_page = <?php echo $page;?>;
var comiis_ispage = 0;
function comiis_list_page(){
comiis_ispage = 1;
comiis_page++;
if(comiis_page <= <?php echo $comiis_page;?>){
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip6'];?></div>');
$.ajax({
type:'GET',
url: 'forum.php?mod=viewthread&tid=<?php echo $_G['tid'];?>&page=' + comiis_page + '&inajax=1<?php echo ($_GET['ordertype'] ? '&ordertype='.$_GET['ordertype'] : '').($_GET['authorid'] ? '&authorid='.$_GET['authorid'] : '');; ?>' ,
dataType:'xml',
}).success(function(s) {		
if(typeof(s.lastChild.firstChild.nodeValue) != "undefined"){
$('.comiis_postlist').append(s.lastChild.firstChild.nodeValue);
if(comiis_page >= <?php echo $comiis_page;?>){
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip31'];?></div>');
}else{
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_lang['tip5'];?></a>');
}
popup.init();
}else{
comiis_page--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_lang['tip32'];?></a>');
}
comiis_ispage = 0;
}).error(function() {
comiis_page--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d"><?php echo $comiis_lang['tip32'];?></a>');
comiis_ispage = 0;
});
}
}
<?php if($comiis_app_switch['comiis_bbspage_style'] == 2) { ?>
var comiis_page_timer;
$(window).scroll(function(){
clearTimeout(comiis_page_timer);
comiis_page_timer = setTimeout(function() {
var comiis_scroll_bottom = $(window).scrollTop() + $(window).height();
var comiis_list_bottom = $('.comiis_postlist').height() + $('.comiis_postlist').offset().top - 1000;
if(comiis_scroll_bottom >= comiis_list_bottom && comiis_ispage == 0){
comiis_list_page();
}	
}, 100);
});
<?php } ?>
</script>
<?php } if($comiis_relateitem && $comiis_app_switch['comiis_view_cnxh'] == 1 && $comiis_app_switch['comiis_view_cnxh_wz'] == 1) { ?>
    <?php $post['relateitem'] = $comiis_relateitem;?>    <?php if($comiis_app_switch['comiis_view_cnxh_style'] == 1) { ?>
  <?php $redata = comiis_relateitem($post['relateitem']);$comiis_pic_list = $redata['comiis_pic_list'];?>  <div class="comiis_pltit bg_f b_b<?php if($comiis_app_switch['comiis_view_cnxh_wz'] == 1) { ?> b_t<?php } ?> cl"><h2><?php if($comiis_app_switch['comiis_view_cnxh_name']) { ?><?php echo $comiis_app_switch['comiis_view_cnxh_name'];?><?php } else { ?>相关帖子<?php } ?></h2></div>
  <div class="comiis_forumlist cl"<?php if($comiis_app_switch['comiis_view_cnxh_wz'] == 1) { ?> style="margin-bottom:0;"<?php } ?>>
    <ul>
      <?php $n=0;$comiis_app_switch['comiis_view_cnxh_num'] = ($comiis_app_switch['comiis_view_cnxh_num'] ? $comiis_app_switch['comiis_view_cnxh_num'] : 5)?>      <?php if(is_array($post['relateitem'])) foreach($post['relateitem'] as $thread_s) { ?>      <?php $n++;?>      <?php if($n <= $comiis_app_switch['comiis_view_cnxh_num']) { ?>
        <li class="forumlist_li comiis_wzlists bg_f b_b">
          <div class="<?php if(!$comiis_pic_list[$thread_s['tid']]['num']) { ?>wzlist_noimg<?php } elseif($comiis_pic_list[$thread_s['tid']]['num'] < 3) { ?>wzlist_one<?php } else { ?>wzlist_imgs<?php } ?>">
            <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread_s['tid'];?>">
            <?php if($thread_s['attachment'] == 2 && ($comiis_pic_list[$thread_s['tid']]['num'] == 1 || $comiis_pic_list[$thread_s['tid']]['num'] == 2)) { ?>
              <div class="wzlist_imga"><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($comiis_pic_list[$thread_s['tid']]['aid']['0'], '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_loadimages"<?php } ?>></div>
            <?php } ?>
            <?php if($thread_s['attachment'] == 2 && $comiis_pic_list[$thread_s['tid']]['num'] >= 3) { ?>
              <h2><?php echo $thread_s['subject'];?></h2>
              <div class="listimgs">
                <ul>
                <?php if(is_array($comiis_pic_list[$thread_s['tid']]['aid'])) foreach($comiis_pic_list[$thread_s['tid']]['aid'] as $temp) { ?>                  <li><img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php echo getforumimg($temp, '0', '200', '160'); ?>"<?php if($comiis_app_switch['comiis_loadimg']) { ?> class="comiis_loadimages"<?php } ?>></li>
                <?php } ?>
                </ul>
              </div>
            <?php } else { ?>
              <div class="wzlist_info<?php if($thread_s['attachment'] == 2) { ?> wzlist_infoa<?php } else { ?> wzlist_infob<?php } ?>">
                <h2><?php echo $thread_s['subject'];?></h2>
              </div>
            <?php } ?>
            <div class="wzlist_bottom f_d"><em class="y"><?php echo $thread_s['views'];?><?php echo $comiis_lang['view47'];?></em><?php if(in_array($thread_s['displayorder'], array(1, 2, 3, 4))) { ?><span class="f_g"><?php echo $comiis_lang['thread_stick'];?></span><?php } if($thread_s['digest'] > 0) { ?><span class="f_ok"><?php echo $comiis_lang['view42'];?></span><?php } echo dgmdate($thread_s['dateline'], 'u'); ?></div>
            </a>
          </div>	
        </li>
      <?php } ?>
      <?php } ?>          
    </ul>
  </div>
<?php } else { ?>
  <div class="comiis_cnxh bg_f b_t b_b cl">
    <h2><?php if($comiis_app_switch['comiis_view_cnxh_name']) { ?><?php echo $comiis_app_switch['comiis_view_cnxh_name'];?><?php } else { ?>相关帖子<?php } ?></h2>
      <ul class="cl">
      <?php $n=0;$comiis_app_switch['comiis_view_cnxh_num'] = ($comiis_app_switch['comiis_view_cnxh_num'] ? $comiis_app_switch['comiis_view_cnxh_num'] : 5)?>  
      <?php if(is_array($post['relateitem'])) foreach($post['relateitem'] as $var) { ?>      <?php $n++;?>      <?php if($n <= $comiis_app_switch['comiis_view_cnxh_num']) { ?>
      <li class="b_t"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $var['tid'];?>" title="<?php echo $var['subject'];?>"><i class="comiis_font f_d">&#xe60c;</i><?php echo $var['subject'];?></a></li>
      <?php } ?>
      <?php } ?>
      </ul>
  </div>
<?php } ?>   
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_bottom_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_bottom_mobile'];?>
<div id="comiis_followmod" style="display:none;">
<div class="comiis_tip bg_f cl">
<dt class="f_b">
<p><?php echo $comiis_lang['all10'];?>?</p>
</dt>	
<dd class="b_t cl">		
        <?php if($comiis_app_switch['comiis_post_btnwz'] == 1) { ?>
            <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><?php echo $comiis_lang['all9'];?></a>
            <a href="javascript:comiis_followmod();" class="tip_btn bg_f f_0"><span class="tip_lx"><?php echo $comiis_lang['all8'];?></span></a>
        <?php } else { ?>
            <a href="javascript:comiis_followmod();" class="tip_btn bg_f f_0"><?php echo $comiis_lang['all8'];?></a>
            <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx"><?php echo $comiis_lang['all9'];?></span></a>
        <?php } ?>
</dd>
</div>
</div>
</div>
<div class="comiis_fastpostbox comiis_showleftbox bg_e"><script>var action = '<?php echo $_GET['action'];?>';</script>
<script src="data/cache/common_smilies_var.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="template/comiis_app/comiis/js/comiis_post.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<div class="comiis_postbox ojig">
<div class="bg_e b_t cl">
<form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;replysubmit=yes&amp;mobile=2">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="noticeauthor" value="<?php echo dhtmlspecialchars(authcode('q|'.$_G['forum_thread']['authorid'], 'ENCODE'));; ?>"><?php comiis_load('N6733Yyt6NR33i3YBF', 'page,firststand,secqaacheck,seccodecheck,imgattachs');?><?php $comiis_upload_url = 'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2';?><?php comiis_load('JnZNyjJh92zfGlzHhN', 'comiis_upload_url,aid,catid,swfconfig');?><?php comiis_load('B1Ja1GYArYA9xkxb5g', 'postinfo');?><?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_button_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_button_mobile'];?>
</form>
</div>
</div><?php comiis_load('y4uv8VO5BDS4Or4QUs', 'allowpostreply');?></div>
<div>
<div class="comiis_share_box bg_e b_t comiis_showleftbox">
<div id="comiis_share" class="bdsharebuttonbox"></div>
<h2 class="bg_f f_g b_t comiis_share_box_close"><a href="javascript:;">取消</a></h2>
</div>
<div class="comiis_share_tip"></div>
<script src="template/comiis_app/comiis/js/comiis_nativeShare.js" type="text/javascript"></script>
<script>
var share_obj = new nativeShare('comiis_share', {
img:'<?php if($comiis_share_pic['attachment']) { ?><?php echo $_G['siteurl'];?><?php echo $comiis_share_pic['url'];?><?php echo $comiis_share_pic['attachment'];?><?php } ?>',
url:'<?php echo $_G['siteurl'];?>forum.php?mod=viewthread&tid=<?php echo $_G['tid'];?>',
title:$('#comiis_wx_title_box').html(),
desc:'<?php echo $comiis_share_message;?>',
from:'<?php echo $_G['setting']['bbname'];?>'
});
function comiis_postre() {
comiis_prevent_post('#fastpostsubmit_btn', 1);
$.ajax({
type:'POST',
url:$('#postforms').attr('action') + '&handlekey=fastposts&loc=1&inajax=1',
data:$('#postforms').serialize(),
dataType:'xml'
})
.success(function(s) {
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = obj.attr('action');
popup.close();
});
return false;
}
function succeedhandle_fastposts(locationhref, message, param) {
var pid = param['pid'];
var tid = param['tid'];
if(pid) {
$.ajax({
type:'POST',
url:'forum.php?mod=viewthread&tid=' + tid + '&viewpid=' + pid + '&mobile=2',
dataType:'xml'
})
.success(function(s) {
$('.comiis_sofa').css('display', 'none');
$('#post_new').append(s.lastChild.firstChild.nodeValue);
popup.open('<?php echo $comiis_lang['view9'];?>', 'alert');
popup.init();
comiis_prevent_post('#fastpostsubmit_btn', 0);
})
.error(function() {
window.location.href = 'forum.php?mod=viewthread&tid=' + tid;
popup.close();
});
} else {
if(!message) {
message = '本版回帖需要审核，您的帖子将在通过审核后显示';
}
popup.open(message, 'alert');
comiis_prevent_post('#fastpostsubmit_btn', 0);
}
}
function errorhandle_fastposts(message, param) {
popup.open(message, 'alert');
$('#fastpostsubmit_btn').attr("disabled", false);
}
</script>
<?php } if($comiis_app_switch['comiis_vfoot_gohome'] == 1 && $comiis_is_new_url == 1) { ?><?php echo $comiis_app_switch['comiis_vfoot_gohomedm'];?><?php } $comiis_app_wx_share['desc'] = $comiis_share_message;?><?php $comiis_app_wx_share['title'] = $_G[forum_thread][subject];?><?php include template('common/footer'); ?>