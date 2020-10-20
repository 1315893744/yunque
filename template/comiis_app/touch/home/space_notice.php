<?PHP exit('Access Denied');?>
<!--{if empty($_GET['view'])}--><!--{eval $comiis_bg = 1;}--><!--{/if}-->
<!--{template common/header}-->
<!--{if empty($_GET['view'])}-->
<div class="comiis_userlist bg_f cl">
    <ul>
        <li class="b_b"><a href="home.php?mod=space&do=pm" class="kmdbt"><i class="comiis_font f_d">&#xe60c;</i>{if $_G[member][newpm]}<span class="notice_r bg_del f_f">{$_G[member][newpm]}</span>{/if}<i class="comiis_font kmzico bg_0 f_f" style="background:#53bcf5 !important;">&#xe64f;</i>{lang mypm}</a></li>        
        <li class="b_b"><a href="home.php?mod=follow&do=follower&uid={$_G[uid]}" class="kmdbt"><i class="comiis_font f_d">&#xe60c;</i>{if $_G[member][newprompt_num][follower]}<span class="notice_r bg_del f_f">{$_G[member][newprompt_num][follower]}</span>{/if}<i class="comiis_font kmzico bg_0 f_f" style="background:#F37D7D !important">&#xe66b;</i>{$comiis_lang['all34']}</a></li>
        <!--{loop $_G['notice_structure'] $key $type}-->
        <li class="b_b $key"><a href="home.php?mod=space&do=notice&view=$key" class="kmdbt"><i class="comiis_font f_d">&#xe60c;</i>{if $_G['member']['category_num'][$key]}<span class="notice_r bg_del f_f">$_G['member']['category_num'][$key]</span>{/if}<i class="comiis_font kmzico bg_0 f_f"{if $key == 'mypost'} style="background:#9DCA06 !important;">&#xe607;{elseif $key == 'interactive'} style="background:#FFB300 !important;">&#xe6a7;{elseif $key == 'system'} style="background:#F37D7D !important;">&#xe650;{elseif $key == 'manage'} style="background:#9DCA06 !important;">&#xe63e;{elseif $key == 'app'} style="background:#91B9EB !important;">&#xe609;{else}>&#xe66b;{/if}</i><!--{eval echo lang('template', 'notice_'.$key)}--></a></li>
        <!--{/loop}-->
    </ul>
</div>
<!--{else}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<!--{if $view == 'mypost' || $view == 'interactive'}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b">
		<div id="comiis_sub">
			<ul class="swiper-wrapper">
                <!--{if $_G['notice_structure'][$view] && ($view == 'mypost' || $view == 'interactive')}-->
				<!--{loop $_G['notice_structure'][$view] $key $subtype}-->
				<li class="swiper-slide{if $readtag[$subtype]} f_0{/if}">{if $readtag[$subtype]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=notice&view=$view&type=$subtype"{if !$readtag[$subtype]} class="f_c"{/if}><!--{eval echo lang('template', 'notice_'.$view.'_'.$subtype)}--><!--{if $_G['member']['newprompt_num'][$subtype]}--><span class="kmsum bg_a f_f">$_G['member']['newprompt_num'][$subtype]</span><!--{/if}--></a></li>
				<!--{/loop}-->
				<!--{else}-->
				<li class="swiper-slide f_0"><em class="bg_0"></em><a href="home.php?mod=space&do=notice&view=$view"><!--{eval echo lang('template', 'notice_'.$view)}--></a></li>
				<!--{/if}-->
			</ul>
		</div>
	</div>
</div>
<script>
	if($("#comiis_sub li.f_0").length > 0) {
		var comiis_index = $("#comiis_sub li.f_0").offset().left + $("#comiis_sub li.f_0").width() >= $(window).width() ? $("#comiis_sub li.f_0").index() : 0;
	}else{
		var comiis_index = 0;
	}
	mySwiper = new Swiper('#comiis_sub', {
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
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<!--{if empty($list)}-->
	<div class="comiis_notip comiis_sofa mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">
			<!--{if $new == 1}-->
				{lang no_new_notice} <a href="home.php?mod=space&do=notice&isread=1">{lang view_old_notice}</a>
			<!--{else}-->
				{lang no_notice}
			<!--{/if}-->
		</span>
	</div>
<!--{/if}-->
<!--{if $list}-->
	<div class="comiis_notice_list">
		<ul>
		<!--{loop $list $key $value}-->
			<li class="b_t b_b bg_f mt10 cl">
				<!--{if $value[authorid]}-->
				<a href="home.php?mod=space&uid=$value[authorid]&do=profile" class="notice_img"><!--{avatar($value[authorid],middle)}--></a>
				<!--{else}-->
				<div class="notice_imgs bg_0"><i class="comiis_font f_f">&#xe650;</i></div>
				<!--{/if}-->
				<h2 class="f_d"><a class="d b dialog y" href="home.php?mod=spacecp&ac=common&op=ignore&authorid=$value[authorid]&type=$value[type]&handlekey=addfriendhk_{$value[authorid]}" id="a_note_$value[id]" title="{lang shield}"><i class="comiis_font f_d">&#xe65d;</i></a><!--{date($value[dateline], 'u')}--></h2>
				<div class="ntc_body">{echo str_replace(array("quote","<strong>","onclick=\"showWindow(this.id, this.href, 'get', 0);\" class=\"xw1\""), array("comiis_quote bg_h f_c","<strong class='f_0'>","class='dialog'"), $value[note]);}</div>
				<!--{if $value[from_num]}-->
				<div class="comiis_quote bg_h f_c">{lang ignore_same_notice_message}</div>
				<!--{/if}-->
			</li>
		<!--{/loop}-->
		<!--{if $view!='userapp' && $space[notifications]}-->
			<a href="home.php?mod=space&do=notice&ignore=all" class="comiis_quote bg_h f_c comiis_hltip">{lang ignore_same_notice_message}</a>
		<!--{/if}-->
		</ul>					
	</div>
	<!--{if $multi}--><div class="cl">$multi</div><!--{/if}-->
<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->