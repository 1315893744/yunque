<?PHP exit('Access Denied');?>
<style>
.comiis_mhswfa {background:#000;overflow:hidden;position:relative;}
.comiis_mhswfa .swiper-slide span {position:absolute;left:0;bottom:36px;float:left;color:#fff;width:auto;padding:2px 10px;font-size:14px;max-height:60px;line-height:30px;background:rgba(0,0,0,0.7);overflow:hidden;}
.comiis_mhswfa_roll {position:absolute;left:0;bottom:0;margin-bottom:18px;height:18px;width:100%;text-align:center;color:#fff;z-index:9;overflow:hidden;}
.comiis_mhswfa_roll .swiper-pagination-bullet {display:inline-block;width:4px;height:4px;margin:0 2px;background-color:rgba(0, 0, 0, 0.35);border-radius:6px;}
.comiis_mhswfa_roll .swiper-pagination-bullet-active {background-color:#fff;width:10px;}
</style>
<div class="comiis_mhswfa comiis_mhswfa{$data['id']}">
	<ul class="swiper-wrapper">
    <!--{loop $comiis['itemlist'] $temp}-->
		<li class="swiper-slide">
            <a href="{$temp['url']}" title="{$temp['fields']['fulltitle']}">
			<img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{if $temp['picflag'] == 0}{$temp['pic']}{else}{if $temp['picflag'] == 2}{$_G['setting']['ftp']['attachurl']}{else}{$_G['setting']['attachurl']}{/if}{if $temp['makethumb'] == 1}{$temp['thumbpath']}{else}{$temp['pic']}{/if}{/if}" width="100%" class="vm comiis_mhswfa_whb{$data['id']}{if $comiis_app_switch['comiis_loadimg']} comiis_loadimages{/if}" alt="{$temp['fields']['fulltitle']}">
			<!--{if $comiis['summary'] != 'none'}--><span>{$temp['title']}</span><!--{/if}-->
			</a>
		</li>
	<!--{/loop}-->
	</ul>
	<div class="comiis_mhswfa_roll comiis_mhswfa_roll{$data['id']}"></div>
	<div class="comiis_svg_box"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div>
</div>
<script>
  $('.comiis_mhswfa_whb{$data['id']}').css('height', ($('.comiis_mhswfa_whb{$data['id']}').width() * {echo $comiis['picheight'] / $comiis['picwidth'];}) + 'px');
	comiis_app_portal_swiper('.comiis_mhswfa{$data['id']}', {
		slidesPerView : 'auto',
        pagination: '.comiis_mhswfa_roll{$data['id']}',
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