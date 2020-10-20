<?PHP exit('Access Denied');?>
<style>
.comiis_mh_navs {height:40px;width:100%;overflow:hidden;}
.comiis_mh_subbox {height:40px;position:relative;}
.comiis_mh_sub {height:40px;text-align:center;white-space:nowrap;width:100%;}
.comiis_mh_sub li {float:left;width:auto;overflow:hidden;position:relative;}
.comiis_mh_sub em {position:absolute;left:50%;bottom:2px;margin-left:-9px;height:4px;width:18px;border-radius:10px;}
.comiis_mh_sub a {display:inline-block;font-size:15px;height:40px;line-height:40px;padding:0 12px;}
</style>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_mh_navs bg_f<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--> b_b<!--{/if}-->">
	<div class="comiis_mh_subbox">
		<div id="comiis_mh_sub{$data['id']}" class="comiis_mh_sub">
			<ul class="swiper-wrapper">
				{$comiis['summary']}
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<script>
	if($("#comiis_mh_sub{$data['id']} li.f_0").length > 0) {
		var comiis_index = $("#comiis_mh_sub{$data['id']} li.f_0").offset().left + $("#comiis_mh_sub{$data['id']} li.f_0").width() >= $(window).width() ? $("#comiis_mh_sub{$data['id']} li.f_0").index() : 0;
	}else{
		var comiis_index = 0;
	}
	comiis_app_portal_swiper('#comiis_mh_sub{$data['id']}', {
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