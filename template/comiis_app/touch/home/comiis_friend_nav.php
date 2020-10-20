<?PHP exit('Access Denied');?>
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b">
		<div id="comiis_sub">
			<ul class="swiper-wrapper">
				<li class="swiper-slide{if $a_actives[me]} f_0{/if}">{if $a_actives[me]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=friend"{if !$a_actives[me]} class="f_c"{/if}>{lang my_friends}</a></li>
				<li class="swiper-slide{if $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='following'} f_0{/if}">{if $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='following'}<em class="bg_0"></em>{/if}<a href="home.php?mod=follow&do=following&uid=$_G['uid']"{if $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='following'}{else} class="f_c"{/if}>{$comiis_lang['all33']}</a></li>
				<li class="swiper-slide{if $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='follower'} f_0{/if}">{if $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='follower'}<em class="bg_0"></em>{/if}<a href="home.php?mod=follow&do=follower&uid=$_G['uid']"{if $_G['basescript'] == 'home' && CURMODULE == 'follow' && $_GET['do']=='follower'}{else} class="f_c"{/if}>{$comiis_lang['all34']}</a></li>
				<li class="swiper-slide{if $a_actives[visitor]} f_0{/if}">{if $a_actives[visitor]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=friend&view=visitor"{if !$a_actives[visitor]} class="f_c"{/if}>{$comiis_lang['all30']}</a></li>
				<li class="swiper-slide{if $a_actives[trace]} f_0{/if}">{if $a_actives[trace]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=friend&view=trace"{if !$a_actives[trace]} class="f_c"{/if}>{$comiis_lang['all31']}</a></li>
				<li class="swiper-slide{if $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op']=='request'} f_0{/if}">{if $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op']=='request'}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=friend&op=request"{if $_G['basescript'] == 'home' && CURMODULE == 'spacecp' && $_GET['op']=='request'}{else} class="f_c"{/if}>{lang friend_request}</a></li>				
				<li class="swiper-slide{if $a_actives[blacklist]} f_0{/if}">{if $a_actives[blacklist]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=friend&view=blacklist"{if !$a_actives[blacklist]} class="f_c"{/if}>{$comiis_lang['all32']}</a></li>
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
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