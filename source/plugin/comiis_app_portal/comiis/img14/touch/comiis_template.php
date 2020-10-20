<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img14 {overflow:hidden;position:relative;}
.comiis_mh_img14 .swiper-slide h2 {position:absolute;left:0;bottom:0;color:#fff;width:100%;height:55px;padding:8px 0 12px;background:rgba(0,0,0,0.2);overflow:hidden;}
.comiis_mh_img14 .swiper-slide h2 span.kmtit {display:block;height:30px;line-height:30px;padding:0 12px;margin-bottom:5px;font-size:18px;font-weight:400;}
.comiis_mh_img14 .swiper-slide h2 span.kmuser {display:block;height:20px;line-height:20px;padding:0 12px;font-weight:400;}
.comiis_mh_img14 .swiper-slide h2 span.kmuser img {float:left;width:20px;height:20px;margin-right:6px;border-radius:50%;}
.comiis_mh_img14 .swiper-slide h2 span.kmuser em {padding:0 10px;}
.comiis_mh_img14_roll {position:absolute;right:10px;bottom:14px;height:16px;width:100%;text-align:right;z-index:9;overflow:hidden;}
.comiis_mh_img14_roll .swiper-pagination-bullet {display:inline-block;width:8px;height:8px;margin:0 2px;background-color:rgba(255, 255, 255, 1);border-radius:10px;}
.comiis_mh_img14_roll .swiper-pagination-bullet-active {background-color:#F90;}
</style>
<div class="comiis_mh_img14 comiis_mh_img14{$data['id']}">
	<ul class="swiper-wrapper">
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="swiper-slide">
            <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
			<img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="100%" class="vm comiis_mh_img14_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" alt="{$temp['fields']['fulltitle']}">
			<h2><span class="kmtit">{$temp['title']}</span><span class="kmuser"><img src="{$temp['fields']['avatar_middle']}" class="vm">{if $temp['fields']['author']}{$temp['fields']['author']}{else}{$temp['fields']['username']}{/if}<em class="comiis_tm">|</em>{if $temp['fields']['views']}{$temp['fields']['views']}{else}{$temp['fields']['viewnum']}{/if}{$comiis_portal['img14_b']}&nbsp;&nbsp;&nbsp;{if $temp['fields']['replies']}{$temp['fields']['replies']}{else}0{/if}{$comiis_portal['img14_c']}</span></h2>
			</a>
		</li>
	<!--{/loop}-->
	</ul>
	<div class="comiis_mh_img14_roll comiis_mh_img14_roll{$data['id']}"></div>
</div>
<script>
  $('.comiis_mh_img14_whb{$data['id']}').css('height', ($('.comiis_mh_img14_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');
	comiis_app_portal_swiper('.comiis_mh_img14{$data['id']}', {
		slidesPerView : 'auto',
        pagination: '.comiis_mh_img14_roll{$data['id']}',
		loop: true,
		autoplay: 5000,
        autoplayDisableOnInteraction: false,
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>