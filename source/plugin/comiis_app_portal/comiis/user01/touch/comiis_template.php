<?PHP exit('Access Denied');?>
<style>
.comiis_mh_user01 {padding:0 6px 12px;overflow:hidden;}
.comiis_mh_user01 li {float:left;width:auto;min-width:60px;margin:12px 6px 0;padding:15px 25px;text-align:center;overflow:hidden;position:relative;border-radius:5px;}
.comiis_mh_user01 li a {display:block;}
.comiis_mh_user01 li a img {width:46px;height:46px;border-radius:50%;}
.comiis_mh_user01 li h2 {margin-top:8px;text-align:center;height:24px;line-height:24px;font-size:15px;font-weight:400;overflow:hidden;}
.comiis_mh_user01 li p.kmtxt {height:20px;line-height:20px;font-size:12px;overflow:hidden;}
.comiis_mh_user01 li p.kmbtn {margin-top:8px;height:26px;line-height:26px;overflow:hidden;}
.comiis_mh_user01 li p.kmbtn span {display:inline-block;height:26px;line-height:26px;padding:0 15px;border-radius:20px;}
</style>
<div id="comiis_mh_usergo{$data['id']}" class="comiis_mh_user01 cl">
	<ul class="swiper-wrapper">
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="swiper-slide b_ok">					
			<a href="{$temp['url']}&do=profile" title="{$temp['title']}">
                <img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{$temp['fields']['avatar_middle']}" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}">							
                <h2>{$temp['title']}</h2>
                <p class="kmtxt f_d">{$temp['fields']['credits']}{$comiis_portal['user01_b']}</p>
                <p class="kmbtn"><span class="bg_0 f_f">+ {$comiis_portal['user01_c']}</span></p>
			</a>
		</li>
	<!--{/loop}-->
	</ul>
</div>
<script>
	comiis_app_portal_swiper('#comiis_mh_usergo{$data['id']}', {
		freeMode : true,
		freeModeMomentumRatio : 0.5,
		slidesPerView : 'auto',
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>