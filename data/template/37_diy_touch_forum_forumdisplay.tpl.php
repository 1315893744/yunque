<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forumdisplay');
0
|| checktplrefresh('./template/comiis_app/touch/forum/forumdisplay.htm', './template/comiis_app/touch/forum/search_sortoption.htm', 1600768734, 'diy', './data/template/37_diy_touch_forum_forumdisplay.tpl.php', './template/comiis_app', 'touch/forum/forumdisplay')
|| checktplrefresh('./template/comiis_app/touch/forum/forumdisplay.htm', './template/comiis_app/touch/forum/forumdisplay_sort.htm', 1600768734, 'diy', './data/template/37_diy_touch_forum_forumdisplay.tpl.php', './template/comiis_app', 'touch/forum/forumdisplay')
;?><?php include template('common/header'); if($comiis_app_switch['comiis_forum_showstyle']==3) { ?>
<style>.comiis_top_image{width:100%;height:<?php if($comiis_isweixin == 1) { ?>152px<?php } else { ?>200px<?php } ?>;overflow:hidden;position:absolute;top:0;left:0;z-index:-1;background-image:url(<?php if($_G['forum']['banner'] && !$subforumonly) { ?><?php echo $_G['forum']['banner'];?><?php } else { ?>template/comiis_app/comiis/img/forum_bg.jpg<?php } ?>);background-position:0 0;background-repeat:no-repeat;background-size:100%;}</style>
<div class="comiis_top_image"></div>
<?php } if($comiis_app_switch['comiis_list_fpost'] == 1 && !$subforumonly) { ?><style>.comiis_footer_scroll {bottom:82px;}</style><?php } if($_GET['inajax'] != 1) { ?>
<script>var formhash = '<?php echo FORMHASH;?>', allowrecommend = '<?php echo $_G['group']['allowrecommend'];?>';</script>
<script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_forumdisplay.php'?><?php if($_GET['inajax'] != 1) { if($comiis_app_switch['comiis_forum_showstyle']==3) { ?>
<style>
.comiis_head {background-color:none !important;}
.comiis_headcolor {width:0px;height:0px;overflow:hidden;}
.comiis_head_ny {display: block;width: 100%;height: 100%;position: absolute;top: 0;right: 0;bottom: 0;z-index: -1;left: 0;visibility: visible;opacity: 0;}
</style>
<div class="comiis_forumlist_heads comiis_forumlist_headv3<?php if($comiis_app_switch['comiis_svg'] == 1) { ?> comiis_svg_no<?php } ?> cl">	
<div class="top_btn">
<?php if($comiis_forum_fav['favid']) { ?>
<a href="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;type=forum&amp;formhash=<?php echo FORMHASH;?>&amp;favid=<?php echo $comiis_forum_fav['favid'];?>&amp;handlekey=forum_fav" class="dialog bg_b f_d comiis_forum_fav" comiis="handle"><?php echo $comiis_lang['all4'];?></a>
<?php } else { ?>
<a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=forum&id=<?php echo $_G['fid'];?>&formhash=<?php echo FORMHASH;?>&handlekey=forum_fav<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" class="<?php if($_G['uid']) { ?>dialog <?php } ?>bg_c f_f comiis_forum_fav" comiis="handle">+ <?php echo $comiis_lang['all3'];?></a>
<?php } ?>
</div>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" class="top_left f_f">
<div class="top_ico"><?php if($_G['forum']['icon']) { ?><img src="<?php echo get_forumimg($_G['forum']['icon']); ?>" /><?php } else { ?><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><?php } ?></div>
<h2><?php echo $_G['forum']['name'];?></h2>		
<p>主题: <?php echo $_G['forum']['threads'];?>&nbsp;&nbsp;/&nbsp;&nbsp;今日: <?php echo $_G['forum']['todayposts'];?></p>
</a>
<?php if($comiis_app_switch['comiis_svg'] != 1) { ?><div class="comiis_svg_box"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div><?php } ?>
</div>
<div class="comiis_headcolor bg_0"></div>
<script>
var comiis_header_bg = $(".comiis_head").css("backgroundImage");
if(comiis_header_bg != 'none'){
$('.comiis_head').css("cssText",'background:none !important').append('<div class="comiis_head_ny" style=\'background-image:'+comiis_header_bg+'\'></div>');
}
var comiis_header_rgb = $(".comiis_headcolor").css('background-color');
comiis_header_rgb = comiis_header_rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
$(window).scroll(function() {
if($(window).scrollTop() > 100){
if(comiis_header_bg == 'none'){
$('.comiis_head').attr('style', 'background-color:rgba('+comiis_header_rgb[1]+','+comiis_header_rgb[2]+','+comiis_header_rgb[3]+',1) !important');
}else{
$(".comiis_head_ny").css({opacity: 1});
}
}else{
var i = $(window).scrollTop() / 100;
if(comiis_header_bg == 'none'){
$('.comiis_head').attr('style', 'background-color:rgba('+comiis_header_rgb[1]+','+comiis_header_rgb[2]+','+comiis_header_rgb[3]+','+i+') !important');
}else{
$(".comiis_head_ny").css({opacity: i});
}
}
});
</script>
<?php } elseif($comiis_app_switch['comiis_forum_showstyle']==2) { ?>
<div class="comiis_forumlist_heads bg_f b_b cl">
<div class="top_btn">
<?php if($comiis_forum_fav['favid']) { ?>
<a href="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;type=forum&amp;formhash=<?php echo FORMHASH;?>&amp;favid=<?php echo $comiis_forum_fav['favid'];?>&amp;handlekey=forum_fav" class="dialog bg_b f_d comiis_forum_fav" comiis="handle"><?php echo $comiis_lang['all4'];?></a>
<?php } else { ?>
<a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=forum&id=<?php echo $_G['fid'];?>&formhash=<?php echo FORMHASH;?>&handlekey=forum_fav<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" class="<?php if($_G['uid']) { ?>dialog <?php } ?>bg_c f_f comiis_forum_fav" comiis="handle">+ <?php echo $comiis_lang['all3'];?></a>
<?php } ?>
</div>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" class="top_left">
<div class="top_ico"><?php if($_G['forum']['icon']) { ?><img src="<?php echo get_forumimg($_G['forum']['icon']); ?>" /><?php } else { ?><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><?php } ?></div>
<h2 class="f_ok"><?php echo $_G['forum']['name'];?></h2>		
<?php if(!$subforumonly) { ?><p class="f_c"><?php if($_G['forum']['todayposts']) { ?><span class="f_a">今日: <?php echo $_G['forum']['todayposts'];?></span>&nbsp;&nbsp;<?php } ?>帖子: <?php echo $_G['forum']['posts'];?>&nbsp;&nbsp;<?php if($_G['forum']['favtimes']) { ?><?php echo $comiis_lang['all3'];?>: <?php echo $_G['forum']['favtimes'];?><?php } ?></p><?php } ?>
<p class="f_c"><?php if($_G['forum']['description']) { ?><?php echo $_G['forum']['description'];?><?php } else { ?><?php echo $comiis_lang['tip52'];?><?php } ?></p>
</a>
</div>
<?php } if($comiis_app_switch['comiis_list_gosx']==1 && !$subforumonly) { if($comiis_app_switch['comiis_subnv_top'] != 1) { ?><div style="height:41px;"><div class="comiis_scrollTop_box"><?php } ?>
<div class="comiis_forumlist_time bg_f b_b bhrfw">
<div id="forumlist_time_box">
<div id="forumlist_time_li">
<ul>
<li<?php if(!$_GET['filter']) { ?> class="f_0"<?php } ?>><?php if(!$_GET['filter']) { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if(!$_GET['filter']) { } else { ?> class="f_c"<?php } ?>>全部</a></li>
<li<?php if($_GET['filter'] == 'lastpost') { ?> class="f_0"<?php } ?>><?php if($_GET['filter'] == 'lastpost') { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=lastpost&amp;orderby=lastpost<?php echo $forumdisplayadd['lastpost'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'lastpost') { } else { ?> class="f_c"<?php } ?>>最新</a></li>
<li<?php if($_GET['filter'] == 'heat') { ?> class="f_0"<?php } ?>><?php if($_GET['filter'] == 'heat') { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=heat&amp;orderby=heats<?php echo $forumdisplayadd['heat'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'heat') { } else { ?> class="f_c"<?php } ?>>热门</a></li>
<li<?php if($_GET['filter'] == 'digest') { ?> class="kmon"<?php } ?>><?php if($_GET['filter'] == 'digest') { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=digest&amp;digest=1<?php echo $forumdisplayadd['digest'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'digest') { } else { ?> class="f_c"<?php } ?>>精华</a></li>
<li><a href="javascript:comiis_fmenu('#comiis_listmore');" class="f_c">筛选<i class="comiis_font f_d">&#xe620;</i></a></li>
</ul>
</div>
</div>
</div>
<?php if($comiis_app_switch['comiis_subnv_top'] != 1) { ?></div></div><?php } } elseif($comiis_app_switch['comiis_list_gosx']==0 && !$subforumonly) { if($comiis_app_switch['comiis_subnv_top'] != 1) { ?><div style="height:41px;"><div class="comiis_scrollTop_box"><?php } ?>
<div class="comiis_forumlist_time bg_f b_b bhrfw">
<div id="forumlist_time_box">
<div id="forumlist_time_li">
<ul class="<?php if(($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts']) { ?>swiper-wrapper<?php } else { ?>swiper-wrappers<?php } ?>">
<?php if(!empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']) { } else { ?><li class="swiper-slide<?php if(!$_GET['filter']) { ?> f_0<?php } ?>"><?php if(!$_GET['filter']) { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if(!$_GET['filter']) { } else { ?> class="f_c"<?php } ?>>全部</a></li><?php } if(!($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) && !$_G['forum']['threadsorts']) { ?>
<li class="swiper-slide<?php if($_GET['filter'] == 'lastpost') { ?> f_0<?php } ?>"><?php if($_GET['filter'] == 'lastpost') { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=lastpost&amp;orderby=lastpost<?php echo $forumdisplayadd['lastpost'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'lastpost') { } else { ?> class="f_c"<?php } ?>>最新</a></li>
<li class="swiper-slide<?php if($_GET['filter'] == 'heat') { ?> f_0<?php } ?>"><?php if($_GET['filter'] == 'heat') { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=heat&amp;orderby=heats<?php echo $forumdisplayadd['heat'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'heat') { } else { ?> class="f_c"<?php } ?>>热门</a></li>
<li class="swiper-slide<?php if($_GET['filter'] == 'digest') { ?> f_0<?php } ?>"><?php if($_GET['filter'] == 'digest') { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=digest&amp;digest=1<?php echo $forumdisplayadd['digest'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'digest') { } else { ?> class="f_c"<?php } ?>>精华</a></li>
<?php } ?>				
<?php if(($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable'])) { ?>		
<?php if($_G['forum']['threadtypes']) { if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $id => $name) { ?><li class="swiper-slide<?php if($_GET['typeid'] == $id) { ?> f_0<?php } ?>"><?php if($_GET['typeid'] == $id) { ?><em class="bg_0"></em><?php } ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $id;?><?php echo $forumdisplayadd['typeid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['typeid'] == $id) { } else { ?> class="f_c"<?php } ?>><?php echo $name;?></a></li>
<?php } } } if($_G['forum']['threadsorts']) { if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $name) { if($_GET['sortid'] == $id) { ?>
<li class="swiper-slide f_0"><em class="bg_0"></em><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['typeid']) { ?>&amp;filter=typeid&amp;typeid=<?php echo $_GET['typeid'];?><?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"><?php echo $name;?></a></li>
<?php } else { ?>
<li class="swiper-slide"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $id;?><?php echo $forumdisplayadd['sortid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="f_c"><?php echo $name;?></a></li>
<?php } } } ?>
</ul>
</div>
</div>
</div>
<?php if($comiis_app_switch['comiis_subnv_top'] != 1) { ?></div></div><?php } ?>
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script>
if($("#forumlist_time_li li.f_0").length > 0) {
var comiis_index = $("#forumlist_time_li li.f_0").offset().left + $("#forumlist_time_li li.f_0").width() >= $(window).width() ? $("#forumlist_time_li li.f_0").index() : 0;
}else{
var comiis_index = 0;
}	
mySwiper = new Swiper('#forumlist_time_li', {
freeMode : true,
slidesPerView : 'auto',
initialSlide : comiis_index,
onTouchMove: function(swiper){
Comiis_Touch_on = 0;
},
onTouchEnd: function(swiper){
Comiis_Touch_on = 1;
},
});
</script>
<?php } if($quicksearchlist && !$_GET['archiveid']) { ?><script type="text/javascript">
var forum_optionlist = <?php if($forum_optionlist) { ?>'<?php echo $forum_optionlist;?>'<?php } else { ?>''<?php } ?>;
</script>
<script src="<?php echo $_G['setting']['jspath'];?>threadsort.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<div class="comiis_flsx_show b_b cl">
<a href="javascript:;" class="<?php if($comiis_app_switch['comiis_flxx_list_ss'] == 1) { ?>bg_e<?php } else { ?>bg_f<?php } ?> comiis_flsx_key" onclick="comiis_flsx_sh();"><span class="f_a"><?php echo $comiis_lang['tip67'];?> <i class="comiis_font comiis_flsxico"><?php if($comiis_app_switch['comiis_flxx_list_ss'] == 1) { ?>&#xe621;<?php } else { ?>&#xe620;<?php } ?></i></span><em class="f_d"><i class="comiis_font">&#xe632;</i> <?php echo $_G['forum']['threadsorts']['types'][$_GET['sortid']];?></em></a>
</div><?php comiis_load('eYnbwiIMovyoHIcIVY', 'quicksearchlist,showoption,tmpcount,filterurladd,sorturladdarray');?><?php } if(!$subforumonly) { ?>
<div class="comiis_fmenu" id="comiis_listmore" style="display:none;">
<div class="comiis_fmenubox bg_e">
<div class="comiis_gosx_title cl"><span class="y"><i class="comiis_font f_d" onclick="comiis_fmenu('#comiis_listmore');">&#xe639;</i></span><?php echo $comiis_lang['all25'];?></div>
<div class="comiis_over_box">
<?php if($subexists && $comiis_app_switch['comiis_list_subforum'] != 1) { ?>
<div class="comiis_gosx_tit bg_f b_t b_b cl">子版块</div>
<div class="comiis_forum_box bg_f mb10 cl">
<ul><?php if(is_array($sublist)) foreach($sublist as $sub) { $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];?><?php $icon = str_replace(array('</a>', 'align="left"'), '', preg_replace("/<a href=\"(.*?)\">/", '', $sub[icon]));?><li><a href="<?php echo $forumurl;?>" class="b_b b_r f_b"<?php if($sub['redirect']) { ?> target="_blank"<?php } ?>><span><?php if($icon) { ?><?php echo $icon;?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($sub['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $sub['name'];?>" /><?php } ?></span><p><?php echo $sub['name'];?></p></a></li>
<?php } ?>
</ul>
</div>
<?php } if((($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || count($_G['forum']['threadsorts']['types']) > 0) && $comiis_app_switch['comiis_list_gosx']==1) { ?>		
<div class="comiis_gosx_tit bg_f b_t b_b cl">主题分类</div>
<div class="comiis_gosx bg_f b_b cl">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_G['forum']['threadsorts']['defaultshow']) { ?>&amp;filter=sortall&amp;sortall=1<?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if(!$_GET['typeid'] && !$_GET['sortid']) { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>全部</a></li>
<?php if($_G['forum']['threadtypes']) { if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $id => $name) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $id;?><?php echo $forumdisplayadd['typeid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['typeid'] == $id) { ?> class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>><?php echo $name;?></a></li>
<?php } } if($_G['forum']['threadsorts']) { if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $name) { if($_GET['sortid'] == $id) { ?>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['typeid']) { ?>&amp;filter=typeid&amp;typeid=<?php echo $_GET['typeid'];?><?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="bg_a f_f"><?php echo $name;?></a></li>
<?php } else { ?>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $id;?><?php echo $forumdisplayadd['sortid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="bg_e f_b"><?php echo $name;?></a></li>
<?php } } } ?>
</ul>
</div>
<?php } if($showpoll || $showtrade || $showreward || $showactivity || $showdebate) { ?>
<div class="comiis_gosx_tit bg_f b_t b_b cl"><?php echo $comiis_lang['all55'];?>主题</div>
<div class="comiis_gosx bg_f b_b cl">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="<?php if(!$_GET['filter']) { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">全部</a></li>
<?php if($showpoll) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=poll<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="<?php if($_GET['specialtype'] == 'poll') { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">投票</a></li><?php } if($showtrade) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=trade<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="<?php if($_GET['specialtype'] == 'trade') { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">商品</a></li><?php } if($showreward) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="<?php if($_GET['specialtype'] == 'reward') { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">悬赏</a></li><?php } if($showactivity) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=activity<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="<?php if($_GET['specialtype'] == 'activity') { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">活动</a></li><?php } if($showdebate) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=debate<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="<?php if($_GET['specialtype'] == 'debate') { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">辩论</a></li><?php } ?>
</ul>
</div>
<?php } if($_GET['specialtype'] == 'reward') { ?>
<div class="comiis_gosx_tit bg_f b_t b_b cl">悬赏筛选</div>
<div class="comiis_gosx bg_f b_b cl">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="<?php if($_GET['rewardtype'] == '') { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">全部悬赏</a></li>
<?php if($showpoll) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>&amp;rewardtype=1" class="<?php if($_GET['rewardtype'] == '1') { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">进行中</a></li><?php } if($showtrade) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>&amp;rewardtype=2" class="<?php if($_GET['rewardtype'] == '2') { ?>bg_a f_f<?php } else { ?>bg_e f_b<?php } ?>">已解决</a></li><?php } ?>
</ul>
</div>
<?php } ?>
<div class="comiis_gosx_tit bg_f b_t b_b cl">更多筛选</div>
<div class="comiis_gosx bg_f b_b cl">
        <?php if($comiis_app_switch['comiis_list_gosx']==0 && (($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts'])) { ?>
<ul>
          <li><a>筛选: </a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if(!$_GET['filter']) { ?> class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>全部</a></li>					
          <li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=lastpost&amp;orderby=lastpost<?php echo $forumdisplayadd['lastpost'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'lastpost') { ?> class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>最新</a></li>
          <li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=heat&amp;orderby=heats<?php echo $forumdisplayadd['heat'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'heat') { ?> class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>热门</a></li>
          <li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=digest&amp;digest=1<?php echo $forumdisplayadd['digest'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"<?php if($_GET['filter'] == 'digest') { ?> class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>精华</a></li>					
</ul>
        <?php } ?>			
<ul>		
<li><a>排序: </a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=author&amp;orderby=dateline<?php echo $forumdisplayadd['author'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['orderby'] == 'dateline') { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>发帖时间</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=replies<?php echo $forumdisplayadd['reply'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['orderby'] == 'replies') { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>回复/查看</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=views<?php echo $forumdisplayadd['view'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['orderby'] == 'views') { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>查看</a></li>
</ul>
<ul>
<li><a>时间: </a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if(!$_GET['dateline']) { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>全部时间</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=86400<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '86400') { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>一天</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=172800<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '172800') { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>两天</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=604800<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '604800') { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>一周</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=2592000<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '2592000') { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>一个月</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=7948800<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '7948800') { ?>class="bg_a f_f"<?php } else { ?>class="bg_e f_b"<?php } ?>>三个月</a></li>
</ul>
</div>
</div>
</div>
</div>
<?php } if($comiis_app_switch['comiis_forum_showstyle']==1) { ?>
<div class="comiis_forumlist_head bg_f b_b cl">
<div class="top_btn">
<?php if($comiis_forum_fav['favid']) { ?>
<a href="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;type=forum&amp;formhash=<?php echo FORMHASH;?>&amp;favid=<?php echo $comiis_forum_fav['favid'];?>&amp;handlekey=forum_fav" class="dialog bg_b f_d comiis_forum_fav" comiis="handle"><?php echo $comiis_lang['all4'];?></a>
<?php } else { ?>
<a href="<?php if($_G['uid']) { ?>home.php?mod=spacecp&ac=favorite&type=forum&id=<?php echo $_G['fid'];?>&formhash=<?php echo FORMHASH;?>&handlekey=forum_fav<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" class="<?php if($_G['uid']) { ?>dialog <?php } ?>bg_c f_f comiis_forum_fav" comiis="handle">+ <?php echo $comiis_lang['all3'];?></a>
<?php } ?>
</div>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" class="top_left">
<div class="top_ico"><?php if($_G['forum']['icon']) { ?><img src="<?php echo get_forumimg($_G['forum']['icon']); ?>" /><?php } else { ?><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><?php } ?></div>
<h2 class="f_ok"><?php echo $_G['forum']['name'];?></h2>
<?php if(!$subforumonly) { ?><p class="f_c"><?php if($_G['forum']['todayposts']) { ?><span class="f_a">今日: <?php echo $_G['forum']['todayposts'];?></span>&nbsp;&nbsp;<?php } ?>帖子: <?php echo $_G['forum']['posts'];?>&nbsp;&nbsp;<?php if($_G['forum']['favtimes']) { ?><?php echo $comiis_lang['all3'];?>: <?php echo $_G['forum']['favtimes'];?><?php } ?></p><?php } ?>
</a>
</div>
<?php } if($subexists && $comiis_app_switch['comiis_list_subforum'] == 1) { ?>
    <?php if($comiis_app_switch['comiis_list_substyle']==1) { ?>
        <div class="comiis_gosx_tit bg_f b_t b_b mt10 cl">子版块</div>
        <div class="comiis_forum_box bg_f mb10 cl">
            <ul>
            <?php if(is_array($sublist)) foreach($sublist as $sub) { ?>                <?php $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];?>                <?php $icon = str_replace(array('</a>', 'align="left"'), '', preg_replace("/<a href=\"(.*?)\">/", '', $sub[icon]));?>                <li><a href="<?php echo $forumurl;?>" class="b_b b_r f_b"<?php if($sub['redirect']) { ?> target="_blank"<?php } ?>><span><?php if($icon) { ?><?php echo $icon;?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($sub['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $sub['name'];?>" /><?php } ?></span><p><?php echo $sub['name'];?></p></a></li>
            <?php } ?>
            </ul>
        </div>
    <?php } else { ?>
        <div id="comiis_sub_icobox" class="comiis_forum_boxs bg_f mt10 b_t b_b cl">
            <ul class="swiper-wrapper">
                <?php if(is_array($sublist)) foreach($sublist as $sub) { ?>                    <?php $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];?>                    <?php $icon = str_replace(array('</a>', 'align="left"'), '', preg_replace("/<a href=\"(.*?)\">/", '', $sub[icon]));?>                    <li class="swiper-slide"><a href="<?php echo $forumurl;?>" class="f_b"<?php if($sub['redirect']) { ?> target="_blank"<?php } ?>><span><?php if($icon) { ?><?php echo $icon;?><?php } else { ?><img src="<?php echo IMGDIR;?>/forum<?php if($sub['folder']) { ?>_new<?php } ?>.png" alt="<?php echo $sub['name'];?>" /><?php } ?></span><p><?php echo $sub['name'];?></p></a></li>
                <?php } ?>
            </ul>
        </div>
        <script>
            new Swiper('#comiis_sub_icobox', {
                freeMode : true,
                slidesPerView : 'auto',
                onTouchMove: function(swiper){
                    Comiis_Touch_on = 0;
                },
                onTouchEnd: function(swiper){
                    Comiis_Touch_on = 1;
                },
            });
        </script>
    <?php } } ?>		
<?php if((!empty($announcement) || $comiis_displayorder_list) && $page == 1 && ($comiis_open_displayorder || $comiis_app_switch['comiis_open_announcement']) && !($comiis_open_displayorder && !empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list'])) { ?>
<div class="comiis_forumlist_top bg_f b_t b_b cl"<?php if(!empty($_G['forum']['picstyle']) || !$comiis_open_displayorder) { ?> style="margin-top:0;border-top:none !important;padding-bottom:5px;"<?php } ?>>
<?php if((!$simplestyle || !$_G['forum']['allowside']) && $comiis_app_switch['comiis_open_announcement'] && !empty($announcement)) { ?>
<ul>
<li<?php if(empty($_G['forum']['picstyle']) && $comiis_open_displayorder) { ?> class="b_b"<?php } ?>><a href="<?php if(empty($announcement['type'])) { ?>forum.php?mod=announcement&id=<?php echo $announcement['id'];?>#<?php echo $announcement['id'];?><?php } else { ?><?php echo $announcement['message'];?><?php } ?>"><?php if($comiis_app_switch['comiis_ann_ico'] == 1) { ?><i class="comiis_font comiis_list_ann bg_a f_f">&#xe6d0;</i><?php } else { ?><em class="comiis_xifont f_a"><?php echo $comiis_lang['view59'];?></em><?php } ?><?php echo $announcement['subject'];?></a></li>
</ul>
<?php } ?>
        <?php if($comiis_app_switch['comiis_list_tj'] == 1 && !empty($_G['forum']['recommendlist'])) { ?>
            <ul>
            <?php unset($_G['forum']['recommendlist']['images']);$n=0;?>            <?php if(is_array($_G['forum']['recommendlist'])) foreach($_G['forum']['recommendlist'] as $rtid => $recommend) { ?>            <?php $n++;?>            <?php if($n <= $comiis_app_switch['comiis_list_tjmun']) { ?>
                <li class="b_b"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $rtid;?>" <?php echo $recommend['subjectstyles'];?>><?php if($comiis_app_switch['comiis_ann_ico'] == 1) { ?><i class="comiis_font comiis_list_ann bg_c f_f">&#xe654;</i><?php } else { ?><em class="comiis_xifont f_wx"><?php echo $comiis_lang['recommend_post'];?></em><?php } ?><?php echo $recommend['subject'];?></a></li>
            <?php } ?>      
            <?php } ?>
            </ul>
        <?php } if($comiis_open_displayorder && !(!empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list'])) { ?>
<ul<?php if($comiis_displayorder_num > ($comiis_app_switch['comiis_list_zdmun'] ? $comiis_app_switch['comiis_list_zdmun'] : 3) && $comiis_displayorder_num < $_G['tpp']) { ?> id="comiis_displayorder" style="height:<?php echo ($comiis_app_switch['comiis_list_zdmun'] ? $comiis_app_switch['comiis_list_zdmun'] : 3) * 35 - 1;; ?>px;overflow:hidden;"<?php } ?>>
<?php echo $comiis_displayorder_list;?>
</ul>
<?php if($comiis_displayorder_num > ($comiis_app_switch['comiis_list_zdmun'] ? $comiis_app_switch['comiis_list_zdmun'] : 3) && $comiis_displayorder_num < $_G['tpp']) { ?>
<ul class="comiis_displayorder_key b_t">
<li class="comiis_displayorder_show"><a href="javascript:;" onclick="comiis_displayorder_sh(1);" class="comiis_zdmore f_c"><?php echo $comiis_lang['tip53'];?><i class="comiis_font">&#xe620;</i></a></li>
<li class="comiis_displayorder_hide"><a href="javascript:;" onclick="comiis_displayorder_sh(0);" class="comiis_zdmore f_c"><?php echo $comiis_lang['tip54'];?><i class="comiis_font">&#xe621;</i></a></li>
</ul>
<?php } } ?>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_top_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_top_mobile'];?>
<?php } ?>			
<?php if(!$subforumonly) { ?>
  <?php if(!empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']) { ?>
    <?php if(($comiis_app_switch['comiis_flxx_list'] == 1 || $comiis_app_switch['comiis_flxx_view'] == 1) && $comiis_app_switch['comiis_flxx_css']) { ?>
<style>
  <?php echo strip_tags($comiis_app_switch['comiis_flxx_css']);; ?></style>
<?php } comiis_load('e5UBArHMXahUX31H32', 'sorttemplate,var,comiis_flxx_color_n');?>  <?php } else { ?>    
    <?php $_G['comiis_verify'] = $verify;$comiis_list_template = 'default_b_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';?>  <?php } if(!$_GET['inajax']) { if($comiis_app_list_num != 10) { ?><div id="list_new"></div><?php } $comiis_page = ceil($_G['forum_threadcount']/$_G['tpp']);?><div class="comiis_multi_box<?php if($comiis_app_list_num != 7 && $comiis_app_list_num != 10) { ?> bg_f<?php } if($comiis_app_list_num != 1 && $comiis_app_list_num != 5 && $comiis_app_list_num != 6 && ($comiis_app_list_num != 7 || $comiis_app_switch['comiis_listpage'] == 0) && ($comiis_app_list_num != 10 || $comiis_app_switch['comiis_listpage'] == 0) && $comiis_app_list_num != 11 && $comiis_app_list_num != 12) { ?> b_t mt10<?php } if($comiis_app_list_num == 11 || $comiis_app_list_num == 12) { ?> b_t<?php } ?>">
<?php if($multipage && ($comiis_app_switch['comiis_listpage'] == 0 || $page > 1)) { ?>
<?php echo $multipage;?>
<?php } elseif($comiis_app_switch['comiis_listpage'] == 1 && $page < $comiis_page) { ?>
<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn<?php if($comiis_app_list_num == 7 || $comiis_app_list_num == 10) { ?> bg_f<?php } else { ?> bg_e<?php } ?> f_d"><?php echo $comiis_lang['tip5'];?></a>
<?php } elseif($comiis_app_switch['comiis_listpage'] == 2 && $page < $comiis_page) { ?>
<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip6'];?></div>
<?php } elseif($comiis_app_switch['comiis_listpage'] && $comiis_page == 1 && $_G['forum_threadcount'] > 4) { ?>
<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip31'];?></div>
<?php } ?>
</div>
<script>
<?php if($_G['uid']) { ?>comiis_recommend_addkey();<?php } if($comiis_app_switch['comiis_listpage'] > 0 && $page == 1) { ?>
var comiis_page = <?php echo $page;?>;
var comiis_ispage = 0;
function comiis_list_page(){
comiis_ispage = 1;
if(comiis_page < <?php echo $comiis_page;?>){
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip6'];?></div>');
$.ajax({
type:'GET',
url: 'forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?><?php echo $forumdisplayadd['page'];?><?php echo ($multiadd ? '&'.implode('&', $multiadd) : '');; ?><?php echo $multipage_archive;?>&page=' + (comiis_page + 1) + '&inajax=1',
dataType:'xml',
}).success(function(s) {
if(typeof(s.lastChild.firstChild.nodeValue) != "undefined"){
comiis_page++;
$('.comiis_forumlist .comiis_notip').remove();
$('#list_new').append(s.lastChild.firstChild.nodeValue);
if(comiis_page >= <?php echo $comiis_page;?>){
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip31'];?></div>');
}else{
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn<?php if($comiis_app_list_num == 7 || $comiis_app_list_num == 10) { ?> bg_f<?php } else { ?> bg_e<?php } ?> f_d"><?php echo $comiis_lang['tip5'];?></a>');
}							
<?php if($comiis_app_list_num == 10) { ?>
var comiis_pic_width = ($(window).width() - 34) / 2;
$(".comiis_waterfall li[class='bg_f b_ok']").css('width', (comiis_pic_width) + 'px');
imagesLoaded($('.comiis_waterfall'),function(){
$('#list_new').masonry('reload');
});
<?php } ?>							
comiis_redata_function();
}else{
comiis_page--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn<?php if($comiis_app_list_num == 7 || $comiis_app_list_num == 10) { ?> bg_f<?php } else { ?> bg_e<?php } ?> f_d"><?php echo $comiis_lang['tip32'];?></a>');
}
comiis_ispage = 0;
}).error(function() {
comiis_page--;
$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn<?php if($comiis_app_list_num == 7 || $comiis_app_list_num == 10) { ?> bg_f<?php } else { ?> bg_e<?php } ?> f_d"><?php echo $comiis_lang['tip32'];?></a>');
comiis_ispage = 0;
});
}else{
$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d"><?php echo $comiis_lang['tip31'];?></div>');
}
}
var comiis_regdata_page = 'comiis_page', comiis_regdata_dataid = ['#list_new'];
function comiis_redata_function(){
popup.init();
comiis_recommend_addkey();
}
<?php if($comiis_app_switch['comiis_listpage'] == 2) { ?>
var comiis_page_timer;
$(window).scroll(function(){

if(comiis_page_start == 0){
return;
}
clearTimeout(comiis_page_timer);
comiis_page_timer = setTimeout(function() {
var comiis_scroll_bottom = $(window).scrollTop() + window.innerHeight;
var comiis_list_bottom = $('#list_new').height() + $('#list_new').offset().top - 1000;
if(comiis_scroll_bottom >= comiis_list_bottom && comiis_ispage == 0){
comiis_list_page();
}	
}, 100);
});
<?php } if($page < $comiis_page && $comiis_displayorder_num >= $_G['tpp']) { ?>
comiis_list_page();
<?php } } ?>
</script>
<?php } } if($comiis_app_switch['comiis_forum_dbdh'] == 0) { $comiis_foot = 'no';?><?php } if($_GET['inajax'] != 1) { ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'];?>
<?php if($comiis_app_switch['comiis_list_fpost'] == 1 && !$subforumonly) { if($comiis_foot == 'no' && !$comiis_open_footer) { ?>
        <?php if($comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) { ?>
            <a href="<?php if($_G['uid']) { ?>#comiis_post_type<?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" title="发帖" class="<?php if($_G['uid']) { ?>popup <?php } ?>comiis_fastpost_btn f_f"><i class="comiis_font">&#xe62d;</i><?php echo $comiis_lang['tip55'];?><?php echo $_G['forum']['name'];?><?php echo $comiis_lang['tip56'];?></a>
        <?php } else { ?>
            <a href="<?php if($_G['uid']) { ?>forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?><?php } elseif(!$_G['connectguest']) { ?>javascript:popup.open('<?php echo $comiis_lang['tip16'];?>', 'confirm', 'member.php?mod=logging&action=login');<?php } else { ?>javascript:popup.open('<?php echo $comiis_lang['reg23'];?>', 'confirm', 'member.php?mod=connect');<?php } ?>" title="发帖" class="comiis_fastpost_btn f_f"><i class="comiis_font">&#xe62d;</i><?php echo $comiis_lang['tip55'];?><?php echo $_G['forum']['name'];?><?php echo $comiis_lang['tip56'];?></a>
        <?php } ?>
<div class="comiis_foot_height"></div>
<?php } } } include template('forum/comiis_post_type'); $comiis_app_wx_share['title'] = $_G['forum'][name].($comiis_app_switch['comiis_sitename'] ? ' - '.$comiis_app_switch['comiis_sitename'] : '');
$comiis_app_wx_share['desc'] = $_G[forum][description] ? $_G[forum][description] : '';?><?php include template('common/footer'); ?>