<?PHP exit('Access Denied');?>
<style>
.comiis_mh_user02 {padding:0 6px;overflow:hidden;}
.comiis_mh_user02 li {float:left;width:auto;min-width:70px;margin:0 6px;padding:13px 4px 12px;text-align:center;overflow:hidden;}
.comiis_mh_user02 li a {display:block;}
.comiis_mh_user02 li .kmimg {margin:0 auto;width:58px;height:58px;padding:2px;border-radius:100%;background:#bbb;position:relative;}
.comiis_mh_user02 li .kmimg img {width:58px;height:58px;border-radius:100%;overflow:hidden;}
.comiis_mh_user02 li .kmimg span {position:absolute;left:50%;bottom:-5px;margin-left:-17px;display:inline-block;height:14px;line-height:14px;width:34px;text-align:center;background:#bbb;color:#fff;border-radius:2px;overflow:hidden;}
.comiis_mh_user02 li h2 {margin-top:12px;text-align:center;height:24px;line-height:24px;font-size:15px;font-weight:400;overflow:hidden;}
.comiis_mh_user02 li p.kmtxt {height:18px;line-height:18px;font-size:12px;overflow:hidden;}
.comiis_mh_user02 li .km01, .comiis_mh_user02 li .km01 span {background:#FF705E;}
.comiis_mh_user02 li .km02, .comiis_mh_user02 li .km02 span {background:#FFB900;}
.comiis_mh_user02 li .km03, .comiis_mh_user02 li .km03 span {background:#A8C500;}
</style>
<div id="comiis_mh_usergo{$data['id']}" class="comiis_mh_user02 cl">
	<ul class="swiper-wrapper">
	<!--{eval $kmnn = 0;}-->
    <!--{loop $comiis['itemlist'] $temp}-->
        <!--{eval $kmnn++;}-->
		<li class="swiper-slide">					
			<a href="{$temp['url']}&do=profile" title="{$temp['title']}">
                <div class="kmimg{if $kmnn == 1} km01{elseif $kmnn == 2} km02{elseif $kmnn == 3} km03{/if}"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{$temp['fields']['avatar_middle']}" class="vm{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}"><span>No.{$kmnn}</span></div>					
                <h2>{$temp['title']}</h2>
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