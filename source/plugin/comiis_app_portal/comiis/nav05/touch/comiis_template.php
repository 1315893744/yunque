<?PHP exit('Access Denied');?>
<style>
.comiis_mh_nav05s {height:40px;width:100%;overflow:hidden;}
.comiis_mh_nav05box {height:40px;position:relative;}
.comiis_mh_nav05 {height:40px;text-align:center;white-space:nowrap;width:100%;}
.comiis_mh_nav05 li {float:left;width:auto;overflow:hidden;position:relative;}
.comiis_mh_nav05 li a {display:inline-block;font-size:15px;height:40px;line-height:40px;padding:0 12px;}
.comiis_mh_nav05 li.f_0 a {font-size:18px;font-weight:600;}
</style>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_mh_nav05s bg_f<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--> b_b<!--{/if}-->">
	<div class="comiis_mh_nav05box">
		<div id="comiis_mh_nav05{$data['id']}" class="comiis_mh_nav05">
			<ul class="swiper-wrapper">
				{$comiis['summary']}
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<script>
	if($("#comiis_mh_nav05{$data['id']} li.kmon").length > 0) {
		var comiis_index = $("#comiis_mh_nav05{$data['id']} li.kmon").offset().left + $("#comiis_mh_nav05{$data['id']} li.kmon").width() >= $(window).width() ? $("#comiis_mh_nav05{$data['id']} li.kmon").index() : 0;
	}else{
		var comiis_index = 0;
	}
	comiis_app_portal_swiper('#comiis_mh_nav05{$data['id']}', {
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