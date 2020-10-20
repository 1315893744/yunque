<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('guide');
0
|| checktplrefresh('./template/quater_6_ui/forum/guide.htm', './template/quater_6_ui/forum/guide_list_row.htm', 1600750083, '28', './data/template/29_28_forum_guide.tpl.php', './template/quater_6_ui', 'forum/guide')
;?><?php include template('common/header'); ?><link rel="stylesheet" type="text/css" href="template/quater_6_ui/src/guide.css" />
<style type="text/css">
.xl2 { background: url(<?php echo IMGDIR;?>/vline.png) repeat-y 50% 0; }
.xl2 li { width: 49.9%; }
.xl2 li em { padding-right: 10px; }
.xl2 .xl2_r em { padding-right: 0; }
.xl2 .xl2_r i { padding-left: 10px; }
</style>
<div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><?php if(helper_access::check_module('guide')) { ?><em>&raquo;</em><a href="forum.php?mod=guide&amp;view=index">导读</a><?php } ?><?php echo $navigation;?>
</div>
</div>
<div class="boardnav">
<div id="ct" class="wp cl<?php if($_G['forum']['allowside']) { ?> ct2<?php } ?>"<?php if($leftside) { ?> style="margin-left:<?php echo $_G['leftsidewidth_mwidth'];?>px"<?php } ?>>
<div class="mn" style="padding: 0 0 5px 0; margin: 10px 0 0 0; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border-radius: 0; background: #FFFFFF;">
<div class="bm bml pbn" style="display: none;">
<div class="bm_h cl">
<?php if($view != 'index' && $view != 'my') { ?>
<span class="y">
<a href="forum.php?mod=guide&amp;view=<?php echo $view;?>&amp;rss=1" class="fa_rss" target="_blank" title="RSS">订阅</a>
</span>
<?php } ?>
<h1 class="xs2">
<?php echo $lang['guide_'.$view];?>
</h1>
</div>
<?php if($view != 'my') { ?>
<div class="bm_c cl pbn">
<div style=";" id="forum_rules_1163">
<div class="ptn xg2"><?php echo $lang['guide_'.$view.'_description'];?></div>
</div>
</div>
<?php } ?>
</div>
<?php if($view != 'index') { ?>
<div id="pgt" class="bm bw0 pgs cl" style="display: none;">
<?php echo $multipage;?>
<a onclick="showWindow('nav', this.href, 'get', 0)" href="forum.php?mod=misc&amp;action=nav"><img src="<?php echo IMGDIR;?>/pn_post.png" alt="发新帖" /></a>
</div>
<?php } ?>
<ul id="thread_types" class="ttp bm cl">
<li <?php echo $currentview['hot'];?>><a href="forum.php?mod=guide&amp;view=hot">最新热门<span></span></a></li>
<li <?php echo $currentview['digest'];?>><a href="forum.php?mod=guide&amp;view=digest">最新精华<span></span></a></li>
<li <?php echo $currentview['new'];?>><a href="forum.php?mod=guide&amp;view=new">最新回复<span></span></a></li>
<li <?php echo $currentview['newthread'];?>><a href="forum.php?mod=guide&amp;view=newthread">最新发表<span></span></a></li>
<li <?php echo $currentview['sofa'];?>><a href="forum.php?mod=guide&amp;view=sofa">抢沙发<span></span></a></li>
<li <?php echo $currentview['my'];?>><a id="filter_special" href="forum.php?mod=guide&amp;view=my" onmouseover="showMenu(this.id)">我的帖子<span></span></a></li>
<?php if(!empty($_G['setting']['pluginhooks']['guide_nav_extra'])) echo $_G['setting']['pluginhooks']['guide_nav_extra'];?>
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['guide_top'])) echo $_G['setting']['pluginhooks']['guide_top'];?>
<?php if($view == 'index') { if(is_array($data)) foreach($data as $key => $list) { ?><div class="bm bmw">
<div class="bm_h">
<a href="forum.php?mod=guide&amp;view=<?php echo $key;?>" class="y xi2">更多 &raquo;</a>
<h2>
<?php if($key == 'hot') { ?>最新热门<?php } elseif($key == 'digest') { ?>最新精华<?php } elseif($key == 'newthread') { ?>最新发表<?php } elseif($key == 'new') { ?>最新回复<?php } elseif($key == 'my') { ?>我的帖子<?php } ?>
</h2>
</div>
 <div class="bm_c">
 	<div class="xl xl2 cl">
 		<?php if($list['threadcount']) { ?>
 <?php $i=0;?> <?php if(is_array($list['threadlist'])) foreach($list['threadlist'] as $thread) { ?> <?php $i++;$newtd=$i%2;?> 			<li<?php if(!$newtd) { ?> class="xl2_r"<?php } ?>>
 			<em>
 			<?php if($key == 'hot') { ?><span class="xi1"><?php echo $thread['heats'];?>人参与</span><?php } ?>
 			<?php if($key == 'new') { ?><?php echo $thread['lastpost'];?><?php } ?>
 			</em>
 			
 			<i>&middot; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"<?php echo $thread['highlight'];?> target="_blank"><?php echo $thread['subject'];?></a></i>&nbsp;<span class="xg1"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>" target="_blank"><?php echo $list['forumnames'][$thread['fid']]['name'];?></a></span>
 			</li>
 			<?php } ?>
 		<?php } else { ?>
 				<p class="emp">暂时还没有帖子</p>
 		<?php } ?>
 	</div>
</div>
</div>
<?php } } else { if(is_array($data)) foreach($data as $key => $list) { ?><div id="threadlist" class="tl bm bmw"<?php if($_G['uid']) { ?> style="position: relative;"<?php } ?>>
<div class="th" style="display: none;">
<table cellspacing="0" cellpadding="0">
<tr>
<th colspan="2">
标题
<?php if($view == 'my') { ?>
&nbsp;&nbsp;&nbsp;
<a href="forum.php?mod=guide&amp;view=my&amp;type=thread" <?php echo $orderactives['thread'];?>>主题</a><span class="pipe">|</span>
<a href="forum.php?mod=guide&amp;view=my&amp;type=reply" <?php echo $orderactives['reply'];?>>回复</a><span class="pipe">|</span>
<a href="forum.php?mod=guide&amp;view=my&amp;type=postcomment" <?php echo $orderactives['postcomment'];?>>点评</a><span class="pipe">|</span>
<?php if($viewtype != 'postcomment') { ?>
<a href="#" onclick="var displayvalue = $('searchbody').style.display == 'none' ? '' : 'none';$('searchbody').style.display=displayvalue; return false;">筛选</a>
<?php } } ?>
</th>
<td class="by">版块/群组</td>
<td class="by">作者</td>
<td class="num">回复/查看</td>
<td class="by">最后发表</td>
</tr>
<?php if($view == 'my') { ?>
<tbody class="bw0_all" id="searchbody"<?php if(!$searchbody) { ?> style="display: none"<?php } ?>>
<tr>
<th colspan="6">&nbsp;
<form method="get" action="forum.php">
<input type="hidden" name="mod" value="guide">
<input type="hidden" name="view" value="my">
<input type="hidden" name="type" value="<?php echo $viewtype;?>">
<?php if($viewtype != 'postcomment') { ?>
状态:
<select name="filter" id="filter">
<option value="">全部</option><?php if(is_array($filter_array)) foreach($filter_array as $fkey => $name) { ?><option value="<?php echo $fkey;?>" <?php if($fkey == $_GET['filter']) { ?>selected<?php } ?>><?php echo $name;?></option>
<?php } ?>
</select>
选择版块:
<select name="fid" id="forumlist">
<option value="0">全部</option>
<?php echo $forumlist;?>
</select>
<?php } if($viewtype == 'thread') { ?>
&nbsp; 关键字: <input type="text" id="searchmypost" class="px vm" name="searchkey" size="20" value="<?php echo $searchkey;?>" >
<?php } ?><button class="pn vm"><em>搜索</em></button>
</form>
</th>
</tr>
</tbody>
<?php } ?>
</table>
</div>
<div class="bm_c" style="margin: 0 12px;">
<div id="forumnew" style="display:none"></div>
<table cellspacing="0" cellpadding="0">				<?php if($list['threadcount']) { if(is_array($list['threadlist'])) foreach($list['threadlist'] as $key => $thread) { ?><tbody id="<?php echo $thread['id'];?>">
<tr>
<td class="icn">
                                     <div class="time_reply">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>" target="_blank" title="<?php echo $thread['replies'];?> 个回复">
<?php echo $thread['replies'];?>
</a>
                                       </div>
</td>
<th class="<?php echo $thread['folder'];?>">
                                     <div class="top_line cl">
<?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
<?php echo $thread['typehtml'];?> <?php echo $thread['sorthtml'];?>
<?php if($thread['moved']) { ?>
移动:<?php $thread[tid]=$thread[closed];?><?php } ?>
                                        <div class="z tags"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>" target="_blank"><?php echo $list['forumnames'][$thread['fid']]['name'];?></a></div>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>" target="_blank" class="xst thread_tit" style="font-weight: 400;"><?php echo $thread['subject'];?></a><?php if($_G['setting']['threadhidethreshold'] && $thread['hidden'] >= $_G['setting']['threadhidethreshold']) { ?>&nbsp;<span class="xg1">隐藏</span>&nbsp;<?php } if($view == 'hot') { ?>&nbsp;<span class="xi1"><?php echo $thread['heats'];?>人参与</span>&nbsp;<?php } if($thread['icon'] >= 0) { ?>
<img src="<?php echo STATICURL;?>image/stamp/<?php echo $_G['cache']['stamps'][$thread['icon']]['url'];?>" alt="<?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?>" align="absmiddle" />
<?php } if($thread['rushreply']) { ?>
<img src="<?php echo IMGDIR;?>/rushreply_s.png" alt="抢楼" align="absmiddle" />
<?php } if($stemplate && $sortid) { ?><?php echo $stemplate[$sortid][$thread['tid']];?><?php } if($thread['readperm']) { ?> - [阅读权限 <span class="xw1"><?php echo $thread['readperm'];?></span>]<?php } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
- <span class="xi1">[悬赏 <span class="xw1"><?php echo $thread['price'];?></span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?>]</span>
<?php } else { ?>
- [售价 <span class="xw1"><?php echo $thread['price'];?></span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?>]
<?php } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
- [已解决]
<?php } if($thread['attachment'] == 2) { ?>
<img src="template/quater_6_ui/src/quater_forum/image_s.gif" alt="attach_img" title="图片附件" align="absmiddle" />
<?php } elseif($thread['attachment'] == 1) { ?>
<img src="template/quater_6_ui/src/quater_forum/common.gif" alt="attachment" title="附件" align="absmiddle" />
<?php } if($thread['digest'] > 0 && $filter != 'digest') { ?>
<img src="template/quater_6_ui/src/quater_forum/digest_<?php echo $thread['digest'];?>.png" align="absmiddle" alt="digest" title="精华 <?php echo $thread['digest'];?>" />
<?php } if($thread['displayorder'] == 0) { if($thread['recommendicon'] && $filter != 'recommend') { ?>
<img src="template/quater_6_ui/src/quater_forum/recommend_<?php echo $thread['recommendicon'];?>.gif" align="absmiddle" alt="recommend" title="评价指数 <?php echo $thread['recommends'];?>" />
<?php } if($thread['heatlevel']) { ?>
<img src="template/quater_6_ui/src/quater_forum/hot_<?php echo $thread['heatlevel'];?>.gif" align="absmiddle" alt="heatlevel" title="<?php echo $thread['heatlevel'];?> 热度" />
<?php } if($thread['rate'] > 0) { ?>
<img src="template/quater_6_ui/src/quater_forum/agree.gif" align="absmiddle" alt="agree" title="帖子被加分" />
<?php } elseif($thread['rate'] < 0) { ?>
<img src="template/quater_6_ui/src/quater_forum/disagree.gif" align="absmiddle" alt="disagree" title="帖子被减分" />
<?php } } if($thread['replycredit'] > 0) { ?>
- <span class="xi1">[回帖奖励 <strong> <?php echo $thread['replycredit'];?></strong> ]</span>
<?php } if($thread['multipage']) { ?>
<span class="tps"><?php echo $thread['multipage'];?></span>
<?php } if($thread['weeknew']) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $thread['tid'];?>&amp;goto=lastpost#lastpost" class="xi1">New</a>
<?php } if(!$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { if($thread['related_group'] == 0 && $thread['closed'] > 1) { $thread[tid]=$thread[closed];?><?php } } ?>
                                      </div>
                                      
                                      <div class="post_info cl" style="margin: 10px 12px 0 2px;">
                                         <div class="z">
                                            <?php if($thread['authorid'] && $thread['author']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" c="1"><?php echo $thread['author'];?></a><?php if(!empty($verify[$thread['authorid']])) { ?> <?php echo $verify[$thread['authorid']];?><?php } } else { ?>
<?php echo $_G['setting']['anonymoustext'];?>
<?php } ?> / 
<span<?php if($thread['istoday']) { ?> class="xi1"<?php } ?>><?php echo $thread['dateline'];?></span>
                                         </div>
                                         <div class="y">
                                            <?php if($thread['lastposter']) { ?><a href="<?php if($thread['digest'] != -2) { ?>home.php?mod=space&username=<?php echo $thread['lastposterenc'];?><?php } else { ?>forum.php?mod=viewthread&tid=<?php echo $thread['tid'];?>&page=<?php echo max(1, $thread['pages']);; } ?>" c="1"><?php echo $thread['lastposter'];?></a><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?> / 
<a href="<?php if($thread['digest'] != -2) { ?>forum.php?mod=redirect&tid=<?php echo $thread['tid'];?>&goto=lastpost<?php echo $highlight;?>#lastpost<?php } else { ?>forum.php?mod=viewthread&tid=<?php echo $thread['tid'];?>&page=<?php echo max(1, $thread['pages']);; } ?>"><?php echo $thread['lastpost'];?></a>
                                         </div>
                                      </div>
</th>
</tr>
</tbody>
<?php if($view == 'my' && $viewtype=='reply' && !empty($tids[$thread['tid']])) { ?>
<tbody class="bw0_all">
<tr>
<td class="icn">&nbsp;</td>
<td colspan="5"><?php if(is_array($tids[$thread['tid']])) foreach($tids[$thread['tid']] as $pid) { $post = $posts[$pid];?><div class="tl_reply pbm xg1"><a href="forum.php?mod=redirect&amp;goto=findpost&amp;ptid=<?php echo $thread['tid'];?>&amp;pid=<?php echo $pid;?>" target="_blank"><?php if($post['message']) { ?><?php echo $post['message'];?><?php } else { ?>...<?php } ?></a></div>
<?php } ?>
</td>
</tr>
</tbody>
<tr><td colspan="6"></td></tr>
<?php } if($view == 'my' && $viewtype=='postcomment') { ?>
<tr>
<td class="icn">&nbsp;</td>
<td colspan="5" class="xg1"><?php echo $thread['comment'];?></td>
</tr>
<?php } } } else { ?>
<tbody class="bw0_all"><tr><th colspan="5"><p class="emp">暂时还没有帖子</p></th></tr></tbody>
<?php } ?>
</table>
</div>
</div>
<?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['guide_bottom'])) echo $_G['setting']['pluginhooks']['guide_bottom'];?>
</div>
        		<div class="bm bw0 pgs cl" style="margin: 15px 0 0 0;">
<?php echo $multipage;?>
<span class="pgb y"><a href="forum.php?mod=guide" style="padding: 5px 12px; border-radius: 0; border: 0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">导读首页</a></span>
</div>
</div>
</div>
<?php if(!IS_ROBOT) { ?>
<div id="filter_special_menu" class="p_pop" style="display:none">
<ul>
<li><a href="home.php?mod=space&amp;do=poll&amp;view=me" target="_blank">投票</a></li>
<li><a href="home.php?mod=space&amp;do=trade&amp;view=me" target="_blank">商品</a></li>
<li><a href="home.php?mod=space&amp;do=reward&amp;view=me" target="_blank">悬赏</a></li>
<li><a href="home.php?mod=space&amp;do=activity&amp;view=me" target="_blank">活动</a></li>
</ul>
</div>
<?php } include template('common/footer'); ?>