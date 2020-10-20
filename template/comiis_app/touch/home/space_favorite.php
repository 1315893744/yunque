<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b">
		<div id="comiis_sub">
			<ul class="swiper-wrapper">
				<li class="swiper-slide{if $actives[all]} f_0{/if}">{if $actives[all]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=favorite&type=all"{if !$actives[all]} class="f_c"{/if}>{lang favorite_all}</a></li>
				<li class="swiper-slide{if $actives[thread]} f_0{/if}">{if $actives[thread]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=favorite&type=thread"{if !$actives[thread]} class="f_c"{/if}>{lang favorite_thread}</a></li>
				<li class="swiper-slide{if $actives[forum]} f_0{/if}">{if $actives[forum]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=favorite&type=forum"{if !$actives[forum]} class="f_c"{/if}>{lang favorite_forum}</a></li>				
				<!--{if helper_access::check_module('group')}--><li class="swiper-slide{if $actives[group]} f_0{/if}">{if $actives[group]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=favorite&type=group"{if !$actives[group]} class="f_c"{/if}>{lang favorite_group}</a></li><!--{/if}-->
				<!--{if helper_access::check_module('blog')}--><li class="swiper-slide{if $actives[blog]} f_0{/if}">{if $actives[blog]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=favorite&type=blog"{if !$actives[blog]} class="f_c"{/if}>{lang favorite_blog}</a></li><!--{/if}-->
				<!--{if helper_access::check_module('album')}--><li class="swiper-slide{if $actives[album]} f_0{/if}">{if $actives[album]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=favorite&type=album"{if !$actives[album]} class="f_c"{/if}>{lang favorite_album}</a></li><!--{/if}-->
				<!--{if helper_access::check_module('portal')}--><li class="swiper-slide{if $actives[article]} f_0{/if}">{if $actives[article]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=favorite&type=article"{if !$actives[article]} class="f_c"{/if}>{lang favorite_article}</a></li><!--{/if}-->
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
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
<div class="comiis_mysclist bg_f b_t b_b cl">
	<ul>	
	<!--{if $list}-->
		<!--{loop $list $k $value}-->
		<li class="mysclist_li b_t">
			<a href="home.php?mod=spacecp&ac=favorite&op=delete&favid=$k&type={$_GET[type]}" class="dialog bg_b f_c y"><i class="comiis_font">&#xe67f;</i></a>
			<h2>{$value[icon]}<a href="$value[url]">{$value[title]}</a></h2>
		</li>
		<!--{/loop}-->
	<!--{else}-->
		<li class="comiis_notip comiis_sofa cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang no_favorite_yet}</span>
		</li>		
	<!--{/if}-->
	</ul>
</div>
<div class="b_t cl">$multi</div>
<!--{template common/footer}-->