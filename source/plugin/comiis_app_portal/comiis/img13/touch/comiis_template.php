<?PHP exit('Access Denied');?>
<style>
.comiis_mh_img13 {overflow:hidden;position:relative;}
.comiis_mh_img13 .swiper-slide span {position:absolute;left:0;bottom:35px;float:left;color:#fff;width:auto;padding:2px 10px;font-size:14px;max-height:60px;line-height:30px;background:rgba(0,0,0,0.7);overflow:hidden;}
.comiis_mh_img13_roll {position:absolute;left:0;bottom:0;height:16px;width:100%;text-align:center;z-index:9;overflow:hidden;}
.comiis_mh_img13_roll .swiper-pagination-bullet {display:inline-block;width:7px;height:7px;margin:0 4px;background-color:rgba(0, 0, 0, 0.2);border-radius:10px;}
.comiis_mh_img13_roll .swiper-pagination-bullet-active {background-color:#f90;}
.comiis_svg_img13box {position:absolute;left:0;bottom:-5px;height:30px;width:100%;z-index:1;}
.comiis_svg_img13 {position:absolute;width:100%;height:30px;}
.comiis_svg_img13 {background:url(./source/plugin/comiis_app_portal/image/comiis_img13.svg) repeat-x;background-size:450px;}
</style>
<div class="comiis_mh_img13 comiis_mh_img13{$data['id']}">
	<ul class="swiper-wrapper">
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="swiper-slide">
            <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
			<img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="100%" class="vm comiis_mh_img13_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" alt="{$temp['fields']['fulltitle']}">
			<!--{if $comiis['summary'] != 'none'}--><span>{$temp['title']}</span><!--{/if}-->
			</a>
		</li>
	<!--{/loop}-->
	</ul>
	<div class="comiis_mh_img13_roll comiis_mh_img13_roll{$data['id']}"></div>
	<div class="comiis_svg_img13box"><div class="comiis_svg_img13"></div></div>
</div>
<script>
  $('.comiis_mh_img13_whb{$data['id']}').css('height', ($('.comiis_mh_img13_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');
	comiis_app_portal_swiper('.comiis_mh_img13{$data['id']}', {
		slidesPerView : 'auto',
        pagination: '.comiis_mh_img13_roll{$data['id']}',
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