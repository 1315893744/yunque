<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_forum_showstyle']==3}-->
<style>.comiis_top_image{width:100%;height:{if $comiis_isweixin == 1}152px{else}200px{/if};overflow:hidden;position:absolute;top:0;left:0;z-index:-1;background-image:url({if $_G[forum][banner] && !$subforumonly}$_G[forum][banner]{else}template/comiis_app/comiis/img/forum_bg.jpg{/if});background-position:0 0;background-repeat:no-repeat;background-size:100%;}</style>
<div class="comiis_top_image"></div>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_list_fpost'] == 1 && !$subforumonly}--><style>.comiis_footer_scroll {bottom:82px;}</style><!--{/if}-->
<!--{if $_GET['inajax'] != 1}-->
<script>var formhash = '{FORMHASH}', allowrecommend = '{$_G['group']['allowrecommend']}';</script>
<script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?{VERHASH}"></script>
<!--{/if}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_forumdisplay.php'}-->
<!--{if $_GET['inajax'] != 1}-->
<!--{if $comiis_app_switch['comiis_forum_showstyle']==3}-->
<style>
.comiis_head {background-color:none !important;}
.comiis_headcolor {width:0px;height:0px;overflow:hidden;}
.comiis_head_ny {display: block;width: 100%;height: 100%;position: absolute;top: 0;right: 0;bottom: 0;z-index: -1;left: 0;visibility: visible;opacity: 0;}
</style>
<div class="comiis_forumlist_heads comiis_forumlist_headv3{if $comiis_app_switch['comiis_svg'] == 1} comiis_svg_no{/if} cl">	
	<div class="top_btn">
		<!--{if $comiis_forum_fav['favid']}-->
			<a href="home.php?mod=spacecp&ac=favorite&op=delete&type=forum&formhash={FORMHASH}&favid={$comiis_forum_fav['favid']}&handlekey=forum_fav" class="dialog bg_b f_d comiis_forum_fav" comiis="handle">{$comiis_lang['all4']}</a>
		<!--{else}-->
			<a href="{if $_G['uid']}home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&formhash={FORMHASH}&handlekey=forum_fav{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}bg_c f_f comiis_forum_fav" comiis="handle">+ {$comiis_lang['all3']}</a>
		<!--{/if}-->
	</div>
	<a href="forum.php?mod=forumdisplay&fid=$_G[fid]" class="top_left f_f">
		<div class="top_ico"><!--{if $_G['forum'][icon]}--><img src="{echo get_forumimg($_G['forum']['icon'])}" /><!--{else}--><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><!--{/if}--></div>
		<h2>$_G['forum'][name]</h2>		
		<p>{lang index_threads}: $_G[forum][threads]&nbsp;&nbsp;/&nbsp;&nbsp;{lang index_today}: $_G[forum][todayposts]</p>
	</a>
	<!--{if $comiis_app_switch['comiis_svg'] != 1}--><div class="comiis_svg_box"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div><!--{/if}-->
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
<!--{elseif $comiis_app_switch['comiis_forum_showstyle']==2}-->
<div class="comiis_forumlist_heads bg_f b_b cl">
	<div class="top_btn">
		<!--{if $comiis_forum_fav['favid']}-->
			<a href="home.php?mod=spacecp&ac=favorite&op=delete&type=forum&formhash={FORMHASH}&favid={$comiis_forum_fav['favid']}&handlekey=forum_fav" class="dialog bg_b f_d comiis_forum_fav" comiis="handle">{$comiis_lang['all4']}</a>
		<!--{else}-->
			<a href="{if $_G['uid']}home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&formhash={FORMHASH}&handlekey=forum_fav{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}bg_c f_f comiis_forum_fav" comiis="handle">+ {$comiis_lang['all3']}</a>
		<!--{/if}-->
	</div>
	<a href="forum.php?mod=forumdisplay&fid=$_G[fid]" class="top_left">
		<div class="top_ico"><!--{if $_G['forum'][icon]}--><img src="{echo get_forumimg($_G['forum']['icon'])}" /><!--{else}--><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><!--{/if}--></div>
		<h2 class="f_ok">$_G['forum'][name]</h2>		
		<!--{if !$subforumonly}--><p class="f_c">{if $_G[forum][todayposts]}<span class="f_a">{lang index_today}: $_G[forum][todayposts]</span>&nbsp;&nbsp;{/if}{lang index_posts}: $_G[forum][posts]&nbsp;&nbsp;{if $_G[forum][favtimes]}{$comiis_lang['all3']}: $_G[forum][favtimes]{/if}</p><!--{/if}-->
		<p class="f_c"><!--{if $_G[forum][description]}-->{$_G[forum][description]}<!--{else}-->{$comiis_lang['tip52']}<!--{/if}--></p>
	</a>
</div>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_list_gosx']==1 && !$subforumonly}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_forumlist_time bg_f b_b bhrfw">
	<div id="forumlist_time_box">
		<div id="forumlist_time_li">
			<ul>
				<li{if !$_GET['filter']} class="f_0"{/if}>{if !$_GET['filter']}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if !$_GET['filter']}{else} class="f_c"{/if}>{lang all}</a></li>
				<li{if $_GET['filter'] == 'lastpost'} class="f_0"{/if}>{if $_GET['filter'] == 'lastpost'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost$forumdisplayadd[lastpost]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'lastpost'}{else} class="f_c"{/if}>{lang latest}</a></li>
				<li{if $_GET['filter'] == 'heat'} class="f_0"{/if}>{if $_GET['filter'] == 'heat'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'heat'}{else} class="f_c"{/if}>{lang order_heats}</a></li>
				<li{if $_GET['filter'] == 'digest'} class="kmon"{/if}>{if $_GET['filter'] == 'digest'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'digest'}{else} class="f_c"{/if}>{lang digest_posts}</a></li>
				<li><a href="javascript:comiis_fmenu('#comiis_listmore');" class="f_c">{lang screening}<i class="comiis_font f_d">&#xe620;</i></a></li>
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{elseif $comiis_app_switch['comiis_list_gosx']==0 && !$subforumonly}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_forumlist_time bg_f b_b bhrfw">
	<div id="forumlist_time_box">
		<div id="forumlist_time_li">
			<ul class="{if ($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts']}swiper-wrapper{else}swiper-wrappers{/if}">
				<!--{if !empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']}--><!--{else}--><li class="swiper-slide{if !$_GET['filter']} f_0{/if}">{if !$_GET['filter']}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if !$_GET['filter']}{else} class="f_c"{/if}>{lang all}</a></li><!--{/if}-->
				<!--{if !($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) && !$_G['forum']['threadsorts']}-->
				<li class="swiper-slide{if $_GET['filter'] == 'lastpost'} f_0{/if}">{if $_GET['filter'] == 'lastpost'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost$forumdisplayadd[lastpost]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'lastpost'}{else} class="f_c"{/if}>{lang latest}</a></li>
				<li class="swiper-slide{if $_GET['filter'] == 'heat'} f_0{/if}">{if $_GET['filter'] == 'heat'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'heat'}{else} class="f_c"{/if}>{lang order_heats}</a></li>
				<li class="swiper-slide{if $_GET['filter'] == 'digest'} f_0{/if}">{if $_GET['filter'] == 'digest'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'digest'}{else} class="f_c"{/if}>{lang digest_posts}</a></li>
				<!--{/if}-->				
				<!--{if ($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable'])}-->		
					<!--{if $_G['forum']['threadtypes']}-->
						<!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
							<li class="swiper-slide{if $_GET['typeid'] == $id} f_0{/if}">{if $_GET['typeid'] == $id}<em class="bg_0"></em>{/if}<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['typeid'] == $id}{else} class="f_c"{/if}>$name</a></li>
						<!--{/loop}-->
					<!--{/if}-->
				<!--{/if}-->
				<!--{if $_G['forum']['threadsorts']}-->
					<!--{loop $_G['forum']['threadsorts']['types'] $id $name}-->
						<!--{if $_GET['sortid'] == $id}-->
						<li class="swiper-slide f_0"><em class="bg_0"></em><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['typeid']}&filter=typeid&typeid=$_GET['typeid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name</a></li>
						<!--{else}-->
						<li class="swiper-slide"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$id$forumdisplayadd[sortid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="f_c">$name</a></li>
						<!--{/if}-->
					<!--{/loop}-->
				<!--{/if}-->
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
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
<!--{/if}-->
<!--{if $quicksearchlist && !$_GET['archiveid']}-->
	<!--{subtemplate forum/search_sortoption}-->
<!--{/if}-->
<!--{if !$subforumonly}-->
<div class="comiis_fmenu" id="comiis_listmore" style="display:none;">
	<div class="comiis_fmenubox bg_e">
		<div class="comiis_gosx_title cl"><span class="y"><i class="comiis_font f_d" onclick="comiis_fmenu('#comiis_listmore');">&#xe639;</i></span>{$comiis_lang['all25']}</div>
		<div class="comiis_over_box">
			<!--{if $subexists && $comiis_app_switch['comiis_list_subforum'] != 1}-->
			<div class="comiis_gosx_tit bg_f b_t b_b cl">{lang forum_subforums}</div>
			<div class="comiis_forum_box bg_f mb10 cl">
				<ul>
				<!--{loop $sublist $sub}-->
					<!--{eval $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];}-->
					<!--{eval $icon = str_replace(array('</a>', 'align="left"'), '', preg_replace("/<a href=\"(.*?)\">/", '', $sub[icon]));}-->
					<li><a href="$forumurl" class="b_b b_r f_b"{if $sub[redirect]} target="_blank"{/if}><span><!--{if $icon}-->$icon<!--{else}--><img src="{IMGDIR}/forum{if $sub[folder]}_new{/if}.png" alt="$sub[name]" /><!--{/if}--></span><p>$sub[name]</p></a></li>
				<!--{/loop}-->
				</ul>
			</div>
			<!--{/if}-->
			<!--{if (($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || count($_G['forum']['threadsorts']['types']) > 0) && $comiis_app_switch['comiis_list_gosx']==1}-->		
			<div class="comiis_gosx_tit bg_f b_t b_b cl">{lang threadtype}</div>
			<div class="comiis_gosx bg_f b_b cl">
				<ul>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_G['forum']['threadsorts']['defaultshow']}&filter=sortall&sortall=1{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if !$_GET['typeid'] && !$_GET['sortid']}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang forum_viewall}</a></li>
					<!--{if $_G['forum']['threadtypes']}-->
						<!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
							<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['typeid'] == $id} class="bg_a f_f"{else}class="bg_e f_b"{/if}>$name</a></li>
						<!--{/loop}-->
					<!--{/if}-->
					<!--{if $_G['forum']['threadsorts']}-->
						<!--{loop $_G['forum']['threadsorts']['types'] $id $name}-->
							<!--{if $_GET['sortid'] == $id}-->
							<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['typeid']}&filter=typeid&typeid=$_GET['typeid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="bg_a f_f">$name</a></li>
							<!--{else}-->
							<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$id$forumdisplayadd[sortid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="bg_e f_b">$name</a></li>
							<!--{/if}-->
						<!--{/loop}-->
					<!--{/if}-->
				</ul>
			</div>
			<!--{/if}-->
			<!--{if $showpoll || $showtrade || $showreward || $showactivity || $showdebate}-->
			<div class="comiis_gosx_tit bg_f b_t b_b cl">{$comiis_lang['all55']}{lang forum_threads}</div>
			<div class="comiis_gosx bg_f b_b cl">
				<ul>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="{if !$_GET['filter']}bg_a f_f{else}bg_e f_b{/if}">{lang all}</a></li>
					<!--{if $showpoll}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=poll$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="{if $_GET['specialtype'] == 'poll'}bg_a f_f{else}bg_e f_b{/if}">{lang thread_poll}</a></li><!--{/if}-->
					<!--{if $showtrade}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=trade$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="{if $_GET['specialtype'] == 'trade'}bg_a f_f{else}bg_e f_b{/if}">{lang thread_trade}</a></li><!--{/if}-->
					<!--{if $showreward}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="{if $_GET['specialtype'] == 'reward'}bg_a f_f{else}bg_e f_b{/if}">{lang thread_reward}</a></li><!--{/if}-->
					<!--{if $showactivity}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=activity$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="{if $_GET['specialtype'] == 'activity'}bg_a f_f{else}bg_e f_b{/if}">{lang thread_activity}</a></li><!--{/if}-->
					<!--{if $showdebate}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=debate$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="{if $_GET['specialtype'] == 'debate'}bg_a f_f{else}bg_e f_b{/if}">{lang thread_debate}</a></li><!--{/if}-->
				</ul>
			</div>
			<!--{/if}-->
			<!--{if $_GET['specialtype'] == 'reward'}-->
			<div class="comiis_gosx_tit bg_f b_t b_b cl">{lang thread_reward}{lang screening}</div>
			<div class="comiis_gosx bg_f b_b cl">
				<ul>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="{if $_GET['rewardtype'] == ''}bg_a f_f{else}bg_e f_b{/if}">{lang all_reward}</a></li>
					<!--{if $showpoll}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=1" class="{if $_GET['rewardtype'] == '1'}bg_a f_f{else}bg_e f_b{/if}">{lang rewarding}</a></li><!--{/if}-->
					<!--{if $showtrade}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=2" class="{if $_GET['rewardtype'] == '2'}bg_a f_f{else}bg_e f_b{/if}">{lang reward_solved}</a></li><!--{/if}-->
				</ul>
			</div>
			<!--{/if}-->
			<div class="comiis_gosx_tit bg_f b_t b_b cl">{lang more}{lang screening}</div>
			<div class="comiis_gosx bg_f b_b cl">
        <!--{if $comiis_app_switch['comiis_list_gosx']==0 && (($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts'])}-->
				<ul>
          <li><a>{lang screening}: </a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if !$_GET['filter']} class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang all}</a></li>					
          <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost$forumdisplayadd[lastpost]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'lastpost'} class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang latest}</a></li>
          <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'heat'} class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang order_heats}</a></li>
          <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"{if $_GET['filter'] == 'digest'} class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang digest_posts}</a></li>					
				</ul>
        <!--{/if}-->			
				<ul>		
					<li><a>{lang orderby}: </a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=author&orderby=dateline$forumdisplayadd[author]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'dateline'}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang list_post_time}</a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=replies$forumdisplayadd[reply]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'replies'}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang replies}</a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=views$forumdisplayadd[view]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'views'}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang views}</a></li>
				</ul>
				<ul>
					<li><a>{lang time}: </a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if !$_GET['dateline']}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang all}{lang search_any_date}</a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=86400$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '86400'}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang last_1_days}</a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=172800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '172800'}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang last_2_days}</a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=604800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '604800'}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang list_one_week}</a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=2592000$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '2592000'}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang list_one_month}</a></li>
					<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=7948800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '7948800'}class="bg_a f_f"{else}class="bg_e f_b"{/if}>{lang list_three_month}</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_forum_showstyle']==1}-->
<div class="comiis_forumlist_head bg_f b_b cl">
	<div class="top_btn">
		<!--{if $comiis_forum_fav['favid']}-->
			<a href="home.php?mod=spacecp&ac=favorite&op=delete&type=forum&formhash={FORMHASH}&favid={$comiis_forum_fav['favid']}&handlekey=forum_fav" class="dialog bg_b f_d comiis_forum_fav" comiis="handle">{$comiis_lang['all4']}</a>
		<!--{else}-->
			<a href="{if $_G['uid']}home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&formhash={FORMHASH}&handlekey=forum_fav{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}bg_c f_f comiis_forum_fav" comiis="handle">+ {$comiis_lang['all3']}</a>
		<!--{/if}-->
	</div>
	<a href="forum.php?mod=forumdisplay&fid=$_G[fid]" class="top_left">
		<div class="top_ico"><!--{if $_G['forum'][icon]}--><img src="{echo get_forumimg($_G['forum']['icon'])}" /><!--{else}--><span class="bg_b f_d"><i class="comiis_font">&#xe627;</i>nopic</span><!--{/if}--></div>
		<h2 class="f_ok">$_G['forum'][name]</h2>
		<!--{if !$subforumonly}--><p class="f_c">{if $_G[forum][todayposts]}<span class="f_a">{lang index_today}: $_G[forum][todayposts]</span>&nbsp;&nbsp;{/if}{lang index_posts}: $_G[forum][posts]&nbsp;&nbsp;{if $_G[forum][favtimes]}{$comiis_lang['all3']}: $_G[forum][favtimes]{/if}</p><!--{/if}-->
	</a>
</div>
<!--{/if}-->
<!--{if $subexists && $comiis_app_switch['comiis_list_subforum'] == 1}-->
    <!--{if $comiis_app_switch['comiis_list_substyle']==1}-->
        <div class="comiis_gosx_tit bg_f b_t b_b mt10 cl">{lang forum_subforums}</div>
        <div class="comiis_forum_box bg_f mb10 cl">
            <ul>
            <!--{loop $sublist $sub}-->
                <!--{eval $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];}-->
                <!--{eval $icon = str_replace(array('</a>', 'align="left"'), '', preg_replace("/<a href=\"(.*?)\">/", '', $sub[icon]));}-->
                <li><a href="$forumurl" class="b_b b_r f_b"{if $sub[redirect]} target="_blank"{/if}><span><!--{if $icon}-->$icon<!--{else}--><img src="{IMGDIR}/forum{if $sub[folder]}_new{/if}.png" alt="$sub[name]" /><!--{/if}--></span><p>$sub[name]</p></a></li>
            <!--{/loop}-->
            </ul>
        </div>
    <!--{else}-->
        <div id="comiis_sub_icobox" class="comiis_forum_boxs bg_f mt10 b_t b_b cl">
            <ul class="swiper-wrapper">
                <!--{loop $sublist $sub}-->
                    <!--{eval $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];}-->
                    <!--{eval $icon = str_replace(array('</a>', 'align="left"'), '', preg_replace("/<a href=\"(.*?)\">/", '', $sub[icon]));}-->
                    <li class="swiper-slide"><a href="$forumurl" class="f_b"{if $sub[redirect]} target="_blank"{/if}><span><!--{if $icon}-->$icon<!--{else}--><img src="{IMGDIR}/forum{if $sub[folder]}_new{/if}.png" alt="$sub[name]" /><!--{/if}--></span><p>$sub[name]</p></a></li>
                <!--{/loop}-->
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
    <!--{/if}-->
<!--{/if}-->		
<!--{if (!empty($announcement) || $comiis_displayorder_list) && $page == 1 && ($comiis_open_displayorder || $comiis_app_switch['comiis_open_announcement']) && !($comiis_open_displayorder && !empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list'])}-->
	<div class="comiis_forumlist_top bg_f b_t b_b cl"{if !empty($_G['forum']['picstyle']) || !$comiis_open_displayorder} style="margin-top:0;border-top:none !important;padding-bottom:5px;"{/if}>
		<!--{if (!$simplestyle || !$_G['forum']['allowside']) && $comiis_app_switch['comiis_open_announcement'] && !empty($announcement)}-->
			<ul>
				<li{if empty($_G['forum']['picstyle']) && $comiis_open_displayorder} class="b_b"{/if}><a href="{if empty($announcement['type'])}forum.php?mod=announcement&id=$announcement[id]#$announcement[id]{else}$announcement[message]{/if}">{if $comiis_app_switch['comiis_ann_ico'] == 1}<i class="comiis_font comiis_list_ann bg_a f_f">&#xe6d0;</i>{else}<em class="comiis_xifont f_a">{$comiis_lang['view59']}</em>{/if}$announcement[subject]</a></li>
			</ul>
		<!--{/if}-->
        <!--{if $comiis_app_switch['comiis_list_tj'] == 1 && !empty($_G['forum']['recommendlist'])}-->
            <ul>
            <!--{eval unset($_G['forum']['recommendlist']['images']);$n=0;}-->
            <!--{loop $_G['forum']['recommendlist'] $rtid $recommend}-->
            <!--{eval $n++;}-->
            <!--{if $n <= $comiis_app_switch['comiis_list_tjmun']}-->
                <li class="b_b"><a href="forum.php?mod=viewthread&tid=$rtid" $recommend[subjectstyles]>{if $comiis_app_switch['comiis_ann_ico'] == 1}<i class="comiis_font comiis_list_ann bg_c f_f">&#xe654;</i>{else}<em class="comiis_xifont f_wx">{$comiis_lang['recommend_post']}</em>{/if}$recommend[subject]</a></li>
            <!--{/if}-->      
            <!--{/loop}-->
            </ul>
        <!--{/if}-->
		<!--{if $comiis_open_displayorder && !(!empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list'])}-->
			<ul{if $comiis_displayorder_num > ($comiis_app_switch['comiis_list_zdmun'] ? $comiis_app_switch['comiis_list_zdmun'] : 3) && $comiis_displayorder_num < $_G['tpp']} id="comiis_displayorder" style="height:{echo ($comiis_app_switch['comiis_list_zdmun'] ? $comiis_app_switch['comiis_list_zdmun'] : 3) * 35 - 1;}px;overflow:hidden;"{/if}>
				{$comiis_displayorder_list}
			</ul>
			<!--{if $comiis_displayorder_num > ($comiis_app_switch['comiis_list_zdmun'] ? $comiis_app_switch['comiis_list_zdmun'] : 3) && $comiis_displayorder_num < $_G['tpp']}-->
			<ul class="comiis_displayorder_key b_t">
				<li class="comiis_displayorder_show"><a href="javascript:;" onclick="comiis_displayorder_sh(1);" class="comiis_zdmore f_c">{$comiis_lang['tip53']}<i class="comiis_font">&#xe620;</i></a></li>
				<li class="comiis_displayorder_hide"><a href="javascript:;" onclick="comiis_displayorder_sh(0);" class="comiis_zdmore f_c">{$comiis_lang['tip54']}<i class="comiis_font">&#xe621;</i></a></li>
			</ul>
			<!--{/if}-->
		<!--{/if}-->
	</div>
<!--{/if}-->
<!--{hook/forumdisplay_top_mobile}-->
<!--{/if}-->			
<!--{if !$subforumonly}-->
  <!--{if !empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']}-->
    <!--{subtemplate forum/forumdisplay_sort}-->
  <!--{else}-->    
    <!--{eval $_G['comiis_verify'] = $verify;$comiis_list_template = 'default_b_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';}-->
  <!--{/if}-->
	<!--{if !$_GET['inajax']}-->
		<!--{if $comiis_app_list_num != 10}--><div id="list_new"></div><!--{/if}-->
		<!--{eval $comiis_page = ceil($_G['forum_threadcount']/$_G['tpp']);}-->
		<div class="comiis_multi_box{if $comiis_app_list_num != 7 && $comiis_app_list_num != 10} bg_f{/if}{if $comiis_app_list_num != 1 && $comiis_app_list_num != 5 && $comiis_app_list_num != 6 && ($comiis_app_list_num != 7 || $comiis_app_switch['comiis_listpage'] == 0) && ($comiis_app_list_num != 10 || $comiis_app_switch['comiis_listpage'] == 0) && $comiis_app_list_num != 11 && $comiis_app_list_num != 12} b_t mt10{/if}{if $comiis_app_list_num == 11 || $comiis_app_list_num == 12} b_t{/if}">
			<!--{if $multipage && ($comiis_app_switch['comiis_listpage'] == 0 || $page > 1)}-->
				{$multipage}
			<!--{elseif $comiis_app_switch['comiis_listpage'] == 1 && $page < $comiis_page}-->
				<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn{if $comiis_app_list_num == 7 || $comiis_app_list_num == 10} bg_f{else} bg_e{/if} f_d">{$comiis_lang['tip5']}</a>
			<!--{elseif $comiis_app_switch['comiis_listpage'] == 2 && $page < $comiis_page}-->
				<div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>
			<!--{elseif $comiis_app_switch['comiis_listpage'] && $comiis_page == 1 && $_G['forum_threadcount'] > 4}-->
				<div class="comiis_loadbtn f_d">{$comiis_lang['tip31']}</div>
			<!--{/if}-->
		</div>
		<script>
		<!--{if $_G['uid']}-->comiis_recommend_addkey();<!--{/if}-->
		<!--{if $comiis_app_switch['comiis_listpage'] > 0 && $page == 1}-->
			var comiis_page = $page;
			var comiis_ispage = 0;
			function comiis_list_page(){
				comiis_ispage = 1;
				if(comiis_page < $comiis_page){
					$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>');
					$.ajax({
						type:'GET',
						url: 'forum.php?mod=forumdisplay&fid={$_G[fid]}{$forumdisplayadd['page']}{echo ($multiadd ? '&'.implode('&', $multiadd) : '');}{$multipage_archive}&page=' + (comiis_page + 1) + '&inajax=1',
						dataType:'xml',
					}).success(function(s) {
						if(typeof(s.lastChild.firstChild.nodeValue) != "undefined"){
							comiis_page++;
							$('.comiis_forumlist .comiis_notip').remove();
							$('#list_new').append(s.lastChild.firstChild.nodeValue);
							if(comiis_page >= $comiis_page){
								$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d">{$comiis_lang['tip31']}</div>');
							}else{
								$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn{if $comiis_app_list_num == 7 || $comiis_app_list_num == 10} bg_f{else} bg_e{/if} f_d">{$comiis_lang['tip5']}</a>');
							}							
				<!--{if $comiis_app_list_num == 10}-->
					var comiis_pic_width = ($(window).width() - 34) / 2;
					$(".comiis_waterfall li[class='bg_f b_ok']").css('width', (comiis_pic_width) + 'px');
					imagesLoaded($('.comiis_waterfall'),function(){
						$('#list_new').masonry('reload');
					});
				<!--{/if}-->							
						comiis_redata_function();
						}else{
							comiis_page--;
							$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn{if $comiis_app_list_num == 7 || $comiis_app_list_num == 10} bg_f{else} bg_e{/if} f_d">{$comiis_lang['tip32']}</a>');
						}
						comiis_ispage = 0;
					}).error(function() {
						comiis_page--;
						$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn{if $comiis_app_list_num == 7 || $comiis_app_list_num == 10} bg_f{else} bg_e{/if} f_d">{$comiis_lang['tip32']}</a>');
						comiis_ispage = 0;
					});
				}else{
					$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d">{$comiis_lang['tip31']}</div>');
				}
			}
			var comiis_regdata_page = 'comiis_page', comiis_regdata_dataid = ['#list_new'];
			function comiis_redata_function(){
				popup.init();
				comiis_recommend_addkey();
			}
			<!--{if $comiis_app_switch['comiis_listpage'] == 2}-->
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
			<!--{/if}-->
			<!--{if $page < $comiis_page && $comiis_displayorder_num >= $_G['tpp']}-->
			comiis_list_page();
			<!--{/if}-->
		<!--{/if}-->
		</script>
	<!--{/if}-->
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_forum_dbdh'] == 0}--><!--{eval $comiis_foot = 'no';}--><!--{/if}-->
<!--{if $_GET['inajax'] != 1}-->
<!--{hook/forumdisplay_bottom_mobile}-->
<!--{if $comiis_app_switch['comiis_list_fpost'] == 1 && !$subforumonly}-->
	<!--{if $comiis_foot == 'no' && !$comiis_open_footer}-->
        <!--{if $comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])}-->
            <a href="{if $_G['uid']}#comiis_post_type{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" title="{lang send_threads}" class="{if $_G['uid']}popup {/if}comiis_fastpost_btn f_f"><i class="comiis_font">&#xe62d;</i>{$comiis_lang['tip55']}{$_G['forum']['name']}{$comiis_lang['tip56']}</a>
        <!--{else}-->
            <a href="{if $_G['uid']}forum.php?mod=post&action=newthread&fid=$_G[fid]{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" title="{lang send_threads}" class="comiis_fastpost_btn f_f"><i class="comiis_font">&#xe62d;</i>{$comiis_lang['tip55']}{$_G['forum']['name']}{$comiis_lang['tip56']}</a>
        <!--{/if}-->
		<div class="comiis_foot_height"></div>
	<!--{/if}-->
<!--{/if}-->
<!--{/if}-->
<!--{template forum/comiis_post_type}-->
{eval}
$comiis_app_wx_share['title'] = $_G['forum'][name].($comiis_app_switch['comiis_sitename'] ? ' - '.$comiis_app_switch['comiis_sitename'] : '');
$comiis_app_wx_share['desc'] = $_G[forum][description] ? $_G[forum][description] : '';
{/eval}
<!--{template common/footer}-->